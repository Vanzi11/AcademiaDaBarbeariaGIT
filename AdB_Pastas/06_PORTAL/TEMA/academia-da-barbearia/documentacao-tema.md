# Documentação Técnica do Tema — Academia da Barbearia

Companion técnico deste tema: mapeia cada componente e template ao seu
arquivo de código e ao documento de especificação em `06_PORTAL/` que ele
implementa. Não redefine nada — apenas aponta.

## Estrutura de diretórios

```
academia-da-barbearia/
├── style.css                    Metadados do tema (WordPress exige)
├── functions.php                 Bootstrap — carrega /inc/
├── readme.txt                    Instalação e dependências
├── documentacao-tema.md          Este arquivo
├── inc/                          Lógica PHP, um arquivo por responsabilidade
├── template-parts/
│   ├── header/nav.php            Navegação principal + mega menu
│   ├── footer/                   (reservado — colunas embutidas em footer.php)
│   ├── cards/                    Card de Artigo, Produto, Produto Próprio, Radar, seções da Home
│   ├── components/                Selo, breadcrumb, paginação, filtros, hero, busca, newsletter, CTA, marcador da marca
│   └── blocks/                    Ficha Técnica de Produto (bloco grande e específico)
├── header.php / footer.php        Casca HTML global
├── front-page.php                 Home
├── page-sobre.php / page-contato.php / page.php   Páginas institucionais
├── single-artigo.php / single-produto.php / single-produto_proprio.php
├── archive-artigo.php / archive-produto.php / archive-produto_proprio.php
├── taxonomy-categoria_conteudo.php / taxonomy-categoria_produto.php
├── search.php / 404.php / index.php / single.php
└── assets/
    ├── css/    tokens.css → base.css → componentes.css → utilitarios.css
    ├── js/     nucleo.js, mega-menu.js, busca.js, alternador-tema.js
    ├── fonts/  @font-face (arquivos .woff2 pendentes, ver LEIA-ME.md)
    └── img/    logotipos oficiais (copiados de 05_DESIGN/LOGO/)
```

## Mapa de componentes (PORTAL_COMPONENTES.md → código)

| Componente (doc) | Arquivo(s) de implementação |
|---|---|
| 1.1 Header | `header.php`, `template-parts/header/nav.php` |
| 1.2 Mega Menu | `template-parts/header/nav.php` (`.ab-mega-menu`) |
| 1.3 Busca | `header.php` (`#busca-header`), `assets/js/busca.js` |
| 1.4 Breadcrumb | `template-parts/components/breadcrumb.php` |
| 1.5 Paginação | `template-parts/components/paginacao.php` |
| 1.6 Filtro de Categoria/Nível | `template-parts/components/filtros.php` |
| 2.1 Card de Artigo | `template-parts/cards/card-artigo.php` |
| 2.2 Card de Produto | `template-parts/cards/card-produto.php` |
| 2.3 Card de Produto Próprio | `template-parts/cards/card-produto-proprio.php` |
| 2.5 Radar do Mercado | `template-parts/cards/radar-item.php`, `secao-radar-mercado.php` |
| 3.3 Resumo Executivo | `.ab-resumo-executivo` (componentes.css), usado em `single-artigo.php` e na Ficha de Produto |
| 3.5 Ficha Técnica de Produto | `template-parts/blocks/ficha-tecnica-produto.php` |
| 3.6 Bloco de Relacionados | `template-parts/components/relacionados.php` |
| 4.1 Selo de Avaliação | `template-parts/components/selo.php` (standalone) + embutido em `card-produto.php` |
| 5.1 Newsletter | `template-parts/components/newsletter.php` + handler em `inc/setup.php` |
| 5.2 Formulário de Contato | `page-contato.php` + handler em `inc/setup.php` |
| 5.3 CTA de Produto | `template-parts/components/cta-produto.php` (inline em artigo) e `cta-produto-home.php` (seção da Home) |
| 5.4 Canais Complementares | `template-parts/components/canais-complementares.php` |
| 6.1 Rodapé | `footer.php` |
| 6.2 Estado Vazio | `template-parts/components/estado-vazio.php` |
| 6.3 Página 404 | `404.php` |
| 6.4 Hero | `template-parts/components/hero-home.php` |
| 6.5 Busca em Destaque | `template-parts/components/busca-destaque.php` |
| Marcador Academia (proprietário, melhoria aprovada #1) | `template-parts/components/marcador-academia.php` |

## Convenção de `get_template_part()` com argumentos

Todo componente parametrizável recebe seus dados via terceiro argumento
(`$args`), lido dentro do arquivo como `$args['chave'] ?? padrão`. Isso é o
mecanismo padrão do WordPress (`get_template_part( $slug, $name, $args )`,
disponível desde o WP 5.5) — nenhuma variável global nem `extract()` é usada,
evitando vazamento de estado entre componentes.

## Convenção de nomenclatura

* Funções PHP: prefixo `ab_` (Academia da Barbearia), em português, `snake_case`.
* Classes CSS: prefixo `ab-`, em português, `kebab-case`, seguindo BEM leve
  (`ab-card__titulo`, `ab-card--produto`).
* Variáveis CSS: nomes em português (`--cor-acento`, `--espaco-4`), espelhando
  os tokens de `PORTAL_DESIGN_SYSTEM.md` para que o código seja legível sem
  tradução mental.
