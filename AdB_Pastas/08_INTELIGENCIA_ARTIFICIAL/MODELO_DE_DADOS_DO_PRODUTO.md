# MODELO_DE_DADOS_DO_PRODUTO.md

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.4

**Status:** Documento Fundador

---

# Objetivo

Este documento define o Modelo Oficial de Dados utilizado pela Academia da Barbearia para representar qualquer produto do universo da beleza masculina.

O objetivo não é armazenar dados.

O objetivo é organizar conhecimento.

Este modelo será utilizado por:

- Portal da Academia
- Sistema de Inteligência de Produtos (SAIP)
- Academia Recomenda
- Comparativos
- Reviews
- Artigos
- Inteligências Artificiais
- Banco de Dados
- APIs futuras

Toda informação sobre um produto deverá seguir obrigatoriamente esta estrutura.

---

# Filosofia

Todo produto possui diferentes camadas de conhecimento.

A Academia organiza essas camadas separadamente para evitar misturar fatos, evidências e interpretações.

Cada camada possui uma função específica.

---

# Estrutura Geral

Todo produto será composto pelas seguintes camadas.

1. Identidade

2. Classificação

3. Especificações Técnicas

4. Contexto de Uso

5. Compatibilidade

6. Evidências

7. Inteligência da Academia

8. Informações Comerciais

9. Controle Editorial

---

# Convenção de Fontes e Confiabilidade

Toda camada deste modelo cita fontes. Para que essa citação seja consistente e não dependa do julgamento da IA que pesquisa, ela segue duas regras fixas.

## Tipo de Fonte (enumeração fechada)

A IA não decide livremente se uma fonte é "Tipo A" ou "Tipo B" — ela classifica a origem concreta em uma destas categorias, e o Tipo é derivado automaticamente por esta tabela, que segue a hierarquia já definida em `FONTES_DE_DADOS.md`:

| Origem concreta | Tipo derivado |
|---|---|
| Site oficial do fabricante, manual do usuário, ficha técnica, catálogo, patente, certificação, registro oficial (ANVISA/INMETRO) | A |
| Distribuidor oficial, assistência técnica autorizada, revendedor especializado, ficha de produto em marketplace (reproduzindo dados do fabricante, não avaliação de cliente) | B |
| Fórum especializado, comunidade profissional, YouTube, avaliação técnica independente, review técnico, avaliação de cliente em marketplace | C |
| Portal editorial, blog especializado, revista técnica, comparativo de terceiros | D |

Se a origem concreta não estiver nesta lista, a IA registra a origem por extenso e marca o Tipo como "não classificado" — nunca escolhe um Tipo por conta própria. Ampliar esta tabela é uma decisão de arquitetura, não uma decisão da IA Pesquisadora.

## Confiabilidade Calculada (não atribuída livremente)

A confiabilidade de um dado nunca é uma nota livre da IA (ex.: "★★★★☆") — isso seria julgamento, proibido à IA Pesquisadora. Ela é sempre calculada a partir de duas variáveis já registradas, Tipo de Fonte e Verificação (acesso direto ou resumo de busca):

| Tipo de Fonte | Acesso direto | Resumo de busca |
|---|---|---|
| A | Alta | Média |
| B | Média | Baixa |
| C | Média | Baixa |
| D | Baixa | Baixa |

Qualquer dado marcado como "Informação não confirmada" no Registro de Conflitos (Camada 9) é sempre Baixa, independentemente do Tipo de Fonte.

**Decisões já avaliadas e recusadas para este documento** (registradas aqui para não serem propostas novamente sem justificativa nova):

- Uma escala de estrelas livre por campo foi recusada — ela reintroduziria julgamento subjetivo da IA Pesquisadora exatamente onde este documento existe para impedir isso. A tabela acima cobre a mesma necessidade sem esse risco.
- Aplicar Valor/Unidade/Mercado/Escopo/Confiabilidade como estrutura obrigatória em todo campo do modelo foi recusado — ver nota já existente na Camada 3. Sub-atributos são adicionados campo a campo, apenas onde uma necessidade real foi observada, não como padrão universal.

---

# CAMADA 1

# Identidade

Define quem é o produto.

Campos obrigatórios.

ID Interno

Nome Comercial

Marca

Fabricante

Modelo

Linha

Versão

SKU / Part Number do Fabricante

Ano de lançamento

Status

