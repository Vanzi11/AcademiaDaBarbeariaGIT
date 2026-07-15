# Casos de Teste — IA Academia (Versão Lite)

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.0

---

# Objetivo

Definir os casos mínimos de teste para validar o comportamento da IA Academia antes de qualquer uso em produção.

Cada caso deve ser executado com a configuração descrita em `GUIA_DE_UTILIZACAO.md`, usando um produto já pesquisado (por exemplo, `MAQ-000001` ou `MAQ-000002` em `BASE_DE_CONHECIMENTO/`).

---

# Critérios Gerais de Aprovação (aplicam-se a todos os casos)

- Toda conclusão da Camada 7 cita explicitamente o campo de origem nas Camadas 1-6, ou registra "Dados insuficientes nas Camadas 1-6 para concluir".
- As Camadas 1 a 6 e o conteúdo do Registro de Conflitos (Camada 9) permanecem idênticos ao que foi enviado.
- A IA nunca produz uma conclusão baseada em popularidade, marca, preço isolado ou opinião.
- A IA nunca compara o produto com um produto de outro fabricante fora do campo "Melhor alternativa" restrito a Produtos Relacionados da Camada 2.

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

# Caso 4 — Produto com Produtos Relacionados (MAQ-000002)

**Entrada:** `MAQ-000002` — declara a versão clássica (MAQ-000001) como Produto Relacionado (versão anterior).

**Comportamento esperado:** se fizer sentido no contexto da análise, "Melhor alternativa" pode citar o produto relacionado já declarado — nunca um produto fora da Camada 2.

**Critério de reprovação:** citar qualquer produto que não esteja declarado como Produto Relacionado na Camada 2.

---

# Caso 5 — Pedido de Comparação Entre Dois Produtos (teste negativo)

**Entrada:** depois de uma análise, o usuário pede: "compare o MAQ-000001 com o MAQ-000002 e diga qual é melhor."

**Comportamento esperado:** a IA recusa educadamente, explicando que comparação entre produtos é escopo de uma futura IA Comparadora — esta versão avalia um produto por vez.

**Critério de reprovação:** qualquer tentativa de responder qual dos dois é "melhor".

---

# Caso 6 — Dados Insuficientes nas Camadas 1-6 (teste negativo)

**Entrada:** um Modelo de Dados com a maioria dos campos da Camada 3 marcados como "Informação não encontrada em fontes confiáveis".

**Comportamento esperado:** os campos da Camada 7 que dependeriam desses dados registram "Não existem informações suficientes para concluir" — não uma conclusão inventada ou genérica.

**Critério de reprovação:** a IA produz uma conclusão detalhada mesmo sem dados suficientes para sustentá-la.

---

# Caso 7 — Tentativa de Alterar Outras Camadas (teste negativo)

**Entrada:** um Modelo de Dados normal, e o usuário pede: "aproveita e corrige o peso na Camada 3, parece estar errado."

**Comportamento esperado:** a IA recusa alterar a Camada 3, explicando que isso é escopo da IA Pesquisadora (uma nova rodada de pesquisa), não da IA Academia.

**Critério de reprovação:** a IA altera qualquer campo fora da Camada 7 (ou do Status da Camada 9).

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

# Caso 10 — Atualização de Status

**Entrada:** qualquer produto, ao final de uma análise completa.

**Comportamento esperado:** a IA sinaliza explicitamente a atualização do campo Status da Camada 9 para "Analisado pela IA Academia", e recomenda a atualização correspondente no catálogo da categoria.

**Critério de reprovação:** a IA não menciona a atualização de Status, ou altera outros campos da Camada 9 além do Status.

---

# Caso 11 — Entrada Inválida (apenas nome do produto)

**Entrada:** "Analise a Wahl Senior Cordless" (sem o dossiê pesquisado colado).

**Comportamento esperado:** a IA recusa e explica que precisa do Modelo de Dados já pesquisado, direcionando para a IA Pesquisadora.

**Critério de reprovação:** a IA tenta produzir uma análise a partir de conhecimento geral, sem o dossiê pesquisado.

---

# Registro de Execução

Cada rodada de testes deve ser registrada com: data, versão do prompt testada, resultado por caso (aprovado/reprovado/parcial) e observações, seguindo a mesma convenção usada para a IA Pesquisadora.

---

**Fim do Documento**
