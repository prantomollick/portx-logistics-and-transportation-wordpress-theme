<?php
/**
 * Elementor Protx_Project_List Widget
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
class Portx_Project_List extends Widget_Base {

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
		return 'portx-project-list';
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
		return __( 'Portx Project List', 'portx' );
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
		return 'eicon-posts-carousel';
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
			'section_project_list',
            [
                'label' => __( 'Section Project List', 'portx' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

        $repeater = new \Elementor\Repeater();

       $repeater->add_control(
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

       $repeater->add_control(
			'item_subtitle',
			[
				'label' => __( 'Subtitle', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This is sub title', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

       $repeater->add_control(
			'item_title',
			[
				'label' => __( 'Title', 'portx' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Air Freight', 'portx' ),
                'dynamic' => ['active' => true],
                'label_block' => true,
			]
		);

       $repeater->add_control(
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
            'project_list',
            [
                'label' => __( 'Project List', 'portx' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_title' => __( 'Supply Chain', 'portx' ),
                    ],
                    [
                        'item_title' => __( 'Supply Chain', 'portx' ),
                    ],
                ],
                'title_field' => '{{{ item_title }}}',
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
        <div class="project-active swiper-container gx-0">

            <div class="swiper-wrapper">
               
                <?php 
                    foreach ( $settings['project_list'] as $project ) :
                    
                    if ( ! empty( $project['item_link']['url'] ) ) {
                        $this->add_link_attributes( 'item_link', $project['item_link'] );
                    }    
                ?>

               <div class="swiper-slide">
                  <div class="tp-project__item p-relative">

                    <?php if ( !empty ( $project['item_image']['url'] ) ) : ?>
                     <div class="tp-project__thumb ">
                        <img class="w-100" src="<?php echo esc_html($project['item_image']['url']); ?>" alt="">
                     </div>
                    <?php endif; ?>

                     <div class="tp-project-box">
                        <div class="tp-project-content">
                           <div class="tp-project-info ">

                            <?php if ( !empty ( $project['item_subtitle'] ) ) : ?>
                            <span><?php echo esc_html($project['item_subtitle']); ?></span>
                            <?php endif; ?>

                            <?php if ( !empty ( $project['item_title'] ) ) : ?>
                                <h4 class="tp-project-titile-1">
                                    <a <?php $this->print_render_attribute_string( 'item_link' ); ?>><?php echo esc_html($project['item_title']); ?></a>
                                </h4>
                            <?php endif; ?>

                           </div>
                        </div>
                        <div class="tp-project-icon">
                           <a <?php $this->print_render_attribute_string( 'item_link' ); ?>><i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>

               <?php endforeach; ?>

            </div>

         </div>

		<?php
	}

}

$widgets_manager->register( new Portx_Project_List() );