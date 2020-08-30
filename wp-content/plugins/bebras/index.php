<?php
/**
* Plugin Name: Bebro pluginas
* Plugin URI: https://www.bebbr.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Your Name Here
* Author URI: http://bebbr.com/
**/
 
add_action( 'admin_menu', function(){
    add_menu_page('Bebro Puslapis', 'Bebras', 'manage_options', 'bebras', 'bebro_funkcija');
 
add_submenu_page('bebras', 'Page title 2', 'Menu title 2',
    'manage_options', 'bebras2', 'bebro_funkcija2');


 
add_submenu_page('bebras', 'Edit', null,
    'manage_options', 'bebras3', 'bebro_funkcija3');
 
});
 
add_action( 'init', function() {
    $labels = [
      'name'               => 'Calendar',
      'singular_name'      => 'Calendar',
      'add_new'            => 'new Calendar',
      'add_new_item'       => __( 'Add New Product' ),
      'edit_item'          => __( 'Edit Product' ),
      'new_item'           => __( 'New Product' ),
      'all_items'          => __( 'All Products' ),
      'view_item'          => __( 'View Product' ),
      'search_items'       => __( 'Search Products' ),
      'not_found'          => __( 'No products found' ),
      'not_found_in_trash' => __( 'No products found in the Trash' ), 
      'menu_name'          => 'Products'
    ];
    $args = [
      'labels'        => $labels,
      'description'   => 'Holds our products and product specific data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => [],
      'has_archive'   => true,
    ];
register_post_type('event', $args );
});
 
function bebro_funkcija()
{
    $obj = get_post_type_object( 'event' ); 
    echo '<h1>Aš Esu Bebras</h1>';

    echo '
        <form action="" method="post">
            <input type="text" name="'.esc_html($obj->labels->name).'"> New User Name<br>
            <input type="text" name="'.esc_html($obj->labels->menu_name).'">New User Password<br>
            <button type="submit">go</button>
        </form>
        ';
        if (isset($_POST)) {
            # code...
            $post = [
                'post_title'   => 'Test post-----------',
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'meta_input'   => [
                    'text' => 'ivykio tekstas---------',
                    'data' => date("Y/m/d")
                ]
            ];
            $url = 'http://localhost/wordpress/wp-admin/admin.php?page=bebras';
            wp_redirect( $url );
        }
        echo '<pre>';
    

    echo esc_html($obj->labels->name);
    echo '<br>';
    print_r($post);
    print_r($_GET);
    
}
 
function bebro_funkcija2()
{
    echo '<h1>Aš Esu Bebras Nr 2</h1>';
}
 
function bebro_funkcija3()
{
    echo ' <div class="container">
                <div class="form">
                    <h2>Įvykis</h2>
                    <form action="http://localhost/wordpress/wp-admin/admin.php?page=bebras2" method="post">
                        <label> Įvykio pavadinimas: </label><br>
                        <input type="text" name="name"><br>
                        <label> Įvykio info: </label><br>
                        <textarea name="post" required> </textarea> <br>
                        <label> Data: </label><br>
                        <input type="date" name="data"><br>
                        <button type="submit" name="action">Sukurti</button>
                    </form>
                </div>
            </div>';
    if (isset($_POST['name']) && isset($_POST['post']) && isset($_POST['data'])) {
        $post = [
            'post_title'   => $_POST['name'],
            'post_content' => '',
            'post_status'  => 'publish',
            'post_author'  => 1,
            'meta_input'   => [
                'text' => $_POST['post'],
                'data' => $_POST['data']
            ]
        ];
        // wp_insert_post($post);
        // wp_redirect('http://localhost/wordpress/wp-admin/admin.php?page=bebras2');
    }
    // echo '<h1>Aš Esu Bebras Nr 3</h1>';
    // $url = 'http://localhost/wordpress/wp-admin/admin.php?page=bebras';
    // wp_redirect( $url );
}