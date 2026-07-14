# RELATORIO_DE_MIGRACAO.md

Projeto: Academia da Barbearia

Documento: Relatório de Migração do Repositório

Status: Oficial

---

# Estrutura Antiga

A estrutura anterior mantinha conflitos e legados: `03_DESIGN`, `03_PRODUTOS`, `04_IA`, `05_MARKETING`, `07_PROPRIEDADE_INTELECTUAL`, `08_ASSETS`, `09_IMAGENS` e `10_FINANCEIRO` coexistiam com a nova governança.

---

# Estrutura Nova

```text
AdB_Pastas/
├─ 00_GOVERNANCA
├─ 01_FUNDACAO
├─ 02_METODOLOGIA
├─ 03_PRODUTOS
├─ 04_EDITORIAL
├─ 05_DESIGN
├─ 06_PORTAL
├─ 07_MARKETING
├─ 08_INTELIGENCIA_ARTIFICIAL
├─ 09_OPERACOES
├─ 10_PATRIMONIO_INTELECTUAL
└─ 99_ARQUIVO
```

---

# Decisões Arquiteturais Tomadas

| Decisão | Motivo |
| --- | --- |
| `03_DESIGN` foi migrado para `05_DESIGN`. | Resolver conflito com `03_PRODUTOS` e obedecer a arquitetura oficial. |
| `TEMPLATE_EDITORIAL_AB.md` foi movido para `04_EDITORIAL`. | É padrão editorial global, não apenas design visual. |
| Documentos antigos de gestão foram movidos para `00_GOVERNANCA/HISTORICO_DE_GESTAO`. | Preservar histórico sem competir com a Constituição. |
| Notas soltas da raiz foram movidas para `10_PATRIMONIO_INTELECTUAL/NOTAS_E_REFERENCIAS`. | São patrimônio intelectual, não documentos operacionais. |
| `FDP_AB_ARQUITETURA.md` foi movido para `10_PATRIMONIO_INTELECTUAL`. | É rationale histórico do framework; o canônico está em `02_METODOLOGIA`. |
| Produto 001 foi reorganizado em fluxo sequencial. | Separar arquitetura, concepção, editorial, fonte, layout, build técnico, entregáveis e revisões. |
| Produto 004 recebeu `99_DUPLICADOS`. | Preservar duplicata exata sem confundi-la com o canônico. |
| Diretórios legados vazios foram removidos do disco local. | Não continham documentos; a arquitetura final ficou limpa. |

---

# Arquivos Movidos

- Design: `03_DESIGN/*` → `05_DESIGN/`
- Editorial global: `TEMPLATE_EDITORIAL_AB.md` → `04_EDITORIAL/`
- Operações: `PLAYBOOK.md` → `09_OPERACOES/`
- Patrimônio: notas da raiz e `FDP_AB_ARQUITETURA.md` → `10_PATRIMONIO_INTELECTUAL/`
- Gestão histórica: `README`, `MASTER`, `DECISIONS`, `CHANGELOG`, `IDEIAS`, `000_index` → `00_GOVERNANCA/HISTORICO_DE_GESTAO/`
- Produto 001: reorganizado em `00_ARQUITETURA`, `01_CONCEPCAO`, `02_EDITORIAL`, `03_LIVRO_FONTE`, `04_LIVRO_LAYOUT`, `05_RECONSTRUCAO_TECNICA`, `06_KIT_FUNDACAO`, `07_REVISOES`.
- Produto 002: `00_ESQUELETOS`.
- Produto 003: `00_ISCAS_E_DIAGNOSTICOS`.
- Produto 004: `00_CONCEPCAO`, `01_PUBLICO`, `99_DUPLICADOS`.

---

# Arquivos Renomeados

- Não houve renomeação de documentos intelectuais individuais.
- Houve renomeação de pastas para refletir finalidade lógica e escalável.

---

# Arquivos que Permaneceram sem Classificação

- Nenhum arquivo permaneceu fora da arquitetura oficial.

---

