<?php
/**
 * Taxonomias — TEMA_WORDPRESS_AB.md, Seção 3.
 *
 * `categoria_conteudo` → aplicada a `artigo` (Biblioteca). Ex.: Gestão da Barbearia,
 *                        Técnica e Corte, Atendimento e Experiência, Marketing e
 *                        Redes Sociais, Ferramentas e Tecnologia, Identidade e Marca.
 * `categoria_produto`  → hierárquica (pai + filho), aplicada a `produto`. Os 4 pais
 *                        preservam o mega menu (máx. 4 colunas, PORTAL_COMPONENTES.md
 *                        1.2); os termos filhos são os ~22 termos granulares de
 *                        PRODUTO_000.md, reconciliados em PORTAL_ARQUITETURA.md, 3.2.
 * `nivel`               → Iniciante / Intermediário / Avançado, aplicada a `artigo`.
 * `formato`             → reservado, ativado nesta implementação apenas com o termo
 *                        `noticia` (necessário para diferenciar Biblioteca de
 *                        Academia News dentro do mesmo CPT `artigo`, conforme
 *                        mandato técnico do documento canônico) — ver nota de
 *                        divergência em RELATORIO_IMPLEMENTACAO_TEMA_V1.md.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ab_registrar_taxonomia_categoria_conteudo() {
	register_taxonomy( 'categoria_conteudo', array( 'artigo' ), array(
		'labels'            => array(
			'name'          => __( 'Categorias da Biblioteca', 'academia-da-barbearia' ),
			'singular_name' => __( 'Categoria', 'academia-da-barbearia' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'biblioteca', 'with_front' => false ),
	) );
}
add_action( 'init', 'ab_registrar_taxonomia_categoria_conteudo' );

function ab_registrar_taxonomia_categoria_produto() {
	register_taxonomy( 'categoria_produto', array( 'produto' ), array(
		'labels'            => array(
			'name'          => __( 'Categorias de Produto', 'academia-da-barbearia' ),
			'singular_name' => __( 'Categoria de Produto', 'academia-da-barbearia' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'academia-recomenda', 'with_front' => false ),
	) );
}
add_action( 'init', 'ab_registrar_taxonomia_categoria_produto' );

function ab_registrar_taxonomia_nivel() {
	register_taxonomy( 'nivel', array( 'artigo' ), array(
		'labels'            => array(
			'name'          => __( 'Nível', 'academia-da-barbearia' ),
			'singular_name' => __( 'Nível', 'academia-da-barbearia' ),
		),
		'hierarchical'      => false,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'nivel', 'with_front' => false ),
	) );
}
add_action( 'init', 'ab_registrar_taxonomia_nivel' );

function ab_registrar_taxonomia_formato() {
	register_taxonomy( 'formato', array( 'artigo' ), array(
		'labels'            => array(
			'name'          => __( 'Formato', 'academia-da-barbearia' ),
			'singular_name' => __( 'Formato', 'academia-da-barbearia' ),
		),
		'hierarchical'      => false,
		'public'            => true,
		'show_in_rest'      => true,
		'rewrite'           => false,
	) );
}
add_action( 'init', 'ab_registrar_taxonomia_formato' );

/**
 * Termos padrão instalados na ativação do tema — nunca recriados em execuções
 * subsequentes (evita duplicação a cada `switch_theme`).
 */
