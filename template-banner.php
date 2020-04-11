<?php
/**
 * Template Name: Width banner
 * Template Post Type: page, post
 */
?>


<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>

        <div class="container">
            <?= the_content() ?>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>