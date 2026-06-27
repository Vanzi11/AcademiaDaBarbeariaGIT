# BANCO_EDITORIAL.md

---

# Camada 0 — Controle do Documento

| Campo | Informação |
|---|---|
| **Nome** | Banco Editorial da Academia da Barbearia |
| **Código** | AB-BE-001 |
| **Versão** | 1.0 |
| **Status** | Aprovado — Versão Oficial |
| **Responsável** | Academia da Barbearia — Departamento Editorial |
| **Última revisão** | V1.0 |
| **Próxima revisão** | Após crescimento significativo do acervo ou revisão estrutural |
| **Escopo** | Todos os produtos editoriais da Academia da Barbearia |

## Histórico de Versões

| Versão | Alterações principais |
|---|---|
| 0.1 | Arquitetura inicial, 4 grupos, 16 categorias, padrões, fluxo e governança |
| 1.0 | Ciclo de Vida do Ativo, elevação dos 4 ativos fundadores ao padrão de excelência |

## Dependências

Este documento complementa, mas não substitui:

| Documento | Função |
|---|---|
| 000_AI_CONTEXT.md | Contexto institucional |
| BRIEFING_EDITORIAL_MASTER.md | Diretrizes editoriais e critérios de qualidade |
| ARQUITETURA_CAPITULOS.md | Estrutura oficial dos capítulos |

---

# Declaração de Propósito

O Banco Editorial é o repositório estratégico de ativos editoriais reutilizáveis da Academia da Barbearia.

Seu objetivo é reduzir retrabalho, aumentar a consistência e acelerar a produção de todos os materiais da Academia — livros, guias, checklists, planners, cursos, templates e demais produtos.

Este documento **não é** um guia de como escrever.
Este documento **não é** um briefing de produto.
Este documento **é** um repositório de ativos prontos para uso e adaptação.

Todo ativo armazenado aqui deve ser:

- Reutilizável em múltiplos produtos.
- Consistente com a filosofia da Academia.
- Adaptável sem perder sua essência.
- Atemporal o suficiente para permanecer útil por anos.

---

# Escopo

Este banco **cobre:**

- Modelos estruturais de ativos editoriais.
- Padrões de uso de cada tipo de ativo.
- Sistema de catalogação e governança.
- Fluxo de consulta e registro de novos ativos.
- Ciclo de vida de cada ativo.

Este banco **não cobre:**

- Diretrizes de escrita (→ BRIEFING_EDITORIAL_MASTER.md).
- Estrutura de capítulos (→ ARQUITETURA_CAPITULOS.md).
- Identidade visual ou design (→ documentos específicos).
- Estratégia comercial ou marketing.

**Nota de escalabilidade:**
Quando o acervo de ativos superar 50 itens por categoria, recomenda-se migrar os ativos para arquivos individuais em uma pasta `/ATIVOS/`, mantendo este documento como índice e manual de uso. Esta transição já está prevista na arquitetura.

---

# Parte I — Arquitetura do Banco

## Categorias Oficiais

O Banco Editorial é organizado em quatro grandes grupos, estruturados por finalidade:

---

### Grupo A — Narrativos
Ativos que constroem contexto, engajamento e identificação.

| Código-base | Categoria | Função principal |
|---|---|---|
| BE-NA | Histórias | Criar identificação emocional com o leitor |
| BE-NC | Estudos de Caso | Demonstrar aplicação real de conceitos |
| BE-NE | Exemplos | Tornar conceitos abstratos concretos |
| BE-NM | Metáforas | Explicar o complexo por meio do familiar |
| BE-NA2 | Analogias | Conectar o novo ao que o leitor já conhece |

---

### Grupo B — Conceituais
Ativos que fundamentam e ampliam o conhecimento.

| Código-base | Categoria | Função principal |
|---|---|---|
| BE-CC | Citações | Reforçar ideias com autoridade externa |
| BE-CD | Dados e Estatísticas | Fundamentar afirmações com evidências |
| BE-CU | Curiosidades | Ampliar contexto e despertar interesse |
| BE-CF | Frameworks | Organizar raciocínio em estruturas replicáveis |
| BE-CP | Perguntas Poderosas | Provocar reflexão e autodiagnóstico |

---

### Grupo C — Operacionais
Ativos que conduzem o leitor à ação.

