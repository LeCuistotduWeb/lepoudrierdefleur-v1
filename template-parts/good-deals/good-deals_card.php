<?php

$discount_code = get_field('discount_code');
$discount_type = get_field('discount_type');
$discount = get_field('discount');
$discount_start_date = get_field('start_date');
$discount_end_date = get_field('end_date');

?>

<article class="card">
    <div class="card-body text-center">
        <img width="150" src="<?php the_post_thumbnail_url() ?>" alt="<?php get_the_title() ?>">
        <h1 class=""><?= $discount ?> <?= $discount_type ?></h1>
        <div class="content">
            <?= get_the_content() ?>
        </div>
        <div>
            <p><?= _e("Du ", "lpdf") . $discount_start_date . _e(" jusqu'au ", "lpdf") . $discount_end_date ?></p>
        </div>
        <p></p>
    </div>
</article>
