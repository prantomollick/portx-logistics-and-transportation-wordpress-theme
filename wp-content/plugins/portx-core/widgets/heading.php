<?php
/**
 * Elementor heading Widget
 *
 * @package portx-core
 */


namespace PortxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Portx_Heading extends Widget_Base {

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
		return 'portx-heading';
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
		return __( 'Portx Heading', 'portx-core' );
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
		return 'eicon-editor-h3';
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
			'portx_heading_section',
			[
				'label' => __( 'Heading Content', 'portx-core' ),
			]
		);

		$this->add_control(
			'item_sub_title',
			[
				'label' => __( 'Sub Title', 'portx-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is sub title', 'portx-core' ),
			]
		);

        $this->add_control(
			'item_title',
			[
				'label' => __( 'Title', domain: 'portx-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'This is title', 'portx-core' ),
			]
		);

        $this->add_control(
			'item_content',
			[
				'label' => __( 'Content', domain: 'portx-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'This is content', 'portx-core' ),
			]
		);

		$this->add_control(
			'text_alignment',
			[
				'label' => __( 'Text Align', 'portx-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'portx-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'portx-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'portx-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .item-title' => 'text-align: {{VALUE}};',
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

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'portx-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#223645',
                'selectors' => [
                    '{{WRAPPER}} .tp-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'portx-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'portx-core' ),
					'uppercase' => __( 'UPPERCASE', 'portx-core' ),
					'lowercase' => __( 'lowercase', 'portx-core' ),
					'capitalize' => __( 'Capitalize', 'portx-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .tp-section-title' => 'text-transform: {{VALUE}};',
				],
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
        <div class="services-section-title z-index pb-50">
            <?php if (!empty($settings['item_sub_title'])) :?>
            <div class="tp-section__subtitle tp-section__subtitle-before mb-15 p-relative wow fadeInUp   "
                data-wow-duration=".9s" data-wow-delay=".3s"><?php echo portx_kses($settings['item_sub_title']); ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($settings['item_title'])) :?>
            <h2 class="tp-section__title mb-10 wow fadeInUp .item-title   " data-wow-duration=".9s" data-wow-delay=".4s">
             <?php echo portx_kses($settings['item_title']); ?>
            </h2>
            <?php endif; ?>

            <?php if (!empty($settings['item_content'])) :?>
			<p class="tp-section-desc"><?php echo portx_kses($settings['item_content']); ?></p>
			<?php endif; ?>
        </div>
<?php
	}
}


$widgets_manager->register( new Portx_Heading() );