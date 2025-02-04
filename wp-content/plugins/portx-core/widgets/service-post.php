<?php
/**
 * Elementor Services Widget
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
class Portx_Service_Post extends Widget_Base {

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
		return 'portx-service-post';
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
		return __( 'Portx Service Post', 'portx-core' );
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
		return 'eicon-post-list';
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
		$this->start_controls_section(
			'aidzone_post_section',
			[
				'label' => __( 'Blog Post', 'portx-core' ),
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => __( 'Post Per Page', 'portx-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

        $this->add_control(
			'cat_include',
			[
				'label' => __( 'Include Category', 'portx-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => portx_get_categories('service-cat'),
			]
		);

        $this->add_control(
			'cat_exclude',
			[
				'label' => __( 'Exclude Category', 'portx-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => portx_get_categories('service-cat')
			]
		);

		$this->add_control(
			'post_include',
			[
				'label' => __( 'Include Post', 'portx-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => portx_get_posts('service'),
			]
		);

		$this->add_control(
			'post_exclude', 
			[
				'label' => __( 'Exclude Post', 'portx-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => portx_get_posts(),
			]
		);

        $this->add_control(
			'post_order',
			[
				'label' => __( 'Order', 'portx-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => __( 'Ascending', 'portx-core' ),
					'DESC' => __( 'Descending', 'portx-core' ),
				],
				'default' => 'DESC',
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' => __( 'Order By', 'portx-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ID' => __( 'Post ID', 'portx-core' ),
					'author' => __( 'Author', 'portx-core' ),
					'title' => __( 'Title', 'portx-core' ),
					'date' => __( 'Date', 'portx-core' ),
					'modified' => __( 'Last Modified Date', 'portx-core' ),
					'parent' => __( 'Parent ID', 'portx-core' ),
					'rand' => __( 'Random', 'portx-core' ),
					'comment_count' => __( 'Comment Count', 'portx-core' ),
					'menu_order' => __( 'Menu Order', 'portx-core' ),
				],
				'default' => 'date',
			]
		);

		$this->end_controls_section();


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
                'default' => '#f00',
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

		$args = [
			'post_type' => 'service',
			'posts_per_page' => $settings['post_per_page'],
			'orderby' => $settings['post_orderby'],
			'order' => $settings['post_order'],
			'post__in' => $settings['post_include'],
			'post__not_in' => $settings['post_exclude']
		];

		if(!empty($settings['cat_include']) and !empty($settings['cat_exclude'])) {
			$args['tax_query'] = [
				'relation' => 'AND',
				[
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $settings['cat_include'],
					'operator' => 'IN'
				],
				[
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $settings['cat_exclude'],
					'operator' => 'NOT IN'
				]
			]; 
		} elseif ( !empty($settings['cat_include']) || !empty($settings['cat_exclude']) ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => !empty($settings['cat_include']) ? $settings['cat_include'] : $settings['cat_exclude'],
					'operator' => !empty($settings['cat_include']) ? 'IN' : 'NOT IN'
				]
			];
		}


		$query = new \WP_Query($args);

?>
        <section class="services-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                <?php 
					if( $query->have_posts() ) :
					while( $query->have_posts() ) : 
					$query->the_post();
					$categories = get_the_terms(get_the_ID(), 'service-cat');
				?>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="tp-services-3__item p-relative mb-30 z-index-2 wow fadeInUp  " data-wow-duration=".9s"
                        data-wow-delay=".3s">

                        <?php if ( has_post_thumbnail() ) : ?>
                        <div class="tp-services-3__thumb tp-services-3__before-color p-relative">
                            <?php the_post_thumbnail('service-thumb', ['class' => 'w-100', 'alt' => esc_attr(get_the_title())]); ?>
                        </div>
                        <?php endif; ?>
                        <div class="tp-services-3__wrap d-flex align-items-start">

                            <div class="tp-services-3__icon">

                                <span><i class="flaticon-plane-1"></i></span>
                            </div>

                            <div class="tp-services-3__content">

                                <h3 class="tp-services-3-title-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                <?php if ( has_excerpt() ) : ?>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 39, '...'); ?></p>
                                <?php else : ?>
                                    <p><?php echo wp_trim_words(get_the_content(), 39, '...'); ?></p>
                                <?php endif; ?>

                                <div class="tp-services-3__btn">
                                    <a class="tp-services-btn" href="<?php the_permalink(); ?>">READ MORE<i
                                            class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>

                </div>
            </div>
        </section>
<?php
	}
}


$widgets_manager->register( new Portx_Service_Post() );