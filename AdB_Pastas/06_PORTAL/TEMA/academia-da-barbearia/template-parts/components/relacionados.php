<?php
/**
 * Bloco de Relacionados — PORTAL_COMPONENTES.md, 3.6. Evita becos sem saída:
 * todo conteúdo termina oferecendo o próximo passo. Reutiliza o mesmo
 * componente de card da seção de origem.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { titulo?: string, ids: int[], card_template: string }
 */

$ab_titulo   = $args['titulo'] ?? __( 'Relacionados', 'academia-da-barbearia' );
$ab_ids      = $args['ids'] ?? array();
$ab_template = $args['card_template'] ?? 'template-parts/cards/card-artigo';

if ( empty( $ab_ids ) ) {
	return;
}
?>
<section class="ab-relacionados">
	<h2><?php echo esc_html( $ab_titulo ); ?></h2>
	<ul class="ab-grid-cards ab-mt-6">
		<?php foreach ( $ab_ids as $ab_id ) : ?>
			<li><?php get_template_part( $ab_template, null, array( 'post_id' => $ab_id ) ); ?></li>
		<?php endforeach; ?>
	</ul>
</section>
