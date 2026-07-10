<?php
/**
 * Formulário de Newsletter — PORTAL_COMPONENTES.md, 5.1. Usado no rodapé
 * global (versão condensada, ver footer.php) e como seção completa da Home
 * (HOME_WIREFRAME.md, Seção 7), com redes sociais logo abaixo.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { mostrar_redes_sociais?: bool }
 */

$ab_mostrar_redes = $args['mostrar_redes_sociais'] ?? true;
?>
<div class="ab-newsletter">
	<h3 class="ab-newsletter__titulo"><?php esc_html_e( 'Receba conteúdo novo da Academia direto no seu e-mail.', 'academia-da-barbearia' ); ?></h3>
	<form class="ab-newsletter__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="action" value="ab_newsletter_inscricao">
		<?php wp_nonce_field( 'ab_newsletter', 'ab_newsletter_nonce' ); ?>
		<label class="ab-oculto-visualmente" for="newsletter-email"><?php esc_html_e( 'E-mail', 'academia-da-barbearia' ); ?></label>
		<input type="email" id="newsletter-email" name="email" class="ab-newsletter__campo" placeholder="seu@email.com" required>
		<button type="submit" class="ab-botao ab-botao--acento"><?php esc_html_e( 'Quero receber', 'academia-da-barbearia' ); ?></button>
	</form>
	<p class="ab-newsletter__legal"><?php esc_html_e( 'Você pode cancelar sua inscrição a qualquer momento.', 'academia-da-barbearia' ); ?></p>

	<?php if ( $ab_mostrar_redes ) : ?>
	<div class="ab-redes-sociais">
		<span class="ab-redes-sociais__rotulo"><?php esc_html_e( 'Siga a Academia', 'academia-da-barbearia' ); ?></span>
		<a class="ab-redes-sociais__link" href="https://www.instagram.com/academiadabarbearia2026" rel="noopener" target="_blank" aria-label="Instagram">
			<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor"/></svg>
		</a>
		<a class="ab-redes-sociais__link" href="https://www.facebook.com/share/1PYUuPLMNR/" rel="noopener" target="_blank" aria-label="Facebook">
			<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14 9h2V6h-2c-2 0-3 1.3-3 3v2H9v3h2v6h3v-6h2.2l.8-3H14V9.4c0-.3.1-.4.4-.4Z" fill="currentColor"/></svg>
		</a>
	</div>
	<?php endif; ?>
</div>
