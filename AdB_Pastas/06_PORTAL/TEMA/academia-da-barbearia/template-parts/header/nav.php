<?php
/**
 * Navegação principal (desktop) — PORTAL_ARQUITETURA.md, Seção 2.
 * Máximo 5 itens de primeiro nível + busca. Biblioteca e Academia Recomenda
 * abrem mega menu (PORTAL_COMPONENTES.md, 1.2).
 *
 * @package Academia_Da_Barbearia
 */

$ab_categorias_biblioteca = get_terms( array(
	'taxonomy'   => 'categoria_conteudo',
	'hide_empty' => false,
	'number'     => 6,
) );

$ab_categorias_produto = get_terms( array(
	'taxonomy'   => 'categoria_produto',
	'hide_empty' => false,
	'parent'     => 0,
	'number'     => 4,
) );
?>
<nav class="ab-header__nav" aria-label="<?php esc_attr_e( 'Navegação principal', 'academia-da-barbearia' ); ?>">
	<div class="ab-mega-menu">
		<a href="<?php echo esc_url( ab_href_nav( 'biblioteca', 'secao-biblioteca' ) ); ?>"><?php esc_html_e( 'Biblioteca', 'academia-da-barbearia' ); ?></a>
		<?php if ( ! is_wp_error( $ab_categorias_biblioteca ) && $ab_categorias_biblioteca ) : ?>
		<div class="ab-mega-menu__painel">
			<?php foreach ( $ab_categorias_biblioteca as $ab_categoria ) : ?>
			<div class="ab-mega-menu__coluna">
				<div class="ab-mega-menu__coluna-titulo"><?php echo esc_html( $ab_categoria->name ); ?></div>
				<ul>
					<li><a href="<?php echo esc_url( get_term_link( $ab_categoria ) ); ?>"><?php esc_html_e( 'Ver artigos', 'academia-da-barbearia' ); ?></a></li>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

	<div class="ab-mega-menu">
		<a href="<?php echo esc_url( ab_href_nav( 'academia-recomenda', 'secao-recomenda' ) ); ?>"><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></a>
		<?php if ( ! is_wp_error( $ab_categorias_produto ) && $ab_categorias_produto ) : ?>
		<div class="ab-mega-menu__painel">
			<?php foreach ( $ab_categorias_produto as $ab_categoria ) : ?>
			<div class="ab-mega-menu__coluna">
				<div class="ab-mega-menu__coluna-titulo"><?php echo esc_html( $ab_categoria->name ); ?></div>
				<ul>
					<?php
					$ab_filhos = get_terms( array( 'taxonomy' => 'categoria_produto', 'parent' => $ab_categoria->term_id, 'hide_empty' => false, 'number' => 6 ) );
					foreach ( $ab_filhos as $ab_filho ) :
						?>
					<li><a href="<?php echo esc_url( get_term_link( $ab_filho ) ); ?>"><?php echo esc_html( $ab_filho->name ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

	<a href="<?php echo esc_url( ab_href_nav( 'academia-news', 'secao-news' ) ); ?>"><?php esc_html_e( 'Academia News', 'academia-da-barbearia' ); ?></a>
	<a href="<?php echo esc_url( ab_href_nav( 'produtos', 'secao-produtos' ) ); ?>"><?php esc_html_e( 'Produtos', 'academia-da-barbearia' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>" <?php echo is_page( 'sobre' ) ? 'aria-current="page"' : ''; ?>><?php esc_html_e( 'Sobre', 'academia-da-barbearia' ); ?></a>
</nav>