Categorias possíveis.

Ativo

Descontinuado

Em atualização

Pré-lançamento

---

# Sobre o SKU / Part Number do Fabricante

Trata-se do código oficial atribuído pelo próprio fabricante para identificar exatamente aquela variante do produto (cor, voltagem, geração, mercado de destino) — não o código de estoque de uma loja ou marketplace, que é informação comercial e pertence à Camada 8.

Origem obrigatória: fabricante, manual, ficha técnica ou embalagem oficial. Quando não publicado, registrar "Informação não encontrada em fontes confiáveis." — campo vazio é aceitável, jamais inventado ou inferido.

Sua principal utilidade é resolver ambiguidade de identificação: quando dois produtos compartilham o mesmo Nome Comercial e Modelo mas são, na prática, variantes diferentes, o SKU do fabricante permite distingui-los sem depender de interpretação.

**Um mesmo produto pode ter mais de um SKU oficial legítimo, um por mercado.** Fabricantes internacionais frequentemente atribuem códigos diferentes ao mesmo produto em regiões diferentes (ex.: um código para o mercado americano, outro para o europeu). Quando isso ocorrer, o campo não deve forçar um único valor — deve ser registrado como uma lista, um item por mercado identificado:

- Mercado: [ex.: Brasil, EUA, Europa, Canadá — ou "Não especificado" quando a fonte não indicar]
- Valor do SKU: [código]
- Fonte: [fabricante/distribuidor, Tipo A/B, link]

Esta lista é aberta — não há um conjunto fixo de mercados predefinido no modelo. Isso evita reescrever o documento a cada novo mercado onde a Academia passar a operar, e evita a alternativa de campos fixos ("SKU Brasil", "SKU EUA", "SKU Europa"...) que ficaria incompleta assim que surgisse um mercado não previsto.

---

# Sobre o ID Interno

Campo já previsto desde a versão original deste documento, agora formalizado: é o identificador que a própria Academia atribui ao produto, distinto do SKU do fabricante (que é externo, definido por terceiros, e pode nem existir publicamente).

Formato: `<PREFIXO>-NNNNNN` (prefixo de 3 letras por Categoria da Taxonomia + 6 dígitos sequenciais, ex.: `MAQ-000001`). A tabela de prefixos por categoria é mantida em `BASE_DE_CONHECIMENTO/README.md`, não duplicada aqui, para ter um único lugar a atualizar quando novas categorias forem habilitadas.

Atribuído no momento em que o dossiê entra na Base de Conhecimento (`08_INTELIGENCIA_ARTIFICIAL/BASE_DE_CONHECIMENTO/`) — nunca inventado pela IA Pesquisadora por conta própria. Uma vez atribuído, é permanente: não muda mesmo que o produto seja renomeado, o arquivo seja renomeado, ou o Nome Comercial mude entre mercados. É o campo que amarra o mesmo produto ao mesmo arquivo ao longo de toda a vida do cadastro, para o Portal, a IA Academia e a IA Editorial.

Quando o produto ainda não tiver entrado na Base de Conhecimento (ex.: pesquisa exploratória, ainda não decidido se será catalogado), o campo permanece "Não atribuído" — isso não é um dado ausente por falha de pesquisa, é um estado válido anterior ao cadastro.

---

# CAMADA 2

# Classificação

Segue obrigatoriamente a Taxonomia Oficial.

Departamento

Categoria

Subcategoria

Família

Tipo

Tags

Produtos Relacionados (fatos, não comparação — ver nota abaixo)

- Versão anterior (se o fabricante declarar que este produto substitui/sucede outro)
- Versão seguinte (se já existir um sucessor declarado pelo fabricante)
- Mesma linha/fabricante (outros produtos da mesma família comercial)

# Sobre Produtos Relacionados: o que entra e o que não entra

Só entram aqui relações **factuais e sourciáveis** — normalmente porque o próprio fabricante afirma isso (ex.: "o Senior 2.0 é a evolução do Senior clássico"). Cada item leva fonte, tipo e verificação, como qualquer outro dado desta camada.

**Concorrentes (diretos ou indiretos) não entram aqui.** Apontar quem compete com quem exige julgamento de mercado — o que produto é substituível por qual, em que contexto — e isso é avaliação, não classificação. Esse campo já existe, com o nome "Produtos concorrentes", na Camada 7 (Inteligência da Academia), exclusiva da IA Academia. Registrar concorrência na Camada 2 duplicaria esse campo e vazaria julgamento para dentro da etapa de coleta, que deve permanecer neutra.

