
<?php
/*
Template Name: Index
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?php wp_title('>', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="Homepage of Rob Welch: computational biophysicist, engineering, game developer, author, web developer and musician.">
  <meta name="author" content="Rob Welch">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ['Open Sans', 'Source Code Pro', 'Archivo', 'Saira', 'Roboto Condensed:300']
      }
    });
  </script>

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/baron.css" media="none" onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/cmu.css" media="none" onload="if(media!='all')media='all'">

  <noscript>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/baron.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/cmu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
  </noscript>



  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png">

  <!-- Preload background image
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="preload" as="image" href="<?php bloginfo('template_url'); ?>/images/bg_large.jpg">

</head>

<body id="<?php 

      $tag = get_queried_object();
      if ($tag->slug == ""){
        $tag_slug = $wp_query->query_vars['tag'];
        if ($tag_slug ==""){
            if( get_field('page_theme') ){
              echo the_field('page_theme');
            }
            else{
              echo "software";
            }
        }
        else{
          echo $tag_slug;
        }
      }
      else{
      echo $tag->slug;
      }

 ?>">

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <header>
    <div class="container">
      <div class="title row">
        <a href="<?php echo site_url(); ?>"><h1>Rob Welch</h1></a>
      </div>

      <nav>
        <ul class="full-nav">
          <?php wp_nav_menu( array( 
          'theme_location' => 'header-menu',
          'container'      => '',
          'items_wrap'    => '%3$s',
          ) ); ?>
          <li><a href="https://www.linkedin.com/in/robjwelch">LinkedIn</a></li>
          <li><a href="<?php echo site_url(); ?>/wp-content/uploads/2017/08/RobWelchCV.pdf">CV</a></li>
          <li><a href="mailto:hello@robwel.ch">Contact Me</a></li>
        </ul>

        <select onchange="location = this.options[this.selectedIndex].value;" class="mobile-menu">
          <option value="/">Navigation</option>
          <option value="<?php echo site_url(); ?>">Home</option>
          <option value="<?php echo site_url(); ?>/tag/physics/">Physics</option>
          <option value="<?php echo site_url(); ?>/tag/engineering/">Engineering</option>
          <option value="<?php echo site_url(); ?>/tag/software/">Software</option>
          <option value="<?php echo site_url(); ?>/tag/games/">Games</option>
          <option value="<?php echo site_url(); ?>/tag/music/">Music</option>
          <option value="<?php echo site_url(); ?>/tag/writing/">Writing</option>
          <option value="<?php echo site_url(); ?>/tag/web-design/">Web Design</option>
          <option value="https://www.linkedin.com/in/robjwelch">LinkedIn</option>
          <option value="<?php echo site_url(); ?>/wp-content/uploads/2017/08/RobWelchCV.pdf">CV</option>
          <option value="mailto:hello@robwel.ch">Contact Me</option>
        </select>

      </nav>

    </div>
  </header>