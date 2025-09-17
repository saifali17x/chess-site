<?php
/**
 * Template for Team page
 *
 * @package CFP_Elementor_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Team Hero Section -->
    <section class="team-hero">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title"><?php the_title(); ?></h1>
                <p class="section-subtitle"><?php esc_html_e('Meet the dedicated team behind the Chess Federation of Pakistan', 'cfp-elementor-theme'); ?></p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="team-grid">
                <?php
                // Get team members from custom post type or fallback to default
                $team_members = get_posts(array(
                    'post_type' => 'team_member',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));
                
                if ($team_members) {
                    foreach ($team_members as $member) {
                        $image = get_the_post_thumbnail_url($member->ID, 'cfp-team');
                        $position = get_post_meta($member->ID, 'team_position', true);
                        $email = get_post_meta($member->ID, 'team_email', true);
                        
                        echo '<div class="team-member">';
                        if ($image) {
                            echo '<div class="team-image">';
                            echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($member->post_title) . '" class="team-img">';
                            echo '</div>';
                        }
                        echo '<div class="team-info">';
                        echo '<h3 class="team-name">' . esc_html($member->post_title) . '</h3>';
                        if ($position) {
                            echo '<p class="team-position">' . esc_html($position) . '</p>';
                        }
                        echo '<div class="team-description">' . wp_kses_post($member->post_content) . '</div>';
                        if ($email) {
                            echo '<a href="mailto:' . esc_attr($email) . '" class="team-email">' . esc_html($email) . '</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // Fallback to default team members
                    $default_team = array(
                        array(
                            'name' => 'FM Amer Karim',
                            'position' => 'Acting General Secretary',
                            'image' => 'team-images/amer-karim.jpg',
                            'email' => 'amer.chess@gmail.com',
                            'description' => 'Leading the Chess Federation of Pakistan with dedication and expertise.'
                        ),
                        array(
                            'name' => 'H.E Mr. Fawad Hasan Fawad',
                            'position' => 'Federal Minister IPC',
                            'image' => 'patronage/fawad-hasan-fawad.png',
                            'email' => '',
                            'description' => 'Supporting the development of mind sports in Pakistan.'
                        ),
                        array(
                            'name' => 'H.E Mr. Anwar Ul Haq Kakar',
                            'position' => 'Prime Minister of Pakistan',
                            'image' => 'patronage/Anwar-ul-haq.png',
                            'email' => '',
                            'description' => 'Patron of the Chess Federation of Pakistan.'
                        ),
                        array(
                            'name' => 'H.E Mr. Jauhar Saleem',
                            'position' => 'Chief Patron CFP',
                            'image' => 'patronage/Jauhar-saleem.png',
                            'email' => '',
                            'description' => 'Chief Patron supporting chess development in Pakistan.'
                        )
                    );
                    
                    foreach ($default_team as $member) {
                        $image_path = get_template_directory_uri() . '/assets/images/' . $member['image'];
                        echo '<div class="team-member">';
                        echo '<div class="team-image">';
                        echo '<img src="' . esc_url($image_path) . '" alt="' . esc_attr($member['name']) . '" class="team-img">';
                        echo '</div>';
                        echo '<div class="team-info">';
                        echo '<h3 class="team-name">' . esc_html($member['name']) . '</h3>';
                        echo '<p class="team-position">' . esc_html($member['position']) . '</p>';
                        echo '<div class="team-description">' . esc_html($member['description']) . '</div>';
                        if ($member['email']) {
                            echo '<a href="mailto:' . esc_attr($member['email']) . '" class="team-email">' . esc_html($member['email']) . '</a>';
                        }
                        echo '</div>';
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
