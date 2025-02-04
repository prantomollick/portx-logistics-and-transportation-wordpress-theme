<?php
/**
 * Elementor Contact Form Widget.
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
class Portx_Contact_Form extends Widget_Base {

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
		return 'portx-contact-form';
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
		return __( 'Portx Contact Form', 'portx-core' );
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
		return 'eicon-shortcode';
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
			'section_contact_form',
            [
                'label' => __( 'Section Contact Form', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

        $this->add_control(
			'item_subtitle',
			[
				'label' => __( 'Subtitle', 'portx' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'This is subtitle', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
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
			'item_desc',
			[
				'label' => __( 'Description', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Air freight is the fastest way to transport goods and we can deliver your cargo to any continent you want fastest way to transport', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

		$this->add_control(
			'item_shortcode',
			[
				'label' => __( 'Shortcode', 'portx' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '[contact-form-7 id="9fd43e5" title="Main Contact form"]', 'portx' ),
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

?>

	<div class="contact-page-area pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-xl-4">
					<div class="contact-page-title mr-70">
						<div class="about-section-title z-index  pb-50">

							<?php if ( !empty($settings['item_subtitle']) ) : ?>
							<div class="tp-section__subtitle mb-15 p-relative">
								<?php echo portx_kses($settings['item_subtitle']); ?>
							</div>
							<?php endif; ?>
							
							<?php if ( !empty($settings['item_title']) ) : ?>
							<h2 class="tp-section__title mb-30">
								<?php echo portx_kses($settings['item_title']); ?>
							</h2>
							<?php endif; ?>
							
							<?php if ( !empty($settings['item_desc']) ) : ?>
							<p class="mb-35">
								<?php echo portx_kses($settings['item_desc']); ?>
							</p>
							<?php endif; ?>

						</div>
					</div>
				</div>
				
				<?php if (!empty($settings['item_shortcode'])) : ?>
				<div class="col-xl-8">
					<div class="contact-page__comment-form">
						<?php echo do_shortcode( $settings['item_shortcode'] ); ?>						
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>

<?php
	}
}


$widgets_manager->register( new Portx_Contact_Form() );