# RELATORIO_REVISAO_V2.md

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Referência:** `ORDEM_DE_REVISAO_V1.md`

**Status:** Revisão concluída

---

# Objetivo

Este relatório responde às cinco perguntas obrigatórias de `ORDEM_DE_REVISAO_V1.md`, após uma revisão crítica — não automática — de cada item solicitado.

A instrução da Ordem foi seguida à risca: nem toda sugestão foi implementada como proposta originalmente. Duas foram implementadas com uma alternativa mais simples, e três já estavam resolvidas em revisões anteriores.

---

# 1. Quais alterações foram realizadas?

## `MODELO_DE_DADOS_DO_PRODUTO.md` (v1.1 → v1.2)

- Camada 1: o SKU/Part Number do Fabricante deixou de ser um campo único e passou a ser uma **lista aberta por mercado** (mercado + valor + fonte), em vez dos quatro campos fixos sugeridos ("SKU Brasil", "SKU EUA", "SKU Europa", "SKU Canadá"). Ver seção 3 para a justificativa dessa mudança em relação ao que foi pedido.
- Camada 9: criada a estrutura **Registro de Conflitos**, com os campos Campo afetado, Tipo de conflito (Divergência entre fontes / Escopo diferente / Mercado diferente / Versão diferente / Informação não confirmada), Valores e fontes envolvidos, e Recomendação.
- Camada 3: adicionada uma regra de sub-atributos nomeados (Tipo/Modelo, Valor/Unidade/Escopo, Valor/Mercado), aplicada apenas a Motor, Peso, Voltagem e Garantia — não a todos os campos do modelo. Ver seção 3.

## `PROMPT_IA_PESQUISADORA.md` (v1.4 → v1.5)

- Nova regra absoluta: distinguir sempre informação confirmada por acesso direto à fonte de informação obtida apenas em resumo de busca, com marcação explícita em cada citação.
- Regra de ambiguidade revisada: perguntar ao usuário passou a ser o comportamento padrão em conversas interativas; documentar todas as variantes separadamente ficou restrito a execuções não-interativas (processamento em lote). Ver seção 3.
- Regra de conflitos atualizada para apontar para a nova estrutura de Registro de Conflitos (Camada 9), com as cinco categorias, em vez de apenas "registrar a divergência" em prosa livre.
- Template de saída atualizado: citações agora incluem o campo "Verificação: acesso direto/resumo de busca"; Camada 1 do template reflete a lista de SKUs por mercado; Camada 9 do template inclui o Registro de Conflitos.

## `CRITERIOS_DE_AVALIACAO/MAQUINAS.md`

Nenhuma alteração. Os três pontos pedidos já estavam resolvidos na versão vigente (v4.2) — ver seção 3.

---

# 2. Qual problema cada alteração resolveu?

A lista aberta de SKUs por mercado resolve exatamente o que o teste com "Wahl Senior Cordless" expôs: o mesmo produto tem códigos oficiais diferentes nos EUA, Canadá e Europa, e um campo único obrigaria a IA Pesquisadora a escolher um deles sem justificativa — o que a arquitetura já proíbe.

O Registro de Conflitos resolve um problema estrutural real: antes desta revisão, uma divergência entre fontes (ex.: peso) só existia como uma frase solta dentro de "Observações" ou do "Registro de Pendências" do prompt — não como um dado estruturado e auditável do próprio cadastro do produto. Isso dificultaria, por exemplo, que a IA Academia ou um humano filtrassem futuramente "todos os produtos com conflito de peso não resolvido".

A distinção entre acesso direto e resumo de busca resolve um problema que o teste revelou na prática: durante a pesquisa do Wahl Senior Cordless, um valor de RPM (6.500) apareceu apenas em um resumo agregado de busca, sem que a página de origem fosse aberta e confirmada. Sem essa regra, esse dado poderia ter sido registrado com a mesma confiança de um dado confirmado por fetch direto (como os 7.200 RPM da Wahl Canadá) — um risco real de qualidade silenciosamente sub-verificada.

A priorização de "perguntar ao usuário" em vez de "documentar todas as variantes" resolve uma falha observada no próprio teste: diante da ambiguidade real do "Wahl Senior Cordless" entre mercados, a IA Pesquisadora seguiu direto para documentar as variantes, sem pausar para perguntar — o que era tecnicamente permitido pela regra anterior, mas não foi a melhor escolha em um contexto conversacional onde havia alguém disponível para responder.

---

# 3. Alguma alteração proposta foi recusada? Por quê?

Sim, três pontos foram recusados ou modificados — não por discordância com o problema identificado, mas com a forma de resolução proposta.

**SKU por campos fixos por país (recusado, substituído por lista aberta).** Criar campos fixos como "SKU Brasil", "SKU EUA", "SKU Europa", "SKU Canadá" resolveria o caso testado, mas engessaria o modelo: assim que a Academia precisasse de um mercado não previsto (México, Reino Unido separado da UE, etc.), o documento teria que ser reeditado de novo. Uma lista aberta (mercado + valor + fonte) resolve o mesmo problema sem esse limite, e segue o mesmo padrão que `MODELO_DE_DADOS_DO_PRODUTO.md` já usa em outras camadas (Evidências, Lojas Monitoradas) — não introduz um conceito novo na arquitetura, só estende um padrão existente a mais um lugar.

