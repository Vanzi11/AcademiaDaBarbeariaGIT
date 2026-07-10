<?php
/**
 * Paginação — PORTAL_COMPONENTES.md, 1.5. Usada em arquivos de Biblioteca,
 * Academia Recomenda, Academia News e resultados de busca.
 *
 * @package Academia_Da_Barbearia
 */

$ab_links = paginate_links( array(
	'prev_text' => __( '‹ Anterior', 'academia-da-barbearia' ),
	'next_text' => __( 'Próximo ›', 'academia-da-barbearia' ),
	'type'      => 'array',
) );

if ( ! $ab_links ) {
	return;
}
?>
<ul class="ab-paginacao">
	<?php foreach ( $ab_links as $ab_link ) : ?>
		<li><?php echo str_replace( 'page-numbers current', 'page-numbers ab-paginacao__atual', $ab_link ); ?></li>
	<?php endforeach; ?>
</ul>
