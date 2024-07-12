
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <?php wp_head(); ?>
  </head>

<!-- Get location  -->
  <?php 
 $menu_class = \Aquila_Theme\Inc\Menus::get_instance();
 $header_menu_id = $menu_class->get_menu_id('aquila-header-menu');
 $header_menus = wp_get_nav_menu_items($header_menu_id);
?>

<!-- Body part -->
  <body <?php body_class(); ?>>
    <div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <?php 
   if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
   ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <?php 
        if(! empty($header_menus) && is_array( $header_menus)){
          ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
                foreach( $header_menus as $menu_item){
                  if( ! $menu_item->menu_item_parent) {
                    $child_menu_items = $menu_class->get_child_menu_items($header_menus,$menu_item->ID);
                    $has_children = ! empty($child_menu_items) && is_array($child_menu_items);
                    if(! $has_children){

                    ?>                  
                       <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="<?php echo esc_url( $menu_item->url); ?>">
                            <?php echo esc_html($menu_item->title); ?>
                          </a>
                      </li> 
                      <?php
                    } else {
                    ?>
                     <span class="navbar-text">
                          Navbar text with an inline element
                      </span>
                     <?php
                    }
                    ?>
                     
                    <?php
                  }
                }
            ?>
          </ul> 
   
          <?php
        }
      ?>
    </div>
  </div>
</nav>
</div>
<?php
