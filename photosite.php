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


function gallery_images_fields(){
    add_meta_box('gallery_images_fields', 'All photo in gallery', 'gallery_images_func', 'photosite', 'normal', 'high');
}

add_action('add_meta_boxes', 'gallery_images_fields', 1);

function gallery_images_func($post){
$attachment = get_attached_media('image', $post->ID);
?>
</form>
<!--      <form id="image_spost" class="image-post" action="" method="POST" enctype="multipart/form-data">-->
<!--         <!-- Redirect browsers with JavaScript disabled to the origin page -->-->
<!--         <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>-->
<!--         <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->-->
<!--         <div class="row fileupload-buttonbar">-->
<!--         --><?php //wp_nonce_field( 'files', 'fileup_nonce' ); ?>
    <?php
}

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
    <script src="<?=plugins_url()?>/photosite/library/finder/js/elfinder.full.js"></script>

<!--  jQuery Upload JS  -->

<!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <!-- <script src="js/jquery.fileupload-audio.js"></script> -->
    <!-- The File Upload video preview plugin -->
    <!-- <script src="js/jquery.fileupload-video.js"></script> -->
    <!-- The File Upload validation plugin -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?=plugins_url()?>/photosite/library/jupload/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <!-- <script src="js/main.js"></script> -->
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="js/cors/jquery.xdr-transport.js"></script>



    <!--    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf-8">

        (function($){
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
//			$(document).ready(function() {
//				$('#elfinder').elfinder({
//					url : '<?//=plugins_url()?>///photosite/library/finder/php/connector.minimal.php'  // connector URL (REQUIRED)
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
                    //width: '80%',
                    //height: '600px',
                    getFileCallback: function(file) {
                        var filePath = file; //file contains the relative url.
                        console.log(filePath);
                        $('#selectedImages').html('<input type="file" name="images[]" id="img" class="nameForm" multiple="true" accept="image/*,image/jpeg"><iframe name="uploadImg" src="#" id="frameImg"></iframe>')
                        var imgPath = "<input type='file' class='add_file' name='files[]' value='http://elenatkachenko.com.ua"+filePath.url+"'/>";
                        //add the image to a div so you can see the selected images
                        $('#selectedImages').append(imgPath);
                              var filesList = $('.add_file').prop('files');
                        $('#fileupload').fileupload('send', {files: filesList});
                        //$('#editor').remove(); //close the window after image is selected
                    }
                });
            });

//
//            jQuery(function () {
//                'use strict';
//                // Initialize the jQuery File Upload widget:
//                jQuery('#fileupload').fileupload({
//                    // Uncomment the following to send cross-domain cookies:
//                    //xhrFields: {withCredentials: true},
//                    url: ''
//                });
//            });
        })(jQuery)

        $(function () {
            'use strict';

            // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: '<?php echo plugins_url()?>/photosite/library/jupload/'
            });


        });
    </script>
