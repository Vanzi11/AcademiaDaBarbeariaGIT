# PORTAL_COPYWRITING.md

**Projeto:** Academia da Barbearia

**Documento:** Copywriting e Microcopy Oficial do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento define o tom de voz aplicado à interface do Portal, e especifica a microcopy — os pequenos textos de botões, mensagens, formulários e estados de sistema que, somados, formam a maior parte do contato do usuário com a marca.

Ele especializa, para o contexto de interface digital, os princípios já definidos em `03_GUIA_DE_IDENTIDADE_AB.md` (Seção 3 — Personalidade e Tom de Voz) e no `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` (Estilo de Comunicação). Não os substitui.

---

# Princípio Orientador

A maior parte do texto de uma interface não é o artigo que o profissional veio ler — é o texto ao redor: o botão que ele clica, a mensagem de erro que ele encontra, o rótulo do campo que ele preenche. Esses pequenos textos comunicam a personalidade da marca com mais frequência do que qualquer manifesto.

> Se o artigo é o mentor falando, a microcopy é o mentor gesticulando. Precisa ser consistente com a mesma pessoa.

---

# 1. Voz na Interface

Herdado diretamente, sem alteração:

* Escrevemos como um mentor experiente. Nunca como vendedor. Nunca como influenciador.
* Profissional sem ser distante. Direto sem ser seco. Acolhedor sem ser informal demais.
* Frases curtas. Sem reticências dramáticas. Exclamação usada raramente — quando aparece, tem peso.

## O que muda no contexto de interface

Diferente de um artigo ou e-book, a microcopy de interface tem espaço limitado e precisa ser instantaneamente clara. Isso reforça — nunca afrouxa — a exigência de objetividade. Um botão nunca tem duas interpretações possíveis.

---

# 2. Botões e Chamadas para Ação (CTAs)

## Princípios

* Verbo de ação no infinitivo ou imperativo, nunca substantivo vago.
* O botão descreve o que acontece ao clicar — nunca um rótulo genérico como "Clique aqui" ou "Saiba mais" sem contexto.
* Máximo 3–4 palavras.

## Padrões Aprovados

| Contexto | Texto do botão |
|---|---|
| Ver artigo completo | Continuar lendo |
| Ver ficha de produto | Ver avaliação completa |
| Ir para produto próprio | Conhecer o Kit Fundação |
| Comprar / redirecionar a afiliado | Ver oferta |
| Inscrever-se na newsletter | Quero receber |
| Enviar formulário de contato | Enviar mensagem |
| Abrir menu de categorias | Ver categorias |
| Buscar | Buscar |
| Filtrar resultados | Aplicar filtro |
| Limpar filtro | Limpar filtros |
| Voltar à listagem | Voltar para [Seção] |

## Nunca Usar

✗ "Clique aqui" · ✗ "Saiba mais" isolado sem indicar sobre o quê · ✗ "Comprar agora!!!" ou qualquer urgência artificial · ✗ "Descubra o segredo..." · ✗ Emojis em botões de interface.

---

# 3. Mensagens de Sistema

## 3.1 Estado Vazio (Busca ou Filtro sem Resultado)

**Padrão:**

> "Não encontramos resultados para '{termo}'. Veja os artigos mais lidos da Biblioteca ou tente uma busca mais ampla."

Nunca: "Ops! Nada aqui 😅" — tom de leveza excessiva contradiz a personalidade "profissional, não descontraída em excesso" da marca.

## 3.2 Página 404

**Padrão:**

> Título: "Esta página não existe."
> Corpo: "O conteúdo que você procura pode ter mudado de endereço ou não existe mais. Use a busca abaixo ou volte para o Início."

Tom didático e direto — nunca humorístico ("Ops, você se perdeu!"), por coerência com a personalidade "Sóbrio, não frio" e "Direto, sem rodeios" do `03_GUIA_DE_IDENTIDADE_AB.md`.

## 3.3 Formulário — Sucesso

**Padrão:**

> Newsletter: "Inscrição confirmada. Você vai receber nossos próximos conteúdos."
> Contato: "Mensagem enviada. Vamos responder em breve."

