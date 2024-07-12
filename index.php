<?php
/**
 * Main template file
 * 
 * @package Aquila
 */
?>

   <?php
   get_header();
   wp_head();

//SPL AUTO LOADER

//    include_once 'includes/Person.php';
//    include_once 'includes/Student.php';
// spl_autoload_register( function($class){
//     include 'includes/' . $class . '.php';
// });
// new Student();
// new Person();

//TRAIT METHOD

// trait Say_World {
//     public function say_hello() {
//         echo 'Hello Trait';
//     }
// }
// class Teacher {
//     public function say_name() {
//         echo 'teacher';
//     }
// }
// class Base extends Teacher {
//     use Say_World;
//     public function __construct(){
//         //
//     }
// }
// $base = new Base();
// $base->say_hello();
// $base->say_name();

//SINGLETON AND TRAIT
trait Singleton {
    public static function get_instance(){
        static $instance = [];

        $called_class = get_called_class();

        if(!isset($instance[$called_class])){ //this will run only once bcz when 1 class is added then this will not reload.
            echo 'processing';
            $instance[$called_class] = new $called_class();
        }
        return $instance[$called_class];
    }
}
class User {
    use Singleton;

    public function __construct() {
        echo 'User';
    }
}
$user_one = User::get_instance();
$user_two = User::get_instance();
   ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
