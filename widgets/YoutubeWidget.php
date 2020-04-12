<?php

/**
 * Class YoutubeWidget
 */
class YoutubeWidget extends WP_Widget {

    public function __construct()
    {
        parent::__construct('youtube_widget', 'Youtube Widget');
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (isset($instance['title'])){
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if (isset($instance['youtube_code'])){
            $youtube_code = $instance['youtube_code'];
            echo '<iframe width="380" height="315" src="https://www.youtube.com/embed/' . esc_attr($youtube_code) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $youtube_code = isset($instance['youtube_code']) ? $instance['youtube_code'] : '';
        ?>
        <p>
            <label for="<?= $this->get_field_name('title')  ?>"><?php _e("Titre", 'lpdf') ?></label>
            <input 
                class="widefat" 
                type="text" 
                name="<?= $this->get_field_name('title') ?>"
                value="<?= esc_attr($title) ?>"
            >
        </p>
        <p>
            <label for="<?= $this->get_field_name('youtube_code')  ?>"><?php _e("Youtube embed code", 'lpdf') ?></label>
            <input
                class="widefat"
                type="text"
                name="<?= $this->get_field_name('youtube_code') ?>"
                value="<?= esc_attr($youtube_code) ?>"
            >
        </p>
        
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
