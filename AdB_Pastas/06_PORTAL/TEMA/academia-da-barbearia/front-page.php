<?php
/**
 * Home — TEMA_WORDPRESS_AB.md, Seção 4.1 / HOME_WIREFRAME.md.
 * Sequência de template-parts na ordem definida em PAGINAS/HOME.md.
 * Ritmo Escuro → Claro → Escuro → Claro → Escuro (HOME_WIREFRAME.md,
 * "Princípio de Ritmo Visual").
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<?php get_template_part( 'template-parts/components/hero-home' ); ?>
<?php get_template_part( 'template-parts/components/busca-destaque' ); ?>
<?php get_template_part( 'template-parts/cards/secao-academia-recomenda' ); ?>
<?php get_template_part( 'template-parts/cards/secao-biblioteca' ); ?>
<?php get_template_part( 'template-parts/cards/secao-radar-mercado' ); ?>
<?php get_template_part( 'template-parts/components/cta-produto-home' ); ?>

<section class="ab-secao ab-secao--claro" id="newsletter">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/newsletter' ); ?>
	</div>
</section>

<?php
get_footer();
