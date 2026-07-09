# MANUAL TÉCNICO DE RECONSTRUÇÃO
## Guia de Identidade da Barbearia — Academia da Barbearia
### Use este arquivo para recriar o ambiente e manter o padrão visual exato em qualquer chat

> **Como usar:** Anexe este arquivo junto com `style.css`, `style_conteudo.css`, `gerar_pdf_v2.py` e `capitulos_html_prontos.zip` na primeira mensagem do novo chat. Diga: *"Estou continuando o projeto do Guia de Identidade da Barbearia. Anexei o manual técnico e os arquivos de trabalho. Siga o manual para recriar o ambiente e continuar a produção."*

---

# 1. IDENTIDADE VISUAL — NUNCA ALTERAR

## Paleta de cores
```css
--preto-carvao:   #1A1A1A   /* texto, capa, CTA */
--branco-marfim:  #F5F2ED   /* fundo geral, texto sobre escuro */
--verde-quadro:   #2D4A3E   /* aberturas, ferramentas, h3 */
--dourado-terroso:#B8935A   /* acentos, linhas, labels, CTA */
```

## Tipografia
- **Títulos (h1, h2, capa, aberturas):** DM Serif Display, 400
- **Corpo, UI, legendas:** DM Sans, 400/700/italic
- **Fallback glifos especiais (✔ ○ ←):** DejaVu Sans Mono
- Fontes carregadas localmente via `@font-face` em `/build/fonts/*.woff2`
- Instalação: `npm install @fontsource/dm-serif-display @fontsource/dm-sans`

## Formato de página
- A4 (210×297mm), retrato
- Dois arquivos CSS distintos — **CRÍTICO, nunca misturar:**
  - `style.css` → páginas **full-bleed** (capa, sumário, abertura de cap., gancho, CTA): tem `@page { margin: 0; }`
  - `style_conteudo.css` → páginas **com header/footer** (todo o conteúdo): tem `@page { size: A4; }` (SEM margin:0)

---

# 2. ARQUITETURA DE ARQUIVOS

```
/home/claude/livro/build/
├── style.css                      # páginas full-bleed
├── style_conteudo.css             # páginas de conteúdo
├── gerar_pdf_v2.py                # script de geração
├── fonts/
│   ├── dm-serif-display-latin-400-normal.woff2
│   ├── dm-sans-latin-400-normal.woff2
│   ├── dm-sans-latin-700-normal.woff2
│   └── dm-sans-latin-400-italic.woff2
├── imagens/
│   ├── logo_AB.png
│   ├── 1_1.jpg  1_2.jpg  1_3.jpg  1_4.jpg   # cap. 1 (reais)
│   ├── 2_1.jpg  2_2.jpg  2_3_centralizado.jpg  2_4.jpg  # cap. 2 (reais)
│   # cap. 3 e 4: ainda como placeholder, inserir quando imagens chegarem
├── logo_base64.txt                # logo em base64 para header_template
├── parte1_apresentacao.html       # Capa + Sumário + Apresentação
├── parte2_capitulo1.html          # Cap. 1 completo (arquivo único)
├── parte3_capitulo2.html          # Cap. 2 completo (SEM CTA no final)
├── parte4_capitulo3_FINAL.html    # Cap. 3 montado
└── parte5_capitulo4_FINAL.html    # Cap. 4 montado (COM CTA no final)
```

**Para restaurar o ambiente num chat novo:**
```bash
mkdir -p /home/claude/livro/build/fonts /home/claude/livro/build/imagens
# Copiar style.css, style_conteudo.css, gerar_pdf_v2.py para /home/claude/livro/build/
# Descompactar capitulos_html_prontos.zip para /home/claude/livro/build/
# Instalar fontes:
cd /home/claude/livro/build
npm install @fontsource/dm-serif-display @fontsource/dm-sans
# Copiar woff2:
cp node_modules/@fontsource/dm-serif-display/files/dm-serif-display-latin-400-normal.woff2 fonts/
cp node_modules/@fontsource/dm-sans/files/dm-sans-latin-400-normal.woff2 fonts/
cp node_modules/@fontsource/dm-sans/files/dm-sans-latin-700-normal.woff2 fonts/
cp node_modules/@fontsource/dm-sans/files/dm-sans-latin-400-italic.woff2 fonts/
```

