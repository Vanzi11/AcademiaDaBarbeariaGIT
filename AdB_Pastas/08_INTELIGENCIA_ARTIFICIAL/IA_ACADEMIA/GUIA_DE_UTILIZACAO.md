# Guia de Utilização — IA Academia (Versão Lite)

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.0

---

# Para Quem é Este Guia

Para qualquer pessoa da Academia que for operar a IA Academia: alimentando-a com um produto já pesquisado pela IA Pesquisadora e revisando a Camada 7 gerada antes de considerar o cadastro pronto para a IA Editorial.

---

# Configuração Necessária Antes do Primeiro Uso

1. Criar um Projeto Claude dedicado à IA Academia (pode ser o mesmo Projeto da IA Pesquisadora ou um separado — recomenda-se separado, para não misturar os dois comportamentos).
2. Anexar como conhecimento do Projeto, no mínimo: `CONSTITUICAO_DA_ACADEMIA.md`, `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`, `VISAO_GERAL.md`, `ARQUITETURA.md`, `FRAMEWORK_CLASSIFICACAO.md`, `FRAMEWORK_AVALIACAO_DE_PRODUTOS.md`, `TAXONOMIA_DOS_PRODUTOS.md`, `MODELO_DE_DADOS_DO_PRODUTO.md`, `FONTES_DE_DADOS.md`, `PROCESSO_DE_ANALISE.md`, e o `CRITERIOS_DE_AVALIACAO/` da categoria que for analisar.
3. Colar o conteúdo do bloco "PROMPT" de `PROMPT_IA_ACADEMIA.md` como instrução de sistema do Projeto.
4. **Não é necessário** habilitar busca web — a IA Academia não pesquisa.

---

# Como Fornecer a Entrada

Cole o conteúdo completo do arquivo do produto já pesquisado (ex.: `BASE_DE_CONHECIMENTO/PRODUTOS/MAQUINAS/MAQ-000001_WAHL_5_STAR_CORD_CORDLESS_SENIOR.md`) — Camadas 1 a 6 e 9 preenchidas.

**Não envie apenas o nome do produto.** A IA Academia não pesquisa; ela precisa do dossiê já pronto.

Um produto por execução.

---

# Fluxo de Uso Passo a Passo

1. Verifique no catálogo da categoria (`BASE_DE_CONHECIMENTO/CATALOGOS/`) se o produto já teve suas pendências revisadas por um humano (Status "Aguardando revisão humana" já resolvido) antes de enviar à Academia — embora não seja uma trava obrigatória, é a ordem recomendada pelo próprio `GUIA_DE_UTILIZACAO.md` da IA Pesquisadora.
2. Cole o conteúdo do arquivo do produto na conversa.
3. A IA Academia devolve o mesmo Modelo de Dados, com a Camada 7 preenchida — cada conclusão acompanhada de qual campo das Camadas 1-6 ela deriva.
4. Revise se toda conclusão realmente cita um campo de origem. Se não citar, trate como falha e peça correção.
5. Se houver conflito registrado na Camada 9, confirme que a Academia mencionou a limitação em algum campo da Camada 7 (normalmente em Pontos Fracos ou no Resumo Técnico) — nunca deve tê-lo ignorado.
6. Salve o resultado de volta no mesmo arquivo em `BASE_DE_CONHECIMENTO/PRODUTOS/<CATEGORIA>/`, sobrescrevendo apenas a Camada 7 (e o Status da Camada 9).
7. Atualize o Status na linha correspondente do catálogo da categoria para "Analisado pela IA Academia" (ou o status seguinte que a Academia definir).
8. Só depois disso o produto está pronto para a etapa seguinte (IA Editorial, quando existir).

---

# Boas Práticas

Nunca aceite uma "Melhor alternativa" que aponte para um produto de outro fabricante — isso é sinal de que a IA saiu do escopo da Versão Lite.

Nunca aceite uma "Nota da Academia" apresentada como comparação com outro produto específico — a nota é sobre adequação ao contexto, não um ranking.

Se o produto tiver muitos campos "Informação não encontrada" nas Camadas 1-6, espere (e aceite) uma Camada 7 com trechos "Não existem informações suficientes para concluir" — isso é o comportamento correto, não uma falha.

---

# O Que Fazer Quando a Camada 7 Parecer Genérica Demais

Se as conclusões não citarem campos específicos das Camadas 1-6, ou parecerem aplicáveis a qualquer produto da categoria, isso é sinal de que a IA não está de fato ancorando o julgamento nos dados pesquisados. Peça para refazer citando explicitamente cada campo de origem.

---

# Erros Comuns de Uso

Enviar apenas o nome do produto, sem o dossiê pesquisado.

Pedir para a Academia comparar dois produtos específicos (fora do escopo desta versão).

Aceitar a Camada 7 sem checar se as Camadas 1-6 permaneceram exatamente iguais.

Esquecer de atualizar o Status no catálogo depois da análise.

---

# Limitações

Este guia não substitui a leitura de `LIMITACOES.md`, que detalha riscos e casos que exigem revisão humana obrigatória.

---

**Fim do Documento**
