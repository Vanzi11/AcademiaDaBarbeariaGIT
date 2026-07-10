<?php
/**
 * Index — fallback obrigatório do WordPress, usado apenas quando nenhum
 * template mais específico da hierarquia de templates se aplica.
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php if ( have_posts() ) : ?>
		<ul class="ab-grid-cards">
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
			<?php get_template_part( 'template-parts/components/estado-vazio' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
