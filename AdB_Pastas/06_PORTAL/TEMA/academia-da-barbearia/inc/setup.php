<?php
/**
 * Setup — suporte a recursos do tema, menus e tamanhos de imagem.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra suporte a recursos nativos do WordPress.
 */
function ab_configurar_tema() {
	load_theme_textdomain( 'academia-da-barbearia', AB_TEMA_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 48,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	// Editor de blocos restrito à paleta e escala tipográfica do Design System
	// (PORTAL_DESIGN_SYSTEM.md, Seções 1 e 2) — nunca cor ou fonte livre no editor.
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'editor-color-palette', array(
		array( 'name' => __( 'Preto Carvão', 'academia-da-barbearia' ), 'slug' => 'preto-carvao', 'color' => '#1A1A1A' ),
		array( 'name' => __( 'Branco Marfim', 'academia-da-barbearia' ), 'slug' => 'branco-marfim', 'color' => '#F5F2ED' ),
		array( 'name' => __( 'Dourado Terroso', 'academia-da-barbearia' ), 'slug' => 'dourado-terroso', 'color' => '#B8935A' ),
		array( 'name' => __( 'Verde Quadro Negro', 'academia-da-barbearia' ), 'slug' => 'verde-quadro-negro', 'color' => '#2D4A3E' ),
	) );
	add_theme_support( 'editor-font-sizes', array(
		array( 'name' => __( 'Corpo', 'academia-da-barbearia' ), 'slug' => 'corpo', 'size' => 17 ),
		array( 'name' => __( 'Corpo grande', 'academia-da-barbearia' ), 'slug' => 'corpo-grande', 'size' => 20 ),
		array( 'name' => __( 'H3', 'academia-da-barbearia' ), 'slug' => 'h3', 'size' => 24 ),
		array( 'name' => __( 'H2', 'academia-da-barbearia' ), 'slug' => 'h2', 'size' => 36 ),
	) );

	register_nav_menus( array(
		'principal'          => __( 'Navegação Principal (Header)', 'academia-da-barbearia' ),
		'rodape-institucional'  => __( 'Rodapé — Institucional', 'academia-da-barbearia' ),
		'rodape-biblioteca'     => __( 'Rodapé — Biblioteca', 'academia-da-barbearia' ),
		'rodape-recomenda'      => __( 'Rodapé — Academia Recomenda', 'academia-da-barbearia' ),
	) );

	// Tamanhos de imagem — 16:9 para Card de Artigo/Notícia (PORTAL_DESIGN_SYSTEM.md, Seção 7).
	add_image_size( 'ab-card-16-9', 640, 360, true );
	add_image_size( 'ab-card-4-3', 640, 480, true );
	add_image_size( 'ab-produto-quadrado', 600, 600, true );
}
add_action( 'after_setup_theme', 'ab_configurar_tema' );

/**
 * Largura padrão de conteúdo embutido (oEmbed, imagens de largura total).
 */
function ab_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'ab_content_width', 0 );

/**
 * Blocos customizados essenciais do editor (Gutenberg) — Card, Callout, Selo de Avaliação.
 * Registrados como blocos server-side simples via render_callback, sem dependência de build step
 * (nenhum bundler é exigido para blocos desta complexidade).
 */
function ab_registrar_blocos() {
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	register_block_type( 'academia-da-barbearia/callout', array(
		'render_callback' => function ( $atributos, $conteudo ) {
			return '<div class="ab-callout">' . $conteudo . '</div>';
		},
		'attributes'      => array(),
	) );

	register_block_type( 'academia-da-barbearia/caixa-metodo', array(
		'render_callback' => function ( $atributos, $conteudo ) {
			return '<div class="ab-caixa-metodo">' . $conteudo . '</div>';
		},
		'attributes'      => array(),
	) );
}
add_action( 'init', 'ab_registrar_blocos' );

/**
 * Sanitiza e limita os campos exibidos no admin para os CPTs do tema (colunas de listagem).
 * Facilita a operação editorial diária sem exigir plugin adicional.
 */
function ab_colunas_admin_produto( $colunas ) {
	$novas = array();
	foreach ( $colunas as $chave => $rotulo ) {
		$novas[ $chave ] = $rotulo;
		if ( 'title' === $chave ) {
			$novas['ab_selo']  = __( 'Selo', 'academia-da-barbearia' );
			$novas['ab_preco'] = __( 'Preço Atual', 'academia-da-barbearia' );
		}
	}
	return $novas;
}
add_filter( 'manage_produto_posts_columns', 'ab_colunas_admin_produto' );

