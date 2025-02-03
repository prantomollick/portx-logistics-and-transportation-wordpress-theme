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
class Portx_About extends Widget_Base {

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
		return 'portx-about';
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
		return __( 'Portx About', 'portx' );
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
		return 'eicon-book';
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
			'section_about',
            [
                'label' => __( 'About Section', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

        $this->add_control(
            'item_image_1',
            [
                'label' => __( 'Image 1', 'portx' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_image_2',
            [
                'label' => __( 'Image 2', 'portx' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );

        $this->add_control(
			'item_subtitle',
			[
				'label' => __( 'Subtitle', 'portx' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'KNOW ABOUT PORTX', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

        $this->add_control(
			'item_title',
			[
				'label' => __( 'Title', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'We provide full range global logistics solution', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

        $this->add_control(
			'item_desc',
			[
				'label' => __( 'Description', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'We strive to understand what they’re going through, what they need what their price points are, and what’s important to them and their customers. We connect with our customers', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);
        $this->end_controls_section(); 

        $this->start_controls_section(
            'about_service_list_section',
            [
                'label' => __( 'About Service List Section', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'about_service_icon',
            [
                'label' => esc_html__( 'Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'about_service_title',
            [
                'label' => __( 'About Service Title', 'portx' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Optimized Travel Cost', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
           
        );

        $this->add_control(
            'about_service_list',
            [
                'label' => __( 'Service List', 'portx' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'about_service_title' => __( 'Optimized Travel Cost', 'portx' ),
                    ],
                    [
                        'about_service_title' => __( 'Delivery Intime', 'portx' ),
                    ],
                    
                ],
                'title_field' => '{{{ about_service_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'about_action_section',
            [
                'label' => __( 'About Action Section', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_btn_text',
            [
                'label' => __( 'Button Text', 'portx' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Learn More', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'about_btn_link',
            [
                'label' => __( 'Button Link', 'portx' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
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

        if ( ! empty( $settings['about_btn_link']['url'] ) ) {
			$this->add_link_attributes( 'about_btn_link', $settings['about_btn_link'] );
            $this->add_render_attribute( 'about_btn_link', 'class', 'about-two__btn thm-btn' );
            
		}
        ?>

        <div class="about-area">
            <div class="tp-about__wrap pt-110 pb-60">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12 wow fadeInLeft   " data-wow-duration=".9s"
                            data-wow-delay=".5s">
                            <div class="tp-about__content">
                                <div class="about-section-title z-index  pb-50">

                                    <?php if ( !empty ( $settings['item_subtitle'] ) ) : ?>
                                    <div class="tp-section__subtitle tp-section__subtitle-before mb-15 p-relative"><?php echo esc_html($settings['item_subtitle']); ?></div>
                                    <?php endif; ?>

                                    <?php if ( !empty ( $settings['item_title'] ) ) : ?>
                                        <h2 class="tp-section__title mb-30"><?php echo esc_html($settings['item_title']); ?></h2>
                                    <?php endif; ?>

                                    <?php if ( !empty ( $settings['item_desc'] ) ) : ?>
                                    <p class="mb-35"><?php echo esc_html( $settings['item_desc'] );  ?></p>
                                    <?php endif; ?>
                                   
                                    <div class="tp-about__list mb-50">

                                        <?php foreach ($settings['about_service_list'] as $service ) : ?>
                                            <div class="tp-about__travel d-flex align-items-center mb-20">

                                                <?php if ( !empty( $service['about_service_icon'] ) ) : ?>
                                                <div class="tp-about__icon mr-20">
                                                    <?php \Elementor\Icons_Manager::render_icon( $service['about_service_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <?php endif; ?>

                                                <?php if ( !empty( $service['about_service_title'] ) ) : ?>
                                                <div class="tp-about__text">
                                                    <span>Optimized Travel Cost</span>
                                                </div>
                                                <?php endif; ?>

                                            </div>
                                        <?php endforeach; ?>
                                     
                                    </div>

                                    <?php if ( !empty ( $settings['about_btn_text'] ) ) : ?>
                                    <div class="tp-about__btn-box">
                                        <a <?php $this->print_render_attribute_string( 'about_btn_link' ); ?>><?php echo esc_html($settings['about_btn_text'] ); ?></a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12 wow fadeInRight   " data-wow-duration=".9s"
                            data-wow-delay=".5s">
                            <div class="tp-about__right-img p-relative text-end">
                                
                                <?php if ( !empty ( $settings['item_image_1']['url'] ) ) : ?>
                                <div class="tp-about__lg-img ml-40">
                                    <img class="w-100" src="<?php echo esc_html($settings['item_image_1']['url']); ?>" alt="">
                                </div>
                                <?php endif; ?>

                                <?php if ( !empty ( $settings['item_image_2']['url'] ) ) : ?>
                                <div class="tp-about__sm-img">
                                    <img class="w-100" src="<?php echo esc_html($settings['item_image_2']['url']); ?>" alt="">
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
		<?php
	}

}

$widgets_manager->register( new Portx_About() );