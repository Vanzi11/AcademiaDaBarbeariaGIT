# PORTAL_COMPONENTES.md

**Projeto:** Academia da Barbearia

**Documento:** Catálogo de Componentes Reutilizáveis do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este documento cataloga todos os componentes reutilizáveis do Portal. Cada componente é descrito por função, anatomia, variantes, regras de conteúdo e onde é utilizado.

Nenhum template do Portal deve construir um componente do zero se ele já estiver catalogado aqui. Nenhum componente novo deve ser implementado no tema sem antes ser adicionado a este catálogo.

Os fundamentos visuais (cor, tipografia, espaçamento) de cada componente vêm de `PORTAL_DESIGN_SYSTEM.md` e não são repetidos aqui em detalhe — este documento foca em estrutura, comportamento e regras de conteúdo.

---

# 1. Navegação

## 1.1 Header

**Função:** orientação e acesso a qualquer parte do Portal a partir de qualquer página.

**Anatomia:** logotipo (esquerda) · navegação principal (centro/direita) · busca (direita) · menu hambúrguer (mobile, substitui navegação).

**Comportamento:** fixo no topo ou com esconde-ao-rolar-para-baixo/aparece-ao-rolar-para-cima. Fundo Branco Marfim com leve sombra ao rolar, para separar do conteúdo sem borda pesada.

**Navegação inteligente por âncora (Home):** os itens do menu (Biblioteca, Academia Recomenda, Academia News, Produtos) correspondem tanto a páginas dedicadas quanto a seções da Home (`PAGINAS/HOME.md`). Comportamento esperado: quando o usuário já está na Home, clicar em um desses itens rola suavemente até a seção correspondente na própria página (`scroll-behavior: smooth`, com `scroll-margin-top` compensando a altura do header fixo); em qualquer outra página, o mesmo link navega normalmente para a página dedicada (`/biblioteca/`, `/academia-recomenda/` etc.). Não há dois comportamentos diferentes de menu — é o mesmo link, resolvido de forma diferente conforme o contexto de onde o usuário já está. "Sobre" não corresponde a nenhuma seção da Home — é sempre navegação de página.

**Onde é usado:** todas as páginas.

## 1.2 Mega Menu

**Função:** expor subcategorias de Biblioteca e Academia Recomenda sem exigir navegação em múltiplos cliques.

**Anatomia:** colunas por grupo de categoria, título de coluna em `neutro-700`, itens em `corpo`, coluna final opcional com destaque editorial (ex.: "Artigo em destaque da semana").

**Regra de conteúdo:** máximo 4 colunas. Se as categorias não couberem em 4 colunas, é sinal de que a taxonomia precisa ser revisada, não de que o menu precisa crescer.

**Onde é usado:** item "Biblioteca" e "Academia Recomenda" do header.

## 1.3 Busca

**Função:** localizar conteúdo por palavra-chave em qualquer seção.

**Anatomia:** campo de texto com ícone de lupa · filtro opcional por tipo de conteúdo · botão/tecla Enter para buscar.

**Estados:** vazio (placeholder "Buscar na Academia..."), digitando (sugestões instantâneas, se tecnicamente viável), sem resultados (ver 8.2 Estado Vazio), com resultados (lista de Cards).

**Onde é usado:** header (todas as páginas), página dedicada `/busca/`.

## 1.4 Breadcrumb

**Função:** indicar a localização atual na hierarquia do Portal e permitir subir níveis rapidamente.

**Anatomia:** `Início / Categoria / Subcategoria / Página atual` — o item atual não é clicável.

**Onde é usado:** toda página de nível 2 ou mais profundo (artigos, fichas de produto, notícias, categorias).

## 1.5 Paginação

**Função:** navegar por listagens longas sem carregar todo o conteúdo de uma vez.

**Anatomia:** números de página + anterior/próximo. Em listagens muito longas, considerar "carregar mais" como alternativa em vez de paginação numérica — decisão a validar com dados reais de uso após lançamento.

**Onde é usado:** arquivos de Biblioteca, Academia Recomenda, Academia News, resultados de busca.

## 1.6 Filtro de Categoria/Nível

**Função:** refinar uma listagem sem sair da página.

**Anatomia:** conjunto de chips ou dropdown (categoria, nível, faixa de preço quando aplicável) acima da listagem de cards.

