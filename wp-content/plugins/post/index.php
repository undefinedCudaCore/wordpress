<?php
/**
* Plugin Name: Ivykio pluginas
* Plugin URI: https://www.ivykis.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Your Name Here
* Author URI: http://ivykis.com/
**/
 
// add_action('wp_print_styles', 'customStyleFunction');
// function customStyleFunction(){
//     wp_enqueue_style('button', get_template_directory_uri() . '/button.css', array(), '', 'all');
//     var_dump(get_template_directory_uri(). '/button.css');
// }
wp_enqueue_style('button', plugins_url() . '/post/css/button.scss', array(), '1.0.0', 'all');

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    body, td, textarea, input, select {
      font-family: "Lucida Grande";
      font-size: 18px;
    }
    .container {
        dispaly: inline-block;
        width: 50%;
        border: solid 1px gray;
        text-align: center;
    }
 
    
  </style>';
}

add_action( 'admin_menu', function(){
    add_menu_page('Ivykio Puslapis', 'Ivykiai', 'manage_options', 'ivykis', 'post_function');
 
    add_submenu_page('ivykis', 'Create', 'Sukurti ivyki', 'manage_options', 'ivykiai', 'post_function2');

    add_submenu_page('ivykis', 'Edit', null, 'manage_options', 'redagavimas', 'post_function3');
    
    add_submenu_page('ivykis', 'Photo', 'Pridėti nuotraukų', 'manage_options', 'nuotrauka', 'post_function4');

    add_submenu_page('ivykis', 'Add Photo', null, 'manage_options', 'attach', 'post_function5');

});
 
