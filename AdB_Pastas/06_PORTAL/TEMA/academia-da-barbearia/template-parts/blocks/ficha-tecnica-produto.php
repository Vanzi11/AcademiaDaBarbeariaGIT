<?php
/**
 * Ficha Técnica de Produto — PORTAL_COMPONENTES.md, 3.5. Estrutura visual
 * oficial e obrigatória do FRAMEWORK_AVALIACAO_DE_PRODUTOS_AB.md — nenhuma
 * seção da sequência pode ser omitida. Usado exclusivamente em single-produto.php.
 *
 * Sequência: Resposta Rápida → Selo → Resumo → Para Quem É → Para Quem Não É
 * → Pontos Fortes → Pontos Fracos → Vale o Preço? (com Histórico de Preço) →
 * Quando Comprar → Quando Não Comprar → Melhor Alternativa → Produtos
 * Relacionados → Onde Comprar.
 *
 * @package Academia_Da_Barbearia
 */

if ( ! function_exists( 'get_field' ) ) {
	return;
}

$id = get_the_ID();

$selo_valor    = get_field( 'ab_selo', $id );
$selos         = array(
	'recomendado'     => '🟢 RECOMENDADO',
	'ressalvas'       => '🟡 RECOMENDADO COM RESSALVAS',
	'especializado'   => '🔵 ESPECIALIZADO',
	'nao-recomendado' => '🔴 NÃO RECOMENDADO',
);
$vale_o_preco  = array( 'sim' => __( 'Sim', 'academia-da-barbearia' ), 'nao' => __( 'Não', 'academia-da-barbearia' ), 'depende' => __( 'Depende', 'academia-da-barbearia' ) );
$tendencias    = array( 'estavel' => __( 'estável', 'academia-da-barbearia' ), 'subindo' => __( 'subindo', 'academia-da-barbearia' ), 'caindo' => __( 'caindo', 'academia-da-barbearia' ) );

$categorias    = get_the_terms( $id, 'categoria_produto' );
$categoria_nome = ( $categorias && ! is_wp_error( $categorias ) ) ? $categorias[0]->name : '';
?>

<!-- 1. Resposta Rápida (+ campos complementares reconciliados com PRODUTO_000.md) -->
<dl class="ab-resumo-executivo">
	<dt><?php esc_html_e( 'Produto', 'academia-da-barbearia' ); ?></dt>
	<dd><?php the_title(); ?><?php $marca = get_field( 'ab_marca' ); if ( $marca ) : ?> — <?php echo esc_html( $marca ); ?><?php endif; ?><?php $modelo = get_field( 'ab_modelo' ); if ( $modelo ) : ?> (<?php echo esc_html( $modelo ); ?>)<?php endif; ?></dd>

	<dt><?php esc_html_e( 'Categoria', 'academia-da-barbearia' ); ?></dt>
	<dd><?php echo esc_html( $categoria_nome ); ?></dd>

	<dt><?php esc_html_e( 'Preço Atual', 'academia-da-barbearia' ); ?></dt>
	<dd><?php $preco = get_field( 'ab_preco_atual' ); echo $preco ? esc_html( 'R$ ' . number_format_i18n( $preco, 2 ) ) : '—'; ?></dd>

	<?php $nota = get_field( 'ab_nota_geral' ); if ( $nota ) : ?>
	<dt><?php esc_html_e( 'Nota Geral', 'academia-da-barbearia' ); ?></dt>
	<dd><?php echo esc_html( $nota ); ?>/10</dd>
	<?php endif; ?>

	<dt><?php esc_html_e( 'Status da Avaliação', 'academia-da-barbearia' ); ?></dt>
	<dd><?php echo esc_html( ab_data_ultima_atualizacao() ); ?></dd>
</dl>

<!-- 2. Selo Academia -->
<?php get_template_part( 'template-parts/components/selo', null, array( 'valor' => $selo_valor ) ); ?>

<!-- 3. Resumo Executivo -->
<h2><?php esc_html_e( 'Resumo', 'academia-da-barbearia' ); ?></h2>
<p class="ab-corpo-grande"><?php echo esc_html( get_field( 'ab_resumo_executivo' ) ); ?></p>

<!-- 4. Para Quem É -->
<h3><?php esc_html_e( 'Para Quem É', 'academia-da-barbearia' ); ?></h3>
<p><?php echo nl2br( esc_html( get_field( 'ab_para_quem_e' ) ) ); ?></p>

<!-- 5. Para Quem NÃO É -->
<h3><?php esc_html_e( 'Para Quem NÃO É', 'academia-da-barbearia' ); ?></h3>
<p><?php echo nl2br( esc_html( get_field( 'ab_para_quem_nao_e' ) ) ); ?></p>

<!-- 6. Pontos Fortes -->
<h3><?php esc_html_e( 'Pontos Fortes', 'academia-da-barbearia' ); ?></h3>
<ul>
	<?php foreach ( array_filter( explode( "\n", (string) get_field( 'ab_pontos_fortes' ) ) ) as $ponto ) : ?>
		<li><?php echo esc_html( trim( $ponto ) ); ?></li>
	<?php endforeach; ?>
