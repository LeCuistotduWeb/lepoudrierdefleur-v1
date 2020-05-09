<?php get_header(); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                <?php the_title() ?>
            </h1>
        </div>
    </section>

    <div class="container">
        
        <div class="row">
            <?php the_content(); ?>
        </div>
    </div>

</main>

<?php get_footer(); ?>