## 3.4 Formulário — Erro de Validação

**Padrão:**

> "Digite um e-mail válido para continuar."
> "Este campo é obrigatório."

Nunca mensagens técnicas de sistema ("Error 400: invalid input") expostas ao usuário final.

## 3.5 Carregamento

Quando necessário texto (a maior parte do carregamento deve ser resolvida visualmente com skeleton screens, ver `PORTAL_DESIGN_SYSTEM.md`, 4.8): "Carregando..." — nunca frases de preenchimento decorativas ("Preparando algo incrível para você...").

---

# 4. Rótulos de Formulário

* Sempre no formato de pergunta implícita ou substantivo direto: "Nome", "E-mail", "Assunto", "Mensagem" — nunca instruções longas como rótulo.
* Texto de ajuda (quando necessário) abaixo do campo, em `legenda`, tom neutro: "Usaremos seu e-mail apenas para enviar conteúdo da Academia."
* Consentimento de newsletter (LGPD), sempre presente e nunca pré-marcado: "Você pode cancelar sua inscrição a qualquer momento."

---

# 5. Rótulos de Navegação

Os nomes das seções principais são fixos e não devem ser alterados por conveniência de SEO ou moda: **Biblioteca**, **Academia Recomenda**, **Academia News**, **Produtos**, **Sobre**. Esses nomes são parte da arquitetura de informação (`PORTAL_ARQUITETURA.md`) e mudá-los quebra a familiaridade construída ao longo do tempo.

Rótulos de breadcrumb usam o nome oficial da categoria, sem abreviações.

---

# 6. Microcopy do Selo de Avaliação

Os textos dos selos são fixos, herdados do documento canônico `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`, e nunca devem ser reescritos ou abreviados de forma que percam clareza:

🟢 RECOMENDADO · 🟡 RECOMENDADO COM RESSALVAS · 🔵 ESPECIALIZADO · 🔴 NÃO RECOMENDADO

---

# 7. Microcopy de Transparência Comercial

Sempre que houver link de afiliado ou conteúdo monetizado, um texto curto e visível deve acompanhar, em linha com o princípio de Independência Editorial do `CONSTITUICAO_DA_ACADEMIA.md`:

> "Este link é de um programa de afiliados. Isso não influencia nossa avaliação — nosso critério é sempre técnico."

Nunca esconder ou minimizar essa informação como letra miúda ilegível.

---

# 8. CTAs de Conexão Entre Seções

Textos que operacionalizam o relacionamento entre conteúdos definido em `PORTAL_ARQUITETURA.md`, Seção 5:

| De → Para | Texto sugerido |
|---|---|
| Artigo → Ficha de produto | "Veja nossa avaliação completa sobre [categoria de produto]." |
| Ficha de produto → Artigo | "Antes de decidir, entenda como escolher: [título do artigo]." |
| Notícia → Artigo evergreen | "Para entender o assunto a fundo, leia: [título do artigo]." |
| Artigo → Produto próprio | "Se você quer ir além, o Kit Fundação da Barbearia aprofunda esse tema na prática." |

---

# 9. O Que a Microcopy do Portal Nunca Faz

✗ Urgência artificial ("Últimas vagas!", "Só hoje!") — a Academia nunca vende com pressão.

✗ Superlativos vazios ("o melhor", "incrível", "revolucionário") sem lastro técnico demonstrado no conteúdo.

✗ Jargão de marketing digital ("growth", "funil", "conversão") voltado ao usuário final — esses termos são internos, nunca aparecem na interface pública.

✗ Emojis fora dos selos oficiais de avaliação.

✗ Qualquer frase que possa soar como promessa de resultado financeiro ou profissional garantido.

---

# Relação com os Demais Documentos

Este documento especializa `03_GUIA_DE_IDENTIDADE_AB.md` (voz da marca) e o `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` (princípios editoriais) para o contexto de microcopy de interface. Os componentes onde essa copy aparece estão descritos em `PORTAL_COMPONENTES.md`. O uso desses textos em cada página está exemplificado em `06_PORTAL/PAGINAS/`.

---

**Fim do Documento**