add_action( 'init', function() {
    $labels = [
      'name'               => 'Posts',
      'singular_name'      => 'Post',
      'add_new'            => 'new Post',
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
 
function post_function()
{
    $obj = get_post_type_object( 'event' ); 
    echo '<div class="container">';


        global $wpdb;
        $post = $wpdb->get_results ( "SELECT * FROM wp_postmeta" );
        $post2 = $wpdb->get_results ( "SELECT * FROM wp_posts" );
        $post_id;
        $post2_id;
        
        echo '<pre>';
        print_r ($post);

        foreach ($post2 as $key2 => $value2) {

            $post2_id = $value2->ID;

        }
        foreach ($post as $key => $value) {

            $post_id = $value->post_id;
                if ($value->meta_key == 'text') {
                    $metaValue = '<h4>'.$value->meta_value.'</h4>';
                }
                if ($value->meta_key == 'data') {
                    $metaValue = '<h6>'.$value->meta_value.'</h6>';
                }
                echo '
                <form action="http://localhost/wordpress/wp-admin/admin.php?page=redaguoti" method="post">
                    <div class="creation">
                        '.$metaValue.'
                    </div>
                </form>
                ';
            }

            
}
 
function post_function2()
{
    echo ' <div class="container">
                <div class="creation">
                    <h2>Įvykis</h2>
                    <form action="http://localhost/wordpress/wp-admin/admin.php?page=ivykis" method="post">
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
        // if ( ! empty( $postarr['meta_input'] ) ) {
        //     foreach ( $postarr['meta_input'] as $field => $value ) {
        //         echo 'EEE';
        //         update_post_meta( $post_ID, $field, $value );
        //     }
        // } 
        // wp_insert_post($post);
        // wp_redirect('http://localhost/wordpress/wp-admin/admin.php?page=ivykis');
    }
}




function post_function3(){
    // function register_plugin_styles() {
    //     wp_register_style('button', plugins_url('post/button.css'));
    //     var_dump(wp_register_style('button', plugins_url('post/button.css')));
    //     // echo 'yey';
    //     wp_enqueue_style('button'); 
    //     var_dump(wp_enqueue_style('button') );
    // } 
    // register_plugin_styles();
    

    // global $wpdb;
    // $post = $wpdb->get_results ( "SELECT * FROM wp_postmeta" );
    // print_r($post);
    // echo ' <div class="container">
    //             <div class="creation">
    //                 <h2>Redaguoti ivyki</h2>
    //                 <form action="http://localhost/wordpress/wp-admin/admin.php?page=ivykis" method="post">
    //                     <label> Įvykio pavadinimas: </label><br>
    //                     <input type="text" name="name"><br>
    //                     <label> Įvykio info: </label><br>
    //                     <textarea name="post" required> </textarea> <br>
    //                     <label> Data: </label><br>
    //                     <input type="date" name="data"><br>
    //                     <button type="submit" name="action">Sukurti</button>
    //                 </form>
    //             </div>
    //         </div>';



//             $TheImage='Vodacom.jpg';
//             $TheDir='images/Vodacom.jpg';
//             $TheImageName='Vodacom';
//             $image_url = plugins_url( $TheDir, __FILE__ );
//             $mySanitizedName = strtolower(str_replace(" ","-",$TheImageName));
            
//             $uploaddir = wp_upload_dir();
//             $uploadfile = $uploaddir['path'] . '/' . $TheImage;
            
//             // Here is the new curl way of copying a file..
//             $ch = curl_init($image_url);
//             $fp = fopen($uploadfile, 'wb');
//             curl_setopt($ch, CURLOPT_FILE, $fp);
//             curl_setopt($ch, CURLOPT_HEADER, 0);
//             curl_exec($ch);
//             curl_close($ch);
//             fclose($fp);
            
//             $New_image_url = $uploaddir['url']. '/' . $TheImage;
            
//             $post_data = [
//                 'post_author'   => '1',
//                 'post_name'     => $mySanitizedName,
//                 'post_title'    => $TheImageName,
//                 'post_content'  => '',
//                 'post_excerpt'  => '',
//                 'post_status'   => 'publish',
//                 'ping_status'   => 'closed',
//                 'post_type'     => 'attachment',
//                 'post_mime_type'     => 'image/jpeg',
//                 'guid'          =>  $New_image_url 
//             ];
            
//             $image_Id = wp_insert_post( $post_data );
//             update_post_meta( $image_Id, '_wp_attached_file', date("Y").'/'.date("m").'/'.$TheImage );
//             require_once(ABSPATH . 'wp-admin/includes/image.php');
//             $attach_data = wp_generate_attachment_metadata( $image_Id, $uploadfile );
//             $res1= wp_update_attachment_metadata( $image_Id, $attach_data );
}

function post_function4(){
    $form = '
        <form action="http://localhost/wordpress/wp-admin/admin.php?page=attach" method="post" enctype="multipart/form-data">
            Įkelti nuotrauką: <input type="file" name="picture" size="25" />
            <input class="myButton" type="submit" name="submit" value="Pridėti" />
        </form>
    ';
    echo $form;
    

}

function post_function5(){
        
    require( dirname(__FILE__) . '/../../../wp-load.php' );

    $wordpressUploadDir = wp_upload_dir();
    $count = 1;
    $photoCount = 1;
    
    $attachedPicture = $_FILES['picture'];
    
    $newFilePath = $wordpressUploadDir['path'] . '/' . $attachedPicture['name'];
    $attachedPicture['name'] = $photoCount++ . ' nuotrauka';

    if( $attachedPicture['tmp_name'] == false) {
        $newFileMime = '';

        $infoMessage = '<h4>Nuotrauka nėra pasirinkta!</h4>';
        $back = '<a class="myButton" href="http://localhost/wordpress/wp-admin/admin.php?page=nuotrauka">Grįžti</a><br>';

        echo $infoMessage;
        echo $back;
    } else {
        $newFileMime = mime_content_type( $attachedPicture['tmp_name'] );
    }
    
    if( $attachedPicture['error'] ) {
        die( $attachedPicture['error'] );
    }
    
    if( $attachedPicture['size'] > wp_max_upload_size() ) {        
        die( 'Failas per didelis, nei tikėtasi.' );
    }
    
    // if( !in_array( $newFileMime, get_allowed_mime_types() ) ) {
    //     die( 'Neleidžiama tokio tipo įkėlimų.' );
    // }
    
    while( file_exists( $newFilePath ) ) {
        $count++;
        $newFilePath = $wordpressUploadDir['path'] . '/' . $count . '_' . $attachedPicture['name'];
    }

    // $parentPostId parodo, prie kurio posto priskirti nuotrauką.
    $parentPostId = 15;


    if( move_uploaded_file( $attachedPicture['tmp_name'], $newFilePath ) ) {    
        $upload = wp_insert_attachment( [
            'guid'           => $newFilePath, 
            'post_mime_type' => $newFileMime,
            'post_title'     => preg_replace( '/\.[^.]+$/', '', $attachedPicture['name'] ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ], $newFilePath, $parentPostId );
    
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
    
        wp_update_attachment_metadata( $upload, wp_generate_attachment_metadata( $upload, $newFilePath, $parentPostId ) );
        
        $formMedia = '
            <a class="myButton" href="http://localhost/wordpress/wp-admin/upload.php">Perziureti media</a>
            <br><br>
        ';
        $formCreate = '
            <a class="myButton" href="http://localhost/wordpress/wp-admin/admin.php?page=nuotrauka">Pridedi dar viena nuotrauka</a>
        ';
        echo $formMedia;
        echo $formCreate;
    }
}

