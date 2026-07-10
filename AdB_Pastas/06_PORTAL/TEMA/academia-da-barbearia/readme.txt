=== Academia da Barbearia ===

Tema WordPress proprietário do Portal Brasileiro de Inteligência para
Profissionais da Barbearia.

Requires at least: 6.4
Tested up to: 6.6
Requires PHP: 8.0
Version: 1.0.0
License: proprietário

== Descrição ==

Tema clássico customizado (sem page builder), implementando o Design System
oficial do Portal (`06_PORTAL/PORTAL_DESIGN_SYSTEM.md`) e a arquitetura
técnica definida em `06_PORTAL/TEMA_WORDPRESS_AB.md`. Registra os Custom Post
Types `artigo` (Biblioteca / Academia News), `produto` (Academia Recomenda) e
`produto_proprio` (Produtos), com campos estruturados via ACF.

Documentação completa da implementação: `RELATORIO_IMPLEMENTACAO_TEMA_V1.md`
(raiz de `06_PORTAL/`) e `documentacao-tema.md` (raiz deste tema).

== Dependências ==

* Plugin "Advanced Custom Fields" (ACF ou ACF PRO) — obrigatório para os
  campos estruturados de `inc/custom-fields.php`. Sem ele, os Custom Post
  Types funcionam, mas sem os campos de ficha técnica.

== Instalação ==

1. Enviar a pasta `academia-da-barbearia/` para `wp-content/themes/`.
2. Ativar o plugin Advanced Custom Fields antes de ativar o tema.
3. Ativar o tema em Aparência > Temas (isso dispara a criação automática das
   categorias e subcategorias padrão e o flush de rewrite rules — ver
   `inc/custom-taxonomies.php`).
4. Em Configurações > Leitura, definir "Uma página estática" com a Home
   escolhida como página inicial (necessário para que `front-page.php` seja
   usado — ver nota técnica em `RELATORIO_IMPLEMENTACAO_TEMA_V1.md`).
5. Criar as Páginas institucionais: Sobre (slug `sobre`), Contato (slug
   `contato`), Política de Privacidade, Termos de Uso.
6. Adicionar os arquivos de fonte em `assets/fonts/` (ver LEIA-ME.md nessa
   pasta) antes do lançamento em produção.
7. Configurar o menu "Navegação Principal" em Aparência > Menus (opcional —
   o header já renderiza a navegação oficial de forma nativa, independente
   de menu configurado no admin).

== Changelog ==

= 1.0.0 =
Implementação inicial completa, a partir da arquitetura aprovada
(nota de auditoria 9,8/10) e do protótipo visual Versão C.