<!--</form>-->
<!---->
<!-- <form id="featured_upload" method="post" action="#" enctype="multipart/form-data">-->
<!--	<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />-->
<!--	<input type="hidden" name="post_id" id="post_id" value="55" />-->
<!--	--><?php //wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
<!--	<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />-->
<!--</form>-->

 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
     <form id="fileupload" class="fileupload" action="" method="POST" enctype="multipart/form-data">
         <!-- Redirect browsers with JavaScript disabled to the origin page -->
         <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
         <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
         <div class="row fileupload-buttonbar">
         <?php wp_nonce_field( 'files', 'fileup_nonce' ); ?>
             <div class="col-lg-7">
                 <!-- The fileinput-button span is used to style the file input field as button -->
                 <span class="btn btn-success fileinput-button">
                     <i class="glyphicon glyphicon-plus"></i>
                     <span>Add files...</span>
                     <input type="file" name="files[]" multiple>
                 </span>
                 <button type="submit" class="btn btn-primary start">
                     <i class="glyphicon glyphicon-upload"></i>
                     <span>Start upload</span>
                 </button>
                 <button type="reset" class="btn btn-warning cancel">
                     <i class="glyphicon glyphicon-ban-circle"></i>
                     <span>Cancel upload</span>
                 </button>
                 <button type="button" class="btn btn-danger delete">
                     <i class="glyphicon glyphicon-trash"></i>
                     <span>Delete</span>
                 </button>
                 <input type="checkbox" class="toggle">
                 <!-- The global file processing state -->
                 <span class="fileupload-process"></span>
             </div>
             <!-- The global progress state -->
             <div class="col-lg-5 fileupload-progress fade">
                 <!-- The global progress bar -->
                 <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                     <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                 </div>
                 <!-- The extended global progress state -->
                 <div class="progress-extended">&nbsp;</div>
             </div>
         </div>
         <!-- The table listing the files available for upload/download -->
         <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
     </form>
     <!-- The template to display files available for upload -->

 <!-- The blueimp Gallery widget -->
 <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
     <div class="slides"></div>
     <h3 class="title"></h3>
     <a class="prev">‹</a>
     <a class="next">›</a>
     <a class="close">×</a>
     <a class="play-pause"></a>
     <ol class="indicator"></ol>
 </div>
 <!-- The template to display files available for upload -->
 <script id="template-upload" type="text/x-tmpl">
 {% for (var i=0, file; file=o.files[i]; i++) { %}
     <tr class="template-upload fade">
         <td>
             <span class="preview"></span>
         </td>
         <td>
             <p class="name">{%=file.name%}</p>
             <strong class="error text-danger"></strong>
         </td>
         <td>
             <p class="size">Processing...</p>
             <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
         </td>
         <td>
             {% if (!i && !o.options.autoUpload) { %}
                 <button class="btn btn-primary start" disabled>
                     <i class="glyphicon glyphicon-upload"></i>
                     <span>Start</span>
                 </button>
             {% } %}
             {% if (!i) { %}
                 <button class="btn btn-warning cancel">
                     <i class="glyphicon glyphicon-ban-circle"></i>
                     <span>Cancel</span>
                 </button>
             {% } %}
         </td>
     </tr>
 {% } %}
 </script>
 <!-- The template to display files available for download -->
 <script id="template-download" type="text/x-tmpl">
 {% for (var i=0, file; file=o.files[i]; i++) { %}
     <tr class="template-download fade">
         <td>
             <span class="preview">
                 {% if (file.thumbnailUrl) { %}
                     <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                 {% } %}
             </span>
         </td>
         <td>
             <p class="name">
                 {% if (file.url) { %}
                     <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                 {% } else { %}
                     <span>{%=file.name%}</span>
                 {% } %}
             </p>
             {% if (file.error) { %}
                 <div><span class="label label-danger">Error</span> {%=file.error%}</div>
             {% } %}
         </td>
         <td>
             <span class="size">{%=o.formatFileSize(file.size)%}</span>
         </td>
         <td>
             {% if (file.deleteUrl) { %}
                 <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                     <i class="glyphicon glyphicon-trash"></i>
                     <span>Delete</span>
                 </button>
                 <input type="checkbox" name="delete" value="1" class="toggle">
             {% } else { %}
                 <button class="btn btn-warning cancel">
                     <i class="glyphicon glyphicon-ban-circle"></i>
                     <span>Cancel</span>
                 </button>
             {% } %}
         </td>
     </tr>
 {% } %}
 </script>

<input type = "text" name = "galleryimages" id = "galleryimages" style = "display:none"/>
    <a href = "javascript:void(0)" id = "elfinder_button">Add Gallery Images</a>
    <div id = "selectedImages">

    </div>

    <div id="elfinder"></div>


    <?php
//echo dirname(__FILE__).'/';
$upload_dir = wp_upload_dir();
//print_r( $upload_dir );
if(!is_dir($upload_dir['path'].'/photosite')){
mkdir($upload_dir['path'].'/photosite');
}
    error_reporting(E_ALL | E_STRICT);
    require('library/jupload/UploadHandler.php');
    $uploadImage = new UploadHandler();
    //var_dump($uploadImage);
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
            $upload_dir = wp_upload_dir();
            $user_dirname = $upload_dir['basedir'].'/';
            if ( ! file_exists( $user_dirname ) ) {
                wp_mkdir_p( $user_dirname );
            }

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
//// если вдруг мы во фронте
//require_once(ABSPATH .'wp-admin/includes/media.php');
//require_once(ABSPATH .'wp-admin/includes/file.php');
//require_once(ABSPATH .'wp-admin/includes/image.php');
//
//$url = 'http://s.w.org/style/images/wp-header-logo.png';
////$post_id = 3061;
//$desc = "Логотип WordPress";
//
//$img_tag = media_sideload_image( $url, $post_id, $desc );
}

function gallery_images_fields_update( $post_id){
// если вдруг мы во фронте
require_once(ABSPATH .'wp-admin/includes/media.php');
require_once(ABSPATH .'wp-admin/includes/file.php');
require_once(ABSPATH .'wp-admin/includes/image.php');

$url = 'http://s.w.org/style/images/wp-header-logo.png';
//$post_id = 3061;
$desc = "Логотип WordPress";

$img_tag = media_sideload_image( $url, $post_id, $desc );
}

?>