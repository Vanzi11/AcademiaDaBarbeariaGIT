# 08_INTELIGENCIA_ARTIFICIAL

Departamento responsável por projetos de IA, prompts operacionais, agentes, automações, arquiteturas e ferramentas inteligentes.

O manual institucional das IAs permanece em 00_GOVERNANCA por sua função normativa.

## Agentes Oficiais

### IA Pesquisadora (agente v1.7 — todos os documentos operacionais sincronizados)

- `IA_PESQUISADORA.md` (v1.7) — missão, escopo e arquitetura do agente
- `PROMPT_IA_PESQUISADORA.md` (v1.7) — prompt operacional pronto para uso
- `GUIA_DE_UTILIZACAO.md` (v1.7) — como configurar e operar
- `CASOS_DE_TESTE.md` (v1.7) — bateria de validação (23 casos)
- `LIMITACOES.md` (v1.7) — o que o agente não faz e quando exigir revisão humana
- `RELATORIO_FINAL.md` (v1.7) — avaliação de prontidão e pendências
- `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` (v4.2) — protocolo de coleta da primeira categoria de produtos (Máquinas), usado pela IA Pesquisadora
- `MODELO_DE_DADOS_DO_PRODUTO.md` (v1.5) — Convenção de Fontes e Confiabilidade calculada, Produtos Relacionados factuais, Registro de Conflitos, Citações Literais e Idioma Original, Diário de Pesquisa condicional, ID Interno da Academia formalizado, Camada 7 reconciliada entre os três documentos que a descreviam
- `BASE_DE_CONHECIMENTO/` (README.md v1.1) — patrimônio permanente dos dossiês pesquisados: README.md, catálogos e pastas por categoria (Máquinas, Tesouras, Navalhas, Pós-Barba, Cabelo, Cadeiras, Lavatórios, Software, Educação). Status do catálogo inclui agora "Analisado pela IA_Academia"; convenção `IA_Nome` formalizada para valores de Status que nomeiam um agente.
- `REVISOES/ORDEM_DE_REVISAO_V1.md`, `REVISOES/RELATORIO_REVISAO_V2.md`, `REVISOES/RELATORIO_REVISAO_V3.md`, `REVISOES/RELATORIO_REVISAO_V4.md` e `REVISOES/RELATORIO_IMPLEMENTACAO_IA_ACADEMIA_V1.md` — histórico das rodadas de revisão pós-teste real e de decisões arquiteturais (produtos "Wahl Senior Cordless" e "Senior 2.0"; Base de Conhecimento; construção da IA Academia)

### IA Academia — Versão Lite (agente v1.2 — pronto para uso supervisionado, primeiro teste real concluído)

- `IA_ACADEMIA/IA_ACADEMIA.md` (v1.2) — missão, escopo e arquitetura do agente
- `IA_ACADEMIA/PROMPT_IA_ACADEMIA.md` (v1.2) — prompt operacional pronto para uso
- `IA_ACADEMIA/GUIA_DE_UTILIZACAO.md` (v1.2) — como configurar e operar
- `IA_ACADEMIA/CASOS_DE_TESTE.md` (v1.2) — bateria de validação (11 casos + Rodada 1 de teste real registrada)
- `IA_ACADEMIA/LIMITACOES.md` (v1.2) — o que o agente não faz e quando exigir revisão humana
- `IA_ACADEMIA/RELATORIO_FINAL.md` (v1.2) — avaliação de prontidão e pendências
- Recebe um `MODELO_DE_DADOS_DO_PRODUTO` já pesquisado pela IA Pesquisadora e preenche exclusivamente a Camada 7 ("Inteligência da Academia"), com rastreabilidade obrigatória a cada campo das Camadas 1-6. Não compara com produtos de outro fabricante nem faz ranking (v1.2: exceção formalizada para comparação factual com Produto Relacionado da mesma linha/fabricante, incluindo comparação quantitativa). Nunca toca a Camada 9 — apenas recomenda a atualização do Status do catálogo.

