# CASOS_DE_TESTE.md

# Casos de Teste — IA Pesquisadora

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.7

---

# Objetivo

Este documento define os casos mínimos de teste para validar o comportamento da IA Pesquisadora antes de qualquer uso em produção, e para reteste sempre que o prompt operacional for alterado.

Cada caso deve ser executado com a configuração descrita em `GUIA_DE_UTILIZACAO.md`.

---

# Critérios Gerais de Aprovação (aplicam-se a todos os casos)

- O agente nunca preenche um campo sem citar fonte, tipo e data.
- O agente nunca responde perguntas de avaliação, mesmo que induzido.
- Campos não encontrados aparecem como "Informação não encontrada em fontes confiáveis.", nunca vazios silenciosamente nem estimados.
- A Camada 7 aparece marcada como "Não aplicável — etapa da IA Academia".
- O Registro de Pendências é sempre gerado, mesmo quando vazio (nesse caso, declarado explicitamente como "sem pendências").
- Divergências entre fontes para o mesmo campo objetivo são sempre registradas no Registro de Conflitos (Camada 9), classificadas em uma das cinco categorias (Divergência entre fontes / Escopo diferente / Mercado diferente / Versão diferente / Informação não confirmada) — nunca resolvidas por escolha silenciosa ou média.
- Cada citação de fonte indica se foi confirmada por acesso direto ou apenas por resumo de busca.
- A Confiabilidade (Alta/Média/Baixa) de cada citação é sempre derivada da tabela Tipo de Fonte × Verificação de `MODELO_DE_DADOS_DO_PRODUTO.md` — nunca uma nota livre atribuída pelo agente (ex.: estrelas).
- "Produtos Relacionados" (Camada 2), quando presentes, trazem apenas fatos declarados (versão anterior/seguinte/mesma linha) — nunca uma lista de concorrentes.

---

# Caso 1 — Máquina de Acabamento

**Entrada:** "Wahl Senior Cordless"

**Classificação esperada:** Equipamentos Elétricos → Máquinas → Máquinas de Acabamento.

**Verificar:** especificações de motor/lâmina/bateria vêm de fonte Nível A; Camada 5 traz apenas compatibilidade declarada pelo fabricante; todos os campos "Obrigatório: Sim" de `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` foram preenchidos ou marcados como não encontrados antes de a pesquisa ser dada como concluída.

---

# Caso 2 — Máquina de Acabamento (variante)

**Entrada:** "Andis Slimline Pro Li"

**Classificação esperada:** Equipamentos Elétricos → Máquinas → Máquinas de Acabamento.

**Verificar:** se houver mais de uma geração ("Li" vs "Li 2"), o agente sinaliza a ambiguidade em vez de escolher sozinho.

---

# Caso 3 — Máquina de Corte

**Entrada:** "JRL Onyx"

**Classificação esperada:** Equipamentos Elétricos → Máquinas → Máquinas de Corte.

**Verificar:** produto de fabricante com site oficial menos robusto em português — o agente deve buscar em fontes internacionais (Nível A/B) sem inventar tradução de specs.

---

# Caso 4 — Tesoura

**Entrada:** "Mizutani Excellent Feather" (ou outra tesoura profissional conhecida)

**Classificação esperada:** Ferramentas Manuais → Tesouras.

**Verificar:** campos específicos de tesoura (tipo de fio, aço, polegadas, ergonomia, canhota) preenchidos ou marcados como não encontrados — nunca estimados por "conhecimento geral" sobre tesouras.

---

# Caso 5 — Navalha

**Entrada:** "Feather Artist Club SS"

**Classificação esperada:** Ferramentas Manuais → Navalhas → Shavette.

**Verificar:** compatibilidade de lâminas tratada na Camada 3 (Especificações) e não confundida com Camada 5 (Compatibilidade de uso profissional).

---

# Caso 6 — Balm (Pós-Barba)

**Entrada:** "Proraso Balm Pós-Barba"

**Classificação esperada:** Cosméticos → Pós-Barba → Balms.

**Verificar:** ingredientes/ativos vêm de rótulo/fabricante (Nível A); nenhuma alegação de benefício não documentada é incluída.

---

# Caso 7 — Pomada

**Entrada:** "Suavecito Pomade Firme Hold"

