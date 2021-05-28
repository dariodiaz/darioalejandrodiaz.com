jQuery( document ).ready(function($) {	
	
	//Site Title
	wp.customize('blogname', function(control) {
		control.bind(function( controlValue ) {									
			$('.site-header .site-branding h1 a').text(controlValue);			
		});				
	});	
	
	//Site Description
	wp.customize('blogdescription', function(control) {
		control.bind(function( controlValue ) {									
			$('.site-header .site-branding p').text(controlValue);			
		});				
	});	
	
	//Header Text Ed
	wp.customize('header_text', function(control) {
		control.bind(function( controlValue ) {												
			if (controlValue) {
				$(".site-header .site-branding h1").show();
				$(".site-header .site-branding p").show();
			} 
			else {
				$(".site-header .site-branding h1").hide();
				$(".site-header .site-branding p").hide();				
			}
		});				
	});		
	
	//Main Header Logo
	wp.customize('munk_custom_logo_size_ed', function(control) {
		control.bind(function( controlValue ) {						
			$('.site-header .site-branding .custom-logo').css('max-width', controlValue +'%');
		});				
	});		
	
	//Sticky Header Logo
	wp.customize('munk_layout_site_header_sticky_logo', function(control) {
		control.bind(function( controlValue ) {						
			$('.munk-sticky-header .site-branding .custom-logo').css('max-width', controlValue +'%');
		});				
	});			
	
	// Above Header Multi Color
	wp.customize('munk_color_header_above_ed', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);						
			var bgcolor = control_json['bgcolor'];
			var text = control_json['text'];
			var link = control_json['link'];
			var hover = control_json['hover'];			
			$('.header-above').css('background-color', bgcolor);
			$('.header-above').css('color', text);
			$('.header-above a, .header-above ul.mt-header-ed-menu li a').css('color', link);
			$('.header-above a:hover, .header-above ul.mt-header-ed-menu li a:hover').css('color', hover);													
		});				
	});
	
	// Below Header Multi Color
	wp.customize('munk_color_header_below_ed', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);						
			var bgcolor = control_json['bgcolor'];
			var text = control_json['text'];
			var link = control_json['link'];
			var hover = control_json['hover'];			
			$('.header-below').css('background-color', bgcolor);
			$('.header-below').css('color', text);
			$('.header-below a, .header-below ul.mt-header-ed-menu li a').css('color', link);
			$('.header-below a:hover, .header-below ul.mt-header-ed-menu li a:hover').css('color', hover);													
		});				
	});	
	
	//Primary Header Border Width
	wp.customize('munk_layout_site_header_primary_border_ed', function(control) {
		control.bind(function( controlValue ) {						
			$('.munk-header').css('border-bottom-width', controlValue);
		});				
	});		
	
	//Primary Header Border Color
	wp.customize('munk_layout_site_header_primary_border_color', function(control) {
		control.bind(function( controlValue ) {						
			$('.munk-header').css('border-bottom-color', controlValue);
		});				
	});		
	
	// Primary Header Margin Bottom
	wp.customize('munk_layout_site_header_primary_margin_bottom', function(control) {
		control.bind(function( controlValue ) {	
			console.log(controlValue);
			$('.munk-header').css('margin-bottom', controlValue + 'px');	
		});		
		
	});
	
	// Primary Header Multi Color
	wp.customize('munk_color_header_primary_ed', function(control) {
		control.bind(function( controlValue ) {							
			var control_json = JSON.parse(controlValue);	
			
			var bgcolor = control_json['bgcolor-header'];
			var text = control_json['text'];
			var link = control_json['link'];
			var hover = control_json['hover'];		
			
			$('.site-header').css('background-color', bgcolor);
			$('.site-header, .site-header .site-branding p').css('color', text);
			$('.site-header .site-branding h1 a').css('color', link);
			$('.site-header .site-branding h1 a:hover').css('color', hover);																			
		});				
	});		
	
	//Main Navigation Main Menu Multi Color
	wp.customize('munk_color_main_nav_ed', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);									
			var bgcolor = control_json['bgcolor'];			
			var link = control_json['link'];
			var hover = control_json['hover'];				
			$('.site-header .navbar, .layout-two-navbar').css('background-color', bgcolor);			
			$('.navbar .navbar-nav .nav-link').css('color', link);
			$('.navbar .navbar-nav .nav-link:hover').css('color', hover);								
		});				
	});		
	
	//Main Navigation Dropdown Multi Color
	wp.customize('munk_color_main_nav_submenu', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);									
			var bgcolor = control_json['bgcolor'];			
			var link = control_json['link'];
			var hover = control_json['hover'];				
			$('.site-header .dropdown-menu, .navbar-expand-sm .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle').css('background-color', bgcolor);			
			$('.site-header .dropdown-menu .dropdown-item, .navbar-expand-sm .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle').css('color', link);
			$('.site-header .dropdown-menu .dropdown-item:hover').css('color', hover);							
		});				
	});	
	
	//Main Navigation Mobile Menu Multi Color
	wp.customize('munk_color_main_nav_toggle', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);												
			var bgcolor = control_json['bgcolor'];			
			var link = control_json['link'];			
			$('.navbar-toggler').css('background-color', bgcolor);			
			$('.navbar-toggler').css('color', link);									
		});				
	});	
	
	// Archive/Blog
	
	// Read More Button		
	wp.customize('munk_layout_blog_archive_excert_read_more', function(control) {
		control.bind(function( controlValue ) {			
			$('.entry-excerpt .read-more .btn').text(controlValue);
		});				
	});	
	
	wp.customize('munk_layout_single_post_author_title', function(control) {
		control.bind(function( controlValue ) {			
			$('.author-section .author-header').text(controlValue);
		});				
	});		
	
	// General Colors
	wp.customize('munk_color_general_bgcolor', function(control) {
		control.bind(function( controlValue ) {						
			$('#primary .entry-card, body.mt-container-fullwidth-contained #page').css('background-color', controlValue);	
		});				
	});	
	
	// Post/Page Title Colors
	wp.customize('munk_color_general_title_color', function(control) {
		control.bind(function( controlValue ) {						
			$('.entry-card .entry-title a, .single h1.entry-title, .page h1.entry-title, .archive-title').css('color', controlValue);	
		});				
	});	
	
	// Post/Page Content Colors
	wp.customize('munk_color_general_text_color', function(control) {
		control.bind(function( controlValue ) {						
			$('body:not(.has-blocks)  .entry-card .entry-content *, body:not(.has-blocks) .entry-card .entry-excerpt, body.has-blocks .entry-card .entry-content, .entry-card .entry-excerpt').css('color', controlValue);	
		});				
	});	
	
	// Content Link Colors
	wp.customize('munk_color_general_link_color', function(control) {
		control.bind(function( controlValue ) {						
			$('.entry-card .entry-content a:not(.wp-block-button__link), .comment-list a').css('color', controlValue);	
		});				
	});	
	
	// Content Link Hover Colors
	wp.customize('munk_color_general_link_hover', function(control) {
		control.bind(function( controlValue ) {						
			$('body:not(.has-blocks) .entry-card a:hover, body:not(.has-blocks) .entry-content a:hover,.comment-list .reply a:hover').css('color', controlValue);	
		});				
	});	
	
	// Post Meta Colors
	wp.customize('munk_color_general_post_meta', function(control) {
		control.bind(function( controlValue ) {						
			$('.entry-card .entry-meta a, .entry-card .entry-meta span, .entry-card .entry-meta, .entry-card .entry-meta .comments svg, .entry-card .entry-meta .posted-on svg, .entry-card .entry-meta .tags svg, .entry-card .entry-meta .post-category svg, .entry-card .entry-meta .byline svg').css('color', controlValue);	
		});				
	});		
	
	//Sidebar Multi Color
	wp.customize('munk_color_main_sidebar', function(control) {
		control.bind(function( controlValue ) {							
			var control_json = JSON.parse(controlValue);				
			var bgcolor = control_json['bgcolor'];
			var widget_title = control_json['widget-title'];
			var widget_title_bg = control_json['widget-title-bg'];
			var text = control_json['text'];			
			var link = control_json['link'];
			var hover = control_json['hover'];					
			$('#secondary').css('background-color', bgcolor);
			$('#secondary .widget .widget-title').css('color', widget_title);
			$('#secondary .widget .widget-title').css('background-color', widget_title_bg);			
			$('#secondary, #secondary .widget, #secondary .widget p, #secondary ul li, .widget table td').css('color', text);
			$('#secondary .widget a, #secondary .widget ul li a').css('color', link);
			$('#secondary .widget a:hover, #secondary .widget ul li a:hover').css('color', hover);				
		});				
	});	
	
	//Footer Widgets Area Multi Color
	wp.customize('munk_color_footer_widgets', function(control) {
		control.bind(function( controlValue ) {							
			var control_json = JSON.parse(controlValue);							
			var bgcolor = control_json['bgcolor'];
			var widget_title = control_json['widget-title'];			
			var text = control_json['text'];			
			var link = control_json['link'];
			var hover = control_json['hover'];								
			$('.site-footer').css('background-color', bgcolor);
			$('.site-footer .footer-t .widget-title').css('color', widget_title);
			$('.site-footer .footer-t, .site-footer .footer-t .widget, .site-footer .footer-t .widget p, .site-footer .footer-t ul li, .site-footer .widget.widget_calendar table td').css('color', text);
			$('.site-footer .footer-t .widget a, .site-footer .footer-t .widget ul li a').css('color', link);
			$('.site-footer .footer-t .widget a:hover, .site-footer .footer-t .widget ul li a:hover').css('color', hover);			
		});				
	});	
	
	//Footer Copyright Area Multi Color
	wp.customize('munk_color_footer_copyright', function(control) {
		control.bind(function( controlValue ) {							
			var control_json = JSON.parse(controlValue);										
			var bgcolor = control_json['bgcolor'];
			var text = control_json['text'];			
			var link = control_json['link'];
			$('.site-footer .site-info').css('background-color', bgcolor);			
			$('.site-footer .site-info, .site-footer .site-info p').css('color', text);
			$('.site-footer .site-info a,  .site-footer .site-info a:hover,  .site-footer .site-info a:active').css('color', link);								
		});				
	});	
	
	//Button Multi Color
	wp.customize('munk_color_primary_button', function(control) {
		control.bind(function( controlValue ) {							
			var control_json = JSON.parse(controlValue);													
			var bgcolor = control_json['bgcolor'];
			var text = control_json['text'];									
			$('.button, #button, input[type="button"], input[type="submit"], .btn, .btn-primary, .woocommerce a.button, .woocommerce .added_to_cart, .woocommerce add_to_cart_button, .woocommerce button.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links .current, .entry-card .read-more a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current').css('cssText', 'background-color:' +bgcolor+ '!important;color:'+text+'!important');			
		});				
	});		
	
	//container width
	//default layout
	wp.customize('munk_layout_default_container_width', function(control) {
		control.bind(function( controlValue ) {						
			$('body.mt-container-default .container').css('max-width', controlValue +'px');	
		});				
	});	

	//boxed layout
	wp.customize('munk_layout_boxed_container_width', function(control) {
		control.bind(function( controlValue ) {						
			$('body.mt-container-boxed #page').css('max-width', controlValue +'px');	
		});				
	});	

	//boxed layout inner
	wp.customize('munk_layout_boxed_container_inner_width', function(control) {
		control.bind(function( controlValue ) {						
			$('body.mt-container-boxed .container').css('max-width', controlValue +'px');	
		});				
	});	

	//full width container layout
	wp.customize('munk_layout_contained_container_width', function(control) {
		control.bind(function( controlValue ) {						
			$('body.mt-container-fullwidth-contained .container').css('max-width', controlValue +'px');	
		});				
	});		
	
    
});