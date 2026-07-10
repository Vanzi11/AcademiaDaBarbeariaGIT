/**
 * Mega Menu — PORTAL_COMPONENTES.md, 1.2. O CSS já resolve hover/focus-within;
 * este script cobre apenas o fechamento por Escape, exigido pelos padrões
 * ARIA de menus (TEMA_WORDPRESS_AB.md, Seção 7).
 */
(function () {
	'use strict';

	var megaMenus = document.querySelectorAll( '.ab-mega-menu' );

	document.addEventListener( 'keydown', function ( evento ) {
		if ( 'Escape' !== evento.key ) return;
		megaMenus.forEach( function ( menu ) {
			var link = menu.querySelector( 'a' );
			if ( menu.contains( document.activeElement ) && link ) {
				link.focus();
			}
		} );
	} );
})();
