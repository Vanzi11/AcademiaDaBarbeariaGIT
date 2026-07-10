<?php
/**
 * CTA de Produto (Banner) — PORTAL_COMPONENTES.md, 5.3. Apresenta um produto
 * próprio dentro do fluxo editorial (meio/final de artigos da Biblioteca),
 * conectando conteúdo gratuito a produto pago. O produto oferecido deve ser
 * contextualmente relevante ao conteúdo em que aparece — nunca genérico.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { produto_id: int, titulo?: string, beneficio?: string }
 */

$ab_produto_id = $args['produto_id'] ?? 0;
if ( ! $ab_produto_id ) {
	return;
}

$ab_titulo    = $args['titulo'] ?? get_the_title( $ab_produto_id );
$ab_beneficio = $args['beneficio'] ?? ( function_exists( 'get_field' ) ? get_field( 'ab_proposta_valor', $ab_produto_id ) : '' );
?>
<div class="ab-callout" style="border-left-color: var(--ab-dourado-terroso); background: var(--ab-neutro-100);">
	<p class="ab-mb-0"><strong><?php echo esc_html( $ab_titulo ); ?></strong> — <?php echo esc_html( $ab_beneficio ); ?></p>
	<p class="ab-mt-6 ab-mb-0">
		<a class="ab-botao ab-botao--acento" href="<?php echo esc_url( get_permalink( $ab_produto_id ) ); ?>">
			<?php esc_html_e( 'Conhecer o Kit Fundação da Barbearia', 'academia-da-barbearia' ); ?>
		</a>
	</p>
</div>
