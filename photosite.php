<?php
/*
Plugin Name: Our Photosite
Plugin URI: https://github.com/drammer/
Description: Photosite plugin
Version: 1.00
Author: drammer.g
Author email: drammer.g@gmail.com
*/
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : drammer.g@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//function add_ajax_url(){
//<!--    <script>-->
//<!--        var MyAjaxUrlArr = {"ajaxurl":"http:\/\/ubc-corp.com\/wp-admin\/admin-ajax.php"};-->
//<!--        var MyAjaxUrl = "http:\/\/ubc-corp.com\/wp-admin\/admin-ajax.php";-->
//<!--    </script>-->
//}

function wptuts_scripts_with_jquery()
{
    // Register the script like this for a plugin:
    wp_register_script( 'action-script', plugins_url( '/js/action-script.js', __FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'action-script' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_with_jquery' );

function admin_wptuts_scripts_with_jquery()
{
    // Register the script like this for a plugin:
    wp_enqueue_style( 'photosite-style', plugins_url('/photosite/css/photosite-style.css') );
    //wp_register_script( 'scriptiva', plugins_url( '/js/scriptiva.js', __FILE__ ) );
    wp_register_script( 'upload-script', plugins_url( '/js/upload-script.js', __FILE__ ) );
    //wp_register_script( 'widget', plugins_url( '/js/jquery.ui.widget.js', __FILE__ ), array('jQuery') );
    //wp_register_script( 'transport', plugins_url( '/js/jquery.iframe-transport.js', __FILE__ ), array('jQuery') );
    // wp_register_script( 'fileupload', plugins_url( '/js/jquery.fileupload.js', __FILE__ ), array('jQuery') );
    //wp_register_script( 'fileupload-process', plugins_url( '/js/jquery.fileupload-process.js', __FILE__ ), array('jQuery') );
    //wp_register_script( 'fileupload-image', plugins_url( '/js/jquery.fileupload-image.js', __FILE__ ), array('jQuery') );
    //wp_register_script( 'fileupload-ui', plugins_url( '/js/jquery.fileupload-ui.js', __FILE__ ), array('jQuery') );
    //wp_enqueue_script( 'scriptiva' );
//    wp_enqueue_script( 'widget' );
    //wp_enqueue_script( 'transport' );
    //  wp_enqueue_script( 'fileupload' );
    // wp_enqueue_script( 'fileupload-process' );
    //wp_enqueue_script( 'fileupload-image' );
    //wp_enqueue_script( 'fileupload-ui' );
    wp_enqueue_script( 'upload-script' );
    //wp_enqueue_style( 'photosite-style' );
}
add_action( 'admin_enqueue_scripts', 'admin_wptuts_scripts_with_jquery' );

function true_register_post_type_init(){
    $labels = array(
        'name'              => _x( 'Photosite', 'post type general name' ),
        'singular_name'     => 'photo',
        'add_new'           => 'Add photo gallery',
        'edit_new_item'     => 'Add new photo gallery',
        'edit_item'         => 'Edit photo gallery',
        'new_item'          => 'Edit photo gallery',
        'all_items'         => 'All photo gallerys',
        'view_item'         => 'View photo gallery in site',
        'search_items'      => 'Search gallery',
        'not_found'          => 'Gallery not found',
        'not-found_in_trash'    => 'In trash not found gallery',
        'menu_name'             => 'Photosite',
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our portfolio',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail', 'editor'),
        'menu_icon'     => plugins_url(). '/photosite/images/camera-icon-small.png',
        'has_archive'   => true,
    );

    register_post_type('photosite', $args);
}
add_action('init', 'true_register_post_type_init');

function gallery_fields(){
    add_meta_box('gallery_fields', 'Add photo in gallery', 'gallery_box_func', 'photosite', 'normal', 'high');
}

add_action('add_meta_boxes', 'gallery_fields', 1);

function gallery_box_func($post){  ?>

    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?=plugins_url()?>/photosite/library/finder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="<?=plugins_url()?>/photosite/library/finder/css/theme.css">

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?=plugins_url()?>/photosite/finder/js/elfinder.full.js"></script>

    <script type="text/javascript" charset="utf-8">
        (function($){
//			// Documentation for client options:
//			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
//			$(document).ready(function() {
//				$('#elfinder').elfinder({
//					url : '<?//=plugins_url()?>///photosite/finder/php/connector.minimal.php'  // connector URL (REQUIRED)
//					// , lang: 'ru'                    // language (OPTIONAL)
//				});
//			});
//
////
////    $('.elfinder-cwd-file').click(function(){
////        var $im = $(this);
////        $('<div />').dialogelfinder({
////            url: 'http://elenatkachenko.com.ua/wp-content/plugins/photosite/finder/php/connector.minimal.php',
////            commandsOptions: {
////                getfile: {
////                    oncomplete: 'destroy' // destroy elFinder after file selection
////                }
////            },
////            getFileCallback: function(path){ console.log( $im.val(path) ); }
////        });
////        console.log( $im.val(path));
////        return false;
////    });
////
//

            $('#elfinder_button').click(function() {
                $('<div id="editor" />').dialogelfinder({
                    url : 'http://elenatkachenko.com.ua/wp-content/plugins/photosite/library/finder/php/connector.minimal.php',
                    width: '80%',
                    height: '600px',
                    getFileCallback: function(file) {
                        var filePath = file; //file contains the relative url.
                        //console.log(filePath);
                        var imgPath = "<img src = '"+filePath.url+"'/>";
                        $('#selectedImages').append(imgPath); //add the image to a div so you can see the selected images
                        $('#editor').remove(); //close the window after image is selected
                    }
                });
            });

        })(jQuery)

    </script>

    <input type = "text" name = "galleryimages" id = "galleryimages" style = "display:none"/>
    <a href = "javascript:void(0)" id = "elfinder_button">Add Gallery Images</a>
    <div id = "selectedImages">

    </div>

    <div id="elfinder"></div>


    <?php

    error_reporting(E_ALL | E_STRICT);
    require('UploadHandler.php');

    $uploadImage = new UploadHandler($post);
    if(isset($_POST['fileup_nonce'])){

//die();
        if( wp_verify_nonce( $_POST['fileup_nonce'], 'files' ) ){
            if ( ! function_exists( 'wp_handle_upload' ) )
                require_once( ABSPATH . 'wp-admin/includes/file.php' );

            $file = &$_FILES['files'];
            $overrides = array( 'test_form' => false );
            for($i=0; $i< count($file['name']); $i++){
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                require_once( ABSPATH . 'wp-admin/includes/media.php' );

                $fileUpload = array();
                $fileUpload['name']  = $file['name'][$i];
                $fileUpload['type']  = $file['type'][$i];
                $fileUpload['size']  = $file['size'][$i];
                $fileUpload['tmp_name']  = $file['tmp_name'][$i];
                //var_dump($fileUpload); echo $_POST['post_id'];

//            $upload_dir_name = 'test';
//            $upload_dir = wp_upload_dir();
//            $user_dirname = $upload_dir['basedir'].'/gallery_51';
//            if ( ! file_exists( $user_dirname ) ) {
//                wp_mkdir_p( $user_dirname );
//            }

                define( 'UPLOADS', 'wp-content/uploads/photosite/gallery_'.$post->ID );
                $upload_dir = wp_upload_dir( 'wp-content/uploads/photosite/gallery_'.$post->ID );
                //echo $upload_dir['baseurl'];


                $movefile = media_handle_sideload( $fileUpload, '51' );

                if ( $movefile ) {
                    return true;
                    //echo "Файл был успешно загружен.\n";
                    //print_r( $movefile );
                } else {
                    //echo "Возможны атаки при загрузке файла!\n";
                }
            }
        }
    }

}
//add_action('save_page', 'gallery_fields_update', 0);
add_action('wp_ajax_photosite_action', 'gallery_fields_update'); //работает для авторизованных пользователей
add_action('wp_ajax_nopriv_photosite_action', 'gallery_fields_update'); //работает для неавторизованных

function gallery_fields_update( $post_id){

}

?>