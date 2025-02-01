
<!-- footer area start -->
<footer>
    <div class="footer-area theme-background pt-120 pb-80 p-relative fix">
        <div class="tp-footer__right-bg wow slideInLeft   ">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/footer-left-trns.png" alt="">
        </div>
        <div class="tp-footer__car">
            <img class=" tp-footer__shape-1 movingX" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/footer-car.png" alt="">
        </div>

        <?php if ( is_active_sidebar('footer-widget-1' ) || is_active_sidebar('footer-widget-2' ) || is_active_sidebar('footer-widget-3' ) || is_active_sidebar('footer-widget-4' )) : ?>
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-widget-1'); ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-widget-2'); ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-widget-3'); ?>                
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-widget-4'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="tp-footer__bottom  pt-25 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-lg-6 col-md-7  col-12">
                    <div class="tp-footer__copyright text-md-start text-center">
                        <p>Copyright © 2023 Portx by <a href="#">Themepure.</a> All Rights Reserved </p>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-md-5  col-12">
                    <div class="tp-footer__menu text-md-end text-center">
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->