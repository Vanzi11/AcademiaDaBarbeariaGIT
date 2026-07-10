<?php
/**
 * Seção "Da Biblioteca" da Home — HOME_WIREFRAME.md, Seção 4.
 * Máxima simplicidade — sem selo, sem preço, sem CTA colorido no card.
 *
 * @package Academia_Da_Barbearia
 */

$ab_artigos = new WP_Query( array(
	'post_type'      => 'artigo',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'formato',
			'field'    => 'slug',
			'terms'    => 'noticia',
			'operator' => 'NOT IN',
		),
	),
) );
?>
<section class="ab-secao ab-secao--claro" id="secao-biblioteca">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Biblioteca da Academia', 'academia-da-barbearia' ) ) ); ?>
		<div class="ab-secao__cabecalho">
			<div>
				<h2><?php esc_html_e( 'Da Biblioteca', 'academia-da-barbearia' ); ?></h2>
				<p><?php esc_html_e( 'Conhecimento permanente para profissionais que querem evoluir.', 'academia-da-barbearia' ); ?></p>
			</div>
			<a class="ab-link" href="<?php echo esc_url( home_url( '/biblioteca/' ) ); ?>"><?php esc_html_e( 'Ver tudo', 'academia-da-barbearia' ); ?> →</a>
		</div>

		<?php if ( $ab_artigos->have_posts() ) : ?>
		<ul class="ab-grid-cards">
			<?php while ( $ab_artigos->have_posts() ) : $ab_artigos->the_post(); ?>
				<li><?php get_template_part( 'template-parts/cards/card-artigo' ); ?></li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php else : ?>
			<p><?php esc_html_e( 'Em breve, os primeiros artigos da Biblioteca.', 'academia-da-barbearia' ); ?></p>
		<?php endif; ?>
	</div>
</section>
