<?php
get_header();

$discount_code = get_field('discount_code');
$discount_type = get_field('discount_type');
$discount = get_field('discount');
$discount_start_date = get_field('start_date');
$discount_end_date = get_field('end_date');
?>

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
                            <a href="<?= the_permalink() ?>">
                                <?php get_template_part('template-parts/good-deals/good-deals_card'); ?>
                            </a>
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