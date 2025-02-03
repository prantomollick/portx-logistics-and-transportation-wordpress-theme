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
class Portx_Video extends Widget_Base {

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
		return 'portx-video';
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
		return __( 'Portx video', 'portx' );
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
		return 'eicon-youtube';
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
			'section_video',
            [
                'label' => __( 'Video Section', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

        $this->add_control(
            'item_image',
            [
                'label' => __( 'Image', 'portx' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );

        $this->add_control(
			'item_title',
			[
				'label' => __( 'Title', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Watch our videos', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

        $this->add_control(
			'item_link',
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

        if ( ! empty( $settings['item_link']['url'] ) ) {
			$this->add_link_attributes( 'item_link', $settings['item_link'] );
            $this->add_render_attribute( 'item_link', 'class', 'popup-video' );
		}

        ?>

        <div class="video-area tp-video__height-video-bg tp-video__bg-opacity p-relative jarallax"
            style="background-image: url(<?php echo esc_html($settings['item_image']['url']); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                    <div
                        class="tp-video__wrap d-flex align-items-center justify-content-md-end justify-content-center z-index-2 pt-135">

                        <?php if ( !empty ( $settings['item_title'] ) ) : ?>
                        <div class="video-one__text">
                            <h4><?php echo esc_html($settings['item_title']); ?></h4>
                        </div>
                        <?php endif; ?>

                        <?php if ( !empty ( $settings['item_link']['url'] ) ) : ?>
                        <div class="video-one__video-link ml-40">
                            <a <?php $this->print_render_attribute_string( 'item_link' ); ?>>
                                <div class="video-one__video-icon">
                                <span><i class="fa-sharp fa-solid fa-play"></i></span>
                                <i class="ripple"></i>
                                </div>
                            </a>
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

$widgets_manager->register( new Portx_Video() );