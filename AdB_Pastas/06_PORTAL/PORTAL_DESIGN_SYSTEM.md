# PORTAL_DESIGN_SYSTEM.md

**Projeto:** Academia da Barbearia

**Documento:** Design System Oficial do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial — Base Visual do Ecossistema Digital

---

# Objetivo

Este documento define o Design System oficial do Portal da Academia da Barbearia.

Ele é a base visual de todo o ecossistema digital da empresa: Portal, futuras ferramentas, futuras Inteligências Artificiais com interface, e qualquer produto digital que venha a existir.

O Tema WordPress (`TEMA_WORDPRESS_AB.md`) é apenas uma implementação técnica deste Design System. Sempre que houver conflito entre uma decisão de implementação e este documento, este documento prevalece.

Este Design System não substitui o `03_GUIA_DE_IDENTIDADE_AB.md`. Ele o herda e o especializa para o contexto de interface digital, produto e web — onde existem exigências que um guia de marca editorial não cobre: estados de interação, grids responsivos, componentes de formulário, acessibilidade de interface.

---

# Princípio Fundador do Portal

O Portal não é uma barbearia online.

O Portal é a interface pública da Base de Conhecimento da Academia da Barbearia.

Toda decisão visual deste documento existe para responder a uma pergunta:

> **Esta decisão visual ajuda o profissional a encontrar, compreender e aplicar conhecimento mais rápido?**

Se a resposta for não, a decisão deve ser descartada — independentemente de quão esteticamente interessante ela seja.

---

# Uma Decisão Criativa Deliberada: a Paleta Oficial Reinterpretada para Tecnologia

**Status: Aprovado pelo fundador.** O uso do Verde Quadro Negro como superfície de assinatura foi validado explicitamente — a marca é adaptada ao contexto digital, nunca abandonada.

O `03_GUIA_DE_IDENTIDADE_AB.md` define a paleta oficial da marca: Preto Carvão, Verde Quadro Negro, Dourado Terroso e Branco Marfim. O logotipo já executado (`05_DESIGN/LOGO/`) prova que essa paleta nasceu, desde o início, pensada para múltiplas superfícies: existem versões prontas do logotipo em fundo Branco Marfim, fundo Preto Carvão e fundo Verde Quadro Negro. Isso foi o ponto de partida real desta decisão — não uma teoria, um fato já registrado nos arquivos de marca.

Analisando as referências deste briefing (Apple, Stripe, Linear, Notion, Vercel, Raycast, Arc, Perplexity, Porsche), um padrão se repete: cada uma dessas marcas tem uma superfície neutra de trabalho (branco ou cinza) e uma **superfície de assinatura** — escura, confiante, usada com intenção em hero, modo escuro ou momentos de maior impacto. O azul-tinta da Stripe. O quase-preto arroxeado da Linear. O preto absoluto da Vercel. O verde inconfundível de marcas de produto premium como Aesop ou Robinhood.

**Decisão: a paleta oficial não é abandonada — ela é adaptada, não recuada.**

* **Preto Carvão** e **Branco Marfim** são a superfície neutra de trabalho — texto, leitura longa, formulários, fundo padrão de página. Papel idêntico ao que já tinham no guia original.
* **Verde Quadro Negro** deixa de ser um acento raro e restrito e passa a ser **a superfície de assinatura do Portal**: a cor do Modo Escuro completo (ver Seção 1.6) e de blocos de alto impacto no modo claro — hero da Home, seções de método/framework, banners de autoridade. Um fundo verde-escuro com tipografia branca bem cuidada, muito espaço em branco e grid disciplinado não lê como "quadro de giz artesanal" — lê como o modo escuro de qualquer produto de tecnologia premium. A diferença entre as duas leituras está inteiramente na execução (espaçamento, tipografia, ausência de textura), nunca na cor em si. É exatamente o mesmo verde que já aparece, com essa mesma confiança, na versão do logotipo em fundo escuro.
* **Dourado Terroso** continua como o único acento interativo do Portal (links, foco, estado ativo, badge de destaque) — esse já era, no guia original, o papel mais próximo de uma "cor de assinatura de interação" (o roxo da Linear, o índigo da Stripe). Nunca como fundo dominante.

