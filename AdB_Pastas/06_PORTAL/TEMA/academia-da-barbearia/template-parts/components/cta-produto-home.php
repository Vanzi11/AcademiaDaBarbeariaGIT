<?php
/**
 * Seção "Produtos" da Home — Kit Fundação da Barbearia. HOME_WIREFRAME.md,
 * Seção 6 / TEMA_WORDPRESS_AB.md, 4.1. Um único produto em destaque, um
 * único CTA — nunca uma grade de produtos aqui. Fundo Verde Quadro Negro.
 *
 * @package Academia_Da_Barbearia
 */

$ab_produto = get_posts( array(
	'post_type'      => 'produto_proprio',
	'posts_per_page' => 1,
	'orderby'        => 'date',
	'order'          => 'ASC',
) );
$ab_produto_id = $ab_produto ? $ab_produto[0]->ID : 0;
$ab_url        = $ab_produto_id ? get_permalink( $ab_produto_id ) : '#';
?>
<section class="ab-secao ab-secao--assinatura" id="secao-produtos">
	<div class="ab-container ab-texto-centro" style="max-width:640px;">
		<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Produto da Academia', 'academia-da-barbearia' ) ) ); ?>
		<h2><?php esc_html_e( 'Kit Fundação da Barbearia', 'academia-da-barbearia' ); ?></h2>
		<p class="ab-corpo-grande" style="margin-left:auto; margin-right:auto; opacity:.9;">
			<?php esc_html_e( 'O manual de implantação para transformar uma barbearia comum em uma barbearia profissional.', 'academia-da-barbearia' ); ?>
		</p>
		<p class="ab-mt-6 ab-mb-0">
			<a class="ab-botao ab-botao--acento" href="<?php echo esc_url( $ab_url ); ?>">
				<?php esc_html_e( 'Conhecer o Kit Fundação da Barbearia', 'academia-da-barbearia' ); ?>
			</a>
		</p>
	</div>
</section>