---

# 3. CABEÇALHO E RODAPÉ (padrão aprovado pelo Ivã)

- **Cabeçalho:** logo centralizada, 9.5mm de altura, em base64
- **Rodapé:** linha dourada com número de página centrado (`———— 1 ————`) + "ACADEMIA DA BARBEARIA" (esq.) + "www.academiadabarbearia.com.br" (dir.)
- **Numeração:** gerada por overlay reportlab APÓS fusão dos PDFs — não usa `pageNumber` nativo do Chromium (que reiniciaria a cada PDF parcial)
- Margens Playwright: `top: 22mm, bottom: 22mm`
- Páginas **sem** número: capa, sumário, aberturas de capítulo, ganchos, CTA

---

# 4. ESTRUTURA HTML DE CADA CAPÍTULO

Todo capítulo tem exatamente esta sequência de blocos:

```
[abertura-capitulo]   → full-bleed verde, SEM header/footer
[pagina-gancho]       → full-bleed (com foto real ou .sem-foto), SEM header/footer
[div.conteudo]        → tudo o mais, COM header/footer
  ├── pre.diagrama (status do Documento Fundador)
  ├── barra-progresso
  ├── texto narrativo de abertura
  ├── h2 "O que você aprenderá" + ul
  ├── h2 "Por que isso é importante"
  ├── h1.titulo-secao "Fundamentos"
  │   └── h3 + texto + caixas + figuras
  ├── pagina-missao.fundo-verde (Ferramenta canvas, se houver)
  ├── h1.titulo-secao "Aplicação Prática"
  ├── h2 "Erros mais comuns"
  ├── h1.titulo-secao "Estudo de Caso"
  │   └── div.estudo-caso + figuras + blocos Problema/Decisão/Resultado/Aprendizado
  ├── h1.titulo-secao "Ferramentas"
  │   └── div.grid-ferramentas > div.card-ferramenta (×3)
  ├── div.bloco-checklist (força nova página)
  ├── div.pagina-missao (Missão N — força nova página)
  ├── h2 "Resumo do Capítulo N"
  ├── h2 "Leituras Complementares"
  └── div.status-fechamento-capitulo
```

---

# 5. TODOS OS COMPONENTES COM CÓDIGO HTML EXATO

## 5.1 Abertura de capítulo (full-bleed verde)
```html
<div class="abertura-capitulo">
  <div class="abertura-conteudo">
    <div class="cap-label">Capítulo N</div>
    <h1>Título do capítulo</h1>
    <div class="linha-dourada"></div>
    <div class="epigrafe">Frase curta e impactante que resume o espírito do capítulo.</div>
  </div>
</div>
```

## 5.2 Página de gancho (full-bleed — COM foto real)
```html
<div class="pagina-gancho">
  <img src="imagens/N_N.jpg" alt="">
  <div class="gancho-overlay"></div>
  <div class="gancho-conteudo">
    <div class="gancho-tag">Neste capítulo</div>
    <div class="gancho-frase">Frase de gancho que cria expectativa — máximo 2 linhas.</div>
  </div>
</div>
```

## 5.3 Página de gancho (SEM foto — usar quando imagem ainda não foi gerada)
```html
<div class="pagina-gancho sem-foto">
  <div class="gancho-conteudo">
    <div class="gancho-tag">Neste capítulo</div>
    <div class="gancho-frase">Frase de gancho que cria expectativa.</div>
    <div class="gancho-linha"></div>
  </div>
</div>
```

