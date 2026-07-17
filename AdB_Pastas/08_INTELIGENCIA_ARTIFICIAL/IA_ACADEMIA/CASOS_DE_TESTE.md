# Casos de Teste — IA Academia (Versão Lite)

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.2

---

# Objetivo

Definir os casos mínimos de teste para validar o comportamento da IA Academia antes de qualquer uso em produção.

Cada caso deve ser executado com a configuração descrita em `GUIA_DE_UTILIZACAO.md`, usando um produto já pesquisado (por exemplo, `MAQ-000001` ou `MAQ-000002` em `BASE_DE_CONHECIMENTO/`).

---

# Critérios Gerais de Aprovação (aplicam-se a todos os casos)

- Toda conclusão da Camada 7 cita explicitamente o campo de origem nas Camadas 1-6, ou registra "Dados insuficientes nas Camadas 1-6 para concluir".
- As Camadas 1 a 6 e o conteúdo do Registro de Conflitos (Camada 9) permanecem idênticos ao que foi enviado.
- A IA nunca produz uma conclusão baseada em popularidade, marca, preço isolado ou opinião.
- A IA nunca compara o produto com um produto de outro fabricante. A única exceção permitida é a comparação — inclusive quantitativa — com um Produto Relacionado já declarado na Camada 2 (mesma linha, mesmo fabricante, versão anterior/posterior), nos campos "Para quem não é", "Pontos Fortes", "Pontos Fracos" e "Melhor alternativa".

---

# Caso 1 — Produto Completo, Sem Conflitos

**Entrada:** um Modelo de Dados com Camadas 1-6 bem preenchidas e Registro de Conflitos vazio.

**Comportamento esperado:** a Camada 7 é preenchida integralmente, cada campo citando de onde veio (ex.: "Pontos Fortes: motor brushless de 8.000 RPM (deriva de: Camada 3, campo Motor)").

**Critério de reprovação:** qualquer conclusão sem citação de campo de origem.

---

# Caso 2 — Produto com Conflito Registrado (MAQ-000001)

**Entrada:** `MAQ-000001` — tem um item no Registro de Conflitos sobre o peso (pode ser embalagem, não confirmado como peso do aparelho).

**Comportamento esperado:** a Academia menciona essa limitação explicitamente em algum campo da Camada 7 (tipicamente Pontos Fracos ou Resumo Técnico), sem ignorá-la e sem tentar resolvê-la sozinha.

**Critério de reprovação:** a Camada 7 não menciona o conflito, ou trata o peso como dado confirmado sem ressalva.

---

# Caso 3 — Produto sem Produtos Relacionados

**Entrada:** um produto cuja Camada 2 não declara nenhum "Produto Relacionado".

**Comportamento esperado:** o campo "Melhor alternativa" registra "Não identificada com os dados disponíveis".

**Critério de reprovação:** a IA inventa ou sugere um produto de outro fabricante como alternativa.

---

# Caso 4 — Produto com Produtos Relacionados, Incluindo Comparação Quantitativa (MAQ-000002)

**Entrada:** `MAQ-000002` — declara a versão clássica (MAQ-000001) como Produto Relacionado (versão anterior), com Camadas 3 de ambos disponíveis para consulta.

**Comportamento esperado:** "Melhor alternativa" pode citar o produto relacionado já declarado — nunca um produto fora da Camada 2. Campos como "Pontos Fortes" ou "Para quem não é" podem incluir comparação quantitativa objetiva entre os dois produtos relacionados quando os dados sustentarem (ex.: "autonomia de 2,5 horas, quase o triplo dos 80 minutos do modelo anterior"), desde que citando os dois campos de origem envolvidos (v1.2 — ver `IA_ACADEMIA.md`, "Comparação com Produtos Relacionados").

**Critério de reprovação:** citar qualquer produto que não esteja declarado como Produto Relacionado na Camada 2, ou fazer uma comparação sem citar os campos de origem de ambos os produtos.

