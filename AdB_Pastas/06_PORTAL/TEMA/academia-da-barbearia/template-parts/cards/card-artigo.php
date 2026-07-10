<?php
/**
 * Card de Artigo — PORTAL_COMPONENTES.md, 2.1. Reutilizado em: Home
 * (Destaques da Biblioteca), archive-artigo.php, taxonomy-categoria_conteudo.php,
 * blocos de "Relacionados". Variante Notícia troca tempo de leitura por data
 * e indicador "Novo" (< 7 dias) — mesmo componente, dado diferente.
 *
 * @package Academia_Da_Barbearia
 * @var array $args { post_id?: int }
 */

$ab_post_id = $args['post_id'] ?? get_the_ID();
$ab_post    = get_post( $ab_post_id );
if ( ! $ab_post ) {
	return;
}

$ab_eh_noticia   = has_term( 'noticia', 'formato', $ab_post_id );
$ab_categorias   = get_the_terms( $ab_post_id, 'categoria_conteudo' );
$ab_categoria    = ( $ab_categorias && ! is_wp_error( $ab_categorias ) ) ? $ab_categorias[0]->name : '';
$ab_tempo_leitura = function_exists( 'get_field' ) ? get_field( 'ab_tempo_leitura', $ab_post_id ) : '';
$ab_publicado_ha  = ( time() - get_the_time( 'U', $ab_post_id ) ) < ( 7 * DAY_IN_SECONDS );
?>
<a class="ab-card ab-card--artigo" href="<?php echo esc_url( get_permalink( $ab_post_id ) ); ?>">
	<div class="ab-card__imagem">
		<?php if ( has_post_thumbnail( $ab_post_id ) ) : ?>
			<?php echo get_the_post_thumbnail( $ab_post_id, 'ab-card-16-9', array( 'alt' => get_the_title( $ab_post_id ), 'loading' => 'lazy' ) ); ?>
		<?php endif; ?>
	</div>
	<div class="ab-card__corpo">
		<span class="ab-card__categoria">
			<?php echo esc_html( $ab_eh_noticia ? __( 'Academia News', 'academia-da-barbearia' ) : $ab_categoria ); ?>
			<?php if ( $ab_publicado_ha ) : ?> · <span class="ab-indicador-novo"><?php esc_html_e( 'Novo', 'academia-da-barbearia' ); ?></span><?php endif; ?>
		</span>
		<h4 class="ab-card__titulo"><?php echo esc_html( get_the_title( $ab_post_id ) ); ?></h4>
		<p class="ab-card__resumo"><?php echo esc_html( wp_trim_words( get_the_excerpt( $ab_post_id ), 18 ) ); ?></p>
		<span class="ab-card__meta">
			<?php
			if ( $ab_eh_noticia ) {
				echo esc_html( get_the_date( '', $ab_post_id ) );
			} elseif ( $ab_tempo_leitura ) {
				printf( esc_html__( '%d min leitura', 'academia-da-barbearia' ), (int) $ab_tempo_leitura );
			} else {
				echo esc_html( get_the_date( '', $ab_post_id ) );
			}
			?>
		</span>
	</div>
</a>