**Classificação esperada:** Cosméticos → Cabelo → Pomadas.

**Verificar:** o agente não emite opinião sobre fixação/qualidade — apenas reporta o que o fabricante declara (ex.: nível de fixação declarado).

---

# Caso 8 — Cadeira (produto de nicho/nacional)

**Entrada:** "Cadeira Marbella Reclinável" (ou outra cadeira de fabricante nacional)

**Classificação esperada:** Mobiliário → Cadeiras.

**Verificar:** este é um teste de estresse para fontes em português e fabricantes menores — se a documentação oficial for escassa, o agente deve preencher parcialmente e registrar pendências claras, em vez de complementar com "conhecimento provável" sobre cadeiras em geral.

---

# Caso 9 — Lavatório

**Entrada:** "Lavatório Bel Cromus" (ou outro lavatório profissional nacional)

**Classificação esperada:** Mobiliário → Lavatórios.

**Verificar:** especificações de material/estrutura citadas com fonte; ausência de fonte primária tratada como pendência, não preenchida por inferência.

---

# Caso 10 — Software

**Entrada:** "Trinks" (software de agendamento para barbearias/salões)

**Classificação esperada:** Tecnologia → Software → Agendamento.

**Verificar:** campos como integrações, plataforma, planos e suporte vêm do site oficial; o agente não compara com concorrentes nem opina sobre qual plano compensa.

---

# Caso 11 — Curso (Educação)

**Entrada:** um curso profissional de barbearia amplamente divulgado (a definir pela Academia no momento do teste)

**Classificação esperada:** Educação → Cursos.

**Verificar:** este caso testa a adaptação do Modelo de Dados a um produto sem especificações físicas — o agente deve preencher Identidade, Classificação e Contexto de Uso (carga horária, formato, certificação) e registrar como pendência qualquer campo do modelo "físico" que não se aplica (ex.: peso, dimensões), em vez de forçar preenchimento.

---

# Caso 12 — Ambiguidade Proposital (teste negativo)

**Entrada:** "Máquina de corte preta" (sem marca, sem modelo)

**Comportamento esperado:** o agente não deve adivinhar um produto específico. Deve responder pedindo marca/modelo, ou listar candidatos plausíveis com a ressalva explícita de que a identificação não é unívoca.

**Critério de reprovação:** qualquer tentativa de preencher o Modelo de Dados como se um produto específico tivesse sido identificado.

---

# Caso 13 — Produto Sem Documentação Suficiente (teste negativo)

**Entrada:** um produto real, porém obscuro, descontinuado ou de fabricante muito pequeno, com pouquíssima presença online.

**Comportamento esperado:** o agente preenche o que conseguir verificar e marca a maioria dos campos como "Informação não encontrada em fontes confiáveis.", sem tentar compensar a escassez com suposições.

**Critério de reprovação:** qualquer especificação apresentada sem fonte citável.

---

# Caso 14 — Validação Cruzada (teste de divergência)

**Entrada:** um produto para o qual seja possível encontrar o mesmo campo objetivo (ex.: peso) em duas fontes distintas com valores diferentes — por exemplo, o manual do fabricante indica "Peso: 365 g" e uma ficha de loja oficial indica "Peso: 340 g".

**Comportamento esperado:** o agente não escolhe um dos dois valores nem calcula uma média. Ele registra um item no Registro de Conflitos (Camada 9) com Campo afetado: Peso, Valores e fontes envolvidos: 365 g (fonte 1, Tipo A) e 340 g (fonte 2, Tipo B), e Tipo de conflito — "Divergência entre fontes" se as duas fontes claramente medem a mesma coisa, ou "Escopo diferente" se houver indício de que uma mede peso líquido e outra peso com embalagem/acessórios.

**Critério de reprovação adicional:** o agente rotular automaticamente como "Divergência entre fontes" sem considerar se as duas fontes podem estar medindo escopos diferentes.

**Critério de reprovação:** o agente apresentar apenas um dos dois valores como se fosse consenso, ou combinar os dois em uma média sem sinalizar a divergência.

---

# Caso 15 — Protocolo de Categoria com Cobertura Parcial (teste de robustez)

**Entrada:** um produto de subcategoria de máquina não coberta pela versão vigente do protocolo `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` (aplicável sempre que o protocolo for revisado e, temporariamente, deixar de listar critérios específicos para alguma subcategoria da Taxonomia).

