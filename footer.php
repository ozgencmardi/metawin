<?php $logo = get_field('logo'); ?>

<footer class="footer-section">
  <div class="footer-container">
    <div class="footer-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Logo">
    </div>
    <nav class="footer-menu">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'custom-menu',
                'container' => false,
                'menu_class' => 'footer-menu-list',
                'menu' => 'Menu 1',
            ));
        ?>
    </nav>
    <hr class="footer-line">
    <div class="footer-content">
        <div class="footer-images">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/be-gamble-aware-logo.webp" alt="Be Gamble Aware Logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/18-icon.webp" alt="+18 Logo">
        </div>
        <div class="footer-text">
            &copy; <?php echo date('Y'); ?> Top 10 Casinos Worldwide. All rights reserved.
        </div>
    </div>
  </div>
</footer>



</body>
</html>