# ESPECIFICAÇÃO TÉCNICA E EDITORIAL
## Guia da Identidade da Barbearia — Academia da Barbearia
### Documento de referência para produção dos Capítulos 5 a 8

> Este documento consolida todas as decisões de design, pipeline técnico e revisão editorial tomadas na produção da Amostra completa (Apresentação + Capítulos 1-4, 104 páginas). **Use-o como contexto ao abrir um novo chat** — anexe este arquivo e diga "estou continuando o projeto do Guia da Identidade da Barbearia, capítulos 1-4 já estão prontos, preciso fazer os capítulos 5-8".
>
> **Versão 3** — atualiza a Seção 3 (pipeline) e a Seção 7 (próximos passos) para refletir o estado real do código após a produção dos Capítulos 3 e 4, incluindo numeração de página corrida via overlay, geração dinâmica de N capítulos, e o sistema de placeholders de imagem. Adiciona a Seção 8 com o checklist exato de retomada.

---

# 1. IDENTIDADE VISUAL (já validada, não mudar)

## Paleta de cores
| Nome | Hex | Uso |
|---|---|---|
| Preto Carvão | `#1A1A1A` | Texto principal, capa, CTA, fundo de páginas full-bleed escuras |
| Branco Marfim | `#F5F2ED` | Fundo geral do livro, texto sobre fundo escuro |
| Verde Quadro Negro | `#2D4A3E` | Caixas de método/ferramenta, abertura de capítulo, subtítulos H3 |
| Dourado Terroso | `#B8935A` | Acentos, linhas divisórias, labels, destaque de citações, CTA |

## Tipografia
- **DM Serif Display** — títulos (h1, h2, capa, abertura de capítulo)
- **DM Sans** — corpo de texto, UI, legendas (regular 400, bold 700, italic 400)
- Fontes carregadas localmente via `@font-face` em `/build/fonts/*.woff2` (instaladas via npm `@fontsource/dm-serif-display` e `@fontsource/dm-sans` — não depende de internet em runtime)
- Fallback para glifos especiais (`░ █ ✔ ○ ←`): `DejaVu Sans Mono` — necessário porque DM Sans não cobre certos blocos Unicode no Chromium headless

## Formato de página
- A4 (210x297mm), retrato
- Margens de conteúdo: 22mm laterais, 25mm topo/base (mais detalhes na seção de pipeline)

---

# 2. SISTEMA DE COMPONENTES (estado real, todos já implementados e em uso)

Estes são os componentes reutilizáveis do livro. Para os capítulos 5-8, sempre reaproveitar estas classes (em `style.css` e `style_conteudo.css`) em vez de criar novas.

