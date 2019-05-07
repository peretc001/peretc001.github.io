jQuery(function() {
/* add category img */
jQuery('.upload_cat_img').click(function() {
var send_attachment_bkp = wp.media.editor.send.attachment;
wp.media.editor.send.attachment = function(props, attachment) {
jQuery('.cat_img').val(attachment.url);
wp.media.editor.send.attachment = send_attachment_bkp;
};
wp.media.editor.open();
return false;
});