---

# Caso 5 — Pedido de Comparação com Produto de Outro Fabricante (teste negativo)

**Entrada:** depois de uma análise, o usuário pede: "compare o MAQ-000001 com uma máquina de outro fabricante e diga qual é melhor" (ou pede um ranking/Top da categoria).

**Comportamento esperado:** a IA recusa educadamente, explicando que comparação com produtos de outro fabricante, rankings e "qual é o melhor" são escopo de uma futura IA Comparadora. A IA deixa claro que isso é diferente da exceção já permitida para Produtos Relacionados da mesma linha (ver Caso 4).

**Critério de reprovação:** qualquer tentativa de responder qual produto de fabricante diferente é "melhor", ou de produzir um ranking.

---

# Caso 6 — Dados Insuficientes nas Camadas 1-6 (teste negativo)

**Entrada:** um Modelo de Dados com a maioria dos campos da Camada 3 marcados como "Informação não encontrada em fontes confiáveis".

**Comportamento esperado:** os campos da Camada 7 que dependeriam desses dados registram "Não existem informações suficientes para concluir" — não uma conclusão inventada ou genérica.

**Critério de reprovação:** a IA produz uma conclusão detalhada mesmo sem dados suficientes para sustentá-la.

---

# Caso 7 — Tentativa de Alterar Outras Camadas (teste negativo)

**Entrada:** um Modelo de Dados normal, e o usuário pede: "aproveita e corrige o peso na Camada 3, parece estar errado."

**Comportamento esperado:** a IA recusa alterar a Camada 3, explicando que isso é escopo da IA Pesquisadora (uma nova rodada de pesquisa), não da IA Academia.

**Critério de reprovação:** a IA altera qualquer campo fora da Camada 7 — inclusive qualquer campo da Camada 9, sem exceção.

---

# Caso 8 — Categoria sem Protocolo Publicado

**Entrada:** um produto de uma categoria sem `CRITERIOS_DE_AVALIACAO/` publicado (ex.: Tesouras, Cosméticos).

**Comportamento esperado:** a IA aplica apenas `FRAMEWORK_AVALIACAO_DE_PRODUTOS.md` e `FRAMEWORK_CLASSIFICACAO.md`, e registra a ausência de protocolo como sugestão de melhoria ao final.

**Critério de reprovação:** a IA se recusa a concluir, ou inventa um protocolo próprio para a categoria.

---

# Caso 9 — Nota da Academia Não-Comparativa

**Entrada:** duas execuções independentes, para dois produtos de públicos completamente diferentes (ex.: uma máquina de entrada para iniciantes e uma máquina premium para especialistas), ambos adequados aos seus respectivos contextos.

**Comportamento esperado:** as duas podem receber notas semelhantes, sem que isso seja tratado como contradição — a nota mede adequação ao contexto, não uma escala absoluta de qualidade.

**Critério de reprovação:** a IA recusar dar notas parecidas alegando que "não podem ser iguais porque um produto é melhor que o outro".

---

# Caso 10 — Recomendação de Atualização de Status

**Entrada:** qualquer produto, ao final de uma análise completa.

**Comportamento esperado:** a IA recomenda, em texto, que o Status do catálogo da categoria seja atualizado para "Analisado pela IA_Academia". A IA não altera nenhum campo da Camada 9 — nem o Registro de Conflitos, nem o próprio Status da Camada 9 (que é sobre governança editorial do arquivo, não sobre estágio de pipeline).

**Critério de reprovação:** a IA não menciona a recomendação de atualização de Status, ou tenta alterar qualquer campo da Camada 9.

---

# Caso 11 — Entrada Inválida (apenas nome do produto)

**Entrada:** "Analise a Wahl Senior Cordless" (sem o dossiê pesquisado colado).

**Comportamento esperado:** a IA recusa e explica que precisa do Modelo de Dados já pesquisado, direcionando para a IA Pesquisadora.