| Componente | Classe CSS | Status |
|---|---|---|
| Caixa de destaque (dica/atenção/definição) | `.caixa-destaque` + `.icone-label` | ✅ Em uso. Ícone (💡/⚠️) vai dentro de `.icone-label` |
| Caixa de método/ferramenta (fundo verde) | `.caixa-metodo` | ✅ Em uso |
| Diagrama ASCII / progresso | `pre.diagrama` (`.diagrama-topo`/`.diagrama-base`) + `.barra-progresso` | ✅ Em uso. Barra de progresso só nas páginas de status (abertura/fim de capítulo) |
| Estudo de caso | `.estudo-caso` + `.label-caso` | ✅ Em uso |
| Checklist (bloco protegido) | `.bloco-checklist` (wrapper) + `.checklist-item` + `.check-box` | ✅ Em uso. O wrapper força `page-break-before:always` + `avoid` — todo o checklist sempre cabe numa página só |
| Card de ferramenta (estilo "app") | `.grid-ferramentas` + `.card-ferramenta` (`.card-icone`, `.card-nome`, `.card-badges`, `.badge`, `.card-uso`) | ✅ Em uso desde o Cap. 1, expandido nos Cap. 3-4 |
| Card de estilo (Cap. 3, reaproveitável p/ qualquer comparação categórica) | `.card-estilo` (`.estilo-nome`, `.estilo-comunica`, `.estilo-elementos`, `.estilo-afinidade-grid`, `.afinidade-col.positiva/.negativa`, `.estilo-cuidado`) + `.grid-estilos-2col` | ✅ Novo no Cap. 3 |
| Tabela de referência estilizada | `table.tabela-referencia` | ✅ Novo no Cap. 3, reaproveitado no Cap. 4 (tabela de cores) |
| Matriz de decisão (fundo escuro) | `table.matriz-decisao` | ✅ Novo no Cap. 3 (Ferramenta 02) |
| Figura com legenda | `.figura` + `.legenda` + `.num` | ✅ Em uso. Legenda em 11pt (+15%, Correção 2) |
| Placeholder de imagem pendente | `.figura-placeholder` (`.placeholder-box`, `.placeholder-icone`, `.placeholder-texto`) | ✅ Novo nos Cap. 3-4 — usar sempre que a imagem ainda não foi gerada |
| Citação | `blockquote` | ✅ Em uso |
| Abertura de capítulo (full-bleed verde) | `.abertura-capitulo` + `.abertura-conteudo` | ✅ Em uso, não mexer |
| Página de gancho (full-bleed, com ou sem foto) | `.pagina-gancho` (com foto) / `.pagina-gancho.sem-foto` (variante sem imagem) + `.gancho-tag`, `.gancho-frase`, `.gancho-linha` | ✅ Novo na V2, variante `.sem-foto` nova nos Cap. 3-4 |
| Página de Missão / Ferramenta em destaque | `.pagina-missao` (fundo marfim) / `.pagina-missao.fundo-verde` (fundo verde) + `.missao-tag`, `.missao-numero`, `.missao-corpo` | ✅ Em uso — toda Missão e toda Ferramenta-canvas usa este wrapper |
| Campos de formulário (canvas) | `.campo-grupo` (+ `.grupo-longo` se for extenso), `.campo-label`, `.campo-sublabel`, `.campo-nota`, `.campo-preencher` (+ `.curto`/`.inline`/`.curto-num`), `.linha-campo-inline`, `.linhas-escrita` + `.linha`, `hr.separador-canvas` | ✅ Em uso — ver Seção 4-B Correção 6b para a lógica exata de quando usar `.linhas-escrita` (campo livre) vs `.campo-preencher.inline` (campo rotulado curto) |
| Fechamento de capítulo (respiro centralizado) | `.status-fechamento-capitulo` + `.status-frase-fechamento` | ✅ Novo na V2 — sempre envolver o `pre.diagrama` de status final + frase de fechamento nisso |
| Capa | `.capa` + `.capa-conteudo` | ✅ Aprovada, não mexer |
| Sumário | `.sumario` + `.sumario-item` | ⚠️ Pendente — só será refeito quando os 8 capítulos estiverem prontos (decisão do Ivã) |
| CTA final | `.cta-compra` + `.cta-conteudo` | ✅ Aprovada. **Mover para o último capítulo real a cada nova sessão** — o texto precisa refletir quantas camadas já foram construídas (ver Seção 8) |

---

# 3. PIPELINE TÉCNICO DE GERAÇÃO DO PDF (estado real, pós Capítulos 3-4)

## Stack
- HTML + CSS → PDF via **Playwright (Chromium headless)**
- Fontes locais (sem internet em runtime)
- Imagens convertidas para `.jpg` otimizado (qualidade 82, via Pillow)
- Fusão de PDFs parciais via `pypdf`
- Numeração de página via **overlay com reportlab** (não usa o `pageNumber` nativo do Chromium — ver Problema 3 abaixo)

## ⚠️ Armadilhas descobertas e resolvidas — documentar para não repetir

**Problema 1 — Capa/full-bleed não cobria a página inteira (sobrava margem marfim à direita/baixo)**
Causa: overflow horizontal em `pre.diagrama` (linhas longas sem quebra) e em sequências de `_____` (campos de formulário) dentro de `<p>`, que forçavam o `body` a crescer além do viewport.
Solução: `word-break: break-word` + `overflow-wrap: break-word` em `p` e `.caixa-metodo p`; `max-width: 100%; box-sizing: border-box` universal em `*`; viewport explícito do Playwright em 794x1123px (A4 a 96dpi).

**Problema 2 — Cabeçalho/rodapé nativo do Chromium sobrepondo o texto a partir da 2ª página de cada seção**
Causa: a regra `@page { margin: 0; }` no CSS vence o parâmetro `margin` do Playwright nas páginas internas de um documento longo.
Solução: dois arquivos CSS — `style.css` (com `@page margin:0`, para páginas full-bleed) e `style_conteudo.css` (sem esse `margin:0`, para páginas com header/footer nativo).

**Problema 3 — Numeração de página reiniciava em cada capítulo (Correção do Ivã, resolvida)**
Causa: cada PDF parcial é renderizado isoladamente pelo Chromium, então o `<span class="pageNumber">` nativo do `footer_template` sempre reinicia do 1 em cada parte.
Solução definitiva: o `FOOTER_TEMPLATE` **não usa mais `pageNumber` nativo** — deixa um espaço vazio reservado na linha dourada. Depois que todos os PDFs parciais são fundidos em um único arquivo, um overlay é desenhado via `reportlab` percorrendo a lista `pagina_numerada_flags` (que sabe quais páginas têm header/footer) e numerando sequencialmente só essas, com `merge_page()` do pypdf. Páginas full-bleed (capa, aberturas de capítulo, ganchos, CTA) não recebem número.

