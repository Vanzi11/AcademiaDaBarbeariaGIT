# PORTAL_ACESSIBILIDADE.md

**Projeto:** Academia da Barbearia

**Documento:** Checklist Operacional de Acessibilidade do Portal

**Departamento:** 06_PORTAL

**Versão:** 1.0

**Status:** Oficial

---

# Objetivo

O `PORTAL_DESIGN_SYSTEM.md` e o `TEMA_WORDPRESS_AB.md` estabelecem princípios de acessibilidade. Este documento os transforma em um checklist auditável — algo que pode ser marcado como feito ou não feito, item por item, antes de qualquer lançamento ou atualização relevante.

Acessibilidade não é uma camada adicionada no final. É a mesma aplicação prática do princípio "clareza com autoridade" (`GUIA_IDENTIDADE_VISUAL.md`) — um profissional que usa leitor de tela, que navega só por teclado, ou que enxerga com dificuldade, também precisa tomar melhores decisões através deste Portal.

---

# Nível-Alvo

WCAG 2.1, nível AA, em toda página pública do Portal. Nível AAA é bem-vindo quando alcançável sem prejuízo de outros requisitos, mas não é o critério de aceite mínimo.

---

# 1. Perceptível

* ☐ Todo texto tem contraste mínimo de 4.5:1 contra o fundo (3:1 para texto grande) — em ambos os modos claro e escuro (`PORTAL_DESIGN_SYSTEM.md`, Seções 1.5 e 1.6).
* ☐ Dourado Terroso nunca é usado como cor de texto corrido — apenas elementos gráficos, bordas e ícones grandes (contraste insuficiente sobre Branco Marfim).
* ☐ Toda imagem tem `alt text` descritivo e funcional — nunca vazio, nunca "imagem".
* ☐ Nenhuma informação é comunicada apenas por cor (erro, sucesso, link) — sempre acompanhada de ícone, sublinhado ou peso de fonte.
* ☐ Vídeos incorporados com legenda quando o conteúdo for essencial à compreensão.
* ☐ Conteúdo reflui corretamente até 200% de zoom sem perda de informação ou funcionalidade.

## 1.1 Checklist Específico do Modo Escuro

* ☐ Branco Marfim sobre Verde Quadro Negro validado em ferramenta de contraste (par com maior risco de reprovação por ser uma combinação nova nesta versão do Design System).
* ☐ Dourado Terroso como acento validado sobre Verde Quadro Negro (uso em foco/links no Modo Escuro).
* ☐ Alternância entre modo claro e escuro não quebra nenhum componente — testar cada componente do catálogo (`PORTAL_COMPONENTES.md`) nos dois modos antes do lançamento.

---

# 2. Operável

* ☐ Toda a navegação é operável exclusivamente por teclado (Tab, Shift+Tab, Enter, Esc), incluindo mega menu, filtros e formulários.
* ☐ Estado de foco sempre visível — contorno de 2px em Dourado Terroso, nunca removido sem substituto (`outline: none` proibido isoladamente).
* ☐ Ordem de tabulação segue a ordem visual e lógica da página.
* ☐ Área de toque mínima de 44x44px em todo elemento interativo, especialmente em mobile.
* ☐ Nenhuma animação pisca mais de 3 vezes por segundo (risco de convulsão fotossensível).
* ☐ `prefers-reduced-motion` respeitado — todas as transições podem ser desativadas.
* ☐ Skip link ("Pular para o conteúdo principal") presente no topo de toda página.

---

# 3. Compreensível

* ☐ Idioma da página declarado corretamente (`lang="pt-BR"`).
* ☐ Rótulos de formulário sempre associados ao campo correspondente — nunca apenas placeholder.
* ☐ Mensagens de erro de formulário identificam claramente qual campo e qual é o problema (`PORTAL_COPYWRITING.md`, Seção 3.4).
* ☐ Navegação consistente entre páginas — o header e o rodapé nunca mudam de posição ou comportamento de forma imprevisível.
* ☐ Terminologia consistente — o mesmo conceito nunca é nomeado de duas formas diferentes em páginas distintas (ex.: "Academia Recomenda" nunca vira "Recomendações" em outra página).

---

# 4. Robusto

* ☐ HTML semântico correto (`<nav>`, `<main>`, `<article>`, `<header>`, `<footer>`) — sem `<div>` genérico onde existe elemento semântico equivalente (`TEMA_WORDPRESS_AB.md`, Seção 7).
* ☐ Todo componente interativo customizado (mega menu, accordion, filtro) segue o padrão ARIA correspondente.
* ☐ Testado com pelo menos um leitor de tela real (NVDA ou VoiceOver) antes do lançamento — não apenas com ferramenta automatizada.
* ☐ Testado com pelo menos uma ferramenta automatizada (axe, Lighthouse) em toda página nova antes da publicação.

---

# 5. Processo de Auditoria

| Momento | Verificação |
|---|---|
| Antes de todo lançamento de página nova ou componente novo | Checklist completo desta seção, rodada automatizada (axe/Lighthouse) |
| A cada release do tema | Teste manual de navegação por teclado nas 5 seções principais |
| Trimestral | Auditoria completa, incluindo teste com leitor de tela real e revisão de contraste do Modo Escuro |

---

# 6. Responsáveis

A responsabilidade por acessibilidade não é de uma função isolada — é compartilhada entre quem implementa o tema (conformidade técnica) e o Editor-chefe (conteúdo: alt text, hierarquia de cabeçalhos, linguagem clara). Nenhuma página é publicada sem que ambas as partes tenham passado pelo checklist aplicável.

---

# Relação com os Demais Documentos

Este checklist operacionaliza os princípios de acessibilidade já presentes em `PORTAL_DESIGN_SYSTEM.md` (Seções 1.5, 1.6 e 4.8) e `TEMA_WORDPRESS_AB.md` (Seção 7). Aplica-se a todos os componentes catalogados em `PORTAL_COMPONENTES.md` e a todas as páginas descritas em `06_PORTAL/PAGINAS/`.

---

**Fim do Documento**