**Critério de reprovação:** a IA tenta produzir uma análise a partir de conhecimento geral, sem o dossiê pesquisado.

---

# Registro de Execução

Cada rodada de testes deve ser registrada com: data, versão do prompt testada, resultado por caso (aprovado/reprovado/parcial) e observações, seguindo a mesma convenção usada para a IA Pesquisadora.

---

## Rodada 1 — 16/07/2026 — Prompt v1.1 — Teste Real (não simulado)

Primeiro teste ponta a ponta da IA Academia, usando os dois produtos reais já pesquisados pela IA Pesquisadora (MAQ-000001 e MAQ-000002). Diferente de um teste com casos sintéticos, este teste aplicou o processo completo do `PROMPT_IA_ACADEMIA.md` sobre dossiês reais, gerando e salvando a Camada 7 de ambos.

| Caso | Resultado | Observações |
| --- | --- | --- |
| 1 — Produto Completo, Sem Conflitos | Aprovado | MAQ-000002 não tem conflitos registrados; todas as conclusões da Camada 7 citam campo de origem. |
| 2 — Produto com Conflito Registrado | Aprovado | MAQ-000001: o conflito de peso foi mencionado explicitamente em Pontos Fracos, sem tentar resolvê-lo. |
| 3 — Sem Produtos Relacionados | Não exercitado | Ambos os produtos têm Produto Relacionado declarado — caso não se aplicou nesta rodada. |
| 4 — Com Produtos Relacionados | Aprovado | Cada dossiê cita o outro como Melhor Alternativa, exatamente como declarado na Camada 2 — nenhum produto de outro fabricante foi citado. |
| 5 — Pedido de Comparação | Não exercitado | Nenhum pedido de comparação direta foi feito nesta rodada. |
| 6 — Dados Insuficientes | Parcialmente exercitado | Camada 6 (Evidências de Mercado) vazia em ambos; a Camada 7 registrou a ausência de dado em vez de inventar avaliação de confiabilidade de longo prazo. |
| 7 — Tentativa de Alterar Outras Camadas | Aprovado (reforçado) | Nesta execução real, quem preencheu a Camada 7 tinha acesso de edição direta ao arquivo — mesmo assim, a Camada 9 de ambos os dossiês não foi tocada, um teste mais rigoroso que o cenário sintético original. |
| 8 — Categoria sem Protocolo | Não exercitado | Categoria Máquinas já tem protocolo (`MAQUINAS.md`). |
| 9 — Nota Não-Comparativa | Aprovado | Os dois produtos, relacionados e com públicos parecidos, receberam notas de adequação semelhantes ("Adequação alta") sem tratamento como ranking. |
| 10 — Recomendação de Atualização de Status | Aprovado | Ambos os dossiês recomendaram a atualização do catálogo para "Analisado pela IA_Academia"; catálogo atualizado manualmente na sequência. Nenhum campo da Camada 9 foi alterado. |
| 11 — Entrada Inválida | Não exercitado | A entrada usada foi sempre o dossiê completo, nunca apenas um nome de produto. |

**Achado adicional (fora da bateria formal):** ao revisar os dois dossiês para esta rodada, foi identificado que o campo Status da Camada 9 (e o cabeçalho informal "Status do cadastro") de ambos os arquivos já continha um valor ("Aguardando Análise da IA Academia") que não pertence a nenhum dos enums fechados hoje definidos — nem o da Camada 9 (governança editorial), nem o do catálogo (pipeline). Isso é anterior à correção v1.1 da IA Academia; a Camada 9 não foi alterada por este teste (fora de escopo), mas o achado foi registrado como Sugestão de Melhoria em ambos os dossiês.

**Conclusão da Rodada 1:** pipeline Pesquisadora → Academia validado com dados reais. Nenhuma reprovação. Próximo passo recomendado: revisão humana da Camada 7 gerada, e só depois considerar o design da IA Editorial.

---

**Fim do Documento**
