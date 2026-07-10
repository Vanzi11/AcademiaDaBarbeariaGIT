# PORTAL_ARQUITETURA.md

**Projeto:** Academia da Barbearia

**Documento:** Arquitetura de Informação do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento define a arquitetura de informação do Portal: menus, categorias, relacionamentos entre conteúdos, navegação, estrutura de URLs e hierarquia de conteúdo.

Ele responde a uma pergunta central: **quando o Portal tiver 5.000 páginas, o profissional ainda vai encontrar o que precisa em poucos cliques?**

Toda decisão aqui privilegia navegabilidade de longo prazo sobre organização conveniente de curto prazo.

---

# 1. Mapa de Seções

O Portal é organizado em cinco seções principais, mais a seção institucional. Nenhuma seção adicional deve ser criada sem primeiro verificar se o conteúdo pretendido já cabe em uma existente — mesmo princípio de documento canônico de `ARQUITETURA_DO_REPOSITORIO.md` aplicado à navegação.

```
Início
│
├── Biblioteca              (base de conhecimento: guias, técnicas, gestão)
│
├── Academia Recomenda      (curadoria e avaliação de produtos)
│
├── Academia News           (notícias e atualizações do setor)
│
├── Produtos                (produtos digitais próprios da Academia)
│
└── Sobre                   (institucional: missão, visão, quem somos)
```

## Por que estas cinco seções e não mais

* **Biblioteca** e **Academia News** poderiam, à primeira vista, parecer redundantes — ambas são conteúdo editorial. A distinção é temporal e de intenção: a Biblioteca é conhecimento permanente (o profissional chega via busca, meses ou anos depois de publicado); a Academia News é conteúdo datado (relevante na semana da publicação, arquivado depois). Misturá-las prejudicaria SEO (conteúdo evergreen perde força ao lado de conteúdo perecível) e a experiência do usuário (quem busca "como afiar navalha" não quer navegar por meio de notícias).
* **Academia Recomenda** é uma seção própria, não uma subcategoria da Biblioteca, porque seu modelo de conteúdo é fundamentalmente diferente: fichas estruturadas de produto, com selo, preço e monetização — não artigo editorial. Misturar as duas confundiria o profissional sobre a natureza do conteúdo que está lendo, o que viola o princípio de Independência Editorial do `CONSTITUICAO_DA_ACADEMIA.md`.
* **Produtos** é a seção comercial dos produtos próprios (Kit Fundação, futuros produtos). Separada de Academia Recomenda, que trata de produtos de terceiros — a mesma razão de clareza editorial acima.

---

# 2. Navegação Principal (Header)

Ordem e rótulos do menu principal:

```
[Logotipo]   Biblioteca   Academia Recomenda   Academia News   Produtos   Sobre   [Busca]
```

* Máximo 5 itens de primeiro nível, além da busca — limite deliberado (ver `PORTAL_DESIGN_SYSTEM.md`, Seção 4.3).
* **Biblioteca** e **Academia Recomenda** abrem mega menu com subcategorias (ver Seção 3). **Academia News**, **Produtos** e **Sobre** levam direto à respectiva página/arquivo.
* Busca sempre visível, nunca escondida atrás de um ícone adicional em desktop.
* Em mobile, os mesmos itens colapsam em menu hambúrguer, na mesma ordem.

---

# 3. Categorias por Seção

## 3.1 Biblioteca — `categoria_conteudo`

Estrutura inicial de categorias (pode crescer, nunca deve fragmentar-se em excesso):

* Gestão da Barbearia
* Técnica e Corte
* Atendimento e Experiência
* Marketing e Redes Sociais
* Ferramentas e Tecnologia
* Identidade e Marca

Cada categoria é uma página de arquivo com listagem paginada, filtrável por nível (Iniciante / Intermediário / Avançado).

## 3.2 Academia Recomenda — `categoria_produto`

**Reconciliado com `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md`** — a versão original deste documento definia 6 categorias amplas, criadas sem consultar a arquitetura estratégica já existente do Produto 000 (Academia Recomenda), que especifica uma lista de ~22 categorias de produto. Essa reconciliação corrige isso com uma taxonomia de dois níveis: os termos granulares do Produto 000 tornam-se subcategorias (`categoria_produto`, nível filho), agrupadas em 4 categorias-pai que preservam a navegabilidade do mega menu (limite de 4 colunas, `PORTAL_COMPONENTES.md`, 1.2).

