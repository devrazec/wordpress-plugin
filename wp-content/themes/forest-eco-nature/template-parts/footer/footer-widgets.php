<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$forest_eco_nature_number_of_footer_columns = get_theme_mod('forest_eco_nature_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$forest_eco_nature_col_lg_footer_class = 'col-lg-' . (12 / $forest_eco_nature_number_of_footer_columns);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$forest_eco_nature_col_md_footer_class = 'col-md-' . (12 / $forest_eco_nature_number_of_footer_columns);
?>
<div class="container">
    <aside class="widget-area row py-2 pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'forest-eco-nature' ); ?>">
        <?php
        $forest_eco_nature_default_widgets = array(
            1 => 'search',
            2 => 'archives',
            3 => 'meta',
            4 => 'categories'
        );

        for ($forest_eco_nature_i = 1; $forest_eco_nature_i <= $forest_eco_nature_number_of_footer_columns; $forest_eco_nature_i++) :
            $forest_eco_nature_lg_class = esc_attr($forest_eco_nature_col_lg_footer_class);
            $forest_eco_nature_md_class = esc_attr($forest_eco_nature_col_md_footer_class);
            echo '<div class="col-12 ' . $forest_eco_nature_lg_class . ' ' . $forest_eco_nature_md_class . '">';

            if (is_active_sidebar('footer-' . $forest_eco_nature_i)) {
                dynamic_sidebar('footer-' . $forest_eco_nature_i);
            } else {
                // Display default widget content if not active.
                switch ($forest_eco_nature_default_widgets[$forest_eco_nature_i] ?? '') {
                    case 'search':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Search', 'forest-eco-nature'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Search', 'forest-eco-nature'); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                        <?php
                        break;

                    case 'archives':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Archives', 'forest-eco-nature'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Archives', 'forest-eco-nature'); ?></h3>
                            <ul><?php wp_get_archives(['type' => 'monthly']); ?></ul>
                        </aside>
                        <?php
                        break;

                    case 'meta':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Meta', 'forest-eco-nature'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Meta', 'forest-eco-nature'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                        <?php
                        break;

                    case 'categories':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Categories', 'forest-eco-nature'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Categories', 'forest-eco-nature'); ?></h3>
                            <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
                        </aside>
                        <?php
                        break;
                }
            }

            echo '</div>';
        endfor;
        ?>
    </aside>
</div>