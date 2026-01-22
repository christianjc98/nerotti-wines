<?php
/**
 * Potential Wine Theme functions and definitions
 *
 * @package Potential_Wine_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Theme setup
 */
function potential_wine_theme_setup() {
	// Add support for block styles
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images
	add_theme_support( 'align-wide' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add support for custom line height
	add_theme_support( 'custom-line-height' );

	// Add support for custom units
	add_theme_support( 'custom-units' );

	// Add support for custom spacing
	add_theme_support( 'custom-spacing' );

	// Add support for link color
	add_theme_support( 'link-color' );

	// Add support for post thumbnails
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'potential_wine_theme_setup' );

/**
 * Register Wine Custom Post Type
 */
function potential_wine_register_cpt() {
	$labels = array(
		'name'                  => _x( 'Wines', 'Post Type General Name', 'potential-wine-theme' ),
		'singular_name'         => _x( 'Wine', 'Post Type Singular Name', 'potential-wine-theme' ),
		'menu_name'             => __( 'Wines', 'potential-wine-theme' ),
		'name_admin_bar'        => __( 'Wine', 'potential-wine-theme' ),
		'archives'              => __( 'Wine Archives', 'potential-wine-theme' ),
		'attributes'            => __( 'Wine Attributes', 'potential-wine-theme' ),
		'parent_item_colon'     => __( 'Parent Wine:', 'potential-wine-theme' ),
		'all_items'             => __( 'All Wines', 'potential-wine-theme' ),
		'add_new_item'          => __( 'Add New Wine', 'potential-wine-theme' ),
		'add_new'               => __( 'Add New', 'potential-wine-theme' ),
		'new_item'              => __( 'New Wine', 'potential-wine-theme' ),
		'edit_item'             => __( 'Edit Wine', 'potential-wine-theme' ),
		'update_item'           => __( 'Update Wine', 'potential-wine-theme' ),
		'view_item'             => __( 'View Wine', 'potential-wine-theme' ),
		'view_items'            => __( 'View Wines', 'potential-wine-theme' ),
		'search_items'          => __( 'Search Wine', 'potential-wine-theme' ),
		'not_found'             => __( 'Not found', 'potential-wine-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'potential-wine-theme' ),
		'featured_image'        => __( 'Wine Image', 'potential-wine-theme' ),
		'set_featured_image'    => __( 'Set wine image', 'potential-wine-theme' ),
		'remove_featured_image' => __( 'Remove wine image', 'potential-wine-theme' ),
		'use_featured_image'    => __( 'Use as wine image', 'potential-wine-theme' ),
		'insert_into_item'      => __( 'Insert into wine', 'potential-wine-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this wine', 'potential-wine-theme' ),
		'items_list'            => __( 'Wines list', 'potential-wine-theme' ),
		'items_list_navigation' => __( 'Wines list navigation', 'potential-wine-theme' ),
		'filter_items_list'     => __( 'Filter wines list', 'potential-wine-theme' ),
	);

	$args = array(
		'label'               => __( 'Wine', 'potential-wine-theme' ),
		'description'         => __( 'Wine products for the catalog', 'potential-wine-theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'          => array( 'wine_type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-beer',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'rewrite'             => array( 'slug' => 'wine' ),
	);

	register_post_type( 'wine', $args );
}
add_action( 'init', 'potential_wine_register_cpt' );

/**
 * Register Wine Type Taxonomy
 */
function potential_wine_register_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Wine Types', 'Taxonomy General Name', 'potential-wine-theme' ),
		'singular_name'              => _x( 'Wine Type', 'Taxonomy Singular Name', 'potential-wine-theme' ),
		'menu_name'                  => __( 'Wine Types', 'potential-wine-theme' ),
		'all_items'                  => __( 'All Wine Types', 'potential-wine-theme' ),
		'parent_item'                => __( 'Parent Wine Type', 'potential-wine-theme' ),
		'parent_item_colon'          => __( 'Parent Wine Type:', 'potential-wine-theme' ),
		'new_item_name'              => __( 'New Wine Type Name', 'potential-wine-theme' ),
		'add_new_item'               => __( 'Add New Wine Type', 'potential-wine-theme' ),
		'edit_item'                  => __( 'Edit Wine Type', 'potential-wine-theme' ),
		'update_item'                => __( 'Update Wine Type', 'potential-wine-theme' ),
		'view_item'                  => __( 'View Wine Type', 'potential-wine-theme' ),
		'separate_items_with_commas' => __( 'Separate wine types with commas', 'potential-wine-theme' ),
		'add_or_remove_items'        => __( 'Add or remove wine types', 'potential-wine-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'potential-wine-theme' ),
		'popular_items'              => __( 'Popular Wine Types', 'potential-wine-theme' ),
		'search_items'               => __( 'Search Wine Types', 'potential-wine-theme' ),
		'not_found'                  => __( 'Not Found', 'potential-wine-theme' ),
		'no_terms'                   => __( 'No wine types', 'potential-wine-theme' ),
		'items_list'                 => __( 'Wine types list', 'potential-wine-theme' ),
		'items_list_navigation'      => __( 'Wine types list navigation', 'potential-wine-theme' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'wine-type' ),
	);

	register_taxonomy( 'wine_type', array( 'wine' ), $args );
}
add_action( 'init', 'potential_wine_register_taxonomy' );

/**
 * Add default wine types on theme activation
 */
function potential_wine_add_default_terms() {
	// Check if terms already exist
	$existing_terms = get_terms( array(
		'taxonomy'   => 'wine_type',
		'hide_empty' => false,
	) );

	if ( empty( $existing_terms ) || is_wp_error( $existing_terms ) ) {
		$default_types = array( 'Red', 'White', 'Rosé', 'Sparkling' );

		foreach ( $default_types as $type ) {
			if ( ! term_exists( $type, 'wine_type' ) ) {
				wp_insert_term( $type, 'wine_type' );
			}
		}
	}
}
add_action( 'after_switch_theme', 'potential_wine_add_default_terms' );

/**
 * Register block patterns
 */
function potential_wine_register_patterns() {
	// Register pattern category
	register_block_pattern_category(
		'potential-wine',
		array( 'label' => __( 'Wine Theme Patterns', 'potential-wine-theme' ) )
	);
}
add_action( 'init', 'potential_wine_register_patterns' );

/**
 * Enqueue editor styles
 */
function potential_wine_editor_styles() {
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'potential_wine_editor_styles' );

/**
 * Flush rewrite rules on theme activation
 */
function potential_wine_flush_rewrite_rules() {
	potential_wine_register_cpt();
	potential_wine_register_taxonomy();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'potential_wine_flush_rewrite_rules' );

/**
 * ============================================================================
 * ACF FIELD GROUPS FOR WINE POST TYPE
 * ============================================================================
 *
 * Register custom fields for Wine CPT using ACF Free
 * All fields use only ACF Free features (no Pro features)
 */

if ( function_exists( 'acf_add_local_field_group' ) ) {

	/**
	 * Wine Details Field Group
	 *
	 * Comprehensive field group for all wine information including:
	 * - Basic Info (year, type, region, etc.)
	 * - Grape varieties (up to 5)
	 * - Production details
	 * - Tasting notes
	 * - Food pairing
	 * - Additional media
	 * - Awards and scoring
	 */
	acf_add_local_field_group( array(
		'key'      => 'group_wine_details',
		'title'    => 'Wine Details',
		'fields'   => array(

			// ================================================================
			// TAB: BASIC INFO
			// ================================================================
			array(
				'key'   => 'field_wine_tab_basic',
				'label' => 'Basic Info',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Year
			array(
				'key'          => 'field_wine_year',
				'label'        => 'Vintage Year',
				'name'         => 'wine_year',
				'type'         => 'number',
				'instructions' => 'Enter the vintage year (e.g., 2020)',
				'min'          => 1900,
				'max'          => 2100,
				'step'         => 1,
			),

			// Type
			array(
				'key'          => 'field_wine_type',
				'label'        => 'Wine Type',
				'name'         => 'wine_type',
				'type'         => 'select',
				'instructions' => 'Select the type of wine',
				'choices'      => array(
					'red'      => 'Red',
					'white'    => 'White',
					'rose'     => 'Rosé',
					'sparkling' => 'Sparkling',
				),
				'default_value' => 'red',
				'allow_null'    => 0,
				'ui'            => 1,
			),

			// Region
			array(
				'key'          => 'field_wine_region',
				'label'        => 'Region',
				'name'         => 'wine_region',
				'type'         => 'text',
				'instructions' => 'Wine region (e.g., Napa Valley, Bordeaux)',
			),

			// Country
			array(
				'key'          => 'field_wine_country',
				'label'        => 'Country',
				'name'         => 'wine_country',
				'type'         => 'text',
				'instructions' => 'Country of origin',
			),

			// Alcohol Content
			array(
				'key'          => 'field_wine_alcohol',
				'label'        => 'Alcohol Content',
				'name'         => 'wine_alcohol',
				'type'         => 'text',
				'instructions' => 'Alcohol percentage (e.g., 13.5%)',
				'placeholder'  => '13.5%',
			),

			// Volume
			array(
				'key'          => 'field_wine_volume',
				'label'        => 'Bottle Volume',
				'name'         => 'wine_volume',
				'type'         => 'text',
				'instructions' => 'Bottle size (e.g., 750ml)',
				'placeholder'  => '750ml',
				'default_value' => '750ml',
			),

			// ================================================================
			// TAB: GRAPES
			// ================================================================
			array(
				'key'   => 'field_wine_tab_grapes',
				'label' => 'Grape Varieties',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			array(
				'key'     => 'field_wine_grapes_message',
				'label'   => '',
				'name'    => '',
				'type'    => 'message',
				'message' => 'Enter up to 5 grape varieties used in this wine. List in order of predominance.',
			),

			// Grape 1
			array(
				'key'          => 'field_wine_grape_1',
				'label'        => 'Primary Grape Variety',
				'name'         => 'wine_grape_1',
				'type'         => 'text',
				'instructions' => 'Main grape variety (e.g., Cabernet Sauvignon)',
			),

			// Grape 2
			array(
				'key'          => 'field_wine_grape_2',
				'label'        => 'Grape Variety 2',
				'name'         => 'wine_grape_2',
				'type'         => 'text',
				'instructions' => 'Second grape variety (optional)',
			),

			// Grape 3
			array(
				'key'          => 'field_wine_grape_3',
				'label'        => 'Grape Variety 3',
				'name'         => 'wine_grape_3',
				'type'         => 'text',
				'instructions' => 'Third grape variety (optional)',
			),

			// Grape 4
			array(
				'key'          => 'field_wine_grape_4',
				'label'        => 'Grape Variety 4',
				'name'         => 'wine_grape_4',
				'type'         => 'text',
				'instructions' => 'Fourth grape variety (optional)',
			),

			// Grape 5
			array(
				'key'          => 'field_wine_grape_5',
				'label'        => 'Grape Variety 5',
				'name'         => 'wine_grape_5',
				'type'         => 'text',
				'instructions' => 'Fifth grape variety (optional)',
			),

			// ================================================================
			// TAB: PRODUCTION
			// ================================================================
			array(
				'key'   => 'field_wine_tab_production',
				'label' => 'Production',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Vineyard
			array(
				'key'          => 'field_wine_vineyard',
				'label'        => 'Vineyard',
				'name'         => 'wine_vineyard',
				'type'         => 'text',
				'instructions' => 'Vineyard or estate name',
			),

			// Barrel Aging
			array(
				'key'          => 'field_wine_barrel',
				'label'        => 'Barrel Aging',
				'name'         => 'wine_barrel',
				'type'         => 'text',
				'instructions' => 'Aging details (e.g., 12 months in French oak)',
				'placeholder'  => '12 months in French oak',
			),

			// Production Volume
			array(
				'key'          => 'field_wine_production',
				'label'        => 'Production Volume',
				'name'         => 'wine_production',
				'type'         => 'number',
				'instructions' => 'Number of bottles produced',
				'min'          => 0,
				'step'         => 1,
			),

			// ================================================================
			// TAB: TASTING NOTES
			// ================================================================
			array(
				'key'   => 'field_wine_tab_tasting',
				'label' => 'Tasting Notes',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Color
			array(
				'key'          => 'field_wine_color',
				'label'        => 'Color',
				'name'         => 'wine_color',
				'type'         => 'text',
				'instructions' => 'Visual description (e.g., Deep ruby red)',
				'placeholder'  => 'Deep ruby red',
			),

			// Aroma
			array(
				'key'          => 'field_wine_aroma',
				'label'        => 'Aroma / Nose',
				'name'         => 'wine_aroma',
				'type'         => 'textarea',
				'instructions' => 'Describe the aromatic profile and bouquet',
				'rows'         => 4,
			),

			// Palate
			array(
				'key'          => 'field_wine_palate',
				'label'        => 'Palate / Taste',
				'name'         => 'wine_palate',
				'type'         => 'textarea',
				'instructions' => 'Describe the flavor profile and mouthfeel',
				'rows'         => 4,
			),

			// Finish
			array(
				'key'          => 'field_wine_finish',
				'label'        => 'Finish',
				'name'         => 'wine_finish',
				'type'         => 'textarea',
				'instructions' => 'Describe the aftertaste and length',
				'rows'         => 3,
			),

			// ================================================================
			// TAB: FOOD PAIRING
			// ================================================================
			array(
				'key'   => 'field_wine_tab_pairing',
				'label' => 'Food Pairing',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Food Pairing Checkboxes
			array(
				'key'          => 'field_wine_pairing',
				'label'        => 'Recommended Pairings',
				'name'         => 'wine_pairing',
				'type'         => 'checkbox',
				'instructions' => 'Select foods that pair well with this wine',
				'choices'      => array(
					'red_meat' => 'Red Meat',
					'poultry'  => 'Poultry',
					'fish'     => 'Fish',
					'cheese'   => 'Cheese',
					'pasta'    => 'Pasta',
					'desserts' => 'Desserts',
				),
				'layout'       => 'vertical',
			),

			// ================================================================
			// TAB: MEDIA
			// ================================================================
			array(
				'key'   => 'field_wine_tab_media',
				'label' => 'Additional Media',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Bottle Image
			array(
				'key'           => 'field_wine_bottle_image',
				'label'         => 'Bottle Image',
				'name'          => 'wine_bottle_image',
				'type'          => 'image',
				'instructions'  => 'Upload an image of the wine bottle',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'library'       => 'all',
			),

			// Label Image
			array(
				'key'           => 'field_wine_label_image',
				'label'         => 'Label Image',
				'name'          => 'wine_label_image',
				'type'          => 'image',
				'instructions'  => 'Upload a closeup of the wine label',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'library'       => 'all',
			),

			// ================================================================
			// TAB: EXTRAS
			// ================================================================
			array(
				'key'   => 'field_wine_tab_extras',
				'label' => 'Awards & Pricing',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'left',
			),

			// Awards
			array(
				'key'          => 'field_wine_awards',
				'label'        => 'Awards & Recognition',
				'name'         => 'wine_awards',
				'type'         => 'textarea',
				'instructions' => 'List awards and accolades (one per line)',
				'rows'         => 5,
				'placeholder'  => "Gold Medal - International Wine Competition 2022\n90 Points - Wine Spectator",
			),

			// Score
			array(
				'key'          => 'field_wine_score',
				'label'        => 'Overall Score',
				'name'         => 'wine_score',
				'type'         => 'number',
				'instructions' => 'Overall rating (0-100)',
				'min'          => 0,
				'max'          => 100,
				'step'         => 1,
			),

			// Price Reference
			array(
				'key'          => 'field_wine_price_reference',
				'label'        => 'Price Reference',
				'name'         => 'wine_price_reference',
				'type'         => 'text',
				'instructions' => 'Suggested retail price or price range (for reference only)',
				'placeholder'  => '$45 - $55',
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'wine',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => 'Complete wine information and tasting details',
	) );

}

/**
 * Helper function to get wine grapes as array
 *
 * Returns all entered grape varieties, filtering out empty values
 *
 * @param int $post_id Wine post ID
 * @return array Array of grape variety names
 */
function potential_wine_get_grapes( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$grapes = array();

	for ( $i = 1; $i <= 5; $i++ ) {
		$grape = get_field( 'wine_grape_' . $i, $post_id );
		if ( ! empty( $grape ) ) {
			$grapes[] = $grape;
		}
	}

	return $grapes;
}

/**
 * Helper function to display wine grapes
 *
 * Returns formatted string of grape varieties
 *
 * @param int    $post_id   Wine post ID
 * @param string $separator Separator between grape names
 * @return string Formatted grape varieties
 */
function potential_wine_display_grapes( $post_id = null, $separator = ', ' ) {
	$grapes = potential_wine_get_grapes( $post_id );
	return ! empty( $grapes ) ? implode( $separator, $grapes ) : '';
}

  /**
   * Enable ACF fields in WordPress REST API
   * Required for wine-grid block editor preview
   */
  add_filter( 'acf/rest_api/wine/get_fields', '__return_true' );
