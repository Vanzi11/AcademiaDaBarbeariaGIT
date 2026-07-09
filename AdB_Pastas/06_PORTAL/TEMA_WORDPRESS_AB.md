# TEMA_WORDPRESS_AB.md

**Projeto:** Academia da Barbearia

**Documento:** Arquitetura do Tema WordPress

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial — Especificação Técnica (sem código)

---

# Objetivo

Este documento especifica a arquitetura técnica do tema WordPress que implementará o `PORTAL_DESIGN_SYSTEM.md`.

Ele não contém código. Define decisões estruturais que deverão orientar o desenvolvimento, para que o tema nasça organizado, performático e sustentável — mesmo rodando inicialmente em hospedagem compartilhada (HostGator).

O tema é uma implementação. O Design System é a fonte da verdade visual. Este documento é a ponte entre os dois.

---

# Princípio Arquitetônico

Um tema WordPress que sustente o Portal por muitos anos precisa resolver uma tensão específica: **WordPress + hospedagem compartilhada** tende a degradar em performance conforme plugins e conteúdo crescem. A decisão técnica mais importante deste documento existe para conter esse risco desde o dia um.

> Toda decisão técnica deste tema deve responder: **isto mantém o Portal rápido e leve daqui a três anos, com dez vezes mais conteúdo?**

---

# 1. Abordagem Tecnológica

## 1.1 Decisão: Tema Clássico Customizado, Leve, com Blocos Nativos Seletivos

Três abordagens foram consideradas:

| Abordagem | Avaliação |
|---|---|
| Page builder visual (Elementor, Divi, WPBakery) | Rejeitado. Gera HTML/CSS inflado, degrada performance em hospedagem compartilhada, cria dependência de plugin proprietário, dificulta manutenção de longo prazo. |
| Full Site Editing (tema de blocos 100% nativo) | Considerado, mas ainda imaturo para estruturas de conteúdo complexas (custom post types com muitos campos, como fichas de produto da Academia Recomenda). Reavaliar em versão futura. |
| **Tema clássico customizado, com Gutenberg para conteúdo editorial e Custom Post Types + campos estruturados para conteúdo de produto** | **Escolhido.** Máximo controle de performance e HTML, sem abrir mão do editor de blocos nativo para os textos longos (artigos, guias). |

## 1.2 Ferramentas de Base

* **WordPress core** — sem builders visuais.
* **Editor de blocos nativo (Gutenberg)** — para o corpo de artigos, guias e páginas editoriais. Usa apenas blocos nativos + poucos blocos customizados essenciais (Card, Callout/Caixa de Destaque, Selo de Avaliação).
* **Campos customizados estruturados** (via plugin de campos customizados, ex. família ACF) — para dados de produto (Academia Recomenda), ficha técnica, metadados de avaliação. Dados estruturados não pertencem ao corpo do artigo; pertencem a campos.
* **Custom Post Types** — para cada tipo de conteúdo com ciclo de vida e estrutura própria (ver Seção 3).
* Nenhum plugin deve ser instalado sem responder: qual problema ele resolve que o WordPress core ou o próprio tema não resolvem?

---

# 2. Estrutura de Arquivos

Estrutura lógica do tema (nomes ilustrativos, a nomenclatura final segue convenção padrão de temas WordPress):

```
tema-academia-da-barbearia/
│
├── style.css                  (metadados do tema + CSS compilado final)
├── functions.php               (bootstrap — apenas chamadas para os módulos abaixo)
│
├── /inc/
│   ├── setup.php                (suporte a recursos do tema, menus, image sizes)
│   ├── custom-post-types.php    (registro de CPTs)
│   ├── custom-taxonomies.php    (registro de taxonomias)
│   ├── custom-fields.php        (registro de grupos de campos estruturados)
│   ├── enqueue.php              (carregamento de CSS/JS, com condicionais por template)
│   ├── seo.php                  (schema.org, meta tags, sitemap hooks)
│   ├── performance.php          (lazy load, otimização de imagens, cache hints)
│   └── security.php             (hardening básico)
│
├── /template-parts/
│   ├── /header/                 (header, navegação, busca)
│   ├── /footer/                 (rodapé, colunas institucionais)
│   ├── /cards/                  (card de artigo, card de produto, card de ferramenta)
│   ├── /components/             (selo, breadcrumb, paginação, CTA, newsletter)
│   └── /blocks/                 (blocos customizados: callout, comparativo, ficha de produto)
│
├── /templates/                  (page templates — um arquivo por página institucional)
│   ├── template-home.php
│   ├── template-biblioteca.php
│   ├── template-academia-recomenda.php
│   ├── template-academia-news.php
│   ├── template-produtos.php
│   └── template-sobre.php
│
├── single.php / single-{cpt}.php   (página individual de cada tipo de conteúdo)
├── archive-{cpt}.php               (listagem/arquivo de cada tipo de conteúdo)
├── taxonomy-{taxonomia}.php        (páginas de categoria/tema)
├── search.php
├── 404.php
│
├── /assets/
│   ├── /css/       (organizado por: base, tokens, componentes, utilitários)
│   ├── /js/        (organizado por: núcleo, componentes, terceiros mínimos)
│   └── /fonts/     (DM Serif Display e DM Sans hospedadas localmente — nunca via CDN externo, por performance e LGPD)
│
└── /screenshots/ e /languages/ (padrão WordPress)
```