**Sub-atributos (Tipo/Modelo/Valor/Unidade/Mercado/Fonte) em todos os campos (recusado, aplicado só onde há necessidade comprovada).** Aplicar essa estrutura de seis partes a todo campo do Modelo de Dados — incluindo campos simples como Cor ou Certificações — adicionaria complexidade sem benefício proporcional, e contraria o princípio de Objetividade do `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` ("evite textos desnecessariamente longos"). A alternativa adotada aplica sub-atributos apenas aos quatro campos onde o teste real mostrou necessidade concreta: Motor (Tipo+Modelo, exatamente como no exemplo da Ordem), Peso (Valor+Unidade+Escopo), Voltagem e Garantia (Valor+Mercado). Novos campos podem ganhar essa estrutura no futuro, caso a mesma necessidade apareça — mas não por padrão.

**Ambiguidade: eliminar a opção de documentar todas as variantes (parcialmente recusado — mantida como exceção, não removida).** A Ordem pedia "jamais escolher uma, solicitar esclarecimento ao usuário" de forma absoluta. Isso é o comportamento certo quando há um humano na conversa — e passou a ser o padrão. Mas a IA Pesquisadora foi desenhada para também operar em processamento em lote, sem ninguém para responder no momento (por exemplo, ao construir a Base de Conhecimento em volume). Remover completamente a opção de documentar as variantes separadamente quebraria esse modo de uso. A solução adotada mantém as duas: perguntar é o padrão; documentar tudo separadamente é a exceção, só para quando não há como perguntar.

**Os três ajustes pedidos para `MAQUINAS.md` (recusados por já estarem implementados).** A cobertura das 5 subcategorias da Taxonomia (incluindo Corporais e Nariz/Orelha), a coluna de aplicabilidade por critério, e a proibição explícita de concluir no Contexto Declarado já existem na versão vigente do documento (v4.2), resultado das revisões anteriores desta mesma sessão de trabalho. Reimplementá-los seria retrabalho sem propósito — por isso o arquivo não foi tocado.

---

# 4. A documentação continua compatível com toda a arquitetura da Academia?

Sim. Nenhuma mudança contraria a Constituição, o Manual das IAs, a Arquitetura do Departamento, os dois Frameworks, a Taxonomia, o Processo de Análise ou a Política de Fontes — todos permaneceram intocados, conforme a restrição de escopo da Ordem.

As duas mudanças estruturais novas (lista de SKUs por mercado e Registro de Conflitos) são extensões de padrões que já existiam no `MODELO_DE_DADOS_DO_PRODUTO.md` (listas com fonte, tipo e data por item), não conceitos importados de fora da arquitetura. A separação de responsabilidades entre IA Pesquisadora (coleta e validação) e IA Academia (conclusão) permanece exatamente como estava — nenhuma das mudanças aproxima a IA Pesquisadora de emitir julgamento.

---

# 5. Existem novas oportunidades de melhoria identificadas durante a revisão?

Sim, quatro, nenhuma implementada nesta rodada por estarem fora do escopo autorizado pela Ordem:

Os cinco documentos não autorizados nesta Ordem (`IA_PESQUISADORA.md`, `GUIA_DE_UTILIZACAO.md`, `CASOS_DE_TESTE.md`, `LIMITACOES.md`, `RELATORIO_FINAL.md`) ainda não refletem as mudanças desta revisão — por exemplo, não há um Caso de Teste dedicado ao Registro de Conflitos ou à priorização de "perguntar ao usuário" na ambiguidade. Recomenda-se uma segunda ordem de revisão, restrita a esses cinco documentos, para sincronizá-los.

O `CATALOGO_DOCUMENTAL.md` (`00_GOVERNANCA/`) não foi verificado nesta revisão para confirmar se ele lista `MODELO_DE_DADOS_DO_PRODUTO.md` e os demais documentos de IA com suas versões atuais — vale uma checagem futura.

A pasta `08_INTELIGENCIA_ARTIFICIAL/REVISOES/` foi criada nesta sessão para abrigar `ORDEM_DE_REVISAO_V1.md` e este relatório. Se esse padrão de "ordem de revisão" for repetido no futuro (o que parece provável, dado o valor demonstrado aqui), vale considerar documentá-lo formalmente como parte do processo do Departamento — hoje ele existe apenas por precedente, não por definição escrita.

O teste com o Wahl Senior Cordless também revelou uma decisão de classificação não trivial (Máquina de Corte vs. Acabamento, dado o uso forte em tapering/fade) que a IA Pesquisadora registrou como pendência interpretativa. Isso não é um problema de documentação, mas um bom candidato a virar um dos primeiros casos reais analisados pela futura IA Academia.

---

**Fim do Documento**
