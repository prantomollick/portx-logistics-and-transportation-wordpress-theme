<?php
   $header_phone = get_theme_mod('header_phone', esc_html__('(00) 122 456 789', 'portx'));
   $header_email = get_theme_mod('header_email', esc_html__('portxinfo@gmail.com', 'portx'));
   $header_offcanvas_btn_text = get_theme_mod('header_offcanvas_btn_text', esc_html__('Getting Started', 'portx'));
   $header_offcanvas_btn_url = get_theme_mod('header_offcanvas_btn_url', esc_html__('#', 'portx'));
?>

<!--  tp-offcanvus-area-start  -->
<div class="tpoffcanvas-area">
   <div class="tpoffcanvas">
      <div class="tpoffcanvas__close-btn">
         <button class="close-btn"><i class="fal fa-times"></i></button>
      </div>

      <?php if( function_exists('portx_header_logo') ) : ?>
      <div class="tpoffcanvas__logo">
         <?php portx_header_logo(); ?>
      </div>
      <?php endif; ?>      

      <div class="tp-main-menu-mobile"></div>

      <?php if ( !empty($header_offcanvas_btn_text) ) : ?>
         <div class="offcanvas__btn mb-20">
            <a class="tp-btn w-100" href="<?php echo esc_url($header_offcanvas_btn_url); ?>"><?php echo esc_html($header_offcanvas_btn_text); ?></a>
         </div>
      <?php endif; ?>

      <div class="offcanvas__contact mb-40">

         <?php if( !empty($header_phone) ) : ?>
            <p class="offcanvas__contact-call">
               <a href="tel:<?php echo esc_attr($header_phone); ?>"><?php echo esc_html($header_phone); ?></a>   
            </p>
         <?php endif; ?>

         <?php if( !empty($header_email) ) : ?>
            <p class="offcanvas__contact-mail"><a href="mailto:<?php echo esc_attr($header_email); ?>"><?php echo esc_html($header_email); ?></a></p>
         <?php endif; ?>

      </div>

      <div class="offcanvas__social">
         <?php if( function_exists('portx_header_social') ) : ?>
            <?php portx_header_social(); ?>
         <?php endif; ?>
      </div>
      
   </div>
</div>
<div class="body-overlay"></div>
   <!--  tp-offcanvus-area end -->