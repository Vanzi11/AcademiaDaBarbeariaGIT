# LIMITACOES.md

# Limitações — IA Pesquisadora

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.7

---

# Objetivo

Este documento descreve, sem eufemismos, o que a IA Pesquisadora faz, o que não faz, quando uma revisão humana é obrigatória e quais riscos existem ao operá-la. Ele deve ser lido antes de qualquer decisão de colocar o agente em produção.

---

# O Que o Agente Faz

Recebe um nome de produto e devolve um `MODELO_DE_DADOS_DO_PRODUTO` estruturado (Camadas 1 a 6 e 9), com origem, tipo e data em cada informação, seguindo a Política Oficial de Fontes.

Verifica, não apenas coleta: quando há mais de uma fonte disponível para o mesmo campo objetivo, cruza os valores antes de consolidar, e registra um item no Registro de Conflitos (Camada 9) quando as fontes não coincidem — classificado como Divergência entre fontes, Escopo diferente, Mercado diferente, Versão diferente, ou Informação não confirmada.

Distingue o que confirmou por acesso direto à fonte do que veio apenas de um resumo de busca — os dois nunca são tratados como igualmente confiáveis. A partir dessa distinção e do Tipo de Fonte (A/B/C/D), calcula uma Confiabilidade (Alta/Média/Baixa) por uma tabela fixa — nunca atribuída livremente, mesmo que pareça mais simples deixar o agente "decidir uma nota".

Sinaliza explicitamente o que não encontrou, o que está em conflito entre fontes, e o que é ambíguo na identificação do produto.

---

# O Que o Agente Não Faz

Não avalia, não compara, não recomenda, não atribui nota, não decide "vale a pena". Essa é uma restrição de design, não uma limitação técnica — mesmo que fosse tecnicamente capaz, ele foi instruído a nunca fazer isso.

Não monitora preços de mercado ao longo do tempo (Camada 8) — isso é uma decisão oficial da Academia, não uma lacuna: preço não pertence ao Departamento de Inteligência de Produtos e não altera nenhuma conclusão técnica. No máximo registra um preço observado, a loja e a data, como fotografia pontual. O monitoramento contínuo, se um dia existir, será um fluxo do Departamento Editorial/Comercial. Não substitui verificação jurídica ou regulatória formal (registro ANVISA/INMETRO deve ser confirmado por canal oficial antes de qualquer uso comercial da informação).

Não decide sozinho qual variante de um produto ambíguo é a "correta". Em conversa interativa, pausa e pergunta ao usuário; só documenta todas as variantes sem perguntar quando estiver em execução não-interativa (processamento em lote, sem ninguém para responder no momento).

Não lista "concorrentes" de um produto, mesmo quando solicitado. Pode registrar Produtos Relacionados factuais (versão anterior/seguinte/mesma linha) quando o próprio fabricante os declara — mas comparação com produtos de outras marcas é julgamento, reservado à Camada 7 (IA Academia).

---

# Dependência Crítica: Ferramenta de Pesquisa Ativa

A limitação mais importante deste agente é arquitetural: ele é um modelo de linguagem, não um banco de dados de especificações. Toda a confiabilidade do sistema depende de estar operando com busca web/navegação real habilitada.

Se essa capacidade for removida ou falhar silenciosamente, existe risco real de o modelo preencher campos a partir de conhecimento paramétrico desatualizado ou impreciso, mesmo que instruído a não fazer isso. Por isso o prompt operacional exige uma verificação inicial explícita antes de qualquer pesquisa (ver `PROMPT_IA_PESQUISADORA.md`).

**Recomendação:** nunca aceitar um Modelo de Dados gerado em uma sessão onde não é possível confirmar que houve pesquisa real (ex.: sem links verificáveis nas fontes citadas).

---

# Idioma e Mercado

Grande parte da documentação oficial de fabricantes internacionais (Wahl, Andis, JRL, Feather etc.) está em inglês ou japonês. Produtos nacionais (cadeiras, lavatórios, alguns softwares) tendem a ter menos documentação estruturada disponível publicamente.

Isso significa que produtos de fabricantes menores ou nacionais provavelmente gerarão Modelos de Dados mais incompletos — isso é esperado e correto (campos vazios são aceitáveis), não uma falha do agente.

---

# Cobertura dos Protocolos de Categoria

`CRITERIOS_DE_AVALIACAO/MAQUINAS.md` (v4.2) já cobre as 5 subcategorias de Máquinas definidas em `TAXONOMIA_DOS_PRODUTOS.md` (Corte, Acabamento, Híbridas, Corporais, Nariz e Orelha), cada uma com aplicabilidade explícita por campo. A lacuna de cobertura registrada em versões anteriores deste documento está resolvida.

