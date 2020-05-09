<?php
if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium')){
    $thumbnail_src = $thumbnail_html['0'];
}
?>

<?php get_header(); ?>

<?php if(have_posts()):
while (have_posts()): the_post(); ?>
<main class="single-post">
    <div class="container-fluid container-md p-0">
        <header class="text-center">
            <!-- Preview Image -->
            <img class="img-fluid" src="http://placehold.it/1200x450" alt="">
        </header>
    </div>

    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col">
                <!-- Title -->
                <h1 class="mt-4"><?php the_title() ?></h1>

                <!-- categories -->
                <div class="row">
                    <div class="col">
                        <div class="categories">
                            <p><?php the_category(); ?></p>
                        </div>
                    </div>
                    <div class="col text-right">
                        <span>33 com</span>
                        <span>23 likes</span>
                    </div>
                </div>

                <!-- Post Content -->
                <?php the_content(); ?>

                <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') { ?>
                <div class="row">
                    <div class="col">
                            <div><?php _e('* Cette article est sponsorisé', 'lpdf') ?></div>
                    </div>
                </div>
                <?php } ?>

                <!-- previous/next post -->
                <hr>
                <div><?php previous_post_link() ?></div>
                <div><?php next_post_link() ?></div>

                <hr>

                <?php if (comments_open() || get_comments_number()){
                    comments_template();
                } ?>

            </div>

        </div>
    </div>
</main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

