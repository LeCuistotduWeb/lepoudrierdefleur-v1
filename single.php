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
                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php get_the_title() ?>">
            </div>
            <div class="row">
                <h1 class=""><?= get_the_title() ?></h1>
            </div>
            <div class="row">
                <?php if(have_posts()):
                    while (have_posts()): the_post(); ?>
                        <div class="content">
                            <?= get_the_content() ?>
                        </div>

                    <?php endwhile; ?>

                    <div class="row">
                        <div class="col">
                            <nav>
                                <ul class="lpdf_pager">
                                    <li><?php previous_post_link() ?></li>
                                    <li><?php next_post_link() ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="row">
                        <div class="col">
                            <p><?php _e("Il n'y a aucun resultat", "lpdf") ?></p>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col">
                <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') { ?>
                    <div class="alert alert-info"><?php _e('* Cette article est sponsorisé', 'lpdf') ?></div>
                <?php } ?>
                </div>
            </div>
    </div>

</main>

<?php get_footer(); ?>


