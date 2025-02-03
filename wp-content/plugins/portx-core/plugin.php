<?php
namespace PortxCore;

use PortxCore\PageSettings\Page_Settings;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	/**
	 * Editor scripts
	 *
	 * Enqueue plugin javascripts integrations for Elementor editor.
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'editor_scripts_as_a_module' ], 10, 2 );

		wp_enqueue_script(
			'elementor-hello-world-editor',
			plugins_url( '/assets/js/editor/editor.js', __FILE__ ),
			[
				'elementor-editor',
			],
			'1.2.1',
			true
		);
	}

	/**
	 * Force load editor script as a module
	 *
	 * @since 1.2.1
	 *
	 * @param string $tag
	 * @param string $handle
	 *
	 * @return string
	 */
	public function editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'elementor-hello-world-editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once( __DIR__ . '/widgets/hero-slider.php' );
		require_once( __DIR__ . '/widgets/service-box.php' );
		require_once( __DIR__ . '/widgets/heading.php' );
		require_once( __DIR__ . '/widgets/video.php' );
		require_once( __DIR__ . '/widgets/about.php' );
	}

	/**
	 * Add page settings controls
	 *
	 * Register new settings for a document page settings.
	 *
	 * @since 1.2.1
	 * @access private
	 */
	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/manager.php' );
		new Page_Settings();
	}

	function portx_add_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'portx-widget-category',
			[
				'title' => esc_html__( 'Portx Core', 'portx-core' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	public function portx_add_custom_icons_tab($tabs = array()) {
		$flat_icons = array(
           	'flaticon-clock',
			'flaticon-envelope',
			'flaticon-quotations',
			'flaticon-next',
			'flaticon-plane',
			'flaticon-cruise',
			'flaticon-delivery-truck',
			'flaticon-train',
			'flaticon-warehouse',
			'flaticon-delivery',
			'flaticon-find',
			'flaticon-delivery-truck-1',
			'flaticon-rating',
			'flaticon-lorry',
			'flaticon-medal',
			'flaticon-truck',
			'flaticon-package',
			'flaticon-internet',
			'flaticon-boat',
			'flaticon-headphone',
			'flaticon-project-management',
			'flaticon-teamwork',
			'flaticon-badge',
			'flaticon-quote',
			'flaticon-check',
			'flaticon-timing',
			'flaticon-down-arrow',
			'flaticon-play',
			'flaticon-train-1',
			'flaticon-truck-1',
			'flaticon-plane-1',
			'flaticon-handshake',
			'flaticon-clouds',
			'flaticon-worldwide',
			'flaticon-packaging',
			'flaticon-bill',
			'flaticon-check-1',
			'flaticon-plane-2',
			'flaticon-train-2',
			'flaticon-boat-1',
			'flaticon-van',
			'flaticon-fintech',
			'flaticon-24-hours-support',
			'flaticon-play-button',
			'flaticon-eco-earth',
			'flaticon-group',
			'flaticon-email',
			'flaticon-telephone',
			'flaticon-loupe',
			'flaticon-telephone-symbol-button',
			'flaticon-mail',
			'flaticon-location',
			'flaticon-check-mark-black-outline',
			'flaticon-search',
			'flaticon-coffee-cup',
			'flaticon-location-1',
			'flaticon-warehouse-1',
			'flaticon-customer-service',
			'flaticon-share',
			'flaticon-shield',
			'flaticon-parcel',
        );

        $tabs['tp-flaticon-icons'] = array(
            'name' => 'tp-flaticon-icons',
            'label' => esc_html__('Portx - Flat Icons', 'aidzone-core'),
            'labelIcon' => 'eicon-elementor',
            'prefix' => '',
            'displayPrefix' => 'tp',
            'url' => plugins_url('/', __FILE__) . 'assets/css/flaticon.css',
            'icons' => $flat_icons,
            'ver' => '1.0.0',
        );

		$fontawesome_icons = [
			'facebook-f', 
			'twitter', 
			'linkedin-in', 
			'instagram'
		];

		$tabs['tp-fontawesome-brands'] = array(
			'name' => 'tp-fontawesome-brands',
			'label' => esc_html__('TP - Fontawesome Brands', 'tpcore'),
			'prefix' => 'fa-',
			'displayPrefix' => 'fa-brands',
			'url' => plugins_url('/', __FILE__) . 'assets/css/font-awesome-pro.css',
			'icons' => $fontawesome_icons,
			'ver' => '1.0.0',
		);

		return $tabs;
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		
		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Add Elementor widget categories
		add_action( 'elementor/elements/categories_registered', [$this, 'portx_add_widget_categories'] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register custom icons
		add_filter('elementor/icons_manager/additional_tabs', [$this, 'portx_add_custom_icons_tab']);

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'editor_scripts' ] );
		
		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
Plugin::instance();
