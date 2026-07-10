# HOME_WIREFRAME.md

**Projeto:** Academia da Barbearia

**Documento:** Wireframe Visual Detalhado da Home — Implementação V1

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento traduz `PAGINAS/HOME.md` em uma especificação visual construível: grid exato, cor por seção, tipografia, copy final, comportamento responsivo e microinterações. Onde `PORTAL_DESIGN_SYSTEM.md` define o sistema (os tokens), este documento define a composição (como os tokens se organizam nesta página específica).

Nenhuma medida ou cor aqui é nova — tudo referencia tokens já existentes em `PORTAL_DESIGN_SYSTEM.md`. Este documento não cria um segundo sistema visual; aplica o sistema existente com disciplina a uma página real.

---

# Princípio de Ritmo Visual: Dark/Light Alternado e Intencional

O briefing de implementação pede uma identidade "contemporânea, minimalista, premium, dark". Isso não significa uma página inteiramente escura — significaria abrir mão da legibilidade de leitura longa que `GUIA_IDENTIDADE_VISUAL.md` exige para conteúdo editorial (Biblioteca). Significa que o Portal precisa de uma **superfície de assinatura escura usada com confiança**, exatamente a decisão já aprovada em `PORTAL_DESIGN_SYSTEM.md`, Seções 1 e 1.6.

A Home aplica essa superfície em pares de seções, cada par compartilhando uma intenção narrativa — criando ritmo deliberado em vez de alternância aleatória:

| Par | Seções | Modo | Intenção |
|---|---|---|---|
| 1 | Hero + Busca | Escuro (Verde Quadro Negro → Preto Carvão) | Chegada e entrada na inteligência do Portal — o "momento Perplexity/Linear" |
| 2 | Academia Recomenda + Biblioteca | Claro (Branco Marfim) | Corpo calmo de curadoria e conhecimento — o "momento Apple/Notion" |
| 3 | Academia News (Radar do Mercado) + Produtos | Escuro (Preto Carvão → Verde Quadro Negro) | Pulso do mercado e oferta de destaque — o "momento Stripe/Porsche" |
| 4 | Newsletter | Claro (Branco Marfim) | Fechamento calmo antes do rodapé |
| — | Rodapé | Escuro (Preto Carvão) | Âncora institucional — já definido em `PORTAL_COMPONENTES.md`, 6.1 |

Resultado: **Escuro → Claro → Escuro → Claro → Escuro**, um ritmo de respiração em vez de um bloco escuro único ou uma alternância sem lógica.

---

# 0. Header

Sticky no topo, acima do Hero, conforme `PORTAL_COMPONENTES.md`, 1.1 — logotipo à esquerda (versão `logo_AB_FundoBrancoFULL.png.png`, mapeada em `PORTAL_DESIGN_SYSTEM.md`, 1.7) e navegação principal à direita (Biblioteca, Academia Recomenda, Academia News, Produtos, Sobre). Na Home, os quatro primeiros itens rolam suavemente até a seção correspondente na própria página (navegação inteligente por âncora, `PORTAL_COMPONENTES.md`, 1.1); "Sobre" permanece como link de página, já que não existe seção "Sobre" na Home. Fundo Branco Marfim, borda inferior `neutro-200`, mesmo em cima do Hero escuro — o header nunca herda a cor de fundo da seção que está sobrepondo.

# 1. Hero

**Cor:** Verde Quadro Negro `#2D4A3E` (fundo), Branco Marfim `#F5F2ED` (texto), Dourado Terroso `#B8935A` (acento no CTA secundário/link).

**Copy (adaptação da Frase Norte institucional, `001_VISAO.md`/`CONSTITUICAO_DA_ACADEMIA.md`, para o formato de headline):**

