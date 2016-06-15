(function($){

    function removePhotoPrev(){
        console.log('test');
        $('i.trash').click(function(){

            if($(this).hasClass('id-photo')){
                var idPhoto = $(this).closest('.prev-box-photo').data('name');
                $('#add_photo_block').append('<input type="text" value="'+idPhoto+'" name="del_photo[]" hidden>');
            }
            var trashPhoto = $(this).closest('.prev-box-photo').data('name');
                if(trashPhoto)  $('input[data-input-name="'+ trashPhoto+'"]').remove();
            $(this).closest('.prev-box-photo').animate({
                width: '0',
                height: '0'}, 500, function(){
                $(this).closest('.prev-box-photo').remove();
            });

        })
        //$('.prev_add_photo').
    }

    $(document).ready(function(){

        removePhotoPrev();

        $('#elfinder_button').click(function() {
            console.log(location)
            var siteURL = location.origin;
            $('<div id="editor" />').dialogelfinder({
                url : location.origin + '/wp-content/plugins/photosite/library/finder/php/connector.minimal.php',
                getFileCallback: function(file) {
                    var filePath = file; //file contains the relative url.
console.log(filePath);
                    $('#add_photo_block').append('<span class="prev-box-photo" data-name="' + filePath.name + '"><img class="prev_add_photo new-photo" src="' + siteURL + filePath.tmb + '" ><i class="trash"></i><b class="in_front"></b></span>');
                    $('#add_photo_block').append('<input data-input-name="' + filePath.name + '"  type="text" name="add_photo[]" value="' + siteURL + filePath.url + '" hidden>');
                    removePhotoPrev();
                }
            });
        });


    })


    $(function () {
        'use strict';

        // Initialize the jQuery File Upload widget:
        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            url: location.origin + '/wp-content/plugins/photosite/library/jupload/',
        }).bind('fileuploadcompleted', function(e, data){
            console.log(data);

            $('#add_photo_block').append('<span class="prev-box-photo" data-name="' + data.result.files[0].name + '"><img class="prev_add_photo new-photo" data-name="'+data.result.files[0].name+'" src="' + data.result.files[0].thumbnailUrl + '" ><i class="trash"></i><b class="in_front"></b></span>');
            $('#add_photo_block').append('<input type="text" data-input-name="'+data.result.files[0].name+'" name="add_photo[]" value="' + data.result.files[0].url + '" hidden>');
            console.log(data.result.files[0].url);
            removePhotoPrev();
        }).bind('fileuploaddestroy', function(e, data){
            console.log(data);
        })

        $(function() {
            $( "#add_photo_block, #new_photo_block" ).sortable();
            $( "#add_photo_block, #new_photo_block" ).disableSelection();
        });

    });
})(jQuery)