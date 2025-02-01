<?php

function portx_search_logo() {
    $logo_search_url = get_theme_mod('logo_search', esc_url(get_template_directory_uri() . '/assets/img/logo/footer-logo.png'));
    if (!empty($logo_search_url)):
    ?>
        <a href="<?php echo esc_url(home_url()); ?>">
            <img src="<?php echo esc_url($logo_search_url); ?>" alt="logo">
        </a>
    <?php
    endif;
}


function portx_header_logo() {
    $logo_url = get_theme_mod('logo_url', esc_url(get_template_directory_uri() . '/assets/img/logo/black-logo.png') );
    if (!empty ($logo_url)) :
    ?>
        <a href="<?php echo esc_html(home_url()); ?>"><img src="<?php echo esc_url($logo_url); ?>" alt=""></a>
    <?php
    endif;
}

function portx_header_social() {
    $fb_url = get_theme_mod('fb_url', __('#', 'portx'));
    $tw_url = get_theme_mod('tw_url', __('#', 'portx'));
    $ins_url = get_theme_mod('ins_url', __('#', 'portx'));
    $pin_url = get_theme_mod('pin_url', __('#', 'portx'));
    ?>

        <?php if(!empty($fb_url)) :?>
        <a href="<?php echo esc_url( $fb_url); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        <?php endif; ?>
        <?php if(!empty($ins_url)) :?>
        <a href="<?php echo esc_url( $ins_url); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <?php endif; ?>
        <?php if(!empty($tw_url)) :?>
        <a href="<?php echo esc_url( $tw_url); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        <?php endif; ?>
        <?php if(!empty($pin_url)) :?>
        <a href="<?php echo esc_url( $pin_url); ?>" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
        <?php endif; ?>
    <?php
}

function portx_main_menu() {
    wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_class'     => 'main-menu',
        'menu_id'        => 'main-menu',
        'container'      => '',
        'fallback_cb'    => 'Portx_Walker_Nav_Menu::fallback',
        'walker'         => new Portx_Walker_Nav_Menu,
    ) );
}

//aidzone blog pagination
function portx_pagination(){
    $pages = paginate_links( array (
        'type'      => 'array',
        'prev_text' => __('<i class="fa-sharp fa-regular fa-arrow-left"></i>','portx'),
        'next_text' => __('<i class="fa-sharp fa-regular fa-arrow-right"></i>','portx'),
    ) );

    if( $pages ) {
        echo '<nav><ul>';
        foreach ( $pages as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></nav>';
    }
}

/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string      Sanitized markup.
 */
function portx_kses( $portx_custom_tag = '' ) {
    $portx_allowed_html = [
        'svg' => [
            'class'            => true,
            'aria-hidden'      => true,
            'aria-labelledby'  => true,
            'role'             => true,
            'xmlns'            => true,
            'width'            => true,
            'height'           => true,
            'viewbox'          => true, // <= Must be lower case!
        ],
        'path' => [
            'd'               => true,
            'fill'            => true,
            'stroke'          => true,
            'stroke-width'    => true,
            'stroke-linecap'  => true,
            'stroke-linejoin' => true,
            'opacity'         => true,
        ],
        'a' => [
            'class'  => [],
            'href'   => [],
            'title'  => [],
            'target' => [],
            'rel'    => [],
        ],
        'b' => [],
        'blockquote' => [
            'cite' => [],
        ],
        'cite' => [
            'title' => [],
        ],
        'code' => [],
        'del' => [
            'datetime' => [],
            'title'    => [],
        ],
        'dd' => [],
        'div' => [
            'class' => [],
            'title' => [],
            'style' => [],
        ],
        'dl' => [],
        'dt' => [],
        'em' => [],
        'h1' => [],
        'h2' => [],
        'h3' => [],
        'h4' => [],
        'h5' => [],
        'h6' => [],
        'i' => [
            'class' => [],
        ],
        'img' => [
            'alt'    => [],
            'class'  => [],
            'height' => [],
            'src'    => [],
            'width'  => [],
        ],
        'li' => [
            'class' => [],
        ],
        'ol' => [
            'class' => [],
        ],
        'p' => [
            'class' => [],
        ],
        'q' => [
            'cite'  => [],
            'title' => [],
        ],
        'span' => [
            'class' => [],
            'title' => [],
            'style' => [],
        ],
        'iframe' => [
            'width'       => [],
            'height'      => [],
            'scrolling'   => [],
            'frameborder' => [],
            'allow'       => [],
            'src'         => [],
        ],
        'strike' => [],
        'br'     => [],
        'strong' => [],
    ];

    return wp_kses( $portx_custom_tag, $portx_allowed_html );
}





