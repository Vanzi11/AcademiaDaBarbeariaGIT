<?php
/**
 * Campos customizados estruturados — via Advanced Custom Fields (ACF), conforme
 * TEMA_WORDPRESS_AB.md, Seção 1.2 ("campos customizados estruturados... para
 * dados de produto, ficha técnica, metadados de avaliação — dados estruturados
 * não pertencem ao corpo do artigo; pertencem a campos").
 *
 * Registrado via acf_add_local_field_group() (PHP), não via JSON sync, para que
 * os campos vivam no controle de versão do tema, como o restante do código
 * (TEMA_WORDPRESS_AB.md, Seção 8).
 *
 * Este arquivo depende do plugin ACF (ou ACF PRO) estar ativo. Nenhum campo é
 * registrado se o plugin não estiver presente — o tema não força a instalação
 * de um plugin específico fora deste ponto de extensão.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ab_registrar_campos_artigo() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_artigo',
		'title'    => __( 'Metadados do Artigo', 'academia-da-barbearia' ),
		'fields'   => array(
			array(
				'key'   => 'field_artigo_tempo_leitura',
				'label' => __( 'Tempo de leitura (minutos)', 'academia-da-barbearia' ),
				'name'  => 'ab_tempo_leitura',
				'type'  => 'number',
				'min'   => 1,
			),
			array(
				'key'   => 'field_artigo_fonte',
				'label' => __( 'Fonte (quando aplicável)', 'academia-da-barbearia' ),
				'name'  => 'ab_fonte',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_artigo_resumo_executivo',
				'label'        => __( 'Resumo Executivo (opcional)', 'academia-da-barbearia' ),
				'name'         => 'ab_resumo_executivo',
				'type'         => 'textarea',
				'instructions' => __( 'Recomendado em artigos longos — PORTAL_COMPONENTES.md, 3.3.', 'academia-da-barbearia' ),
				'rows'         => 3,
			),
			array(
				'key'   => 'field_artigo_meta_title',
				'label' => __( 'Meta Title (SEO, opcional)', 'academia-da-barbearia' ),
				'name'  => 'ab_meta_title',
				'type'  => 'text',
				'instructions' => __( 'Até 60 caracteres. Se vazio, usa o título do artigo (PORTAL_SEO.md, Seção 3).', 'academia-da-barbearia' ),
			),
			array(
				'key'          => 'field_artigo_categoria_produto_relacionada',
				'label'        => __( 'Categoria de Produto Relacionada', 'academia-da-barbearia' ),
				'name'         => 'ab_categoria_produto_relacionada',
				'type'         => 'taxonomy',
				'taxonomy'     => 'categoria_produto',
				'field_type'   => 'select',
				'allow_null'   => 1,
				'instructions' => __( 'Todo artigo que menciona uma categoria de produto deve linkar para ela (PORTAL_ARQUITETURA.md, Seção 5).', 'academia-da-barbearia' ),
			),
			array(
				'key'   => 'field_artigo_meta_description',
				'label' => __( 'Meta Description (SEO, opcional)', 'academia-da-barbearia' ),
				'name'  => 'ab_meta_description',
				'type'  => 'textarea',
				'rows'  => 2,
				'instructions' => __( 'Até 155 caracteres. Se vazio, usa o resumo/excerpt.', 'academia-da-barbearia' ),
			),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'artigo' ),
			),
		),
	) );
}
add_action( 'acf/init', 'ab_registrar_campos_artigo' );

function ab_registrar_campos_produto() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_produto',
		'title'  => __( 'Ficha Técnica de Produto (Academia Recomenda)', 'academia-da-barbearia' ),
		'fields' => array(
			array(
				'key'           => 'field_produto_selo',
				'label'         => __( 'Selo Academia', 'academia-da-barbearia' ),
				'name'          => 'ab_selo',
				'type'          => 'select',
				'instructions'  => __( 'Conclusão editorial — FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md. Valores fechados, não extensíveis.', 'academia-da-barbearia' ),
				'choices'       => array(
					'recomendado'     => '🟢 RECOMENDADO',
					'ressalvas'       => '🟡 RECOMENDADO COM RESSALVAS',
					'especializado'   => '🔵 ESPECIALIZADO',
					'nao-recomendado' => '🔴 NÃO RECOMENDADO',
				),
				'required'      => 1,
			),
			array(
				'key'          => 'field_produto_nota_geral',
				'label'        => __( 'Nota Geral (0–10)', 'academia-da-barbearia' ),
				'name'         => 'ab_nota_geral',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 10,
				'step'         => 0.1,
				'instructions' => __( 'Camada quantitativa complementar — nunca substitui o Selo como conclusão (PORTAL_COMPONENTES.md, 3.5).', 'academia-da-barbearia' ),
			),
			array( 'key' => 'field_produto_marca', 'label' => __( 'Marca', 'academia-da-barbearia' ), 'name' => 'ab_marca', 'type' => 'text' ),
			array( 'key' => 'field_produto_modelo', 'label' => __( 'Modelo', 'academia-da-barbearia' ), 'name' => 'ab_modelo', 'type' => 'text' ),
			array( 'key' => 'field_produto_preco_atual', 'label' => __( 'Preço Atual (R$)', 'academia-da-barbearia' ), 'name' => 'ab_preco_atual', 'type' => 'number', 'step' => 0.01 ),
			array( 'key' => 'field_produto_menor_preco', 'label' => __( 'Menor Preço Histórico (R$)', 'academia-da-barbearia' ), 'name' => 'ab_menor_preco_historico', 'type' => 'number', 'step' => 0.01 ),
			array( 'key' => 'field_produto_preco_medio', 'label' => __( 'Preço Médio (R$)', 'academia-da-barbearia' ), 'name' => 'ab_preco_medio', 'type' => 'number', 'step' => 0.01 ),
			array(
				'key'     => 'field_produto_tendencia_preco',
				'label'   => __( 'Tendência de Preço', 'academia-da-barbearia' ),
				'name'    => 'ab_tendencia_preco',
				'type'    => 'select',
				'choices' => array( 'estavel' => __( 'Estável', 'academia-da-barbearia' ), 'subindo' => __( 'Subindo', 'academia-da-barbearia' ), 'caindo' => __( 'Caindo', 'academia-da-barbearia' ) ),
			),
			array( 'key' => 'field_produto_resumo_executivo', 'label' => __( 'Resumo Executivo', 'academia-da-barbearia' ), 'name' => 'ab_resumo_executivo', 'type' => 'textarea', 'rows' => 2, 'required' => 1 ),
			array( 'key' => 'field_produto_para_quem_e', 'label' => __( 'Para Quem É', 'academia-da-barbearia' ), 'name' => 'ab_para_quem_e', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_produto_para_quem_nao_e', 'label' => __( 'Para Quem NÃO É', 'academia-da-barbearia' ), 'name' => 'ab_para_quem_nao_e', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_produto_pontos_fortes', 'label' => __( 'Pontos Fortes', 'academia-da-barbearia' ), 'name' => 'ab_pontos_fortes', 'type' => 'textarea', 'rows' => 4, 'instructions' => __( 'Um por linha, 3 a 5 itens.', 'academia-da-barbearia' ) ),
			array( 'key' => 'field_produto_pontos_fracos', 'label' => __( 'Pontos Fracos', 'academia-da-barbearia' ), 'name' => 'ab_pontos_fracos', 'type' => 'textarea', 'rows' => 4 ),
			array( 'key' => 'field_produto_vale_o_preco', 'label' => __( 'Vale o Preço?', 'academia-da-barbearia' ), 'name' => 'ab_vale_o_preco', 'type' => 'select', 'choices' => array( 'sim' => 'Sim', 'nao' => 'Não', 'depende' => 'Depende' ) ),
			array( 'key' => 'field_produto_vale_o_preco_texto', 'label' => __( 'Explicação (Vale o Preço)', 'academia-da-barbearia' ), 'name' => 'ab_vale_o_preco_texto', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_produto_quando_comprar', 'label' => __( 'Quando Comprar', 'academia-da-barbearia' ), 'name' => 'ab_quando_comprar', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_produto_quando_nao_comprar', 'label' => __( 'Quando NÃO Comprar', 'academia-da-barbearia' ), 'name' => 'ab_quando_nao_comprar', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_produto_melhor_alternativa', 'label' => __( 'Melhor Alternativa', 'academia-da-barbearia' ), 'name' => 'ab_melhor_alternativa', 'type' => 'post_object', 'post_type' => array( 'produto' ) ),
			array( 'key' => 'field_produto_relacionados', 'label' => __( 'Produtos Relacionados', 'academia-da-barbearia' ), 'name' => 'ab_produtos_relacionados', 'type' => 'relationship', 'post_type' => array( 'produto' ), 'max' => 4 ),
			array( 'key' => 'field_produto_artigo_contexto', 'label' => __( 'Artigo de Contexto (Biblioteca)', 'academia-da-barbearia' ), 'name' => 'ab_artigo_contexto', 'type' => 'post_object', 'post_type' => array( 'artigo' ), 'instructions' => __( 'Obrigatório por PORTAL_ARQUITETURA.md, Seção 5 — toda ficha linka para ao menos um artigo.', 'academia-da-barbearia' ) ),
			array( 'key' => 'field_produto_link_afiliado', 'label' => __( 'Link de Afiliado (Onde Comprar)', 'academia-da-barbearia' ), 'name' => 'ab_link_afiliado', 'type' => 'url', 'required' => 1 ),
			array( 'key' => 'field_produto_link_telegram', 'label' => __( 'Link do Canal Telegram (opcional)', 'academia-da-barbearia' ), 'name' => 'ab_link_telegram', 'type' => 'url' ),
			array( 'key' => 'field_produto_link_whatsapp', 'label' => __( 'Link do Canal WhatsApp (opcional)', 'academia-da-barbearia' ), 'name' => 'ab_link_whatsapp', 'type' => 'url' ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'produto' ) ),
		),
	) );
}
add_action( 'acf/init', 'ab_registrar_campos_produto' );

function ab_registrar_campos_produto_proprio() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_produto_proprio',
		'title'  => __( 'Produto Próprio da Academia', 'academia-da-barbearia' ),
		'fields' => array(
			array( 'key' => 'field_pp_proposta_valor', 'label' => __( 'Proposta de Valor (1 linha)', 'academia-da-barbearia' ), 'name' => 'ab_proposta_valor', 'type' => 'text', 'required' => 1 ),
			array( 'key' => 'field_pp_preco', 'label' => __( 'Preço (ou "a partir de")', 'academia-da-barbearia' ), 'name' => 'ab_preco_exibicao', 'type' => 'text' ),
			array( 'key' => 'field_pp_url_checkout', 'label' => __( 'URL de checkout/página de vendas', 'academia-da-barbearia' ), 'name' => 'ab_url_checkout', 'type' => 'url' ),
			array( 'key' => 'field_pp_artigo_contexto', 'label' => __( 'Artigo relacionado (mesma etapa FDP-AB)', 'academia-da-barbearia' ), 'name' => 'ab_artigo_contexto', 'type' => 'post_object', 'post_type' => array( 'artigo' ) ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'produto_proprio' ) ),
		),
	) );
}
add_action( 'acf/init', 'ab_registrar_campos_produto_proprio' );
