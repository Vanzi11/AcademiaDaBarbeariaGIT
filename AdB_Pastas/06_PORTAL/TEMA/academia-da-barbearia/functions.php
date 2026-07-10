<?php
/**
 * Bootstrap do tema Academia da Barbearia.
 *
 * Este arquivo não define comportamento diretamente — apenas carrega os
 * módulos de /inc/, cada um com responsabilidade única, conforme
 * TEMA_WORDPRESS_AB.md, Seção 2 ("nenhum arquivo deve ultrapassar uma
 * responsabilidade única").
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AB_TEMA_VERSAO', '1.0.0' );
define( 'AB_TEMA_DIR', get_template_directory() );
define( 'AB_TEMA_URI', get_template_directory_uri() );

$ab_modulos = array(
	'inc/setup.php',
	'inc/custom-post-types.php',
	'inc/custom-taxonomies.php',
	'inc/custom-fields.php',
	'inc/enqueue.php',
	'inc/seo.php',
	'inc/performance.php',
	'inc/security.php',
);

foreach ( $ab_modulos as $ab_modulo ) {
	$ab_caminho = AB_TEMA_DIR . '/' . $ab_modulo;
	if ( file_exists( $ab_caminho ) ) {
		require_once $ab_caminho;
	}
}
unset( $ab_modulos, $ab_modulo, $ab_caminho );
