jQuery( document ).ready(function($) {
	"use strict";        
    
    /* Responsive Control Toggle */
    $('.munk-responsive-controls button').on('click', function (event) {
        
        jQuery('.munk-responsive-controls li').removeClass('active');
        jQuery(this).parent().addClass('active');
        
        var device = jQuery(this).attr('data-device');
        //console.log(parent_li);           
        jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
    });
    

    jQuery(' .wp-full-overlay-footer .devices button ').on('click', function () {

        var device = jQuery(this).attr('data-device');

        jQuery('.customize-control .munk-responsive-controls .munk-cz-devices li').removeClass('active');
        jQuery('.customize-control .munk-responsive-controls .munk-cz-devices li.' + device).addClass('active');
    });    
    
    
	/**
	 * Dimensions Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */    
     
	$('.munk-dimensions-control .dimensions input[type=text]').on('keyup', function() {
		munkGetAllDimensions($(this).parent().parent().parent());
	});              

	function munkGetAllDimensions($element) {
		
		var selectedDimensions = {   				
				top : { 
					desktop: $element.find('.dimension-top-desktop').val(), 
					tablet: $element.find('.dimension-top-tablet').val(), 
					mobile: $element.find('.dimension-top-mobile').val(), 
				},				
				right : { 
					desktop: $element.find('.dimension-right-desktop').val(), 
					tablet: $element.find('.dimension-right-tablet').val(), 
					mobile: $element.find('.dimension-right-mobile').val(), 
				},
				bottom : { 
					desktop: $element.find('.dimension-bottom-desktop').val(), 
					tablet: $element.find('.dimension-bottom-tablet').val(), 
					mobile: $element.find('.dimension-bottom-mobile').val(), 
				},
				left : { 
					desktop: $element.find('.dimension-left-desktop').val(), 
					tablet: $element.find('.dimension-left-tablet').val(), 
					mobile: $element.find('.dimension-left-mobile').val(), 
				},								
		};    					
		
		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-dimensions-input').val(JSON.stringify(selectedDimensions)).trigger('change');
	}    	

	/**
	 * Slider Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	// Set our slider defaults and initialise the slider
	$('.slider-custom-control').each(function(){
		var sliderValue = $(this).find('.customize-control-slider-value').val();
		var newSlider = $(this).find('.slider');
		var sliderMinValue = parseFloat(newSlider.attr('slider-min-value'));
		var sliderMaxValue = parseFloat(newSlider.attr('slider-max-value'));
		var sliderStepValue = parseFloat(newSlider.attr('slider-step-value'));

		newSlider.slider({
			value: sliderValue,
			min: sliderMinValue,
			max: sliderMaxValue,
			step: sliderStepValue,
			change: function(e,ui){
				// Important! When slider stops moving make sure to trigger change event so Customizer knows it has to save the field
				$(this).parent().find('.customize-control-slider-value').trigger('change');
	      }
		});
	});

	// Change the value of the input field as the slider is moved
	$('.slider').on('slide', function(event, ui) {
		$(this).parent().find('.customize-control-slider-value').val(ui.value);
	});

	// Reset slider and input field back to the default value
	$('.slider-reset').on('click', function() {
		var resetValue = $(this).attr('slider-reset-value');
		$(this).parent().find('.customize-control-slider-value').val(resetValue);
		$(this).parent().find('.slider').slider('value', resetValue);
	});

	// Update slider if the input field loses focus as it's most likely changed
	$('.customize-control-slider-value').blur(function() {
		var resetValue = $(this).val();
		var slider = $(this).parent().find('.slider');
		var sliderMinValue = parseInt(slider.attr('slider-min-value'));
		var sliderMaxValue = parseInt(slider.attr('slider-max-value'));

		// Make sure our manual input value doesn't exceed the minimum & maxmium values
		if(resetValue < sliderMinValue) {
			resetValue = sliderMinValue;
			$(this).val(resetValue);
		}
		if(resetValue > sliderMaxValue) {
			resetValue = sliderMaxValue;
			$(this).val(resetValue);
		}
		$(this).parent().find('.slider').slider('value', resetValue);
	});	

	/**
	 * Pill Checkbox Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	$( ".pill_checkbox_control .sortable" ).sortable({
		placeholder: "pill-ui-state-highlight",
		update: function( event, ui ) {
			munkGetAllPillCheckboxes($(this).parent());
		}
	});

	$('.pill_checkbox_control .sortable-pill-checkbox').on('change', function () {
		munkGetAllPillCheckboxes($(this).parent().parent().parent());
	});

	// Get the values from the checkboxes and add to our hidden field
	function munkGetAllPillCheckboxes($element) {
		var inputValues = $element.find('.sortable-pill-checkbox').map(function() {
			if( $(this).is(':checked') ) {
				return $(this).val();
			}
		}).toArray();
		$element.find('.customize-control-sortable-pill-checkbox').val(inputValues).trigger('change');
	}

	/**
	 * Googe Font Select Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	$('.google-fonts-list').each(function (i, obj) {
		if (!$(obj).hasClass('select2-hidden-accessible')) {
			$(obj).select2();
		}
	});
    
	$('.google_fonts_select_control .google-fonts-text-transform').each(function (i, obj) {
		if (!$(obj).hasClass('select2-hidden-accessible')) {
			$(obj).select2();
		}
	});   
    
	$('.google_fonts_select_control .google-fonts-text-align').each(function (i, obj) {
		if (!$(obj).hasClass('select2-hidden-accessible')) {
			$(obj).select2();
		}
	});       

    $('.munk-font-preview').on('click', function() {                                        
        $(this).toggleClass('opened');
        var modalwin = $(this).attr('data-id');
        $('.' + modalwin).toggleClass('box-show');        
    });
    
	$('.google-fonts-list').on('change', function() {
		var elementRegularWeight = $(this).parent().parent().find('.google-fonts-regularweight-style');
		var elementItalicWeight = $(this).parent().parent().find('.google-fonts-italicweight-style');
		var elementBoldWeight = $(this).parent().parent().find('.google-fonts-boldweight-style');
		var selectedFont = $(this).val();
		var customizerControlName = $(this).attr('control-name');
		var elementItalicWeightCount = 0;
		var elementBoldWeightCount = 0;

		// Clear Weight/Style dropdowns
		elementRegularWeight.empty();
		elementItalicWeight.empty();
		elementBoldWeight.empty();
		// Make sure Italic & Bold dropdowns are enabled
		elementItalicWeight.prop('disabled', false);
		elementBoldWeight.prop('disabled', false);

		// Get the Google Fonts control object
		var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

		// Find the index of the selected font
		var indexes = $.map(bodyfontcontrol.munkfontslist, function(obj, index) {
			if(obj.family === selectedFont) {
				return index;
			}
		});
		var index = indexes[0];

		// For the selected Google font show the available weight/style variants
		$.each(bodyfontcontrol.munkfontslist[index].variants, function(val, text) {
			elementRegularWeight.append(
				$('<option></option>').val(text).html(text)
			);
			if (text.indexOf("italic") >= 0) {
				elementItalicWeight.append(
					$('<option></option>').val(text).html(text)
				);
				elementItalicWeightCount++;
			} else {
				elementBoldWeight.append(
					$('<option></option>').val(text).html(text)
				);
				elementBoldWeightCount++;
			}
		});

		if(elementItalicWeightCount == 0) {
			elementItalicWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
			);
			elementItalicWeight.prop('disabled', 'disabled');
		}
		if(elementBoldWeightCount == 0) {
			elementBoldWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
			);
			elementBoldWeight.prop('disabled', 'disabled');
		}

		// Update the font category based on the selected font
		$(this).parent().parent().find('.google-fonts-category').val(bodyfontcontrol.munkfontslist[index].category);

		munkGetAllSelects($(this).parent().parent());
	});

	$('.google_fonts_select_control select').on('change', function() {
		munkGetAllSelects($(this).parent().parent().parent());
	});  
	$('.google_fonts_select_control input[type=text]').on('keyup', function() {
		munkGetAllSelects($(this).parent().parent().parent());
	});      
    
    //set font family in previwer
	$('.google_fonts_select_control select.google-fonts-list').on('change', function() {		                
        var modal_id = $(this).parent().parent().attr('data-modal');        
        var font_val = $(this).children("option:selected").val();        
        $('.munk-font-preview[data-id=' +modal_id+ '] span.font-family').text(font_val);                                      
	});       
    
    // set weight variant in previwer
	$('.google_fonts_select_control select.google-fonts-regularweight-style').on('change', function() {		                
        var modal_id = $(this).parent().parent().attr('data-modal');        
        var font_val = $(this).children("option:selected").val();        
        $('.munk-font-preview[data-id=' +modal_id+ '] span.font-weight').text(font_val);                                      
	});       
    
    //set font size in previewer
	$('.google_fonts_select_control input.google-fonts-font-size-desktop').on('change', function() {		                
        var modal_id = $(this).parent().parent().parent().attr('data-modal');        
        var font_val = $(this).val();        
        $('.munk-font-preview[data-id=' +modal_id+ '] span.font-size-desktop').text(font_val);                                      
	});  
    
    //set font size in previewer
	$('.google_fonts_select_control input.google-fonts-font-size-tablet').on('change', function() {		                
        var modal_id = $(this).parent().parent().parent().attr('data-modal');        
        var font_val = $(this).val();        
        $('.munk-font-preview[data-id=' +modal_id+ '] span.font-size-tablet').text(font_val);                                      
	});  
    
    //set font size in previewer
	$('.google_fonts_select_control input.google-fonts-font-size-mobile').on('change', function() {		                
        var modal_id = $(this).parent().parent().parent().attr('data-modal');        
        var font_val = $(this).val();        
        $('.munk-font-preview[data-id=' +modal_id+ '] span.font-size-mobile').text(font_val);                                      
	});      
    

	function munkGetAllSelects($element) {
		var selectedFont = {            
			font: $element.find('.google-fonts-list').val(),
			variant: $element.find('.google-fonts-regularweight-style').val(),            
            
			fontsize_desktop: $element.find('.google-fonts-font-size-desktop').val(),
            fontsize_tablet: $element.find('.google-fonts-font-size-tablet').val(),
            fontsize_mobile: $element.find('.google-fonts-font-size-mobile').val(), 
            
            lineheight_desktop: $element.find('.google-fonts-line-height-desktop').val(),
            lineheight_tablet: $element.find('.google-fonts-line-height-tablet').val(),
            lineheight_mobile: $element.find('.google-fonts-line-height-mobile').val(),            
            
            texttransform_desktop: $element.find('.google-fonts-text-transform-desktop').val(),
            texttransform_tablet: $element.find('.google-fonts-text-transform-tablet').val(),
            texttransform_mobile: $element.find('.google-fonts-text-transform-mobile').val(),            
            
            textalign_desktop: $element.find('.google-fonts-text-align-desktop').val(),
            textalign_tablet: $element.find('.google-fonts-text-align-tablet').val(),
            textalign_mobile: $element.find('.google-fonts-text-align-mobile').val(),
		};            

		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
	}  

	/**
 	 * Alpha Color Picker Custom Control
 	 *
 	 * @author Braad Martin <http://braadmartin.com>
 	 * @license http://www.gnu.org/licenses/gpl-3.0.html
 	 * @link https://github.com/BraadMartin/components/tree/master/customizer/alpha-color-picker
 	 */

	// Loop over each control and transform it into our color picker.
	$( '.alpha-color-control' ).each( function() {

		// Scope the vars.
		var $control, startingColor, paletteInput, showOpacity, defaultColor, palette,
			colorPickerOptions, $container, $alphaSlider, alphaVal, sliderOptions;

		// Store the control instance.
		$control = $( this );

		// Get a clean starting value for the option.
		startingColor = $control.val().replace( /\s+/g, '' );

		// Get some data off the control.
		paletteInput = $control.attr( 'data-palette' );
		showOpacity  = $control.attr( 'data-show-opacity' );
		defaultColor = $control.attr( 'data-default-color' );

		// Process the palette.
		if ( paletteInput.indexOf( '|' ) !== -1 ) {
			palette = paletteInput.split( '|' );
		} else if ( 'false' == paletteInput ) {
			palette = false;
		} else {
			palette = true;
		}

		// Set up the options that we'll pass to wpColorPicker().
		colorPickerOptions = {
			change: function( event, ui ) {
				var key, value, alpha, $transparency;

				key = $control.attr( 'data-customize-setting-link' );
				value = $control.wpColorPicker( 'color' );

				// Set the opacity value on the slider handle when the default color button is clicked.
				if ( defaultColor == value ) {
					alpha = acp_get_alpha_value_from_color( value );
					$alphaSlider.find( '.ui-slider-handle' ).text( alpha );
				}

				// Send ajax request to wp.customize to trigger the Save action.
				wp.customize( key, function( obj ) {
					obj.set( value );
				});

				$transparency = $container.find( '.transparency' );

				// Always show the background color of the opacity slider at 100% opacity.
				$transparency.css( 'background-color', ui.color.toString( 'no-alpha' ) );
			},
			palettes: palette // Use the passed in palette.
		};

		// Create the colorpicker.
		$control.wpColorPicker( colorPickerOptions );

		$container = $control.parents( '.wp-picker-container:first' );

		// Insert our opacity slider.
		$( '<div class="alpha-color-picker-container">' +
				'<div class="min-click-zone click-zone"></div>' +
				'<div class="max-click-zone click-zone"></div>' +
				'<div class="alpha-slider"></div>' +
				'<div class="transparency"></div>' +
			'</div>' ).appendTo( $container.find( '.wp-picker-holder' ) );

		$alphaSlider = $container.find( '.alpha-slider' );

		// If starting value is in format RGBa, grab the alpha channel.
		alphaVal = acp_get_alpha_value_from_color( startingColor );

		// Set up jQuery UI slider() options.
		sliderOptions = {
			create: function( event, ui ) {
				var value = $( this ).slider( 'value' );

				// Set up initial values.
				$( this ).find( '.ui-slider-handle' ).text( value );
				$( this ).siblings( '.transparency ').css( 'background-color', startingColor );
			},
			value: alphaVal,
			range: 'max',
			step: 1,
			min: 0,
			max: 100,
			animate: 300
		};

		// Initialize jQuery UI slider with our options.
		$alphaSlider.slider( sliderOptions );

		// Maybe show the opacity on the handle.
		if ( 'true' == showOpacity ) {
			$alphaSlider.find( '.ui-slider-handle' ).addClass( 'show-opacity' );
		}

		// Bind event handlers for the click zones.
		$container.find( '.min-click-zone' ).on( 'click', function() {
			acp_update_alpha_value_on_color_control( 0, $control, $alphaSlider, true );
		});
		$container.find( '.max-click-zone' ).on( 'click', function() {
			acp_update_alpha_value_on_color_control( 100, $control, $alphaSlider, true );
		});

		// Bind event handler for clicking on a palette color.
		$container.find( '.iris-palette' ).on( 'click', function() {
			var color, alpha;

			color = $( this ).css( 'background-color' );
			alpha = acp_get_alpha_value_from_color( color );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );

			// Sometimes Iris doesn't set a perfect background-color on the palette,
			// for example rgba(20, 80, 100, 0.3) becomes rgba(20, 80, 100, 0.298039).
			// To compensante for this we round the opacity value on RGBa colors here
			// and save it a second time to the color picker object.
			if ( alpha != 100 ) {
				color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
			}

			$control.wpColorPicker( 'color', color );
		});

		// Bind event handler for clicking on the 'Clear' button.
		$container.find( '.button.wp-picker-clear' ).on( 'click', function() {
			var key = $control.attr( 'data-customize-setting-link' );

			// The #fff color is delibrate here. This sets the color picker to white instead of the
			// defult black, which puts the color picker in a better place to visually represent empty.
			$control.wpColorPicker( 'color', '#ffffff' );

			// Set the actual option value to empty string.
			wp.customize( key, function( obj ) {
				obj.set( '' );
			});

			acp_update_alpha_value_on_alpha_slider( 100, $alphaSlider );
		});

		// Bind event handler for clicking on the 'Default' button.
		$container.find( '.button.wp-picker-default' ).on( 'click', function() {
			var alpha = acp_get_alpha_value_from_color( defaultColor );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
		});

		// Bind event handler for typing or pasting into the input.
		$control.on( 'input', function() {
			var value = $( this ).val();
			var alpha = acp_get_alpha_value_from_color( value );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
		});

		// Update all the things when the slider is interacted with.
		$alphaSlider.slider().on( 'slide', function( event, ui ) {
			var alpha = parseFloat( ui.value ) / 100.0;

			acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, false );

			// Change value shown on slider handle.
			$( this ).find( '.ui-slider-handle' ).text( ui.value );
		});

	});

	/**
	 * Given an RGBa, RGB, or hex color value, return the alpha channel value.
	 */
	function acp_get_alpha_value_from_color( value ) {
		var alphaVal;

		// Remove all spaces from the passed in value to help our RGBa regex.
		value = value.replace( / /g, '' );

		if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
			alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed(2) * 100;
			alphaVal = parseInt( alphaVal );
		} else {
			alphaVal = 100;
		}

		return alphaVal;
	}

	/**
	 * Force update the alpha value of the color picker object and maybe the alpha slider.
	 */
	 function acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, update_slider ) {
		var iris, colorPicker, color;

		iris = $control.data( 'a8cIris' );
		colorPicker = $control.data( 'wpWpColorPicker' );

		// Set the alpha value on the Iris object.
		iris._color._alpha = alpha;

		// Store the new color value.
		color = iris._color.toString();

		// Set the value of the input.
		$control.val( color );

		// Update the background color of the color picker.
		colorPicker.toggler.css({
			'background-color': color
		});

		// Maybe update the alpha slider itself.
		if ( update_slider ) {
			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
		}

		// Update the color value of the color picker object.
		$control.wpColorPicker( 'color', color );
	}

	/**
	 * Update the slider handle position and label.
	 */
	function acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider ) {
		$alphaSlider.slider( 'value', alpha );
		$alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
	}

});


