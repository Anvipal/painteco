jQuery(document).ready(function(){

	if(jQuery(".hg_gmaps_save_api_key_button").length){
		jQuery(".hg_gmaps_save_api_key_button").on('click',function(){
			var _this = jQuery(this);
			var key = jQuery(this).closest("form").find(".hg_gmaps_api_key_input").val();
			console.log(key);
			if(key != undefined && key != ""){
				var data = {
					action : 'hg_gmaps_save_api_key',
					hg_gmaps_nonce: ajax_object.hg_gmaps_nonce,
					api_key: key
				};

				jQuery.ajax({
					url: ajax_object.ajax_url,
					type: 'post',
					data: data,
					dataType: 'json',
					beforeSend: function (xhr) {
						jQuery(this).attr("disabled", true);
						_this.parent().find(".spinner").css("visibility","visible");
					},
					success: function (result) {
						if(result.success){
							setTimeout(function(){
								var successNotice = "<div id='hg_gmaps_api_key_success' class='notice notice-success is-dismissible'>" +
									"<p class='hg_mui_heading'>GOOGLE API KEY SAVED SUCCESSFULLY!</p>" +
									"<button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button>" +
									"</div>";
								if(jQuery("#hg_gmaps_no_api_key_big_notice").length){
									jQuery("#hg_gmaps_no_api_key_big_notice").replaceWith(successNotice);
								}else if(jQuery(".free_version_banner").length){
									jQuery(".free_version_banner").after(successNotice);
								}else if(jQuery("#screen-meta").length){
									jQuery("#screen-meta").after(successNotice);
								}else {
									jQuery("#wpbody-content").prepend(successNotice);
								}
								jQuery("#hg_gmaps_api_key_success .notice-dismiss").on("click",function(){
									jQuery(this).parent().remove();
								});
								var form = _this.closest("form");
								if(form.hasClass("hg_gmaps_main_api_form")){
									form.find("button").css("visibility","hidden");
									form.find(".spinner").css("visibility","hidden");
								}

								if(jQuery(".hg_gmaps_main_api_form").length && jQuery(".hg_gmaps_main_api_form").hasClass("hide")){
									jQuery(".hg_gmaps_main_api_form").removeClass("hide");
									jQuery(".hg_gmaps_main_api_form .hg_gmaps_api_key_input").val(key);
								}

							},1500);

						}
					},
					error: function () {
						ecwp.pageLoaded();
					}
				})
			}
			return false;
		});
	}

	jQuery(".hg_gmaps_main_api_form .hg_gmaps_api_key_input").on("keyup",function(){
		if(jQuery(this).val() != ""){
			jQuery(this).closest("form").find("button").css("visibility","visible");
		}
	});
    
            if(jQuery('.g_map').length){
		var el = jQuery('.g_map');
		var elpos_original = el.offset().top;
		jQuery(window).scroll(function(){
			var elpos = el.offset().top;
			var windowpos = jQuery(window).scrollTop();
			var finaldestination = windowpos;
			if(windowpos<elpos_original) {
				finaldestination = elpos_original;
				el.stop().css({'top':3});
			} else {
				el.stop().animate({'top':finaldestination-elpos_original+40},500);
			}
		});
            }
		
		
		jQuery('.help').hover(function(){
			   jQuery(this).parent().find('.help-block').removeClass('active');
			   var width=jQuery(this).parent().find('.help-block').outerWidth();
				jQuery(this).parent().find('.help-block').addClass('active').css({'left':-((width /2)-10)});
			},function() {
				jQuery(this).parent().find('.help-block').removeClass('active');
		});
	
		var updated_div = jQuery(".updated");
		var nag_div=jQuery(".update-nag");
			setInterval(function(){
				updated_div.hide(100);
				nag_div.hide(100);
			},1000)
		// TAB NAVIGATION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*********************************************************************************************************
		jQuery(".editing_heading").on('click',function(){
			if(jQuery(this).parent().hasClass("active_option_tab")){
				var active = jQuery(this).parent().parent().find(".active_option_tab");
				active.find(".tab_options_hidden_section").css({display:"block"});
				active.find(".tab_options_active_section").css({display:"none"});
				jQuery(this).find(".heading_arrow").html("▼");
				jQuery(this).parent().removeClass("active_option_tab");
				jQuery("#g_map_canvas").trigger("resize");
				var parent = jQuery(this).parent();
				var content = parent.find(".edit_content");
				content.slideUp(200);
				jQuery("#g_maps > div").addClass("hide");
				
				jQuery("#g_map_canvas").removeClass("hide");
			}
			else{
				jQuery(this).find(".heading_arrow").html("▲");
				var active = jQuery(this).parent().parent().find(".active_option_tab");
				active.find(".edit_content").slideUp(200);
				active.find(".heading_arrow").html("▼");
				active.removeClass("active_option_tab");
				active.find(".tab_options_hidden_section").css({display:"block"});
				active.find(".tab_options_active_section").css({display:"none"});
				jQuery(".marker_image_choose ul li.active").removeClass("active");
				jQuery("#g_map_canvas").trigger("resize");
				jQuery(this).parent().addClass("active_option_tab");
				var parent = jQuery(this).parent();
				var content = parent.find(".edit_content");
				content.slideDown(200);
				jQuery("#g_maps > div").addClass("hide");
				jQuery("#g_map_canvas").removeClass("hide");
			}
			jQuery('html, body').animate({scrollTop:0}, 250);
		});
		

		
		jQuery("#marker_add_button").on("click",function(e){
			jQuery(this).hide("fast").addClass("tab_options_hidden_section");
			jQuery("#g_maps > div").not("#g_map_marker").addClass("hide");
			jQuery("#g_map_marker").removeClass("hide");
			jQuery("#markers_edit_exist_section").hide(200).addClass("tab_options_hidden_section");
			jQuery(".update_marker_list_item").hide(200).addClass("tab_options_hidden_section");
			jQuery("#g_map_marker_options .hidden_edit_content").show(200).addClass("tab_options_active_section");
			//
			
			return false;
		})
		
		jQuery("#cancel_marker, #back_marker").on("click", function(e){
				jQuery("#marker_add_button").show(200);
				jQuery("#g_maps > div").not("#g_map_canvas").addClass("hide");
				jQuery("#g_map_canvas").removeClass("hide");
				jQuery("#markers_edit_exist_section").show(200);
				jQuery(".update_marker_list_item").show(200);
				jQuery(".marker_image_choose ul li.active").removeClass("active");
				jQuery("#g_map_marker_options .hidden_edit_content").hide(200);
				jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#cancel_edit_marker, #back_edit_marker").on("click",function(){
			jQuery("#marker_add_button").show(200);
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery(".marker_image_choose ul li.active").removeClass("active");
			jQuery("#markers_edit_exist_section").show(200);
			jQuery(this).parentsUntil(".editing_section").find(".update_list_item").hide(200);
			jQuery("#marker_add_button").show(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#cancel_polygone, #back_polygone").on("click",function(e){
			jQuery("#polygon_add_button").show(200);
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#polygone_edit_exist_section").show(200);
			jQuery("#g_map_polygone_options .hidden_edit_content").hide(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#cancel_edit_polygone, #back_edit_polygone").on("click",function(e){
			jQuery(".edit_polygone_list_delete a").show(200);
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#polygone_edit_exist_section").show(200);
			jQuery(this).parent().parent().parent().parent().parent().find(".update_list_item").hide(200);
			jQuery("#polygon_add_button").show(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		jQuery("#polygon_add_button").on('click',function(e){
			jQuery(this).hide(100).addClass("tab_options_hidden_section");
			jQuery("#g_maps > div").not("#g_map_polygon").addClass("hide");
			jQuery("#g_map_polygon").removeClass("hide");
			jQuery("#polygone_edit_exist_section").hide(200).addClass("tab_options_hidden_section");
			jQuery("#g_map_polygone_options .hidden_edit_content").show(200).addClass("tab_options_active_section");
			var center_lat = jQuery("#map_center_lat").val();
			var center_lng = jQuery("#map_center_lng").val();
			jQuery("#polygone_coords").val("");
			return false;
		})
		
		jQuery("#cancel_polyline, #back_polyline").on("click",function(e){
			jQuery("#polyline_add_button").show(200);
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#polyline_edit_exist_section").show(200);
			jQuery("#g_map_polyline_options .hidden_edit_content").hide(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#cancel_edit_polyline, #back_edit_polyline").on("click",function(e){
			jQuery(".edit_polyline_list_delete a").show(200);
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#polyline_edit_exist_section").show(200);
			jQuery(this).parent().parent().parent().parent().parent().find(".update_list_item").hide(200);
			jQuery("#polyline_add_button").show(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#polyline_add_button").on('click',function(e){
			jQuery(this).hide("fast").addClass("tab_options_hidden_section");
			jQuery("#g_maps > div").not("#g_map_polygon").addClass("hide");
			jQuery("#g_map_polyline").removeClass("hide");
			jQuery("#polyline_edit_exist_section").hide(200).addClass("tab_options_hidden_section");
			jQuery("#g_map_polyline_options .hidden_edit_content").show(200).addClass("tab_options_active_section");
			jQuery("#polyline_coords").val("");
			return false;
		})
		
		jQuery("#cancel_circle, #back_circle").on("click",function(e){
			jQuery("#circle_add_button").show("fast");
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#circle_edit_exist_section").show(200);
			jQuery("#g_map_circle_options .hidden_edit_content").hide(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
			return false;
		})
		
		jQuery("#cancel_edit_circle, #back_edit_circle").on("click",function(e){
			jQuery("#g_maps > div").not("#g_map_polygon").addClass("hide");
			jQuery("#g_map_canvas").removeClass("hide");
			jQuery("#circle_edit_exist_section").show(200);
			jQuery(this).parent().parent().parent().parent().parent().find(".update_list_item").hide(200);
			jQuery("#circle_add_button").show(200);
			jQuery('html, body').animate({scrollTop:0}, 250);
		})
		
		jQuery("#circle_add_button").on("click",function(e){
			jQuery(this).hide("fast").addClass("tab_options_hidden_section");
			jQuery("#g_maps > div").addClass("hide");
			jQuery("#g_map_circle").removeClass("hide");
			jQuery("#circle_edit_exist_section").hide(200).addClass("tab_options_hidden_section");
			jQuery("#g_map_circle_options .hidden_edit_content").show(200).addClass("tab_options_active_section");
			return false;
		})
		
		
		jQuery(".marker_image_choose_button").on("click",function(){
			jQuery(this).parent().parent().find(".active").removeClass("active");
			jQuery(this).parent().addClass("active");
		})
		
		jQuery(".front_end_input_options").on("keyup change",function(){
			var width = parseInt(jQuery("#map_width").val())/2;
			var height = jQuery("#map_height").val();
			var border_radius = jQuery("#map_border_radius").val();
			jQuery(".g_map").css({width:width+"%", height:height+"px", borderRadius:border_radius+"px"})
		})
		
})
