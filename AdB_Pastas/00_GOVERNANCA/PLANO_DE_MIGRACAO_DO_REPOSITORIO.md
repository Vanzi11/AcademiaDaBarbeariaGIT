# PLANO_DE_MIGRACAO_DO_REPOSITORIO.md

**Projeto:** Academia da Barbearia

**Documento:** Plano Oficial de Migração do Repositório

**Versão:** 1.0

**Status:** Em Execução

---

# Objetivo

Este documento descreve a migração da estrutura atual do repositório para a arquitetura oficial definida em `ARQUITETURA_DO_REPOSITORIO.md`.

Seu objetivo é orientar a reorganização técnica do GitHub de forma controlada, auditável e reversível.

Nenhuma reorganização deverá ser executada sem seguir este plano.

---

# Princípios

Durante a migração deverão ser preservados:

* histórico do Git;
* links entre documentos;
* patrimônio intelectual;
* versões anteriores;
* integridade dos arquivos.

Nenhum documento deverá ser excluído sem decisão explícita.

Sempre preferir mover ou arquivar.

---

# Ordem de Execução

A migração deverá seguir exatamente esta sequência.

## Etapa 1

Criar toda a nova estrutura de pastas.

Nenhum arquivo será movido nesta etapa.

---

## Etapa 2

Migrar os documentos institucionais.

---

## Etapa 3

Migrar metodologias.

---

## Etapa 4

Migrar produtos.

---

## Etapa 5

Migrar departamentos.

---

## Etapa 6

Atualizar referências internas.

---

## Etapa 7

Atualizar READMEs.

---

## Etapa 8

Executar auditoria final.

---

# Matriz de Migração

Cada linha representa uma decisão arquitetural.

| Documento Atual                         | Novo Local                 | Ação      | Motivo                         |
| --------------------------------------- | -------------------------- | --------- | ------------------------------ |
| CONSTITUICAO_DA_ACADEMIA.md             | 00_GOVERNANCA              | Manter    | Documento institucional máximo |
| MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md | 00_GOVERNANCA              | Manter    | Governa todas as IAs           |
| ARQUITETURA_DO_REPOSITORIO.md           | 00_GOVERNANCA              | Manter    | Governa o GitHub               |
| FRAMEWORK_FDP_AB.md                     | 02_METODOLOGIA             | Mover     | Metodologia proprietária       |
| Produtos                                | 03_PRODUTOS                | Organizar | Separação por produto          |
| Guias Editoriais                        | 04_EDITORIAL               | Mover     | Responsabilidade editorial     |
| Identidade Visual                       | 05_DESIGN                  | Mover     | Responsabilidade visual        |
| Arquitetura do Site                     | 06_PORTAL                  | Mover     | Desenvolvimento do portal      |
| Marketing                               | 07_MARKETING               | Mover     | Crescimento e audiência        |
| Projetos de IA                          | 08_INTELIGENCIA_ARTIFICIAL | Mover     | Desenvolvimento tecnológico    |
| Procedimentos internos                  | 09_OPERACOES               | Mover     | Operação da empresa            |
| Documentos históricos                   | 10_PATRIMONIO_INTELECTUAL  | Mover     | Preservação da memória         |

---

# Critérios para Arquivamento

Um documento será arquivado quando:

* existir um documento canônico equivalente;
* representar uma versão antiga;
* possuir apenas valor histórico;
* não fizer mais parte da operação atual.

Arquivar nunca significa apagar.

---

# Critérios para Renomeação

Renomear apenas quando:

* o nome não representar corretamente o conteúdo;
* houver conflito de nomenclatura;
* o padrão institucional exigir.

---

# Critérios para Fusão

Documentos poderão ser unificados quando:

* tratarem exatamente do mesmo assunto;
* possuírem objetivos idênticos;
* um representar apenas atualização do outro.

A fusão deverá preservar o histórico.

---

# Critérios para Novos Departamentos

Novos departamentos somente poderão ser criados quando houver produção contínua de conhecimento naquela área.

Não criar departamentos para um único documento.

---

# Papel do Codex

O Codex será responsável pela execução técnica da migração.

Ele poderá:

* mover arquivos;
* renomear documentos;
* atualizar links;
* corrigir referências internas;
* atualizar READMEs;
* gerar relatórios de inconsistência.

Não poderá alterar a arquitetura definida neste documento.

---

# Auditoria Pós-Migração

Após a reorganização deverão ser verificados:

* links quebrados;
* documentos órfãos;
* documentos duplicados;
* referências inconsistentes;
* arquivos fora do padrão;
* nomenclatura;
* estrutura de pastas.

---

# Objetivo Final

Ao término da migração, o repositório deverá representar fielmente a estrutura organizacional da Academia da Barbearia, permitindo evolução contínua, manutenção simplificada e colaboração eficiente entre pessoas, Inteligências Artificiais e ferramentas automatizadas.

---

**Fim do Documento**
