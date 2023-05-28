<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/style.css">
    <?php wp_head(); ?>
</head>

<?php if (!is_front_page()) : ?>
  <div class="top-menu">
    <div class="top-menu-logo">
      <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Logo"></a>
    </div>
    <nav class="nav-menu">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'Menu 1',
                'container' => false,
                'menu_class' => 'footer-menu-list',
                'menu' => 'Menu 1',
            ));
        ?>
    </nav>
  </div>
<?php endif; ?>

<body <?php body_class(); ?>>
    
<?php wp_footer(); ?>