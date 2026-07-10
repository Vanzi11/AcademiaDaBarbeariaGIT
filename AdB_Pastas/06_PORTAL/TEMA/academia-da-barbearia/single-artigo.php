<?php
/**
 * Artigo individual (Biblioteca ou Academia News) — hierarquia de leitura
 * conforme PORTAL_ARQUITETURA.md, Seção 6: Breadcrumb → Categoria/metadado →
 * Título → Resumo (quando houver) → Corpo → CTA contextual → Relacionados.
 *
 * @package Academia_Da_Barbearia
 */

get_header();

while ( have_posts() ) :
	the_post();

	$ab_eh_noticia    = has_term( 'noticia', 'formato' );
	$ab_categorias    = get_the_terms( get_the_ID(), 'categoria_conteudo' );
	$ab_categoria     = ( $ab_categorias && ! is_wp_error( $ab_categorias ) ) ? $ab_categorias[0] : null;
	$ab_tempo_leitura = function_exists( 'get_field' ) ? get_field( 'ab_tempo_leitura' ) : '';
	$ab_resumo        = function_exists( 'get_field' ) ? get_field( 'ab_resumo_executivo' ) : '';
	?>
	<article <?php post_class( 'ab-secao ab-secao--claro' ); ?>>
		<div class="ab-container" style="max-width: 760px;">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

			<p class="ab-card__categoria">
				<?php echo $ab_categoria ? esc_html( $ab_categoria->name ) : esc_html__( 'Academia News', 'academia-da-barbearia' ); ?>
				· <span class="ab-legenda"><?php echo $ab_tempo_leitura ? sprintf( esc_html__( '%d min leitura', 'academia-da-barbearia' ), (int) $ab_tempo_leitura ) : esc_html( ab_data_ultima_atualizacao() ); ?></span>
			</p>

			<h1><?php the_title(); ?></h1>

			<?php if ( $ab_resumo ) : ?>
				<div class="ab-resumo-executivo">
					<p class="ab-mb-0"><?php echo esc_html( $ab_resumo ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="ab-mt-6">
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'style' => 'border-radius:var(--raio); width:100%;' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="ab-conteudo-editorial ab-mt-8">
				<?php the_content(); ?>
			</div>

			<p class="ab-legenda ab-mt-6"><?php echo esc_html( ab_data_ultima_atualizacao() ); ?></p>
		</div>
	</article>

	<?php
	// Relacionamento obrigatório: artigo → ficha da Academia Recomenda quando
	// o artigo tratar de uma categoria de produto (PORTAL_ARQUITETURA.md, Seção 5).
	$ab_categoria_produto_relacionada = function_exists( 'get_field' ) ? get_field( 'ab_categoria_produto_relacionada' ) : null;
	if ( $ab_categoria_produto_relacionada ) :
		?>
		<div class="ab-container" style="max-width: 760px;">
			<p><a class="ab-link" href="<?php echo esc_url( get_term_link( (int) $ab_categoria_produto_relacionada, 'categoria_produto' ) ); ?>"><?php esc_html_e( 'Veja nossa avaliação completa sobre esta categoria de produto.', 'academia-da-barbearia' ); ?></a></p>
		</div>
	<?php endif; ?>

	<?php
	$ab_relacionados_ids = get_posts( array(
		'post_type'      => 'artigo',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'fields'         => 'ids',
		'tax_query'      => $ab_categoria ? array( array( 'taxonomy' => 'categoria_conteudo', 'terms' => $ab_categoria->term_id ) ) : array(),
	) );
	if ( $ab_relacionados_ids ) :
		?>
		<section class="ab-secao ab-secao--claro" style="padding-top:0;">
			<div class="ab-container">
				<?php get_template_part( 'template-parts/components/relacionados', null, array(
					'titulo'        => __( 'Continue aprendendo', 'academia-da-barbearia' ),
					'ids'           => $ab_relacionados_ids,
					'card_template' => 'template-parts/cards/card-artigo',
				) ); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php
endwhile;

get_footer();