* **Equipamentos e Ferramentas** — Máquinas, Shavers, Navalhas, Tesouras, Pentes, Escovas, Secadores, Ferramentas, EPIs
* **Estrutura e Ambiente** — Cadeiras, Espelhos, Móveis, Iluminação, Decoração, Capas
* **Cosméticos e Finalização** — Cosméticos, Pomadas, Óleos, Shampoos
* **Tecnologia e Conhecimento** — Tecnologia, Aplicativos, Cursos recomendados, Livros

Cada subcategoria (termo filho) é uma página de arquivo própria; cada categoria-pai é a entrada do mega menu e do filtro principal. Isso preserva ao mesmo tempo a granularidade estratégica já definida no Produto 000 e a regra de simplicidade de navegação deste documento — nenhuma das duas precisou ceder.

Opção futura (roadmap): comparação lado a lado dentro da mesma subcategoria.

## 3.3 Academia News

Organizada por ordem cronológica reversa, sem categorização obrigatória no lançamento. Tags livres podem ser aplicadas para agrupamento leve (ex.: "lançamentos", "eventos do setor"), sem criar uma segunda taxonomia hierárquica nesta fase.

## 3.4 Produtos

Organizada por produto individual — sem necessidade de taxonomia enquanto o catálogo for pequeno (Produto 001 em diante). Reavaliar estrutura de categorias apenas quando o catálogo ultrapassar ~10 produtos simultâneos.

---

# 4. Estrutura de URLs

URLs em português, minúsculas, com hífen como separador, sem acentuação (compatibilidade e SEO). Estrutura estável: uma vez publicada, uma URL não muda — mudanças de categoria são resolvidas por redirecionamento 301, nunca por edição de slug.

```
/                                                  → Home

/biblioteca/                                       → Arquivo geral da Biblioteca
/biblioteca/{categoria}/                           → Arquivo por categoria
/biblioteca/{categoria}/{slug-do-artigo}/          → Artigo individual

/academia-recomenda/                               → Arquivo geral
/academia-recomenda/{categoria-produto}/           → Arquivo por categoria de produto
/academia-recomenda/{categoria-produto}/{slug}/    → Ficha de produto individual

/academia-news/                                    → Arquivo cronológico
/academia-news/{slug-da-noticia}/                  → Notícia individual

/produtos/                                         → Vitrine de produtos próprios
/produtos/{slug-do-produto}/                       → Página do produto próprio

/sobre/                                            → Institucional

/busca/?q={termo}                                  → Resultados de busca
```

**Páginas institucionais de rodapé** (fora da navegação principal, mas necessárias desde o lançamento): `/politica-de-privacidade/`, `/termos-de-uso/`, `/contato/`.

## Regra de profundidade

Nenhum conteúdo deve exigir mais de 3 níveis de clique a partir da Home para ser alcançado (Home → Categoria → Conteúdo). Se uma futura subcategoria exigir um quarto nível, isso é sinal de que a categoria deve ser dividida em duas, não aprofundada.

---

# 5. Relacionamento entre Conteúdos

O valor estratégico do Portal depende de conexão entre seções — nenhuma seção deve ser uma ilha. Regras de relacionamento obrigatórias:

| De | Para | Regra |
|---|---|---|
| Artigo da Biblioteca | Ficha da Academia Recomenda | Todo artigo que menciona uma categoria de produto (ex.: "como escolher uma máquina") deve linkar para a categoria correspondente em Academia Recomenda. |
| Ficha da Academia Recomenda | Artigo da Biblioteca | Toda ficha de produto deve linkar para pelo menos um artigo de contexto da Biblioteca (ex.: "Como escolher a máquina certa para o seu volume de atendimento"). |
| Notícia da Academia News | Artigo da Biblioteca | Notícias sobre tendências ou lançamentos devem linkar para o conteúdo evergreen relacionado, quando existir — transformando tráfego perecível em audiência de conhecimento permanente. |
| Página de Produto próprio | Artigo da Biblioteca | Produtos próprios (ex.: Kit Fundação) linkam para artigos da Biblioteca que correspondem à mesma etapa do Framework FDP-AB (Fundamentar/Diferenciar/Perpetuar), criando uma ponte natural de conteúdo gratuito para produto pago. |
| Qualquer conteúdo | Produtos relacionados / Conteúdos relacionados | Todo template de conteúdo individual (artigo, ficha, notícia) exibe um bloco de "Relacionados" ao final — nunca finaliza a página em beco sem saída. |

Este relacionamento cruzado é o que torna o Portal uma "plataforma de inteligência" e não uma coleção de páginas isoladas — é a implementação literal do princípio institucional de que todo conteúdo deve ser reutilizável e conectado.

