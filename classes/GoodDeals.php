<?php

/**
 * Class GoodDeals
 */
class GoodDeals
{

    public static function register(){
        add_filter('manage_gooddeals_posts_columns', [self::class, 'columns']);
        add_filter('manage_gooddeals_posts_custom_column', [self::class, 'customColumn'], 10, 2);
    }

    public static function columns($columns){
        return [
            'cb' => $columns['cb'],
            'thumbnail' => __('miniature', 'lpdf'),
            'title' => $columns['title'],
            'date' => $columns['date'],
        ];
    }

    public static function customColumn($column, $postId){
        if($column === 'thumbnail'){
            the_post_thumbnail('thumbnail-large', $postId);
        }
    }
}