---

# CAMADA 3

# Especificações Técnicas

Esta camada contém apenas informações objetivas.

Origem obrigatória:

- Manual
- Fabricante
- Ficha Técnica

Jamais utilizar opinião.

Sempre que um campo tiver mais de uma dimensão relevante para não perder precisão, ele deve ser registrado com sub-atributos nomeados em vez de um único valor solto. Isso não se aplica a todos os campos — só aos que, na prática, precisam disso. Os quatro casos já identificados como necessários:

- Motor: Tipo (ex.: Rotativo) + Modelo (ex.: V9000).
- Peso: Valor + Unidade (g/kg) + Escopo (peso líquido do equipamento / peso com embalagem) — evita registrar como "divergência" duas fontes que na verdade medem coisas diferentes.
- Voltagem: Valor + Mercado (quando o fabricante publicar versões diferentes por região).
- Garantia: Valor + Mercado (quando o prazo variar legitimamente por país, por exigência legal local).

Campos simples de valor único (Cor, Certificações, Origem etc.) continuam registrados como valor único — não há necessidade de forçar sub-atributos onde não existe ambiguidade real.

Qualquer campo desta camada — inclusive os simples — pode receber uma **Observação** de texto livre para uma característica relevante que não se encaixa em Tipo/Modelo/Valor/Unidade (ex.: Motor → Tipo: Brushless Rotativo · Modelo: não nomeado · Observação: "inclui Adaptive Speed Control, que ajusta a velocidade automaticamente conforme a densidade do cabelo, conforme declarado pelo fabricante"). Isso resolve a necessidade de registrar recursos diferenciadores sem criar um quarto sub-atributo fixo — que teria que ser reproduzido em todo campo do modelo para ser consistente, o que é exatamente a complexidade que este documento evita.

Cada dado desta camada segue a Convenção de Fontes e Confiabilidade definida no início deste documento.

Campos genéricos.

Material

Peso

Dimensões

Cor

Voltagem

Consumo

Garantia

Assistência Técnica

Certificações

Origem

---

Campos específicos dependerão da categoria.

Exemplo.

Máquinas.

Motor

RPM

Bateria

Autonomia

Tempo de carga

Lâmina

Ruído

Vibração

Comprimento de corte

---

Tesouras.

Tipo de fio

Aço

Polegadas

Parafuso

Ergonomia

Canhota

---

Cosméticos.

Volume

Fragrância

Ingredientes

Ativos

Registro

Validade

Tipo de embalagem

---

Mobiliário.

Material

Estrutura

Capacidade

Revestimento

Regulagens

Peso suportado

---

Softwares.

Plataforma

Plano

Integrações

Aplicativo

API

Idioma

Suporte

---

# CAMADA 4

# Contexto de Uso

Responde.

"Em qual cenário este produto foi desenvolvido?"

Campos.

Ambiente

Domiciliar

Profissional

Premium

Escola

Uso

Eventual

Diário

Intensivo

Especializado

Finalidade

Corte

Fade

Acabamento

Barba

Bigode

Lavagem

Gestão

Marketing

Treinamento

# Citações Literais e Idioma Original

Sempre que um campo desta camada vier de uma declaração textual do fabricante ou distribuidor (não de uma especificação numérica), ela deve ser registrada como citação literal, preservando:

- Idioma Original (o idioma em que a fonte publicou o texto)
- Texto Original (a frase exata, sem tradução)
- Tradução (se o idioma original não for português, uma tradução da IA, claramente rotulada como tradução — não como texto oficial)
- Fonte (a mesma citação de origem já usada em todo o documento)

Isso preserva o texto exato mesmo quando o fabricante for japonês, alemão, italiano etc., e evita que uma tradução imprecisa da IA seja lida como se fosse a declaração original do fabricante. Esta estrutura se aplica apenas a citações literais (aqui e na Camada 6) — não a campos numéricos ou categóricos, que não têm "idioma" a preservar.

---

# CAMADA 5

# Compatibilidade

Esta é a principal camada da Academia.

Ela responde.

"Para quem este produto faz sentido?"

Campos.

Perfil profissional

Iniciante

Intermediário

Profissional

Especialista

---

Porte da Barbearia

