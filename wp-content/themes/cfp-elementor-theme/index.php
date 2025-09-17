<?php
/**
 * The main template file
 *
 * @package CFP_Elementor_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Fallback content when no posts exist -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1 class="hero-title">
                            <?php echo esc_html(get_theme_mod('cfp_hero_title', 'Empowering Minds, Shaping Futures')); ?>
                        </h1>
                        <h2 class="hero-subtitle">
                            <?php echo esc_html(get_theme_mod('cfp_hero_subtitle', 'National Mind Sports Initiative for Schools')); ?>
                        </h2>
                        <p class="hero-description">
                            <?php echo esc_html(get_theme_mod('cfp_hero_description', 'Be a member of our chess club and participate in online tournaments with players from all over the world.')); ?>
                        </p>
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary"><?php esc_html_e('Contact Us Today', 'cfp-elementor-theme'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section id="newsletter" class="newsletter">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php esc_html_e('Join a Newsletter', 'cfp-elementor-theme'); ?></h2>
                    <p class="section-subtitle"><?php esc_html_e('Stay updated with CFP news and events', 'cfp-elementor-theme'); ?></p>
                </div>
                <div class="newsletter-content">
                    <form class="newsletter-form" id="newsletter-form">
                        <div class="newsletter-input">
                            <input type="email" name="email" placeholder="<?php esc_attr_e('Enter your email address', 'cfp-elementor-theme'); ?>" required>
                            <button type="submit" class="btn btn-primary"><?php esc_html_e('Subscribe', 'cfp-elementor-theme'); ?></button>
                        </div>
                        <input type="hidden" name="action" value="cfp_newsletter_submit">
                        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('cfp_nonce'); ?>">
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
?>
