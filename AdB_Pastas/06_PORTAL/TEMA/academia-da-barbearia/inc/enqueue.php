<?php
/**
 * Enqueue — carregamento condicional de CSS/JS, conforme TEMA_WORDPRESS_AB.md,
 * Seção 6 ("um template só carrega o CSS/JS que efetivamente usa").
 *
 * Fontes DM Serif Display e DM Sans são hospedadas localmente (nunca via CDN
 * externo — TEMA_WORDPRESS_AB.md, Seção 2 e 6, motivo: performance e LGPD).
 * Os arquivos .woff2 devem ser colocados em /assets/fonts/ antes do lançamento
 * (ver assets/fonts/LEIA-ME.md).
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ab_registrar_assets() {
	$versao = AB_TEMA_VERSAO;

	// Tokens e base carregam sempre — são o fundamento de qualquer página (peso mínimo, puro CSS variables + reset).
	wp_register_style( 'ab-tokens', AB_TEMA_URI . '/assets/css/tokens.css', array(), $versao );
	wp_register_style( 'ab-base', AB_TEMA_URI . '/assets/css/base.css', array( 'ab-tokens' ), $versao );
	wp_register_style( 'ab-componentes', AB_TEMA_URI . '/assets/css/componentes.css', array( 'ab-base' ), $versao );
	wp_register_style( 'ab-utilitarios', AB_TEMA_URI . '/assets/css/utilitarios.css', array( 'ab-componentes' ), $versao );
	wp_register_style( 'ab-fontes', AB_TEMA_URI . '/assets/fonts/fontes.css', array(), $versao );

	wp_register_script( 'ab-nucleo', AB_TEMA_URI . '/assets/js/nucleo.js', array(), $versao, true );
	wp_register_script( 'ab-mega-menu', AB_TEMA_URI . '/assets/js/mega-menu.js', array( 'ab-nucleo' ), $versao, true );
	wp_register_script( 'ab-busca', AB_TEMA_URI . '/assets/js/busca.js', array( 'ab-nucleo' ), $versao, true );
	wp_register_script( 'ab-tema-alternador', AB_TEMA_URI . '/assets/js/alternador-tema.js', array(), $versao, true );
}
add_action( 'wp_enqueue_scripts', 'ab_registrar_assets', 1 );

function ab_carregar_assets() {
	// Carregado em toda página — fundação do Design System, header e footer.
	wp_enqueue_style( 'ab-fontes' );
	wp_enqueue_style( 'ab-utilitarios' ); // já carrega tokens/base/componentes via dependências

	wp_enqueue_script( 'ab-nucleo' );
	wp_enqueue_script( 'ab-mega-menu' );
	wp_enqueue_script( 'ab-busca' );
	wp_enqueue_script( 'ab-tema-alternador' );

	wp_localize_script( 'ab-busca', 'abConfig', array(
		'urlBusca' => home_url( '/busca/' ),
	) );

	// Comentários nativos do WordPress não são usados nesta fase (PORTAL_ARQUITETURA.md,
	// Seção 6 — "avaliar necessidade por seção, não obrigatório no lançamento").
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ab_carregar_assets' );

/**
 * Preload das fontes críticas (peso realmente usado, ver Design System 2.1) —
 * reduz o maior risco de CLS/LCP causado por fontes web.
 */
function ab_preload_fontes() {
	$fontes = array(
		'/assets/fonts/dm-sans-latin-400.woff2',
		'/assets/fonts/dm-serif-display-latin-400.woff2',
	);
	foreach ( $fontes as $fonte ) {
		$caminho = AB_TEMA_DIR . $fonte;
		if ( file_exists( $caminho ) ) {
			printf(
				'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
				esc_url( AB_TEMA_URI . $fonte )
			);
		}
	}
}
add_action( 'wp_head', 'ab_preload_fontes', 1 );

/**
 * Remove estilos/scripts de blocos que o tema não usa por página, evitando
 * carga desnecessária em hospedagem compartilhada (TEMA_WORDPRESS_AB.md, Seção 6).
 */
function ab_remover_estilos_globais_desnecessarios() {
	// Estilos SVG de bloco só quando a página realmente contém blocos com galeria/SVG.
	if ( ! is_singular() ) {
		wp_dequeue_style( 'wp-block-library-theme' );
	}
}
add_action( 'wp_enqueue_scripts', 'ab_remover_estilos_globais_desnecessarios', 20 );
