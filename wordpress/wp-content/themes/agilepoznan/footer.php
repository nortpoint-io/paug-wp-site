
<footer>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav class="main-navigation" role="navigation">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    ) );
            ?>
        </nav>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