| Código-base | Categoria | Função principal |
|---|---|---|
| BE-OC | Checklists | Transformar conhecimento em ação verificável |
| BE-OM | Missões | Atividades práticas de implementação imediata |
| BE-OE | Exercícios | Atividades de fixação e desenvolvimento |
| BE-OF | Ferramentas | Recursos externos recomendados |
| BE-OM2 | Modelos e Templates | Estruturas prontas para preenchimento |

---

### Grupo D — Editoriais
Ativos que organizam e estruturam a experiência de leitura.

| Código-base | Categoria | Função principal |
|---|---|---|
| BE-DQ | Quadros de Destaque | Destacar conceitos-chave |
| BE-DD | Dicas Rápidas | Boas práticas de aplicação imediata |
| BE-DA | Alertas e Atenções | Sinalizar riscos e erros críticos |
| BE-DT | Frases de Transição | Conectar seções com fluidez |
| BE-DR | Resumos | Condensar o essencial ao final de seções |

---

**Nota sobre expansão futura:**
Está previsto um Grupo E — Visuais, para armazenar infográficos, diagramas, fluxogramas, wireframes e fotografias padrão. Será criado quando houver volume suficiente de ativos visuais para justificar a categoria.

---

## Sistema de Catalogação

Todo ativo registrado no banco recebe um código único.

**Estrutura do código:**

```
[GRUPO]-[CATEGORIA]-[NÚMERO SEQUENCIAL]

Exemplos:
BE-NC-001   → Estudo de Caso número 001
BE-CC-003   → Citação número 003
BE-OC-012   → Checklist número 012
BE-DQ-007   → Quadro de Destaque número 007
```

**Regras:**
- Numeração sequencial dentro de cada categoria.
- Nunca reutilizar um código, mesmo que o ativo seja descontinuado.
- Ativos descontinuados recebem status "Arquivado" — nunca são excluídos.

---

# Parte II — Padrões por Categoria

*Para cada categoria: objetivo, quando usar, quando não usar, estrutura padrão e regras de escrita.*

---

## GRUPO A — NARRATIVOS

---

### BE-NA — Histórias

**Objetivo:**
Criar identificação emocional entre o leitor e o conteúdo por meio de situações reconhecíveis do universo da barbearia.

**Quando usar:**
- Na abertura de capítulos.
- Para introduzir um problema real antes de apresentar a solução.
- Quando o conteúdo for abstrato e precisar de ancoragem emocional.

**Quando NÃO usar:**
- Como substituto de conteúdo técnico.
- Em excesso — máximo uma história por capítulo.
- Para preencher páginas artificialmente.

**Estrutura padrão:**

```
Personagem (barbeiro reconhecível pelo leitor)
↓
Situação inicial (contexto do problema)
↓
Conflito (o que deu errado ou o que falta)
↓
Virada (decisão ou descoberta)
↓
Resultado (transformação concreta)
↓
Conexão com o conteúdo do capítulo
```

**Regras de escrita:**
- Personagens fictícios, baseados em perfis reais do público-alvo.
- Nunca nomear pessoas reais sem autorização.
- Evitar dramatização excessiva.
- Conexão direta com o conteúdo que segue — obrigatória.
- Extensão máxima recomendada: 200 palavras.

---

### BE-NC — Estudos de Caso

**Objetivo:**
Demonstrar a aplicação prática de um conceito por meio de um caso completo, com problema, decisão e resultado.

**Quando usar:**
- Para ilustrar a aplicação de um processo ou metodologia.
- Quando o leitor precisar ver o "antes e depois" de uma decisão.
- Para tornar conceitos complexos tangíveis.

**Quando NÃO usar:**
- No início de um capítulo (antes de apresentar os fundamentos).
- Quando o exemplo for muito distante da realidade do público-alvo.

**Estrutura padrão:**

```
Contexto (quem é, onde está, qual é a situação)
↓
Problema (o que estava errado ou faltando)
↓
Decisão (o que foi feito e por quê)
↓
Resultado (o que mudou de forma concreta)
↓
Aprendizado (o que o leitor pode extrair deste caso)
```

**Regras de escrita:**
- Casos fictícios ou compostos — nunca apresentar como real sem ser.
- Dados numéricos devem ser plausíveis, não milagrosos.
- O aprendizado deve conectar diretamente ao conteúdo do capítulo.
- Extensão máxima recomendada: 300 palavras.

---

### BE-NE — Exemplos

**Objetivo:**
Tornar um conceito abstrato concreto por meio de uma situação específica e aplicável.

