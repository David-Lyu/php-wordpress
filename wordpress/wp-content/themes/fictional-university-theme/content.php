<div class="blog-post">
  <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p class="blog-post-meta"><?php the_date(); ?> <a href="#"><?php the_author(); ?></a></p>

  <p>
    <!-- <?php the_content() ?> -->
    <!-- Shows first 55 words -->
    <?php the_excerpt(); ?>
    <a href="<?php comments_link(); ?>">
      <?php
      printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( 		get_comments_number() ) ); ?>
    </a>
  </p>
  <hr />

  <!-- the rest of the content -->
</div>
<!-- /.blog-post -->