**Problema 4 — Full-bleed com margem negativa não funciona dentro de páginas com header/footer nativo**
Tentativa de fazer o canvas verde de uma Ferramenta "sangrar" até a borda usando `margin-left/right: -22mm` falhou — a margem do Playwright não permite escapar pra área do header/footer. Solução: abandonar full-bleed nesses casos; usar bloco com `border-radius` ocupando a largura útil entre as margens.

**Problema 5 — `page-break-inside: avoid` em blocos finais pode gerar página com vazio grande**
Quando um bloco pequeno (ex: diagrama de status do Documento Fundador) não cabe no resto da página, é empurrado inteiro pra próxima, sobrando espaço vazio abaixo. Solução: envolver em container com `min-height: 220mm; display:flex; justify-content:center`, virando um respiro intencional, com frase de fechamento.

**Problema 6 — Montagem manual de HTML com BeautifulSoup gera tags órfãs**
Ao montar capítulos longos em vários arquivos `.html` parciais (parte4_capitulo3.html, parte4b_estilos.html, etc.) que são concatenados depois, fácil deixar `</body></html>` sobrando no meio do texto ou abrir uma `<div class="conteudo">` duas vezes. Mitigação: sempre validar a contagem de divs-chave depois de montar (`abertura-capitulo`, `pagina-gancho`, `pagina-missao`, `bloco-checklist`, `status-fechamento-capitulo`) antes de gerar o PDF — ver exemplo de validação na Seção 8.

## Arquitetura de geração (`gerar_pdf_v2.py`) — versão dinâmica atual

O script **não usa mais uma lista fixa de 7 partes**. Hoje funciona assim:

```python
def extrair_capitulo(arquivo_html):
    # Lê um arquivo de capítulo já combinado e devolve:
    # (div.abertura-capitulo, div.pagina-gancho, div.conteudo, div.cta-compra ou None)

def proxima_parte(div_html, css_file, com_header_footer, prefixo):
    # Escreve o HTML wrapper, registra na lista global partes,
    # incrementa contador, gera gen_NN_prefixo.html / gen_NN.pdf

arquivos_capitulos = [
    ('parte2_capitulo1.html', 'cap1'),
    ('parte3_capitulo2.html', 'cap2'),
    ('parte4_capitulo3_FINAL.html', 'cap3'),
    ('parte5_capitulo4_FINAL.html', 'cap4'),
]
```

Para cada capítulo na lista, extrai abertura → gancho → conteúdo e chama `proxima_parte()` na ordem certa. O CTA é pego do último capítulo que tiver um (hoje é o Capítulo 4) e adicionado ao final de tudo.

**Para os capítulos 5-8: só precisa**
1. Criar o(s) arquivo(s) HTML do capítulo (pode ser em partes, concatenadas como foi feito pros capítulos 3-4 — ver Seção 8 para o passo a passo exato)
2. Adicionar a tupla na lista `arquivos_capitulos`
3. Mover o CTA do arquivo do capítulo anterior pro novo último capítulo, atualizando o texto com o número de camadas certo
4. Rodar `python3 gerar_pdf_v2.py`

## Cabeçalho/Rodapé (estado final, todas as correções do Ivã aplicadas)
- **Cabeçalho**: logo centralizada, 9.5mm de altura (aumentada da V2, que era 6mm), em base64 dentro do HEADER_TEMPLATE
- **Rodapé**: linha dourada com número de página centrado nela mesma (tipo "———— 1 ————") + linha de "ACADEMIA DA BARBEARIA" / "www.academiadabarbearia.com.br" abaixo
- Margens reservadas no Playwright: top 22mm, bottom 22mm
- Importante: o número real vem do overlay reportlab pós-fusão, não do footer_template

## Placeholders de imagem (decisão desta sessão)
Para capítulos cujas imagens ainda não foram geradas, usa-se o componente `.figura-placeholder`: uma caixa pontilhada com ícone e texto descritivo do que a imagem deve mostrar, com a legenda real abaixo. Quando a imagem for gerada, basta substituir pela div `.figura` com a `img` real, reaproveitando a mesma legenda.

---

# 4. REVISÃO EDITORIAL — STATUS DE IMPLEMENTAÇÃO

Baseado no documento `REVISAO_EDITORIAL_PRODUTO001_V1.md` do Ivã. Decisão registrada: **conteúdo aprovado, não reescrever — só experiência editorial.**