function ab_instalar_termos_padrao() {
	$categorias_biblioteca = array(
		'Gestão da Barbearia',
		'Técnica e Corte',
		'Atendimento e Experiência',
		'Marketing e Redes Sociais',
		'Ferramentas e Tecnologia',
		'Identidade e Marca',
	);
	foreach ( $categorias_biblioteca as $termo ) {
		if ( ! term_exists( $termo, 'categoria_conteudo' ) ) {
			wp_insert_term( $termo, 'categoria_conteudo' );
		}
	}

	$niveis = array( 'Iniciante', 'Intermediário', 'Avançado' );
	foreach ( $niveis as $termo ) {
		if ( ! term_exists( $termo, 'nivel' ) ) {
			wp_insert_term( $termo, 'nivel' );
		}
	}

	if ( ! term_exists( 'noticia', 'formato' ) ) {
		wp_insert_term( 'Notícia', 'formato', array( 'slug' => 'noticia' ) );
	}

	// Categorias-pai + subcategorias de Academia Recomenda (PORTAL_ARQUITETURA.md, 3.2).
	$arvore_produtos = array(
		'Equipamentos e Ferramentas' => array( 'Máquinas', 'Shavers', 'Navalhas', 'Tesouras', 'Pentes', 'Escovas', 'Secadores', 'Ferramentas', 'EPIs' ),
		'Estrutura e Ambiente'       => array( 'Cadeiras', 'Espelhos', 'Móveis', 'Iluminação', 'Decoração', 'Capas' ),
		'Cosméticos e Finalização'   => array( 'Cosméticos', 'Pomadas', 'Óleos', 'Shampoos' ),
		'Tecnologia e Conhecimento'  => array( 'Tecnologia', 'Aplicativos', 'Cursos recomendados', 'Livros' ),
	);
	foreach ( $arvore_produtos as $pai => $filhos ) {
		if ( ! term_exists( $pai, 'categoria_produto' ) ) {
			$inserido = wp_insert_term( $pai, 'categoria_produto' );
			$id_pai   = is_wp_error( $inserido ) ? 0 : $inserido['term_id'];
		} else {
			$existente = term_exists( $pai, 'categoria_produto' );
			$id_pai    = $existente['term_id'];
		}
		foreach ( $filhos as $filho ) {
			if ( ! term_exists( $filho, 'categoria_produto' ) && $id_pai ) {
				wp_insert_term( $filho, 'categoria_produto', array( 'parent' => $id_pai ) );
			}
		}
	}
}

/**
 * Permalink de artigo prefixado pela categoria (`/biblioteca/{categoria}/{slug}/`),
 * conforme PORTAL_ARQUITETURA.md, Seção 4. Artigos marcados com o formato "noticia"
 * são resolvidos por `/academia-news/{slug}/` (sem categoria), em custom-post-types.php.
 */
function ab_rewrite_tag_categoria_conteudo() {
	add_rewrite_tag( '%categoria_conteudo%', '([^/]+)', 'categoria_conteudo=' );
}
add_action( 'init', 'ab_rewrite_tag_categoria_conteudo' );

function ab_link_permalink_artigo( $permalink, $post ) {
	if ( 'artigo' !== $post->post_type || false === strpos( $permalink, '%categoria_conteudo%' ) ) {
		return $permalink;
	}
	if ( has_term( 'noticia', 'formato', $post ) ) {
		return $permalink; // resolvido separadamente por ab_link_artigo() em custom-post-types.php
	}
	$termos = get_the_terms( $post->ID, 'categoria_conteudo' );
	$slug   = ( $termos && ! is_wp_error( $termos ) ) ? $termos[0]->slug : 'geral';
	return str_replace( '%categoria_conteudo%', $slug, $permalink );
}
add_filter( 'post_type_link', 'ab_link_permalink_artigo', 9, 2 );

/**
 * As regras de rewrite para `/biblioteca/{categoria}/{slug}/` são geradas
 * automaticamente pelo WordPress a partir da permastructure do CPT `artigo`
 * (que já contém o placeholder %categoria_conteudo%, ver custom-post-types.php).
 * Isso exige um flush de rewrite rules após a ativação do tema (padrão do
 * WordPress) — feito uma única vez em ab_flush_rewrite_na_ativacao(), abaixo.
 */
function ab_flush_rewrite_na_ativacao() {
	ab_instalar_termos_padrao();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ab_flush_rewrite_na_ativacao', 20 );
