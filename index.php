<?php
/**
 * Main template file
 * 
 * @package Aquila
 */
?>

   <?php
   get_header();
   ?>
  <div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php
        if(have_posts()){
            ?>
            <div class="container">
                <?php 
                if( is_home() && ! is_front_page()){
                    ?>
                    <header class="mb=5">
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                }
                ?>
         
                <?php
                 while(have_posts()) : the_post();
                    the_title();
                    the_excerpt();
        endwhile;
                ?>
             </div>
            <?php 
            
        }
        ?>
    </main>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
   <?php
   get_footer();
   ?>