Esta é a diferença entre adaptar e abandonar: a paleta oficial já continha, dentro de si, os três ingredientes de uma paleta de produto de tecnologia moderno — uma superfície neutra, uma superfície de assinatura escura, um acento único de interação. Não havia necessidade de abandoná-la. Havia necessidade de reconhecer o papel que cada cor já estava pronta para ocupar, e de executá-la com a mesma disciplina de espaço em branco e tipografia que rege todo este Design System.

Esta decisão está registrada com justificativa completa em `RELATORIO_PORTAL_V1.md`.

---

# 1. Paleta de Cores do Portal

## 1.1 Cores de Marca (herdadas)

| Nome | Hex | Papel no Portal |
|---|---|---|
| Preto Carvão | `#1A1A1A` | Texto principal em modo claro, ícones, fundo de card em modo escuro |
| Branco Marfim | `#F5F2ED` | Fundo principal de página em modo claro, texto principal em modo escuro |
| Dourado Terroso | `#B8935A` | Único acento interativo — links, foco, estado ativo, badges — em ambos os modos |
| Verde Quadro Negro | `#2D4A3E` | Superfície de assinatura — fundo do Modo Escuro completo; hero, seções de método e blocos de autoridade em modo claro |

## 1.2 Escala Neutra (extensão funcional — nova)

O guia de marca não define uma escala de cinzas, necessária para bordas, divisores, texto secundário e estados desabilitados em uma interface. Esta escala é derivada por interpolação entre Preto Carvão e Branco Marfim, preservando a temperatura quente da marca (nunca cinza frio/azulado).

| Token | Hex aproximado | Uso |
|---|---|---|
| `neutro-900` | `#1A1A1A` | Texto principal (= Preto Carvão) |
| `neutro-700` | `#3D3B38` | Texto secundário |
| `neutro-500` | `#6B6863` | Texto terciário, placeholders |
| `neutro-300` | `#A6A29A` | Ícones inativos, bordas de destaque |
| `neutro-200` | `#D8D3C9` | Bordas padrão, divisores |
| `neutro-100` | `#EAE6DE` | Fundo de card, fundo de input |
| `neutro-50` | `#F5F2ED` | Fundo de página (= Branco Marfim) |

## 1.3 Cores Semânticas (extensão funcional — nova)

Necessárias para formulários, alertas e estados de sistema — não cobertas pelo guia de marca editorial.

| Token | Hex | Uso |
|---|---|---|
| `sucesso` | `#3D6B4F` | Confirmações, validação positiva |
| `atencao` | `#B8935A` (Dourado Terroso) | Avisos — reaproveita o acento da marca |
| `erro` | `#8B3A3A` | Erros de formulário, validação negativa |
| `info` | `#3D5A66` | Mensagens informativas neutras |

As cores semânticas usam tons dessaturados e terrosos, coerentes com a paleta geral — nunca vermelho/verde saturados de sistema operacional genérico.

## 1.4 Proporção de Uso em Tela

**Modo Claro (padrão de navegação, artigos, fichas, formulários):**

```
Branco Marfim (fundo)         ~60%
Preto Carvão (texto/estrutura) ~30%
Escala neutra (bordas/apoio)    ~8%
Dourado Terroso (acento)        ~1.5%
Verde Quadro Negro (hero/autoridade, pontual) ~0.5%
```

**Dentro de um bloco de assinatura (hero, seção de método, ou tela inteira em Modo Escuro):**

```
Verde Quadro Negro (fundo)     ~70%
Branco Marfim (texto)          ~20%
Preto Carvão (cards/profundidade) ~8%
Dourado Terroso (acento)        ~2%
```

A cor é o elemento mais raro da interface no dia a dia de leitura — não o mais presente. Isso é o que diferencia o Portal de um "site de curso online" e o aproxima das referências de tecnologia solicitadas. Verde Quadro Negro é a exceção deliberada: raro na contagem de páginas totais, mas confiante e dominante nos poucos lugares em que aparece — exatamente como uma marca de tecnologia usa sua cor de assinatura.

## 1.5 Contraste e Acessibilidade

* Todo par texto/fundo deve atingir no mínimo WCAG AA (4.5:1 para texto normal, 3:1 para texto grande).
* Dourado Terroso sobre Branco Marfim **não** atinge contraste suficiente para texto — usar apenas para elementos gráficos, ícones grandes, bordas e estados de foco, nunca para texto corrido.
* Nunca usar cor como único indicador de estado (erro, sucesso, link) — sempre combinar com ícone, peso de fonte ou sublinhado.

