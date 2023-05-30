<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); 

// Retrieve the ACF field value
$logo = get_field('logo');
// Hero section
$hero_title = get_field('hero_title');
$hero_text = get_field('hero_text');
$hero_button_text = get_field('hero_button_text');
$hero_button_url = get_field('hero_button_url');
$hero_background_image = get_field('hero_background_image');
// About section
$about_title = get_field('about_title');
$about_subtitle = get_field('about_subtitle');
$about_text = get_field('about_text');
$about_image = get_field('about_image');
// Choose us section
$choose_us_title = get_field('choose_us_title');
$choose_us_subtitle = get_field('choose_us_subtitle');
$choose_us_title_1 = get_field('choose_us_title_1');
$choose_us_text_1 = get_field('choose_us_text_1');
$choose_us_title_2 = get_field('choose_us_title_2');
$choose_us_text_2 = get_field('choose_us_text_2');
$choose_us_title_3 = get_field('choose_us_title_3');
$choose_us_text_3 = get_field('choose_us_text_3');
$choose_us_image = get_field('choose_us_image');
?>

<section class="hero-section" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.3) 100%), url('<?php if ($hero_background_image) { echo $hero_background_image; }; ?>');">
    <div class="image-overlay"></div>
    <div class="container">
        <div class="hero-logo row align-items-center">
            <div class="col-lg-12 col-sm-12">
            <a href="<?php echo home_url(); ?>"><img src="<?php if ($logo) { echo $logo; }; ?>" alt="Logo" class="logo"></a>
            </div>   
        </div>
        <div class="hero-content row align-items-center">
            <div class="col-lg-12 col-sm-12">
                <h1><?php if ($hero_title) { echo $hero_title; } ?></h1>
                <p><?php if ($hero_text) { echo $hero_text; } ?></p>
                <a href="#hotels" class="btn"><?php if ($hero_button_text) { echo $hero_button_text; } ?> <i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="about-content">
        <div class="box float-left"><h5><?php if ($about_subtitle) { echo $about_subtitle; } ?></h5></div>
        <div class="box float-left"><h2><?php if ($about_title) { echo $about_title; } ?></h2></div>
        <div class="box float-right"><img src="<?php if ($about_image) { echo $about_image; } ?>" alt="About Image"></div>
        <div class="box float-left"><div class="about-text"><?php if ($about_text) { echo $about_text; } ?></div></div>
        <div class="box float-left"><a href="#hotels" class="btn">Read More <i class="fa fa-arrow-right"></i></a>    </div>                        
    </div>
</section>

<section class="hotels-section" id="hotels">
  <h2 class="hotels-title">The Best Casino Hotels Worldwide</h2>
  <div class="hotels-subtitle">
    <i class="fas fa-calendar-alt calendar-icon"></i>
    <span class="date"><?php echo date('m/d/y'); ?></span>
  </div>
  <div class="top-rated-hotel">
    Top Rated Hotel
  </div>
  <div class="hotel-list">
    <?php
    $args = array(
      'post_type' => 'hotels',
      'posts_per_page' => 10, // Retrieve maximum 10 hotels
      'meta_key' => 'hotel_point', // Sort by the 'hotel_point' custom field
      'orderby' => 'meta_value_num', // Use numeric value for sorting
      'order' => 'DESC', // Sort in descending order
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
    $number = 1; // Initialize hotel number counter
    while ($query->have_posts()) {
        $query->the_post();

        // Get custom field values
        $hotel_logo = get_field('hotel_logo');
        $hotel_address = get_field('hotel_address');
        $hotel_star = get_field('hotel_star');
        $hotel_point = get_field('hotel_point');
        $hotel_link = get_permalink();

        // Display hotel information
        ?>
        <div class="hotel">
          <div class="column-one"><?php echo $number; ?></div>
          <div class="column-two">
            <?php if ($hotel_logo) { ?>
                <a href="<?php echo $hotel_link; ?>" alt="<?php echo $hotel_link; ?>"><img src="<?php echo $hotel_logo['url']; ?>" alt="<?php echo $hotel_logo['alt']; ?>"></a>
            <?php } ?>
          </div>
          <div class="column-three">
            <div class="column-three-title">
              Address
            </div>
            <div class="column-three-text">
              <?php echo $hotel_address; ?>
            </div>
          </div>
          <div class="column-four">
            <div class="column-four-star">
                <?php
                $star_count = intval($hotel_star); // Assuming $hotel_star is the star rating value as an integer
                $half_star = ($hotel_star - $star_count) >= 0.5; // Check if there is a half star

                // Generate full stars
                for ($i = 1; $i <= $star_count; $i++) {
                echo '<i class="fas fa-star"></i>';
                }

                // Generate half star if applicable
                if ($half_star) {
                echo '<i class="fas fa-star-half-alt"></i>';
                }

                // Generate remaining empty stars
                $empty_stars = 5 - ceil($hotel_star);
                for ($i = 1; $i <= $empty_stars; $i++) {
                echo '<i class="far fa-star"></i>';
                }
                ?>
            </div>
            <div class="column-four-text">
                <?php
                // Generate description based on star rating
                if ($hotel_star == 5) {
                echo 'Excellent';
                } elseif ($hotel_star >= 4) {
                echo 'Great';
                } elseif ($hotel_star >= 3) {
                echo 'Good';
                } else {
                echo 'Average';
                }
                ?>
            </div>
          </div>
          <div class="column-five">
            <div class="progress-bar">
              <div class="progress-value"><?php echo $hotel_point; ?></div>
            </div>
          </div>
          <div class="column-six">
            <div class="column-six-button">
                <a href="<?php echo $hotel_link; ?>" alt="<?php echo $hotel_link; ?>" class="view-button">Visit Hotel <i class="fa fa-arrow-right"></i></a>
            </div>
            <a href="<?php echo $hotel_link; ?>" alt="<?php echo $hotel_link; ?>"><div class="column-six-text">Read Review</div></a>
          </div>
        </div>
        <?php

        $number++; // Increment hotel number

            }
            wp_reset_postdata();
        } else {
            echo '<p>No hotels found.</p>';
        }
        ?>

    </div>
</section>

<section class="choose-us-section">
    <div class="choose-us-heading">
        <h5><?php if ($choose_us_subtitle) { echo $choose_us_subtitle; } ?></h5>
        <h2><?php if ($choose_us_title) { echo $choose_us_title; } ?></h2>
    </div>
    <div class="choose-us-content">
        <div class="left-part col-lg-5">
            <img src="<?php if ($choose_us_image) { echo $choose_us_image; } ?>" alt="Choose Us Image">
        </div>
        <div class="right-part col-lg-7">
            <div class="choose-us-paragraph">
                <div class="number-badge">1</div>
                    <h2><?php if ($choose_us_title_1) { echo $choose_us_title_1; } ?></h2>
                <div class="choose-us-text"><?php if ($choose_us_text_1) { echo $choose_us_text_1; } ?></div>
            </div>
            <div class="choose-us-paragraph">
                <div class="number-badge">2</div>
                <h2><?php if ($choose_us_title_2) { echo $choose_us_title_2; } ?></h2>
                <div class="choose-us-text"><?php if ($choose_us_text_2) { echo $choose_us_text_2; } ?></div>
            </div>
            <div class="choose-us-paragraph">
                <div class="number-badge">3</div>
                <h2><?php if ($choose_us_title_3) { echo $choose_us_title_3; } ?></h2>
                <div class="choose-us-text"><?php if ($choose_us_text_3) { echo $choose_us_text_3; } ?></div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
