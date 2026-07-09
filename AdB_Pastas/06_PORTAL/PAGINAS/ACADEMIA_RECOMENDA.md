# ACADEMIA_RECOMENDA.md

**Projeto:** Academia da Barbearia

**Página:** Academia Recomenda

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo da Página

Academia Recomenda existe para reduzir a incerteza na hora de comprar — nunca para maximizar cliques em links de afiliado. O objetivo declarado no `CONSTITUICAO_DA_ACADEMIA.md` é literal: "facilitar a decisão de compra do profissional", nunca "vender qualquer produto".

Nesta fase (Nível 1 — Curadoria, conforme `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`), as avaliações são baseadas em documentação técnica, especificações de fabricante e pesquisa de mercado — não em testes práticos. Isso deve ficar transparente para o leitor, nunca escondido.

Esta página reconcilia-se com `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md`, que já definia a arquitetura estratégica desta seção antes deste Portal. A reconciliação completa está registrada em `PORTAL_ARQUITETURA.md`, Seção 9. Em especial, a curadoria de conteúdo desta seção segue a linha editorial fixa do Produto 000: **70% conteúdo útil, 20% ofertas, 10% produtos próprios** — nunca invertida.

---

# Arquitetura

Dois templates: **arquivo** (`/academia-recomenda/` e `/academia-recomenda/{categoria-produto}/`) e **ficha de produto individual** (`/academia-recomenda/{categoria-produto}/{slug}/`).

## Arquivo

```
1. Header
2. Título + explicação curta da metodologia (com link para saber mais)
3. Filtro (categoria-pai de produto + faixa de preço) — ver as 4 categorias-pai reconciliadas em PORTAL_ARQUITETURA.md, Seção 3.2
4. Grade de Cards de Produto (com Selo sempre visível)
5. Footer
```

## Ficha de Produto Individual

Segue rigorosamente a sequência obrigatória do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`, implementada pelo componente Ficha Técnica de Produto (`PORTAL_COMPONENTES.md`, 3.5):

```
1. Header
2. Breadcrumb
3. Resposta Rápida (produto, marca, modelo, categoria/subcategoria, faixa de preço, Nota Geral 0-10, status da avaliação, última atualização)
4. Selo Academia (conclusão qualitativa — não confundir com a Nota Geral numérica, que é complementar)
5. Resumo Executivo (até 3 linhas)
6. Para Quem É?
7. Para Quem NÃO É?
8. Pontos Fortes
9. Pontos Fracos
10. Vale o Preço? (inclui mini-histórico: menor preço já registrado e preço médio)
11. Quando Comprar?
12. Quando NÃO Comprar?
13. Melhor Alternativa
14. Produtos Relacionados
15. Onde Comprar (com aviso de transparência de afiliado)
16. Bloco de Canais Complementares (Telegram/WhatsApp/Instagram, conforme PORTAL_ARQUITETURA.md, Seção 9.1)
17. Bloco de Relacionados (artigos de contexto da Biblioteca)
18. Footer
```

---

# Wireframe Textual

A Resposta Rápida e o Selo aparecem imediatamente acima da dobra — o leitor não deve precisar rolar a página para saber a conclusão geral da Academia. Isso é uma exigência de UX, não apenas editorial: implementa na prática o princípio de Clareza do `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`.

A seção "Onde Comprar" sempre inclui o aviso de transparência comercial definido em `PORTAL_COPYWRITING.md`, Seção 7.

A seção "Melhor Alternativa" nunca é omitida, mesmo quando o produto avaliado recebe selo 🟢 RECOMENDADO — a Academia nunca esconde concorrentes, por exigência direta do Framework.

---

# Componentes Utilizados

Header · Breadcrumb · Filtro · Card de Produto · Selo de Avaliação · Ficha Técnica de Produto (com Nota Geral e Histórico de Preço) · Tabela Comparativa (quando houver comparação direta) · Bloco de Canais Complementares · Bloco de Relacionados · Footer.

---

# SEO

Termos comparativos e avaliativos ("melhor X para Y", "X vale a pena"), conforme `PORTAL_SEO.md`, Seção 2. Schema `Product` + `Review`/`AggregateRating` obrigatório. Atualização periódica de preço e disponibilidade é requisito de SEO e de credibilidade simultaneamente.

---

# CTAs da Página

"Ver oferta" · "Ver avaliação completa" · filtros de categoria e preço.

---

# Relacionamento com Outras Páginas

Toda ficha linka para pelo menos um artigo de contexto da Biblioteca (`PORTAL_ARQUITETURA.md`, Seção 5). É citada na Home como destaque rotativo. Não deve ser confundida com Produtos — Academia Recomenda avalia produtos de terceiros; Produtos vende produtos próprios da Academia.

---

**Fim do Documento**
