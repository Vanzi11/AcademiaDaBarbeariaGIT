# Traduções

O tema já carrega o text domain `academia-da-barbearia` a partir desta pasta
(`load_theme_textdomain()`, ver `inc/setup.php`) e todas as strings do tema
usam `__()` / `esc_html_e()` com esse domínio — pronto para tradução, mesmo
sendo o português brasileiro o idioma nativo do conteúdo.

Nenhum arquivo `.pot`/`.po`/`.mo` foi gerado nesta fase (exigiria WP-CLI ou
Poedit contra o código já escrito). Gerar com:

```
wp i18n make-pot . languages/academia-da-barbearia.pot
```