( function( $, api ) {

	api.controlConstructor['toggle_switch'] = api.Control.extend( {

		ready: function() {
			var control = this;

			this.container.on( 'change', 'input:checkbox', function() {
				value = this.checked ? true : false;
				control.setting.set( value );
			} );
		}
   
	} );

} )( jQuery, wp.customize );


/**
 * WP ColorPicker Alpha Color Picker Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 */
( function( $, api ) {

	api.controlConstructor['multi_color'] = api.Control.extend( {

		ready: function() {
			var control = this;
			var parent = control.selector;
			var linked_input = control.id;			

			var default_arr_raw = $(parent).find('[name=' +linked_input+ ']').val();         
			var default_arr = JSON.parse(default_arr_raw);      			

			$(parent + ' .wpcolorpicker-alpha-color-picker').wpColorPicker({
			  change: function(event, ui){ 

				$('.color-unit-wrapper').each(function (i, obj) {            
					var data_label  = $(this).find('label.color_label').text();
					$(this).find('span.wp-color-result-text').text(data_label);            
				}); 				  

				var this_key = $(this).attr('data-key');              				
				var this_key_color = ui.color.toString();  
				default_arr[this_key] = this_key_color;                                                                
				$('.wpcolorpicker_alpha_color_control').find($('[data-id="'+linked_input+'"]')).val(JSON.stringify(default_arr)).trigger('change');              

			  } 
			}); 



		}

	} );

} )( jQuery, wp.customize );