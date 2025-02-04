<?php
/**
 * Elementor Services Widget
 *
 * @package portx-core
 */
namespace PortxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Portx_Request_Quote extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portx-request-quote';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Portx Reqest Quote', 'portx' );
	}

    /**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-info-envelope';
	}
    
	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'portx-widget-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'portx-core' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->register_content_controls();
        $this->register_style_controls();
	}

    protected function register_content_controls() {
        $this->start_controls_section(
			'section_request_quote',
            [
                'label' => __( 'Service Box', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

      
        $this->add_control(
			'item_title',
			[
				'label' => __( 'Title', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This is title', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

        $this->add_control(
			'button_text',
            [
                'label' => __( 'Button Text', 'portx' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Request A Quote', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
		);

        $this->add_control(
			'button_link',
            [
                'label' => __( 'Link', 'portx' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
		);

        $this->end_controls_section();  
    }

    protected function register_style_controls() {
        // Style control
          $this->start_controls_section(
              'section_style',
              [
                  'label' => __( 'Style', 'portx-core' ),
                  'tab' => Controls_Manager::TAB_STYLE,
              ]
          );
        $this->end_controls_section();
    }

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

        if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_link', $settings['button_link'] );
            $this->add_render_attribute( 'button_link', 'class', 'tp-btn-white' );
		}
        ?>

        <div class="cta-area-2 theme-color-2 pt-60 pb-60 p-relative fix">
            <div class="tp-cta__lg-circel">
                <img src="<?php get_template_directory_uri();?>/assets/img/blog/lg-circel.png" alt="">
            </div>
            <div class="tp-cta__sm-circel">
                <img src="<?php get_template_directory_uri();?>/assets/img/blog/circel.png" alt="">
            </div>
            <div class="tp-cta__shap-3 wow slideInLeft   ">
                <img src="<?php get_template_directory_uri();?>/assets/img/cta/cta-shap-3.png" alt="">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-8">
                    <div class="tp-cta-2">
                        <div class="tp-cta__content wow fadeInUp   text-center text-lg-start" data-wow-duration=".9s"
                            data-wow-delay=".5s">

                            <?php if ( !empty($settings['item_title']) ) : ?>
                            <h2 class="tp-cta-title-2"><?php echo portx_kses($settings['item_title']); ?></h2>
                            <?php endif; ?>

                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                    <div class="tp-cta-2__btn text-center text-lg-start">
                    
                        <?php if ( !empty($settings['button_text']) ) : ?>
                        <div class="tp-cta-2__btn wow fadeInUp  " data-wow-duration=".9s" data-wow-delay=".7s">
                            <a <?php $this->print_render_attribute_string( 'button_link' ); ?>><?php echo esc_html($settings['button_text']); ?></a>
                        </div>
                        <?php endif; ?>

                    </div>
                    </div>
                </div>
            </div>
        </div>

		<?php
	}

}

$widgets_manager->register( new Portx_Request_Quote() );