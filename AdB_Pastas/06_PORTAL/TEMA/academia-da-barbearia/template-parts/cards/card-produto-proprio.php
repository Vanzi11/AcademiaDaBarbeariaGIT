<?php
/**
 * Card de Produto Próprio (Produtos) — PORTAL_COMPONENTES.md, 2.3.
 * Usado na Home (vitrine única na fase atual) e em /produtos/.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { post_id?: int }
 */

$ab_post_id = $args['post_id'] ?? get_the_ID();
$ab_proposta = function_exists( 'get_field' ) ? get_field( 'ab_proposta_valor', $ab_post_id ) : '';
$ab_preco    = function_exists( 'get_field' ) ? get_field( 'ab_preco_exibicao', $ab_post_id ) : '';
?>
<div class="ab-card ab-card--produto-proprio">
	<div class="ab-card__imagem">
		<?php if ( has_post_thumbnail( $ab_post_id ) ) : ?>
			<?php echo get_the_post_thumbnail( $ab_post_id, 'ab-card-4-3', array( 'alt' => get_the_title( $ab_post_id ), 'loading' => 'lazy' ) ); ?>
		<?php endif; ?>
	</div>
	<div class="ab-card__corpo">
		<h4 class="ab-card__titulo"><?php echo esc_html( get_the_title( $ab_post_id ) ); ?></h4>
		<?php if ( $ab_proposta ) : ?><p class="ab-card__resumo"><?php echo esc_html( $ab_proposta ); ?></p><?php endif; ?>
		<?php if ( $ab_preco ) : ?><span class="ab-card__preco"><?php echo esc_html( $ab_preco ); ?></span><?php endif; ?>
		<div class="ab-card__acao">
			<a class="ab-botao ab-botao--secundario" href="<?php echo esc_url( get_permalink( $ab_post_id ) ); ?>"><?php esc_html_e( 'Ver produto', 'academia-da-barbearia' ); ?></a>
		</div>
	</div>
</div>