Autônomo

Pequena

Média

Grande

Rede

---

Fluxo diário

Até 10 clientes

10 a 25

25 a 50

Acima de 50

---

Faixa de investimento

Entrada

Intermediário

Premium

Luxo

---

Compatibilidades

Fade

Corte clássico

Acabamento

Uso contínuo

Alta precisão

Alta produtividade

Mobilidade

Viagens

---

Restrições

Não indicado para.

---

# CAMADA 6

# Evidências

Esta camada reúne informações encontradas durante a pesquisa.

Nunca substituirá dados técnicos.

Origens aceitas.

Fabricantes

Assistências Técnicas

Fóruns

Reddit

YouTube

Especialistas

Artigos

Relatos Profissionais

Campos.

Problemas recorrentes

Elogios recorrentes

Facilidade de manutenção

Disponibilidade de peças

Durabilidade percebida

Qualidade percebida

Confiabilidade

---

Cada evidência deverá possuir.

Fonte

Data

Confiabilidade (calculada pela Convenção de Fontes e Confiabilidade — nunca uma nota livre)

Resumo (quando for citação literal de uma fonte em outro idioma, aplicar a estrutura de Citações Literais e Idioma Original da Camada 4: Idioma Original, Texto Original, Tradução)

Link

---

# CAMADA 7

# Inteligência da Academia

Esta camada representa o patrimônio intelectual da Academia.

Jamais copiar opiniões externas.

Campos.

Resumo Técnico

Conclusão

Produto indicado para

Produto não indicado para

Principais vantagens

Principais limitações

Quando comprar

Quando não comprar

Melhor alternativa

Produtos concorrentes

Posicionamento da Academia

Nota Técnica

Grau de recomendação

---

# CAMADA 8

# Informações Comerciais

Esta camada poderá variar ao longo do tempo.

Preço mínimo encontrado

Preço médio

Preço máximo

Última pesquisa

Lojas monitoradas

Marketplace

Cupom

Programa de afiliados

Disponibilidade

---

Esses dados não alteram a avaliação técnica.

---

# CAMADA 9

# Controle Editorial

Responsável pela governança do conhecimento.

Campos.

Data do cadastro

Última revisão

Responsável

IA responsável

Versão

Status

Em revisão

Publicado

Arquivado

Necessita atualização

Fontes consultadas

Observações

Registro de Conflitos

---

# Sobre o Registro de Conflitos

Estrutura para registrar, de forma auditável, qualquer conflito encontrado durante a pesquisa — em vez de descrevê-lo apenas em prosa solta dentro de "Observações". Cada conflito registrado deve conter:

- Campo afetado (ex.: Peso, RPM, SKU, Garantia).
- Tipo de conflito — usar sempre uma destas cinco categorias:
  - Divergência entre fontes (duas fontes afirmam valores diferentes para o mesmo dado, no mesmo escopo).
  - Escopo diferente (os valores parecem divergir, mas medem coisas diferentes — ex.: peso líquido × peso com embalagem).
  - Mercado diferente (os valores divergem porque se referem a regiões/mercados distintos, não a um erro).
  - Versão diferente (os valores se referem a gerações ou variantes diferentes do produto).
  - Informação não confirmada (o dado apareceu em apenas uma fonte de baixa confiabilidade, ou só em resumo de busca, sem confirmação por acesso direto).
- Valores e fontes envolvidos (cada valor com sua origem, tipo de fonte e link).
- Recomendação (ex.: "aguardando confirmação humana", "priorizar fonte primária quando publicada").

Um conflito registrado nunca é resolvido escolhendo um valor sem justificativa — resolvê-lo é trabalho de revisão humana ou da IA Academia, nunca da IA Pesquisadora.

---

# Sobre o Diário de Pesquisa (artefato condicional, não obrigatório por padrão)

Para a maioria dos produtos, os campos desta Camada 9 (Fontes consultadas, Observações, Registro de Conflitos) já bastam como trilha de auditoria. Um `DIARIO_DE_PESQUISA.md` separado — narrando o que foi pesquisado, quais fontes foram abertas, quais decisões foram tomadas e quais dúvidas permaneceram — só deve ser gerado quando a pesquisa não for trivial. Isso significa: houve pelo menos um item no Registro de Conflitos, uma ambiguidade de identificação precisou ser resolvida (com o usuário ou documentando variantes), ou o produto exigiu mais de uma rodada de pesquisa.