function ab_colunas_admin_produto_conteudo( $coluna, $post_id ) {
	if ( 'ab_selo' === $coluna ) {
		$mapa = array(
			'recomendado'      => '🟢 RECOMENDADO',
			'ressalvas'        => '🟡 RECOMENDADO COM RESSALVAS',
			'especializado'    => '🔵 ESPECIALIZADO',
			'nao-recomendado'  => '🔴 NÃO RECOMENDADO',
		);
		$valor = get_post_meta( $post_id, 'ab_selo', true );
		echo esc_html( $mapa[ $valor ] ?? '—' );
	}
	if ( 'ab_preco' === $coluna ) {
		$preco = get_post_meta( $post_id, 'ab_preco_atual', true );
		echo $preco ? esc_html( 'R$ ' . $preco ) : '—';
	}
}
add_action( 'manage_produto_posts_custom_column', 'ab_colunas_admin_produto_conteudo', 10, 2 );

/**
 * Navegação inteligente por âncora (PORTAL_COMPONENTES.md, 1.1): na Home, os
 * itens do menu rolam até a seção correspondente na própria página; em
 * qualquer outra página, navegam normalmente para a página dedicada.
 * É o mesmo link, resolvido de forma diferente conforme o contexto — nunca
 * dois menus distintos.
 *
 * @param string $slug_pagina Slug da página dedicada (ex.: 'biblioteca').
 * @param string $id_ancora   ID da seção correspondente na Home (ex.: 'secao-biblioteca').
 * @return string URL final do link de navegação.
 */
function ab_href_nav( $slug_pagina, $id_ancora ) {
	if ( is_front_page() ) {
		return '#' . $id_ancora;
	}
	return home_url( '/' . $slug_pagina . '/' );
}

/**
 * Processa o Formulário de Newsletter (PORTAL_COMPONENTES.md, 5.1).
 *
 * Este handler valida e registra a inscrição via `ab_newsletter_inscricao`
 * (action hook) — o envio real para uma ferramenta de e-mail marketing
 * (Mailchimp, Brevo, etc.) é um ponto de extensão futuro, já que a escolha
 * de ferramenta segue em aberto em PORTAL_ANALYTICS_KPIS.md. Nesta fase, o
 * e-mail é apenas validado e a ação é disparada para quem quiser conectá-la.
 */
function ab_processar_newsletter() {
	if ( ! isset( $_POST['ab_newsletter_nonce'] ) || ! wp_verify_nonce( $_POST['ab_newsletter_nonce'], 'ab_newsletter' ) ) {
		wp_safe_redirect( add_query_arg( 'newsletter', 'erro', wp_get_referer() ?: home_url( '/' ) ) );
		exit;
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'newsletter', 'erro', wp_get_referer() ?: home_url( '/' ) ) );
		exit;
	}

	/**
	 * Disparado com um e-mail válido — conectar aqui à ferramenta de e-mail
	 * marketing escolhida (ver PORTAL_ANALYTICS_KPIS.md).
	 */
	do_action( 'ab_newsletter_inscricao', $email );

	wp_safe_redirect( add_query_arg( 'newsletter', 'sucesso', wp_get_referer() ?: home_url( '/' ) ) );
	exit;
}
add_action( 'admin_post_ab_newsletter_inscricao', 'ab_processar_newsletter' );
add_action( 'admin_post_nopriv_ab_newsletter_inscricao', 'ab_processar_newsletter' );

/**
 * Processa o Formulário de Contato (PORTAL_COMPONENTES.md, 5.2). Envia por
 * e-mail para o administrador via wp_mail() — suficiente para o volume
 * esperado no lançamento; migrar para serviço transacional dedicado se o
 * volume de mensagens crescer.
 */
function ab_processar_contato() {
	if ( ! isset( $_POST['ab_contato_nonce'] ) || ! wp_verify_nonce( $_POST['ab_contato_nonce'], 'ab_contato' ) ) {
		wp_die( esc_html__( 'Não foi possível validar o formulário. Volte e tente novamente.', 'academia-da-barbearia' ) );
	}

	$nome     = isset( $_POST['nome'] ) ? sanitize_text_field( wp_unslash( $_POST['nome'] ) ) : '';
	$email    = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$assunto  = isset( $_POST['assunto'] ) ? sanitize_text_field( wp_unslash( $_POST['assunto'] ) ) : '';
	$mensagem = isset( $_POST['mensagem'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensagem'] ) ) : '';

	if ( ! $nome || ! is_email( $email ) || ! $mensagem ) {
		wp_safe_redirect( add_query_arg( 'contato', 'erro', wp_get_referer() ?: home_url( '/contato/' ) ) );
		exit;
	}

	$corpo = sprintf(
		"Nome: %s\nE-mail: %s\nAssunto: %s\n\nMensagem:\n%s",
		$nome,
		$email,
		$assunto,
		$mensagem
	);

	wp_mail( get_bloginfo( 'admin_email' ), '[Contato do Portal] ' . $assunto, $corpo, array( 'Reply-To: ' . $email ) );

	wp_safe_redirect( add_query_arg( 'contato', 'sucesso', home_url( '/contato/' ) ) );
	exit;
}
add_action( 'admin_post_ab_contato_envio', 'ab_processar_contato' );
add_action( 'admin_post_nopriv_ab_contato_envio', 'ab_processar_contato' );