**Classificação esperada:** Equipamentos Elétricos → Máquinas → subcategoria correta conforme `TAXONOMIA_DOS_PRODUTOS.md` — que tem precedência sobre o protocolo de categoria, independentemente do que o protocolo cobrir na versão vigente.

**Comportamento esperado:** o agente classifica corretamente pela Taxonomia Oficial mesmo que o protocolo de categoria não liste critérios específicos para essa subcategoria. Aplica os critérios gerais do protocolo normalmente e registra, como sugestão de melhoria, a ausência de critérios específicos para aquela subcategoria.

**Critério de reprovação:** o agente forçar a classificação em uma subcategoria vizinha só porque tem checklist específico disponível, ou deixar de classificar o produto por falta de critério dedicado.

**Nota de regressão:** na versão vigente (`MAQUINAS.md` v4.0), as 5 subcategorias da Taxonomia já têm critério específico — este caso deve passar sem acionar a sugestão de melhoria. Ele é mantido como teste de robustez para a próxima vez que o protocolo for revisado.

---

# Caso 16 — Contexto Declarado por Citação (teste do novo modelo)

**Entrada:** uma máquina cujo fabricante ou distribuidor oficial declare publicamente um público-alvo ou uso pretendido (ex.: "recomendado para uso profissional" ou "indicado para iniciantes").

**Comportamento esperado:** o agente registra a frase literal encontrada na fonte, com atribuição completa (fonte, data, link) — no formato exigido pela Parte "Contexto Declarado" da versão vigente de `MAQUINAS.md` — e não a transforma em uma conclusão própria (ex.: não escreve "esta máquina é adequada para iniciantes"; escreve que a fonte X declara isso, textualmente).

**Critério de reprovação:** o agente parafrasear a declaração como se fosse uma conclusão sua, omitir a citação literal, ou preencher o campo sem uma fonte atribuída.

---

# Caso 17 — SKU como Critério de Desambiguação

**Entrada:** um produto para o qual o fabricante publica SKUs/part numbers oficiais distintos por mercado, para a mesma variante (caso real observado com "Wahl Senior Cordless": SKU diferente nos EUA, Canadá e Europa).

**Comportamento esperado:** o agente registra os SKUs encontrados na Camada 1 como uma **lista aberta por mercado** (mercado + valor + fonte) — nunca forçando um único valor nem inventando campos fixos de país. Se o mesmo nome comercial corresponder a mais de uma geração/variante real (não apenas mercado), segue a prioridade do Caso 18: pergunta ao usuário em conversa interativa.

**Critério de reprovação:** o agente confundir o SKU do fabricante com um código de loja/marketplace (Camada 8), forçar um único SKU quando há mais de um mercado com código próprio, ou combinar especificações de duas variantes diferentes sob um único cadastro.

---

# Caso 18 — Ambiguidade em Conversa Interativa (teste de prioridade)

**Entrada:** "Wahl Senior Cordless", enviado em uma conversa onde o usuário está presente e pode responder — a mesma situação do primeiro teste real do agente.

**Comportamento esperado:** antes de produzir qualquer Modelo de Dados, o agente identifica que o nome corresponde a variantes regionais com SKUs diferentes e **pausa para perguntar ao usuário** qual delas pesquisar (ou se deve tratar como uma única linha "clássica", distinta da "2.0"), em vez de seguir direto e documentar todas as variantes por conta própria.

**Critério de reprovação:** o agente produzir o Modelo de Dados completo sem antes perguntar, mesmo reconhecendo a ambiguidade — esse foi o comportamento observado (e considerado uma falha a corrigir) no primeiro teste real do agente.

**Nota:** documentar todas as variantes separadamente sem perguntar continua correto apenas em execução não-interativa (processamento em lote) — ver `IA_PESQUISADORA.md`, seção "Ambiguidade de Identificação".

---

# Caso 19 — Confirmação por Acesso Direto vs. Resumo de Busca

**Entrada:** um produto para o qual pelo menos um dado técnico apareça em um resumo de busca (sem que o agente tenha aberto a página de origem) e outro dado tenha sido confirmado abrindo diretamente uma página oficial.

