<?php
/**
 * Página genérica — fallback para páginas institucionais simples sem layout
 * próprio (Política de Privacidade, Termos de Uso, e qualquer outra Página
 * criada no admin sem template dedicado).
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<article class="ab-secao ab-secao--claro">
	<div class="ab-container ab-conteudo-editorial" style="max-width: 760px; margin: 0 auto;">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</article>

<?php get_footer(); ?>
