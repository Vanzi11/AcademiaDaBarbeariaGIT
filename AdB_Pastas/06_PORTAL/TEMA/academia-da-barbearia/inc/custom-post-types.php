<?php
/**
 * Custom Post Types — TEMA_WORDPRESS_AB.md, Seção 3.
 *
 * `artigo`     → conteúdo editorial da Biblioteca e da Academia News (diferenciados
 *                pela taxonomia `formato` e pela data, nunca por CPTs separados —
 *                ver PORTAL_ARQUITETURA.md, Seção 1, sobre por que as duas seções
 *                não são a mesma coisa apesar de dividirem estrutura técnica).
 * `produto`    → ficha de avaliação da Academia Recomenda.
 * `produto_proprio` → produtos digitais próprios da Academia (Kit Fundação, etc.),
 *                separado de `produto` porque o modelo de conteúdo e a intenção
 *                editorial são diferentes (PORTAL_ARQUITETURA.md, Seção 1).
 * `ferramenta` → reservado para roadmap futuro (calculadoras, checklists interativos).
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ab_registrar_cpt_artigo() {
	register_post_type( 'artigo', array(
		'labels'              => array(
			'name'               => __( 'Artigos', 'academia-da-barbearia' ),
			'singular_name'      => __( 'Artigo', 'academia-da-barbearia' ),
			'add_new_item'       => __( 'Adicionar novo artigo', 'academia-da-barbearia' ),
			'edit_item'          => __( 'Editar artigo', 'academia-da-barbearia' ),
			'all_items'          => __( 'Todos os artigos', 'academia-da-barbearia' ),
			'search_items'       => __( 'Buscar artigos', 'academia-da-barbearia' ),
			'not_found'          => __( 'Nenhum artigo encontrado', 'academia-da-barbearia' ),
		),
		'public'              => true,
		'has_archive'         => 'biblioteca',
		// O placeholder %categoria_conteudo% é resolvido por post_type_link em
		// custom-taxonomies.php, produzindo /biblioteca/{categoria}/{slug}/
		// (PORTAL_ARQUITETURA.md, Seção 4). Notícias da Academia News sobrescrevem
		// este link em ab_link_artigo() (mesmo arquivo, mais abaixo).
		'rewrite'             => array( 'slug' => 'biblioteca/%categoria_conteudo%', 'with_front' => false ),
		'menu_icon'           => 'dashicons-book',
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'author' ),
		'show_in_rest'        => true,
		'template'            => array(),
	) );
}
add_action( 'init', 'ab_registrar_cpt_artigo' );

function ab_registrar_cpt_produto() {
	register_post_type( 'produto', array(
		'labels'              => array(
			'name'               => __( 'Academia Recomenda', 'academia-da-barbearia' ),
			'singular_name'      => __( 'Ficha de Produto', 'academia-da-barbearia' ),
			'add_new_item'       => __( 'Adicionar nova ficha', 'academia-da-barbearia' ),
			'edit_item'          => __( 'Editar ficha de produto', 'academia-da-barbearia' ),
			'all_items'          => __( 'Todas as fichas', 'academia-da-barbearia' ),
			'search_items'       => __( 'Buscar produtos', 'academia-da-barbearia' ),
			'not_found'          => __( 'Nenhum produto encontrado', 'academia-da-barbearia' ),
		),
		'public'              => true,
		'has_archive'         => 'academia-recomenda',
		'rewrite'             => array( 'slug' => 'academia-recomenda', 'with_front' => false ),
		'menu_icon'           => 'dashicons-star-filled',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'show_in_rest'        => true,
	) );
}
add_action( 'init', 'ab_registrar_cpt_produto' );

function ab_registrar_cpt_produto_proprio() {
	register_post_type( 'produto_proprio', array(
		'labels'              => array(
			'name'               => __( 'Produtos da Academia', 'academia-da-barbearia' ),
			'singular_name'      => __( 'Produto Próprio', 'academia-da-barbearia' ),
			'add_new_item'       => __( 'Adicionar novo produto', 'academia-da-barbearia' ),
			'edit_item'          => __( 'Editar produto', 'academia-da-barbearia' ),
			'all_items'          => __( 'Todos os produtos', 'academia-da-barbearia' ),
		),
		'public'              => true,
		'has_archive'         => 'produtos',
		'rewrite'             => array( 'slug' => 'produtos', 'with_front' => false ),
		'menu_icon'           => 'dashicons-products',
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'show_in_rest'        => true,
	) );
}
add_action( 'init', 'ab_registrar_cpt_produto_proprio' );

/**
 * `ferramenta` — reservado para roadmap futuro (Card de Ferramenta, PORTAL_COMPONENTES.md 2.4).
 * Registrado como `public => false` até que o desenvolvimento seja de fato priorizado —
 * mantém o espaço arquitetural sem expor uma seção vazia ao público.
 */
function ab_registrar_cpt_ferramenta() {
	register_post_type( 'ferramenta', array(
		'labels'      => array(
			'name'          => __( 'Ferramentas (reservado)', 'academia-da-barbearia' ),
			'singular_name' => __( 'Ferramenta', 'academia-da-barbearia' ),
		),
		'public'      => false,
		'show_ui'     => true,
		'show_in_menu' => false,
		'supports'    => array( 'title', 'editor', 'custom-fields' ),
	) );
}
add_action( 'init', 'ab_registrar_cpt_ferramenta' );

/**
 * Página de resultados de busca (`/busca/`) — usa a busca nativa do WordPress
 * (TEMA_WORDPRESS_AB.md, Seção 2 e PORTAL_COMPONENTES.md, 1.3), reescrevendo
 * apenas a URL amigável.
 */
function ab_rewrite_busca( $vars ) {
	return $vars;
}

function ab_reescrever_slug_busca() {
	add_rewrite_rule( '^busca/?$', 'index.php?s=', 'top' );
}
add_action( 'init', 'ab_reescrever_slug_busca' );

/**
 * Restringe artigos que pertencem à Academia News (via taxonomia `formato`)
 * a permalinks sob /academia-news/ — reforça a distinção editorial de
 * PORTAL_ARQUITETURA.md, Seção 1, no nível técnico de URL.
 */
function ab_link_artigo( $permalink, $post ) {
	if ( 'artigo' !== $post->post_type ) {
		return $permalink;
	}
	if ( has_term( 'noticia', 'formato', $post ) ) {
		return home_url( '/academia-news/' . $post->post_name . '/' );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'ab_link_artigo', 10, 2 );

function ab_reescrever_slug_academia_news() {
	add_rewrite_rule( '^academia-news/?$', 'index.php?post_type=artigo&formato=noticia', 'top' );
	add_rewrite_rule( '^academia-news/([^/]+)/?$', 'index.php?artigo=$matches[1]', 'top' );
}
add_action( 'init', 'ab_reescrever_slug_academia_news' );