## 5.4 Diagrama de status + barra de progresso (início e fim de cada capítulo)
```html
<pre class="diagrama diagrama-topo">DOCUMENTO FUNDADOR DA BARBEARIA

Capítulo 1 — Fundamentos        ✔  Primeira frase da marca registrada
Capítulo 2 — Identidade         ✔  Propósito · Público · Posicionamento · Personalidade · Valores
Capítulo 3 — Estilo             ← você está aqui
Capítulo 4 — Visual             ○
Capítulo 5 — Presença Digital   ○
Capítulo 6 — Ambiente           ○
Capítulo 7 — Experiência        ○
Capítulo 8 — Gestão da Marca    ○</pre>
<div class="barra-progresso">
  <div class="trilho"><div class="preenchido" style="width:25%"></div></div>
  <div class="legenda-progresso">[ 2 de 8 camadas concluídas ]</div>
</div>
<pre class="diagrama diagrama-base">
Neste capítulo você preencherá a terceira camada.</pre>
```
> **Percentuais da barra:** Cap.1=12.5% · Cap.2=25% · Cap.3=37.5% · Cap.4=50% · Cap.5=62.5% · Cap.6=75% · Cap.7=87.5% · Cap.8=100%

## 5.5 Figura com imagem REAL
```html
<div class="figura">
  <img src="imagens/N_N.jpg" alt="Descrição da imagem">
  <div class="legenda"><span class="num">Fig. N.N</span> — Legenda descritiva e didática da imagem.</div>
</div>
```

## 5.6 Figura PLACEHOLDER (quando a imagem ainda não foi gerada)
```html
<div class="figura-placeholder">
  <div class="placeholder-box">
    <div class="placeholder-icone">🖼</div>
    <div class="placeholder-texto">Imagem a ser inserida: descrição do que a imagem deve mostrar.</div>
  </div>
  <div class="legenda"><span class="num">Fig. N.N</span> — Legenda real que ficará no PDF final.</div>
</div>
```
> **Para substituir pelo real:** trocar `<div class="figura-placeholder">...</div>` por `<div class="figura"><img src="imagens/N_N.jpg">...</div>`, mantendo a `.legenda` igual.

## 5.7 Caixa de destaque (dica / atenção / definição)
```html
<div class="caixa-destaque">
  <span class="icone-label">💡 Dica rápida</span>  <!-- ou ⚠️ Atenção, ou sem icone-label para definição -->
  <p>Conteúdo do destaque.</p>
</div>
```

## 5.8 Caixa de método (fundo verde — para instruções do método)
```html
<div class="caixa-metodo">
  <p><strong>Objetivo</strong><br>Texto do objetivo.</p>
  <p><strong>Tempo estimado</strong><br>30 a 45 minutos</p>
</div>
```

## 5.9 Card de ferramenta (estilo "app" — sempre em grid de 2-3 colunas)
```html
<div class="grid-ferramentas">

  <div class="card-ferramenta">
    <div class="card-icone">📌</div>
    <span class="card-nome">Nome da Ferramenta</span>
    <div class="card-badges">
      <span class="badge">Categoria</span>
      <span class="badge">Gratuito</span>
    </div>
    <div class="card-uso">
      <strong>Para que serve:</strong> descrição do uso.<br>
      <strong>Como usar:</strong> instrução prática.
    </div>
  </div>

</div>
```

## 5.10 Estudo de caso
```html
<div class="estudo-caso">
  <span class="label-caso">Estudo de caso</span>
  <h3>Nome — Subtítulo do caso</h3>
  <p>Parágrafo introdutório do personagem e situação.</p>
</div>

<p><strong>O problema</strong></p>
<p>Texto...</p>

<p><strong>A decisão</strong></p>
<p>Texto...</p>

<p><strong>O resultado</strong></p>
<p>Texto...</p>

<p><strong>O aprendizado</strong></p>
<p>Texto...</p>
```

## 5.11 Checklist (SEMPRE em bloco-checklist para não quebrar entre páginas)
```html
<div class="bloco-checklist">
  <h2>Checklist do Capítulo N</h2>
  <div class="checklist-item"><div class="check-box"></div><div>Item do checklist.</div></div>
  <div class="checklist-item"><div class="check-box"></div><div>Item do checklist.</div></div>
</div>
```