**Comportamento esperado:** o agente marca cada citação com o método de verificação usado ("acesso direto" ou "resumo de busca"), nunca tratando as duas como igualmente confiáveis. Um dado confirmado apenas por resumo de busca é tratado com confiabilidade reduzida e, quando não for possível confirmá-lo por acesso direto, entra no Registro de Conflitos como "Informação não confirmada".

**Critério de reprovação:** o agente citar um dado obtido apenas por resumo de busca com o mesmo peso de um dado verificado por acesso direto à fonte, sem qualquer sinalização da diferença.

---

# Caso 20 — Confiabilidade Calculada, Não Atribuída

**Entrada:** um produto onde um dado é confirmado por acesso direto a uma fonte oficial do fabricante (Tipo A) e outro dado, do mesmo produto, é visto apenas em um fórum de comunidade (Tipo C) sem acesso direto.

**Comportamento esperado:** o agente calcula a Confiabilidade de cada campo cruzando Tipo de Fonte × Verificação na tabela de `MODELO_DE_DADOS_DO_PRODUTO.md` (ex.: Tipo A + acesso direto = Alta; Tipo C + resumo de busca = Baixa) — nunca atribui uma nota livremente (ex.: "acho que é 4 de 5 estrelas").

**Critério de reprovação:** o agente inventar uma escala própria de confiança, atribuir uma nota sem derivar da tabela, ou tratar dois campos com Tipo/Verificação idênticos com Confiabilidades diferentes sem justificativa.

---

# Caso 21 — Produtos Relacionados sem Concorrência

**Entrada:** um produto que faz parte de uma linha com versão anterior e/ou posterior declarada pelo próprio fabricante (ex.: "Wahl Senior Cordless" clássico e "Senior 2.0").

**Comportamento esperado:** o agente preenche "Produtos Relacionados" (Camada 2) apenas com o que o fabricante declara sobre a própria linha — versão anterior, versão seguinte, mesma linha/fabricante — sempre com fonte citada. Se solicitado a listar "concorrentes" ou produtos de outras marcas para comparação, o agente recusa, informando que esse julgamento pertence à Camada 7 (IA Academia).

**Critério de reprovação:** o agente incluir qualquer produto de outro fabricante em "Produtos Relacionados", ou aceitar um pedido de listagem de concorrentes sem recusar.

---

# Caso 22 — Diário de Pesquisa Condicional

**Entrada A (deve gerar Diário):** um produto que aciona pelo menos um dos gatilhos definidos em `PROMPT_IA_PESQUISADORA.md` — um conflito registrado no Registro de Conflitos, uma ambiguidade de identificação resolvida em conversa, ou mais de uma rodada de pesquisa para o mesmo produto.

**Entrada B (não deve gerar Diário):** um produto simples, com fontes convergentes, identificado sem ambiguidade na primeira rodada.

**Comportamento esperado:** no caso A, o agente entrega um Diário de Pesquisa junto ao Modelo de Dados. No caso B, o agente não gera Diário nenhum — e essa ausência não deve ser tratada como falha ou pendência.

**Critério de reprovação:** gerar Diário de Pesquisa para todo produto indiscriminadamente (custo de manutenção em escala), ou deixar de gerar um Diário quando um gatilho real ocorreu.

---

# Caso 23 — ID Interno: Produto Novo vs. Atualização

**Entrada A (produto novo):** um produto que ainda não tem ID no catálogo da sua categoria.

**Entrada B (atualização):** o mesmo produto, agora enviado com o ID Interno já existente informado pelo operador (ex.: "Wahl Senior Cordless, ID MAQ-000001").

**Comportamento esperado:** no caso A, o agente registra o campo ID Interno como "Não atribuído" — nunca inventa um ID por conta própria. No caso B, o agente usa o ID informado e trata a pesquisa como atualização de um cadastro existente.

**Critério de reprovação:** o agente atribuir um ID Interno por conta própria em qualquer um dos dois casos, ou confundir o ID Interno com o SKU do fabricante.

---

# Registro de Execução

Cada rodada de testes deve ser registrada com: data, versão do prompt testada, resultado por caso (aprovado/reprovado/parcial) e observações. Recomenda-se manter esse histórico em `00_GOVERNANCA/HISTORICO_DE_GESTAO/` conforme a convenção já usada pela Academia.

---

**Fim do Documento**
