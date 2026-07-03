"""
Gera o PDF do Guia da Identidade da Barbearia em partes:
- Full-bleed (capa, sumário, aberturas de capítulo, CTA): SEM header/footer
- Conteúdo de capítulos: COM header (logo) + footer (site) fixos

Depois funde tudo na ordem correta usando pypdf.
"""
import asyncio
from playwright.async_api import async_playwright
from bs4 import BeautifulSoup
from pypdf import PdfWriter, PdfReader
import os

with open('logo_base64.txt') as f:
    LOGO_B64 = f.read().strip()

HEADER_TEMPLATE = f"""
<div style="width:100%; height: 16mm; font-family: 'DM Sans', sans-serif; padding: 0 22mm; box-sizing: border-box; display: flex; align-items: center; justify-content: center;">
  <img src="data:image/png;base64,{LOGO_B64}" style="height: 9.5mm; opacity: 0.9; display:block;" />
</div>
"""

FOOTER_TEMPLATE = """
<div style="width:100%; font-family: 'DM Sans', sans-serif; padding: 0 22mm; box-sizing: border-box;">
  <div style="display:flex; align-items: center; justify-content: center; margin: 0 0 2mm 0;">
    <div style="flex-grow:1; border-top: 0.5px solid #B8935A;"></div>
    <span style="padding: 0 3mm; font-size: 8px; color: #B8935A; font-family: 'DM Sans', sans-serif; min-width:6mm; display:inline-block;"></span>
    <div style="flex-grow:1; border-top: 0.5px solid #B8935A;"></div>
  </div>
  <div style="display:flex; justify-content: space-between; align-items: center; font-size: 7.5px; color: #999; letter-spacing: 0.05em;">
    <span>ACADEMIA DA BARBEARIA</span>
    <span>www.academiadabarbearia.com.br</span>
  </div>
</div>
"""

async def render_pdf(html_path, pdf_path, with_header_footer=False, page_format="A4"):
    caminho_html = "file://" + os.path.abspath(html_path)
    async with async_playwright() as p:
        browser = await p.chromium.launch()
        page = await browser.new_page(viewport={"width": 794, "height": 1123})
        await page.goto(caminho_html, wait_until="networkidle")
        kwargs = dict(
            path=pdf_path,
            format=page_format,
            print_background=True,
        )
        if with_header_footer:
            kwargs.update(
                margin={"top": "22mm", "bottom": "22mm", "left": "0", "right": "0"},
                display_header_footer=True,
                header_template=HEADER_TEMPLATE,
                footer_template=FOOTER_TEMPLATE,
            )
        else:
            kwargs.update(
                margin={"top": "0", "bottom": "0", "left": "0", "right": "0"},
                prefer_css_page_size=True,
            )
        await page.pdf(**kwargs)
        await browser.close()
    print(f"  -> {pdf_path}")


def html_wrapper(div_html, css_file='style.css'):
    return f"""<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><link rel="stylesheet" href="{css_file}"></head>
<body>
{div_html}
</body>
</html>"""


def extrair_capitulo(arquivo_html):
    """Extrai abertura, gancho e conteúdo de um arquivo de capítulo já combinado."""
    with open(arquivo_html, encoding='utf-8') as f:
        soup = BeautifulSoup(f.read(), 'html.parser')
    abertura = soup.body.find('div', class_='abertura-capitulo')
    gancho = soup.body.find('div', class_='pagina-gancho')
    conteudo = soup.body.find('div', class_='conteudo')
    cta = soup.body.find('div', class_='cta-compra')
    return abertura, gancho, conteudo, cta


