# HOME.md

**Projeto:** Academia da Barbearia

**Página:** Início

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo da Página

A Home cumpre três funções simultâneas: apresentar a Academia em segundos para um visitante novo, orientar rapidamente para as cinco seções do Portal, e mostrar frescor de conteúdo para quem já conhece a marca e volta com frequência.

Ela não vende diretamente. Ela orienta. A decisão de compra acontece dentro de Academia Recomenda ou Produtos — a Home apenas constrói a confiança inicial e aponta o caminho.

---

# Arquitetura da Página

```
1. Header (fixo)
2. Hero — proposta de valor + busca
3. "Comece por aqui" — atalhos para as 5 seções
4. Destaques da Biblioteca (3 artigos recentes ou mais relevantes)
5. Academia Recomenda em destaque (3 produtos avaliados)
6. Academia News recentes (3 notícias)
7. Produtos da Academia (CTA para Kit Fundação / catálogo próprio)
8. Newsletter
9. Footer
```

---

# Wireframe Textual

**Seção 1 — Hero**

Título (H1, curto, institucional): comunica a essência da Academia em uma frase — não um slogan vazio, uma frase que já contém a proposta de valor (ex.: variação editorial de "A Academia da Barbearia existe para ajudar barbeiros a tomar melhores decisões", adaptada para tom de Home).

Subtítulo: uma frase explicando o que o Portal contém — conhecimento, avaliação de produtos, notícias.

Campo de busca em destaque (componente Busca).

Fundo do Hero em Verde Quadro Negro (a superfície de assinatura definida em `PORTAL_DESIGN_SYSTEM.md`, Seção 1.6), texto em Branco Marfim, acento em Dourado Terroso na busca ativa — o único bloco de página em modo claro autorizado a usar essa cor em massa, exatamente como um produto de tecnologia usa sua cor de assinatura no primeiro impacto visual.

Sem imagem hero genérica de banco de imagens — se houver imagem, é fotografia documental real, conforme `GUIA_DIRECAO_DE_ARTE_AB.md`.

**Seção 2 — Comece por aqui**

Cinco blocos de atalho (ícone + nome + uma linha de descrição), um para cada seção principal: Biblioteca, Academia Recomenda, Academia News, Produtos, Sobre.

**Seção 3 — Destaques da Biblioteca**

Título de seção: "Da Biblioteca". Grade de 3 Cards de Artigo. Link "Ver toda a Biblioteca" ao final.

**Seção 4 — Academia Recomenda em destaque**

Título de seção: "Academia Recomenda". Breve linha explicando o critério (link para a metodologia). Grade de 3 Cards de Produto. Link "Ver todas as avaliações".

**Seção 5 — Academia News**

Título de seção: "Academia News". Grade de 3 Cards de Notícia. Link "Ver todas as notícias".

**Seção 6 — Produtos da Academia**

CTA de Produto (banner) apresentando o produto próprio em destaque (ex.: Kit Fundação da Barbearia).

**Seção 7 — Newsletter**

Formulário de Newsletter com uma linha de proposta de valor ("Receba conteúdo novo da Academia direto no seu e-mail").

---

# Componentes Utilizados

Header · Busca · Blocos de Atalho (variação simples de Card) · Card de Artigo · Card de Produto · Card de Notícia · CTA de Produto (Banner) · Formulário de Newsletter · Footer.

Ver especificação de cada um em `PORTAL_COMPONENTES.md`.

---

# SEO

* Título de página: nome da marca + proposta de valor institucional (foco em busca navegacional/institucional).
* H1 único, com a frase institucional — não repete o title tag literalmente.
* Schema `Organization` no rodapé (global), aplicado também aqui.
* Prioridade de rastreamento: a Home deve linkar para as páginas de arquivo de todas as seções, distribuindo autoridade de domínio para elas (link equity).

---

# CTAs da Página

"Ver categorias" (atalhos) · "Continuar lendo" (Cards de Artigo) · "Ver avaliação completa" (Cards de Produto) · "Conhecer o Kit Fundação" (CTA de Produto) · "Quero receber" (Newsletter).

Textos exatos e regras completas em `PORTAL_COPYWRITING.md`.

---

# Relacionamento com Outras Páginas

A Home é o topo da hierarquia de navegação (`PORTAL_ARQUITETURA.md`, Seção 1) e linka para todas as demais páginas descritas neste diretório. Nenhuma outra página linka "de volta" para a Home como CTA principal — o Header e o logotipo já cumprem essa função em todas as páginas.

---

**Fim do Documento**
