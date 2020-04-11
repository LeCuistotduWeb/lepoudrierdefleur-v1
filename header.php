<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
    <meta charset="<?= bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= bloginfo('description'); ?></title>">
    <?php wp_head(); ?>
</head>
<body>


<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#"><?php bloginfo('name') ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php wp_nav_menu([
            'theme_location' => 'header',
            'container'      => false,
            'menu_class'     => 'navbar-nav mr-auto',
        ]); ?>

        <?php get_search_form() ?>
    </div>
</nav>
