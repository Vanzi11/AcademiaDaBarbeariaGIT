<?php
/**
 * SEO Técnico — TEMA_WORDPRESS_AB.md, Seção 5 / PORTAL_SEO.md, Seção 4.
 *
 * Implementa meta title/description, dados estruturados (schema.org) e
 * diretivas de robots diretamente no tema, sem dependência de plugin —
 * conforme TEMA_WORDPRESS_AB.md, Seção 9 ("apenas se o tema customizado
 * não cobrir integralmente a Seção 5"). Se um plugin de SEO for instalado
 * no futuro, estas funções devem ser desativadas para evitar duplicação de
 * meta tags e schema.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Meta description e canonical — título já é resolvido nativamente por
 * add_theme_support( 'title-tag' ), com fallback automático do WordPress.
 */
function ab_meta_description() {
	$descricao = '';

	if ( is_singular( array( 'artigo', 'produto', 'produto_proprio' ) ) ) {
		$campo = function_exists( 'get_field' ) ? get_field( 'ab_meta_description' ) : '';
		if ( $campo ) {
			$descricao = $campo;
		} elseif ( has_excerpt() ) {
			$descricao = get_the_excerpt();
		} else {
			$descricao = wp_trim_words( get_the_content(), 30, '...' );
		}
	} elseif ( is_category() || is_tax() ) {
		$descricao = term_description();
	} elseif ( is_front_page() ) {
		$descricao = __( 'Portal Brasileiro de Inteligência para Profissionais da Barbearia. Conhecimento, curadoria de produtos e inteligência de mercado em um só lugar.', 'academia-da-barbearia' );
	}

	$descricao = wp_strip_all_tags( $descricao );
	$descricao = mb_substr( $descricao, 0, 155 );

	if ( $descricao ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $descricao ) );
	}

	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( ab_url_canonica() ) );
}
add_action( 'wp_head', 'ab_meta_description', 1 );

function ab_url_canonica() {
	global $wp;
	if ( is_singular() ) {
		return get_permalink();
	}
	return home_url( add_query_arg( array(), $wp->request ) );
}

/**
 * robots.txt e noindex em páginas de utilidade (busca interna) — PORTAL_SEO.md,
 * Seção 4: "não diluir orçamento de rastreamento com páginas de baixo valor".
 */
function ab_robots_meta( $robots ) {
	if ( is_search() ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = false;
	}
	return $robots;
}
add_filter( 'wp_robots', 'ab_robots_meta' );

/**
 * Dados estruturados (schema.org), injetados como JSON-LD no <head>.
 * Article para artigos, Product+Review para fichas de Academia Recomenda,
 * BreadcrumbList em toda página de nível 2+, Organization no rodapé global.
 */
function ab_schema_jsonld() {
	$schemas = array();

	if ( is_singular( 'artigo' ) ) {
		$schemas[] = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'Article',
			'headline'      => get_the_title(),
			'datePublished' => get_the_date( 'c' ),
			'dateModified'  => get_the_modified_date( 'c' ),
			'author'        => array( '@type' => 'Organization', 'name' => 'Academia da Barbearia' ),
			'publisher'     => ab_schema_organization(),
			'mainEntityOfPage' => get_permalink(),
		);
	}

	if ( is_singular( 'produto' ) && function_exists( 'get_field' ) ) {
		$nota = get_field( 'ab_nota_geral' );
		$produto_schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Product',
			'name'        => get_the_title(),
			'brand'       => get_field( 'ab_marca' ) ?: null,
			'model'       => get_field( 'ab_modelo' ) ?: null,
			'offers'      => array(
				'@type'         => 'Offer',
				'price'         => get_field( 'ab_preco_atual' ) ?: null,
				'priceCurrency' => 'BRL',
				'url'           => get_field( 'ab_link_afiliado' ) ?: get_permalink(),
			),
		);
		// AggregateRating apenas com lastro real (PORTAL_SEO.md, Seção 5 —
		// "nunca simular uma nota sem lastro real").
		if ( $nota ) {
			$produto_schema['aggregateRating'] = array(
				'@type'       => 'AggregateRating',
				'ratingValue' => $nota,
				'bestRating'  => 10,
				'reviewCount' => 1,
			);
		}
		$schemas[] = array_filter( $produto_schema );
	}

	if ( is_front_page() ) {
		$schemas[] = ab_schema_organization();
	}

	$breadcrumb = ab_schema_breadcrumb();
	if ( $breadcrumb ) {
		$schemas[] = $breadcrumb;
	}

	foreach ( $schemas as $schema ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'ab_schema_jsonld', 5 );

