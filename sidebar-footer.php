<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar')) : ?>

    <div class="footer-sidebar-widget span3">
        
        <h4><?php _e('Search', 'adribbon'); ?></h4>

        <?php get_search_form(); ?>

    </div> <!-- .footer-sidebar-widget -->

<?php endif; ?>