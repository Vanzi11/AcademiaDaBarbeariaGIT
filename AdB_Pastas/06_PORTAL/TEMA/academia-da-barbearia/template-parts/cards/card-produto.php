<?php
/**
 * Card de Produto (Academia Recomenda) — PORTAL_COMPONENTES.md, 2.2.
 * O selo é obrigatório e nunca pode ser omitido (herança direta do
 * FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md). Reutilizado em: Home, arquivo de
 * Academia Recomenda, blocos de "Relacionados", comparativos.
 *
 * Regra de conteúdo (HOME_WIREFRAME.md, Seção 3): nenhum preço em destaque
 * tipográfico grande — o preço aparece pequeno, nunca como elemento mais
 * chamativo. Isso é o que distingue "curadoria" de "loja".
 *
 * @package Academia_Da_Barbearia
 * @var array $args { post_id?: int }
 */

$ab_post_id    = $args['post_id'] ?? get_the_ID();
$ab_selo_valor = function_exists( 'get_field' ) ? get_field( 'ab_selo', $ab_post_id ) : '';
$ab_selos      = array(
	'recomendado'     => array( 'label' => '🟢 RECOMENDADO', 'classe' => 'ab-selo--recomendado' ),
	'ressalvas'       => array( 'label' => '🟡 RECOMENDADO COM RESSALVAS', 'classe' => 'ab-selo--ressalvas' ),
	'especializado'   => array( 'label' => '🔵 ESPECIALIZADO', 'classe' => 'ab-selo--especializado' ),
	'nao-recomendado' => array( 'label' => '🔴 NÃO RECOMENDADO', 'classe' => 'ab-selo--nao-recomendado' ),
);
$ab_selo       = $ab_selos[ $ab_selo_valor ] ?? null;
$ab_preco      = function_exists( 'get_field' ) ? get_field( 'ab_preco_atual', $ab_post_id ) : '';
$ab_resumo     = function_exists( 'get_field' ) ? get_field( 'ab_resumo_executivo', $ab_post_id ) : '';
$ab_categorias = get_the_terms( $ab_post_id, 'categoria_produto' );
$ab_categoria  = ( $ab_categorias && ! is_wp_error( $ab_categorias ) ) ? $ab_categorias[0]->name : '';
?>
<a class="ab-card ab-card--produto" href="<?php echo esc_url( get_permalink( $ab_post_id ) ); ?>">
	<div class="ab-card__imagem">
		<?php if ( $ab_selo ) : ?>
			<span class="ab-selo <?php echo esc_attr( $ab_selo['classe'] ); ?>"><span class="ab-selo__ponto">●</span> <?php echo esc_html( $ab_selo['label'] ); ?></span>
		<?php endif; ?>
		<?php if ( has_post_thumbnail( $ab_post_id ) ) : ?>
			<?php echo get_the_post_thumbnail( $ab_post_id, 'ab-produto-quadrado', array( 'alt' => get_the_title( $ab_post_id ), 'loading' => 'lazy' ) ); ?>
		<?php endif; ?>
	</div>
	<div class="ab-card__corpo">
		<span class="ab-card__categoria"><?php echo esc_html( $ab_categoria ); ?></span>
		<h4 class="ab-card__titulo"><?php echo esc_html( get_the_title( $ab_post_id ) ); ?></h4>
		<p class="ab-card__resumo"><?php echo esc_html( $ab_resumo ); ?></p>
		<?php if ( $ab_preco ) : ?>
			<span class="ab-card__preco"><?php printf( esc_html__( 'A partir de R$ %s', 'academia-da-barbearia' ), esc_html( number_format_i18n( $ab_preco, 2 ) ) ); ?></span>
		<?php endif; ?>
	</div>
</a>
