<?php

// Enqueue Scripts for Outreach Email Template
function enqueue_outreach_template_script() {
    wp_enqueue_script('outreach-email-filter', get_stylesheet_directory_uri() . '/influencers_email_template/assets/js/outreach-email-filter.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_outreach_template_script');

// Create an Outreach Email Template Post Type
function create_outreach_email_template_post_type() {
    $labels = array(
        'name' => 'Outreach Email Templates',
        'singular_name' => 'Outreach Email',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email',
        'rewrite' => array('slug' => 'outreach-email'),
        'supports' => array('title', 'editor', 'thumbnail'), // Add 'thumbnail' for featured image support
    );

    register_post_type('outreach_email', $args);
}
add_action('init', 'create_outreach_email_template_post_type');

// Register custom taxonomy for your custom post type
function create_outreach_email_template_taxonomy() {
    $labels = array(
        'name' => 'Outreach Email Categories',
        'singular_name' => 'Outreach Email Category',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('outreach_email_category', 'outreach_email', $args);
    
    $tags_labels = array(
        'name' => 'Outreach Email Tags',
        'singular_name' => 'Outreach Email Tag',
    );

    $tags_args = array(
        'labels' => $tags_labels,
        'public' => true,
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy('outreach_email_tag', 'outreach_email', $tags_args);
}
add_action('init', 'create_outreach_email_template_taxonomy');

// Creating a shortcode to show the Outreach Email Template Posts
function custom_outreach_email_loop_shortcode($atts) {
    ob_start(); // Start output buffering
    ?>
    <section class="influencers-product-section">
    <aside>
    <input style="display: none;" type="checkbox" id="accordion-open-mobile">
    <label for="accordion-open-mobile" class="accordion-open-mobile"> All Templates</label>
    <div class="accordion-main-wrapper">
        <div class="accordion">
            <?php
            // Define a function to recursively generate the HTML structure for categories and child categories
            function generateCategoryAccordion($category) {
                $child_categories = get_terms(array(
                    'taxonomy' => 'outreach_email_category',
                    'parent' => $category->term_id,
                ));

                if (!empty($child_categories)) {
                    echo '<div class="accordion-item">';
                    echo '<div class="accordion-title">';
                    echo '<span class="ef-button" data-content="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</span>';
                    echo '<span class="accordion-icon" onclick="toggleAccordion(this)"><i class="fas fa-chevron-down"></i></span>';
                    echo '</div>';
                    echo '<div class="accordion-content">';
                    foreach ($child_categories as $child_category) {
                        echo '<span class="ef-button" data-content="' . esc_attr($child_category->slug) . '"><a href="#tabs-content-main">' . esc_html($child_category->name) . '</a></span>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
            }

            // Get the parent categories (categories with no parent)
            $parent_categories = get_terms(array(
                'taxonomy' => 'outreach_email_category',
                'parent' => 0,
            ));

            foreach ($parent_categories as $parent_category) {
                generateCategoryAccordion($parent_category);
            }
            ?>
        </div>
    </div>
</aside>

        <article id="tabs-content-main">
    <?php
    $args = array(
        'post_type' => 'outreach_email',
        'posts_per_page' => -1,
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();

            // Get the ACF fields
            $email_template_url = get_field('outreach_email_template_url');
            $email_template_image_url = get_field('outreach_email_template_image_url');
            $email_sent = get_field('email_sent');
            $average_open_rate = get_field('average_open_rate');
            $average_apply_rate = get_field('average_apply_rate');
            $email_outreach_template_title = get_field('email_outreach_template_title');

            // Get the child category
            $categories = get_the_terms(get_the_ID(), 'outreach_email_category'); // Use the correct taxonomy name
            $child_category = '';

            if ($categories) {
                foreach ($categories as $category) {
                    if ($category->parent != 0) {
                        $child_category = $category->name;
                        break;
                    }
                }
            }

            // Output the HTML for each post
            ?>
                <div class="influencers-product-card <?php
                            if ($categories) {
                                $category_slugs = array();
                                foreach ($categories as $category) {
                                    $category_slugs[] = $category->slug;
                                }
                                echo esc_attr(implode(' ', $category_slugs));
                            }
                            ?>">
                        <a href="<?php echo esc_url($email_template_url); ?>" class="post-link"></a>
                        <div class="product-view">
                          <img src="<?php echo esc_html($email_template_image_url); ?>" alt="">
                        </div>

                        <div class="product-caption">
                            <h2><?php echo esc_html($email_outreach_template_title); ?></h2>
                            <div class="product-card-pills">
                                <span><?php echo esc_html($child_category); ?></span>
                            </div>
                            <div class="producct-card-states">
                                <p><span class="emails"><?php echo esc_html($email_sent); ?></span> Emails sent</p>
                                <p><span class="average"><?php echo esc_html($average_open_rate); ?></span> Average open rate</p>
                                <p><span class="average-rate"><?php echo esc_html($average_apply_rate); ?></span> Average reply rate</p>
                            </div>
                        </div>
                    </div>
                
            <?php
        }
    }

    wp_reset_postdata(); // Reset post data
    ?>
    </article>
            </section>
    <?php
    return ob_get_clean(); // Return the output
}

add_shortcode('custom_outreach_email_loop', 'custom_outreach_email_loop_shortcode');
