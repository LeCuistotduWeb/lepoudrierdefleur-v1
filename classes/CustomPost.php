<?php

/**
 * Class CustomPost
 */
class CustomPost
{

    public static function register(){
        add_filter('manage_post_posts_columns', [self::class, 'columns']);
        add_filter('manage_post_posts_custom_column', [self::class, 'customColumn'], 10, 2);
    }

    public static function columns($columns){
        $newColumns = [];
        foreach ($columns as $k => $v){
            if($k === 'date') {
                $newColumns[SponsoMetaBox::META_KEY] = __('Article sponsorisé', 'lpdf');
            }
            $newColumns[$k] = $v;
        }
        return $newColumns;
    }

    public static function customColumn($column, $postId){
        if($column === SponsoMetaBox::META_KEY){
            !empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true)) ? $class = 'yes' : $class = 'no';
            echo '<div class="bullet bullet-'.$class.'">'. $class.'</div>';
        }
    }
}