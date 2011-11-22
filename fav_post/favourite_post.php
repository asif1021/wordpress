<?php
/**
 * @Author	Asif Akter
 * @Package Wordpress
 * @SubPackage Widgets
 * @copyright Proprietary Software. All Rights Reserved
 * @Since 1.0.0
 * 
 * Plugin Name: Favourite Post
 * Description: A widget to show favourite posts
 * Version: 1.0.0
 * Author: Asif
 * 
 * 
 */

namespace a\b\c;

class My_Widget extends \WP_Widget {

    function __construct() {
        parent::__construct('name1', 'name2');
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;
        ?>
        Hello, World!
        <div style="width: 60px;word-wrap: break-word;">
            <ul>
                <li style="color:blue;text-align:center">Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</li>
                <li>B</li>
                <li>C</li>
            </ul>
        </div>
        <?php
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = __('New title', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }

}

add_action('widgets_init', function() {
            return register_widget('a\b\c\My_Widget');
        });
?>