**Princípio de organização:** nenhum arquivo deve ultrapassar uma responsabilidade única — o mesmo princípio de `ARQUITETURA_DO_REPOSITORIO.md` ("um documento possui apenas uma finalidade") aplicado ao código.

---

# 3. Custom Post Types e Taxonomias

Detalhamento completo de relacionamento e navegação em `PORTAL_ARQUITETURA.md`. Aqui, a estrutura técnica:

| Custom Post Type | Propósito | Campos estruturados principais |
|---|---|---|
| `artigo` (Biblioteca / Academia News) | Conteúdo editorial — guias, notícias, explicações | Corpo (Gutenberg), tempo de leitura, nível (iniciante/avançado), fonte quando aplicável |
| `produto` (Academia Recomenda) | Ficha de avaliação de produto | Selo (🟢🟡🔵🔴, conclusão qualitativa), Nota Geral (0–10, escala complementar de `PRODUTO_000.md`), Marca, Modelo, Preço Atual, Menor Preço Histórico, Preço Médio, para quem é / não é, pontos fortes/fracos, alternativa, link de afiliado, categoria e subcategoria de produto |
| `ferramenta` (reservado para roadmap futuro) | Calculadoras, checklists interativos | Não desenvolvido nesta fase — apenas reservado na arquitetura |
| `pagina` (nativo do WordPress) | Páginas institucionais fixas (Sobre, Home) | — |

| Taxonomia | Aplicada a | Exemplo de termos |
|---|---|---|
| `categoria_conteudo` | `artigo` | Gestão, Técnica, Atendimento, Marketing, Ferramentas |
| `categoria_produto` (taxonomia hierárquica, pai + filho) | `produto` | Pais: Equipamentos e Ferramentas, Estrutura e Ambiente, Cosméticos e Finalização, Tecnologia e Conhecimento. Filhos: os ~22 termos granulares de `PRODUTO_000.md` (Máquinas, Navalhas, Cadeiras, Pomadas, Aplicativos, etc.) — ver reconciliação completa em `PORTAL_ARQUITETURA.md`, Seção 3.2 |
| `nivel` | `artigo` | Iniciante, Intermediário, Avançado |
| `formato` (reservado) | `artigo` | Notícia, Guia, Comparativo — ativado quando `ACADEMIA_NEWS` crescer o suficiente para justificar filtro próprio |

Toda nova taxonomia deve ser avaliada contra o princípio de `ARQUITETURA_DO_REPOSITORIO.md`: só existe se resolver um problema real de organização, nunca por antecipação especulativa.

---

# 4. Templates

Cada página institucional descrita em `06_PORTAL/PAGINAS/` corresponde a um template técnico dedicado, que por sua vez monta os componentes definidos em `PORTAL_COMPONENTES.md`. Nenhum template contém HTML de componente duplicado — todo componente é um template-part reutilizável, chamado por múltiplos templates quando necessário (ex.: o Card de Artigo é o mesmo arquivo em Home, Biblioteca e Academia News).

Regra de ouro de template: **se dois templates precisam do mesmo bloco visual, esse bloco vira um template-part antes que o segundo template seja escrito.** Duplicação de marcação é a principal causa de inconsistência visual em temas WordPress de longo prazo.

---

# 5. SEO Técnico

* URLs limpas e permanentes, conforme estrutura definida em `PORTAL_ARQUITETURA.md` — nunca alteradas após publicação (redirecionamento 301 obrigatório em qualquer mudança futura de slug).
* Dados estruturados (schema.org) por tipo de conteúdo: `Article` para artigos, `Product` + `Review` para fichas da Academia Recomenda, `BreadcrumbList` em todas as páginas, `Organization` no rodapé global.
* Meta title e meta description editáveis por página/post via campo estruturado, com fallback automático gerado a partir do título e resumo.
* Sitemap XML gerado automaticamente, segmentado por tipo de conteúdo.
* Imagens: atributo `alt` obrigatório em campo estruturado (nunca opcional) — reforça tanto SEO quanto acessibilidade quanto o princípio "toda imagem ensina".
* Estratégia completa de conteúdo e palavras-chave em `PORTAL_SEO.md`.

---

# 6. Performance

