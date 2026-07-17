# Limitações — IA Academia (Versão Lite)

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.2

---

# Objetivo

Descrever, sem eufemismos, o que a IA Academia faz, o que não faz, quando a revisão humana é obrigatória, e quais riscos existem ao operá-la.

---

# O Que o Agente Faz

Recebe um `MODELO_DE_DADOS_DO_PRODUTO` já pesquisado e preenche exclusivamente a Camada 7, aplicando `FRAMEWORK_AVALIACAO_DE_PRODUTOS.md` e o protocolo de categoria correspondente. Cada conclusão cita explicitamente o campo das Camadas 1-6 do qual deriva.

---

# O Que o Agente Não Faz

Não pesquisa. Depende inteiramente da qualidade do trabalho da IA Pesquisadora — "dado ruim entra, conclusão ruim sai" é um risco real e estrutural, não uma falha desta IA especificamente.

Não compara este produto com produtos de outro fabricante, não produz rankings, "Top 10" ou "qual é o melhor" — isso é escopo de uma futura IA Comparadora. Desde a v1.2, pode comparar o produto (inclusive quantitativamente) com um Produto Relacionado já declarado na Camada 2 — mesma linha, mesmo fabricante, versão anterior/posterior — nos campos que já previam esse cruzamento. Fora dessa exceção declarada, avalia um produto por vez.

Não altera as Camadas 1 a 6, a Camada 8, nem qualquer campo da Camada 9 — nem o Registro de Conflitos, nem o próprio Status da Camada 9 (que descreve governança editorial do arquivo: Em revisão/Publicado/Arquivado/Necessita atualização — um assunto diferente do estágio de pipeline). A única atualização de status que a IA Academia recomenda é a do catálogo da categoria na Base de Conhecimento, e apenas em texto — nunca editando o arquivo diretamente.

Não decide sozinha quando um conflito registrado deve ser resolvido — apenas reduz a confiança da conclusão afetada e menciona a limitação.

---

# Dependência Crítica: Qualidade do Dossiê Recebido

A limitação mais importante desta IA é que ela não tem como verificar se a pesquisa da IA Pesquisadora foi bem feita — ela confia no que está escrito nas Camadas 1-6. Se um dado estiver errado ali (por exemplo, uma especificação mal registrada), a conclusão da Academia herdará esse erro sem perceber.

**Recomendação:** sempre revisar as pendências e conflitos registrados pela IA Pesquisadora antes de enviar o produto para a IA Academia — não pular a etapa de revisão humana descrita em `GUIA_DE_UTILIZACAO.md` da IA Pesquisadora.

---

# Rastreabilidade Não é Garantia de Correção

Cada conclusão citar um campo de origem prova que a IA não inventou a afirmação do nada — mas não prova que a interpretação daquele dado está correta. Uma citação de campo é uma prova de origem, não uma prova de acerto de julgamento. A revisão humana da Camada 7 continua recomendada antes de qualquer publicação.

---

# Limitação Estrutural: Versão Lite

Esta versão não tem acesso a um catálogo de outros produtos da mesma categoria — só ao produto que recebeu. Isso significa que qualquer pergunta que exija olhar o mercado como um todo ("qual a melhor máquina de fade abaixo de R$500?", "como esse produto se compara aos concorrentes?") está genuinamente fora do alcance desta versão — não por regra arbitrária, mas por ausência real de dados de outros produtos no momento da análise.

---

# Quando a Revisão Humana é Obrigatória

- Sempre, antes de um produto com Camada 7 preenchida seguir para a IA Editorial (quando ela existir).
- Sempre que a Camada 7 mencionar um conflito registrado na Camada 9 — confirmar se a menção reflete adequadamente a limitação.
- Sempre que muitos campos das Camadas 1-6 estiverem vazios e a Camada 7 registrar "dados insuficientes" — decidir se vale complementar a pesquisa antes de prosseguir.
- Sempre que "Melhor alternativa" for preenchida — confirmar que aponta apenas para um Produto Relacionado já declarado, nunca um produto de outro fabricante.

---

# Riscos

**Confiança excessiva na rastreabilidade:** tratar toda conclusão citada como automaticamente correta, só porque aponta para um campo de origem. A citação prova rastreio, não prova acerto.

**Herança silenciosa de erros de pesquisa:** um dado mal pesquisado na Camada 3 pode virar uma conclusão equivocada na Camada 7, sem que a Academia tenha como perceber.

**Uso fora de escopo:** pedir comparação com produto de outro fabricante ou "melhor da categoria" a esta versão. O prompt recusa isso, mas um uso insistente pode tentar forçar a resposta — qualquer saída comparativa envolvendo produto fora da Camada 2 deve ser tratada como falha. A comparação com um Produto Relacionado da mesma linha (v1.2) não se enquadra aqui — é comportamento esperado.

**Desatualização:** uma conclusão da Academia reflete o estado da pesquisa no momento em que foi feita. Se o produto for reexaminado depois (nova versão, recall, especificação atualizada), a Camada 7 deve ser refeita, não presumida como permanente.

---

# Pendência Registrada: Escala da "Nota da Academia"

O campo "Nota da Academia" hoje não tem escala, critérios ou significado formalizados além da regra de não ser comparativa. Isso cria um risco real: duas execuções (ou dois revisores humanos) podem atribuir notas diferentes a produtos objetivamente equivalentes, por falta de uma régua comum. Não é urgente — a versão atual já funciona com revisão humana caso a caso — mas recomenda-se, no futuro, um documento dedicado (`ESCALA_DA_NOTA_DA_ACADEMIA.md`) definindo a escala e os critérios. Identificado durante uma segunda revisão externa (GPT) e validado como uma lacuna real, não uma correção urgente.

---

**Fim do Documento**
