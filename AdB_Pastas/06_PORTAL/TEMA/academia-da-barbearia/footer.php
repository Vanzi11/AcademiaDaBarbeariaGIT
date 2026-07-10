<?php
/**
 * Footer — rodapé institucional global. Anatomia: PORTAL_ARQUITETURA.md,
 * Seção 8 / PORTAL_COMPONENTES.md, 6.1. Reforço de autoridade institucional
 * (apresentação da marca) incorporado por melhoria aprovada do briefing de
 * implementação — ver RELATORIO_IMPLEMENTACAO_TEMA_V1.md.
 *
 * @package Academia_Da_Barbearia
 */
?>
</main>

<footer class="ab-footer">
	<div class="ab-container">
		<div class="ab-footer__institucional">
			<div class="ab-footer__apresentacao">
				<div class="ab-footer__logo">
					<img src="<?php echo esc_url( AB_TEMA_URI . '/assets/img/logo_AB_FundoVerde.png' ); ?>" alt="Academia da Barbearia" width="140" height="34" loading="lazy">
				</div>
				<p class="ab-footer__tagline">
					<strong><?php esc_html_e( 'Academia da Barbearia', 'academia-da-barbearia' ); ?></strong><br>
					<?php esc_html_e( 'Portal Brasileiro de Inteligência para Profissionais da Barbearia.', 'academia-da-barbearia' ); ?>
				</p>
			</div>

			<div class="ab-footer__colunas">
				<div class="ab-footer__coluna">
					<div class="ab-footer__coluna-titulo"><?php esc_html_e( 'Institucional', 'academia-da-barbearia' ); ?></div>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>"><?php esc_html_e( 'Sobre', 'academia-da-barbearia' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contato/' ) ); ?>"><?php esc_html_e( 'Contato', 'academia-da-barbearia' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/politica-de-privacidade/' ) ); ?>"><?php esc_html_e( 'Política de Privacidade', 'academia-da-barbearia' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/termos-de-uso/' ) ); ?>"><?php esc_html_e( 'Termos de Uso', 'academia-da-barbearia' ); ?></a></li>
					</ul>
				</div>
				<div class="ab-footer__coluna">
					<div class="ab-footer__coluna-titulo"><?php esc_html_e( 'Biblioteca', 'academia-da-barbearia' ); ?></div>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/biblioteca/' ) ); ?>"><?php esc_html_e( 'Ver categorias', 'academia-da-barbearia' ); ?></a></li>
					</ul>
				</div>
				<div class="ab-footer__coluna">
					<div class="ab-footer__coluna-titulo"><?php esc_html_e( 'Academia Recomenda', 'academia-da-barbearia' ); ?></div>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/academia-recomenda/' ) ); ?>"><?php esc_html_e( 'Ver categorias', 'academia-da-barbearia' ); ?></a></li>
					</ul>
				</div>
				<div class="ab-footer__coluna">
					<div class="ab-footer__coluna-titulo"><?php esc_html_e( 'Conecte-se', 'academia-da-barbearia' ); ?></div>
					<ul>
						<li><a href="https://www.instagram.com/academiadabarbearia2026" rel="noopener" target="_blank">Instagram</a></li>
						<li><a href="https://www.facebook.com/share/1PYUuPLMNR/" rel="noopener" target="_blank">Facebook</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#newsletter' ) ); ?>"><?php esc_html_e( 'Newsletter', 'academia-da-barbearia' ); ?></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="ab-footer__base">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Academia da Barbearia. Todos os direitos reservados.', 'academia-da-barbearia' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
