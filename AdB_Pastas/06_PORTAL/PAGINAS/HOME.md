# HOME.md

**Projeto:** Academia da Barbearia

**Página:** Início

**Departamento:** 06_PORTAL/PAGINAS

**Versão:** 1.1 — Revisado na Implementação V1 (ver `RELATORIO_HOME_V1.md`)

**Status:** Oficial

---

# Objetivo da Página

A Home cumpre três funções simultâneas: apresentar a Academia em segundos para um visitante novo, orientar rapidamente para as seções do Portal, e mostrar frescor de conteúdo e de oferta comercial para quem já conhece a marca e volta com frequência.

O visitante deve compreender "o que é a Academia da Barbearia" em menos de cinco segundos — critério de aceite explícito desta versão (`RELATORIO_HOME_V1.md`, pergunta 2).

**Mudança nesta versão:** a ordem de seções foi revisada para dar à Academia Recomenda — a principal frente comercial do Portal — prioridade imediatamente após a chegada e a busca, antes da Biblioteca. Isso é uma decisão de **priorização de conteúdo na página**, não uma alteração da arquitetura de navegação: a ordem do menu principal (`PORTAL_ARQUITETURA.md`, Seção 2) permanece Biblioteca → Academia Recomenda → Academia News → Produtos → Sobre, inalterada. Uma página pode contar a história em uma ordem diferente da que o menu lista — são camadas distintas.

---

# Arquitetura da Página

```
1. Header (fixo)
2. Hero — proposta de valor institucional (escuro, Verde Quadro Negro)
3. Busca em Destaque (escuro, Preto Carvão)
4. Academia Recomenda em destaque (claro)
5. Destaques da Biblioteca (claro)
6. Academia News — Radar do Mercado (escuro, Preto Carvão)
7. Produtos da Academia — Kit Fundação da Barbearia (escuro, Verde Quadro Negro)
8. Newsletter (claro)
9. Footer (escuro, Preto Carvão)
```

Especificação visual completa (grid, cor exata, wireframe por breakpoint, microinterações): `HOME_WIREFRAME.md`. Este documento descreve conteúdo e relacionamento; aquele descreve a composição visual construível.

---

# Wireframe Textual

**Seção 1 — Hero**

Headline (H1, `display`): "Ajudamos barbeiros a tomar melhores decisões." — adaptação direta da Frase Norte institucional (`001_VISAO.md`, `CONSTITUICAO_DA_ACADEMIA.md`) para o formato de headline de Home.

Subheadline: uma frase explicando o que o Portal contém — conhecimento, curadoria de produtos, inteligência de mercado.

Dois CTAs: "Ver Academia Recomenda" (primário) e "Explorar a Biblioteca" (secundário).

Sem imagem — força visual inteiramente tipográfica, sobre fundo Verde Quadro Negro (superfície de assinatura, `PORTAL_DESIGN_SYSTEM.md`, Seção 1.6).

**Seção 2 — Busca em Destaque**

Seção própria, não mais embutida no Hero (mudança em relação à versão anterior deste documento). Título curto convidando à busca, campo de busca grande (usa a busca nativa do WordPress no lançamento, ver `TEMA_WORDPRESS_AB.md`), sugestões de categoria abaixo do campo. Fundo Preto Carvão, formando com o Hero um único bloco escuro de abertura.

**Seção 3 — Academia Recomenda em destaque**

Título de seção: "Academia Recomenda". Breve linha explicando o critério (link para a metodologia). Grade de 3 Cards de Produto, com Selo sempre visível. Link "Ver tudo".

**Seção 4 — Destaques da Biblioteca**

Título de seção: "Da Biblioteca". Grade de 3 Cards de Artigo. Link "Ver tudo".

**Seção 5 — Academia News (Radar do Mercado)**

Título de seção: "Radar do Mercado — Academia News". Lista compacta de até 4 notícias recentes (não grade de cards, ver `HOME_WIREFRAME.md`, Seção 5). Fundo Preto Carvão. Link "Ver tudo".

**Seção 6 — Produtos da Academia**

CTA de Produto (banner) apresentando o Kit Fundação da Barbearia (`PRODUTO_001.md`). Fundo Verde Quadro Negro.

**Seção 7 — Newsletter**

Formulário de Newsletter com uma linha de proposta de valor ("Receba conteúdo novo da Academia direto no seu e-mail"). Fundo Branco Marfim.

---

# Componentes Utilizados

Header · Hero · Busca em Destaque (Search Hero) · Card de Produto · Card de Artigo · Radar do Mercado (variante de lista do Card de Notícia) · CTA de Produto (Banner) · Formulário de Newsletter · Footer.

Especificação de cada um em `PORTAL_COMPONENTES.md` (Hero e Busca em Destaque adicionados nesta versão).

---

# SEO

* Título de página: nome da marca + proposta de valor institucional (foco em busca navegacional/institucional).
* H1 único, com a headline do Hero — não repete o title tag literalmente.
* Schema `Organization` no rodapé (global), aplicado também aqui.
* Prioridade de rastreamento: a Home linka para as páginas de arquivo de todas as seções, distribuindo autoridade de domínio para elas (link equity) — a nova ordem de seções não altera quais links existem, apenas a posição visual deles na página.

---

# CTAs da Página

"Ver Academia Recomenda" e "Explorar a Biblioteca" (Hero) · Busca (placeholder "Buscar na Academia...") · "Ver tudo" (Academia Recomenda, Biblioteca, Radar do Mercado) · "Conhecer o Kit Fundação da Barbearia" (Produtos) · "Quero receber" (Newsletter).

Textos exatos e regras completas em `PORTAL_COPYWRITING.md`. Os novos CTAs desta versão seguem os mesmos padrões já estabelecidos ali (verbo de ação, sem urgência artificial).

---

# Relacionamento com Outras Páginas

A Home é o topo da hierarquia de navegação (`PORTAL_ARQUITETURA.md`, Seção 1) e linka para todas as demais páginas descritas neste diretório. Nenhuma outra página linka "de volta" para a Home como CTA principal — o Header e o logotipo já cumprem essa função em todas as páginas. A priorização de Academia Recomenda nesta versão não muda esse relacionamento — apenas a ordem em que ele é apresentado ao visitante.

---

**Fim do Documento**