## 1.6 Modo Escuro (Dark Mode)

Diferente da decisão anterior deste documento (que tratava o Modo Escuro como algo a avaliar no futuro), o Modo Escuro é agora parte da especificação V1 — porque é exatamente a peça que transforma Verde Quadro Negro de "cor institucional restrita" em "superfície de assinatura", e porque todas as referências de tecnologia citadas no briefing (Linear, Vercel, Arc, Raycast) tratam o modo escuro como cidadão de primeira classe, não como extra.

| Token (modo claro) | Token (modo escuro) | Uso |
|---|---|---|
| `fundo-pagina` = Branco Marfim | `fundo-pagina` = Verde Quadro Negro `#2D4A3E` | Fundo global |
| `texto-principal` = Preto Carvão | `texto-principal` = Branco Marfim | Texto corrido |
| `fundo-card` = `neutro-100` | `fundo-card` = Preto Carvão `#1A1A1A` (leve elevação sobre o verde) | Cards, blocos |
| `borda` = `neutro-200` | `borda` = Verde Quadro Negro claro (`#3D5F50`, tinta 15% mais clara) | Divisores, bordas de card |
| `acento` = Dourado Terroso | `acento` = Dourado Terroso (inalterado) | Links, foco, CTA — o acento nunca muda entre os dois modos, é a âncora de identidade que atravessa ambos |

**Regras do Modo Escuro:**

* O logotipo automaticamente troca para a versão "Negativo verde" já existente em `05_DESIGN/LOGO/logo_AB_FundoVerde.png.png` — nenhuma versão nova precisa ser criada.
* O Modo Escuro segue a preferência de sistema do usuário (`prefers-color-scheme: dark`) por padrão, com alternância manual disponível no header.
* Contraste mínimo WCAG AA reavaliado especificamente para Branco Marfim sobre Verde Quadro Negro (já validado: contraste alto, por ser um verde profundo).
* O Modo Escuro não é "o mesmo site com cores invertidas por CSS" — é tratado como uma segunda superfície de marca, com a mesma disciplina de espaço em branco e hierarquia do modo claro.

## 1.7 Logotipo no Portal

O logotipo já está executado e disponível em `05_DESIGN/LOGO/`, em três versões de fundo — o que confirma, na prática, a decisão de paleta acima:

| Arquivo | Contexto de uso no Portal |
|---|---|
| `logo_AB_FundoBrancoFULL.png.png` | Header em modo claro |
| `logo_AB_FundoPreto.png.png` | Rodapé (fundo Preto Carvão) em modo claro |
| `logo_AB_FundoVerde.png.png` | Header e rodapé em Modo Escuro |
| `logo_AB_Favicon.png.png` | Favicon e ícone de app (monograma "AB") |

**Nota tipográfica:** a fonte do logotipo executado é um serifado de traço robusto com divisória em textura de pincel — uma escolha propositalmente mais expressiva e artesanal do que a tipografia de interface (DM Serif Display / DM Sans, Seção 2). Isso é intencional e não é uma inconsistência: o logotipo carrega o calor humano da marca; a tipografia de UI carrega a clareza tecnológica do produto. O logotipo nunca é usado como fonte de títulos de página — permanece exclusivamente como marca, do mesmo modo que a wordmark da Stripe ou da Vercel não é a fonte usada no restante da interface.

Novas versões do logotipo (arquivos `Gemini_Generated_*` e `Generated Image*` em `05_DESIGN/LOGO/`) são variações exploratórias e não substituem as quatro versões oficiais acima sem aprovação explícita do fundador.

---

# 2. Tipografia

## 2.1 Famílias

Herdadas de `03_GUIA_DE_IDENTIDADE_AB.md`:

* **Títulos:** DM Serif Display
* **Texto e interface:** DM Sans

Fonte de sistema como fallback obrigatório (evita flash de texto sem estilo e garante performance):

```
Títulos: "DM Serif Display", Georgia, serif
Texto:   "DM Sans", -apple-system, "Segoe UI", Arial, sans-serif
```

## 2.2 Escala Tipográfica Web

Escala fluida, baseada em `rem` (1rem = 16px), com ajuste por breakpoint.

