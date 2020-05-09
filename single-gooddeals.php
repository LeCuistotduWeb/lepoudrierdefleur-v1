<?php
if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium')){
    $thumbnail_src = $thumbnail_html['0'];
}
?>

<?php get_header(); ?>

<main role="main" class="single-post">
    <?php if(have_posts()):
    while (have_posts()): the_post(); ?>
    <div class="single-post-content__container bg-secondary p-5">
        <div class="container">
            <div class="row">
                <div class="col col-sm-6 offset-sm-3 my-5">
                    <?php get_template_part('template-parts/good-deals/good-deals_card'); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
</main>

<?php get_footer(); ?>


