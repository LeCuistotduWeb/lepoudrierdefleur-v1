<?php
if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium')){
    $thumbnail_src = $thumbnail_html['0'];
}
?>

<?php get_header(); ?>

<main role="main">
    <section class="jumbotron text-center" style="background: url('<?= $thumbnail_src ?>')  center center no-repeat; background-size: cover">
        <div class="container">
            <h1 class="jumbotron-heading"><?= get_the_title() ?></h1>
            <small class="text-muted">231 ❤</small>
        </div>
    </section>

    <div class="py-5 bg-light">
        <div class="container">
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
                            <p>Il n\'y a aucun resultat</p>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>


