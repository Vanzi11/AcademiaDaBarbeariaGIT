<?php
/**
 * Busca em Destaque (Search Hero) — PORTAL_COMPONENTES.md, 6.5 / HOME_WIREFRAME.md,
 * Seção 2. Aciona a busca nativa do WordPress. Sugestões de pesquisa em forma
 * de pergunta real — melhoria aprovada do briefing de implementação: "a busca
 * deve transmitir inteligência". Os exemplos têm função apenas educativa, não
 * são categorias de navegação disfarçadas.
 *
 * @package Academia_Da_Barbearia
 */

$ab_sugestoes = array(
	__( 'Qual máquina comprar para uma barbearia pequena?', 'academia-da-barbearia' ),
	__( 'Melhor máquina até R$500', 'academia-da-barbearia' ),
	__( 'Como escolher uma cadeira de barbeiro', 'academia-da-barbearia' ),
);
?>
<section class="ab-busca-destaque" id="secao-busca">
	<div class="ab-container">
		<h2 class="ab-busca-destaque__titulo"><?php esc_html_e( 'O que você quer resolver na sua barbearia hoje?', 'academia-da-barbearia' ); ?></h2>
		<form class="ab-busca-destaque__form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="ab-oculto-visualmente" for="busca-destaque-campo"><?php esc_html_e( 'Buscar na Academia', 'academia-da-barbearia' ); ?></label>
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="flex-shrink:0;"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/><path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
			<input type="search" id="busca-destaque-campo" name="s" class="ab-busca-destaque__campo" placeholder="<?php esc_attr_e( 'Buscar na Academia...', 'academia-da-barbearia' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
			<button type="submit" class="ab-botao ab-botao--acento"><?php esc_html_e( 'Buscar', 'academia-da-barbearia' ); ?></button>
		</form>
		<p class="ab-busca-destaque__sugestoes">
			<?php foreach ( $ab_sugestoes as $ab_sugestao ) : ?>
				<a href="<?php echo esc_url( add_query_arg( 's', rawurlencode( $ab_sugestao ), home_url( '/' ) ) ); ?>"><?php echo esc_html( $ab_sugestao ); ?></a>
			<?php endforeach; ?>
		</p>
	</div>
</section>
