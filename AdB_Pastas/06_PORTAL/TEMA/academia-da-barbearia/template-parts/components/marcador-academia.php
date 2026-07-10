<?php
/**
 * Marcador Academia — componente proprietário da marca (melhoria aprovada #1
 * do briefing de implementação do tema).
 *
 * Um risco fino Dourado Terroso + micro-rótulo tracked em uppercase. É o único
 * elemento visual repetido, sem variação de forma, em toda seção de destaque
 * do Portal (Academia Recomenda, Biblioteca, Academia News, Produtos) — a
 * assinatura reconhecível que o briefing pede, mesmo sem o logotipo presente.
 * Deliberadamente sem ícone, sem cor adicional e sem elemento decorativo:
 * "elegante, minimalista e institucional", nunca chamativo.
 *
 * Uso: get_template_part( 'template-parts/components/marcador-academia', null, array( 'texto' => 'Academia Recomenda' ) );
 *
 * @package Academia_Da_Barbearia
 * @var array $args { texto: string }
 */

$ab_texto = $args['texto'] ?? __( 'Academia da Barbearia', 'academia-da-barbearia' );
?>
<p class="ab-marca-assinatura">
	<span class="ab-marca-assinatura__risco" aria-hidden="true"></span>
	<span class="ab-marca-assinatura__texto"><?php echo esc_html( $ab_texto ); ?></span>
</p>
