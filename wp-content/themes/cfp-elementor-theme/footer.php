    </div><!-- #content -->

    <!-- Footer -->
    <footer id="colophon" class="footer site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-chess.jpg" alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <?php endif; ?>
                    <p><?php bloginfo('description'); ?></p>
                </div>
                
                <div class="footer-links">
                    <h3><?php esc_html_e('Quick Links', 'cfp-elementor-theme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                        'fallback_cb' => 'cfp_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <?php if (is_active_sidebar('footer-widget-area')) : ?>
                    <div class="footer-widgets">
                        <?php dynamic_sidebar('footer-widget-area'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'cfp-elementor-theme'); ?></p>
            </div>
        </div>
    </footer>

    <!-- FIDE 100th Anniversary Popup -->
    <div id="fide-popup" class="fide-popup">
        <div class="fide-popup-content">
            <div class="fide-popup-header">
                <h2><?php esc_html_e('🎉 Happy 100th Anniversary, FIDE!', 'cfp-elementor-theme'); ?></h2>
                <button class="fide-popup-close" id="fide-popup-close">&times;</button>
            </div>
            <div class="fide-popup-body">
                <p><strong><?php esc_html_e('Dear Chess Community,', 'cfp-elementor-theme'); ?></strong></p>
                <p><?php esc_html_e('Let us come together to celebrate a century of unity, competition, and passion for the game we love! The FIDE\'s 100th anniversary marks a significant milestone in our shared journey.', 'cfp-elementor-theme'); ?></p>
                <p><?php esc_html_e('From the early days of chess to the global phenomenon it is today, FIDE has been the driving force behind the growth and development of our beloved game. Let us honor the pioneers, leaders, and players who have shaped the history of chess.', 'cfp-elementor-theme'); ?></p>
                <p><?php esc_html_e('To commemorate this momentous occasion, we invite you to organize chess tournaments, events, and gatherings in your towns and cities. Share your memories, make new ones, and let the spirit of chess unite us all!', 'cfp-elementor-theme'); ?></p>
                <p><?php esc_html_e('Take pictures, share stories, and tag us so we can relive the joy and excitement of this special day. Let\'s make this a century celebration to remember!', 'cfp-elementor-theme'); ?></p>
                <p><strong><?php esc_html_e('Happy 100th anniversary, FIDE!', 'cfp-elementor-theme'); ?></strong></p>
                <div class="fide-signature">
                    <p><strong><?php esc_html_e('Best regards,', 'cfp-elementor-theme'); ?></strong><br>
                        <strong><?php esc_html_e('FM Amer Karim', 'cfp-elementor-theme'); ?></strong><br>
                        <?php esc_html_e('Acting General Secretary', 'cfp-elementor-theme'); ?><br>
                        <?php esc_html_e('Chess Federation of Pakistan', 'cfp-elementor-theme'); ?><br>
                        <a href="mailto:amer.chess@gmail.com">amer.chess@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
