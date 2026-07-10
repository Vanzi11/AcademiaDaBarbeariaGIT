<?php
/**
 * Arquivo de `artigo` — cumpre dois papéis, conforme PORTAL_ARQUITETURA.md,
 * Seção 1 e 4: "arquivo geral da Biblioteca" (/biblioteca/) por padrão, e
 * "arquivo cronológico da Academia News" (/academia-news/) quando a query
 * está filtrada pela taxonomia `formato` (termo `noticia`, ver
 * inc/custom-post-types.php). O mesmo template serve às duas seções porque a
 * estrutura de listagem é idêntica (grade de Card de Artigo) — apenas o
 * cabeçalho e o filtro disponível mudam, conforme
 * PORTAL_ARQUITETURA.md ("Biblioteca e Academia News... distinção é temporal
 * e de intenção", não uma diferença de estrutura de listagem).
 *
 * @package Academia_Da_Barbearia
 */

get_header();

$ab_eh_news = 'noticia' === get_query_var( 'formato' );
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

		<h1><?php echo $ab_eh_news ? esc_html__( 'Academia News', 'academia-da-barbearia' ) : esc_html__( 'Biblioteca', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande">
			<?php
			echo $ab_eh_news
				? esc_html__( 'Notícias e atualizações do setor da barbearia.', 'academia-da-barbearia' )
				: esc_html__( 'Conhecimento permanente para profissionais que querem evoluir — gestão, técnica, atendimento, marketing e mais.', 'academia-da-barbearia' );
			?>
		</p>

		<?php if ( ! $ab_eh_news ) : ?>
			<div class="ab-mt-6">
				<?php get_template_part( 'template-parts/components/filtros', null, array( 'taxonomia' => 'categoria_conteudo' ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
		<ul class="ab-grid-cards ab-mt-6">
			<?php while ( have_posts() ) : the_post(); ?>
				<li><?php get_template_part( 'template-parts/cards/card-artigo' ); ?></li>
			<?php endwhile; ?>
		</ul>
		<?php get_template_part( 'template-parts/components/paginacao' ); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/components/estado-vazio' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