Gerar esse diário para todo produto, mesmo os simples e sem pendência, foi avaliado e recusado: multiplicaria o número de arquivos por produto sem ganho de auditoria proporcional, já que um cadastro limpo não tem o que auditar além do que a Camada 9 já registra. O gatilho exato e o formato mínimo deste diário estão definidos em `PROMPT_IA_PESQUISADORA.md`.

---

# Campos Obrigatórios

Sem estes campos o produto não poderá ser publicado.

Nome

Marca

Modelo

Categoria

Subcategoria

Contexto

Compatibilidade

Conclusão da Academia

Fontes

Última revisão

---

# Campos Recomendados

Sempre que possível deverão existir.

Especificações completas

Problemas recorrentes

Produtos concorrentes

Alternativas

Preço médio

Assistência

Garantia

---

# Campos Opcionais

Dependem da categoria.

RPM

Bateria

Lâmina

Ingredientes

API

Material

Estrutura

Regulagens

Aplicativo

---

# Fluxo de Produção

Toda informação deverá seguir esta sequência.

Pesquisa

↓

Estruturação dos Dados

↓

Validação

↓

Classificação

↓

Análise

↓

Conclusão da Academia

↓

Publicação

---

# Relação com os demais documentos

FRAMEWORK_CLASSIFICACAO.md

Define como classificar.

---

TAXONOMIA_DOS_PRODUTOS.md

Define onde o produto pertence.

---

FRAMEWORK_AVALIACAO_DE_PRODUTOS.md

Define como avaliar.

---

PROCESSO_DE_ANALISE.md

Define como produzir conhecimento.

---

# Regra de Ouro

Nenhuma Inteligência Artificial deverá produzir textos livres.

Toda IA deverá primeiro preencher integralmente este Modelo de Dados.

Somente após sua validação poderão ser gerados:

- Reviews;
- Comparativos;
- Artigos;
- Academia Recomenda;
- Newsletter;
- Conteúdo para Redes Sociais.

---

# Histórico de Revisão

**v1.3** — Após a segunda rodada de teste real (produtos "Wahl Senior Cordless" clássico e "Senior 2.0"), incorporadas as seguintes decisões, detalhadas em `08_INTELIGENCIA_ARTIFICIAL/REVISOES/RELATORIO_REVISAO_V3.md`: Convenção de Fontes e Confiabilidade (enumeração fechada de origem + confiabilidade calculada, nunca estrelas atribuídas livremente); Produtos Relacionados como fato sourciável, com "Concorrentes" explicitamente excluído por já pertencer à Camada 7; Citações Literais e Idioma Original, escopado às Camadas 4 e 6; campo de Observação livre em qualquer campo da Camada 3, em vez de novos sub-atributos fixos por tipo de componente; Diário de Pesquisa como artefato condicional, não obrigatório para todo produto.

**v1.4** — Formalizado o ID Interno da Academia (Camada 1) — campo já listado desde a v1.0 mas nunca definido. Passa a ter formato, regra de atribuição (no momento de entrada na Base de Conhecimento) e imutabilidade explícitos, em decorrência da criação de `08_INTELIGENCIA_ARTIFICIAL/BASE_DE_CONHECIMENTO/`. Ver `08_INTELIGENCIA_ARTIFICIAL/REVISOES/RELATORIO_REVISAO_V4.md`.

**v1.3** — Convenção de Fontes e Confiabilidade calculada, Produtos Relacionados factuais (Camada 2), Observação livre (Camada 3), Citações Literais e Idioma Original (Camadas 4 e 6), Diário de Pesquisa condicional.

**v1.2** — Adicionado o Registro de Conflitos (Camada 9) e a regra de sub-atributos nomeados escopada a Motor, Peso, Voltagem e Garantia.

**v1.1** — Adicionado o campo SKU/Part Number do Fabricante à Camada 1.

**v1.0** — Versão inicial.

---

# Missão Final

O Modelo de Dados do Produto representa a estrutura oficial de conhecimento da Academia da Barbearia.

Ele garante que todos os produtos sejam descritos de maneira uniforme, verificável e reutilizável, permitindo que diferentes Inteligências Artificiais compartilhem a mesma base de conhecimento e produzam análises consistentes, imparciais e orientadas à tomada de decisão.

---

**Fim do Documento**