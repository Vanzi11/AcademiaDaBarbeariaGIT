<?php
/**
 * Resultados de busca (/busca/?q=...) — PORTAL_COMPONENTES.md, 1.3.
 * Resultados exibidos com o mesmo componente de card usado nas listagens,
 * diferenciado por tipo de conteúdo (Artigo ou Produto).
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<h1>
			<?php
			printf(
				/* translators: %s: termo buscado */
				esc_html__( 'Resultados para "%s"', 'academia-da-barbearia' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>

		<?php if ( have_posts() ) : ?>
		<ul class="ab-grid-cards ab-mt-6">
			<?php
			while ( have_posts() ) :
				the_post();
				if ( 'produto' === get_post_type() ) {
					get_template_part( 'template-parts/cards/card-produto' );
				} elseif ( 'produto_proprio' === get_post_type() ) {
					get_template_part( 'template-parts/cards/card-produto-proprio' );
				} else {
					get_template_part( 'template-parts/cards/card-artigo' );
				}
				?>
			<?php endwhile; ?>
		</ul>
		<?php get_template_part( 'template-parts/components/paginacao' ); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/components/estado-vazio', null, array( 'termo' => get_search_query() ) ); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