## 5.12 Missão (página própria, sempre após o checklist)
```html
<div class="pagina-missao">
  <div class="missao-tag">Agora é a sua vez</div>
  <div class="missao-numero">0N</div>
  <h1 class="titulo-secao">Missão N — Título da missão</h1>
  <div class="linha-dourada-missao"></div>
  <div class="missao-corpo">

    <div class="caixa-metodo">
      <p><strong>Objetivo</strong><br>Texto.</p>
      <p><strong>Tempo estimado</strong><br>X a Y minutos</p>
      <p><strong>Materiais necessários</strong><br>Texto.</p>
    </div>

    <p><strong>Passos</strong></p>
    <ol>
      <li>Passo 1</li>
      <li>Passo 2</li>
    </ol>

    <div class="caixa-destaque">
      <p><strong>Resultado esperado</strong><br>Texto.</p>
      <p><strong>Critério de conclusão</strong><br>Texto.</p>
    </div>

  </div>
</div>
```

## 5.13 Ferramenta-canvas (página própria, fundo verde, com campos de preenchimento)
```html
<div class="pagina-missao fundo-verde">
  <div class="missao-tag">Ferramenta de trabalho</div>
  <h1 class="titulo-secao">Ferramenta 0N — Nome da Ferramenta</h1>
  <div class="linha-dourada-missao"></div>

  <div class="missao-corpo">
    <div class="caixa-metodo">
      <p class="canvas-intro"><em>Instrução de como usar.</em></p>

      <hr class="separador-canvas">

      <!-- Campo com linha livre (para respostas longas) -->
      <div class="campo-grupo">
        <span class="campo-label">LABEL DO CAMPO</span>
        <span class="campo-sublabel">Instrução sobre o que escrever aqui.</span>
        <div class="linhas-escrita">
          <div class="linha"></div>
          <div class="linha"></div>
        </div>
      </div>

      <hr class="separador-canvas">

      <!-- Campo inline (label + linha na mesma linha, para respostas curtas) -->
      <div class="campo-grupo">
        <span class="campo-label">PERSONALIDADE</span>
        <div class="linha-campo-inline">
          <span>Arquétipo principal:</span>
          <div class="campo-preencher inline"></div>
        </div>
      </div>

    </div>
  </div>
</div>
```

> **Regra de campo:** use `.linhas-escrita > .linha` para respostas livres longas (ex: descrever público, listar valores). Use `.linha-campo-inline` para campos curtos com label (ex: nome, arquétipo, cor hex).

## 5.14 Fechamento de capítulo (status centralizado)
```html
<div class="status-fechamento-capitulo">
  <pre class="diagrama diagrama-topo">DOCUMENTO FUNDADOR DA BARBEARIA — STATUS APÓS CAPÍTULO N

Capítulo 1 — Fundamentos        ✔
Capítulo 2 — Identidade         ✔
Capítulo N — Nome               ✔  Resumo do que foi concluído
...</pre>
  <div class="barra-progresso">
    <div class="trilho"><div class="preenchido" style="width:XX%"></div></div>
    <div class="legenda-progresso">[ N de 8 camadas — XX% concluído ]</div>
  </div>
  <pre class="diagrama diagrama-base">
Próxima camada: Nome → Capítulo N+1</pre>
  <p class="status-frase-fechamento">Frase de celebração — ex: "Três camadas construídas. Cinco para completar o Documento Fundador."</p>
</div>
```

## 5.15 CTA final (só no ÚLTIMO capítulo do livro/amostra)
```html
<div class="cta-compra">
  <div class="cta-conteudo">
    <h2>O DNA da sua barbearia continua.</h2>
    <div class="linha-dourada"></div>
    <p>Você acabou de construir N camadas: [resumir o que foi feito].</p>
    <p>Nos próximos X capítulos, você vai [descrever o que vem].</p>
    <p>A versão completa do Guia de Identidade da Barbearia está disponível agora.</p>
    <div class="botao-cta">GARANTIR O GUIA COMPLETO</div>
  </div>
</div>
```
> **Regra:** sempre que um novo capítulo passa a ser o último, mover este bloco do capítulo anterior para o novo último, atualizando o texto.

---

# 6. CAPA (aprovada — atualizar só nome/subtítulo)

