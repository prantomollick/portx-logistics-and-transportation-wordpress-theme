<?php
namespace PortxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hero_Slider extends Widget_Base {

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
		return 'portx-hero-slider';
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
		return __( 'Portx Hero Slider', 'portx' );
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
		return 'eicon-slides';
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
	}

    protected function register_content_controls() {
        $this->start_controls_section(
			'section_slides',
			[
				'label' => __( 'Slides Content', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new Repeater();
       
        $repeater->add_control(
            'slide_image',
            [
                'label' => esc_html__('Slide Image', 'portx-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$repeater->add_control(
			'slide_title',
			[
				'label' => __( 'Slide Title', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Safest Logistics Solutions Provider With Integrity', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_caption_text',
			[
				'label' => __( 'Slide Caption text', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Cargo Shipping', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_button_text',
			[
				'label' => __( 'Button Text', 'portx' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'EXPLORE MORE', 'portx' ),
                'label_block' => true,
			]
		);

        $repeater->add_control(
            'slide_button_link',
            [
                'label' => esc_html__('Button Link', 'portx-core'),
                'type' => Controls_Manager::URL,
                'placeholder' =>  __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $repeater->add_control(
			'slide_number',
			[
				'label' => __( 'Slide Number', 'portx' ),
				'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'label_block' => true,
			]
		);

        $repeater->add_control(
            'facebook_icon',
            [
                'label' => esc_html__( 'Facebook Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-brands fa-facebook-f',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'fa-facebook-f',
                        'facebook',
                        'facebook-square',
                    ],
                ],
            ]
        );


        $repeater->add_control(
            'facebook_link',
            [
                'label' => esc_html__('Facebook Link', 'portx-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $repeater->add_control(
            'x_icon',
            [
                'label' => esc_html__( 'X Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-sharp fa-solid fa-x',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'fa-sharp fa-solid fa-x',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'x_link',
            [
                'label' => esc_html__('X Link', 'portx-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $repeater->add_control(
            'linkedin_icon',
            [
                'label' => esc_html__( 'Linkedin Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-brands fa-linkedin-in',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'fa-linkedin-in',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'linkedin_link',
            [
                'label' => esc_html__('Linkedin Link', 'portx-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $repeater->add_control(
            'insta_icon',
            [
                'label' => esc_html__( 'Instagram Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-brands fa-instagram',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'fa-instagram',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'insta_link',
            [
                'label' => esc_html__('Instagram Link', 'portx-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'portx' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );


        $this->add_control(
            'slide_list',
            [
                'label' => __('Slides', 'portx-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['slide_title' => __('Safest Logistics Solutions Provider With Integrity', 'portx-core')],
                    ['slide_title' => __('Safest Logistics Solutions Provider With Integrity', 'portx-core')]
                ],
                'title_field' => '{{{ slide_title }}}',
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
        ?>
        <div class="tp-slider__area p-relative">
            <div class="hero-active swiper-container">
                <div class="swiper-wrapper">

                    <?php foreach ($settings['slide_list'] as $slide) : ?>

                        <div class=" swiper-slide tp-slider__item p-relative">
                            <div class="tp-slider-right-bg tp-slider__height d-flex align-items-center "
                                style="background-image: url(<?php echo esc_url($slide['slide_image']['url']); ?>);">

                                    <div class="tp-slider__social">
                                        <ul>
                                            <?php if (!empty($slide['facebook_link']['url'])): ?>
                                            <li>
                                                <a href="<?php echo esc_url($slide['facebook_link']['url']); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['facebook_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['x_link']['url'])): ?>
                                            <li>
                                                <a href="<?php echo esc_url($slide['x_link']['url']); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['x_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['linkedin_link']['url'])): ?>
                                            <li>
                                                <a href="<?php echo esc_url($slide['linkedin_link']['url']); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['linkedin_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['insta_link']['url'])): ?>
                                            <li>
                                                <a href="<?php echo esc_url($slide['insta_link']['url']); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['insta_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                <div class="circal">
                                </div>

                                <?php if ( !empty( $slide['slide_caption_text'] ) ) : ?>
                                <div class="cargo-shipping text-end ">
                                    <div class="cargo-shipping-text">
                                        <span><?php echo esc_html($slide['slide_caption_text']); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ( !empty( $slide['slide_caption_text'] ) ) : ?>
                                <div class="tp-slider__counter-number d-flex align-items-start">
                                    <span><?php echo str_pad($slide['slide_number'], 2, '0', STR_PAD_LEFT); ?></span>
                                    <div class="tp-slider__quote-icon">
                                        <i class="flaticon-quotations"></i>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-xxl-9 col-xl-9">
                                        <div class="tp-slider__content p-relative z-index-1">
                                            
                                            <?php if ( !empty( $slide['slide_title'] ) ) : ?>
                                            <h2 class="tp-slider-title mb-35">
                                                <?php echo portx_kses($slide['slide_title'] ); ?>
                                            </h2>
                                            <?php endif; ?>

                                            <?php if (!empty ( $slide['slide_button_text'] )): ?>
                                            <div class="tp-slide-btn-box">
                                                <a class="thm-btn" href="<?php echo esc_url($slide['slide_button_link']['url']); ?>"><?php echo esc_html($slide['slide_button_text']); ?></a>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                
                <div class="tp-slider__nav text-end">
                    <button class="hero-button-next"><i class="fa-regular fa-angle-left"></i></button>
                    <button class="hero-button-prev"><i class="fa-regular fa-angle-right"></i></button>
                </div>
            </div>
        </div>

		<?php
	}

}

$widgets_manager->register( new Hero_Slider() );