<?php get_header(); ?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                Bons Plans
            </h1>
        </div>
    </section>

    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php if(have_posts()):
                    while (have_posts()): the_post(); ?>

                        <div class="col-md-4">
                            <article class="card mb-4 shadow-sm">

                                <?php if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large')):
                                    $thumbnail_src = $thumbnail_html['0']; ?>
                                    <picture>
                                        <img src="<?= $thumbnail_src ?>" alt="<?= get_the_title() ?>" class="img-fluid">
                                    </picture>
                                <?php endif;?>

                                <div class="card-body">
                                    <h3><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>

                    <div class="row">
                        <div class="col">
                            <p>Il n'y a aucun resultat</p>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>