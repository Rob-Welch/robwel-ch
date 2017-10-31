<div class="row">
  <article>
    <a class="article-header" href="<?php the_permalink(); ?>">
      <span class="tags-list"><?php
         $posttags = get_the_tags();
        if ($posttags) {
           $taglist = "";
           foreach($posttags as $tag) {
               $taglist .=  $tag->name . ', '; 
           }
          echo rtrim($taglist, ", ");
       }
    ?></span>
      <h2><?php the_title(); ?></h2>
    </a>
    <p class="article-preview">
    <?php the_field('long_excerpt'); ?>
    <div class="meta-info">
      <div class="column one-half date">Posted <?php echo get_the_date(); ?></div>
      <div class="column one-half read-more-button">
        <a href="<?php the_permalink(); ?>" class="button fancy-button button-primary"><span>Read More</span></a>
      </div>
    </div>
  </article>
</div>

<hr>