**Quando usar:**
- Imediatamente após a apresentação de um conceito.
- Sempre que o leitor puder dizer "mas como isso funciona na prática?".

**Quando NÃO usar:**
- Como substituto da explicação do conceito.
- Em excesso — priorizar qualidade sobre quantidade.

**Estrutura padrão:**

```
Situação → Problema → Decisão → Resultado → Lição
```

**Regras de escrita:**
- Sempre no contexto de barbearia.
- Específico o suficiente para ser reconhecível.
- Genérico o suficiente para ser aplicável por qualquer leitor.

---

### BE-NM — Metáforas

**Objetivo:**
Explicar conceitos complexos ou abstratos por meio de comparações com situações familiares ao leitor — e fazê-lo de forma memorável, não apenas funcional.

**Quando usar:**
- Para explicar conceitos de branding, posicionamento, gestão ou experiência do cliente.
- Quando a explicação direta for insuficiente ou árida.

**Quando NÃO usar:**
- Em excesso — uma metáfora por conceito.
- Quando a comparação for forçada ou pouco familiar ao público.

**Estrutura padrão:**

```
Conceito a explicar
↓
"É como..." (comparação familiar e precisa)
↓
Desenvolvimento da comparação (imagem mental completa)
↓
Retorno ao conceito original
↓
Aplicação prática no contexto da barbearia
```

**Critério de excelência:**
Uma boa metáfora não apenas explica — ela faz o leitor pensar "nunca tinha visto assim".
Se a metáfora apenas funciona, pode melhorar.
Se a metáfora gera imagem mental e permanece na memória, está aprovada.

---

### BE-NA2 — Analogias

**Objetivo:**
Conectar um conceito novo a algo que o leitor já conhece, reduzindo a resistência ao aprendizado.

**Quando usar:**
- Para introduzir conceitos de outras áreas (marketing, administração, branding) ao universo da barbearia.

**Quando NÃO usar:**
- Quando o conceito for simples o suficiente para explicação direta.

**Estrutura padrão:**

```
Conceito novo
↓
"Funciona como..." (algo já conhecido)
↓
Pontos de contato entre os dois
↓
Diferença relevante (se houver)
↓
Aplicação no contexto da barbearia
```

---

## GRUPO B — CONCEITUAIS

---

### BE-CC — Citações

**Objetivo:**
Reforçar ideias com autoridade externa, ampliando a credibilidade do conteúdo.

**Quando usar:**
- Para complementar uma ideia já desenvolvida no texto.
- Quando a citação adicionar perspectiva, não apenas repetir.

**Quando NÃO usar:**
- Como substituto de conteúdo próprio.
- Quando a fonte não for confiável ou verificável.
- Em excesso — máximo duas citações por capítulo.

**Estrutura padrão:**

```
[Citação entre aspas]
— Nome do autor, contexto ou obra
Conexão com o conteúdo do capítulo (1-2 frases)
```

**Regras de escrita:**
- Apenas citações verificáveis.
- Nunca atribuir citações sem certeza da autoria.
- A conexão com o conteúdo é obrigatória — citação solta é proibida.

---

### BE-CD — Dados e Estatísticas

**Objetivo:**
Fundamentar afirmações com evidências quantitativas, elevando a credibilidade do conteúdo.

**Quando usar:**
- Para demonstrar a dimensão de um problema ou oportunidade.
- Quando o dado for relevante para a decisão do leitor.

**Quando NÃO usar:**
- Dados sem fonte verificável.
- Dados desatualizados (mais de 5 anos, salvo contexto histórico).
- Como preenchimento artificial.

**Estrutura padrão:**

```
Dado ou estatística
Fonte e ano
Interpretação aplicada ao contexto da barbearia
```

**Regras:** Sempre indicar fonte e ano. Nunca inventar ou aproximar dados.

---

### BE-CU — Curiosidades

**Objetivo:**
Ampliar o contexto, despertar interesse e oferecer informação complementar de forma leve.

**Estrutura padrão:**

```
Contexto (por que isso é relevante)
↓
Fato ou informação
↓
Aplicação ou reflexão prática
```

**Regras:** Extensão máxima 80 palavras. Sempre verificável. Sempre com conexão ao tema.

---

### BE-CF — Frameworks

**Objetivo:**
Oferecer estruturas de raciocínio replicáveis que o leitor possa aplicar em diferentes situações.

**Estrutura padrão:**

```
Nome do framework
Objetivo
Componentes (com explicação de cada um)
Como aplicar (passo a passo)
Exemplo de uso no contexto da barbearia
```

