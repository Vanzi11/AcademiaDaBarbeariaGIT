# PORTAL_SEO.md

**Projeto:** Academia da Barbearia

**Documento:** Estratégia Oficial de SEO do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento define a estratégia de SEO do Portal da Academia da Barbearia.

O Portal é, por definição institucional, a interface pública de uma base de conhecimento (`CONSTITUICAO_DA_ACADEMIA.md`). SEO não é uma tática de marketing isolada aqui — é o principal mecanismo pelo qual o conhecimento produzido chega ao profissional que precisa dele, no momento em que ele precisa. É a Etapa 1 da Estratégia de Crescimento da Academia ("Construir audiência") operacionalizada tecnicamente.

---

# Princípio Orientador

> Toda página do Portal deve ser criada para responder a uma pergunta real que um profissional da beleza já está fazendo — no Google, no YouTube, ou em conversa com outro barbeiro.

Se uma página não responde a uma pergunta real e específica, ela não deve ser publicada. Isso vale tanto para SEO quanto para o princípio editorial mais amplo da Academia.

---

# 1. Arquitetura de Conteúdo para SEO (Pilares e Clusters)

O modelo de conteúdo do Portal segue a estrutura de **pilar e cluster**, natural à arquitetura já definida em `PORTAL_ARQUITETURA.md`:

* **Página pilar:** cada categoria da Biblioteca (ex.: "Gestão da Barbearia") é uma página de arquivo ampla, otimizada para o termo de busca mais genérico e de maior volume do tema.
* **Conteúdo de cluster:** cada artigo individual dentro da categoria responde a uma pergunta específica e mais longa (long-tail), e linka de volta para a página pilar e para artigos irmãos do mesmo cluster.

Essa estrutura já está tecnicamente resolvida por `categoria_conteudo` (taxonomia) e pelas regras de relacionamento de `PORTAL_ARQUITETURA.md`, Seção 5 — este documento define como preenchê-la com intenção de busca.

## Prevenção de Canibalização

Biblioteca (evergreen) e Academia News (perecível) podem, por engano, competir pelo mesmo termo de busca. Regra: se um tema é atemporal ("como escolher uma máquina de corte"), pertence exclusivamente à Biblioteca. Se um tema é datado ("lançamento da máquina X em 2026"), pertence exclusivamente à Academia News, com link para o artigo evergreen correspondente da Biblioteca quando existir. Nunca publicar o mesmo tema, com a mesma intenção de busca, nas duas seções.

---

# 2. Pesquisa e Priorização de Palavras-Chave

## Categorias de intenção de busca a mapear por conteúdo

* **Informacional** — "como", "o que é", "por que" → Biblioteca.
* **Comparativa/Avaliativa** — "melhor X para Y", "X vale a pena", "X ou Y" → Academia Recomenda.
* **Transacional** — "comprar X", "onde encontrar X", nome de produto próprio → Produtos, Academia Recomenda.
* **Navegacional/Institucional** — "Academia da Barbearia", nome da marca → Home, Sobre.

## Critério de priorização

Priorizar termos que atendam simultaneamente a três critérios: (1) volume de busca real no mercado brasileiro, (2) alinhamento direto com a Regra de Ouro do `CONSTITUICAO_DA_ACADEMIA.md` ("esta iniciativa ajuda o profissional a tomar uma decisão melhor?"), (3) viabilidade de resposta completa e honesta dentro do Nível 1 de avaliação (curadoria documental) do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`.

Nunca produzir conteúdo apenas por volume de busca, quando o tema não se sustenta editorialmente — isso violaria o princípio de Independência do Manual das IAs.

---

# 3. SEO On-Page

## Título e Meta Description

* Título de página: até 60 caracteres, com o termo principal o mais próximo possível do início.
* Meta description: até 155 caracteres, escrita como uma resposta direta que gera clique — nunca clickbait (viola o princípio de Honestidade do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`).
* Um único H1 por página, correspondente ao título editorial (não necessariamente idêntico ao título de SEO).

## Estrutura de Cabeçalhos

* Hierarquia estrita H1 → H2 → H3, sem pular níveis.
* Subtítulos (H2/H3) formulados sempre que possível como as perguntas que o profissional realmente faz — aumenta a chance de aparecer em featured snippets e em buscas por voz.

## Densidade e Naturalidade

* Nenhuma meta de densidade de palavra-chave artificial. O texto é escrito para o profissional primeiro, seguindo o `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` — a otimização vem da estrutura e da resposta completa, não da repetição forçada de termos.

## Links Internos