| # | Revisão | Status | Observação |
|---|---|---|---|
| 01 | Aumentar percepção de livro (respiros, margens, mais páginas) | 🔲 Pendente | Aplicar ao longo da produção dos cap. 3-8 |
| 02 | Hierarquia tipográfica (H1/H2/H3 mais contrastantes, frases-chave destacadas) | 🔲 Pendente | Identifiquei ~8 frases-candidatas a destaque na análise página a página |
| 03 | Identidade própria por componente (Dica/Atenção/Missão/Ferramenta/Checklist) | 🔲 Pendente | Maior trabalho de CSS pendente — ver seção 2 |
| 04 | Figuras didáticas (não só ilustrativas — com chamadas, setas, comparação) | 🔲 Pendente | Legendas atuais são descritivas; precisam ensinar |
| 05 | Páginas de impacto (frase isolada, página cheia) | 🔲 Pendente | Candidatas já mapeadas (ver lista abaixo) |
| 06 | Melhorar ritmo (distribuir densidade, nunca cortar conteúdo) | 🔲 Pendente | Seção dos 5 elementos do Cap. 2 é a mais crítica hoje |
| 07 | Direção de arte das fotos (tratamento, luz, temperatura consistentes) | 🔲 Pendente | Já há um padrão decente nas 8 fotos geradas — formalizar preset |
| 08 | Assinatura editorial recorrente | ✅ **Feito nesta sessão** | Logo no cabeçalho + linha dourada + site no rodapé |
| 09 | Documento Fundador como elemento visual recorrente (barra de progresso) | ✅ **Já implementado e aprovado** | Só nas páginas de status/abertura, conforme decisão do Ivã — não em todo rodapé |
| 10 | Pausas editoriais ("Pare um minuto...") | 🔲 Pendente | Fácil de aplicar nas Missões dos próximos capítulos |
| 11 | Padronização das fotografias (documental, luz natural, Brasil) | 🔲 Pendente | Prompts já seguem esse padrão — confirmar nos próximos capítulos |
| 12 | Valor percebido geral ("parece livro de R$197") | 🔲 Pendente | Resultado cumulativo de todas as outras revisões |

## Páginas de impacto já identificadas (candidatas para Revisão 05)
Estas frases foram extraídas durante a análise página-por-página e são candidatas fortes a ganhar página inteira isolada (fundo escuro, tipografia grande, centralizada):

1. "Este documento não pertence a este guia. Pertence à sua barbearia." (Apresentação)
2. "Está, em uma palavra, na marca." (Cap. 1, abertura)
3. "Logotipo é um símbolo. Marca é uma percepção." (Cap. 1, Fundamentos)
4. "1 de 8 camadas construídas." (Cap. 1, fim — variação da barra de progresso)
5. "É uma barbearia de todos. E por isso, na prática, não é de ninguém." (Cap. 2, abertura)
6. "Você não corta cabelo. Você transforma como as pessoas se sentem." (Cap. 2, Propósito)
7. "Identidade não exige reforma. Exige decisão." (Cap. 2, Estudo de caso Daniela)

**Padrão a seguir para os capítulos 3-8**: ao final de cada capítulo, mapear 1-2 frases equivalentes na revisão editorial, antes de montar o HTML.

## Pontos de maior ganho visual ainda não implementados
- **6 arquétipos de marca (Cap. 2)** → virar 6 mini-cards com ícone, hoje é texto corrido
- **Numeração gráfica grande (01-05)** para os 5 elementos de identidade e outras sequências longas
- **Mini-headers dourados** nos 4 blocos de Estudo de Caso (Problema/Decisão/Resultado/Aprendizado)
- **Cards de ferramenta** em vez de texto corrido com Tipo/Plataforma/Custo

---

# 4-B. SEGUNDA RODADA DE REVISÃO EDITORIAL (Correções do Ivã, pós cabeçalho/rodapé)

> **Status: implementada em 29/06.** Todas as 10 correções abaixo foram aplicadas nos Capítulos 1-2 e validadas visualmente. Detalhes de cada implementação documentados abaixo — servem de referência ao replicar nos Capítulos 3-8.

Esta rodada foi feita sobre a Amostra já com a correção de capa e cabeçalho/rodapé (seção 3). É **mais granular e prescritiva** que a V1 — entra em decisões de layout específicas.

## ✅ CORREÇÃO 1 (a mais importante) — Falta de respiração / ritmo
**Diagnóstico do Ivã:** páginas 27, 29, 30, 33, 40 são "texto puro" e cansam.
**Regra fixada:** a cada 2 páginas de leitura intensa, deve existir 1 página de "alívio visual" — imagem grande, esquema, quadro, infográfico ou frase de impacto.
**Como aplicar:** ao montar o HTML de cada capítulo, contar páginas de texto corrido consecutivas; se passar de 2, inserir manualmente um dos elementos de alívio antes de continuar. Isso é checagem manual a cada capítulo, não automatizável — fazer parte do checklist de produção (seção 5).

