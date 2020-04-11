<footer class="page-footer blue text-center text-md-left mt-0">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title mb-3">Le poudrier de fleur</h5>
                <p>Here you can use rows and columns here to organize your footer content.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-3">
                <h5 class="title mb-3"><?= __('Categories', 'lpdf') ?></h5>
                <?php wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav mr-auto',
                ]); ?>
            </div>
            <!--/.Second column-->

            <!--third column-->
            <div class="col-md-3">
                <h5 class="title mb-3"><?= __('Socials', 'lpdf') ?></h5>
                <ul class="list-unstyled">
                <?php wp_nav_menu([

                    'theme_location' => 'social',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav mr-auto',
                ]); ?>
                </ul>
                <h5 class="title mb-3"><?= __('Rechercher', 'lpdf') ?></h5>
                <?php get_search_form() ?>
            </div>
            <!--/.third column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright bg-light text-center">
        <div class="container-fluid">
            <p>
                Tous droits réservés Lepoudrierdefleur ♡ Site made by <a href="https://lecuistotduweb.fr">Gaëtan Boyron</a><br>
                Mentions légales – Politique de Confidentialité
            </p>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<!--script js-->
<?php wp_footer(); ?>
<!--script js-->
</body>
</html>