**Onde é usado:** arquivos de Biblioteca (filtro por nível) e Academia Recomenda (filtro por faixa de preço e categoria).

---

# 2. Cards

## 2.1 Card de Artigo

**Função:** representar um artigo da Biblioteca ou uma notícia da Academia News em formato de listagem.

**Anatomia:** imagem (16:9) · categoria (micro-label) · título (H4) · resumo (1–2 linhas) · metadado (tempo de leitura ou data) · área de toque única.

**Variante:** Card de Notícia substitui "tempo de leitura" por "data de publicação", e pode incluir indicador visual "Novo" para itens publicados há menos de 7 dias.

**Onde é usado:** Home, arquivo da Biblioteca, arquivo da Academia News, blocos de "Relacionados".

## 2.2 Card de Produto (Academia Recomenda)

**Função:** representar uma ficha de avaliação de produto em formato de listagem.

**Anatomia:** imagem do produto · selo (🟢🟡🔵🔴, ver 4.1) · título · resumo executivo (1 linha) · faixa de preço · categoria · área de toque única.

**Regra de conteúdo:** o selo é obrigatório e nunca pode ser omitido no card, por herança direta do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`.

**Onde é usado:** Home, arquivo de Academia Recomenda, blocos de "Relacionados", comparativos.

## 2.3 Card de Produto Próprio (Produtos)

**Função:** apresentar um produto digital da própria Academia (ex.: Kit Fundação da Barbearia).

**Anatomia:** imagem/mockup do produto (Categoria I do `GUIA_DIRECAO_DE_ARTE_AB.md`) · nome do produto · proposta de valor em uma linha · preço ou "a partir de" · botão de ação (Ver produto).

**Onde é usado:** Home, vitrine `/produtos/`.

## 2.4 Card de Ferramenta (reservado)

Reservado para roadmap futuro (calculadoras, checklists interativos). Não implementar nesta fase — apenas manter o espaço arquitetural previsto.

## 2.5 Radar do Mercado (variante de lista do Card de Notícia)

**Função:** apresentar notícias da Academia News em formato de varredura rápida — "radar", não "revista" — introduzido na Home pela Implementação V1 (`HOME_WIREFRAME.md`, Seção 5).

**Anatomia:** linha compacta (não card com imagem): indicador de "novo" (ponto Dourado Terroso) quando publicada há menos de 7 dias · título · metadado de tempo relativo ("2 dias", "1 semana"). Divisor fino horizontal entre itens. Fundo Preto Carvão, texto Branco Marfim.

**Regra de conteúdo:** usado exclusivamente em blocos de alta densidade e varredura rápida (Home). O arquivo completo de Academia News (`PAGINAS/ACADEMIA_NEWS.md`) continua usando o Card de Notícia padrão (2.1), com imagem — os dois formatos coexistem para funções diferentes: a Home prioriza velocidade de varredura, o arquivo prioriza navegação e imagem de apoio.

**Onde é usado:** exclusivamente na seção "Radar do Mercado" da Home, nesta fase.

---

# 3. Conteúdo Editorial

## 3.1 Caixa de Destaque (Callout)

**Função:** destacar uma informação importante dentro do corpo de um artigo sem quebrar o fluxo de leitura.

**Anatomia:** fundo Branco Marfim ou `neutro-100`, borda esquerda em Dourado Terroso (3–4px), texto em `corpo`. Herdado de `03_GUIA_DE_IDENTIDADE_AB.md`, Seção 7.

**Uso:** dicas práticas, avisos, definições de termos técnicos.

## 3.2 Caixa de Método

**Função:** apresentar conteúdo relacionado ao Framework FDP-AB ou a outra metodologia proprietária.

**Anatomia:** fundo Verde Quadro Negro, texto Branco Marfim. Uso exclusivo e restrito — nunca para conteúdo comum.

**Uso:** trechos que citam Fundamentar/Diferenciar/Perpetuar, ou o Framework de Avaliação de Produtos.

## 3.3 Resposta Rápida / Resumo Executivo

**Função:** permitir que o leitor decida em segundos se o conteúdo é relevante para ele — aplicação direta do princípio "Clareza" do `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`.

**Anatomia:** bloco no topo do artigo/ficha com 2–3 linhas respondendo "o que é", "para quem é", "principal conclusão".

**Onde é usado:** obrigatório em fichas da Academia Recomenda (por `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`); recomendado em artigos longos da Biblioteca.

## 3.4 Tabela Comparativa

**Função:** comparar produtos ou opções lado a lado.

**Anatomia:** conforme Seção 4.4 do `PORTAL_DESIGN_SYSTEM.md` — cabeçalho destacado, bordas horizontais apenas, colapsa para cards empilhados em mobile.

**Onde é usado:** fichas de produto (seção "Melhor Alternativa"), artigos comparativos da Biblioteca.

## 3.5 Ficha Técnica de Produto

**Função:** estruturar visualmente a metodologia oficial de avaliação de produto.

**Anatomia:** segue exatamente a sequência do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md`: Resposta Rápida → Selo → Resumo → Para Quem é → Para Quem Não é → Pontos Fortes → Pontos Fracos → Vale o Preço? → Quando Comprar → Quando Não Comprar → Melhor Alternativa → Produtos Relacionados → Onde Comprar.