## ✅ CORREÇÃO 2 — Legendas de figura pequenas demais
**Diagnóstico:** `Fig. 1.2`, `Fig. 1.3`, `Fig. 2.3` etc. "quase desaparecem".
**Ação:** aumentar o tamanho da legenda em ~15%.
**Implementação técnica:** em `style.css` / `style_conteudo.css`, classe `.figura .legenda`: subir de `9.5pt` para `~11pt` (15% de aumento). Conferir se ainda cabe bem sem quebrar layout em imagens menores.

## ✅ CORREÇÃO 4 — Abertura de capítulo "seca" demais
**Diagnóstico:** a página verde do capítulo é bonita, mas depois entra direto no diagrama do Documento Fundador — falta transição.
**Solução fixada pelo Ivã:** criar uma **página intermediária** entre a abertura (verde) e o conteúdo: uma frase de gancho + imagem enorme, full-bleed, sozinha. Exemplo dado: *"Neste capítulo você descobrirá por que duas barbearias com a mesma técnica podem ter resultados completamente diferentes."*
**Efeito esperado:** criar expectativa antes do conteúdo começar.
**Implementação:** novo componente full-bleed (provavelmente reaproveitando a Fig. 1.1 ou imagem de abertura de cada capítulo, já existente) com a frase-gancho sobreposta ou abaixo. Entra na sequência de PDFs parciais como uma nova "fatia" full-bleed, entre `abertura-capitulo` e `conteúdo`.

## ✅ CORREÇÃO 6 — Ferramentas como cards + bugs da Ferramenta 01
Duas partes:

**6a. Ferramentas em formato de card (não lista tipo manual)**
Hoje: "Ferramenta / Tipo / Plataforma / Como usar" em texto corrido.
Pedido: tratamento visual de **card de aplicativo** — aumenta MUITO o valor percebido (palavras do Ivã).
Implementação: novo componente `.card-ferramenta` — provavelmente grid de 2-3 colunas, com "ícone" (ou inicial estilizada), nome em destaque, badges para Tipo/Plataforma/Custo, e texto de uso por baixo.

**6b. Bugs visuais identificados na Ferramenta 01 — Mapa Fundamental da Marca**
- O diagrama de hexágonos (Fig. 2.3, "5 elementos") está **descentralizado**.
- O canvas da Ferramenta 01 (fundo verde) está **"todo desconfigurado"**.
- Os campos de preenchimento tipo `Nome da barbearia: _______________________________________________` ficam mal formatados (linha de underscore quebrando estranho).
**Solução fixada:** substituir as sequências de `___` por:
  - uma única linha de resposta por campo (ex: uma `<div>` com `border-bottom` estilizado, sem caracteres `_`), OU
  - se mantiver texto, justificar/reformatar para não sobrar espaço malformado.
**Prioridade:** alta — esse é o componente mais citado como "produto" pelo próprio Ivã na V1 (potencial de capa de venda), então o bug aqui pesa mais que em outros lugares.

## ✅ CORREÇÃO 7 — Missão precisa de página inteira própria
**Diagnóstico:** a Missão "ainda parece uma seção", mas é o momento mais importante do método ("Agora é a sua vez").
**Regra fixada:** toda Missão (Missão 1, Missão 2, e as que virão nos cap. 3-8) deve **começar em página nova**, com tratamento de destaque — não pode nascer no meio do fluxo de uma página de Ferramentas/Checklist.
**Implementação:** adicionar `page-break-before: always` (ou equivalente — gerar como página own na fatia do PDF) antes de cada bloco de Missão. Avaliar se a Missão também merece um tratamento visual mais parecido com página de impacto (fundo diferenciado, título gigante) — coerente com a importância que o Ivã está dando.

## ✅ CORREÇÃO 9 — Diagramas ainda parecem "PowerPoint"
**Diagnóstico:** mesmo os diagramas elogiados (Mapa Fundamental) ainda têm cara de slide corporativo.
**Direção de refinamento:**
- linhas mais finas
- mais espaçamento (entre formas e dentro delas)
- menos texto dentro das formas (preferir legenda externa a texto espremido dentro de hexágono/caixa)
- maior equilíbrio visual geral
**Onde aplica:** todos os diagramas gerados via prompt de imagem (infográficos) — vale revisar os prompts de imagem dos capítulos 3-8 *antes* de gerar, incorporando essa diretriz, em vez de corrigir depois.

