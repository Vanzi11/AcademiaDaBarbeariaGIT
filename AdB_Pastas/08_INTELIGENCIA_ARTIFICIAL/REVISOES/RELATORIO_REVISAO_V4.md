# RELATORIO_REVISAO_V4.md

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Origem:** Discussão estratégica sobre a ordem de construção das próximas IAs (Editorial, Academia, Comparadora, Notícias), incluindo uma segunda consulta externa (GPT) sobre onde os produtos pesquisados deveriam se acumular

**Status:** Revisão concluída

---

# Objetivo

Este relatório documenta a decisão de criar uma Base de Conhecimento permanente para os produtos pesquisados pela IA Pesquisadora, a correção de uma decisão inicial sobre onde e como estruturar essa Base, e uma correção estrutural necessária no repositório da Academia como consequência direta dessa decisão.

---

# Contexto: Duas Decisões Arquiteturais Pendentes

Uma discussão sobre a ordem de construção das próximas IAs (originalmente Pesquisadora → Editorial → Academia, depois revisada) expôs que duas perguntas nunca haviam sido respondidas:

1. **Onde o resultado de cada pesquisa se acumula?** Até aqui, cada Modelo de Dados gerado vivia apenas dentro de uma conversa — nada persistia.
2. **Avaliar um produto exige catálogo grande?** Uma primeira hipótese ("a IA Academia precisa de 20-50 produtos para ser útil") misturava duas funções com pré-requisitos de escala diferentes: avaliar um produto isolado (pontos fortes, vale o investimento) não precisa de catálogo — comparar produtos entre si, sim.

A segunda pergunta reordenou a prioridade das próximas IAs (Academia antes da Editorial, numa versão "lite" capaz de avaliar um produto por vez) mas não é o foco deste relatório — está registrada aqui como contexto. O foco deste relatório é a primeira pergunta.

---

# Decisão 1 — Base de Conhecimento como Pasta de Arquivos

**Decisão: aprovada.**

Nada de banco de dados, SQL, Airtable ou Notion — uma pasta de arquivos markdown, versionada pelo Git, onde cada produto pesquisado vira um dossiê permanente. "Feito é melhor que perfeito." Cada dossiê é o próprio `MODELO_DE_DADOS_DO_PRODUTO` já produzido pela IA Pesquisadora — nenhuma estrutura nova de conteúdo foi criada, só um lugar fixo para guardá-lo.

---

# Decisão 2 — Localização: Dentro de 08_INTELIGENCIA_ARTIFICIAL/, Não um Departamento Novo

**Decisão: aprovada, com correção em relação à proposta original.**

A proposta original sugeria `09_BASE_DE_CONHECIMENTO/` como departamento de topo. Isso foi barrado por dois motivos concretos, não por preferência estética: `09` já é `09_OPERACOES` (colisão de numeração), e o `ARQUITETURA_DO_REPOSITORIO.md` (documento canônico de governança) exige aprovação explícita para qualquer mudança estrutural de topo, além de listar `03_PRODUTOS` como algo que já significa outra coisa neste repositório (produtos estratégicos da própria Academia — livros, guias — não produtos físicos de barbearia).

A decisão final, aprovada explicitamente: `BASE_DE_CONHECIMENTO/` vive dentro de `08_INTELIGENCIA_ARTIFICIAL/`, como subpasta — mesmo padrão já usado por `CRITERIOS_DE_AVALIACAO/` e `REVISOES/`. Isso evita reabrir o documento canônico de arquitetura para uma mudança estrutural maior, mantendo a Base tão perto quanto possível do agente que a alimenta (IA Pesquisadora, Departamento de Inteligência de Produtos).

---

# Decisão 3 — Granularidade: Catálogo e Pasta por Categoria da Taxonomia

**Decisão: aprovada, com ajuste em relação à proposta original.**