* Toda página nova deve linkar para pelo menos 2 páginas existentes relevantes, e ser linkada de volta por pelo menos 1 (nunca uma página órfã).
* Texto-âncora descritivo — nunca "clique aqui".
* Regras completas de relacionamento entre seções: `PORTAL_ARQUITETURA.md`, Seção 5.

## Imagens

* Todo `alt text` é obrigatório e descreve a função pedagógica da imagem (herdado do princípio "toda imagem ensina" do `GUIA_DIRECAO_DE_ARTE_AB.md`) — nunca um alt genérico ou vazio.
* Nome de arquivo descritivo antes do upload (ex.: `maquina-corte-manutencao-lamina.webp`, não `IMG_2024.jpg`).
* Compressão e formatos modernos conforme `TEMA_WORDPRESS_AB.md`, Seção 6.

---

# 4. SEO Técnico

Especificação técnica completa em `TEMA_WORDPRESS_AB.md`, Seção 5. Resumo dos requisitos que este documento de estratégia exige da implementação:

* URLs limpas, estáveis, hierárquicas (ver `PORTAL_ARQUITETURA.md`, Seção 4).
* Sitemap XML atualizado automaticamente, submetido ao Google Search Console e Bing Webmaster Tools.
* Dados estruturados por tipo de conteúdo: `Article`, `Product` + `Review`, `BreadcrumbList`, `Organization`, `FAQPage` quando o conteúdo tiver formato de perguntas e respostas.
* Core Web Vitals na faixa "bom" — performance lenta é, na prática, uma penalidade de SEO e uma barreira de acesso ao conhecimento.
* Indexação mobile-first nativa, garantida pela abordagem responsivo mobile-first do Design System.
* `robots.txt` e diretivas `noindex` aplicadas corretamente a páginas de utilidade (busca interna, páginas de agradecimento) para não diluir orçamento de rastreamento com páginas de baixo valor.

---

# 5. SEO para Academia Recomenda

Requisitos específicos, adicionais ao SEO on-page geral:

* Marcação `Product` e `Review`/`AggregateRating` sempre que a Academia possuir base suficiente para uma nota agregada honesta — nunca simular uma nota sem lastro real (viola Honestidade).
* Transparência de link de afiliado sinalizada tanto visualmente (rodapé da ficha) quanto tecnicamente (`rel="sponsored"` nos links), em conformidade com diretrizes de motores de busca para conteúdo monetizado.
* Atualização periódica obrigatória de fichas de produto (preço, disponibilidade) — conteúdo desatualizado nesta seção é o maior risco à credibilidade da marca (`CONSTITUICAO_DA_ACADEMIA.md`, "Nosso Principal Ativo").

---

# 6. Cadência Editorial e Frescor de Conteúdo

* Biblioteca: cadência definida pela profundidade do tema, não pelo calendário — mas toda página pilar deve ser revisada a cada 6–12 meses.
* Academia News: cadência regular, definida pelo ritmo real do setor — nunca publicar por obrigação de calendário quando não há notícia relevante (conteúdo de preenchimento prejudica a autoridade do domínio).
* Toda página exibe (visualmente, ver `PORTAL_COMPONENTES.md`, 4.3) e marca (via schema) a data de última atualização — sinal de confiança tanto para o leitor quanto para os motores de busca.

---

# 7. Medição

## Métricas centrais a acompanhar

* Tráfego orgânico por seção (Biblioteca, Academia Recomenda, Academia News, Produtos).
* Posição média e cliques por cluster de conteúdo (Search Console).
* Core Web Vitals reais (CrUX/campo), não apenas laboratoriais.
* Taxa de conversão de conteúdo gratuito (Biblioteca) para produto (Produtos) — mede se o relacionamento entre seções está funcionando.
* Taxa de cliques em links de afiliado a partir de fichas da Academia Recomenda.

## O que não é uma métrica de sucesso isolada

Volume de tráfego bruto, sem relação com decisão de compra ou aprendizado real, não é suficiente — o `CONSTITUICAO_DA_ACADEMIA.md` estabelece que o objetivo é ajudar profissionais a tomarem melhores decisões, não maximizar pageviews.

---

# Relação com os Demais Documentos

Esta estratégia opera sobre a arquitetura de `PORTAL_ARQUITETURA.md` e a infraestrutura técnica de `TEMA_WORDPRESS_AB.md`. Segue os princípios editoriais do `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` e a metodologia do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`. O tom e a escrita real de cada página seguem `PORTAL_COPYWRITING.md`.

---

**Fim do Documento**
