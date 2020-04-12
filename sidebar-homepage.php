<?php  if(!dynamic_sidebar('homepage')): ?>
<div class="p-4">
    <h4><?= __('Archives', 'lpdf') ?></h4>
    <ol class="list-unstyled mb-0">
        <?php wp_get_archives(['type' => 'monthly']) ?>
    </ol>
</div>
<?php endif; ?>