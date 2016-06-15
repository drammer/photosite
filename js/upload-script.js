(function($){
    $(document).ready(function(){
        $('#elfinder_button').click(function() {
            console.log(location)
            var siteURL = location.origin;
            $('<div id="editor" />').dialogelfinder({
                url : location.origin + '/wp-content/plugins/photosite/library/finder/php/connector.minimal.php',
                getFileCallback: function(file) {
                    var filePath = file; //file contains the relative url.
                    console.log(siteURL);
                    $('#add_photo_block').append('<input type="text" name="add_photo[]" value="' + siteURL + filePath.url + '" hidden>');
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
            $('#add_photo_block').append('<input type="text" name="add_photo[]" value="' + data.result.files[0].url + '" hidden>');
            console.log(data.result.files[0].url);
        })

    });
})(jQuery)