Categorias fora de Máquinas (Tesouras, Navalhas, Cosméticos, Mobiliário, Software, Educação) ainda não têm protocolo próprio em `CRITERIOS_DE_AVALIACAO/` — o agente opera normalmente para elas, apenas sem o reforço de um checklist dedicado. `CASOS_DE_TESTE.md`, Caso 15, permanece como teste de robustez para o caso de uma futura revisão do protocolo de Máquinas deixar de cobrir alguma subcategoria temporariamente.

# Produtos Novíssimos ou Pouco Documentados

Lançamentos recentes podem não ter manual completo, ficha técnica final ou evidências de mercado (Nível C) ainda formadas. Nesses casos, o cadastro deve ser tratado como provisório e reexecutado após alguns meses de mercado.

---

# Ambiguidade de Nomes Comerciais

Nomes comerciais mudam entre mercados, têm gerações (v1, v2, Pro, Li), e às vezes têm apelidos populares diferentes do nome oficial. O agente foi instruído a nunca resolver essa ambiguidade sozinho, mas erros de identificação ainda são o risco mais provável de uso incorreto — a revisão humana da Camada 1 (Identidade) é sempre recomendada antes de qualquer publicação.

Desde a v1.1 do `MODELO_DE_DADOS_DO_PRODUTO.md`, o SKU/part number oficial do fabricante ajuda a mitigar esse risco quando publicado — mas nem todo fabricante o divulga publicamente, e ele nunca deve ser confundido com o SKU de uma loja ou marketplace (que é dado comercial, não de identidade). Sua ausência não é um erro do agente; é apenas mais um campo tratado como "informação não encontrada".

Desde a v1.2, o campo aceita um SKU por mercado (lista aberta), porque o primeiro teste real do agente (produto "Wahl Senior Cordless") mostrou que o mesmo produto pode ter códigos oficiais diferentes nos EUA, Canadá e Europa — um limite real da premissa antiga de "um produto, um SKU".

---

# Base de Conhecimento e ID Interno São Geridos por Humanos, Não pelo Agente

`08_INTELIGENCIA_ARTIFICIAL/BASE_DE_CONHECIMENTO/` guarda os dossiês pesquisados, mas a IA Pesquisadora — rodando como Claude Project — não tem acesso direto a esse repositório para consultar catálogos ou atribuir IDs sozinha. Consultar o catálogo antes da pesquisa, atribuir o próximo ID Interno disponível e salvar o dossiê no lugar certo são passos conduzidos por quem opera o agente. O agente nunca inventa um ID Interno por conta própria — na ausência de um ID informado, o campo fica "Não atribuído", o que é um estado válido, não uma falha.

---

# Diário de Pesquisa é Condicional, Não Universal

Desde a v1.3 do `MODELO_DE_DADOS_DO_PRODUTO.md`, o Diário de Pesquisa só é gerado quando há um gatilho real: um conflito registrado, uma ambiguidade de identificação resolvida em conversa, ou mais de uma rodada de pesquisa para o mesmo produto. Um cadastro simples, sem nenhum desses gatilhos, não terá Diário — isso não é uma omissão do agente, é o comportamento correto por desenho (evita multiplicar arquivos por produto em escala de milhares de cadastros).

---

# Quando a Revisão Humana é Obrigatória

- Sempre, antes de um Modelo de Dados seguir para a IA Academia — no mínimo uma checagem rápida da Identidade e das Pendências.
- Sempre que houver qualquer item no Registro de Conflitos — especialmente os classificados como "Divergência entre fontes" ou "Informação não confirmada", que normalmente exigem uma decisão humana antes de publicar.
- Sempre que o produto envolver certificações regulatórias (ANVISA, INMETRO) citadas — confirmar diretamente no órgão oficial antes de qualquer uso comercial dessa informação.
- Sempre que o Registro de Pendências indicar ambiguidade de identificação não resolvida.
- Sempre que o agente sinalizar ausência de ferramenta de pesquisa.

---

# Riscos

**Confiança excessiva:** tratar um Modelo de Dados gerado pela IA Pesquisadora como definitivo sem revisar pendências. O agente é rigoroso, mas fontes públicas podem estar erradas ou desatualizadas mesmo quando são Nível A.

**Uso fora de escopo:** pedir à IA Pesquisadora conclusões que pertencem à IA Academia. O prompt recusa isso, mas um usuário insistente pode tentar reformular a pergunta — qualquer saída que pareça uma recomendação deve ser tratada como falha e reportada.

**Desatualização:** produtos mudam de especificação, saem de linha ou passam por recall. Um cadastro nunca deve ser considerado permanente — a Camada 9 (Controle Editorial) existe justamente para rastrear quando foi feita a última pesquisa.

**Dependência de infraestrutura:** sem busca web ativa, o agente não deve operar (ver seção acima). Rodar o prompt em um ambiente sem essa capacidade é o principal modo de falha silenciosa deste sistema.

---

**Fim do Documento**