| Token | Uso | Mobile | Desktop | Peso | Fonte |
|---|---|---|---|---|---|
| `display` | Título de Home / capa de campanha | 2.25rem (36px) | 4rem (64px) | 700 | Serif |
| `h1` | Título de página | 1.875rem (30px) | 3rem (48px) | 700 | Serif |
| `h2` | Título de seção | 1.5rem (24px) | 2.25rem (36px) | 600 | Serif |
| `h3` | Subtítulo de bloco | 1.25rem (20px) | 1.5rem (24px) | 600 | Sans SemiBold |
| `h4` | Título de card | 1.125rem (18px) | 1.25rem (20px) | 600 | Sans SemiBold |
| `corpo-grande` | Introdução, resumo executivo | 1.125rem (18px) | 1.25rem (20px) | 400 | Sans |
| `corpo` | Texto corrido padrão | 1rem (16px) | 1.0625rem (17px) | 400 | Sans |
| `legenda` | Legendas, metadados, datas | 0.875rem (14px) | 0.875rem (14px) | 400 | Sans |
| `micro` | Badges, labels, rodapé | 0.75rem (12px) | 0.75rem (12px) | 500 | Sans |

## 2.3 Regras de Uso

* Nunca usar mais de duas famílias tipográficas — regra herdada e inegociável.
* Altura de linha: 1.5 para corpo de texto, 1.2–1.3 para títulos, nunca abaixo de 1.4 em texto corrido longo.
* Comprimento de linha ideal: 60–75 caracteres para texto corrido (`max-width` de coluna de texto ~65ch).
* Negrito para ênfase pontual. Itálico para termos técnicos e citações. Nunca sublinhado exceto em links.
* `ALL CAPS` proibido em parágrafos — permitido apenas em micro-labels curtos (ex.: badges de categoria).
* Números em tabelas e preços: tabular figures (largura fixa) para alinhamento vertical correto.

---

# 3. Grid e Layout

## 3.1 Breakpoints

| Nome | Largura | Referência de uso |
|---|---|---|
| `mobile` | 375–767px | Smartphones |
| `tablet` | 768–1023px | Tablets, notebooks pequenos |
| `desktop` | 1024–1439px | Desktop padrão |
| `wide` | 1440px+ | Telas grandes — conteúdo nunca se estica além do `max-width` |

## 3.2 Grid

* Grid de 12 colunas em `tablet` e acima. Grid de 4 colunas em `mobile`.
* `max-width` do conteúdo: 1200px, centralizado, com padding lateral mínimo de 24px (mobile) a 80px (wide).
* Gutter entre colunas: 24px em desktop, 16px em mobile.

## 3.3 Sistema de Espaçamento

Escala de 8pt, alinhada ao princípio de "espaço em branco ativo" do `GUIA_IDENTIDADE_VISUAL.md`.

| Token | Valor | Uso típico |
|---|---|---|
| `espaco-1` | 4px | Espaço entre ícone e label |
| `espaco-2` | 8px | Espaço interno pequeno |
| `espaco-3` | 16px | Espaço padrão entre elementos relacionados |
| `espaco-4` | 24px | Espaço entre blocos de um mesmo componente |
| `espaco-5` | 32px | Espaço entre componentes |
| `espaco-6` | 48px | Espaço entre subseções |
| `espaco-7` | 64px | Espaço entre seções |
| `espaco-8` | 96px | Espaço entre seções principais de página |
| `espaco-9` | 128px | Respiro antes/depois de seções de destaque (hero, CTA final) |

Regra geral: é sempre preferível um espaçamento a mais do que um elemento a mais. Densidade de informação nunca deve ser confundida com densidade visual.

---

# 4. Componentes

## 4.1 Botões

| Variante | Fundo | Texto | Uso |
|---|---|---|---|
| Primário | Preto Carvão | Branco Marfim | Ação principal da página (uma por seção) |
| Secundário | Transparente, borda Preto Carvão 1px | Preto Carvão | Ação alternativa |
| Acento | Dourado Terroso | Preto Carvão | Ação de destaque pontual (ex.: "Ver oferta") — uso raro, nunca mais de um por tela |
| Fantasma (ghost) | Transparente | Preto Carvão | Ações terciárias, dentro de cards |
| Link | Transparente | Dourado Terroso, sublinhado no hover | Navegação textual inline |

Regras: cantos com raio pequeno (6–8px, nunca pill/totalmente arredondado — pill remete a app consumer, não a autoridade editorial). Altura mínima de área de toque: 44px. Estado de foco sempre visível com contorno de 2px em Dourado Terroso.