* Headline (token `display`): "Ajudamos barbeiros a tomar melhores decisões."
* Subheadline (token `corpo-grande`, no máximo 2 linhas): "Conhecimento, curadoria de produtos e inteligência de mercado em um só lugar — para profissionais que levam a barbearia a sério."
* Botão primário: "Ver Academia Recomenda" (variante Primário, mas invertida: fundo Branco Marfim, texto Preto Carvão, para contraste sobre o verde)
* Botão secundário: "Explorar a Biblioteca" (variante Fantasma, texto Branco Marfim, borda Branco Marfim 1px)

**Wireframe — Desktop (1280px, `max-width` 1200px centralizado):**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Verde Quadro Negro — altura ~640px]                       │
│                                                                    │
│                     espaço-9 (128px) topo                         │
│                                                                    │
│         Ajudamos barbeiros a tomar melhores decisões.             │ ← display, centralizado,
│                                                                    │   max-width 9-10 palavras/linha
│     Conhecimento, curadoria de produtos e inteligência de         │ ← corpo-grande, max-width 60ch
│         mercado em um só lugar — para profissionais que           │
│              levam a barbearia a sério.                           │
│                                                                    │
│         espaço-5 (32px)                                           │
│                                                                    │
│         [ Ver Academia Recomenda ]   [ Explorar a Biblioteca ]    │ ← botões lado a lado, espaço-3 entre eles
│                                                                    │
│                     espaço-9 (128px) base                         │
└──────────────────────────────────────────────────────────────────┘
```

**Wireframe — Mobile (375px):**

```
┌───────────────────────────┐
│ Verde Quadro Negro         │
│  espaço-7 (64px) topo      │
│                            │
│  Ajudamos barbeiros a      │ ← display mobile (2.25rem/36px)
│  tomar melhores decisões.  │
│                            │
│  Conhecimento, curadoria   │ ← corpo-grande mobile
│  de produtos e             │
│  inteligência de mercado   │
│  em um só lugar.           │
│                            │
│  [ Ver Academia Recomenda ]│ ← botões empilhados, full-width
│  [ Explorar a Biblioteca ] │
│                            │
│  espaço-7 (64px) base      │
└───────────────────────────┘
```

**Regras:**

* Sem imagem, vídeo ou fotografia no Hero — a força visual vem inteiramente da tipografia e do espaço, alinhado ao princípio "Clareza acima da estética" e à referência de restrição da Apple/Porsche. Isso também elimina o maior risco de performance de um hero (mídia pesada), reforçando `TEMA_WORDPRESS_AB.md`, Seção 6.
* Nenhum elemento decorativo (ícone, forma geométrica, gradiente) — apenas tipografia, cor sólida e espaço.
* Altura do Hero: fixa o suficiente para preencher a primeira dobra em desktop (~640px), fluida em mobile conforme o conteúdo.

---

# 2. Busca em Destaque

**Cor:** Preto Carvão `#1A1A1A` (fundo), Branco Marfim (texto e campo), Dourado Terroso (glow de foco).

