<?php
/**
 * Bloco de Canais Complementares — PORTAL_COMPONENTES.md, 5.4. Conecta o
 * Portal aos canais de alta frequência (Telegram, WhatsApp) definidos em
 * 03_PRODUTOS/PRODUTO_000/PRODUTO_000.md. Nunca compromete a Nota Geral, o
 * Selo ou qualquer conteúdo editorial — é puramente um convite de canal.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { post_id?: int }
 */

$ab_post_id  = $args['post_id'] ?? get_the_ID();
$ab_telegram = function_exists( 'get_field' ) ? get_field( 'ab_link_telegram', $ab_post_id ) : '';
$ab_whatsapp = function_exists( 'get_field' ) ? get_field( 'ab_link_whatsapp', $ab_post_id ) : '';

if ( ! $ab_telegram && ! $ab_whatsapp ) {
	return;
}
?>
<div class="ab-canais-complementares">
	<?php if ( $ab_telegram ) : ?>
		<a href="<?php echo esc_url( $ab_telegram ); ?>" rel="noopener sponsored" target="_blank"><?php esc_html_e( 'Ofertas em primeira mão no Telegram', 'academia-da-barbearia' ); ?></a>
	<?php endif; ?>
	<?php if ( $ab_whatsapp ) : ?>
		<a href="<?php echo esc_url( $ab_whatsapp ); ?>" rel="noopener sponsored" target="_blank"><?php esc_html_e( 'Fale com a Academia no WhatsApp', 'academia-da-barbearia' ); ?></a>
	<?php endif; ?>
</div>