---

# 6. Hierarquia de Conteúdo dentro de uma Página

Toda página de conteúdo individual (artigo, ficha de produto, notícia) segue a mesma hierarquia de leitura, alinhada à Seção "Hierarquia Visual" do `PORTAL_DESIGN_SYSTEM.md`:

1. Breadcrumb (orientação de localização)
2. Categoria/tag + metadado (tempo de leitura ou data)
3. Título (H1)
4. Resumo/resposta rápida (quando aplicável — obrigatório em fichas de produto, por `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`)
5. Corpo do conteúdo
6. CTA contextual (newsletter, produto relacionado, ou próximo artigo)
7. Bloco de relacionados
8. Comentários/interação (avaliar necessidade por seção — não obrigatório no lançamento)

---

# 7. Busca

* Busca disponível globalmente, no header, em todas as páginas.
* Resultados exibidos com o mesmo componente de card usado nas listagens, para consistência.
* Busca filtra por tipo de conteúdo (Biblioteca, Academia Recomenda, Academia News, Produtos) — o profissional deve poder restringir o escopo da busca quando souber o que procura.
* Roadmap futuro (não desenvolver agora): busca semântica assistida por IA, alinhada ao papel da Inteligência Artificial descrito no `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`.

---

# 8. Navegação Institucional (Rodapé)

Estrutura de colunas do rodapé:

```
Institucional          Biblioteca              Academia Recomenda      Conecte-se
Sobre                  Ver categorias           Ver categorias          Instagram
Contato                                                                  Facebook
Política de Privacidade                                                  YouTube
Termos de Uso                                                             WhatsApp · Newsletter (formulário)
```

**Redes sociais oficiais (confirmadas pelo fundador):**

* Instagram: `@academiadabarbearia2026`
* Facebook: `https://www.facebook.com/share/1PYUuPLMNR/`
* YouTube e WhatsApp: links ainda não confirmados — manter como itens reservados no rodapé até a confirmação.

---

# 9. Reconciliação com o Produto 000 (Academia Recomenda)

O `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md` já define a arquitetura estratégica completa da Academia Recomenda, concebida antes deste Portal. Esta seção documenta como o Portal se encaixa nela, para que os dois documentos não divirjam silenciosamente.

## 9.1 O Site é uma etapa do funil, não o ponto de partida

O Produto 000 prevê um funil de canais em ordem de maturidade: Telegram (v0.5) → WhatsApp (v0.7) → Instagram (v0.8) → Site (v1.0). O Site/Portal é onde o conteúdo se torna permanente e rastreável por SEO — os canais de mensageria cumprem a função de alta frequência e promoções rápidas, que um site não cumpre bem. O Portal não compete com esses canais; ele os complementa, arquivando e aprofundando o que eles anunciam com frequência.

Implicação prática: toda ficha de produto do Academia Recomenda deve oferecer um ponto de entrada para os canais de maior frequência — ver `PORTAL_COMPONENTES.md`, novo item 5.4 (Bloco de Canais Complementares).

## 9.2 Linha Editorial 70/20/10

O Produto 000 define uma proporção editorial fixa: 70% conteúdo útil, 20% ofertas, 10% produtos próprios — "jamais inverter essa proporção". Esta proporção rege a curadoria de conteúdo dentro de Academia Recomenda e deve ser respeitada no planejamento editorial, mesmo que o Portal, por ser um arquivo permanente (diferente dos canais de alta frequência), naturalmente acumule mais conteúdo útil ao longo do tempo.

## 9.3 Banco de Conhecimento por Produto

O Produto 000 define que cada produto avaliado gera "uma página permanente" que acumula histórico de preço, comparações e perguntas frequentes ao longo do tempo. Isso é compatível com a Ficha de Produto já definida em `PORTAL_COMPONENTES.md`, 3.5 — a reconciliação técnica dos campos adicionais (preço histórico, preço médio, nota geral) está registrada em `TEMA_WORDPRESS_AB.md`, Seção 3.

---

# Relação com os Demais Documentos

Esta arquitetura organiza espacialmente os Custom Post Types e taxonomias definidos em `TEMA_WORDPRESS_AB.md`, e é a base estrutural para os wireframes textuais de `06_PORTAL/PAGINAS/`. Os componentes de navegação (header, mega menu, breadcrumb) estão detalhados em `PORTAL_COMPONENTES.md`. A reconciliação com `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md` está descrita na Seção 9.

---

**Fim do Documento**
