<?php
/**
 * Performance — TEMA_WORDPRESS_AB.md, Seção 6. Requisito crítico dado o
 * ambiente de hospedagem compartilhada (HostGator) e a ambição de crescer
 * por anos sem degradar.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lazy loading nativo — já ligado por padrão no WordPress core (5.5+),
 * mantido aqui apenas explícito para leitura futura do código.
 */
add_filter( 'wp_lazy_loading_enabled', '__return_true' );

/**
 * Conversão para WebP no upload, quando o servidor suporta (GD ou Imagick com WebP).
 * Mantém o arquivo original como fallback — nunca substitui, apenas adiciona.
 */
function ab_gerar_webp_no_upload( $metadados, $id_anexo ) {
	if ( ! function_exists( 'imagewebp' ) || empty( $metadados['file'] ) ) {
		return $metadados;
	}

	$caminho_upload = wp_get_upload_dir();
	$caminho_original = trailingslashit( $caminho_upload['basedir'] ) . $metadados['file'];
	$info = pathinfo( $caminho_original );

	if ( ! in_array( strtolower( $info['extension'] ?? '' ), array( 'jpg', 'jpeg', 'png' ), true ) ) {
		return $metadados;
	}

	$imagem = ( 'png' === strtolower( $info['extension'] ) ) ? @imagecreatefrompng( $caminho_original ) : @imagecreatefromjpeg( $caminho_original );
	if ( $imagem ) {
		imagewebp( $imagem, $info['dirname'] . '/' . $info['filename'] . '.webp', 82 );
		imagedestroy( $imagem );
	}

	return $metadados;
}
add_filter( 'wp_generate_attachment_metadata', 'ab_gerar_webp_no_upload', 10, 2 );

/**
 * Qualidade de compressão JPEG — equilíbrio entre nitidez e peso de arquivo.
 */
add_filter( 'jpeg_quality', function () { return 82; } );
add_filter( 'wp_editor_set_quality', function () { return 82; } );

/**
 * Remove funcionalidades do core que não são usadas pelo tema e pesam no
 * carregamento de todas as páginas (embeds de terceiros, emojis nativos —
 * substituídos, quando necessário, por ícones lineares do próprio Design System).
 */
function ab_remover_bloat_core() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );

	// oEmbed de terceiros desligado por padrão — religar pontualmente quando
	// um formato de conteúdo realmente precisar (ex.: vídeo do YouTube em artigo).
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'ab_remover_bloat_core' );

/**
 * Scripts de terceiros (analytics, chat, pixel) sempre assíncronos/adiados —
 * nunca bloqueando a renderização inicial (TEMA_WORDPRESS_AB.md, Seção 6).
 * Ponto de extensão único: qualquer script de terceiro deve ser adicionado
 * via este filtro, nunca hardcoded direto no <head>.
 */
function ab_scripts_terceiros_async( $tag, $handle ) {
	$handles_terceiros = apply_filters( 'ab_handles_scripts_terceiros', array() );
	if ( in_array( $handle, $handles_terceiros, true ) && false === strpos( $tag, 'async' ) ) {
		$tag = str_replace( ' src', ' async defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'ab_scripts_terceiros_async', 10, 2 );

/**
 * Cache hints básicos via header HTTP para conteúdo estático servido pelo tema
 * (o cache de página completa depende do plugin/infra escolhida em produção —
 * TEMA_WORDPRESS_AB.md, Seção 9 — este hook cobre apenas o que o tema controla).
 */
function ab_headers_cache_estatico() {
	if ( is_admin() ) {
		return;
	}
	header( 'Vary: Accept-Encoding' );
}
add_action( 'send_headers', 'ab_headers_cache_estatico' );

/**
 * Desabilita a geração de tamanhos de imagem intermediários que o tema não usa,
 * reduzindo espaço em disco e tempo de processamento no upload.
 */
function ab_remover_tamanhos_imagem_nao_usados( $tamanhos ) {
	unset( $tamanhos['medium_large'] );
	return $tamanhos;
}
add_filter( 'intermediate_image_sizes_advanced', 'ab_remover_tamanhos_imagem_nao_usados' );

/**
 * Limita revisões de post (banco de dados enxuto em hospedagem compartilhada
 * com muito conteúdo ao longo dos anos).
 */
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
	define( 'WP_POST_REVISIONS', 5 );
}