A proposta original usava pastas por Departamento (`MAQUINAS/`, `TESOURAS/`, `COSMETICOS/`, `MOBILIARIO/`). Isso foi ajustado para o nível de **Categoria** da Taxonomia Oficial (`TAXONOMIA_DOS_PRODUTOS.md`): nem Departamento (largo demais — juntaria Máquinas, Secadores, Pranchas e Modeladores num só balde sem relação operacional entre eles) nem Subcategoria (fragmentado demais — duplicaria o que `MAQUINAS.md` já resolve com uma coluna de Subcategoria). Essa é a mesma granularidade que `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` já usa (um protocolo cobrindo 5 subcategorias de Máquinas com aplicabilidade por campo) — a decisão apenas estende o padrão já validado, em vez de criar um novo.

Categorias habilitadas nesta rodada: Máquinas, Tesouras, Navalhas, Pós-Barba, Cabelo, Cadeiras, Lavatórios, Software, Educação — exatamente as categorias já exercitadas em `CASOS_DE_TESTE.md` (Casos 1 a 11). As demais categorias da Taxonomia (Secadores, Pranchas, Bancadas, Espelhos etc.) não foram pré-criadas especulativamente; serão criadas sob demanda, seguindo a mesma regra, quando o primeiro produto de cada uma for pesquisado.

---

# Decisão 4 — Catálogo por Categoria: Índice Derivado, Não Fonte da Verdade

**Decisão: aprovada, com dois ajustes.**

A proposta original de catálogo (`CATALOGO_DOS_PRODUTOS.md` único, colunas ID/Produto/Categoria/Status/Última Revisão) foi mantida em espírito, com três ajustes: (1) um catálogo por categoria em vez de um único catálogo geral, já antecipando o volume mencionado ("50 máquinas e 300 tesouras"); (2) uma sexta coluna, "Arquivo" (caminho relativo), porque sem ela o índice não funciona como índice de verdade — o nome do arquivo pode divergir do nome comercial por convenção de normalização; (3) "Status" tratado como lista fechada (`Em pesquisa` / `Completo` / `Aguardando revisão humana` / `Aguardando Academia`), não texto livre — mesma disciplina já aplicada a Tipo de Fonte e Confiabilidade no Modelo de Dados.

Também foi esclarecido que o catálogo é um índice derivado: "Última Revisão" já existe na Camada 9 de cada dossiê; o catálogo só espelha isso para busca rápida. Se algum dia divergirem, o dossiê individual manda.

---

# Decisão 5 — ID Interno da Academia: Formalização de um Campo Já Previsto

**Decisão: aprovada.**

Ao investigar onde incluir um ID de produto, foi descoberto que `MODELO_DE_DADOS_DO_PRODUTO.md` já listava "ID Interno" como campo obrigatório da Camada 1 desde a v1.0 — nunca definido. Esta rodada formaliza o formato (`<PREFIXO>-NNNNNN`, prefixo de 3 letras por Categoria), a regra de atribuição (no momento de entrada na Base de Conhecimento) e a imutabilidade (não muda mesmo com renomeações). Removido o prefixo redundante "PRD-" cogitado inicialmente — como tudo dentro da Base já é produto, o prefixo não desambiguava nada, só adicionava caracteres.

---

# Decisão 6 — Onde Vive o Parecer da IA Academia

**Decisão: nenhuma mudança necessária — confirmado que a estrutura já existente resolve isso.**

Cogitou-se um arquivo separado para o futuro "Parecer Técnico" da IA Academia. Não é necessário: a Camada 7 ("Inteligência da Academia") já existe dentro do próprio Modelo de Dados, hoje marcada como "Não aplicável — etapa da IA Academia". Quando a IA Academia existir, ela preenche essa mesma Camada 7 no mesmo arquivo já salvo na Base de Conhecimento — um produto, um arquivo, uma fonte da verdade, mesmo com mais de uma IA contribuindo ao longo do tempo.

---

# Decisão 7 — Renomear "IA Academia" para "IA Curadora"

**Decisão: recusada.**

Cogitada durante a mesma discussão estratégica (fora do escopo direto da Base de Conhecimento, mas registrada aqui para não ser reproposta sem justificativa lida). Não há ganho funcional, só custo: o nome "Academia" já está espalhado por `ARQUITETURA.md`, pela própria Camada 7 ("Inteligência da Academia"), e por produtos de marca já em uso ("Academia Recomenda"). Mantido "IA Academia", deixando explícito no texto (quando ela for desenhada) que representa o julgamento institucional da empresa.

---