function ab_schema_organization() {
	$logo = get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '';
	return array_filter( array(
		'@type' => 'Organization',
		'name'  => 'Academia da Barbearia',
		'url'   => home_url( '/' ),
		'logo'  => $logo,
		'sameAs' => array_filter( array(
			'https://www.instagram.com/academiadabarbearia2026',
			'https://www.facebook.com/share/1PYUuPLMNR/',
		) ),
	) );
}

function ab_schema_breadcrumb() {
	if ( is_front_page() ) {
		return null;
	}
	$itens = ab_gerar_trilha_breadcrumb();
	if ( count( $itens ) < 2 ) {
		return null;
	}
	$lista = array();
	foreach ( $itens as $posicao => $item ) {
		$lista[] = array(
			'@type'    => 'ListItem',
			'position' => $posicao + 1,
			'name'     => $item['nome'],
			'item'     => $item['url'],
		);
	}
	return array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $lista,
	);
}

/**
 * Monta a trilha de breadcrumb (Início / Categoria / Subcategoria / Página atual),
 * reutilizada tanto pelo schema quanto pelo template-part visual
 * (template-parts/components/breadcrumb.php) — nunca duas implementações.
 */
function ab_gerar_trilha_breadcrumb() {
	$trilha = array( array( 'nome' => __( 'Início', 'academia-da-barbearia' ), 'url' => home_url( '/' ) ) );

	if ( is_singular( 'artigo' ) ) {
		$termos = get_the_terms( get_the_ID(), 'categoria_conteudo' );
		if ( $termos && ! is_wp_error( $termos ) ) {
			$trilha[] = array( 'nome' => $termos[0]->name, 'url' => get_term_link( $termos[0] ) );
		}
		$trilha[] = array( 'nome' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_singular( 'produto' ) ) {
		$trilha[] = array( 'nome' => __( 'Academia Recomenda', 'academia-da-barbearia' ), 'url' => get_post_type_archive_link( 'produto' ) );
		$termos = get_the_terms( get_the_ID(), 'categoria_produto' );
		if ( $termos && ! is_wp_error( $termos ) ) {
			$trilha[] = array( 'nome' => $termos[0]->name, 'url' => get_term_link( $termos[0] ) );
		}
		$trilha[] = array( 'nome' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_tax( 'categoria_conteudo' ) || is_tax( 'categoria_produto' ) || is_post_type_archive() ) {
		$objeto = get_queried_object();
		$trilha[] = array( 'nome' => is_object( $objeto ) && isset( $objeto->name ) ? $objeto->name : single_post_title( '', false ), 'url' => '' );
	} elseif ( is_search() ) {
		$trilha[] = array( 'nome' => __( 'Busca', 'academia-da-barbearia' ), 'url' => '' );
	} elseif ( is_page() ) {
		$trilha[] = array( 'nome' => get_the_title(), 'url' => get_permalink() );
	}

	return $trilha;
}

/**
 * Segmentação do sitemap XML por tipo de conteúdo (Seção 5) — usa a API nativa
 * de sitemaps do WordPress (core desde 5.5), apenas ajustando quais tipos
 * participam, sem reinventar o gerador de sitemap.
 */
function ab_ajustar_sitemap_tipos( $tipos ) {
	$tipos['artigo']          = get_post_type_object( 'artigo' );
	$tipos['produto']         = get_post_type_object( 'produto' );
	$tipos['produto_proprio'] = get_post_type_object( 'produto_proprio' );
	return $tipos;
}
add_filter( 'wp_sitemaps_post_types', 'ab_ajustar_sitemap_tipos' );

/**
 * Data de última atualização visível (sinal de confiança, PORTAL_SEO.md, Seção 6),
 * disponibilizada como helper reutilizável para os templates de artigo/produto.
 */
function ab_data_ultima_atualizacao() {
	$modificado = get_the_modified_time( 'U' );
	$publicado  = get_the_time( 'U' );
	if ( $modificado >= $publicado + DAY_IN_SECONDS ) {
		return sprintf( __( 'Atualizado em %s', 'academia-da-barbearia' ), get_the_modified_date() );
	}
	return sprintf( __( 'Publicado em %s', 'academia-da-barbearia' ), get_the_date() );
}