Esta seção assume visualmente a função que a Perplexity dá à busca: o principal ponto de entrada da inteligência do Portal — não uma barra pequena de utilidade. Tecnicamente, no lançamento, dispara a busca nativa do WordPress (`TEMA_WORDPRESS_AB.md`, Seção 2), mas visualmente ocupa uma seção inteira, imediatamente após o Hero, formando com ele um único "bloco escuro de abertura".

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Preto Carvão — altura ~320px]                              │
│                    espaço-7 (64px) topo                            │
│                                                                    │
│         "O que você quer resolver na sua barbearia hoje?"          │ ← h3, Branco Marfim, centralizado
│                                                                    │
│   ┌────────────────────────────────────────────────────────┐      │
│   │  🔍  Buscar na Academia...                              │      │ ← campo largo, max-width 720px,
│   └────────────────────────────────────────────────────────┘      │   borda Dourado Terroso 2px no foco
│                                                                    │
│      Sugestões: Máquinas de corte · Gestão · Marketing            │ ← legenda, neutro/dourado, opcional
│                                                                    │
│                    espaço-7 (64px) base                           │
└──────────────────────────────────────────────────────────────────┘
```

**Wireframe — Mobile:** mesma estrutura, campo em largura total menos as margens padrão (24px), título reduzido para `h4`.

**Regras:**

* Campo de busca com altura mínima 56px (maior que o padrão de formulário do Design System, 44px — justificado pela função de destaque desta instância específica).
* Placeholder nunca genérico ("Buscar...") — sempre contextual ("Buscar na Academia...").
* As "sugestões" abaixo do campo são links diretos para as categorias-pai mais buscadas (dado real, quando disponível via Search Console — `PORTAL_ANALYTICS_KPIS.md`) ou, no lançamento, as categorias mais relevantes definidas editorialmente.
* Nenhuma sombra dramática ou efeito de glassmorphism no campo — apenas a borda Dourado Terroso ao focar, conforme já definido em `PORTAL_DESIGN_SYSTEM.md`, 4.8.

---

# 3. Academia Recomenda

**Cor:** Branco Marfim (fundo), Preto Carvão (texto), Dourado Terroso (selo/acento).

Curadoria, nunca marketplace: 3 produtos em destaque, apresentados como Apple apresenta produto — imagem grande, uma linha de proposta, selo discreto, nunca grade densa de preços e badges de desconto.

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Branco Marfim]           espaço-8 (96px) topo             │
│                                                                    │
│   Academia Recomenda                                    Ver tudo →│ ← h2 + link, mesma linha
│   Curadoria técnica para decisões de compra mais seguras.         │ ← corpo, neutro-700
│                                                                    │
│   espaço-6 (48px)                                                  │
│                                                                    │
│   ┌──────────────┐   ┌──────────────┐   ┌──────────────┐          │
│   │  [imagem]     │   │  [imagem]     │   │  [imagem]     │        │ ← 3 colunas, gutter 24px
│   │  🟢 RECOMENDADO│   │  🟡 RESSALVAS │   │  🔵 ESPECIALIZADO│      │
│   │  Nome do produto│  │  Nome do produto│ │  Nome do produto│      │
│   │  1 linha resumo│   │  1 linha resumo│  │  1 linha resumo│      │
│   └──────────────┘   └──────────────┘   └──────────────┘          │
│                                                                    │
│                     espaço-8 (96px) base                          │
└──────────────────────────────────────────────────────────────────┘
```

**Mobile:** 1 coluna, cards empilhados, mesma anatomia (`PORTAL_COMPONENTES.md`, 2.2).

**Regras:**

* Nenhum preço em destaque tipográfico grande — o preço aparece pequeno, dentro do card, nunca como o elemento mais chamativo (isso é o que distingue "curadoria" de "loja").
* Fotografia de produto limpa, fundo neutro — nunca colagem de múltiplos ângulos ou selos de desconto sobrepostos.

---

# 4. Biblioteca

**Cor:** Branco Marfim (fundo), Preto Carvão (texto).

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Branco Marfim]           espaço-8 (96px) topo             │
│                                                                    │
│   Da Biblioteca                                          Ver tudo →│
│   Conhecimento permanente para profissionais que querem evoluir.   │
│                                                                    │
│   espaço-6 (48px)                                                  │
│                                                                    │
│   ┌──────────────┐   ┌──────────────┐   ┌──────────────┐          │
│   │  [imagem 16:9]│   │  [imagem 16:9]│  │  [imagem 16:9]│         │
│   │  Categoria    │   │  Categoria    │   │  Categoria    │        │
│   │  Título do    │   │  Título do    │   │  Título do    │        │
│   │  artigo       │   │  artigo       │   │  artigo       │        │
│   │  8 min leitura│   │  6 min leitura│   │  10 min leitura│       │
│   └──────────────┘   └──────────────┘   └──────────────┘          │
│                                                                    │
│                     espaço-8 (96px) base                          │
└──────────────────────────────────────────────────────────────────┘
```

**Regras:** máxima simplicidade — sem selo, sem preço, sem CTA colorido chamativo no card. O contraste com a seção anterior (Academia Recomenda) é sutil, não dramático: ambas em Branco Marfim, diferenciadas pela ausência de selo/preço aqui. Reforça a leitura editorial "biblioteca digital" pedida no briefing.

---

# 5. Academia News — Radar do Mercado

**Cor:** Preto Carvão (fundo), Branco Marfim (texto), Dourado Terroso (indicador de "novo").

Tratada como um radar de inteligência, não como um feed de notícias genérico — layout de lista compacta (inspiração TechCrunch, 5%), mas com tratamento escuro e premium em vez do branco denso de um portal de notícias tradicional.

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Preto Carvão]            espaço-8 (96px) topo             │
│                                                                    │
│   Radar do Mercado — Academia News                       Ver tudo →│ ← h2, Branco Marfim
│                                                                    │
│   espaço-6 (48px)                                                  │
│                                                                    │
│   ● Novo lançamento de máquina X muda o padrão de preço  · 2 dias  │ ← linha compacta, ponto Dourado = "novo"
│   ─────────────────────────────────────────────────────────────   │ ← divisor fino neutro sobre preto
│     Evento do setor reúne 500 barbeiros em São Paulo     · 5 dias  │
│   ─────────────────────────────────────────────────────────────   │
│     Tendência: barbearias investem em agendamento por IA · 1 sem  │
│                                                                    │
│                     espaço-8 (96px) base                          │
└──────────────────────────────────────────────────────────────────┘
```

