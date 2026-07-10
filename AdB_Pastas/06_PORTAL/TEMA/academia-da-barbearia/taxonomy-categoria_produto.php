<?php
/**
 * Arquivo por categoria/subcategoria de produto (/academia-recomenda/{categoria}/) —
 * PORTAL_ARQUITETURA.md, Seção 3.2 e 4.
 *
 * @package Academia_Da_Barbearia
 */

get_header();
$ab_termo = get_queried_object();
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<h1><?php single_term_title(); ?></h1>
		<?php if ( $ab_termo && ! empty( $ab_termo->description ) ) : ?>
			<p class="ab-corpo-grande"><?php echo esc_html( $ab_termo->description ); ?></p>
		<?php endif; ?>

		<div class="ab-mt-6">
			<?php get_template_part( 'template-parts/components/filtros', null, array( 'taxonomia' => 'categoria_produto' ) ); ?>
		</div>

		<?php if ( have_posts() ) : ?>
		<ul class="ab-grid-cards ab-mt-6">
			<?php while ( have_posts() ) : the_post(); ?>
				<li><?php get_template_part( 'template-parts/cards/card-produto' ); ?></li>
			<?php endwhile; ?>
		</ul>
		<?php get_template_part( 'template-parts/components/paginacao' ); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/components/estado-vazio' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