</ul>

<!-- 7. Pontos Fracos -->
<h3><?php esc_html_e( 'Pontos Fracos', 'academia-da-barbearia' ); ?></h3>
<ul>
	<?php foreach ( array_filter( explode( "\n", (string) get_field( 'ab_pontos_fracos' ) ) ) as $ponto ) : ?>
		<li><?php echo esc_html( trim( $ponto ) ); ?></li>
	<?php endforeach; ?>
</ul>

<!-- 8. Vale o Preço? (+ Histórico de Preço, reconciliado com PRODUTO_000.md) -->
<h3><?php esc_html_e( 'Vale o Preço?', 'academia-da-barbearia' ); ?></h3>
<p>
	<strong><?php echo esc_html( $vale_o_preco[ get_field( 'ab_vale_o_preco' ) ] ?? '' ); ?>.</strong>
	<?php echo esc_html( get_field( 'ab_vale_o_preco_texto' ) ); ?>
</p>
<?php
$menor  = get_field( 'ab_menor_preco_historico' );
$medio  = get_field( 'ab_preco_medio' );
$tend   = get_field( 'ab_tendencia_preco' );
if ( $menor || $medio ) :
	?>
<div class="ab-callout">
	<p class="ab-mb-0">
		<strong><?php esc_html_e( 'Histórico de Preço:', 'academia-da-barbearia' ); ?></strong>
		<?php if ( $menor ) : ?><?php printf( esc_html__( ' Menor preço já registrado: R$ %s.', 'academia-da-barbearia' ), esc_html( number_format_i18n( $menor, 2 ) ) ); ?><?php endif; ?>
		<?php if ( $medio ) : ?><?php printf( esc_html__( ' Preço médio: R$ %s.', 'academia-da-barbearia' ), esc_html( number_format_i18n( $medio, 2 ) ) ); ?><?php endif; ?>
		<?php if ( $tend ) : ?><?php printf( esc_html__( ' Tendência: %s.', 'academia-da-barbearia' ), esc_html( $tendencias[ $tend ] ?? $tend ) ); ?><?php endif; ?>
	</p>
</div>
<?php endif; ?>

<!-- 9. Quando Comprar -->
<h3><?php esc_html_e( 'Quando Comprar', 'academia-da-barbearia' ); ?></h3>
<p><?php echo esc_html( get_field( 'ab_quando_comprar' ) ); ?></p>

<!-- 10. Quando NÃO Comprar -->
<h3><?php esc_html_e( 'Quando NÃO Comprar', 'academia-da-barbearia' ); ?></h3>
<p><?php echo esc_html( get_field( 'ab_quando_nao_comprar' ) ); ?></p>

<!-- 11. Melhor Alternativa -->
<?php $alternativa = get_field( 'ab_melhor_alternativa' ); if ( $alternativa ) : ?>
<h3><?php esc_html_e( 'Melhor Alternativa', 'academia-da-barbearia' ); ?></h3>
<ul class="ab-grid-cards" style="grid-template-columns: 1fr;">
	<li><?php get_template_part( 'template-parts/cards/card-produto', null, array( 'post_id' => $alternativa->ID ) ); ?></li>
</ul>
<?php endif; ?>

<!-- 12. Produtos Relacionados -->
<?php
$relacionados = get_field( 'ab_produtos_relacionados' );
if ( $relacionados ) :
	get_template_part( 'template-parts/components/relacionados', null, array(
		'titulo'        => __( 'Produtos Relacionados', 'academia-da-barbearia' ),
		'ids'           => wp_list_pluck( $relacionados, 'ID' ),
		'card_template' => 'template-parts/cards/card-produto',
	) );
endif;
?>

<!-- 13. Onde Comprar -->
<h3><?php esc_html_e( 'Onde Comprar', 'academia-da-barbearia' ); ?></h3>
<p>
	<a class="ab-botao ab-botao--acento" href="<?php echo esc_url( get_field( 'ab_link_afiliado' ) ); ?>" rel="noopener sponsored" target="_blank">
		<?php esc_html_e( 'Ver oferta', 'academia-da-barbearia' ); ?>
	</a>
</p>
<p class="ab-transparencia"><?php esc_html_e( 'Este link é de um programa de afiliados. Isso não influencia nossa avaliação — nosso critério é sempre técnico.', 'academia-da-barbearia' ); ?></p>

<?php get_template_part( 'template-parts/components/canais-complementares', null, array( 'post_id' => $id ) ); ?>

<?php
$artigo_contexto = get_field( 'ab_artigo_contexto' );
if ( $artigo_contexto ) :
	?>
<p><a class="ab-link" href="<?php echo esc_url( get_permalink( $artigo_contexto->ID ) ); ?>"><?php printf( esc_html__( 'Antes de decidir, entenda como escolher: %s', 'academia-da-barbearia' ), esc_html( get_the_title( $artigo_contexto->ID ) ) ); ?></a></p>
<?php endif; ?>
