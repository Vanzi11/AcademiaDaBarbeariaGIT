# README.md — Base de Conhecimento de Produtos

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.0

---

# Objetivo

Esta pasta é o patrimônio permanente dos produtos físicos pesquisados pela IA Pesquisadora — máquinas, tesouras, cosméticos, mobiliário e demais categorias da Taxonomia Oficial (`TAXONOMIA_DOS_PRODUTOS.md`).

Cada dossiê aqui guardado é um `MODELO_DE_DADOS_DO_PRODUTO` completo (Camadas 1 a 9). Não é um banco de dados — é uma pasta de arquivos markdown, versionada pelo Git, sem SQL, Airtable ou Notion. "Feito é melhor que perfeito."

---

# Por que isso existe

Antes desta pasta, cada pesquisa da IA Pesquisadora vivia só dentro de uma conversa — nada persistia. Sem um lugar fixo para acumular os dossiês, nenhuma IA seguinte (Academia, Editorial, Comparadora) teria de onde ler. Esta pasta resolve exatamente isso, e nada além disso.

---

# Estrutura

```text
BASE_DE_CONHECIMENTO/
├── README.md                          (este arquivo)
├── CATALOGOS/
│   ├── CATALOGO_MAQUINAS.md
│   ├── CATALOGO_TESOURAS.md
│   ├── CATALOGO_NAVALHAS.md
│   ├── CATALOGO_POS_BARBA.md
│   ├── CATALOGO_CABELO.md
│   ├── CATALOGO_CADEIRAS.md
│   ├── CATALOGO_LAVATORIOS.md
│   ├── CATALOGO_SOFTWARE.md
│   └── CATALOGO_EDUCACAO.md
└── PRODUTOS/
    ├── MAQUINAS/
    ├── TESOURAS/
    ├── NAVALHAS/
    ├── POS_BARBA/
    ├── CABELO/
    ├── CADEIRAS/
    ├── LAVATORIOS/
    ├── SOFTWARE/
    └── EDUCACAO/
```

Cada dossiê individual vive em `PRODUTOS/<CATEGORIA>/<ID>_<NOME_NORMALIZADO>.md` — por exemplo, `PRODUTOS/MAQUINAS/MAQ-000001_WAHL_5_STAR_CORDLESS_SENIOR.md`.

---

# Granularidade: um catálogo/pasta por Categoria, não por Departamento nem por Subcategoria

A Taxonomia Oficial (`TAXONOMIA_DOS_PRODUTOS.md`) tem seis níveis: Departamento → Categoria → Subcategoria → Família → Produto → Modelo.

Esta Base organiza catálogos e pastas no nível de **Categoria** — nem no nível de Departamento (largo demais: juntaria Máquinas, Secadores, Pranchas e Modeladores num só balde, mesmo sem relação operacional entre eles) nem no de Subcategoria (fragmentado demais: uma pasta por "Máquinas de Corte" e outra por "Máquinas de Acabamento" duplicaria o que `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` já resolve com uma coluna de Subcategoria). Essa é exatamente a granularidade que `MAQUINAS.md` já usa — um protocolo cobrindo 5 subcategorias com aplicabilidade por campo — e este documento apenas segue o mesmo padrão já validado.

**Categorias já habilitadas** (as mesmas exercitadas em `CASOS_DE_TESTE.md`, Casos 1 a 11): Máquinas, Tesouras, Navalhas, Pós-Barba, Cabelo, Cadeiras, Lavatórios, Software, Educação.

**Novas categorias** (Secadores, Pranchas, Cosméticos/Barbear, Bancadas, Espelhos etc.) são criadas sob demanda, seguindo esta mesma regra, no momento em que o primeiro produto daquela categoria for pesquisado — não pré-criadas especulativamente para as ~30 categorias da Taxonomia inteira.

---

# ID Interno da Academia

Todo produto cadastrado recebe um ID sequencial por categoria, no formato `<PREFIXO>-NNNNNN` (6 dígitos, zero à esquerda). Prefixos das categorias habilitadas:

| Categoria | Prefixo |
| --- | --- |
| Máquinas | MAQ |
| Tesouras | TES |
| Navalhas | NAV |
| Pós-Barba | POS |
| Cabelo | CAB |
| Cadeiras | CAD |
| Lavatórios | LAV |
| Software | SOF |
| Educação | EDU |

