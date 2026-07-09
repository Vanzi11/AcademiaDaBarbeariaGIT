# ACADEMIA_NEWS.md

**Projeto:** Academia da Barbearia

**Página:** Academia News

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo da Página

Academia News mantém o profissional informado sobre o que está acontecendo no setor — lançamentos, tendências, eventos. É a seção mais próxima do formato "portal de notícias" que a Constituição explicitamente rejeita como identidade central da empresa; por isso, sua função aqui é deliberadamente subordinada e conectora: cada notícia deve, sempre que possível, servir de porta de entrada para o conhecimento permanente da Biblioteca.

Diferente da Biblioteca, o conteúdo aqui é perecível por natureza — e isso é aceito e esperado, não um defeito a corrigir.

---

# Arquitetura

```
1. Header
2. Título da seção
3. Feed cronológico reverso de Cards de Notícia
4. Paginação
5. Footer
```

## Notícia Individual

```
1. Header
2. Breadcrumb
3. Data de publicação
4. Título (H1)
5. Corpo da notícia
6. Bloco de Relacionados — priorizando artigo evergreen da Biblioteca sobre o mesmo tema, quando existir
7. Footer
```

---

# Wireframe Textual

O feed cronológico não é segmentado por categoria nesta fase de lançamento (ver `PORTAL_ARQUITETURA.md`, Seção 3.3) — apenas tags leves, se necessário. Cada notícia com indicador "Novo" quando publicada há menos de 7 dias (`PORTAL_COMPONENTES.md`, 4.3).

Ao final de cada notícia, sempre perguntar durante a produção editorial: "existe um artigo da Biblioteca que aprofunda este assunto?" Se sim, o Bloco de Relacionados prioriza esse link acima de outras notícias.

---

# Componentes Utilizados

Header · Breadcrumb · Card de Notícia (variante do Card de Artigo) · Paginação · Bloco de Relacionados · Footer.

---

# SEO

Conteúdo otimizado para frescor e velocidade de indexação, não para permanência — ver `PORTAL_SEO.md`, Seção 1 (Prevenção de Canibalização) e Seção 6 (Cadência Editorial). Nunca publicar aqui um tema atemporal que deveria ser artigo de Biblioteca.

---

# CTAs da Página

"Continuar lendo" · link direto ao artigo evergreen relacionado, quando existir.

---

# Relacionamento com Outras Páginas

Academia News linka ativamente para a Biblioteca sempre que possível. Aparece na Home como destaque rotativo. Não recebe links de afiliado nem CTAs de Academia Recomenda diretamente — o link comercial pertence à ficha de produto, não à notícia.

---

**Fim do Documento**