# Arquivos Duplicados
- Hash 6765A02D0477DCF3D247E39FA9EA20A1EFDCAB16812455C947F788C57B292B14: AdB_Pastas/03_PRODUTOS/PRODUTO_001/03_LIVRO_FONTE/00_APRESENTACAO.md; AdB_Pastas/03_PRODUTOS/PRODUTO_001/04_LIVRO_LAYOUT/00_APRESENTACAO.md
- Hash C1CA5A73A0B8662ED84E40AB3F7C1242300CBC41C15F75F0EFE69A9895441215: AdB_Pastas/03_PRODUTOS/PRODUTO_001/03_LIVRO_FONTE/09_MISSAO_FINAL; AdB_Pastas/03_PRODUTOS/PRODUTO_001/04_LIVRO_LAYOUT/09_MISSAO_FINAL.md
- Hash 614A82EE1C399AA449539A58456C9F96E90F909B8632AA4A61EBCC37974A678D: AdB_Pastas/03_PRODUTOS/PRODUTO_004/00_CONCEPCAO/PRODUTO_004.md; AdB_Pastas/03_PRODUTOS/PRODUTO_004/99_DUPLICADOS/concepcao-kit-identidade-visual-barbearia.md
- Hash E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855: AdB_Pastas/05_DESIGN/ASSETS_LEGADO/Novo(a) Documento de Texto.txt; AdB_Pastas/05_DESIGN/IMAGENS_LEGADO/Novo(a) Documento de Texto.txt; AdB_Pastas/07_MARKETING/LEGADO_05_MARKETING/Novo(a) Documento de Texto.txt; AdB_Pastas/08_INTELIGENCIA_ARTIFICIAL/LEGADO_04_IA/Novo(a) Documento de Texto.txt; AdB_Pastas/09_OPERACOES/FINANCEIRO/LEGADO_10_FINANCEIRO/Novo(a) Documento de Texto.txt; AdB_Pastas/99_ARQUIVO/Novo(a) Documento de Texto.txt
---

# Arquivos Órfãos

- Placeholders vazios foram preservados como legado.
- Notas soltas foram classificadas como patrimônio intelectual.
- Arquivos sem extensão permanecem nos produtos e estão catalogados.

---

# Arquivos que Podem ser Unificados Futuramente

- Duplicata exata do Produto 004.
- Versões paralelas do Produto 001.
- Documentos concorrentes de direção de arte.
- Versões do kit de ferramentas do Produto 001.

---

# Problemas Encontrados

- Conflito de numeração entre departamentos.
- Departamentos legados fora da arquitetura oficial.
- Produto 001 com camadas de produção misturadas.
- Documentos históricos com vocabulário anterior à Constituição.

---

# Sugestões Futuras

- Declarar canonicidade formal por produto.
- Criar índice de versões do Produto 001.
- Unificar duplicatas somente após decisão formal.
- Padronizar arquivos textuais sem extensão.

---

# Migração Adicional — Renumeração de 09_OPERACOES para 11_OPERACOES

Após a migração original, a IA Pesquisadora (Departamento de Inteligência de Produtos, operando dentro de `08_INTELIGENCIA_ARTIFICIAL/`) recebeu uma Base de Conhecimento própria (`08_INTELIGENCIA_ARTIFICIAL/BASE_DE_CONHECIMENTO/`) para armazenar os dossiês técnicos de produtos físicos pesquisados.

Essa Base de Conhecimento foi mantida como subpasta de `08_INTELIGENCIA_ARTIFICIAL/`, não como departamento de topo, evitando uma mudança estrutural maior. Para deixar o número 09 reservado a um eventual departamento futuro de Inteligência de Produtos — caso o volume de produtos algum dia justifique essa promoção —, `09_OPERACOES` foi renumerado para `11_OPERACOES`.

**Ação:** conteúdo de `09_OPERACOES/` (README.md, PLAYBOOK.md, FINANCEIRO/LEGADO_10_FINANCEIRO/) copiado integralmente para `11_OPERACOES/`, sem alteração de conteúdo além do cabeçalho do README.

**Pendência técnica:** a exclusão da pasta antiga `09_OPERACOES/` não pôde ser concluída nesta sessão por limitação de acesso do ambiente a este caminho específico do OneDrive. `09_OPERACOES/` e `11_OPERACOES/` coexistem temporariamente com conteúdo duplicado até que a pasta antiga seja removida manualmente.

**Aprovação:** explícita do CEO, conforme exigido pelo `PLAYBOOK.md` ("Nenhuma alteração de arquitetura poderá ocorrer sem aprovação do CEO").

Documentos atualizados em consequência: `ARQUITETURA_DO_REPOSITORIO.md` (v1.0 → v1.1), `PLANO_DE_MIGRACAO_DO_REPOSITORIO.md` (nota de rodapé), `CATALOGO_DOCUMENTAL.md` (3 linhas corrigidas).
