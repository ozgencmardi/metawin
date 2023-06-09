<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <?php wp_head(); ?>
</head>

<?php if (!is_front_page()) : ?>

  <div class="navbar">
    <div class="container">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Logo" class="nav-logo"></a>
        <a class="nav-button ml-auto mr-4"><span id="nav-icon3"><span></span><span></span><span></span><span></span></span></a>
    </div>
  </div>
  
  <div class="fixed-top custom-menu">
    <div class="flex-center p-5">
      <ul class="nav flex-column">
      <?php
        wp_nav_menu(array(
        'theme_location' => 'Menu 1',
        'container' => false,
        'menu_class' => 'footer-menu-list',
        'menu' => 'Menu 1',
         ));
        ?>
      </ul>
    </div>
  </div>

<?php endif; ?>

<body <?php body_class(); ?>>
    
<?php wp_footer(); ?>