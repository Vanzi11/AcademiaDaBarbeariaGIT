<?php
/**
 * Selo de Avaliação — PORTAL_COMPONENTES.md, 4.1. Componente standalone,
 * usado no topo da Ficha de Produto (single-produto.php). A versão sobreposta
 * à imagem do Card de Produto está embutida em cards/card-produto.php — aqui
 * fica a versão de bloco, maior, para o topo da página individual.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { valor: string }
 */

$ab_valor = $args['valor'] ?? '';
$ab_selos = array(
	'recomendado'     => array( 'label' => '🟢 RECOMENDADO', 'classe' => 'ab-selo--recomendado' ),
	'ressalvas'       => array( 'label' => '🟡 RECOMENDADO COM RESSALVAS', 'classe' => 'ab-selo--ressalvas' ),
	'especializado'   => array( 'label' => '🔵 ESPECIALIZADO', 'classe' => 'ab-selo--especializado' ),
	'nao-recomendado' => array( 'label' => '🔴 NÃO RECOMENDADO', 'classe' => 'ab-selo--nao-recomendado' ),
);
$ab_selo  = $ab_selos[ $ab_valor ] ?? null;

if ( ! $ab_selo ) {
	return;
}
?>
<span class="ab-selo ab-selo--bloco <?php echo esc_attr( $ab_selo['classe'] ); ?>" style="position:static; display:inline-flex;">
	<span class="ab-selo__ponto">●</span> <?php echo esc_html( $ab_selo['label'] ); ?>
</span>
