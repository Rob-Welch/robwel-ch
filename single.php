<?php get_header(); ?>

  <main>
    <div class="container">

      <div class="row">

        <?php while ( have_posts() ) : the_post(); ?>
        
        

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
          <?php the_content();?>
          <?php 

          $file = get_field('attachment');

          if( $file ): ?>

            <style>.attachment-button:before{content:'Attached: <?php echo $file['title']; ?>';}</style>

            <a href="<?php echo $file['url']; ?>" class="button fancy-button button-primary attachment-button"><span>Attached: <?php echo $file['title']; ?></span></a>

          <?php endif; ?>

          <hr>
          <p>Last updated <?php the_modified_date(); ?>.</p>
          <p class="tags"><?php the_tags( 'Filed under: ' ); ?> </p>
          <hr>
        </article>

        <?php endwhile; // end of the loop. ?>

    </div>
  </main>

<?php get_footer(); ?>