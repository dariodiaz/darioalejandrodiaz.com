jQuery( document ).ready( function() {

	jQuery( document ).on( 'click', '.munk-admin-notice button.notice-dismiss', function() {

    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        data: { action: 'munk_admin_notice_dismiss' }
      }).done(function() {            
     });

	})
});
