<?php
/**
 * Seção "Academia Recomenda" da Home — HOME_WIREFRAME.md, Seção 3.
 * Curadoria, nunca marketplace: 3 produtos em destaque, fotografia grande,
 * selo discreto — nunca grade densa de preços e badges de desconto.
 *
 * @package Academia_Da_Barbearia
 */

$ab_produtos = new WP_Query( array(
	'post_type'      => 'produto',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>
<section class="ab-secao ab-secao--claro" id="secao-recomenda">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Curadoria da Academia', 'academia-da-barbearia' ) ) ); ?>
		<div class="ab-secao__cabecalho">
			<div>
				<h2><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></h2>
				<p><?php esc_html_e( 'Curadoria técnica para decisões de compra mais seguras.', 'academia-da-barbearia' ); ?></p>
			</div>
			<a class="ab-link" href="<?php echo esc_url( home_url( '/academia-recomenda/' ) ); ?>"><?php esc_html_e( 'Ver tudo', 'academia-da-barbearia' ); ?> →</a>
		</div>

		<?php if ( $ab_produtos->have_posts() ) : ?>
		<ul class="ab-grid-cards">
			<?php while ( $ab_produtos->have_posts() ) : $ab_produtos->the_post(); ?>
				<li><?php get_template_part( 'template-parts/cards/card-produto' ); ?></li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php else : ?>
			<p><?php esc_html_e( 'Em breve, as primeiras curadorias da Academia Recomenda.', 'academia-da-barbearia' ); ?></p>
		<?php endif; ?>
	</div>
</section>
