<?php
/**
 * Template Name: News Page
 *
 *
 */
 ?>
<?php get_header(); ?>
<section id="content" class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
  <h1>
    <?php the_title(); ?>
  </h1>
  <?php get_template_part(TEMPLATEPATH . '/inc/meta.php' ); ?>
  <div class="entry">
   <?php
if ( has_post_thumbnail() ) {
	// the current post has a thumbnail
	the_post_thumbnail();
} else {
	// the current post lacks a thumbnail
}
?>
      <?php
if (is_sticky()) {
  global $more;    // Declare global $more (before the loop).
  $more = 1;       // Set (inside the loop) to display all content, including text below more.
  the_content();
} else {
  global $more;
  $more = 0;
  the_content('Read more >>');
}
?>
    <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
  </div>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>
<?php // comments_template(); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