async def main():
    print("Extraindo partes do documento...")

    partes = []  # lista de tuplas (pdf_path, html_path, com_header_footer)
    contador = 1

    def proxima_parte(div_html, css_file, com_header_footer, prefixo):
        nonlocal contador
        html_path = f'gen_{contador:02d}_{prefixo}.html'
        pdf_path = f'gen_{contador:02d}.pdf'
        with open(html_path, 'w', encoding='utf-8') as f:
            f.write(html_wrapper(str(div_html), css_file))
        partes.append((pdf_path, html_path, com_header_footer))
        contador += 1

    # --- Capa + Sumário (full-bleed, sem header/footer) ---
    with open('parte1_apresentacao.html', encoding='utf-8') as f:
        soup1 = BeautifulSoup(f.read(), 'html.parser')
    capa = soup1.body.find('div', class_='capa')
    sumario = soup1.body.find('div', class_='sumario')
    proxima_parte(f"{str(capa)}{str(sumario)}", 'style.css', False, 'capa_sumario')

    # --- Apresentação (conteúdo, com header/footer) ---
    apresentacao = soup1.body.find('div', class_='conteudo page-break')
    proxima_parte(apresentacao, 'style_conteudo.css', True, 'apresentacao')

    # --- Capítulos 1 a 4 ---
    arquivos_capitulos = [
        ('parte2_capitulo1.html', 'cap1'),
        ('parte3_capitulo2.html', 'cap2'),
        ('parte4_capitulo3_FINAL.html', 'cap3'),
        ('parte5_capitulo4_FINAL.html', 'cap4'),
    ]

    cta_final = None
    for arquivo, prefixo in arquivos_capitulos:
        abertura, gancho, conteudo, cta = extrair_capitulo(arquivo)
        if abertura:
            proxima_parte(abertura, 'style.css', False, f'{prefixo}_abertura')
        if gancho:
            proxima_parte(gancho, 'style.css', False, f'{prefixo}_gancho')
        if conteudo:
            proxima_parte(conteudo, 'style_conteudo.css', True, f'{prefixo}_conteudo')
        if cta:
            cta_final = cta

    # --- CTA final (full-bleed) — vem do último capítulo que tiver um ---
    if cta_final is not None:
        proxima_parte(cta_final, 'style.css', False, 'cta')

    print(f"Renderizando {len(partes)} PDFs parciais...")
    for pdf_path, html_path, com_header_footer in partes:
        await render_pdf(html_path, pdf_path, with_header_footer=com_header_footer)

    print("Fundindo PDFs e aplicando numeração corrida...")
    writer = PdfWriter()
    pagina_numerada_flags = []  # True se a página deve receber número visível
    for pdf_path, _, com_header_footer in partes:
        reader = PdfReader(pdf_path)
        for page in reader.pages:
            writer.add_page(page)
            pagina_numerada_flags.append(com_header_footer)

    with open('_temp_sem_numero.pdf', 'wb') as f:
        writer.write(f)

    # Gerar overlay de números (apenas nas páginas com header/footer = com_header_footer True)
    from reportlab.pdfgen import canvas as rl_canvas
    from reportlab.lib.pagesizes import A4
    import io

    buffer = io.BytesIO()
    c = rl_canvas.Canvas(buffer, pagesize=A4)
    page_w, page_h = A4

    # posição vertical da linha dourada do footer: margin bottom 22mm, a linha de número
    # fica próxima do topo da área de footer reservada. Ajustado empiricamente.
    y_pos = 24  # pontos a partir da base da página (~8.5mm)

    contador_visivel = 0
    for flag in pagina_numerada_flags:
        if flag:
            contador_visivel += 1
            c.setFont("Helvetica", 8)
            c.setFillColorRGB(0.722, 0.580, 0.353)  # dourado terroso aproximado
            c.drawCentredString(page_w / 2, y_pos, str(contador_visivel))
        c.showPage()
    c.save()
    buffer.seek(0)

    overlay_reader = PdfReader(buffer)
    base_reader = PdfReader('_temp_sem_numero.pdf')
    writer_final = PdfWriter()
    for i, page in enumerate(base_reader.pages):
        if pagina_numerada_flags[i]:
            page.merge_page(overlay_reader.pages[i])
        writer_final.add_page(page)

    with open('Guia_da_Identidade_da_Barbearia_AMOSTRA.pdf', 'wb') as f:
        writer_final.write(f)

    os.remove('_temp_sem_numero.pdf')

    print("PDF final gerado com sucesso!")
    print("Total de páginas:", len(writer_final.pages))
    print("Páginas numeradas (corridas):", contador_visivel)

asyncio.run(main())