**Regras:** lista, nunca cards com imagem grande aqui — a densidade de informação em formato de lista é o que comunica "radar" (varredura rápida) em vez de "revista". Máximo 4 itens na Home, com link para o arquivo completo.

---

# 6. Produtos — Kit Fundação da Barbearia

**Cor:** Verde Quadro Negro (fundo), Branco Marfim (texto), Dourado Terroso (acento no CTA).

Nome oficial confirmado: **Kit Fundação da Barbearia** (`03_PRODUTOS/PRODUTO_001/PRODUTO_001.md`). "DNA" não é o nome do produto — é um dos materiais internos do Kit (junto do livro-fonte), e nunca deve ser usado isoladamente para nomear o produto em copy pública.

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Verde Quadro Negro]        espaço-8 (96px) topo           │
│                                                                    │
│   Kit Fundação da Barbearia                                            │ ← h2, Branco Marfim
│   O manual de implantação para transformar uma barbearia           │ ← corpo-grande
│   comum em uma barbearia profissional.                             │
│                                                                    │
│   [ Conhecer o Kit Fundação da Barbearia ]                              │ ← botão Acento (Dourado Terroso)
│                                                                    │
│                     espaço-8 (96px) base                          │
└──────────────────────────────────────────────────────────────────┘
```

**Regras:** um único produto em destaque, um único CTA — nunca uma grade de produtos aqui (a vitrine completa, quando existir mais de um produto próprio, vive em `/produtos/`, fora do escopo desta etapa). Sem imagem/mockup nesta primeira versão da Home, mantendo a mesma disciplina tipográfica do Hero — mockup pode ser adicionado em iteração futura sem alterar a estrutura.

---

# 7. Newsletter

**Cor:** Branco Marfim (fundo), Preto Carvão (texto), Dourado Terroso (botão).

**Wireframe — Desktop:**

```
┌──────────────────────────────────────────────────────────────────┐
│  [fundo Branco Marfim]            espaço-7 (64px) topo/base       │
│                                                                    │
│         Receba conteúdo novo da Academia direto no seu e-mail.     │ ← h3, centralizado
│                                                                    │
│         [ seu@email.com          ] [ Quero receber ]                │ ← campo + botão, centralizado
│                                                                    │
│         Você pode cancelar sua inscrição a qualquer momento.       │ ← legenda LGPD
│                                                                    │
│         ─────────────────────── (divisor fino) ───────────────    │
│         Siga a Academia    [ Instagram ]  [ Facebook ]              │ ← ícones circulares, 36px
└──────────────────────────────────────────────────────────────────┘
```

**Redes sociais:** Instagram (`@academiadabarbearia2026`) e Facebook (perfil oficial confirmado). Ícones lineares monocromáticos (`PORTAL_DESIGN_SYSTEM.md`, 4.7), círculo com borda `neutro-200`, invertendo para Preto Carvão no hover. Não são um bloco de prova social — são um convite discreto de continuidade, por isso vivem dentro da seção de Newsletter (mesma intenção: "continue a conversa"), separados por um divisor fino, nunca competindo visualmente com o formulário de e-mail, que é a ação primária da seção.

---

# 8. Rodapé

Sem alteração em relação ao já especificado em `PORTAL_COMPONENTES.md`, 6.1 e `PORTAL_ARQUITETURA.md`, Seção 8 — Preto Carvão, colunas institucionais, texto Branco Marfim.

---

# 9. Responsividade — Resumo por Seção

| Seção | Desktop | Mobile |
|---|---|---|
| Hero | Altura fixa ~640px, 2 botões lado a lado | Altura fluida, botões empilhados full-width |
| Busca | Campo max-width 720px | Campo full-width menos margens |
| Academia Recomenda / Biblioteca | Grid 3 colunas | 1 coluna, cards empilhados |
| Radar do Mercado | Lista de 4 itens | Lista de 3 itens (reduzida para caber sem rolagem excessiva) |
| Produtos | Bloco centralizado, texto max-width 600px | Texto full-width menos margens |
| Newsletter | Campo + botão lado a lado | Campo e botão empilhados |

---

# 10. Microinterações

Únicas microinterações aprovadas para a Home, todas funcionais e discretas, respeitando `PORTAL_DESIGN_SYSTEM.md`, Seção 6 (nunca decorativas, sempre desativáveis via `prefers-reduced-motion`):

* **Campo de busca:** transição de 150ms na borda ao focar (de `neutro`/transparente para Dourado Terroso).
* **Cards (Academia Recomenda / Biblioteca):** leve elevação de sombra (150ms) e escurecimento de 8% no hover — nunca escala/zoom da imagem (efeito comum em e-commerce, o que aproximaria demais da estética de loja que este documento evita).
* **Botões:** escurecimento/clareamento de 8% no hover, 150ms.
* **Transição entre seções escuro/claro:** nenhuma animação de scroll — a transição de cor é um corte direto entre blocos, não um gradiente ou fade (mantém a clareza "Porsche" de blocos bem definidos em vez de transições suaves e vagas).
* **Indicador "novo" no Radar do Mercado:** ponto Dourado Terroso com leve pulsação (opacidade 100%↔70%, 2s, loop) — única animação contínua da página, usada com moderação extrema e desativada sob `prefers-reduced-motion`.

Nenhuma outra animação (parallax, entrada em cascata, auto-play) é aprovada nesta versão.

---

# 11. Referências de Inspiração Aplicadas

| Referência | Peso | Onde aparece nesta Home |
|---|---|---|
| Apple | 30% | Restrição tipográfica do Hero, ausência de decoração, fotografia limpa de produto em Academia Recomenda |
| Stripe | 20% | Organização em seções claras, grid de 3 colunas, hierarquia de conteúdo |
| Linear | 15% | Bloco escuro de abertura (Hero + Busca), tipografia como elemento de composição |
| Notion | 10% | Tratamento de leitura da seção Biblioteca |
| Perplexity | 10% | Busca como seção própria, com destaque de "ponto de entrada da inteligência" |
| Porsche | 10% | Blocos de cor sólidos e bem definidos (sem gradiente/transição), acabamento discreto no acento Dourado Terroso |
| TechCrunch | 5% | Formato de lista compacta do Radar do Mercado |

---

# Relação com os Demais Documentos

Este wireframe implementa `PAGINAS/HOME.md` usando os tokens de `PORTAL_DESIGN_SYSTEM.md` e os componentes de `PORTAL_COMPONENTES.md`. A implementação técnica como template WordPress está em `TEMA_WORDPRESS_AB.md`. A divergência de nome do produto está registrada em `RELATORIO_HOME_V1.md`.

---

**Fim do Documento**
