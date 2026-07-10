<?php
/**
 * Seção "Radar do Mercado" da Home (Academia News) — HOME_WIREFRAME.md, Seção 5.
 * Lista compacta, nunca cards com imagem — comunica "varredura rápida",
 * não "revista". Máximo 4 itens.
 *
 * @package Academia_Da_Barbearia
 */

$ab_noticias = new WP_Query( array(
	'post_type'      => 'artigo',
	'posts_per_page' => 4,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'formato',
			'field'    => 'slug',
			'terms'    => 'noticia',
		),
	),
) );
?>
<section class="ab-secao ab-secao--escuro" id="secao-news">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Radar da Academia', 'academia-da-barbearia' ) ) ); ?>
		<div class="ab-secao__cabecalho">
			<h2><?php esc_html_e( 'Radar do Mercado — Academia News', 'academia-da-barbearia' ); ?></h2>
			<a class="ab-link" href="<?php echo esc_url( home_url( '/academia-news/' ) ); ?>"><?php esc_html_e( 'Ver tudo', 'academia-da-barbearia' ); ?> →</a>
		</div>

		<?php if ( $ab_noticias->have_posts() ) : ?>
		<div class="ab-radar">
			<?php while ( $ab_noticias->have_posts() ) : $ab_noticias->the_post(); ?>
				<?php get_template_part( 'template-parts/cards/radar-item' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Em breve, as primeiras notícias do setor.', 'academia-da-barbearia' ); ?></p>
		<?php endif; ?>
	</div>
</section>
