jQuery( document ).ready(function($) {	
				
	// Shop Color Settings Multi Color
	wp.customize('munk_color_shop_layout', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);						
			
			var shop_bg = control_json['shop-bg'];
			var shop_title = control_json['shop-title'];
			var shop_content = control_json['shop-content'];
			var shop_selectbg = control_json['shop-selectbg'];			
			var shop_selectcolor = control_json['shop-selectcolor'];			
			
			$('.woocommerce #primary .site-main').css('background-color', shop_bg);
			$('.woocommerce.archive h1.page-title').css('color', shop_title);
			$('.woocommerce p.woocommerce-result-count, .woocommerce .woocommerce-breadcrumb, .woocommerce .woocommerce-breadcrumb a').css('color', shop_content);
			$('.woocommerce .woocommerce-ordering select').css('background-color', shop_selectbg);
			$('.woocommerce .woocommerce-ordering select').css('color', shop_selectcolor);
		});				
	});
	
	// Products Cards Multi Color
	wp.customize('munk_color_product_card_ed', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);						
			
			var category = control_json['category'];
			var title = control_json['title'];
			var price = control_json['price'];
			var rating = control_json['rating'];						
						
			$('.woocommerce-page ul.products li.product .mt-woo-product-category p, .woocommerce ul.products li.product .mt-woo-product-category p').css('color', category);
			$('.woocommerce-page ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-product__title').css('color', title);
			$('.woocommerce-page ul.products li.product .price, .woocommerce ul.products li.product .price').css('color', price);
			$('.woocommerce .star-rating').css('color', rating);
			
		});				
	});	
	
	// Single Products Multi Color
	wp.customize('munk_color_single_product_ed', function(control) {
		control.bind(function( controlValue ) {				
			var control_json = JSON.parse(controlValue);						
			
			var title = control_json['title'];
			var content = control_json['content'];			
			var price = control_json['price'];			
						
			$('.woocommerce div.product .product_title, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .single-product .up-sells h2,  .single-product .related h2').css('color', title);
			
			$('.woocommerce.single-product #content div.product div.summary, .woocommerce.single-product div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary,  .woocommerce-page div.product div.summary p,  .woocommerce-page div.product div.summary, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs .panel p, .woocommerce div.product .woocommerce-tabs .panel h2, .woocommerce div.product form.cart .mt-qty-wrap .plus, .woocommerce div.product form.cart .mt-qty-wrap .minus, .woocommerce div.product form.cart div.quantity input, .woocommerce table.shop_attributes th, .woocommerce table.shop_attributes td, #review_form span, #review_form label,.woocommerce div.product .woocommerce-tabs ul.tabs li a, .single-product .product_meta, .single-product .product_meta span, .single-product .product_meta span a').css('color', content);
			
			$('.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page div.product div.summary p.price, #review_form #respond form p.stars a').css('color', price);						
		});				
	});	
	
	// Sale Badge Multi Color
	wp.customize('munk_color_sale_ed', function(control) {
		control.bind(function( controlValue ) {				
			
			var control_json = JSON.parse(controlValue);									
			var background = control_json['background'];
			var content = control_json['content'];		
			
			$('.woocommerce span.onsale,.wc-block-grid__product-onsale').css('background-color', background);
			$('.woocommerce span.onsale,.wc-block-grid__product-onsale').css('color', content);			
		});				
	});		
    
});