<?php
get_header();

// Get the hotel slug from the URL
$slug = get_query_var('hotels');

// Query the hotel post based on the slug
$args = array(
    'name' => $slug,
    'post_type' => 'hotels',
    'posts_per_page' => 1
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
<section class="hotels-section">
    <div class="hotel-list">
        <h2 class="hotels-title mb-20"><?php the_title(); ?></h2>
        <div class="hotel">
          <div class="column-one"></div>
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
    </div>
</section>
<?php
    }
} else {
    echo '<p>No hotel found.</p>';
}
?>

<section class="hotels-section">
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
      'posts_per_page' => -1, // Retrieve all hotels
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

<?php
get_footer();
?>