---

### BE-CP — Perguntas Poderosas

**Objetivo:**
Provocar reflexão genuína, autodiagnóstico e tomada de decisão no leitor — não apenas questionar, mas deslocar o ponto de vista.

**Quando usar:**
- No início de seções, para ativar o engajamento.
- Após apresentar um conceito, para estimular aplicação pessoal.
- Nas Missões, para orientar a reflexão.

**Quando NÃO usar:**
- Em excesso — máximo três perguntas por seção.
- Perguntas retóricas sem conexão com ação concreta.

**Estrutura padrão:**

```
Pergunta direta, específica e desafiadora
(opcional) Direcionamento: "Pense em..."
(opcional) Espaço para resposta ou reflexão
```

**Critério de excelência:**
Uma pergunta poderosa não pergunta — ela obriga o leitor a parar.
Se o leitor pode responder imediatamente sem pensar, a pergunta pode ser mais profunda.

---

## GRUPO C — OPERACIONAIS

---

### BE-OC — Checklists

**Objetivo:**
Transformar o conteúdo de um capítulo em ações verificáveis e executáveis.

**Estrutura padrão:**

```
Título do Checklist
Objetivo (o que o leitor estará verificando)
─────────────────────────
□ [Verbo no passado] + [ação específica e observável]
□ [Verbo no passado] + [ação específica e observável]
─────────────────────────
Critério de conclusão: [como saber que está completo]
```

**Regras:**
- Itens verificáveis — ação observável, não intenção.
- Ordem lógica de execução.
- Nenhum item subjetivo.
- Máximo recomendado: 15 itens.

---

### BE-OM — Missões

**Objetivo:**
Conduzir o leitor a implementar imediatamente o conteúdo por meio de atividade prática estruturada.

**Estrutura padrão:**

```
MISSÃO [número] — [Título]
─────────────────────────
Objetivo:
Tempo estimado:
Materiais necessários:
─────────────────────────
PASSOS:
1.
2.
3.
─────────────────────────
Resultado esperado:
Critério de conclusão:
```

---

### BE-OE — Exercícios

**Objetivo:**
Promover fixação e desenvolvimento de habilidades por prática deliberada.

**Diferença em relação à Missão:**
Missão = implantação na barbearia.
Exercício = desenvolvimento de habilidade ou raciocínio.

**Estrutura padrão:**

```
EXERCÍCIO — [Título]
─────────────────────────
Objetivo:
Tempo estimado:
─────────────────────────
[Enunciado]
[Instruções passo a passo]
─────────────────────────
Critério de avaliação:
```

---

### BE-OF — Ferramentas

**Estrutura padrão:**

```
Nome da ferramenta
Tipo: [Aplicativo / Site / Modelo / Plugin / IA]
Plataforma: [iOS / Android / Web / Desktop]
Custo: [Gratuito / Freemium / Pago]
Para que serve:
Como usar no contexto da barbearia:
Onde encontrar:
```

---

### BE-OM2 — Modelos e Templates

**Estrutura padrão:**

```
Nome do modelo
Objetivo
Para quem é indicado
─────────────────────────
[Estrutura com campos para preenchimento]
─────────────────────────
Instruções de uso
Exemplo preenchido (quando aplicável)
```

---

## GRUPO D — EDITORIAIS

---

### BE-DQ — Quadros de Destaque

**Objetivo:** Destacar o conceito mais importante de uma seção — aquele que o leitor não pode deixar de reter.

**Quando NÃO usar:** Em excesso. Máximo um por seção.

**Estrutura padrão:**

```
┌─────────────────────────────────┐
│  [Conceito em uma ou duas       │
│   frases diretas e impactantes] │
└─────────────────────────────────┘
```

---

### BE-DD — Dicas Rápidas

**Estrutura padrão:**

```
💡 DICA RÁPIDA
[Dica em 1-3 frases. Direta. Aplicável hoje.]
```

---

### BE-DA — Alertas e Atenções

**Estrutura padrão:**

```
⚠️ ATENÇÃO
[Descrição do risco ou erro.]
[Consequência se ignorado.]
[Como evitar, em uma linha.]
```

**Regra:** Usar apenas para riscos genuinamente críticos. Em excesso, perde credibilidade.

---

### BE-DT — Frases de Transição

**Objetivo:** Conectar seções e capítulos com fluidez, evitando rupturas na experiência de leitura.

