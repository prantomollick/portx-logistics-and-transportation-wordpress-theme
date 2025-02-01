<?php
    $header_topbar = get_theme_mod('header_topbar', 'on');
    $header_day_text = get_theme_mod('header_day_text', esc_html__('Sunday Closed', 'portx'));
    $header_day_time_text = get_theme_mod('header_day_time_text', esc_html__('Mon - Sat 9.00 - 18.00', 'portx'));
    $header_phone = get_theme_mod('header_phone', esc_html__('(00) 122 456 789', 'portx'));
    $header_email = get_theme_mod('header_email', esc_html__('portxinfo@gmail.com', 'portx'));
    $header_btn_text = get_theme_mod('header_btn_text', esc_html__('REQUEST A QUOTE', 'portx'));
    $header_btn_url = get_theme_mod('header_btn_url', esc_url(site_url('/')));
?>

<!-- header area start -->
<header>
    <div class="main-header d-none d-xl-block">

        <?php if ($header_topbar) : ?>
        <div class="tp-header__top tp-header__he pt-20 pb-20 p-relative">
            <div class="tp-header-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4">
                            <?php if( function_exists('portx_header_logo')) : ?>
                                <div class="main-logo ">
                                    <?php portx_header_logo(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-xl-8">
                            <div class="tp-header">
                                <div class="tp-header__right  d-flex justify-content-end">

                                    <?php if ( !empty ($header_day_time_text) ) : ?>
                                    <div class="tp-header__contact mr-30">
                                        <div class="tp-header__contact d-flex align-items-center">
                                        <span class="tp-header__icon"><i class="flaticon-clock"></i></span>
                                        <div class="tp-header__icon-info ml-20">
                                            <?php if (!empty($header_day_text)) : ?>
                                            <label><?php echo esc_html($header_day_text); ?></label>
                                            <?php endif; ?>
                                            <span><?php echo esc_html($header_day_time_text); ?></span>
                                        </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ( !empty($header_email) ) : ?>
                                    <div class="tp-header__contact mr-30">
                                        <div class="tp-header__contact d-flex align-items-center">
                                        <span class="tp-header__icon"><i class="flaticon-envelope"></i></span>
                                        <div class="tp-header__icon-info ml-20">
                                            <label><?php esc_html_e('Email', 'portx')?></label>
                                            <span>
                                                <a href="mailto:<?php echo esc_attr($header_email); ?>"><?php echo esc_html($header_email); ?></a>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ( !empty($header_phone) ) : ?>
                                    <div class="tp-header__contact">
                                        <div class="tp-header__contact d-flex align-items-center">
                                        <span class="tp-header__icon"><i class="flaticon-telephone"></i></span>
                                            <div class="tp-header__icon-info ml-20">
                                                <label><?php esc_html_e('Call Us', 'portx'); ?></label>
                                                <span> <a href="tel:<?php echo esc_attr($header_phone); ?>"><?php echo esc_html($header_phone); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="tp-header">
            <div id="header-sticky" class="header-bottom black-bg d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                        <div class="tp-header__main-menu main-menu">
                            <nav class="tp-main-menu-content">
                                <?php portx_main_menu(); ?>
                            </nav>
                        </div>
                        </div>
                        <div class="col-xl-4">
                        <div class="tp-header__right text-end d-flex align-items-center justify-content-end">
                            <div class="search-img f-left mr-30">
                                <button class="search-open-btn">
                                    <i class="flaticon-loupe"></i>
                                </button>
                            </div>

                            <?php if ( !empty($header_btn_text) ) : ?>
                            <div class="tp-header__btn">
                                <a class="tp-btn" href="<?php echo esc_url($header_btn_url); ?>"><?php echo esc_html($header_btn_text); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-header d-xl-none pt-20 pb-20">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="main-logo ">
                    <a href="index.html"><img src="assets/img/logo/black-logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-6">
                <div class="mobile__menu d-flex align-items-center justify-content-end">
                    <button class="search-open-btn mr-30 d-none d-sm-block">
                    <i class="flaticon-loupe"></i>
                    </button>
                    <a class="tp-menu-bar" href="javascript:void(0)"><i class="fa-solid fa-bars"></i></a>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<!-- header area end -->