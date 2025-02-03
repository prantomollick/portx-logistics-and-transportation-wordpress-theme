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
class Service_Box extends Widget_Base {

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
		return 'service-box';
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
		return __( 'Portx Service Box', 'portx' );
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
		return 'eicon-info-box';
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
			'section_item_box',
            [
                'label' => __( 'Service Box', 'portx' ),
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
                'default' => __( 'Air Freight', 'portx' ),
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

        $this->add_control(
			'item_desc',
			[
				'label' => __( 'Description', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Wherever your cargo we can arrange the shipment for you and remain competitive', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);
        $this->add_control(
			'item_number',
			[
				'label' => __( 'Item Number', 'portx' ),
				'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'label_block' => true,
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'service_box_icon_section',
			[
				'label' => __( 'Service Box Icon', 'aidzone-core' ),
			]
		);

        $this->add_control(
            'icon_style',
            [
                'label' => __( 'Select Icon', 'aidzone-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => __( 'Icon', 'aidzone-core' ),
                    'icon-image' => __( 'Icon Image', 'aidzone-core' ),
                ],
            ]

        );

        $this->add_control(
            'item_icon',
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

                'condition' => [
                    'icon_style' => 'icon',
                ],
            ]
        );
        
        $this->add_control(
            'item_icon_image',
            [
                'label' => esc_html__( 'Image', 'aidzone-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'icon_style' => 'icon-image',
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

        if ( ! empty( $settings['item_link']['url'] ) ) {
			$this->add_link_attributes( 'item_link', $settings['item_link'] );
		}

        ?>
        <div class="tp-services__item p-relative fix  wow fadeInUp   " data-wow-duration=".9s"
                data-wow-delay=".5s">
            
            <?php if ( !empty ( $settings['item_image']['url'] ) ) : ?>
            <div class="tp-services__hover-img">
                <img src="<?php echo esc_html($settings['item_image']['url']); ?>" alt="">
            </div>
            <?php endif; ?>

            <div class="tp-services__wrap z-index-2 d-flex align-items-start">

                <div class="tp-services__icon">
                    <?php if ($settings['icon_style'] == 'icon-image') : ?>
                        <span><img src="<?php echo esc_url($settings['item_icon_image']['url'])?>"></span>
                    <?php else : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['item_icon'], ['aria-hidden' => 'true']); ?>
                    <?php endif; ?>
                </div>

                <div class="tp-services__content">
                    <?php if ( !empty ( $settings['item_title'] ) ) : ?>
                    <h3 class="tp-services__title-1"><a <?php $this->print_render_attribute_string( 'item_link' ); ?>><?php echo esc_html($settings['item_title']); ?></a></h3>
                    <?php endif; ?>
                    
                    <?php if ( !empty ( $settings['item_desc'] ) ) : ?>
                    <p><?php echo esc_html( $settings['item_desc'] );  ?></p>
                    <?php endif; ?>
                </div>
                
                <?php if ( !empty ( $settings['item_number'] ) ) : ?>
                <div class="tp-services__number-count">
                    <?php if ( intval($settings['item_number']) < 10) : ?>
                        <span><?php echo esc_html( str_pad( $settings['item_number'], 2, '0', STR_PAD_LEFT ) ) ?></span>
                    <?php else: ?>
                        <span><?php echo esc_html( $settings['item_number'] ) ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div>
        </div>

		<?php
	}

}

$widgets_manager->register( new Service_Box() );