**Estrutura padrão:**

```
[Síntese do que acabou de ser tratado] +
[Ponte para o próximo tema] +
[Motivo pelo qual o próximo tema importa agora]
```

---

### BE-DR — Resumos

**Estrutura padrão:**

```
RESUMO DO CAPÍTULO [número]
─────────────────────────
Neste capítulo você aprendeu que:

• [Ponto essencial]
• [Ponto essencial]
...até 10 pontos
─────────────────────────
Conceito central: [Uma frase que resume tudo]
```

---

# Parte III — Fluxo de Uso do Banco

---

```
ANTES DE ESCREVER
↓
1. Identificar quais categorias de ativos o capítulo exige.
   (Toda abertura exige BE-NA ou BE-NE.
    Todo capítulo exige BE-OC, BE-OM e BE-DR.)
↓
2. Consultar o banco para verificar ativos já existentes reutilizáveis.
↓
3. Selecionar e adaptar os ativos ao contexto do capítulo.

DURANTE A ESCRITA
↓
4. Inserir os ativos nos momentos corretos da arquitetura.
↓
5. Verificar que cada ativo segue o padrão da sua categoria.

APÓS A ESCRITA
↓
6. Identificar novos ativos criados que possam ser reutilizados.
↓
7. Registrar novos ativos seguindo o fluxo de governança (Parte IV).
```

---

# Parte IV — Governança do Banco

---

## Ciclo de Vida do Ativo

Todo ativo percorre as seguintes etapas desde sua criação até eventual arquivamento:

```
IDEIA
(ativo identificado durante produção de conteúdo)
↓
RASCUNHO
(ativo escrito, ainda não revisado)
↓
EM REVISÃO
(ativo submetido ao Departamento Editorial)
↓
APROVADO
(ativo validado e catalogado com código oficial)
↓
EM USO
(ativo inserido em um ou mais produtos da Academia)
↓
EM REVISÃO PERIÓDICA
(ativo avaliado após 12 meses ou quando o contexto mudar)
↓
ARQUIVADO
(ativo descontinuado — preservado no banco, nunca excluído)
```

**Regra:** Nenhum ativo passa de Rascunho para Em Uso sem aprovação formal.
**Regra:** Ativos Arquivados mantêm seu código e registro histórico intactos.

---

## Critérios de Aprovação

Um ativo somente pode ser registrado quando cumprir todos os critérios:

- [ ] **Reutilizável** — pode ser adaptado para outros produtos sem perder valor.
- [ ] **Claro** — qualquer colaborador entende sem explicação adicional.
- [ ] **Coerente** — alinhado com a filosofia e o tom de voz da Academia.
- [ ] **Aplicável** — gera valor direto ao leitor final.
- [ ] **Atemporal** — permanece útil por pelo menos dois anos.
- [ ] **Consistente** — não contradiz outros ativos ou documentos da Academia.
- [ ] **Catalogado** — possui código único conforme sistema oficial.

---

## Fluxo de Registro de Novo Ativo

```
Identificação do novo ativo durante produção
↓
Verificar se já existe ativo similar no banco
↓
Se sim: avaliar se é duplicata ou variação legítima
↓
Se não: preencher o registro completo
↓
Atribuir código único
↓
Submeter para revisão
↓
Aprovação → Inserção no banco com status "Aprovado"
```

## Registro Padrão de um Novo Ativo

```
Código: [BE-XX-000]
Categoria: [nome da categoria]
Título: [nome do ativo]
Versão: [1.0]
Status: [Rascunho / Em Revisão / Aprovado / Em Uso / Arquivado]
Produto de origem: [onde foi criado]
Data de criação: [—]
Última revisão: [—]
Descrição: [o que é e para que serve]
Conteúdo: [o ativo completo]
Observações: [restrições ou contexto de uso]
```

## Regras de Versionamento

| Situação | Ação |
|---|---|
| Ajuste de linguagem | Versão 1.x |
| Reestruturação do ativo | Versão 2.0 |
| Ativo sem utilidade | Status "Arquivado" — nunca excluir |
| Duplicata identificada | Mesclar e arquivar a versão inferior |

## Autorização por Tipo de Ação

| Ação | Autorização |
|---|---|
| Consultar e utilizar ativos | Qualquer colaborador ou IA autorizada |
| Propor novo ativo | Qualquer colaborador — sujeito à aprovação |
| Aprovar novo ativo | Departamento Editorial da Academia |
| Alterar estrutura de categoria | Somente revisão editorial oficial |
| Arquivar ativo | Somente revisão editorial oficial |

