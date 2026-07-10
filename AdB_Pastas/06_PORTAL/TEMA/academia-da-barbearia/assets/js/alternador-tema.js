/**
 * Alternador de Modo Escuro — PORTAL_DESIGN_SYSTEM.md, Seção 1.6. Segue
 * `prefers-color-scheme` por padrão; a escolha manual do usuário é persistida
 * e tem prioridade sobre a preferência de sistema. Troca também o logotipo
 * do header para a versão "Negativo verde" já existente, sem gerar arquivo novo.
 */
(function () {
	'use strict';

	var CHAVE = 'ab-tema-preferido';
	var raiz = document.documentElement;
	var botao = document.querySelector( '[data-ab-alternador-tema]' );
	var logo = document.querySelector( '.ab-header__logo img[data-logo-claro]' );

	function temaAtual() {
		var salvo = window.localStorage.getItem( CHAVE );
		if ( salvo ) return salvo;
		return window.matchMedia( '(prefers-color-scheme: dark)' ).matches ? 'escuro' : 'claro';
	}

	function aplicarTema( tema ) {
		raiz.setAttribute( 'data-tema', tema );
		if ( botao ) botao.setAttribute( 'aria-pressed', 'escuro' === tema ? 'true' : 'false' );
		if ( logo ) {
			logo.src = 'escuro' === tema ? logo.dataset.logoEscuro : logo.dataset.logoClaro;
		}
	}

	aplicarTema( temaAtual() );

	if ( botao ) {
		botao.addEventListener( 'click', function () {
			var novoTema = 'escuro' === raiz.getAttribute( 'data-tema' ) ? 'claro' : 'escuro';
			window.localStorage.setItem( CHAVE, novoTema );
			aplicarTema( novoTema );
		} );
	}
})();
