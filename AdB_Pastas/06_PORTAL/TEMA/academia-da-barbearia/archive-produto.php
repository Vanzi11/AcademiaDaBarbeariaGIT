<?php
/**
 * Arquivo geral da Academia Recomenda (/academia-recomenda/) — PORTAL_ARQUITETURA.md,
 * Seção 4. Filtro por categoria-pai de produto (PORTAL_COMPONENTES.md, 1.6).
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<h1><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande"><?php esc_html_e( 'Curadoria técnica para decisões de compra mais seguras — nunca uma vitrine de ofertas.', 'academia-da-barbearia' ); ?></p>

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