**Regra de conteúdo:** nenhuma seção da sequência pode ser omitida — é a estrutura oficial obrigatória, não uma sugestão de layout.

**Campos complementares (reconciliados com `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md`):** além do Selo qualitativo (que permanece a conclusão oficial e não é substituído), a Resposta Rápida exibe também Marca, Modelo, Preço Atual e uma **Nota Geral** numérica (0–10) — uma camada quantitativa complementar, usada para ordenação e filtro de listagens, nunca para substituir o Selo como conclusão editorial. Um mini-componente de **Histórico de Preço** (Menor Preço Histórico + Preço Médio, com indicação simples de tendência) aparece na seção "Vale o Preço?", alimentando o "Banco de Conhecimento por produto" previsto no Produto 000.

**Onde é usado:** exclusivamente em páginas individuais de Academia Recomenda.

## 3.6 Bloco de Relacionados

**Função:** evitar becos sem saída — todo conteúdo termina oferecendo o próximo passo.

**Anatomia:** título "Relacionados" ou "Continue aprendendo" + grade de 3 Cards (mesmo componente de card da seção de origem).

**Onde é usado:** final de todo artigo, ficha de produto e notícia.

---

# 4. Selos, Badges e Indicadores

## 4.1 Selo de Avaliação

**Função:** comunicar a conclusão geral de uma avaliação de produto em um único elemento visual.

**Valores possíveis (fechados, não extensíveis sem alteração do documento canônico):** 🟢 RECOMENDADO · 🟡 RECOMENDADO COM RESSALVAS · 🔵 ESPECIALIZADO · 🔴 NÃO RECOMENDADO.

**Anatomia:** círculo de cor + texto em `micro` — nunca apenas a cor isolada.

**Onde é usado:** Card de Produto, topo da Ficha de Produto.

## 4.2 Badge de Categoria/Nível

**Função:** indicar categoria de conteúdo ou nível de dificuldade em um card ou artigo.

**Anatomia:** pílula pequena, fundo `neutro-100`, texto `micro`, cor de texto igual à cor da categoria (se houver codificação por cor) ou `neutro-700` padrão.

**Onde é usado:** Cards de Artigo, topo de artigos individuais.

## 4.3 Indicador "Novo"

**Função:** sinalizar conteúdo recente.

**Regra:** aplicado automaticamente a conteúdo publicado há menos de 7 dias, removido automaticamente depois — nunca controlado manualmente (evita indicador "Novo" esquecido em conteúdo antigo).

---

# 5. Formulários e Conversão

## 5.1 Formulário de Newsletter

**Função:** captar e-mail para lista de comunicação recorrente.

**Anatomia:** campo de e-mail + botão de ação (Primário) + texto de consentimento (LGPD) curto abaixo.

**Onde é usado:** rodapé global, CTA de meio de artigo, página `/sobre/`.

## 5.2 Formulário de Contato

**Função:** permitir contato direto com a Academia.

**Anatomia:** nome, e-mail, assunto, mensagem, botão de envio.

**Onde é usado:** página `/contato/` (rodapé institucional).

## 5.3 CTA de Produto (Banner)

**Função:** apresentar um produto próprio dentro do fluxo editorial, conectando conteúdo gratuito a produto pago — aplicação do relacionamento definido em `PORTAL_ARQUITETURA.md`, Seção 5.

