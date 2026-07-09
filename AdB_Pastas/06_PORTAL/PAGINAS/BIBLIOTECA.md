# BIBLIOTECA.md

**Projeto:** Academia da Barbearia

**Página:** Biblioteca

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo da Página

A Biblioteca é a base de conhecimento permanente da Academia — o coração do Portal, no sentido literal da identidade institucional ("Portal Brasileiro de Inteligência", `CONSTITUICAO_DA_ACADEMIA.md`). Seu objetivo é responder, de forma completa e honesta, às perguntas reais que um profissional da beleza faz sobre gestão, técnica, atendimento, marketing e identidade de marca.

Diferente da Academia News, nada aqui é datado. Um artigo publicado hoje deve continuar respondendo à mesma pergunta com a mesma qualidade em três anos — e ser atualizado quando deixar de fazê-lo.

---

# Arquitetura

Esta especificação cobre dois templates: o **arquivo** (`/biblioteca/` e `/biblioteca/{categoria}/`) e o **artigo individual** (`/biblioteca/{categoria}/{slug}/`).

## Arquivo da Biblioteca

```
1. Header
2. Título da seção/categoria + breve descrição
3. Filtro (categoria + nível)
4. Grade de Cards de Artigo (paginada)
5. Footer
```

## Artigo Individual

```
1. Header
2. Breadcrumb
3. Categoria + nível + tempo de leitura
4. Título (H1)
5. Corpo do artigo (H2/H3, Caixas de Destaque, Caixa de Método quando aplicável)
6. CTA contextual (produto relacionado, quando fizer sentido — nunca forçado)
7. Bloco de Relacionados (outros artigos do cluster + produto da Academia Recomenda, quando aplicável)
8. Footer
```

---

# Wireframe Textual — Artigo Individual

Abertura do artigo sempre com contexto direto — nunca introdução genérica de "neste artigo você vai aprender". Estrutura pedagógica: Explicar → Demonstrar → Aplicar → Transformar, conforme `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`.

Se o artigo referenciar uma categoria de produto (ex.: "como escolher uma máquina de corte"), deve existir, próximo à conclusão, uma Caixa de Destaque ou CTA contextual linkando para a categoria correspondente em Academia Recomenda — implementação direta de `PORTAL_ARQUITETURA.md`, Seção 5.

Se o artigo tratar de metodologia proprietária (FDP-AB, Framework de Avaliação), o trecho correspondente usa a Caixa de Método.

---

# Componentes Utilizados

Header · Breadcrumb · Filtro de Categoria/Nível · Card de Artigo · Caixa de Destaque · Caixa de Método · Bloco de Relacionados · CTA de Produto (quando aplicável) · Footer.

---

# SEO

Implementação central da estratégia de pilar e cluster definida em `PORTAL_SEO.md`, Seção 1. Cada categoria é uma página pilar; cada artigo é conteúdo de cluster, formulado como resposta a uma pergunta long-tail específica. Schema `Article` obrigatório em todo artigo individual.

---

# CTAs da Página

"Continuar lendo" · "Ver avaliação completa" (quando há produto relacionado) · "Conhecer o Kit Fundação" (quando o tema se conecta a um produto próprio) · filtros ("Aplicar filtro", "Limpar filtros").

---

# Relacionamento com Outras Páginas

A Biblioteca é o hub de conteúdo mais conectado do Portal: recebe tráfego de Academia News (quando uma notícia aponta para o aprofundamento evergreen) e alimenta tanto Academia Recomenda (contexto de compra) quanto Produtos (aprofundamento pago). É citada com frequência nos Destaques da Home.

---

**Fim do Documento**
