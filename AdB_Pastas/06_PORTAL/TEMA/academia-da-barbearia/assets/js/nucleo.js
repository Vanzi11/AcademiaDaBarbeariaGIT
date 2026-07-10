/**
 * Núcleo — comportamento essencial do tema, sem dependências externas.
 * Menu mobile (abrir/fechar) + fechamento por Escape/clique fora.
 * PORTAL_DESIGN_SYSTEM.md, Seção 6: animações apenas funcionais, nunca decorativas.
 */
(function () {
	'use strict';

	var botaoMenu = document.querySelector( '[data-ab-menu-toggle]' );
	var painelMenu = document.querySelector( '[data-ab-menu-painel]' );
	var botaoFechar = document.querySelector( '[data-ab-menu-fechar]' );

	function abrirMenu() {
		if ( ! painelMenu ) return;
		painelMenu.classList.add( 'is-aberto' );
		botaoMenu.setAttribute( 'aria-expanded', 'true' );
		var primeiroLink = painelMenu.querySelector( 'a' );
		if ( primeiroLink ) primeiroLink.focus();
	}

	function fecharMenu() {
		if ( ! painelMenu ) return;
		painelMenu.classList.remove( 'is-aberto' );
		if ( botaoMenu ) {
			botaoMenu.setAttribute( 'aria-expanded', 'false' );
			botaoMenu.focus();
		}
	}

	if ( botaoMenu ) {
		botaoMenu.addEventListener( 'click', abrirMenu );
	}
	if ( botaoFechar ) {
		botaoFechar.addEventListener( 'click', fecharMenu );
	}
	document.addEventListener( 'keydown', function ( evento ) {
		if ( 'Escape' === evento.key && painelMenu && painelMenu.classList.contains( 'is-aberto' ) ) {
			fecharMenu();
		}
	} );
})();