## 4.2 Cards

Componente central do Portal — usado em Biblioteca, Academia Recomenda, Academia News, Produtos.

**Estrutura padrão do card:**

1. Imagem ou ícone (função pedagógica, nunca decorativa)
2. Categoria/tag (micro-label)
3. Título (h4)
4. Resumo (1–2 linhas, corpo pequeno)
5. Metadado (data, tempo de leitura, ou selo)
6. Área de toque única (o card inteiro é clicável)

Fundo: Branco Marfim ou `neutro-100`. Borda: 1px `neutro-200`. Sem sombra pesada — sombra sutil apenas (`0 1px 3px rgba(26,26,26,0.06)`), nunca sombra dramática ou elevação exagerada (evita estética "app de curso").

**Variante — Card de Produto (Academia Recomenda):** inclui selo obrigatório (ver 4.6) e faixa de preço, conforme `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`.

## 4.3 Menus e Navegação

**Header:** fixo ou com esconde-ao-rolar. Logotipo à esquerda, navegação principal centralizada ou à direita, busca sempre visível.

**Navegação principal (nível 1):** máximo 6 itens visíveis. Ver hierarquia completa em `PORTAL_ARQUITETURA.md`.

**Mega menu:** usado apenas para "Biblioteca" e "Academia Recomenda", que possuem subcategorias. Estrutura em colunas, com título de coluna em `neutro-700` e itens em `corpo`.

**Breadcrumbs:** presentes em toda página de nível 2 ou mais profundo. Formato: `Início / Categoria / Subcategoria / Página atual`.

**Rodapé:** estrutura em colunas (Institucional, Biblioteca, Academia Recomenda, Redes Sociais, Legal). Fundo Preto Carvão, texto Branco Marfim — único bloco de página autorizado a inverter a paleta em massa.

## 4.4 Tabelas

Usadas em comparativos (Academia Recomenda) e conteúdo técnico.

* Cabeçalho: fundo `neutro-100`, texto `neutro-900`, peso 600.
* Linhas zebradas opcionais apenas em tabelas com mais de 6 linhas.
* Borda apenas horizontal (`neutro-200`), nunca grade completa — reduz ruído visual.
* Números alinhados à direita, texto alinhado à esquerda.
* Em mobile: tabelas largas viram cards empilhados ou scroll horizontal com indicador visual.

## 4.5 Formulários

* Label sempre acima do campo (nunca placeholder como único label — falha de acessibilidade).
* Campo: fundo `neutro-100`, borda 1px `neutro-200`, raio 6px, altura mínima 44px.
* Foco: borda Dourado Terroso 2px + leve sombra externa.
* Erro: borda `erro`, mensagem abaixo do campo em `erro`, com ícone.
* Botão de submit sempre como Primário.
* Formulários usados principalmente para: newsletter, contato, acesso a materiais gratuitos.

## 4.6 Selos e Badges (Academia Recomenda)

