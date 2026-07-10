<?php
/**
 * Vitrine de Produtos Próprios (/produtos/) — PORTAL_ARQUITETURA.md, Seção 3.4.
 * Sem taxonomia enquanto o catálogo for pequeno — reavaliar apenas quando
 * ultrapassar ~10 produtos simultâneos (mesma seção, 3.4).
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<h1><?php esc_html_e( 'Produtos da Academia', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande"><?php esc_html_e( 'Produtos digitais próprios, criados para colocar o conhecimento da Academia em prática.', 'academia-da-barbearia' ); ?></p>

		<?php if ( have_posts() ) : ?>
		<ul class="ab-grid-cards ab-mt-6">
			<?php while ( have_posts() ) : the_post(); ?>
				<li><?php get_template_part( 'template-parts/cards/card-produto-proprio' ); ?></li>
			<?php endwhile; ?>
		</ul>
		<?php get_template_part( 'template-parts/components/paginacao' ); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/components/estado-vazio' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