```html
<div class="capa">
  <div class="capa-conteudo">
    <div class="selo">Academia da Barbearia</div>
    <div class="kit-label">Kit Fundação da Barbearia — Módulo 1</div>
    <h1>Guia de Identidade<br>da Barbearia</h1>
    <div class="linha-dourada"></div>
    <div class="subtitulo">Construa o DNA da Sua Barbearia</div>
    <img class="logo-img" src="imagens/logo_AB.png" alt="Academia da Barbearia">
    <div class="academia-footer">Amostra gratuita — Capítulos 1 e 2</div>
  </div>
</div>
```
> **Nota:** o `academia-footer` muda conforme a versão (amostra vs. completo). Na versão completa, remover ou substituir por "Kit Fundação da Barbearia — Módulo 1".

---

# 7. COMO MONTAR UM CAPÍTULO NOVO (passo a passo testado)

## Passo 1 — Criar as partes em arquivos separados

**Parte A** (arquivo HTML completo com `<html><body>`):
- Abertura + gancho + início do conteúdo (até os Fundamentos, aproximadamente)

**Partes B, C, D...** (fragmentos puros, SEM `<html><head><body>`):
- Cada parte é só o HTML interno, sem tags de abertura
- ATENÇÃO: não deixar `</div></body></html>` sobrando no final — ou se deixar, limpar na montagem

## Passo 2 — Montar o arquivo FINAL

```python
from bs4 import BeautifulSoup

with open('parteNA.html', encoding='utf-8') as f:
    soup_a = BeautifulSoup(f.read(), 'html.parser')

abertura = str(soup_a.body.find('div', class_='abertura-capitulo'))
gancho   = str(soup_a.body.find('div', class_='pagina-gancho'))
conteudo_a = soup_a.body.find('div', class_='conteudo').decode_contents()

with open('parteNb.html', encoding='utf-8') as f:
    html_b = f.read()

with open('parteNc.html', encoding='utf-8') as f:
    html_c = f.read()
# Limpar tags residuais se existirem:
html_c = html_c.replace('</div>\n\n</body>\n</html>', '').rstrip()

final_html = f"""<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Capítulo N</title><link rel="stylesheet" href="style.css"></head>
<body>
{abertura}
{gancho}
<div class="conteudo">
{conteudo_a}
{html_b}
{html_c}
</div>
</body>
</html>"""

with open('parteN_capituloN_FINAL.html', 'w', encoding='utf-8') as f:
    f.write(final_html)
```

## Passo 3 — Validar antes de gerar o PDF

```python
from bs4 import BeautifulSoup
with open('parteN_capituloN_FINAL.html', encoding='utf-8') as f:
    soup = BeautifulSoup(f.read(), 'html.parser')

# Valores esperados:
print('abertura-capitulo:', len(soup.find_all('div', class_='abertura-capitulo')))   # 1
print('pagina-gancho:', len(soup.find_all('div', class_='pagina-gancho')))            # 1
print('conteudo (top):', len(soup.body.find_all('div', class_='conteudo', recursive=False)))  # 1
print('pagina-missao:', len(soup.find_all('div', class_='pagina-missao')))            # nº de ferramentas+missões
print('bloco-checklist:', len(soup.find_all('div', class_='bloco-checklist')))        # 1
print('status-fechamento:', len(soup.find_all('div', class_='status-fechamento-capitulo'))) # 1
```

## Passo 4 — Adicionar ao script e gerar

Em `gerar_pdf_v2.py`, dentro de `main()`, adicionar na lista:
```python
arquivos_capitulos = [
    ('parte2_capitulo1.html', 'cap1'),
    ('parte3_capitulo2.html', 'cap2'),
    ('parte4_capitulo3_FINAL.html', 'cap3'),
    ('parte5_capitulo4_FINAL.html', 'cap4'),
    ('parte6_capitulo5_FINAL.html', 'cap5'),  # ← adicionar aqui
]
```

Rodar:
```bash
cd /home/claude/livro/build && python3 gerar_pdf_v2.py
```

---