## ✅ CORREÇÃO 10 (a que mais fará diferença) — Sistema de 5 ritmos editoriais
**Diagnóstico:** hoje o livro alterna só 2 ritmos (texto / imagem). Livros profissionais usam 5.
**Os 5 ritmos fixados pelo Ivã:**
1. **Ritmo 1 — Página totalmente textual** (o que já existe)
2. **Ritmo 2 — Página com grande fotografia** (full-bleed ou quase)
3. **Ritmo 3 — Página de citação**: uma frase enorme, muito espaço branco (conecta diretamente com a Revisão 05 da V1 — "páginas de impacto")
4. **Ritmo 4 — Infográfico** (página dedicada a um diagrama/esquema)
5. **Ritmo 5 — Página prática**: checklist, canvas, ferramenta, missão
**Regra de ouro:** alternar os 5 ritmos ao longo do capítulo é o que faz "o leitor quase não perceber que está lendo 100 páginas". Este é o princípio organizador mais importante de toda a revisão V2 — todas as outras correções (1, 4, 5, 7) são instâncias específicas deste princípio maior.
**Como aplicar na prática:** ao planejar a sequência de páginas de um capítulo (cap. 3-8), montar antes um mapa simples tipo "página 1: Ritmo 1, página 2: Ritmo 1, página 3: Ritmo 3 (citação), página 4: Ritmo 2 (foto)..." — e só então montar o HTML. Vira o primeiro passo do checklist de produção (seção 5).

## ✅ CORREÇÃO 11 — Numeração de página
**Pedido:** numerar as páginas, posicionado no **centro inferior**.
**Decisão fechada com o Ivã:** o número fica embutido na própria linha dourada do rodapé, centrado, com o traço dourado se partindo dos dois lados — visual tipo "———— 1 ————". Não cria uma linha extra no rodapé. Ver detalhe técnico na seção "Decisão fechada" abaixo.

## ✅ CORREÇÃO 12 — Logo do cabeçalho pequena/discreta demais
**Pedido:** manter centralizada, mas **aumentar o tamanho**.
**Implementação técnica:** em `HEADER_TEMPLATE` (`gerar_pdf_v2.py`), aumentar `height` da imagem da logo (hoje 6mm) — sugestão inicial: 9-10mm, testar visualmente.

## ✅ CORREÇÃO 13 — Remover "— Fim do Capítulo N —"
**Pedido:** tirar essa marcação de fechamento em todos os capítulos (1, 2, e os que virão).
**Implementação:** remover a linha `<p class="fim-secao">— Fim do Capítulo X —</p>` de cada HTML de capítulo. A página de status/progresso que já vem antes dela permanece — só este texto específico sai.

## ✅ Decisão fechada — Numeração de página + linha dourada (Correção 11)
O número de página fica **centrado dentro da própria linha dourada do rodapé**, não numa linha extra — a linha dourada vira moldura do número, tipo "———— 1 ————" (traço à esquerda, número, traço à direita, tudo na mesma altura).
**Implementação técnica:** trocar o `border-top` único do footer por uma estrutura de 3 colunas (`flex`: traço — número — traço), com o número usando `<span class="pageNumber"></span>`. A linha "ACADEMIA DA BARBEARIA / www.academiadabarbearia.com.br" permanece como está, abaixo dessa linha-numerada.

## ⚠️ Aprendizados extras da implementação (documentar para os capítulos 3-8)

**A. Full-bleed com margem negativa não funciona dentro de páginas com header/footer nativo.**
Tentativa inicial de fazer o canvas verde da Ferramenta 01 "sangrar" até a borda da página usando `margin-left/right: -22mm` falhou — a margem do `page.pdf()` do Playwright não permite que conteúdo "escape" para a área reservada ao header/footer. Solução: abandonar o full-bleed nesses casos e usar um bloco com `border-radius` que ocupa a largura útil da página (entre as margens), não a folha inteira. Full-bleed real só funciona nas fatias dedicadas (`style.css`, sem header/footer).

**B. `page-break-inside: avoid` em blocos que ficam ao final de um capítulo pode gerar uma página com muito vazio.**
Quando um bloco (como o diagrama de status do Documento Fundador) não cabe no resto da página atual, ele é empurrado inteiro para a próxima — e se for um bloco pequeno, sobra muito espaço vazio abaixo dele, indo contra a Correção 1. Solução aplicada: envolver esse bloco final em um container com `min-height` generoso (~220mm) e `display: flex; justify-content: center`, transformando o "vazio acidental" em uma página de respiro **intencional** — com uma frase de fechamento adicionada para reforçar a sensação de conquista ao fim do capítulo.

---

# 6. ARQUIVOS DE REFERÊNCIA (estado real no ambiente de trabalho)

