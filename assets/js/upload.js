jQuery(document).ready(function ($) {
    if ($('.startup_pro_upload_button').length >= 1) {
        window.startup_pro_uploadfield = '';
        $('.startup_pro_upload_button').live('click', function () {
            window.startup_pro_uploadfield = $('.upload_field', $(this).parent());
            tb_show('Upload', 'media-upload.php?type=image&TB_iframe=true', false);
            return false;
        });
        window.startup_pro_send_to_editor_backup = window.send_to_editor;
        window.send_to_editor = function (html) {
            if (window.startup_pro_uploadfield) {
                if ($('img', html).length >= 1) {
                    var image_url = $('img', html).attr('src');
                } else {
                    var image_url = $($(html)[0]).attr('href');
                }
                $(window.startup_pro_uploadfield).val(image_url);
                window.startup_pro_uploadfield = '';
                tb_remove();
            } else {
                window.startup_pro_send_to_editor_backup(html);
            }
        }
    }
});