# PORTAL_PLAYBOOK_EDITORIAL.md

**Projeto:** Academia da Barbearia

**Documento:** Playbook Editorial do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

Este playbook define quem faz o quê, em que ordem, e com que frequência, para que o Portal seja alimentado de conteúdo de forma sustentável — sem depender da memória de uma única pessoa. Ele operacionaliza, no dia a dia, os princípios já definidos em `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` e a arquitetura de `PORTAL_ARQUITETURA.md`.

---

# 1. Papéis

Nesta fase inicial, é provável que uma mesma pessoa acumule mais de um papel — os papéis são definidos por função, não por headcount. Definir os papéis agora evita ambiguidade quando a equipe crescer.

| Papel | Responsabilidade |
|---|---|
| Editor-chefe | Decide pauta, aprova publicação final, garante alinhamento com `CONSTITUICAO_DA_ACADEMIA.md` |
| Redator (humano ou IA) | Produz o rascunho, seguindo `PORTAL_GUIA_REDACAO_BIBLIOTECA.md` ou a estrutura de ficha do `FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md` |
| Revisor Humano | Valida precisão técnica, tom de voz e conformidade editorial — obrigatório antes de qualquer publicação de conteúdo gerado por IA |
| Especialista em SEO | Valida palavra-chave, meta tags, links internos antes da publicação |
| Curador da Academia Recomenda | Pesquisa produtos, mantém preços e disponibilidade atualizados, garante a linha editorial 70/20/10 |

---

# 2. Fluxo de Produção

```
1. Ideação (pauta)
       ↓
2. Teste da Regra de Ouro — "isso ajuda o profissional a tomar uma decisão melhor?"
       ↓
3. Pesquisa de palavra-chave / pesquisa de produto (Academia Recomenda)
       ↓
4. Rascunho (humano ou IA)
       ↓
5. Revisão humana obrigatória (precisão + tom + SEO)
       ↓
6. Aprovação do Editor-chefe
       ↓
7. Publicação
       ↓
8. Distribuição em outros canais (Instagram, Newsletter, Telegram/WhatsApp quando aplicável)
       ↓
9. Monitoramento (PORTAL_ANALYTICS_KPIS.md)
```

Nenhuma etapa é pulada para conteúdo gerado por IA — em especial a etapa 5, que é a aplicação direta do princípio "a decisão final pertence ao responsável humano" (`MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md`).

## 2.1 Teste da Regra de Ouro (Etapa 2)

Antes de qualquer pauta avançar, ela deve responder por escrito:

1. Isso ajuda o profissional a tomar uma decisão melhor? (`CONSTITUICAO_DA_ACADEMIA.md`)
2. Em qual seção do Portal isso pertence — e por quê essa e não outra? (`PORTAL_ARQUITETURA.md`, Seção 1)
3. Existe conteúdo equivalente já publicado? Se sim, este é atualização ou duplicação?

Se a pauta não passa no item 1, ela é descartada, independentemente do potencial de tráfego.

---

# 3. Aprovação de Conteúdo Produzido por IA

Regra única e não negociável, herdada de `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` e de `PRODUTO_000.md` ("IA escreve, humano aprova"): **nenhum conteúdo gerado por Inteligência Artificial é publicado sem revisão humana explícita.** Isso vale para artigos da Biblioteca, fichas da Academia Recomenda, notícias da Academia News e qualquer microcopy nova de interface.

A revisão humana verifica, no mínimo: precisão técnica, ausência de informação inventada, tom de voz consistente com a marca, e conformidade com o guia de redação aplicável.

---

# 4. Cadência por Seção

| Seção | Cadência de publicação | Cadência de revisão de conteúdo existente |
|---|---|---|
| Biblioteca | Sem calendário fixo — publicar quando a pauta responder a uma pergunta real | Páginas pilar: a cada 6–12 meses. Artigos de cluster: quando o tema evoluir |
| Academia Recomenda | Conforme lançamento de produtos relevantes ao público | Preço e disponibilidade: mensal, no mínimo. Conteúdo da ficha: a cada 6 meses |
| Academia News | Ritmo real do setor — nunca publicar por obrigação de calendário sem notícia relevante | N/A (conteúdo perecível por definição) |
| Produtos | Por lançamento ou atualização de versão | A cada nova versão do produto (ex.: Kit Fundação 1.0 → 1.1) |

---

# 5. Governança da Linha Editorial 70/20/10 (Academia Recomenda)

Herdada de `PRODUTO_000.md`: 70% conteúdo útil, 20% ofertas, 10% produtos próprios — nunca invertida. O Curador da Academia Recomenda audita essa proporção mensalmente sobre o conteúdo publicado no período, e reporta ao Editor-chefe. Se a proporção de ofertas ultrapassar 20% em um mês, o mês seguinte deve compensar com mais conteúdo útil — nunca o contrário.

---

# 6. Calendário Editorial

Estrutura mínima recomendada, sem prescrever ferramenta específica: um calendário mensal com uma coluna por seção (Biblioteca, Academia Recomenda, Academia News, Produtos), pautas atribuídas a um responsável, e status (Ideação → Rascunho → Revisão → Aprovado → Publicado). O calendário em si não é um documento de governança — é uma ferramenta operacional, e pode viver fora deste repositório documental (planilha, Kanban).

---

# 7. Processo de Atualização de Conteúdo Existente

* Toda página exibe a data de última atualização (`PORTAL_SEO.md`, Seção 6).
* Uma atualização substantiva (mudança de recomendação, correção técnica) reinicia o ciclo de revisão completo (Seção 2 deste documento).
* Uma atualização cosmética (correção de digitação, ajuste de link) não exige nova aprovação do Editor-chefe, apenas registro de data.

---

# Relação com os Demais Documentos

Este playbook operacionaliza `MANUAL_DAS_INTELIGENCIAS_ARTIFICIAIS.md` e `CONSTITUICAO_DA_ACADEMIA.md` no fluxo diário do Portal. Aplica-se sobre a estrutura de `PORTAL_ARQUITETURA.md`, o guia de redação `PORTAL_GUIA_REDACAO_BIBLIOTECA.md`, e reconcilia-se com `03_PRODUTOS/PRODUTO_000/PRODUTO_000.md` na governança da Academia Recomenda. Alimenta e é alimentado pelas métricas de `PORTAL_ANALYTICS_KPIS.md`.

---

**Fim do Documento**
