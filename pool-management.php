<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wprashed.com
 * @since             1.0.0
 * @package           Pool_Management
 *
 * @wordpress-plugin
 * Plugin Name:       Pool Management
 * Plugin URI:        wprashed.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Md Rashed Hossain
 * Author URI:        wprashed.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pool-management
 * Domain Path:       /languages
 * Plugin Type:		Piklist
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POOL_MANAGEMENT_VERSION', '1.0.0' );


/**
 * The code that runs during plugin activation.
 * Load the carbon fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pool-management-activator.php
 */
function activate_pool_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pool-management-activator.php';
	Pool_Management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pool-management-deactivator.php
 */
function deactivate_pool_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pool-management-deactivator.php';
	Pool_Management_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pool_management' );
register_deactivation_hook( __FILE__, 'deactivate_pool_management' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pool-management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pool_management() {

	$plugin = new Pool_Management();
	$plugin->run();

}

run_pool_management();

// Custom Post

function cptui_register_my_cpts() {

	/**
	 * Post Type: Aanwezigheid.
	 */

	$labels = [
		"name" => __( "Aanwezigheid", "hello-elementor" ),
		"singular_name" => __( "Aanwezigheid", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Aanwezigheid", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "pattendance", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id-alt",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "pattendance", $args );

	/**
	 * Post Type: Leerlingen.
	 */

	$labels = [
		"name" => __( "Leerlingen", "hello-elementor" ),
		"singular_name" => __( "Leerlingen", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Leerlingen", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "pstudents", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businesswoman",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "pstudents", $args );

	/**
	 * Post Type: Trainers.
	 */

	$labels = [
		"name" => __( "Trainers", "hello-elementor" ),
		"singular_name" => __( "Trainers", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Trainers", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "ptrainers", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businessman",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "ptrainers", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


// Meta Box

function get_product_cats() {
    $categories = get_terms( 'pstudent', 'orderby=name&hide_empty=0' );
      $cats = array();

      if ( $categories ) 
        foreach ( $categories as $cat ) 
            $cats[$cat->term_id] = esc_html( $cat->name );
			$students = $cats;
      return $cats;
    }

	function get_search_course_cat()
	{
		return get_terms( 'pstudent', 'orderby=name&fields=id=>name&hide_empty=0' );
			
	}

function tdoc_general_metabox(){


	Container::make( 'post_meta', __('Attendence', 'tdoc') )
    ->where( 'post_type', '=', 'pattendance' )

    ->add_fields( array(
		Field::make('text','first_name',__('Voornaam','langona')),
		Field::make('text','last_name',__('Achternaam','langona')),
		Field::make('date','dob',__('Geboortedatum','langona')),
		
        Field::make( 'complex', 'tdoc_sections', __('Student Attendence', 'tdoc') )
            ->add_fields( array(
				Field::make( 'date', 'date', __( 'Date' ) ),
				Field::make( 'select', 'student', 'Student' )
				->add_options( 'get_product_cats'),
				Field::make( 'radio', 'attend', 'Attend' )
				->add_options( array(
					'Yes' => 'Yes',
					'No' => 'No',
				) )
            )),
    ));

	// Trainers Info

	Container::make( 'post_meta', __('Trainers Info', 'tdoc') )
    ->where( 'post_type', '=', 'ptrainers' )

    ->add_fields( array(
		Field::make('text','first_name',__('Voornaam','langona')),
		Field::make('text','last_name',__('Achternaam','langona')),
		Field::make('date','dob',__('Geboortedatum','langona')),
    ));

	// Students Info

	Container::make( 'post_meta', __('Basis Info', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make('text','first_name',__('Voornaam','langona')),
		Field::make('text','last_name',__('Achternaam','langona')),
		Field::make('date','dob',__('Geboortedatum','langona')),
    ));

	// Badje One

	Container::make( 'post_meta', __('Badje One', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'bo_endure', 'B1: Spetters verdragen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_blowing', 'B1: Bellen blazen in het water' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_trial', 'B1: Vallen en opstaan' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_floating', 'B1: Drijven buik' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_float', 'B1: Drijven rug' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_grab', 'B1: Met ogen open iets van de bodem pakken' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_jumping', 'B1: Springen in 90 cm' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bo_through', 'B1: Onder het kleine gat door' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

	// Badje Two

	Container::make( 'post_meta', __('Badje Two', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'bt_belly', 'B2: Five sec drijven buik' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_back', 'B2: Five sec drijven rug' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_jump', 'B2: Springen + uitblazen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_rugcrawl', 'B2: Rugcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_borstcrawl', 'B2: Borstcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_enkelvoudige', 'B2: Enkelvoudige rugslag' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bt_schoolslag', 'B2: Comb.schoolslag hoofd boven water' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

	// Badje Three

	Container::make( 'post_meta', __('Badje Three', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'bth_springen', 'B3: Springen 2.00 M' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_door', 'B3: Door kleine duikscherm' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_combinatie', 'B3: Combinatie schoolslag' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_enkelvoudige', 'B3: Enkelvoudige rugslag' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_rugcrawl', 'B3: Rugcrawl combi' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_borstcrawl', 'B3: Borstcrawl combi' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_draaien', 'B3: Draaien buik / rug' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'bth_water', 'B3: Water trappelen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

	// Diploma A

	Container::make( 'post_meta', __('Diploma A', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'da_survival', 'A: Proef survival' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_orientatie', 'A: Proef onder water orientatie' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_conditiezwemmen', 'A: Proef conditiezwemmen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_borstcrawl', 'A: Proef borstcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_rugcrawl', 'A: Proef rugcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_vertrouwd', 'A: Proef je vertrouwd voelen in het water' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'da_boven', 'A: Boven water orientatie en verplaatsen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

	// Diploma B

	Container::make( 'post_meta', __('Diploma B', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'db_survival', 'B: Proef survival' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_onder', 'B: Proef onder water orientatie' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_conditiezwemmen', 'B: Proef conditiezwemmen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_borstcrawl', 'B: Proef borstcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_rugcrawl', 'B: Proef rugcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_vertrouwd', 'B: Proef je vertrouwd voelen in het water' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_water', 'B: Boven water orienteren en verplaatsen' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'db_ademhaling', 'B: Zijwaartse ademhaling' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

	// Diploma C

	Container::make( 'post_meta', __('Diploma C', 'tdoc') )
    ->where( 'post_type', '=', 'pstudents' )

    ->add_fields( array(
		Field::make( 'radio', 'dc_survival', 'C: Proef survival' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'dc_borstcrawl', 'C: Proef borstcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'dc_rugcrawl', 'C: Proef rugcrawl' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) ),
		Field::make( 'radio', 'dc_vertrouwd', 'C: Je vertrouwd voelen in het water' )
		->add_options( array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		) )
    ));

}
add_action('carbon_fields_register_fields', 'tdoc_general_metabox');
