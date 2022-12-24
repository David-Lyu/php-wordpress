<!-- Individual Posts -->
<?php get_header(); ?>


<h2><?php the_title(); ?></h2>

<?php the_content();

if ( comments_open() || get_comments_number() ){
  comments_template();
}

?>

<?php get_footer();

?>
