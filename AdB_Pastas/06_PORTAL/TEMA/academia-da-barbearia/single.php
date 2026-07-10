<?php
/**
 * Single genérico — fallback para o post type nativo `post`, não utilizado
 * como conteúdo principal do Portal (todo conteúdo editorial usa o CPT
 * `artigo`), mas mantido por exigência da hierarquia de templates do
 * WordPress e para compatibilidade com plugins que criam posts nativos.
 *
 * @package Academia_Da_Barbearia
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'ab-secao ab-secao--claro' ); ?>>
		<div class="ab-container ab-conteudo-editorial" style="max-width: 760px; margin: 0 auto;">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
