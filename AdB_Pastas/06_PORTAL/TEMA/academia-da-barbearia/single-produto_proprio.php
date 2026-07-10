<?php
/**
 * Página de Produto Próprio (ex.: Kit Fundação da Barbearia) —
 * PORTAL_ARQUITETURA.md, Seção 3.4 / PORTAL_COMPONENTES.md, 2.3.
 *
 * @package Academia_Da_Barbearia
 */

get_header();

while ( have_posts() ) :
	the_post();

	$ab_proposta = function_exists( 'get_field' ) ? get_field( 'ab_proposta_valor' ) : '';
	$ab_preco    = function_exists( 'get_field' ) ? get_field( 'ab_preco_exibicao' ) : '';
	$ab_checkout = function_exists( 'get_field' ) ? get_field( 'ab_url_checkout' ) : '';
	?>
	<article <?php post_class( 'ab-secao ab-secao--assinatura' ); ?>>
		<div class="ab-container ab-texto-centro" style="max-width:680px;">
			<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Produto da Academia', 'academia-da-barbearia' ) ) ); ?>
			<h1><?php the_title(); ?></h1>
			<?php if ( $ab_proposta ) : ?><p class="ab-corpo-grande"><?php echo esc_html( $ab_proposta ); ?></p><?php endif; ?>
			<?php if ( $ab_preco ) : ?><p class="ab-corpo-grande"><strong><?php echo esc_html( $ab_preco ); ?></strong></p><?php endif; ?>
			<?php if ( $ab_checkout ) : ?>
				<p><a class="ab-botao ab-botao--acento" href="<?php echo esc_url( $ab_checkout ); ?>"><?php esc_html_e( 'Conhecer o Kit Fundação da Barbearia', 'academia-da-barbearia' ); ?></a></p>
			<?php endif; ?>
		</div>
	</article>

	<section class="ab-secao ab-secao--claro">
		<div class="ab-container ab-conteudo-editorial" style="max-width:760px; margin-left:auto; margin-right:auto;">
			<?php the_content(); ?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
