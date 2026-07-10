<?php
/**
 * Radar do Mercado — variante de lista do Card de Notícia — PORTAL_COMPONENTES.md, 2.5.
 * Formato de varredura rápida (lista compacta), nunca card com imagem — usado
 * exclusivamente na seção "Radar do Mercado" da Home.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { post_id?: int }
 */

$ab_post_id = $args['post_id'] ?? get_the_ID();
$ab_novo    = ( time() - get_the_time( 'U', $ab_post_id ) ) < ( 7 * DAY_IN_SECONDS );

$ab_dias = floor( ( time() - get_the_time( 'U', $ab_post_id ) ) / DAY_IN_SECONDS );
if ( $ab_dias < 1 ) {
	$ab_relativo = __( 'hoje', 'academia-da-barbearia' );
} elseif ( $ab_dias < 7 ) {
	$ab_relativo = sprintf( _n( '%d dia', '%d dias', $ab_dias, 'academia-da-barbearia' ), $ab_dias );
} else {
	$ab_semanas  = floor( $ab_dias / 7 );
	$ab_relativo = sprintf( _n( '%d semana', '%d semanas', $ab_semanas, 'academia-da-barbearia' ), $ab_semanas );
}
?>
<a class="ab-radar__item<?php echo $ab_novo ? ' ab-radar__item--novo' : ''; ?>" href="<?php echo esc_url( get_permalink( $ab_post_id ) ); ?>">
	<span class="ab-radar__ponto" aria-hidden="true"></span>
	<span class="ab-radar__titulo"><?php echo esc_html( get_the_title( $ab_post_id ) ); ?></span>
	<span class="ab-radar__data"><?php echo esc_html( $ab_relativo ); ?></span>
</a>
