<?php
/**
 * Header — carrega o <head>, abre <body> e imprime o cabeçalho fixo.
 * Anatomia e comportamento: PORTAL_COMPONENTES.md, Seção 1.1.
 *
 * @package Academia_Da_Barbearia
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="ab-skip-link" href="#conteudo-principal"><?php esc_html_e( 'Pular para o conteúdo', 'academia-da-barbearia' ); ?></a>

<header class="ab-header" id="topo">
	<div class="ab-container ab-header__linha">
		<a class="ab-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Academia da Barbearia — Início', 'academia-da-barbearia' ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( AB_TEMA_URI . '/assets/img/logo_AB_FundoBrancoFULL.png' ); ?>" alt="Academia da Barbearia" data-logo-claro="<?php echo esc_url( AB_TEMA_URI . '/assets/img/logo_AB_FundoBrancoFULL.png' ); ?>" data-logo-escuro="<?php echo esc_url( AB_TEMA_URI . '/assets/img/logo_AB_FundoVerde.png' ); ?>">
			<?php endif; ?>
		</a>

		<?php get_template_part( 'template-parts/header/nav' ); ?>

		<div class="ab-header__acoes">
			<button type="button" class="ab-alternador-tema" data-ab-alternador-tema aria-label="<?php esc_attr_e( 'Alternar modo escuro', 'academia-da-barbearia' ); ?>" aria-pressed="false">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3a9 9 0 1 0 9 9 7 7 0 0 1-9-9Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
			</button>
			<button type="button" class="ab-header__busca-toggle" data-ab-busca-toggle aria-label="<?php esc_attr_e( 'Buscar na Academia', 'academia-da-barbearia' ); ?>" aria-expanded="false" aria-controls="busca-header">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/><path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
			</button>
			<button type="button" class="ab-header__menu-toggle" data-ab-menu-toggle aria-label="<?php esc_attr_e( 'Abrir menu', 'academia-da-barbearia' ); ?>" aria-expanded="false" aria-controls="menu-mobile">
				<span class="ab-header__menu-icone"><span></span><span></span><span></span></span>
			</button>
		</div>
	</div>

	<div class="ab-busca-header" id="busca-header" data-ab-busca-painel>
		<form class="ab-busca-header__form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="ab-oculto-visualmente" for="busca-header-campo"><?php esc_html_e( 'Buscar na Academia', 'academia-da-barbearia' ); ?></label>
			<input type="search" id="busca-header-campo" class="ab-busca-header__campo" name="s" placeholder="<?php esc_attr_e( 'Buscar na Academia...', 'academia-da-barbearia' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
			<button type="submit" class="ab-botao ab-botao--primario"><?php esc_html_e( 'Buscar', 'academia-da-barbearia' ); ?></button>
		</form>
	</div>
</header>

<div class="ab-menu-mobile" id="menu-mobile" data-ab-menu-painel>
	<button type="button" class="ab-menu-mobile__fechar" data-ab-menu-fechar aria-label="<?php esc_attr_e( 'Fechar menu', 'academia-da-barbearia' ); ?>">&times;</button>
	<nav aria-label="<?php esc_attr_e( 'Navegação principal (mobile)', 'academia-da-barbearia' ); ?>">
		<ul class="ab-menu-mobile__lista">
			<li><a href="<?php echo esc_url( ab_href_nav( 'biblioteca', 'secao-biblioteca' ) ); ?>"><?php esc_html_e( 'Biblioteca', 'academia-da-barbearia' ); ?></a></li>
			<li><a href="<?php echo esc_url( ab_href_nav( 'academia-recomenda', 'secao-recomenda' ) ); ?>"><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></a></li>
			<li><a href="<?php echo esc_url( ab_href_nav( 'academia-news', 'secao-news' ) ); ?>"><?php esc_html_e( 'Academia News', 'academia-da-barbearia' ); ?></a></li>
			<li><a href="<?php echo esc_url( ab_href_nav( 'produtos', 'secao-produtos' ) ); ?>"><?php esc_html_e( 'Produtos', 'academia-da-barbearia' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>"><?php esc_html_e( 'Sobre', 'academia-da-barbearia' ); ?></a></li>
		</ul>
	</nav>
</div>

<main id="conteudo-principal">
