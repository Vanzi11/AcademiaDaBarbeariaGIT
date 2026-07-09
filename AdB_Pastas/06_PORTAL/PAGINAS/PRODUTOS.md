# PRODUTOS.md

**Projeto:** Academia da Barbearia

**Página:** Produtos

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo da Página

Produtos é a vitrine comercial dos produtos digitais próprios da Academia (ex.: Kit Fundação da Barbearia, Produto 001). É a única seção do Portal com objetivo comercial direto e primário — as demais seções (Biblioteca, Academia Recomenda, Academia News) existem para gerar confiança e audiência; esta seção existe para converter essa confiança em receita, sustentando o modelo de negócio descrito no `CONSTITUICAO_DA_ACADEMIA.md`.

Isso não significa tom de venda agressiva — a mesma voz de mentor se aplica aqui (`PORTAL_COPYWRITING.md`), apenas com uma chamada para ação mais direta ao final.

---

# Arquitetura

```
1. Header
2. Título da seção — "Produtos da Academia"
3. Grade de Cards de Produto Próprio
4. Footer
```

## Página Individual de Produto (ex.: Kit Fundação da Barbearia)

```
1. Header
2. Breadcrumb
3. Hero do produto — nome, proposta de valor, transformação (Antes → Depois, conforme PRODUTO_001.md)
4. Estrutura do produto (módulos/componentes do Kit)
5. Para quem é / Diferenciais
6. Prova social (reservado — ativar quando houver depoimentos reais; nunca simular)
7. Perguntas frequentes
8. CTA final de compra
9. Bloco de Relacionados — artigos da Biblioteca que se conectam à etapa do Framework FDP-AB correspondente ao produto
10. Footer
```

---

# Wireframe Textual

A transformação (Antes/Depois) reaproveita literalmente a lógica já definida em `PRODUTO_001.md`: "Antes: 'Tenho uma barbearia simples.' Depois: 'Tenho uma barbearia profissional, organizada e preparada para crescer.'" Cada novo produto formula sua própria transformação no mesmo padrão.

A seção "Estrutura do produto" lista os módulos como uma jornada, não como uma lista de arquivos — reforçando que o produto é um "Manual de Implantação", conforme a experiência de cliente descrita em `PRODUTO_001.md`.

Prova social nunca é fabricada ou estimada — a seção permanece vazia (ou omitida) até existirem depoimentos reais, por exigência de Honestidade (`MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`).

---

# Componentes Utilizados

Header · Breadcrumb · Card de Produto Próprio · CTA de Produto (Banner) · Bloco de Relacionados · Footer.

---

# SEO

Termos transacionais e de marca do produto (`PORTAL_SEO.md`, Seção 2). Schema `Product` na página individual. Conteúdo desta seção não compete por termos informacionais — esses pertencem à Biblioteca.

---

# CTAs da Página

"Conhecer o Kit Fundação" (vitrine → produto) · "Ver oferta" / CTA de compra final (na página individual).

---

# Relacionamento com Outras Páginas

Recebe tráfego qualificado da Biblioteca (leitor engajado que quer aprofundar) e da Home (destaque). Cada produto linka de volta para os artigos da Biblioteca que correspondem à mesma etapa do Framework FDP-AB — ponte natural de conteúdo gratuito para produto pago, conforme `PORTAL_ARQUITETURA.md`, Seção 5.

---

**Fim do Documento**