---

# Parte V — Ativos Fundadores

*Quatro ativos criados como padrão de excelência editorial da Academia.*
*Estes ativos definem o nível de qualidade esperado de todo o banco.*

---

## BE-NM-001 — A Assinatura da Marca

**Código:** BE-NM-001
**Categoria:** Metáforas
**Versão:** 1.0
**Status:** Aprovado
**Produto de origem:** Guia da Identidade da Barbearia

**Conteúdo:**

> A identidade de uma barbearia é como a assinatura de uma pessoa.
>
> Antes mesmo de alguém ouvir sua voz, sua assinatura já comunica quem você é.
> Uma assinatura confusa gera desconfiança.
> Uma assinatura consistente transmite personalidade.
> Uma assinatura elegante comunica cuidado.
>
> Com uma marca acontece exatamente a mesma coisa.
> O cliente lê sua barbearia antes de entrar.
> Antes de sentar.
> Antes de qualquer palavra ser dita.
>
> A pergunta não é se você tem uma identidade.
> A pergunta é: o que ela está comunicando?

**Aplicação:** Capítulo 1 — Abertura ou seção "Por que isso importa".
**Observações:** Funciona especialmente bem em aberturas de capítulo, antes de qualquer conceito ser apresentado.

---

## BE-CP-001 — A Pergunta da Fachada Invisível

**Código:** BE-CP-001
**Categoria:** Perguntas Poderosas
**Versão:** 1.0
**Status:** Aprovado
**Produto de origem:** Guia da Identidade da Barbearia

**Conteúdo:**

> Imagine que sua fachada desapareceu.
> Seu logotipo também.
> Nenhum cliente pode ver fotos da sua barbearia.
> Nenhuma avaliação online. Nenhuma indicação de amigo.
>
> Um desconhecido precisa decidir, neste momento, se sua barbearia merece uma chance.
>
> O que ele encontraria que o faria dizer sim?

**Aplicação:** Capítulo 2 — Introdução à seção de Posicionamento ou Identidade.
**Observações:** Usar antes de apresentar o conceito de posicionamento. A pergunta cria o problema que o conteúdo resolve.

---

## BE-DA-001 — O Custo da Incoerência

**Código:** BE-DA-001
**Categoria:** Alertas e Atenções
**Versão:** 1.0
**Status:** Aprovado
**Produto de origem:** Guia da Identidade da Barbearia

**Conteúdo:**

> ⚠️ ATENÇÃO
>
> Muitas barbearias investem milhares de reais em identidade visual impecável.
> Depois perdem clientes porque o café estava frio, o atendimento era apressado ou a recepção parecia improvisada.
>
> O cliente não compra aparência.
> Ele compra coerência.
>
> Uma marca forte com experiência fraca não fideliza — ela decepciona com mais precisão.

**Aplicação:** Capítulo 4 ou 7 — Seção de erros comuns ou transição entre identidade visual e experiência do cliente.
**Observações:** Especialmente eficaz como ponte entre os temas de identidade visual e atendimento.

---

## BE-DT-001 — Transição Fundamentos → Aplicação

**Código:** BE-DT-001
**Categoria:** Frases de Transição
**Versão:** 1.0
**Status:** Aprovado
**Produto de origem:** Uso geral — todos os produtos

**Conteúdo:**

> Agora que você compreende os fundamentos, começa a parte que realmente transforma uma barbearia.
> Não a teoria — a decisão.
> O que você vai fazer com esse conhecimento a partir de hoje?

**Aplicação:** Transição entre as seções "Fundamentos" e "Aplicação Prática" de qualquer capítulo.
**Observações:** Pode ser adaptado substituindo "fundamentos" pelo tema específico do capítulo.

---

# Status do Banco

| Item | Status |
|---|---|
| Arquitetura de categorias (4 grupos, 16 categorias) | ✅ Concluído |
| Sistema de catalogação | ✅ Concluído |
| Padrões por categoria | ✅ Concluído |
| Fluxo de uso | ✅ Concluído |
| Ciclo de Vida do Ativo | ✅ Concluído |
| Governança completa | ✅ Concluído |
| Ativos fundadores (4) | ✅ Concluído |
| Expansão contínua do acervo | 🔄 Em andamento permanente |

---

Fim do documento.
**Versão 1.0 — Aprovada. Congelada.**