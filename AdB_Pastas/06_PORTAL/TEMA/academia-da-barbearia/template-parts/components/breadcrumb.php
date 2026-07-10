<?php
/**
 * Breadcrumb — PORTAL_COMPONENTES.md, 1.4. Presente em toda página de nível
 * 2+. Reutiliza a mesma trilha usada no schema BreadcrumbList (inc/seo.php,
 * ab_gerar_trilha_breadcrumb()) — nunca duas fontes de verdade para a mesma
 * navegação.
 *
 * @package Academia_Da_Barbearia
 */

if ( is_front_page() ) {
	return;
}

$ab_trilha = function_exists( 'ab_gerar_trilha_breadcrumb' ) ? ab_gerar_trilha_breadcrumb() : array();
if ( count( $ab_trilha ) < 2 ) {
	return;
}
?>
<nav class="ab-breadcrumb" aria-label="<?php esc_attr_e( 'Trilha de navegação', 'academia-da-barbearia' ); ?>">
	<?php foreach ( $ab_trilha as $ab_indice => $ab_item ) : ?>
		<?php if ( $ab_indice > 0 ) : ?><span class="ab-breadcrumb__separador" aria-hidden="true">/</span><?php endif; ?>
		<?php if ( $ab_indice === count( $ab_trilha ) - 1 || empty( $ab_item['url'] ) ) : ?>
			<span class="ab-breadcrumb__atual" aria-current="page"><?php echo esc_html( $ab_item['nome'] ); ?></span>
		<?php else : ?>
			<a href="<?php echo esc_url( $ab_item['url'] ); ?>"><?php echo esc_html( $ab_item['nome'] ); ?></a>
		<?php endif; ?>
	<?php endforeach; ?>
</nav>
