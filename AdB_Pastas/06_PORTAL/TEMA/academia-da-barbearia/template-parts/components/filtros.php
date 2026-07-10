<?php
/**
 * Filtro de Categoria/Nível — PORTAL_COMPONENTES.md, 1.6. Usado nos arquivos
 * de Biblioteca (filtro por nível) e Academia Recomenda (filtro por categoria).
 *
 * @package Academia_Da_Barbearia
 * @var array $args { taxonomia: string, todos_label?: string }
 */

$ab_taxonomia   = $args['taxonomia'] ?? 'categoria_conteudo';
$ab_todos_label = $args['todos_label'] ?? __( 'Todos', 'academia-da-barbearia' );
$ab_termo_atual = get_queried_object();
$ab_termos      = get_terms( array( 'taxonomy' => $ab_taxonomia, 'hide_empty' => true, 'parent' => 0 ) );

if ( is_wp_error( $ab_termos ) || empty( $ab_termos ) ) {
	return;
}
?>
<nav class="ab-filtros" aria-label="<?php esc_attr_e( 'Filtrar por categoria', 'academia-da-barbearia' ); ?>">
	<a class="ab-filtro-chip<?php echo ( ! is_tax( $ab_taxonomia ) ) ? ' is-ativo' : ''; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'categoria_conteudo' === $ab_taxonomia ? 'artigo' : 'produto' ) ); ?>">
		<?php echo esc_html( $ab_todos_label ); ?>
	</a>
	<?php foreach ( $ab_termos as $ab_termo ) : ?>
		<a class="ab-filtro-chip<?php echo ( is_tax( $ab_taxonomia, $ab_termo->term_id ) ) ? ' is-ativo' : ''; ?>" href="<?php echo esc_url( get_term_link( $ab_termo ) ); ?>">
			<?php echo esc_html( $ab_termo->name ); ?>
		</a>
	<?php endforeach; ?>
</nav>
