<?php
/**
 * Title: Product Grid
 * Slug: potential-wine-theme/product-grid
 * Categories: potential-wine
 * Description: Grid layout for displaying wine products with images, names, types, and descriptions
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","fontSize":"xx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}}} -->
	<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--60)">Our Wine Collection</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"}}}} -->
	<p class="has-text-align-center has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--70)">Discover our carefully curated selection of premium wines</p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"wine","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->

				<!-- wp:post-title {"isLink":true,"fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

				<!-- wp:post-terms {"term":"wine_type","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"fontSize":"small"} /-->

				<!-- wp:post-excerpt {"moreText":"Learn More →","excerptLength":25,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button">View Details</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">No wines found. Check back soon for new additions to our collection.</p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