# Efeito Colateral: Renumeração de 09_OPERACOES para 11_OPERACOES

Colocar a Base de Conhecimento dentro de `08_INTELIGENCIA_ARTIFICIAL/` evitou uma mudança estrutural de topo — mas o CEO solicitou, ainda assim, reservar o número 09 para um eventual departamento futuro de Inteligência de Produtos (caso o volume de produtos um dia justifique a promoção de subpasta para departamento). Isso exigiu renumerar `09_OPERACOES` para `11_OPERACOES`.

**Execução:** conteúdo de `09_OPERACOES/` (README.md, PLAYBOOK.md, FINANCEIRO/LEGADO_10_FINANCEIRO/) copiado integralmente para `11_OPERACOES/`. `ARQUITETURA_DO_REPOSITORIO.md` atualizado (v1.0 → v1.1, com Histórico de Revisão adicionado — o documento não tinha um até agora). `PLANO_DE_MIGRACAO_DO_REPOSITORIO.md` recebeu uma nota posterior (a matriz de migração original foi preservada como registro histórico, não reescrita). `RELATORIO_DE_MIGRACAO.md` recebeu uma nova seção documentando esta migração adicional. `CATALOGO_DOCUMENTAL.md` teve as 3 linhas de `09_OPERACOES` corrigidas para `11_OPERACOES`.

**Pendência técnica:** a exclusão da pasta antiga `09_OPERACOES/` não pôde ser concluída nesta sessão — o ambiente não conseguiu obter permissão de exclusão para este caminho específico do OneDrive. `09_OPERACOES/` (conteúdo antigo, agora redundante) e `11_OPERACOES/` (cópia atual) coexistem até que a pasta antiga seja removida manualmente ou o acesso seja restabelecido.

**Aprovação:** explícita do CEO, conforme exigido pelo próprio `PLAYBOOK.md` ("Nenhuma alteração de arquitetura poderá ocorrer sem aprovação do CEO") e pelo `ARQUITETURA_DO_REPOSITORIO.md" ("nunca deverá alterar a arquitetura institucional sem aprovação explícita").

---

# Observação Registrada, Não Resolvida Nesta Rodada

`CATALOGO_DOCUMENTAL.md` já estava desatualizado em relação a `08_INTELIGENCIA_ARTIFICIAL/` antes desta rodada — ele lista apenas 2 arquivos desse departamento (um placeholder legado e o README), quando na realidade já existem mais de uma dezena de documentos ali (todo o conjunto da IA Pesquisadora, criado em sessões anteriores a este relatório). Essa reconciliação é maior do que o escopo desta rodada e não foi feita aqui para não misturar um problema pré-existente com a decisão de hoje. Recomenda-se uma auditoria dedicada de `CATALOGO_DOCUMENTAL.md` para o Departamento de Inteligência de Produtos.

---

# Documentos Alterados Nesta Rodada

- `08_INTELIGENCIA_ARTIFICIAL/BASE_DE_CONHECIMENTO/` — criada (README.md, 9 catálogos, 9 pastas de categoria).
- `MODELO_DE_DADOS_DO_PRODUTO.md` (v1.3 → v1.4): ID Interno formalizado na Camada 1.
- `IA_PESQUISADORA.md`, `PROMPT_IA_PESQUISADORA.md`, `GUIA_DE_UTILIZACAO.md`, `CASOS_DE_TESTE.md`, `LIMITACOES.md`, `RELATORIO_FINAL.md` (todos v1.6 → v1.7): referência à Base de Conhecimento e ao fluxo de ID Interno.
- `00_GOVERNANCA/ARQUITETURA_DO_REPOSITORIO.md` (v1.0 → v1.1), `PLANO_DE_MIGRACAO_DO_REPOSITORIO.md`, `RELATORIO_DE_MIGRACAO.md`, `CATALOGO_DOCUMENTAL.md`: renumeração de `09_OPERACOES` para `11_OPERACOES`.
- `11_OPERACOES/` — criada como cópia de `09_OPERACOES/`.
- `CRITERIOS_DE_AVALIACAO/MAQUINAS.md`: **não alterado.** Nenhuma decisão desta rodada afeta o protocolo de coleta por categoria.

---

**Fim do Documento**