Herdados diretamente do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md` — documento canônico, não redefinido aqui:

🟢 RECOMENDADO · 🟡 RECOMENDADO COM RESSALVAS · 🔵 ESPECIALIZADO · 🔴 NÃO RECOMENDADO

Exibidos como badge compacto: círculo de cor + texto em `micro`, nunca apenas a cor isolada (acessibilidade a daltonismo).

## 4.7 Iconografia

* Estilo linear, monocromático, peso de traço consistente (1.5–2px) — herdado do `03_GUIA_DE_IDENTIDADE_AB.md`.
* Cor: `neutro-900` (padrão) ou Dourado Terroso (quando o ícone é o próprio elemento interativo, ex.: ícone de busca ativo).
* Nunca ícones preenchidos e vazados no mesmo material.
* Nunca emojis em componentes de interface (emojis são permitidos apenas nos selos do Framework de Avaliação, por herança direta do documento canônico).

## 4.8 Estados Visuais

| Estado | Tratamento |
|---|---|
| Hover | Leve escurecimento (8%) ou sublinhado, transição 150ms |
| Foco (teclado) | Contorno 2px Dourado Terroso, nunca removido (`outline: none` proibido sem substituto) |
| Ativo/pressionado | Escurecimento 12%, sem deslocamento de posição |
| Desabilitado | Opacidade 40%, cursor `not-allowed`, sem interação |
| Carregando | Skeleton screen em `neutro-100` — nunca spinner genérico isolado sem contexto |
| Vazio (empty state) | Ilustração ou ícone simples + texto explicativo + ação sugerida — nunca tela em branco |
| Erro de página (404) | Tom didático, não humorístico — coerente com a voz da Academia (ver `PORTAL_COPYWRITING.md`) |

---

# 5. Responsividade

* Abordagem mobile-first: todo componente é desenhado primeiro para 375px e depois expandido.
* Navegação: menu hambúrguer abaixo de `tablet`; navegação horizontal completa a partir de `tablet`.
* Imagens: sempre com `srcset`/tamanhos responsivos — nunca uma única imagem pesada servida para mobile.
* Tipografia fluida entre breakpoints (ver escala em 2.2), evitando saltos bruscos de tamanho.
* Toque: área mínima de 44x44px para qualquer elemento interativo em mobile.

---

# 6. Animação e Movimento

Herdando o princípio "toda imagem ensina, nunca decora" ([GUIA_DIRECAO_DE_ARTE_AB.md](../05_DESIGN/GUIA_DIRECAO_DE_ARTE_AB.md)), animações no Portal são **funcionais, nunca decorativas**.

* Duração padrão: 150–250ms. Nunca acima de 400ms para interações de UI.
* Easing: `ease-out` para entradas, `ease-in` para saídas.
* Usos permitidos: transição de hover, abertura de menu/mega menu, troca de aba, feedback de formulário, skeleton loading.
* Usos proibidos: parallax decorativo, auto-play de carrossel sem controle do usuário, animações de entrada em cascata puramente estéticas, qualquer animação que atrase a leitura do conteúdo.
* Respeitar `prefers-reduced-motion`: todas as transições devem ser desativáveis para usuários que configuraram essa preferência no sistema.

---

# 7. Fotografia e Imagens no Portal

Aplica-se integralmente o `GUIA_DIRECAO_DE_ARTE_AB.md`: fotografia documental, pessoas reais, barbearia brasileira alcançável, nunca luxo ou estética publicitária.

No contexto específico do Portal (interface, não material editorial impresso):

* Imagens de card: proporção 16:9 ou 4:3, sempre com `alt text` descritivo funcional (nunca decorativo).
* Hero de Home: imagem documental real ou composição tipográfica limpa — nunca banco de imagens genérico corporativo.
* Ícones substituem fotografia sempre que a imagem serviria apenas de preenchimento visual.
* Capas de produtos/e-books seguem `GUIA_DIRECAO_DE_ARTE_AB.md`, Categoria I (Mockups de Materiais).

---

# 8. O que o Portal Nunca Faz (Resumo de Proibições)

Consolidação das proibições relevantes para o ambiente digital, herdadas dos guias de marca e reforçadas pelo mandato deste briefing:

✗ Usar madeira, couro, navalhas, tesouras ou qualquer ícone de barbearia tradicional como elemento estrutural de UI.

✗ Usar Dourado Terroso como cor de fundo dominante de seção ou página — permanece exclusivamente acento.

✗ Usar Verde Quadro Negro como fundo de bloco de conteúdo comum "porque sim" — ele é reservado a hero, Modo Escuro completo e seções de método/autoridade, sempre com a mesma disciplina tipográfica e de espaço em branco do restante do sistema.

✗ Usar gradientes entre as cores da paleta.

✗ Usar mais de duas famílias tipográficas.

✗ Usar sombras dramáticas, glassmorphism pesado ou skeuomorfismo.

✗ Usar botões em formato pill (arredondamento total) — remete a app consumer casual, não a autoridade editorial.

✗ Usar imagens de banco genérico, luxo inacessível ou estética "curso online" (fundo escuro + fonte dourada).

✗ Usar qualquer animação puramente decorativa que não sirva à compreensão ou à usabilidade.

✗ Usar emojis em componentes de interface fora dos selos do Framework de Avaliação de Produtos.

---

# 9. Governança do Design System

* Este documento é canônico para decisões visuais do Portal, conforme `ARQUITETURA_DO_REPOSITORIO.md` (um assunto, um documento oficial).
* Alterações estruturais (paleta, tipografia, grid) exigem nova versão deste documento e aprovação humana explícita.
* Novos componentes devem ser adicionados à Seção 4 antes de serem implementados no tema — nunca o inverso.
* Este documento não define código. A implementação técnica vive em `TEMA_WORDPRESS_AB.md`.

---

**Fim do Documento**