Requisito crítico dado o ambiente de hospedagem (HostGator, recursos compartilhados) e a ambição de crescer por anos.

* **Imagens:** conversão automática para formatos modernos (WebP/AVIF com fallback), `lazy loading` nativo do navegador, tamanhos responsivos (`srcset`) gerados automaticamente pelo WordPress.
* **CSS/JS:** carregamento condicional — um template só carrega o CSS/JS que efetivamente usa. Nenhum arquivo global pesado carregado em todas as páginas.
* **Fontes:** DM Serif Display e DM Sans hospedadas localmente, com `font-display: swap`, carregando apenas os pesos realmente usados na Seção 2 do Design System.
* **Cache:** cache de página em nível de servidor/plugin leve de cache, cache de objeto quando disponível no plano de hospedagem.
* **Banco de dados:** custom fields indexados quando usados em filtros/buscas frequentes (ex.: filtro por categoria de produto).
* **Terceiros:** qualquer script de terceiro (analytics, chat, pixel) carregado de forma assíncrona e adiada — nunca bloqueando a renderização inicial.
* **Meta de performance:** Core Web Vitals dentro da faixa "bom" (LCP < 2.5s, INP < 200ms, CLS < 0.1) como critério de aceite de qualquer nova funcionalidade.

---

# 7. Acessibilidade

* HTML semântico obrigatório (`<nav>`, `<main>`, `<article>`, `<header>`, `<footer>`) — nunca `<div>` genérico onde existe elemento semântico correspondente.
* Contraste mínimo WCAG AA em todos os componentes, herdado do Design System.
* Navegação 100% operável por teclado, com estado de foco sempre visível (Seção 4.8 do Design System).
* Todo campo de formulário com `label` associado.
* Todo componente interativo customizado (mega menu, filtros, accordions) segue padrões ARIA correspondentes.
* Vídeos incorporados com legenda quando o conteúdo for essencial à compreensão.

---

# 8. Boas Práticas de Desenvolvimento

* Código documentado apenas onde a decisão não é óbvia — sem comentários redundantes que descrevem o que o código já diz.
* Nenhuma customização diretamente no editor de temas do WordPress em produção — todo código versionado (Git), com o repositório do tema separado deste repositório documental, mas referenciado a partir dele.
* Ambiente de homologação obrigatório antes de qualquer atualização enviada à produção.
* Atualizações de WordPress core, tema e plugins testadas em homologação antes de aplicadas em produção.
* Backups automáticos diários, com retenção mínima de 30 dias.
* Controle de versão do tema seguindo versionamento semântico (`MAJOR.MINOR.PATCH`), independente da versão deste Design System, mas sempre referenciando qual versão do Design System implementa.

---

# 9. Plugins Essenciais (Critério de Inclusão)

Nenhum plugin é pré-aprovado por padrão. Antes de instalar qualquer plugin, responder:

1. Este problema pode ser resolvido no tema customizado, sem dependência externa?
2. Este plugin é mantido ativamente e tem histórico de segurança sólido?
3. O custo de performance é aceitável frente ao ganho funcional?

Categorias de plugin que provavelmente serão necessárias (a decisão de ferramenta específica é técnica e deve ser revisitada no momento da implementação):

* Campos customizados estruturados.
* SEO técnico (sitemap, schema) — apenas se o tema customizado não cobrir integralmente a Seção 5.
* Cache de página.
* Segurança/hardening básico.
* Backup automatizado.

Página builders, plugins de "tudo em um" e plugins com múltiplas funcionalidades não relacionadas são desencorajados — cada responsabilidade deve ter uma ferramenta focada.

---

# 10. Escalabilidade de Longo Prazo

* A arquitetura de CPTs e taxonomias foi desenhada para crescer por adição, não por reestruturação — novas categorias de produto ou conteúdo são novos termos de taxonomia, não novos tipos de post.
* Se o volume de conteúdo ou tráfego exigir infraestrutura além de hospedagem compartilhada, a migração natural é para hospedagem gerenciada de WordPress — o tema, sendo customizado e leve, não impõe travas técnicas a essa migração.
* Uma eventual evolução para arquitetura headless (WordPress como CMS/API + front-end dissociado) permanece possível no futuro, já que os dados estarão bem estruturados em CPTs e campos — mas está fora do escopo desta fase e não deve ser antecipada prematuramente.

---

# Relação com os Demais Documentos

Este documento implementa `PORTAL_DESIGN_SYSTEM.md` e é organizado espacialmente por `PORTAL_ARQUITETURA.md`. Os componentes citados aqui são detalhados individualmente em `PORTAL_COMPONENTES.md`. Nenhuma decisão aqui contraria `CONSTITUICAO_DA_ACADEMIA.md`, `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` ou `ARQUITETURA_DO_REPOSITORIO.md`.

---

**Fim do Documento**