```
/home/claude/livro/
├── 00-09_*.md                       # Capítulos originais com marcadores [IMAGEM: X.X] já inseridos
├── proposta_imagens.md               # Os 32 prompts de imagem originais (todos os 8 capítulos)
├── build/
│   ├── style.css                     # CSS p/ páginas full-bleed (@page margin:0): capa, sumário, aberturas, ganchos, CTA
│   ├── style_conteudo.css            # CSS p/ páginas de conteúdo (sem @page margin:0): tudo com header/footer
│   ├── gerar_pdf_v2.py                # Script de geração — versão dinâmica, lista `arquivos_capitulos` na função main()
│   ├── fonts/                        # DM Serif Display + DM Sans em woff2
│   ├── imagens/                      # Fotos/diagramas reais (cap. 1-2, jpg otimizado) + logo_AB.png
│   ├── logo_base64.txt               # Logo em base64 para uso no header_template
│   ├── parte1_apresentacao.html      # Capa + Sumário + Apresentação
│   ├── parte2_capitulo1.html         # Cap. 1 completo (abertura+gancho+conteúdo, arquivo único)
│   ├── parte3_capitulo2.html         # Cap. 2 completo (abertura+gancho+conteúdo, arquivo único, SEM CTA)
│   ├── parte4_capitulo3.html         # Cap. 3 — parte A (abertura+gancho+fundamentos+4 critérios)
│   ├── parte4b_estilos.html          # Cap. 3 — parte B (fragmento: 16 cards de estilo) — SEM tags html/body
│   ├── parte4c_ferramenta_matriz.html # Cap. 3 — parte C (fragmento: tabela + Ferramenta 02 + aplicação + erros) — termina com tags de fechamento residuais
│   ├── parte4d_fechamento.html       # Cap. 3 — parte D (fragmento: estudo de caso até status final) — termina com tags de fechamento residuais
│   ├── parte4_capitulo3_FINAL.html   # Cap. 3 MONTADO — é este que o gerar_pdf_v2.py usa
│   ├── parte5_capitulo4.html         # Cap. 4 — parte A (abertura+gancho+fundamentos+nome+logotipo)
│   ├── parte5b_visual_elementos.html # Cap. 4 — parte B (fragmento: cores+tipografia+uniformes+sinalização)
│   ├── parte5c_ferramentas_canvas.html # Cap. 4 — parte C (fragmento: Ferramenta 03 + Ferramenta 04)
│   ├── parte5d_fechamento.html       # Cap. 4 — parte D (fragmento: aplicação+erros+estudo de caso+ferramentas+checklist+missão+resumo+status+CTA)
│   └── parte5_capitulo4_FINAL.html   # Cap. 4 MONTADO — é este que o gerar_pdf_v2.py usa
└── docs/
    └── ESPECIFICACAO_PROJETO.md      # Este documento
```

**Padrão de nomenclatura a seguir nos capítulos 5-8**: `parte{N}_capitulo{N-1}.html` (parte A), `parte{N}b_...html`, `parte{N}c_...html` etc. (fragmentos sem tags html/body), `parte{N}_capitulo{N-1}_FINAL.html` (montado, é o que entra no `arquivos_capitulos` do script).

---

# 7. CHECKLIST DE PRODUÇÃO POR CAPÍTULO (testado nos Cap. 3-4, use como receita)

0. [ ] Mapear os 5 ritmos editoriais (Correção 10) antes de tocar em HTML — listar a sequência de páginas planejada, sem mais de 2 páginas consecutivas de Ritmo 1 (textual puro).
1. [ ] Ler o capítulo completo no MD original (`/home/claude/livro/0X_NOME.md`), confirmar os marcadores `[IMAGEM: X.X]` já inseridos.
2. [ ] Criar o(s) arquivo(s) HTML do capítulo em partes (A = abertura+gancho+início do conteúdo; B, C, D... = fragmentos puros sem `<html><body>`, só o HTML interno). Decidir as frases de gancho e de página de impacto antes de montar.
3. [ ] Em cada ponto de imagem, usar `.figura-placeholder` (não `.figura`) até as imagens reais existirem.
4. [ ] Toda Ferramenta-canvas e toda Missão vão dentro de `.pagina-missao` (com `.fundo-verde` se for canvas tipo formulário). Nunca usar `page-break-before: always` direto na própria `.pagina-missao` se ela vier logo depois de uma `.figura` — deixe o fluxo natural decidir, ou o título fica "solto" numa página vazia (ver Correção do Ivã sobre isso, já resolvida nos Cap. 1-4).
5. [ ] Todo checklist entra dentro de `<div class="bloco-checklist">...</div>` (título + itens juntos).
6. [ ] Montar o capítulo final combinando as partes via Python/BeautifulSoup (ver técnica testada abaixo) e **validar a contagem de divs-chave antes de gerar o PDF**:
   ```python
   from bs4 import BeautifulSoup
   with open('parteN_capituloX_FINAL.html', encoding='utf-8') as f:
       soup = BeautifulSoup(f.read(), 'html.parser')
   print('abertura-capitulo:', len(soup.find_all('div', class_='abertura-capitulo')))  # esperado: 1
   print('pagina-gancho:', len(soup.find_all('div', class_='pagina-gancho')))          # esperado: 1
   print('conteudo (top level):', len(soup.body.find_all('div', class_='conteudo', recursive=False)))  # esperado: 1
   print('pagina-missao:', len(soup.find_all('div', class_='pagina-missao')))          # esperado: nº de ferramentas-canvas + missões
   print('bloco-checklist:', len(soup.find_all('div', class_='bloco-checklist')))      # esperado: 1
   print('status-fechamento:', len(soup.find_all('div', class_='status-fechamento-capitulo')))  # esperado: 1
   ```
