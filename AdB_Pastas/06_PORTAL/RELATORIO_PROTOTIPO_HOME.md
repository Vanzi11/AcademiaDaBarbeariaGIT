# RELATORIO_PROTOTIPO_HOME.md

**Projeto:** Academia da Barbearia

**Documento:** Relatório do Protótipo Visual da Home

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este relatório documenta as três direções visuais produzidas para a Home, em resposta ao `BRIEFING_PROTOTIPO_VISUAL_HOME_V1.md`, e recomenda uma delas para seguir à implementação.

As três versões foram construídas como um protótipo interativo único (HTML/CSS usado como ferramenta de apresentação visual, não como entrega de código de produção — ver Seção 6), alternável entre Versão A/B/C e entre Desktop/Mobile, com todo o conteúdo real definido em `HOME_WIREFRAME.md` e `PORTAL_COPYWRITING.md`. As três versões compartilham exatamente a mesma arquitetura, a mesma ordem de seções e o mesmo texto — a diferença é inteiramente de tratamento visual (cor, borda, raio, sombra, peso tipográfico, densidade), conforme exigido.

---

# 1. Qual versão você recomenda?

**Versão C — Equilíbrio.**

---

# 2. Por quê?

A Versão A (Silêncio, inspiração Apple) é bonita, mas sozinha corre um risco real: em uma categoria onde "portais de conhecimento" tendem a ser genéricos, o minimalismo extremo pode ler como *ausência de produto* em vez de *confiança*. É a versão mais arriscada de envelhecer bem, porque depende inteiramente da execução impecável de espaço e tipografia — qualquer descuido futuro (um card mal alinhado, uma imagem fora do tom) quebra o efeito inteiro, já que não há estrutura (borda, sombra) para disfarçar imperfeição.

A Versão B (Sistema, inspiração Stripe/Linear) comunica tecnologia com muita clareza, mas sozinha corre o risco oposto: aproxima-se demais da estética de "produto de software B2B" — o que é ótimo para Stripe (que vende infraestrutura para desenvolvedores) mas arrisca afastar o "barbeiro de bairro" que `03_GUIA_DE_IDENTIDADE_AB.md` explicitamente não quer excluir. Cards com borda, radius de 12px e glow em hover comunicam "aplicativo", quando a Academia precisa comunicar "autoridade editorial".

A Versão C herda a confiança tipográfica e a generosidade de espaço da Versão A (o que sustenta a leitura "atemporal" pedida no briefing) e herda da Versão B apenas a estrutura suficiente — bordas muito discretas, radius intermediário (8px), hierarquia de cards clara — para que o Portal pareça um produto construído, não apenas uma composição editorial estática. É a versão que menos se parece com uma tendência de estilo específica e mais com uma decisão de longo prazo.

---

# 3. Quais foram as principais decisões de design?

| Decisão | Versão A | Versão B | Versão C (recomendada) |
|---|---|---|---|
| Raio de borda | 3px (quase reto) | 12px (software moderno) | 8px (discreto, sem ser rígido) |
| Borda de card | Nenhuma — separação por espaço | 1px visível + sombra no hover | 1px muito discreto, quase invisível em repouso |
| Fundo dos blocos escuros | Cor sólida Verde Quadro Negro/Preto Carvão | Gradiente radial sutil (profundidade "tech") | Gradiente radial muito sutil (40% da intensidade de B) |
| Rótulo eyebrow ("Portal Brasileiro de Inteligência") | Sublinhado fino, sem cápsula | Cápsula com borda, cor dourada | Sublinhado com acento dourado — meio-termo |
| Tamanho do H1 do Hero | O mais generoso das três | O mais contido das três | Generoso, próximo de A |
| Densidade geral (gap entre elementos) | A mais espaçosa | A mais compacta | Intermediária, ligeiramente mais espaçosa que B |

**Decisão estrutural comum às três (não uma escolha de estilo, mas de disciplina):** as três versões usam exatamente o mesmo HTML/conteúdo, injetado uma única vez e "tematizado" por variáveis CSS por versão. Isso garante, por construção, que a diferença entre elas seja apenas estética — não foi possível, mesmo sem querer, introduzir uma diferença estrutural entre versões.

**Decisões válidas para as três versões (herdadas do Design System, não reabertas aqui):** a paleta (Preto Carvão, Branco Marfim, Verde Quadro Negro, Dourado Terroso), a ordem de seções, o ritmo escuro/claro por pares, os selos de avaliação (🟢🟡🔵🔴 — únicos emojis usados, herdados do documento canônico e nunca tratados como decoração), a ausência de fotografia no Hero.

---

# 4. Como o protótipo reforça o posicionamento institucional?