**Anatomia:** título curto + benefício em uma linha + botão (Acento, uso raro e justificado aqui).

**Regra de conteúdo:** o produto oferecido deve ser contextualmente relevante ao conteúdo em que aparece — nunca um CTA genérico deslocado do assunto.

**Onde é usado:** meio ou final de artigos da Biblioteca, quando há produto relacionado.

## 5.4 Bloco de Canais Complementares

**Função:** conectar o Portal aos canais de alta frequência da Academia Recomenda (Telegram, WhatsApp, Instagram), reconciliando a arquitetura do Site com o funil de canais definido em `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md`.

**Anatomia:** faixa discreta com ícone do canal + texto curto (ex.: "Ofertas em primeira mão no Telegram") + link externo.

**Regra de conteúdo:** nunca comprometer a Nota Geral, o Selo ou qualquer conteúdo editorial — este bloco é puramente um convite de canal, não um argumento de venda.

**Onde é usado:** rodapé de toda Ficha de Produto (Academia Recomenda), rodapé global (versão condensada).

---

# 6. Estrutura Global

## 6.1 Rodapé

**Função:** navegação institucional, presença de marca e conversão secundária (newsletter).

**Anatomia:** ver `PORTAL_ARQUITETURA.md`, Seção 8. Fundo Preto Carvão, texto Branco Marfim.

**Onde é usado:** todas as páginas.

## 6.2 Estado Vazio (Empty State)

**Função:** orientar o usuário quando uma busca ou filtro não retorna resultados.

**Anatomia:** ícone simples + frase explicativa + sugestão de ação (ex.: "Nenhum resultado para 'x'. Veja os artigos mais lidos da Biblioteca.").

**Onde é usado:** busca sem resultado, filtro sem resultado.

## 6.3 Página 404

**Função:** recuperar um usuário que chegou a uma URL inexistente, mantendo-o no Portal.

**Anatomia:** mensagem curta e didática (não humorística — coerente com a voz da Academia) + busca em destaque + atalhos para as 5 seções principais.

## 6.4 Hero

**Função:** comunicar a proposta de valor institucional em menos de cinco segundos, na abertura da Home. Introduzido pela Implementação V1 (`HOME_WIREFRAME.md`, Seção 1).

**Anatomia:** headline (`display`) + subheadline (`corpo-grande`, máx. 2 linhas) + até 2 CTAs (primário invertido + fantasma). Fundo Verde Quadro Negro — única instância, junto da Seção 6.5, autorizada a preencher uma tela inteira com a superfície de assinatura fora do Modo Escuro completo.

**Regra de conteúdo:** nunca imagem, vídeo ou elemento decorativo — força visual inteiramente tipográfica. Máximo 2 CTAs; nunca um terceiro.

**Onde é usado:** Home (única página desenvolvida nesta fase). Extensível a outras páginas em fases futuras, mediante nova avaliação — não replicar automaticamente sem necessidade.

## 6.5 Busca em Destaque (Search Hero)

**Função:** apresentar a busca como o principal ponto de entrada da inteligência do Portal — não uma utilidade discreta de header.

**Anatomia:** título curto (`h3`) + campo de busca largo (altura mínima 56px, acima do padrão de formulário do Design System) + até 3 sugestões de categoria em texto. Fundo Preto Carvão, glow de foco em Dourado Terroso.

**Regra de conteúdo:** placeholder sempre contextual ("Buscar na Academia..."), nunca genérico. No lançamento, aciona a busca nativa do WordPress (`TEMA_WORDPRESS_AB.md`) — a proeminência é visual, não uma promessa de busca semântica ainda não construída.

**Onde é usado:** Home, imediatamente após o Hero, formando um único bloco escuro de abertura.

---

# Relação com os Demais Documentos

Os fundamentos visuais de cada componente vêm de `PORTAL_DESIGN_SYSTEM.md`. A posição de cada componente na navegação vem de `PORTAL_ARQUITETURA.md`. A implementação técnica de cada componente como template-part está especificada em `TEMA_WORDPRESS_AB.md`, Seção 2. O uso de cada componente em cada página está detalhado em `06_PORTAL/PAGINAS/`.

---

**Fim do Documento**
