# RELATORIO_REVISAO_V3.md

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Origem:** Auditoria externa (segunda rodada) após teste real com os produtos "Wahl Senior Cordless" (clássico) e "Senior 2.0"

**Status:** Revisão concluída

---

# Objetivo

Este relatório documenta as sete melhorias propostas em uma auditoria externa, a avaliação crítica de cada uma antes de qualquer implementação, e a decisão final aprovada para cada item — para que nenhuma delas precise ser reproposta sem que a justificativa já registrada seja lida primeiro.

A regra que orientou esta rodada, aprovada explicitamente antes da execução: nenhuma sugestão foi implementada automaticamente; cada uma foi avaliada quanto a necessidade real, risco de reintroduzir julgamento na IA Pesquisadora, e custo de manutenção em escala (milhares de produtos).

---

# Melhoria 1 — Grau de confiança do campo (estrelas)

**Decisão: recusada, substituída por cálculo determinístico.**

Uma nota livre de confiabilidade por campo (ex.: ★★★★☆) exigiria que a IA Pesquisadora emitisse um julgamento de valor — proibido por desenho. Também é redundante: Tipo de Fonte (A/B/C/D) e Verificação (acesso direto/resumo de busca) já implicam a confiança do dado. A alternativa implementada: uma tabela fixa em `MODELO_DE_DADOS_DO_PRODUTO.md` ("Convenção de Fontes e Confiabilidade") cruza essas duas variáveis já existentes e produz Alta/Média/Baixa automaticamente — sem que a IA escolha nada livremente.

---

# Melhoria 2 — Estrutura Valor/Unidade/Mercado/Escopo/Confiabilidade em todo campo

**Decisão: recusada como padrão universal — mantida a regra já existente, escopada campo a campo.**

Aplicar essa estrutura de cinco partes a todos os campos do modelo (incluindo campos simples como Cor ou Certificações) adicionaria complexidade sem benefício proporcional. Desde a revisão anterior, sub-atributos já são aplicados apenas onde há necessidade comprovada (Motor: Tipo+Modelo; Peso: Valor+Unidade+Escopo; Voltagem e Garantia: Valor+Mercado). Essa regra foi mantida e a rejeição da generalização ficou registrada explicitamente no documento, para não ser reproposta sem uma necessidade nova e concreta.

---

# Melhoria 3 — Seção "Relações do Produto" (incluindo concorrentes)

**Decisão: aprovada parcialmente.** A parte factual foi implementada; a parte de concorrência foi recusada.

Versão anterior, versão seguinte e mesma linha/fabricante são fatos sourciáveis (o próprio fabricante frequentemente declara isso) e foram adicionados à Camada 2 como "Produtos Relacionados". "Concorrentes diretos/indiretos" foi recusado porque exige julgamento de mercado — o que é substituível pelo quê, em que contexto — e esse campo já existe, com esse nome, na Camada 7 ("Produtos concorrentes"), exclusiva da IA Academia. Implementá-lo na Camada 2 duplicaria esse campo e vazaria avaliação para a etapa de coleta. Isso está documentado explicitamente no Modelo de Dados, na própria seção de Produtos Relacionados.

---

# Melhoria 4 — Separar Nome Comercial / Tecnologia / Características do Motor

**Decisão: aprovada parcialmente.** Tipo+Modelo já existia; "Características" como sub-atributo fixo foi recusado, substituído por um campo de Observação livre.

Um terceiro sub-atributo fixo só para Motor reabriria a mesma pergunta da Melhoria 2 para outros componentes (lâmina, bateria etc.). A alternativa implementada — uma Observação de texto livre disponível em qualquer campo da Camada 3 — resolve a necessidade real (documentar recursos como "Adaptive Speed Control") sem exigir um schema novo replicado em todo o modelo.

---

# Melhoria 5 — Idioma Original / Texto Original / Tradução

**Decisão: aprovada, com escopo restrito.**

Adicionada a estrutura de Citações Literais e Idioma Original, mas apenas onde existem citações textuais do fabricante — Camada 4 (Contexto de Uso / Contexto Declarado) e Camada 6 (Evidências). Campos numéricos ou categóricos (RPM, Voltagem etc.) não têm "idioma" a preservar, então não recebem essa estrutura.

---

# Melhoria 6 — Fonte como enumeração fixa, com Tipo calculado automaticamente

**Decisão: aprovada integralmente, sem ressalva.**

Esta foi a melhoria de maior valor da rodada, porque reduz subjetividade em vez de adicionar. Antes, a IA Pesquisadora se autoclassificava como "Tipo A/B/C/D" sem verificação externa. Agora existe uma tabela fechada (origem concreta → Tipo derivado) em `MODELO_DE_DADOS_DO_PRODUTO.md`, e a IA apenas identifica a origem concreta — o Tipo é derivado, não escolhido. Essa mesma lógica de "calcular, não deixar a critério da IA" foi reaproveitada para resolver a Melhoria 1 também.

---

# Melhoria 7 — Gerar DIARIO_DE_PESQUISA.md separado por produto

**Decisão: aprovada como artefato condicional, não obrigatório.**

Gerar um diário completo para todo produto, incluindo os simples e sem pendência, multiplicaria arquivos por produto (relevante à escala projetada de milhares de produtos) sem ganho de auditoria proporcional — a Camada 9 (Fontes consultadas, Observações, Registro de Conflitos) já cobre esses casos. O diário agora é gerado apenas quando há gatilho real: um conflito registrado, uma ambiguidade de identificação resolvida, ou mais de uma rodada de pesquisa no mesmo produto. O gatilho e o formato mínimo estão definidos em `PROMPT_IA_PESQUISADORA.md`.

---

# Recomendação Estratégica (Base de Conhecimento antes da IA Academia)

Não avaliada tecnicamente neste relatório — é uma decisão de priorização de roadmap, não uma alteração de arquitetura documental. Registro apenas a observação feita no momento: parte da necessidade (como produtos se relacionam entre si em escala) se sobrepõe à parte aprovada da Melhoria 3, e não deveria ser retrabalhada do zero quando esse documento for criado.

---

# Documentos Alterados Nesta Rodada

- `MODELO_DE_DADOS_DO_PRODUTO.md` (v1.2 → v1.3): Convenção de Fontes e Confiabilidade, Produtos Relacionados factuais, Observação livre, Citações Literais e Idioma Original, Diário de Pesquisa condicional, e registro explícito das duas rejeições (Melhorias 1 e 2).
- `PROMPT_IA_PESQUISADORA.md` (v1.5 → v1.6): regras operacionais correspondentes e novo formato de citação nas saídas.
- `CRITERIOS_DE_AVALIACAO/MAQUINAS.md`: **não alterado.** Já tem uma coluna "Observações" por critério desde a v4.2 — a necessidade da Melhoria 4 já estava coberta ali, para a categoria Máquinas.

# Pendência Registrada

Os cinco documentos não alterados nesta rodada (`IA_PESQUISADORA.md`, `GUIA_DE_UTILIZACAO.md`, `CASOS_DE_TESTE.md`, `LIMITACOES.md`, `RELATORIO_FINAL.md`) ainda não refletem estas mudanças. Como nas rodadas anteriores, recomenda-se uma sincronização dedicada antes do próximo uso em produção — não feita automaticamente aqui para manter o escopo desta revisão fechado.

---

**Fim do Documento**