Este ID é definido na Camada 1 (Identidade) do `MODELO_DE_DADOS_DO_PRODUTO.md`, como campo distinto do SKU do fabricante: o SKU é externo (definido pelo fabricante, pode nem existir publicamente); o ID Interno é interno (definido pela Academia no momento em que o dossiê entra nesta Base), e nunca muda mesmo que o arquivo seja renomeado.

---

# Catálogos: o que são e o que não são

Cada `CATALOGO_<CATEGORIA>.md` é uma tabela simples:

| ID | Produto | Subcategoria | Status | Arquivo | Última Revisão |
| --- | --- | --- | --- | --- | --- |

O catálogo é um **índice derivado**, não uma segunda fonte da verdade. "Última Revisão" já existe dentro de cada dossiê, na Camada 9 (Controle Editorial) — o catálogo só espelha isso para permitir busca rápida sem abrir dezenas de arquivos. Se catálogo e arquivo divergirem algum dia, o arquivo individual manda.

**Status** é uma lista fechada, não texto livre (mesma disciplina já aplicada a Tipo de Fonte e Confiabilidade no Modelo de Dados):

- `Em pesquisa`
- `Completo`
- `Aguardando revisão humana`
- `Aguardando Academia`

---

# Onde o Parecer da IA Academia vai morar

Não em um arquivo novo. O `MODELO_DE_DADOS_DO_PRODUTO.md` já reserva a Camada 7 ("Inteligência da Academia") exatamente para isso — hoje ela chega da IA Pesquisadora marcada como "Não aplicável — etapa da IA Academia". Quando a IA Academia (Lite) existir, ela preenche essa mesma Camada 7 dentro do mesmo arquivo já salvo aqui. Um produto, um arquivo, uma fonte da verdade — mesmo com mais de uma IA contribuindo ao longo do tempo.

---

# Fluxo de Trabalho (hoje, com execução manual)

A IA Pesquisadora, rodando como Claude Project, não tem acesso direto a este repositório para consultar o catálogo e decidir sozinha. Por isso, hoje, o fluxo é conduzido por quem opera o agente:

1. Antes de pesquisar, confira o `CATALOGO_<CATEGORIA>.md` correspondente: o produto já tem ID?
2. Se sim, informe o ID existente à IA Pesquisadora — é uma atualização, não um cadastro novo.
3. Se não, atribua o próximo ID sequencial disponível para a categoria.
4. Peça a pesquisa normalmente (ver `GUIA_DE_UTILIZACAO.md`).
5. Salve a saída em `PRODUTOS/<CATEGORIA>/<ID>_<NOME_NORMALIZADO>.md`.
6. Adicione ou atualize a linha correspondente no catálogo da categoria.

Se, no futuro, a IA Pesquisadora operar com acesso direto a arquivos (ex.: ambiente com ferramentas de arquivo conectadas), ela pode ler o catálogo e propor o próximo ID — mas a confirmação final continua sendo humana, pelo mesmo motivo que qualquer ambiguidade de identificação já exige confirmação em conversa interativa.

---

# Relação com os Demais Documentos

- `MODELO_DE_DADOS_DO_PRODUTO.md` define a estrutura de cada dossiê salvo aqui, incluindo o ID Interno (Camada 1).
- `IA_PESQUISADORA.md` e `PROMPT_IA_PESQUISADORA.md` descrevem o papel do agente que produz o conteúdo desses dossiês.
- `GUIA_DE_UTILIZACAO.md` descreve o fluxo operacional completo, incluindo os passos desta Base.
- `TAXONOMIA_DOS_PRODUTOS.md` define as Categorias que dão nome às pastas e prefixos de ID.
- `CRITERIOS_DE_AVALIACAO/MAQUINAS.md` (e futuros protocolos por categoria) definem o que cada dossiê de Máquinas deve conter.

---

# Escopo Final

Esta Base guarda fatos pesquisados sobre produtos físicos, mais — quando existir — o parecer da IA Academia na Camada 7 do mesmo arquivo. Ela não guarda comparações, rankings, conteúdo editorial publicado ou dados comerciais monitorados continuamente — isso é responsabilidade de outras etapas do pipeline (`ARQUITETURA.md`).

---

**Fim do Documento**
