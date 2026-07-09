# PORTAL_MIGRACAO_PRODUTO_001.md

**Projeto:** Academia da Barbearia

**Documento:** Plano de Migração de Conteúdo do Produto 001 para o Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

O Produto 001 (Kit Fundação da Barbearia) é o primeiro produto comercial da Academia, com conteúdo já produzido em `03_PRODUTOS/PRODUTO_001/`. Este documento define **o que pode e o que não pode** ser transformado em artigo gratuito da Biblioteca, para que o Portal se beneficie desse acervo sem esvaziar o valor comercial do produto pago.

---

# Princípio: Fatiar sem Esvaziar

> O conteúdo gratuito da Biblioteca deve gerar confiança suficiente para o profissional querer o Kit Fundação — nunca conhecimento suficiente para que ele deixe de precisar dele.

Isso não é uma tensão a esconder — é a mesma lógica da Etapa 1 → Etapa 2 da Estratégia de Crescimento da Constituição (Audiência → Autoridade → produto pago). A regra prática:

* A Biblioteca recebe o **porquê** e o **conceito** — a explicação de um problema real e a lógica por trás da solução.
* O Kit Fundação retém o **como**, passo a passo, os templates prontos, os checklists de implantação e o acompanhamento estruturado descrito em `PRODUTO_001.md` como "Manual de Implantação".

Um artigo da Biblioteca nunca deve deixar o leitor com a sensação de já ter recebido o produto de graça. Deve deixar a sensação de "agora eu entendo por que isso importa — e quero o material completo para aplicar".

---

# Regra de Reuso e Direitos

* **Nunca republicar trechos literais** do `03_LIVRO_FONTE` ou `04_LIVRO_LAYOUT` do Produto 001. Todo artigo da Biblioteca é reescrito do zero para o formato web, seguindo `PORTAL_GUIA_REDACAO_BIBLIOTECA.md` — mesmo quando inspirado diretamente em um capítulo do livro-fonte.
* O material do Kit Fundação (`06_KIT_FUNDACAO`) — templates, checklists prontos, ferramentas — nunca é publicado na Biblioteca, nem parcialmente. É o que diferencia o produto pago do conteúdo gratuito.
* Toda adaptação passa pelo fluxo de aprovação humana de `PORTAL_PLAYBOOK_EDITORIAL.md` antes da publicação.

---

# Mapeamento de Módulos para Categorias da Biblioteca

| Módulo do Produto 001 | Etapa FDP-AB (`PRODUTO_001.md`) | Categoria de destino na Biblioteca (`PORTAL_ARQUITETURA.md`, 3.1) | O que migra (conceito) | O que fica exclusivo do Kit |
|---|---|---|---|---|
| Módulo 1 — Guia da Identidade da Barbearia | Fundamentar | Identidade e Marca | Por que identidade de marca importa; o que uma barbearia comunica sem perceber | O processo guiado de construção da identidade própria, os templates de aplicação |
| Módulo 2 — Guia do Bom Atendimento | Diferenciar | Atendimento e Experiência | Princípios de experiência do cliente; erros comuns de atendimento | O roteiro completo de atendimento e os scripts prontos |
| Módulo 3 — Templates para Redes Sociais | Diferenciar | Marketing e Redes Sociais | Boas práticas de comunicação da barbearia nas redes | Os templates prontos para uso |
| Módulo 4 — Checklists Operacionais | Perpetuar | Gestão da Barbearia | Por que padronização eleva a qualidade percebida | Os checklists prontos e detalhados |
| Módulo 5 — Planner da Barbearia | Perpetuar | Gestão da Barbearia | Princípios de organização de rotina e planejamento | O planner completo |
| Módulo 6 — Materiais Bônus (fornecedores, apps, IA) | Perpetuar (transversal) | Ferramentas e Tecnologia | Critérios gerais para escolher fornecedores/ferramentas | As listas e recomendações específicas e curadas do Kit |

Cada linha da coluna "O que migra" é, tipicamente, matéria-prima para 2 a 4 artigos da Biblioteca — nunca um único artigo que tente resumir o módulo inteiro (isso tenderia a vazar conteúdo demais de uma vez).

---

# Fluxo de Adaptação

```
1. Selecionar um conceito central do módulo (nunca o módulo inteiro)
       ↓
2. Reescrever como resposta a uma pergunta de busca real (PORTAL_SEO.md)
       ↓
3. Aplicar a estrutura de PORTAL_GUIA_REDACAO_BIBLIOTECA.md
       ↓
4. Encerrar com CTA para o Kit Fundação, seguindo PORTAL_ARQUITETURA.md, Seção 5
       ↓
5. Aprovação humana (PORTAL_PLAYBOOK_EDITORIAL.md)
```

---

# CTA de Conversão

Todo artigo migrado do Produto 001 termina com um CTA de Produto (Banner, `PORTAL_COMPONENTES.md`, Seção 5.3) direcionando ao Kit Fundação, formulado conforme o padrão já definido em `PORTAL_COPYWRITING.md`, Seção 8:

> "Se você quer ir além, o Kit Fundação da Barbearia aprofunda esse tema na prática."

O texto de CTA é sempre específico ao módulo correspondente (ex.: um artigo sobre identidade linka para o contexto do Módulo 1, não genericamente para o Kit inteiro), reforçando que o produto resolve exatamente a lacuna que o artigo acabou de abrir.

---

# O que Não Migra Nesta Fase

* Nenhum material do `06_KIT_FUNDACAO` (templates, checklists prontos).
* Nenhum conteúdo do `03_LIVRO_FONTE`/`04_LIVRO_LAYOUT` de forma literal.
* Materiais ainda em revisão (`07_REVISOES`) — aguardam validação antes de sequer serem considerados como fonte de inspiração para artigo público.

---

# Relação com os Demais Documentos

Este plano aplica `PORTAL_GUIA_REDACAO_BIBLIOTECA.md` a uma fonte de conteúdo específica, dentro do fluxo de `PORTAL_PLAYBOOK_EDITORIAL.md`, e implementa o relacionamento Biblioteca ↔ Produtos definido em `PORTAL_ARQUITETURA.md`, Seção 5. Referencia diretamente `03_PRODUTOS/PRODUTO_001/PRODUTO_001.md`.

---

**Fim do Documento**
