<footer class="footer-wrapper footer-layout2" style="background-color:<?php echo esc_attr(get_theme_mod('footer_bg_color', '#222222')) ?>!important">
    <!-- ...your newsletter and widget HTML here... -->
    <!-- Example of dynamic copyright -->
    <div class=" copyright-wrap">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-6">
                    <p class="copyright-text">
                        Copyright <i class="fal fa-copyright"></i> <?php echo date('Y'); ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
                    </p>
                </div>
                <!-- Payments image etc. -->
                <div class="col-md-6 text-center text-md-end">
                    <div class="payment-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/normal/payment_methods.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>