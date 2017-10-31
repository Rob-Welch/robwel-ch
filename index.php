<?php get_header(); ?>

  <main>
    <div class="container">

      <div class="row">
        <p>
        Hello! I am a computational biophysicist currently working on <a href="http://ffea.bitbucket.io">Fluctuating Finite Element Analysis</a> at the University of Leeds, UK.
        You can get in touch with me at <a href="mailto:hello@robwel.ch">hello@robwel.ch</a>. While you're here, please take a look at my <a href="http://robwel.ch/wp-content/uploads/2015/02/RobWelchCV.pdf">CV</a> and <a href="https://www.linkedin.com/in/robjwelch">LinkedIn profile</a>!</p>
        <?php
        $description = category_description();
        if ($description == ""){
          get_template_part( 'description-self' );
        }
        else{
          echo $description;
        }

        ?>
        <hr>
      </div>

      <?php //wp-query needs to be satiated
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
          'posts_per_page' => 10,
          'paged' => $paged,
          'tag' => $wp_query->query_vars['tag']
      );
      $wp_query = new WP_Query( $args );
      $wp_query->is_archive = false; $wp_query->is_home = true;
      while($wp_query->have_posts()) : $wp_query->the_post(); ?>

      <?php get_template_part( 'frontpage-post' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); // reset the query ?>

      <div class="pagination">
        <?php echo get_previous_posts_link( '<span>Newer</span>' ); ?>
        <?php echo get_next_posts_link( '<span>Older</span>' ); ?>
      </div>

    </div>
  </main>

<?php get_footer(); ?>
