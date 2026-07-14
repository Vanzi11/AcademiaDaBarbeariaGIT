# GUIA_DE_UTILIZACAO.md

# Guia de Utilização — IA Pesquisadora

**Projeto:** Academia da Barbearia

**Departamento:** Inteligência de Produtos

**Versão:** 1.7

---

# Para Quem é Este Guia

Para qualquer pessoa da Academia que for operar a IA Pesquisadora: alimentando-a com nomes de produtos e revisando os Modelos de Dados gerados antes de encaminhá-los à IA Academia.

---

# Protocolos de Categoria

Quando a categoria do produto tiver um protocolo publicado em `CRITERIOS_DE_AVALIACAO/` (ex.: `MAQUINAS.md`), o agente o segue como checklist de coleta, priorizando os campos obrigatórios e respeitando a aplicabilidade por subcategoria que o protocolo definir. Isso é transparente para quem usa o agente — nenhuma configuração extra é necessária além de manter a versão mais recente do protocolo anexada ao Projeto junto com os demais documentos oficiais. Esses protocolos são revisados com frequência; sempre mantenha a versão vigente anexada, não uma cópia antiga.

# Configuração Necessária Antes do Primeiro Uso

1. Criar um Projeto Claude (ou ambiente equivalente) dedicado à IA Pesquisadora.
2. Anexar como conhecimento do Projeto, no mínimo: `CONSTITUICAO_DA_ACADEMIA.md`, `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`, `VISAO_GERAL.md`, `ARQUITETURA.md`, `FRAMEWORK_CLASSIFICACAO.md`, `FRAMEWORK_AVALIACAO_DE_PRODUTOS.md`, `TAXONOMIA_DOS_PRODUTOS.md`, `MODELO_DE_DADOS_DO_PRODUTO.md`, `FONTES_DE_DADOS.md`, `PROCESSO_DE_ANALISE.md`, e os `CRITERIOS_DE_AVALIACAO/` já publicados.
3. Colar o conteúdo do bloco "PROMPT" de `PROMPT_IA_PESQUISADORA.md` como instrução de sistema do Projeto.
4. Confirmar que a busca web / navegação está habilitada no ambiente. Sem isso, o agente vai (corretamente) recusar-se a pesquisar — ver `LIMITACOES.md`.

Esta configuração é feita uma única vez. Depois disso, o uso do dia a dia é apenas enviar o nome de um produto por conversa.

---

# Como Fornecer a Entrada

**Bom:** "JRL Onyx" · "Wahl Senior Cordless" · "Andis Slimline Pro Li 2" · "Feather Artist Club SS".

**Ainda aceitável, mas mais lento:** "máquina de acabamento da Wahl" (o agente vai pedir para confirmar o modelo exato, já que há vários).

**Acelera a desambiguação:** se você já souber o SKU ou part number oficial do fabricante (não o código de uma loja), inclua-o no pedido. Ele identifica a variante exata do produto e evita idas e vindas quando o nome comercial se repete entre gerações ou cores.

**Evite:** nomes genéricos sem marca ("máquina boa de fade"), apelidos não comerciais, ou combinar dois produtos no mesmo pedido.

Um produto por execução. Se precisar pesquisar vários, envie um de cada vez — isso mantém cada Modelo de Dados limpo e rastreável.

---

# Fluxo de Uso Passo a Passo

