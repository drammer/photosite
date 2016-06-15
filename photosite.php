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
    wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css');
    wp_enqueue_style( 'bootstrap-style', '//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'blueimp-gallery', '///blueimp.github.io/Gallery/css/blueimp-gallery.min.css' );

    wp_enqueue_style( 'elfinder-style', plugins_url('/photosite/library/finder/css/elfinder.min.css') );
    wp_enqueue_style( 'elfinder-theme-style', plugins_url('/photosite/library/finder/css/theme.css') );

    wp_register_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js');
    wp_register_script( 'tmpl', '//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js');
    wp_register_script( 'load-image', '//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js');
    wp_register_script( 'canvas-image', '//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js');
    wp_register_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
    wp_register_script( 'blueimp-gallery', '//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js');


    wp_register_script( 'widget', plugins_url( '/library/jupload/js/jquery.ui.widget.js', __FILE__ ), array('jquery') );
    wp_register_script( 'transport', plugins_url( '/library/jupload/js/jquery.iframe-transport.js', __FILE__ ), array('jquery') );
    wp_register_script( 'fileupload', plugins_url( '/library/jupload/js/jquery.fileupload.js', __FILE__ ), array('jquery') );
    wp_register_script( 'fileupload-process', plugins_url( '/library/jupload/js/jquery.fileupload-process.js', __FILE__ ), array('jquery') );
    wp_register_script( 'fileupload-image', plugins_url( '/library/jupload/js/jquery.fileupload-image.js', __FILE__ ), array('jquery') );
    wp_register_script( 'fileupload-ui', plugins_url( '/library/jupload/js/jquery.fileupload-ui.js', __FILE__ ), array('jquery') );
    wp_register_script( 'fileupload-validate', plugins_url( '/library/jupload/js/jquery.fileupload-validate.js', __FILE__ ), array('jquery') );
    wp_register_script( 'elfinder', plugins_url( '/library/finder/js/elfinder.full.js', __FILE__ ), array('jquery') );

     wp_register_script( 'upload-script', plugins_url( '/js/upload-script.js', __FILE__ ) , array('jquery') );
//add JS

    wp_enqueue_script( 'jquery-ui' );
    wp_enqueue_script( 'tmpl' );
    wp_enqueue_script( 'load-image' );
    wp_enqueue_script( 'canvas-image' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'blueimp-gallery' );
    wp_enqueue_script( 'widget' );
    wp_enqueue_script( 'transport' );
    wp_enqueue_script( 'fileupload' );
    wp_enqueue_script( 'fileupload-process' );
    wp_enqueue_script( 'fileupload-image' );
    wp_enqueue_script( 'fileupload-ui' );
    wp_enqueue_script( 'fileupload-validate' );
    wp_enqueue_script( 'elfinder' );
    wp_enqueue_script( 'upload-script' );

//Add CSS

   wp_enqueue_style( 'photosite-style' );
   wp_enqueue_style( 'jquery-ui-style' );
   wp_enqueue_style( 'bootstrap-style' );
   wp_enqueue_style( 'blueimp-gallery' );
   wp_enqueue_style( 'elfinder-style' );
   wp_enqueue_style( 'elfinder-theme-style' );
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

 <input type="hidden" name="gallery_images_fields" value="<?php echo wp_create_nonce(__FILE__); ?>" />
 <div id="add_photo_block">
 <?php if(!empty($attachment)){
 foreach($attachment as $photo){ ?>
   <img src="<?php echo wp_get_attachment_image_url($photo->ID, 'thumbnail')?>" class="prev_add_photo">
<?php }
}?>
</div>

    <?php
}

function gallery_fields(){
    add_meta_box('gallery_fields', 'Add photo in gallery', 'gallery_box_func', 'photosite', 'normal', 'high');
}

add_action('add_meta_boxes', 'gallery_fields', 1);

function gallery_box_func($post){  ?>
    </form>
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
    <a href = "javascript:void(0)" id = "elfinder_button">Add photo from Gallery Images</a>
    <div id = "selectedImages">

    </div>

    <div id="elfinder"></div>


    <?php
    error_reporting(E_ALL | E_STRICT);
    require('library/jupload/UploadHandler.php');
    $uploadImage = new UploadHandler(); var_dump($post);

}
//add_action('save_page', 'gallery_fields_update', 0);
add_action('wp_ajax_photosite_action', 'gallery_fields_update'); //работает для авторизованных пользователей
add_action('wp_ajax_nopriv_photosite_action', 'gallery_fields_update'); //работает для неавторизованных

function gallery_fields_update( $post_id){

}

function gallery_images_fields_update( $post_id){
// если вдруг мы во фронте
require_once(ABSPATH .'wp-admin/includes/media.php');
require_once(ABSPATH .'wp-admin/includes/file.php');
require_once(ABSPATH .'wp-admin/includes/image.php');

$desc = "Логотип WordPress";
if(isset($_POST['add_photo'])){
    $attachArr = $_POST['add_photo'];

        foreach($attachArr as $urlPhoto){
        //var_dump($urlPhoto);
        //die();
            $img_tag = media_sideload_image( $urlPhoto, $post_id, $desc );
            var_dump($img_tag);
            $die();
        }
    }
}
add_action('save_post', 'gallery_images_fields_update' );

?>