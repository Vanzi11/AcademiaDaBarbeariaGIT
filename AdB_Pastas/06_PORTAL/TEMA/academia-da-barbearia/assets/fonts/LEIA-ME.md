# Arquivos de fonte pendentes

Esta pasta contém apenas `fontes.css` (as declarações `@font-face`). Os
arquivos `.woff2` referenciados ainda **não foram adicionados** — nenhuma
ferramenta de download de arquivos externos esteve disponível durante esta
implementação.

Antes do lançamento em produção, adicionar nesta pasta:

- `dm-sans-latin-400.woff2`
- `dm-sans-latin-500.woff2`
- `dm-sans-latin-600.woff2`
- `dm-sans-latin-700.woff2`
- `dm-serif-display-latin-400.woff2`

Fonte oficial de download: [Google Fonts](https://fonts.google.com/specimen/DM+Sans)
e [DM Serif Display](https://fonts.google.com/specimen/DM+Serif+Display),
convertidos para `.woff2` (ex.: via `google-webfonts-helper`) e hospedados
localmente — nunca via CDN externo (`TEMA_WORDPRESS_AB.md`, Seção 2 e 6:
performance e LGPD).

Até que os arquivos sejam adicionados, o tema funciona normalmente: o
navegador usa o fallback de sistema definido em `assets/css/tokens.css`
(`--fonte-titulos`, `--fonte-texto`), sem quebrar layout ou lançar erro.
