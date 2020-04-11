<?php


class BlogInformations
{
    const GROUP = 'bloginformations_options';

    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function addMenu(){
        add_options_page(
                "Blog Informations",
                "Blog Informations",
                "manage_options",
                self::GROUP, [self::class, 'render']
        );
    }

    public static function registerSettings(){
        register_setting(self::GROUP, 'bloginformations_author');
        register_setting(self::GROUP, 'bloginformations_public_email');
        register_setting(self::GROUP, 'bloginformations_business_email');
        register_setting(self::GROUP, 'bloginformations_biography');

        add_settings_section('bloginformations_options_section', '', function (){
        }, self::GROUP);

        add_settings_field('bloginformations_author', 'Author', function (){
            ?>
            <input type="text" name="bloginformations_author" placeholder="Author" value="<?= esc_attr(get_option('bloginformations_author')) ?>">
            <?php
        }, self::GROUP, 'bloginformations_options_section');

        add_settings_field('bloginformations_public_email', 'Email public', function (){
            ?>
            <input type="email" name="bloginformations_public_email" placeholder="Email public" value="<?= esc_attr(get_option('bloginformations_public_email')) ?>">
            <?php
        }, self::GROUP, 'bloginformations_options_section');

        add_settings_field('bloginformations_business_email', 'Email pro', function (){
            ?>
            <input type="email" name="bloginformations_business_email" placeholder="Email Pro" value="<?= esc_attr(get_option('bloginformations_business_email')) ?>">
            <?php
        }, self::GROUP, 'bloginformations_options_section');
        
        add_settings_field('bloginformations_biography', 'Biography', function (){
            ?>
            <textarea name="bloginformations_biography" cols="100" rows="10"><?= esc_html(get_option('bloginformations_biography')) ?></textarea>
            <?php
        }, self::GROUP, 'bloginformations_options_section');
    }

    public static function render(){
        ?>
        <h1>Blog Informations :</h1>

        <form action="options.php" method="post">
            <?php
            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button();
            ?>
        </form>
        <?php
    }
}