<?php get_header(); ?>

<main role="main">
    <div class="container">
        
        <h1><?= __("Résultat de la recherche pour ", 'lpdf'). get_search_query() ?></h1>

        <div class="row">
            <?php if(have_posts()): ?>

                <?php while (have_posts()): the_post(); ?>

                    <div class="col-sm-4">
                        <article class="card mb-4 shadow-sm">
                            <a href="<?= the_permalink() ?>">
                                <?php
                                if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium')):
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
                                        <a href="<?= the_permalink() ?>"><?= __("Lire l'article", 'lpdf') ?></a>
                                    </div>
                                    <small class="text-muted">231 ❤</small>
                                </div>
                            </div>
                        </article>
                    </div>

                <?php endwhile; ?>

            <?php else: ?>
        </div>

        <div class="row">
            <div class="col">
                <p><?php _e('Aucun article', 'lpdf')?></p>
            </div>
        </div>

        <?php endif; ?>

        <?= lpdf_pagination() ?>

    </div>
    </div>
    </div>

</main>

<?php get_footer(); ?>
