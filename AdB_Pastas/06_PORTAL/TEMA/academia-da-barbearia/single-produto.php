<?php
/**
 * Ficha de Produto individual (Academia Recomenda) — a estrutura de conteúdo
 * é inteiramente definida por template-parts/blocks/ficha-tecnica-produto.php,
 * que implementa a sequência oficial obrigatória do
 * FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md.
 *
 * @package Academia_Da_Barbearia
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'ab-secao ab-secao--claro' ); ?>>
		<div class="ab-container" style="max-width: 760px;">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

			<h1><?php the_title(); ?></h1>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="ab-mt-6">
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'style' => 'border-radius:var(--raio); width:100%;' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="ab-conteudo-editorial ab-mt-8">
				<?php get_template_part( 'template-parts/blocks/ficha-tecnica-produto' ); ?>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
