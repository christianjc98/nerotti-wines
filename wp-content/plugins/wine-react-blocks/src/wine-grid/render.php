<?php
/**
 * Wine Grid Block - Frontend Rendering
 *
 * Dynamically renders the wine grid on the frontend
 * using WP_Query and ACF fields
 *
 * @package Wine_React_Blocks
 *
 * @var array    $attributes Block attributes
 * @var string   $content    Block default content
 * @var WP_Block $block      Block instance
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Extract block attributes with defaults
$posts_to_show = isset( $attributes['postsToShow'] ) ? absint( $attributes['postsToShow'] ) : 6;
$wine_type     = isset( $attributes['wineType'] ) ? sanitize_text_field( $attributes['wineType'] ) : '';
$order_by      = isset( $attributes['orderBy'] ) ? sanitize_text_field( $attributes['orderBy'] ) : 'title';
$order         = isset( $attributes['order'] ) ? sanitize_text_field( $attributes['order'] ) : 'ASC';

// Build WP_Query arguments
$query_args = array(
	'post_type'      => 'wine',
	'posts_per_page' => $posts_to_show,
	'post_status'    => 'publish',
	'no_found_rows'  => true, // Performance optimization
);

// Add wine type filter if specified
if ( ! empty( $wine_type ) ) {
	$query_args['meta_query'] = array(
		array(
			'key'     => 'wine_type',
			'value'   => $wine_type,
			'compare' => '=',
		),
	);
}

// Set ordering
if ( $order_by === 'meta_value' ) {
	// Order by wine year (ACF field)
	$query_args['orderby']  = 'meta_value_num';
	$query_args['meta_key'] = 'wine_year';
	$query_args['order']    = $order;
} else {
	// Order by title
	$query_args['orderby'] = 'title';
	$query_args['order']   = $order;
}

// Query wines
$wine_query = new WP_Query( $query_args );

// Get block wrapper attributes
$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'wine-grid',
	)
);
?>

<div <?php echo $wrapper_attributes; ?>>
	<?php if ( $wine_query->have_posts() ) : ?>

		<div class="wine-grid__container">
			<?php while ( $wine_query->have_posts() ) : $wine_query->the_post(); ?>

				<article class="wine-grid__item" id="wine-<?php the_ID(); ?>">

					<?php
					// Get featured image or ACF bottle image
					$featured_image_id = get_post_thumbnail_id();
					$bottle_image      = get_field( 'wine_bottle_image' );
					$image_id          = $featured_image_id ? $featured_image_id : ( $bottle_image ? $bottle_image['ID'] : null );
					?>

					<?php if ( $image_id ) : ?>
						<div class="wine-grid__image">
							<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
								<?php
								echo wp_get_attachment_image(
									$image_id,
									'medium',
									false,
									array(
										'alt'     => get_the_title(),
										'loading' => 'lazy',
									)
								);
								?>
							</a>
						</div>
					<?php else : ?>
						<div class="wine-grid__image wine-grid__image--placeholder">
							<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
								<span class="wine-grid__placeholder-icon" aria-hidden="true">🍷</span>
							</a>
						</div>
					<?php endif; ?>

					<div class="wine-grid__content">

						<h3 class="wine-grid__title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>

						<?php
						// Get ACF fields
						$wine_year = get_field( 'wine_year' );
						$wine_type_field = get_field( 'wine_type' );
						?>

						<?php if ( $wine_year || $wine_type_field ) : ?>
							<div class="wine-grid__meta">
								<?php if ( $wine_year ) : ?>
									<span class="wine-grid__year">
										<?php echo esc_html( $wine_year ); ?>
									</span>
								<?php endif; ?>

								<?php if ( $wine_type_field ) : ?>
									<span class="wine-grid__type wine-type-<?php echo esc_attr( $wine_type_field ); ?>">
										<?php
										// Capitalize first letter and display
										echo esc_html( ucfirst( $wine_type_field ) );
										?>
									</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ( has_excerpt() ) : ?>
							<div class="wine-grid__excerpt">
								<?php the_excerpt(); ?>
							</div>
						<?php endif; ?>

						<a href="<?php the_permalink(); ?>" class="wine-grid__link">
							<?php esc_html_e( 'View Details', 'wine-react-blocks' ); ?>
							<span aria-hidden="true">→</span>
						</a>

					</div>

				</article>

			<?php endwhile; ?>
		</div>

	<?php else : ?>

		<div class="wine-grid__empty">
			<p><?php esc_html_e( 'No wines found matching your criteria.', 'wine-react-blocks' ); ?></p>
		</div>

	<?php endif; ?>
</div>

<?php
// Reset post data
wp_reset_postdata();
