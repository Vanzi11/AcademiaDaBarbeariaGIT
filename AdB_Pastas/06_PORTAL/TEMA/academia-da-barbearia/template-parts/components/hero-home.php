<?php
/**
 * Hero da Home — PORTAL_COMPONENTES.md, 6.4 / HOME_WIREFRAME.md, Seção 1.
 * Fundo Verde Quadro Negro, força visual inteiramente tipográfica — nunca
 * imagem, vídeo ou elemento decorativo. Headline institucional fixa
 * (PAGINAS/HOME.md) mais uma frase de apoio breve (melhoria aprovada #4 do
 * briefing de implementação).
 *
 * @package Academia_Da_Barbearia
 */
?>
<section class="ab-hero" id="topo-home">
	<div class="ab-container">
		<p class="ab-hero__eyebrow"><?php esc_html_e( 'Portal Brasileiro de Inteligência', 'academia-da-barbearia' ); ?></p>
		<h1 class="ab-hero__titulo"><?php esc_html_e( 'Ajudamos barbeiros a tomar melhores decisões.', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-hero__subtitulo"><?php esc_html_e( 'Pesquise produtos, descubra tendências, encontre ferramentas e tome decisões com mais segurança.', 'academia-da-barbearia' ); ?></p>
		<div class="ab-hero__acoes">
			<a class="ab-botao ab-botao--primario-invertido" href="<?php echo esc_url( ab_href_nav( 'academia-recomenda', 'secao-recomenda' ) ); ?>"><?php esc_html_e( 'Ver Academia Recomenda', 'academia-da-barbearia' ); ?></a>
			<a class="ab-botao ab-botao--fantasma" href="<?php echo esc_url( ab_href_nav( 'biblioteca', 'secao-biblioteca' ) ); ?>"><?php esc_html_e( 'Explorar a Biblioteca', 'academia-da-barbearia' ); ?></a>
		</div>
	</div>
</section>
