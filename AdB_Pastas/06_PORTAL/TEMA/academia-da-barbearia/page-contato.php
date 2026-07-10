<?php
/**
 * Página de Contato — Formulário de Contato, PORTAL_COMPONENTES.md, 5.2.
 * Aplica-se automaticamente à Página com slug "contato".
 *
 * @package Academia_Da_Barbearia
 */

get_header();
$ab_enviado = isset( $_GET['contato'] ) && 'sucesso' === $_GET['contato'];
?>

<section class="ab-secao ab-secao--claro">
	<div class="ab-container" style="max-width: 560px;">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
		<h1><?php esc_html_e( 'Contato', 'academia-da-barbearia' ); ?></h1>
		<p class="ab-corpo-grande"><?php esc_html_e( 'Fale diretamente com a Academia da Barbearia.', 'academia-da-barbearia' ); ?></p>

		<?php if ( $ab_enviado ) : ?>
			<div class="ab-callout"><p class="ab-mb-0"><?php esc_html_e( 'Mensagem enviada. Vamos responder em breve.', 'academia-da-barbearia' ); ?></p></div>
		<?php else : ?>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="ab-mt-6">
			<input type="hidden" name="action" value="ab_contato_envio">
			<?php wp_nonce_field( 'ab_contato', 'ab_contato_nonce' ); ?>

			<div class="ab-campo">
				<label class="ab-campo__label" for="contato-nome"><?php esc_html_e( 'Nome', 'academia-da-barbearia' ); ?></label>
				<input type="text" id="contato-nome" name="nome" class="ab-campo__input" required>
			</div>
			<div class="ab-campo">
				<label class="ab-campo__label" for="contato-email"><?php esc_html_e( 'E-mail', 'academia-da-barbearia' ); ?></label>
				<input type="email" id="contato-email" name="email" class="ab-campo__input" required>
			</div>
			<div class="ab-campo">
				<label class="ab-campo__label" for="contato-assunto"><?php esc_html_e( 'Assunto', 'academia-da-barbearia' ); ?></label>
				<input type="text" id="contato-assunto" name="assunto" class="ab-campo__input" required>
			</div>
			<div class="ab-campo">
				<label class="ab-campo__label" for="contato-mensagem"><?php esc_html_e( 'Mensagem', 'academia-da-barbearia' ); ?></label>
				<textarea id="contato-mensagem" name="mensagem" class="ab-campo__textarea" rows="5" required></textarea>
			</div>
			<button type="submit" class="ab-botao ab-botao--primario"><?php esc_html_e( 'Enviar mensagem', 'academia-da-barbearia' ); ?></button>
		</form>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
