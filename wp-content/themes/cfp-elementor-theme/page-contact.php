<?php
/**
 * Template for Contact page
 *
 * @package CFP_Elementor_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="contact-page">
            <div class="contact-hero">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <p class="page-description"><?php esc_html_e('Get in touch with the Chess Federation of Pakistan', 'cfp-elementor-theme'); ?></p>
            </div>

            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3><?php esc_html_e('Address', 'cfp-elementor-theme'); ?></h3>
                            <p><?php esc_html_e('Chess Federation of Pakistan', 'cfp-elementor-theme'); ?><br>
                            <?php esc_html_e('Islamabad, Pakistan', 'cfp-elementor-theme'); ?></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3><?php esc_html_e('Phone', 'cfp-elementor-theme'); ?></h3>
                            <p><a href="tel:+92XXXXXXXXX">+92 XXX XXXXXXX</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3><?php esc_html_e('Email', 'cfp-elementor-theme'); ?></h3>
                            <p><a href="mailto:info@cfpofficial.com">info@cfpofficial.com</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3><?php esc_html_e('Office Hours', 'cfp-elementor-theme'); ?></h3>
                            <p><?php esc_html_e('Monday - Friday: 9:00 AM - 5:00 PM', 'cfp-elementor-theme'); ?><br>
                            <?php esc_html_e('Saturday: 9:00 AM - 1:00 PM', 'cfp-elementor-theme'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-container">
                    <h2><?php esc_html_e('Send us a Message', 'cfp-elementor-theme'); ?></h2>
                    <p><?php esc_html_e('Fill out the form below and we\'ll get back to you as soon as possible.', 'cfp-elementor-theme'); ?></p>
                    
                    <!-- Elementor Form Widget Placeholder -->
                    <div class="elementor-form-placeholder">
                        <?php if (class_exists('Elementor\Plugin')) : ?>
                            <?php
                            // This is where the Elementor form widget would be rendered
                            // In practice, this would be handled by Elementor's form widget
                            ?>
                            <div class="contact-form">
                                <form class="form" id="contact-form">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="<?php esc_attr_e('Your Name', 'cfp-elementor-theme'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email', 'cfp-elementor-theme'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="<?php esc_attr_e('Subject', 'cfp-elementor-theme'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="<?php esc_attr_e('Your Message', 'cfp-elementor-theme'); ?>" rows="5" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message', 'cfp-elementor-theme'); ?></button>
                                </form>
                            </div>
                        <?php else : ?>
                            <p><?php esc_html_e('Please install Elementor Pro to use the contact form.', 'cfp-elementor-theme'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
