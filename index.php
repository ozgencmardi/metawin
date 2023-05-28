<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>

<?php the_posts_pagination(); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
