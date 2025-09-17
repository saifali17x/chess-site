<?php
/**
 * Template for Gallery page
 *
 * @package CFP_Elementor_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Gallery Hero Section -->
    <section class="gallery-hero">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title"><?php the_title(); ?></h1>
                <p class="section-subtitle"><?php esc_html_e('Explore our chess events, tournaments, and activities', 'cfp-elementor-theme'); ?></p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="gallery-grid">
                <?php
                // Get gallery images from WordPress Media Library
                $gallery_images = get_post_gallery_images();
                
                if ($gallery_images) {
                    foreach ($gallery_images as $image_url) {
                        echo '<div class="gallery-item">';
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr__('Chess Event', 'cfp-elementor-theme') . '" class="gallery-img">';
                        echo '</div>';
                    }
                } else {
                    // Fallback to default gallery images
                    $default_images = array(
                        'gallery-images/IMG-20240127-WA0035.jpg',
                        'gallery-images/IMG-20240127-WA0036.jpg',
                        'gallery-images/IMG-20240127-WA0037.jpg',
                        'gallery-images/IMG-20240127-WA0032.jpg',
                        'gallery-images/IMG-20240127-WA0034.jpg',
                        'gallery-images/IMG-20240127-WA0028.jpg',
                        'one.jpeg',
                        'another.jpeg',
                        'Educational-Benefits.jpeg',
                        'education-and-impact-measurement.jpeg',
                        'social-and-behavioural-impact.jpeg',
                        'WhatsApp-Image-2025-02-25-at-1.10.36-PM.jpeg'
                    );
                    
                    foreach ($default_images as $image) {
                        $image_path = get_template_directory_uri() . '/assets/images/' . $image;
                        echo '<div class="gallery-item">';
                        echo '<img src="' . esc_url($image_path) . '" alt="' . esc_attr__('Chess Event', 'cfp-elementor-theme') . '" class="gallery-img">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
