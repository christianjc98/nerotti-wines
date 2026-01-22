<?php
/**
 * Title: Hero Home
 * Slug: potential-wine-theme/hero-home
 * Categories: potential-wine
 * Description: Large hero section with background image, headline, and call-to-action buttons for the home page
 */
?>
<!-- wp:cover {"url":"","dimRatio":50,"overlayColor":"charcoal","minHeight":700,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50);min-height:700px">
	<span aria-hidden="true" class="wp-block-cover__background has-charcoal-background-color has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"900px"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"cream","fontSize":"xxx-large"} -->
			<h1 class="wp-block-heading has-text-align-center has-cream-color has-text-color has-xxx-large-font-size">Experience the Art of Winemaking</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"off-white","fontSize":"x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
			<p class="has-text-align-center has-off-white-color has-text-color has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--50)">Crafting exceptional wines from our family vineyard for over three decades</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70)">
				<!-- wp:button {"backgroundColor":"gold","textColor":"charcoal","fontSize":"medium"} -->
				<div class="wp-block-button has-custom-font-size has-medium-font-size"><a class="wp-block-button__link has-charcoal-color has-gold-background-color has-text-color has-background wp-element-button">Explore Our Collection</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline","fontSize":"medium"} -->
				<div class="wp-block-button has-custom-font-size is-style-outline has-medium-font-size"><a class="wp-block-button__link wp-element-button">Plan Your Visit</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