0. Antes de enviar o nome do produto, confira o catálogo da categoria em `BASE_DE_CONHECIMENTO/CATALOGOS/` (ex.: `CATALOGO_MAQUINAS.md`): o produto já tem um ID Interno? Se sim, informe-o ao agente — é uma atualização, não um cadastro novo. Se não, você atribuirá o próximo ID disponível depois de receber o resultado.
1. Envie o nome do produto.
2. O agente identifica, classifica e pesquisa nas fontes oficiais.
3. Se o produto tiver mais de uma variante plausível (ex.: SKUs diferentes por mercado), o agente pausa e pergunta qual pesquisar antes de continuar — responda antes de esperar qualquer resultado.
4. Você recebe o Modelo de Dados preenchido, com fontes citadas em cada campo — cada citação traz a origem concreta (ex.: fabricante, distribuidor, fórum), o método de verificação (acesso direto ou resumo de busca) e uma Confiabilidade (Alta/Média/Baixa) já calculada a partir dessas duas informações, nunca atribuída livremente pelo agente —, mais o Registro de Pendências e o Registro de Conflitos.
5. Revise as pendências: campos vazios não são erro — são um sinal honesto de que a informação não foi encontrada com confiança suficiente.
6. Se necessário, refine a entrada (ex.: especifique a versão) e peça para o agente completar os campos pendentes.
7. Revise o Registro de Conflitos: cada item vem classificado (Divergência entre fontes, Escopo diferente, Mercado diferente, Versão diferente, ou Informação não confirmada). Decida manualmente qual valor prevalece, ou busque uma terceira fonte, antes de fechar o cadastro — trate "Informação não confirmada" com prioridade, já que normalmente indica um dado visto só em resumo de busca.
8. Se a pesquisa envolveu conflito, ambiguidade resolvida ou mais de uma rodada, o agente também entrega um Diário de Pesquisa — não espere um a cada produto: ele só aparece quando um desses gatilhos ocorre, e sua ausência num cadastro simples não é falha.
9. Salve o Modelo de Dados em `BASE_DE_CONHECIMENTO/PRODUTOS/<CATEGORIA>/<ID>_<NOME_NORMALIZADO>.md` e atualize (ou crie) a linha correspondente no catálogo da categoria — ver `BASE_DE_CONHECIMENTO/README.md` para o passo a passo completo.
10. Só depois de revisado e salvo, o Modelo de Dados segue para a IA Academia.

---

# Boas Práticas

Revise sempre o Registro de Pendências antes de considerar um cadastro "pronto" — campos vazios indicam onde um humano pode precisar pesquisar manualmente ou confirmar com o fabricante.

Sempre que o fabricante lançar uma atualização, recall ou nova versão, execute novamente a pesquisa para o mesmo produto e compare com o cadastro anterior antes de sobrescrever.

Ao encontrar itens no Registro de Conflitos, não ignore — decida manualmente qual valor prevalece ou busque uma terceira fonte, e documente a decisão. Conflitos do tipo "Mercado diferente" ou "Versão diferente" costumam não ser erro nenhum — apenas informam que o produto varia por região ou geração; já "Divergência entre fontes" e "Informação não confirmada" normalmente exigem uma decisão sua antes da publicação.

Nunca peça ao agente para "dar uma opinião rápida" sobre o produto — isso está fora do escopo dele por design; use a IA Academia para isso.

Se o agente listar "Produtos Relacionados" (versão anterior, versão seguinte, mesma linha), trate como fato declarado pelo fabricante — nunca como comparação. Pedir para o agente indicar "concorrentes" está fora de escopo: esse julgamento pertence exclusivamente à IA Academia (Camada 7).

---

# O Que Fazer Quando o Agente Retorna Muitos Campos Vazios

Isso normalmente significa uma das três coisas: o produto é muito novo e ainda não tem documentação pública suficiente; o produto é de nicho ou nacional e não possui presença forte em fontes de Nível A/B em português ou inglês; ou o nome fornecido está incompleto/ambíguo.

Nesses casos, forneça mais contexto (marca completa, ano, região) ou aceite que o cadastro ficará parcial até que mais fontes surjam — isso é preferível a qualquer informação inventada.

---

# Limitações

Este guia não substitui a leitura de `LIMITACOES.md`, que detalha riscos e casos que exigem revisão humana obrigatória.

---

# Erros Comuns de Uso

Pedir avaliação ou recomendação diretamente ao agente (fora do seu escopo).

Enviar múltiplos produtos em uma única mensagem.

Aceitar um Modelo de Dados sem revisar as Pendências.

Usar o agente sem busca web habilitada, o que leva à recusa esperada (e correta) do agente.

Editar manualmente os documentos de governança da Academia com base em uma sugestão de melhoria do agente, sem validação humana.

---

**Fim do Documento**
