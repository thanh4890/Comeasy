<?php
class Adribbon_Ad_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'adribbon_ad_widget',
            'Adribbon Ad Widget',
            array('description' => __('Displays Ad Sidebar Widget', 'adribbon'))
        );
    }


    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);

        $instance['image1'] = strip_tags($new_instance['image1']); 
        $instance['url1'] = strip_tags($new_instance['url1']); 
        $instance['title1'] = strip_tags($new_instance['title1']);

        $instance['image2'] = strip_tags($new_instance['image2']); 
        $instance['url2'] = strip_tags($new_instance['url2']); 
        $instance['title2'] = strip_tags($new_instance['title2']);

        return $instance;
    }


    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => '',
            'image1' => 'http://placehold.it/110',
            'url1' => '#',
            'title1' => 'Click to view this advertising.',
            'image2' => 'http://placehold.it/110',
            'url2' => '#',
            'title2' => 'Click to view this advertising.'    
        ));

        $title = $instance['title'];
        $image1 = $instance['image1'];
        $url1 = $instance['url1'];
        $title1 = $instance['title1'];
        $image2 = $instance['image2'];
        $url2 = $instance['url2'];
        $title2 = $instance['title2'];

    ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e( 'Image Link 1 (110x110):', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" type="text" value="<?php echo esc_attr( $image1 ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'url1' ); ?>"><?php _e( 'Url 1:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'url1' ); ?>" name="<?php echo $this->get_field_name( 'url1' ); ?>" type="text" value="<?php echo esc_attr( $url1 ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e( 'Title 1:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Image Link 2 (110x110)', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo esc_attr( $image2 ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'url2' ); ?>"><?php _e( 'Url 2:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'url2' ); ?>" name="<?php echo $this->get_field_name( 'url2' ); ?>" type="text" value="<?php echo esc_attr( $url2 ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Title 2:', 'adribbon' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>

    <?php } // end function form


    // display
    public function widget($args, $instance) { 
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $title = trim($title); 
        $image1 = trim($instance['image1']);
        $url1 = trim($instance['url1']);
        $title1 = trim($instance['title1']);
        $image2 = trim($instance['image2']);
        $url2 = trim($instance['url2']);
        $title2 = trim($instance['title2']);
    
        echo $before_widget;
            if (!empty($title))
                echo $before_title . $title . $after_title; ?>

            <div class="ad-area clearfix">

                <?php if (!empty($image1)) : ?>
                    <a href="<?php echo $url1 != '' ? $url1 : '#'; ?>" 
                        title="<?php echo $title1 != '' ? $title1 : 'Click here to view this ad.'; ?>">
                        <img alt="Ad Image" src="<?php echo $image1; ?>">
                    </a>
                <?php endif; ?>

                <?php if (!empty($image2)) : ?>
                    <a href="<?php echo $url2 != '' ? $url1 : '#'; ?>" 
                        title="<?php echo $title2 != '' ? $title2 : 'Click here to view this ad.'; ?>">
                        <img alt="Ad Image" src="<?php echo $image2; ?>">
                    </a>
                <?php endif; ?>

            </div> <!-- end social-share-area -->
        
        <?php echo $after_widget; ?>

    <?php } // end function widget

} // end Adribbon_Social_Widget class


// register widget
add_action("widgets_init", 'register_my_ad_widget');

function register_my_ad_widget() {
    register_widget('Adribbon_Ad_Widget');
}
