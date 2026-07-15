# Limitações — IA Academia (Versão Lite)

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.0

---

# Objetivo

Descrever, sem eufemismos, o que a IA Academia faz, o que não faz, quando a revisão humana é obrigatória, e quais riscos existem ao operá-la.

---

# O Que o Agente Faz

Recebe um `MODELO_DE_DADOS_DO_PRODUTO` já pesquisado e preenche exclusivamente a Camada 7, aplicando `FRAMEWORK_AVALIACAO_DE_PRODUTOS.md` e o protocolo de categoria correspondente. Cada conclusão cita explicitamente o campo das Camadas 1-6 do qual deriva.

---

# O Que o Agente Não Faz

Não pesquisa. Depende inteiramente da qualidade do trabalho da IA Pesquisadora — "dado ruim entra, conclusão ruim sai" é um risco real e estrutural, não uma falha desta IA especificamente.

Não compara produtos entre si, não produz rankings, "Top 10" ou "qual é o melhor". Esta é a Versão Lite: avalia um produto por vez. Comparação é escopo de uma futura IA Comparadora.

Não altera as Camadas 1 a 6, a Camada 8, nem o conteúdo do Registro de Conflitos da Camada 9 — só o campo Status desse registro.

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

**Uso fora de escopo:** pedir comparação entre produtos ou "melhor da categoria" a esta versão. O prompt recusa isso, mas um uso insistente pode tentar forçar a resposta — qualquer saída comparativa deve ser tratada como falha.

**Desatualização:** uma conclusão da Academia reflete o estado da pesquisa no momento em que foi feita. Se o produto for reexaminado depois (nova versão, recall, especificação atualizada), a Camada 7 deve ser refeita, não presumida como permanente.

---

**Fim do Documento**
