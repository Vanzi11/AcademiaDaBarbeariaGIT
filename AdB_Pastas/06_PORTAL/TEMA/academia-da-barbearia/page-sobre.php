<?php
/**
 * Página Sobre — PAGINAS/SOBRE.md. Tradução externa e resumida da
 * CONSTITUICAO_DA_ACADEMIA.md, sem reproduzir o documento de governança
 * interno na íntegra. Aplica-se automaticamente à Página com slug "sobre"
 * (convenção page-{slug}.php do WordPress).
 *
 * @package Academia_Da_Barbearia
 */

get_header();
?>

<article class="ab-secao ab-secao--assinatura">
	<div class="ab-container ab-texto-centro" style="max-width:680px;">
		<?php get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => __( 'Quem Somos', 'academia-da-barbearia' ) ) ); ?>
		<h1><?php esc_html_e( 'Sobre a Academia da Barbearia', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande">
			<?php esc_html_e( 'Acreditamos que talento é importante — mas acreditamos ainda mais no poder do conhecimento. A Academia da Barbearia existe para transformar informação em inteligência, para que profissionais da beleza tomem decisões melhores.', 'academia-da-barbearia' ); ?>
		</p>
	</div>
</article>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container ab-conteudo-editorial" style="max-width:680px; margin-left:auto; margin-right:auto;">
		<h2><?php esc_html_e( 'Missão e Visão', 'academia-da-barbearia' ); ?></h2>
		<p><?php esc_html_e( 'Nossa missão é transformar informação em inteligência para que profissionais da beleza tomem decisões melhores. Nossa visão é ser a principal referência brasileira em inteligência de mercado para barbeiros e profissionais da beleza.', 'academia-da-barbearia' ); ?></p>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
</section>

<section class="ab-secao ab-secao--claro" style="padding-top:0;">
	<div class="ab-container">
		<h2 class="ab-texto-centro"><?php esc_html_e( 'O que fazemos', 'academia-da-barbearia' ); ?></h2>
		<ul class="ab-grid-cards ab-mt-6" style="list-style:none;">
			<li class="ab-card" style="padding: var(--espaco-4);">
				<h4><a class="ab-link" href="<?php echo esc_url( home_url( '/biblioteca/' ) ); ?>"><?php esc_html_e( 'Biblioteca', 'academia-da-barbearia' ); ?></a></h4>
				<p class="ab-card__resumo"><?php esc_html_e( 'Conhecimento permanente sobre gestão, técnica e atendimento.', 'academia-da-barbearia' ); ?></p>
			</li>
			<li class="ab-card" style="padding: var(--espaco-4);">
				<h4><a class="ab-link" href="<?php echo esc_url( home_url( '/academia-recomenda/' ) ); ?>"><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></a></h4>
				<p class="ab-card__resumo"><?php esc_html_e( 'Curadoria técnica de produtos, sem virar vitrine.', 'academia-da-barbearia' ); ?></p>
			</li>
			<li class="ab-card" style="padding: var(--espaco-4);">
				<h4><a class="ab-link" href="<?php echo esc_url( home_url( '/academia-news/' ) ); ?>"><?php esc_html_e( 'Academia News', 'academia-da-barbearia' ); ?></a></h4>
				<p class="ab-card__resumo"><?php esc_html_e( 'O pulso do mercado da barbearia, em primeira mão.', 'academia-da-barbearia' ); ?></p>
			</li>
			<li class="ab-card" style="padding: var(--espaco-4);">
				<h4><a class="ab-link" href="<?php echo esc_url( home_url( '/produtos/' ) ); ?>"><?php esc_html_e( 'Produtos', 'academia-da-barbearia' ); ?></a></h4>
				<p class="ab-card__resumo"><?php esc_html_e( 'Produtos digitais próprios para colocar o conhecimento em prática.', 'academia-da-barbearia' ); ?></p>
			</li>
		</ul>
	</div>
</section>

<section class="ab-secao ab-secao--escuro">
	<div class="ab-container ab-conteudo-editorial" style="max-width:680px; margin:0 auto;">
		<h2><?php esc_html_e( 'Compromisso Editorial', 'academia-da-barbearia' ); ?></h2>
		<p><?php esc_html_e( 'A confiança vale mais que qualquer venda. Mesmo quando há monetização — como nos links da Academia Recomenda — nosso critério de avaliação é sempre técnico, e isso nunca muda em função de comissão ou parceria comercial.', 'academia-da-barbearia' ); ?></p>
	</div>
</section>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container">
		<?php get_template_part( 'template-parts/components/newsletter' ); ?>
	</div>
</section>

<?php get_footer(); ?>
