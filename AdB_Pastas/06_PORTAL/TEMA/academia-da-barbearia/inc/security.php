<?php
/**
 * Security — hardening básico do tema (TEMA_WORDPRESS_AB.md, Seção 2).
 * Não substitui um plugin de segurança dedicado em produção — cobre apenas
 * o que o tema pode e deve resolver por conta própria.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove a versão do WordPress exposta em <head>, feeds e assets — reduz a
 * superfície de reconhecimento automatizado de vulnerabilidades conhecidas.
 */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

function ab_remover_versao_assets( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'ab_remover_versao_assets' );
add_filter( 'script_loader_src', 'ab_remover_versao_assets' );

/**
 * Desabilita XML-RPC — vetor comum de força bruta e amplificação de ataque
 * em instalações WordPress, sem uso legítimo neste projeto.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove endpoints REST de usuários para visitantes não autenticados —
 * evita enumeração de usuários/autores via /wp-json/wp/v2/users.
 */
function ab_restringir_rest_usuarios( $resultado, $servidor, $requisicao ) {
	if ( is_wp_error( $resultado ) || is_user_logged_in() ) {
		return $resultado;
	}
	if ( 0 === strpos( $requisicao->get_route(), '/wp/v2/users' ) ) {
		return new WP_Error( 'rest_forbidden', __( 'Não permitido.', 'academia-da-barbearia' ), array( 'status' => 401 ) );
	}
	return $resultado;
}
add_filter( 'rest_pre_dispatch', 'ab_restringir_rest_usuarios', 10, 3 );

/**
 * Remove a enumeração de autores por ?author=N, redirecionando para a Home —
 * mesma motivação da restrição acima, aplicada ao endpoint legado (não-REST).
 */
function ab_bloquear_enumeracao_autor() {
	if ( is_admin() ) {
		return;
	}
	if ( isset( $_GET['author'] ) && ! is_user_logged_in() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'ab_bloquear_enumeracao_autor' );

/**
 * Cabeçalhos HTTP de segurança básicos, aplicáveis a nível de tema.
 * Content-Security-Policy completo é responsabilidade da infraestrutura de
 * produção (varia por CDN/hospedagem) — não definido aqui para evitar
 * quebrar scripts de terceiros configurados fora do tema.
 */
function ab_headers_seguranca() {
	if ( is_admin() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: geolocation=(), microphone=(), camera=()' );
}
add_action( 'send_headers', 'ab_headers_seguranca' );

/**
 * Desativa a edição de arquivos de tema/plugin pelo painel administrativo —
 * qualquer alteração de código deve passar pelo fluxo versionado em Git
 * (TEMA_WORDPRESS_AB.md, Seção 8: "nenhuma customização diretamente no
 * editor de temas do WordPress em produção").
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}