* **Academia Recomenda nunca parece marketplace:** nenhum preço em destaque tipográfico, nenhum selo de desconto, nenhuma cor de "oferta" — apenas o Selo Academia (herdado do Framework de Avaliação) e uma frase de contexto. É estruturalmente impossível confundir com Mercado Livre ou Shopee porque os elementos que definem visualmente um marketplace (grade densa de preços, badges vermelhos de desconto, contadores) simplesmente não existem no vocabulário visual do protótipo.
* **Radar do Mercado nunca parece feed de notícias infinito:** formato de lista compacta de 4 itens, sem paginação infinita, sem imagens grandes — comunica "varredura", não "consumo casual de conteúdo".
* **O bloco escuro de abertura (Hero + Busca) comunica autoridade sem luxo:** nenhuma textura de couro, madeira ou metal — apenas tipografia sobre a superfície de assinatura da marca, testando diretamente contra o princípio "a Academia não vende luxo, vende a próxima evolução possível" (`GUIA_DIRECAO_DE_ARTE_AB.md`).
* **Calma como decisão ativa:** nas três versões, mas com mais disciplina na C, o número de elementos coloridos simultaneamente visíveis em qualquer seção nunca passa de dois (fundo + um acento) — o oposto de "excesso de informação".

---

# 5. O que mudaria antes da implementação definitiva?

* **Tipografia real:** o protótipo usa Georgia e uma pilha de fontes de sistema no lugar de DM Serif Display e DM Sans — a Content Security Policy do ambiente de protótipo bloqueia carregamento de fontes externas. A sensação geral (serifado editorial + sans-serif limpo) está correta; o caráter exato das fontes oficiais só aparece na implementação real.
* **Fotografia real:** todas as imagens são blocos de gradiente duotone nas cores da marca — não existe, nesta fase, nenhuma ferramenta de geração de imagem disponível para mim, nem fotografia real produzida. Isso é uma limitação declarada, não uma escolha estética definitiva. `GUIA_DIRECAO_DE_ARTE_AB.md` e `PROMPTS_NANO_BANANA.md` já orientam como essa fotografia deve ser produzida quando chegar a hora.
* **Auditoria de acessibilidade real** (`PORTAL_ACESSIBILIDADE.md`) — contraste, navegação por teclado e leitor de tela precisam ser testados na implementação real, não apenas estimados visualmente.
* **Conteúdo definitivo** para os cards (produtos, artigos, notícias) — os textos usados são exemplos plausíveis, não conteúdo aprovado.
* **Validação com usuário real** do teste de "cinco segundos" e da navegação entre Academia Recomenda e Biblioteca.

---

# 6. O protótipo está pronto para virar HTML/CSS?

Parcialmente, e com uma distinção importante a fazer: o protótipo **já é** HTML/CSS — mas como ferramenta de apresentação visual (a forma mais fiel de mostrar "um produto pronto" sem depender de imagens estáticas), não como código de produção. Ele não deve ser copiado diretamente para o Tema WordPress. Razões concretas:

* Usa `<a>` estilizado como botão em vários lugares onde a implementação real deve usar `<button>` semântico.
* As três versões existem simultaneamente no mesmo documento (uma técnica deliberada de apresentação, injetando o mesmo conteúdo três vezes e alternando visibilidade) — a implementação real terá apenas uma versão, em templates WordPress reais, seguindo a estrutura de `template-parts` já definida em `TEMA_WORDPRESS_AB.md`, Seção 4.1.
* Não há marcação ARIA completa, nem a estrutura de tema/plugin do WordPress.

O que **transfere diretamente** para a implementação: todos os valores de token (cores, raios, espaçamentos, escala tipográfica) da Versão C, a hierarquia de componentes, e a decisão de composição por seção. Ou seja: o protótipo define o "o quê" com precisão; falta o "como" de produção.

---

# 7. Autocrítica

O ponto mais honesto desta fase: três das "liberdades criativas" que tomei dependeram de limitações da minha própria caixa de ferramentas, não apenas de decisão de design — fontes de sistema no lugar das fontes oficiais, e blocos de cor no lugar de fotografia real. Registrei os dois pontos com clareza acima, mas quero deixar explícito que a avaliação visual desta entrega (especialmente o "peso" e a "sofisticação" da tipografia) está sendo feita com um material de tipografia mais neutro do que o oficial — o resultado real com DM Serif Display tende a ser mais distintivo do que o que está no protótipo agora.

Segundo ponto: as três versões são, deliberadamente, "o mesmo esqueleto com peles diferentes" — uma decisão de engenharia que fiz para garantir rigorosamente que a diferença fosse "apenas estética", como pedido. O efeito colateral é que a divergência entre elas é mais discreta do que poderia ser se eu tivesse liberdade para também variar composição (por exemplo, um layout assimétrico só na Versão B). Se em algum momento você quiser ver direções mais divergentes entre si — não apenas em pele, mas em composição —, isso é um próximo passo possível, não algo que esta entrega tentou resolver.

Terceiro ponto, sobre a Observação Final do briefing (permissão para criar uma Versão D): decidi não criar uma quarta versão. Avaliei a Versão C como atingindo o nível esperado, e a própria instrução do briefing pede para priorizar excelência sobre quantidade — uma quarta versão, construída apenas para "ir além" sem uma ideia genuinamente nova por trás, teria sido exatamente o oposto disso. Esta é uma decisão de julgamento minha, não uma certeza absoluta, e você pode discordar dela ao ver o protótipo.

---

# Relação com os Demais Documentos

Este protótipo implementa visualmente `HOME_WIREFRAME.md` e `PAGINAS/HOME.md`, aplicando os tokens de `PORTAL_DESIGN_SYSTEM.md` e os componentes de `PORTAL_COMPONENTES.md`. Não altera nenhum desses documentos — apenas os interpreta visualmente em três variações de tratamento.

---

**Fim do Documento**
