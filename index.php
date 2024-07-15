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
        if(have_posts()):
            ?>
            <div class="container">
                <?php 
                if( is_home() && ! is_front_page()){
                    ?>
                    <header class="mb-5">
                        <h1 class="page-title">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                }
                ?>
            <div class="row">
                <?php
                $index = 0;
                $no_of_columns = 3;

                //start the loop
                 while(have_posts()) : the_post();
                   if(0 === $index % $no_of_columns){
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                    <?php
                   }
                   
                  get_template_part('template-parts/content');
                  
                   $index++;

                   if(0 !== $index && 0 === $index % $no_of_columns ){
                    ?>
                    </div>
                    <?php
                   }
                    endwhile;
                ?>
                </div>
             </div>
            <?php 
            else :
                get_template_part('template-parts/content-none');
            endif;
        
        ?>
    </main>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
   <?php
   get_footer();
   ?>