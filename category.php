<?php get_header(); ?>

<!-- navbar -->
<?php include('template-parts/navbar.php') ?>
<!-- end navbar -->

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                <a href="<?= bloginfo('url'); ?>">
                    <?= bloginfo('title'); ?>
                </a>
            </h1>
            <p><?= bloginfo('description'); ?></p>
        </div>
    </section>

    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php if(have_posts()):
                    while (have_posts()): the_post(); ?>

                        <div class="col-md-4">
                            <article class="card mb-4 shadow-sm">
                                <a href="<?= the_permalink() ?>">
                                    <?php if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large')):
                                    $thumbnail_src = $thumbnail_html['0']; ?>
                                    <picture>
                                        <img src="<?= $thumbnail_src ?>" alt="<?= get_the_title() ?>" class="img-fluid">
                                    </picture>
                                    <?php endif;?>
                                </a>
                                <div class="card-body">
                                    <h3><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="<?= the_permalink() ?>">Lire l'article</a>
                                        </div>
                                        <small class="text-muted">231 ❤</small>
                                    </div>
                                </div>
                            </article>
                        </div>

                    <?php endwhile; ?>
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


