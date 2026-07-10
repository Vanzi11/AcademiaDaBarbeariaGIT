<?php
/**
 * Página 404 — PORTAL_COMPONENTES.md, 6.3. Tom didático, nunca humorístico
 * (PORTAL_COPYWRITING.md, 3.2). Busca em destaque + atalhos para as 5 seções.
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<section class="ab-secao ab-secao--escuro ab-texto-centro">
	<div class="ab-container" style="max-width: 560px;">
		<h1><?php esc_html_e( 'Esta página não existe.', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande"><?php esc_html_e( 'O conteúdo que você procura pode ter mudado de endereço ou não existe mais. Use a busca abaixo ou volte para o Início.', 'academia-da-barbearia' ); ?></p>

		<form role="search" method="get" class="ab-busca-destaque__form ab-mt-6" style="max-width: 480px; margin-left:auto; margin-right:auto;" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="ab-oculto-visualmente" for="busca-404"><?php esc_html_e( 'Buscar na Academia', 'academia-da-barbearia' ); ?></label>
			<input type="search" id="busca-404" name="s" class="ab-busca-destaque__campo" placeholder="<?php esc_attr_e( 'Buscar na Academia...', 'academia-da-barbearia' ); ?>">
			<button type="submit" class="ab-botao ab-botao--acento"><?php esc_html_e( 'Buscar', 'academia-da-barbearia' ); ?></button>
		</form>

		<ul class="ab-flex ab-gap-3 ab-mt-8" style="list-style:none; justify-content:center; flex-wrap:wrap; padding:0;">
			<li><a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( home_url( '/biblioteca/' ) ); ?>"><?php esc_html_e( 'Biblioteca', 'academia-da-barbearia' ); ?></a></li>
			<li><a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( home_url( '/academia-recomenda/' ) ); ?>"><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></a></li>
			<li><a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( home_url( '/academia-news/' ) ); ?>"><?php esc_html_e( 'Academia News', 'academia-da-barbearia' ); ?></a></li>
			<li><a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( home_url( '/produtos/' ) ); ?>"><?php esc_html_e( 'Produtos', 'academia-da-barbearia' ); ?></a></li>
			<li><a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>"><?php esc_html_e( 'Sobre', 'academia-da-barbearia' ); ?></a></li>
		</ul>
	</div>
</section>

<?php get_footer(); ?>