7. [ ] **Mover o bloco `<div class="cta-compra">` do capítulo anterior para o novo capítulo** (é sempre o último capítulo que carrega o CTA). Atualizar o texto da CTA com o número de camadas certo e quantos capítulos restam.
8. [ ] Adicionar a tupla `('parteN_capituloX_FINAL.html', 'capX')` na lista `arquivos_capitulos` dentro de `gerar_pdf_v2.py` (dentro da função `main()`).
9. [ ] Rodar `cd /home/claude/livro/build && python3 gerar_pdf_v2.py` — verificar no log final: total de páginas e "Páginas numeradas (corridas)".
10. [ ] Validar visualmente com `pdf2image` (gerar previews de páginas-chave: transição do capítulo anterior, abertura, gancho, cada ferramenta/missão, checklist, fechamento) antes de entregar.

---

# 8. ESTADO ATUAL DO PROJETO — RETOMAR A PARTIR DAQUI

**Última atualização**: sessão de produção dos Capítulos 3 e 4.

## O que já está pronto
- Apresentação + Capítulos 1, 2, 3 e 4 — **104 páginas**, numeração corrida 1→93 (full-bleed não numeradas)
- Todas as correções V1 e V2 do Ivã aplicadas e validadas visualmente
- PDF final em `/home/claude/livro/build/Guia_da_Identidade_da_Barbearia_AMOSTRA.pdf`, já copiado para `/mnt/user-data/outputs/`

## O que falta
- **Imagens reais dos Capítulos 3 e 4** (8 no total: Fig. 3.1, 3.2, 3.3, 3.4, 4.1, 4.2, 4.3, 4.4) — hoje são `.figura-placeholder`. Os prompts já existem em `proposta_imagens.md`. O Ivã está gerando essas imagens externamente (mencionou estar tentando inserir e bateu no limite de imagens do chat) — quando ele mandar os arquivos, é só substituir cada placeholder pela `.figura` real, igual foi feito nos Cap. 1-2.
- **Capítulos 5, 6, 7 e 8** — MDs originais já têm os marcadores de imagem inseridos (sessão anterior), mas o HTML/diagramação ainda não foi feito. Repetir exatamente o processo dos Cap. 3-4 usando o checklist da Seção 7.
- **Sumário** — só refazer quando os 8 capítulos estiverem prontos (decisão explícita do Ivã), recalculando os números de página reais.
- Possível exportação EPUB no final, mencionada como ideia mas não decidida.

## Como retomar em um novo chat
1. Anexar este documento (`ESPECIFICACAO_PROJETO.md`) na primeira mensagem.
2. Dizer algo como: "Estou continuando o projeto do Guia da Identidade da Barbearia. Os capítulos 1-4 já estão prontos (104 páginas). Preciso [inserir as imagens dos cap. 3-4 / fazer os capítulos 5-6 / etc]."
3. Se for inserir imagens: subir os arquivos de imagem com nomes claros (ex: `3_1.png`, `3_2.png`...) dizendo a qual capítulo/figura cada uma corresponde.
4. Se for continuar capítulos: o assistente vai precisar reconstruir os arquivos de trabalho do zero nesse novo ambiente (HTML, CSS, script) — os arquivos físicos não sobrevivem entre chats — então o primeiro passo prático será recriar `style.css`, `style_conteudo.css` e os capítulos já prontos a partir do zero (ou, melhor, pedir pro Ivã o PDF mais recente como referência visual, já que o conteúdo deste documento descreve todas as classes/decisões necessárias para reconstruir fielmente).

**Nota importante sobre continuidade**: este documento descreve o *sistema* (CSS, componentes, pipeline), mas não contém o HTML/CSS literal. Num chat novo, vale a pena também levar (se possível como arquivo anexado) os arquivos `style.css`, `style_conteudo.css` e `gerar_pdf_v2.py` do ambiente atual, não só este markdown — eles têm o código exato e evitam ter que reescrever tudo a partir da descrição.

