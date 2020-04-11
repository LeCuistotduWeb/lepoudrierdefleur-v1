<?php
if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium')){
    $thumbnail_src = $thumbnail_html['0'];
}
?>

<?php get_header(); ?>

<main role="main" class="single-post">

    <div class="single-post-content__container">
        <div class="container">
            <div class="row">
                <div class="col col-sm-6 offset-sm-3 my-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="<?php the_post_thumbnail_url() ?>" alt="<?php get_the_title() ?>">
                            <h1 class=""><?= get_the_title() ?></h1>
                            <?php if(have_posts()):
                                while (have_posts()): the_post(); ?>
                                    <div class="content">
                                        <?= get_the_content() ?>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>