# 8. ARMADILHAS CONHECIDAS — NÃO REPITA

| Problema | Causa | Solução |
|---|---|---|
| Capa não cobre a página inteira | Overflow horizontal (linhas longas em `pre` ou `_____` em `<p>`) | `word-break: break-word` em `p` e `caixa-metodo p` já está no CSS |
| Header/footer sobrepõe texto a partir da 2ª página | `@page { margin: 0 }` do CSS vence a margem do Playwright | Usar `style_conteudo.css` (sem esse margin) para páginas de conteúdo |
| Numeração de página reinicia a cada capítulo | Chromium numera cada PDF parcial isoladamente | Numeração é feita por overlay reportlab pós-fusão — não usar `pageNumber` nativo |
| Título da ferramenta isolado numa página vazia | `page-break-before: always` na `.pagina-missao.fundo-verde` força quebra antes do título, mas o conteúdo vai para a página seguinte | Nunca colocar `page-break-before` diretamente nessa classe quando ela vem após uma `.figura` |
| Full-bleed não funciona dentro de páginas com header/footer | A margem do Playwright reserva área para header/footer que o CSS não pode invadir | Canvas de ferramenta usa `border-radius` e ocupa a largura útil, não tenta sangrar até a borda |
| Tags residuais `</body></html>` no meio do HTML montado | Partes B/C/D geradas com fechamento e combinadas com BeautifulSoup | Fazer `replace('</div>\n\n</body>\n</html>', '')` antes de concatenar |
| Bloco de status do Documento Fundador gera página vazia | `page-break-inside: avoid` empurra o bloco inteiro para a próxima página | Usar `.status-fechamento-capitulo` com `min-height: 220mm; display:flex; justify-content:center` |

---

# 9. NOME DO PRODUTO E DO DOCUMENTO

| Elemento | Nome aprovado |
|---|---|
| **Título do produto** | Guia de Identidade da Barbearia |
| **Subtítulo do produto** | Construa o DNA da Sua Barbearia |
| **Tagline de divulgação** | O método completo para definir o nome, a alma e a identidade da sua barbearia — do propósito à presença digital |
| **Nome do documento principal** | DNA — Documento de Nome e Alma |
| **Nome interno do sistema** | Kit Fundação da Barbearia — Módulo 1 |

---

# 10. ESTADO ATUAL DO PROJETO

| Capítulo | Status | Imagens |
|---|---|---|
| Apresentação | ✅ Pronto | N/A |
| Capítulo 1 — Muito além do corte de cabelo | ✅ Pronto | ✅ Fig. 1.1, 1.2, 1.3, 1.4 (reais) |
| Capítulo 2 — Descobrindo a identidade | ✅ Pronto | ✅ Fig. 2.1, 2.2, 2.3, 2.4 (reais) |
| Capítulo 3 — Conhecendo os estilos | ✅ Pronto | ⏳ Fig. 3.1, 3.2, 3.3, 3.4 (placeholder) |
| Capítulo 4 — Elementos visuais da marca | ✅ Pronto | ⏳ Fig. 4.1, 4.2, 4.3, 4.4 (placeholder) |
| Capítulo 5 — Presença digital | ⏳ Fazer | ⏳ Fig. 5.1, 5.2, 5.3, 5.4 |
| Capítulo 6 — Ambiente | ⏳ Fazer | ⏳ Fig. 6.1, 6.2, 6.3, 6.4 |
| Capítulo 7 — Experiência | ⏳ Fazer | ⏳ Fig. 7.1, 7.2, 7.3, 7.4 |
| Capítulo 8 — Gestão da marca | ⏳ Fazer | ⏳ Fig. 8.1, 8.2, 8.3, 8.4 |
| Sumário (com páginas reais) | ⏳ Refazer ao final | — |

**PDF atual:** 104 páginas, numeração corrida 1→93.

**Próxima sessão recomendada:**
1. Inserir imagens reais dos cap. 3 e 4 (substituir placeholders)
2. Atualizar a capa com o novo nome/subtítulo aprovado
3. Produzir capítulos 5 e 6
4. Gerar PDF atualizado
