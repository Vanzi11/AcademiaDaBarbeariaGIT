<?php
/**
 * Estado Vazio (Empty State) — PORTAL_COMPONENTES.md, 6.2. Orienta o usuário
 * quando uma busca ou filtro não retorna resultados. Tom didático, nunca
 * humorístico (PORTAL_COPYWRITING.md, 3.1).
 *
 * @package Academia_Da_Barbearia
 * @var array $args { termo?: string }
 */

$ab_termo = $args['termo'] ?? '';
?>
<div class="ab-estado-vazio">
	<div class="ab-estado-vazio__icone" aria-hidden="true">
		<svg width="32" height="32" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.4"/><path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
	</div>
	<p>
		<?php
		if ( $ab_termo ) {
			printf(
				/* translators: %s: termo buscado */
				esc_html__( 'Não encontramos resultados para "%s". Veja os artigos mais lidos da Biblioteca ou tente uma busca mais ampla.', 'academia-da-barbearia' ),
				esc_html( $ab_termo )
			);
		} else {
			esc_html_e( 'Nenhum resultado encontrado. Veja os artigos mais lidos da Biblioteca ou tente uma busca mais ampla.', 'academia-da-barbearia' );
		}
		?>
	</p>
	<p><a class="ab-botao ab-botao--secundario" href="<?php echo esc_url( home_url( '/biblioteca/' ) ); ?>"><?php esc_html_e( 'Ver categorias', 'academia-da-barbearia' ); ?></a></p>
</div>
