# ORDEM_DE_REVISAO_V1.md

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Origem:** Teste real da IA Pesquisadora com o produto "Wahl Senior Cordless"

**Status:** Ordem de Revisão — escopo fechado

---

# Objetivo

Após testar a IA Pesquisadora com o produto Wahl Senior Cordless, foram identificadas oportunidades reais de melhoria na documentação.

O objetivo desta tarefa **não é reescrever a arquitetura**. É apenas corrigir lacunas identificadas durante o primeiro teste real.

---

# Documentos Autorizados para Alteração

- `MODELO_DE_DADOS_DO_PRODUTO.md`
- `PROMPT_IA_PESQUISADORA.md`
- `CRITERIOS_DE_AVALIACAO/MAQUINAS.md`

Nenhum outro documento deverá ser alterado nesta ordem.

---

# 1. MODELO_DE_DADOS_DO_PRODUTO.md

Revisar o modelo para suportar situações reais encontradas durante a pesquisa.

## a) Identificação regional

Permitir registrar informações específicas por mercado quando existirem diferenças legítimas (ex.: SKU Brasil, SKU EUA, SKU Europa, SKU Canadá), sem obrigar um único SKU.

## b) Registro de conflitos

Criar uma estrutura para registrar conflitos encontrados durante a pesquisa. Exemplos: divergência entre fontes, escopo diferente (peso líquido × peso com embalagem), mercado diferente, versão diferente, informação não confirmada.

## c) Estrutura dos campos

Sempre que possível, separar: Tipo, Modelo, Valor, Unidade, Mercado, Fonte.

Exemplo — Motor: Tipo: Rotativo · Modelo: V9000.

---

# 2. PROMPT_IA_PESQUISADORA.md

Formalizar regras que surgiram durante o teste.

## Fonte confirmada vs. fonte não verificada

Sempre distinguir informação confirmada por acesso direto à fonte de informação encontrada apenas em resumo de busca. Jamais tratar as duas como equivalentes.

## Ambiguidade

Quando existirem diferentes versões do produto, jamais escolher uma sozinho. Solicitar esclarecimento ao usuário.

Exemplo: "Wahl Senior Cordless" → existem múltiplas versões → escolha qual deseja pesquisar.

## Conflitos

Quando existirem conflitos entre fontes, jamais escolher um valor. Registrar.

---

# 3. CRITERIOS_DE_AVALIACAO/MAQUINAS.md

Realizar pequenos ajustes metodológicos.

## Contexto Declarado

A IA Pesquisadora jamais poderá concluir. Ela apenas registra aquilo que encontrou.

## Cobertura da Taxonomia

Cobrir também Máquinas Corporais e Máquinas para Nariz e Orelha.

## Aplicabilidade

Sempre deixar claro para quais subcategorias determinado critério se aplica.

---

# Não Alterar

Não alterar: Arquitetura das IAs, Framework de Avaliação, Framework de Classificação, Taxonomia, Processo de Análise, Fontes de Dados, nem qualquer um dos demais documentos da IA Pesquisadora (`IA_PESQUISADORA.md`, `GUIA_DE_UTILIZACAO.md`, `CASOS_DE_TESTE.md`, `LIMITACOES.md`, `RELATORIO_FINAL.md`).

---

# Instrução de Revisão Crítica

Questione as sugestões acima. Não as implemente automaticamente.

Antes de alterar qualquer documento, avalie criticamente se a mudança realmente melhora a arquitetura da Academia.

Caso alguma sugestão introduza complexidade desnecessária, proponha uma alternativa mais simples e justifique tecnicamente sua decisão.

Caso alguma sugestão já esteja resolvida em uma versão anterior do documento, declare isso explicitamente em vez de reimplementá-la.

O executor desta ordem atua como arquiteto revisor, não como executor automático.

---

# Entrega Obrigatória

Ao final, gerar `RELATORIO_REVISAO_V2.md`, respondendo obrigatoriamente:

1. Quais alterações foram realizadas?
2. Qual problema cada alteração resolveu?
3. Alguma alteração proposta foi recusada? Por quê?
4. A documentação continua compatível com toda a arquitetura da Academia?
5. Existem novas oportunidades de melhoria identificadas durante a revisão?

---

**Fim do Documento**
