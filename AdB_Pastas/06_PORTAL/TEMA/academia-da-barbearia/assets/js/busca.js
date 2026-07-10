/**
 * Busca do header — PORTAL_COMPONENTES.md, 1.3. Abre/fecha o painel de busca
 * compacto do header (distinto da Busca em Destaque da Home, que é uma
 * seção própria sempre visível).
 */
(function () {
	'use strict';

	var botao = document.querySelector( '[data-ab-busca-toggle]' );
	var painel = document.querySelector( '[data-ab-busca-painel]' );

	if ( ! botao || ! painel ) return;

	function alternar() {
		var aberto = painel.classList.toggle( 'is-aberta' );
		botao.setAttribute( 'aria-expanded', aberto ? 'true' : 'false' );
		if ( aberto ) {
			var campo = painel.querySelector( 'input[type="search"]' );
			if ( campo ) campo.focus();
		}
	}

	botao.addEventListener( 'click', alternar );

	document.addEventListener( 'keydown', function ( evento ) {
		if ( 'Escape' === evento.key && painel.classList.contains( 'is-aberta' ) ) {
			painel.classList.remove( 'is-aberta' );
			botao.setAttribute( 'aria-expanded', 'false' );
			botao.focus();
		}
	} );

	document.addEventListener( 'click', function ( evento ) {
		if ( ! painel.contains( evento.target ) && evento.target !== botao && ! botao.contains( evento.target ) ) {
			painel.classList.remove( 'is-aberta' );
			botao.setAttribute( 'aria-expanded', 'false' );
		}
	} );
})();
