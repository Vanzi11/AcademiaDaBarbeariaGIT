# PORTAL_ANALYTICS_KPIS.md

**Projeto:** Academia da Barbearia

**Documento:** Especificação de Analytics e KPIs do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento operacionaliza a Seção 7 (Medição) do `PORTAL_SEO.md`, estendendo-a para um sistema de métricas que cobre todas as seções do Portal — não apenas SEO. Define o que medir, como medir, com que ferramenta e com que frequência revisar.

---

# Princípio

> Uma métrica só é útil se ela ajuda a decidir o que fazer a seguir.

Volume de tráfego, seguidores ou pageviews, isolados, não guiam nenhuma decisão — por isso não são tratados aqui como metas em si, apenas como contexto. O sistema de métricas existe para responder três perguntas: o conteúdo está ajudando o profissional a decidir melhor? A confiança está crescendo? A audiência está avançando entre as etapas de crescimento da Constituição (Audiência → Autoridade)?

---

# 1. Ferramentas

| Ferramenta | Função |
|---|---|
| Google Search Console | Desempenho de busca orgânica: posição, cliques, impressões, indexação |
| Ferramenta de analytics de página (ex.: GA4 ou alternativa mais respeitosa de privacidade) | Comportamento de navegação, funil entre seções, conversões |
| Ferramenta de mapa de calor/sessão (avaliar necessidade após volume mínimo de tráfego) | Entender fricção real de UX — não implementar antes de haver tráfego suficiente para gerar dado útil |
| Painel de afiliados (por programa: Amazon, Mercado Livre, Shopee, Magalu — conforme `PRODUTO_000.md`) | Cliques e conversão de link de afiliado |

A escolha de ferramenta específica de analytics de página é uma decisão técnica a ser tomada na implementação, respeitando o requisito de performance do `TEMA_WORDPRESS_AB.md` (nenhum script de terceiro pode bloquear a renderização) e o requisito de privacidade da Seção 6 deste documento.

---

# 2. KPIs por Seção

| Seção | KPI principal | KPIs de apoio |
|---|---|---|
| Biblioteca | Tráfego orgânico por cluster de conteúdo | Posição média por termo, tempo de permanência, taxa de saída, cliques em links internos de saída |
| Academia Recomenda | Taxa de clique em link de afiliado por ficha | Conversão declarada pelo painel de afiliados, distribuição de tráfego por categoria-pai |
| Academia News | Velocidade de indexação, tráfego nas primeiras 72h | Taxa de clique para o artigo evergreen relacionado (mede se a ponte para a Biblioteca funciona) |
| Produtos | Taxa de conversão de visita para compra | Origem do tráfego que converte (Biblioteca vs. Home vs. direto) |
| Global | Taxa de conversão de leitor de Biblioteca para newsletter | Crescimento de audiência recorrente (visitantes que retornam) |

---

# 3. Taxonomia de Eventos

Eventos mínimos a rastrear, com nomes estáveis (nunca renomear um evento em produção — criar um novo em vez disso, para não quebrar histórico):

* `visualizacao_artigo`
* `clique_link_afiliado`
* `clique_cta_produto_proprio`
* `envio_newsletter`
* `envio_formulario_contato`
* `busca_realizada` (com termo buscado, para retroalimentar pauta de conteúdo)
* `filtro_aplicado` (categoria/nível/preço)
* `clique_canal_complementar` (Telegram/WhatsApp/Instagram, ver `PORTAL_COMPONENTES.md`, 5.4)

---

# 4. Modelo de Atribuição

O relacionamento cruzado entre seções (`PORTAL_ARQUITETURA.md`, Seção 5) só tem valor se for mensurável. Dois funis centrais devem ser rastreáveis de ponta a ponta:

* **Biblioteca → Produtos:** artigo lido → clique em CTA de produto próprio → página de produto → compra. Mede se o conteúdo gratuito está de fato alimentando a monetização direta.
* **Biblioteca/Home → Academia Recomenda → Afiliado:** artigo ou destaque → ficha de produto → clique em link de afiliado. Mede a eficácia da curadoria como canal de receita.

---

# 5. Cadência de Revisão

| Cadência | Responsável | Foco |
|---|---|---|
| Semanal | Curador da Academia Recomenda / Redator | Cliques de afiliado, desempenho de notícias recentes |
| Mensal | Editor-chefe | KPIs por seção, auditoria da linha editorial 70/20/10 (`PORTAL_PLAYBOOK_EDITORIAL.md`, Seção 5) |
| Trimestral | Editor-chefe + Especialista SEO | Desempenho de clusters de conteúdo, Core Web Vitals, decisão sobre o que revisar/aposentar |

---

# 6. Privacidade e LGPD

* Consentimento de cookies de analytics exibido antes de qualquer rastreamento não essencial.
* Dados de navegação nunca vendidos ou compartilhados fora do necessário para operação do Portal.
* IP anonimizado nas ferramentas de analytics, quando a ferramenta escolhida suportar.
* Dados de formulário (newsletter, contato) tratados conforme já especificado em `PORTAL_COPYWRITING.md`, Seção 4.

---

# 7. O que Não é uma Meta de Sucesso Isolada

Reforçando `PORTAL_SEO.md`: número absoluto de visitantes, seguidores ou pageviews, sem relação com decisão de compra, aprendizado real ou avanço no funil, não deve orientar decisão editorial isolada — conforme o `CONSTITUICAO_DA_ACADEMIA.md`, o objetivo é ajudar profissionais a tomarem melhores decisões, não maximizar métricas de vaidade.

---

# Relação com os Demais Documentos

Este documento estende `PORTAL_SEO.md`, Seção 7, e mede a execução de `PORTAL_ARQUITETURA.md` e `PORTAL_PLAYBOOK_EDITORIAL.md`. Os KPIs de Academia Recomenda alimentam a governança da linha editorial 70/20/10 e o "Banco de Conhecimento por produto" previsto em `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md`.

---

**Fim do Documento**
