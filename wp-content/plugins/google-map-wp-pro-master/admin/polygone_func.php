<?php
function polygone_js( $id ) {
	global $wpdb;
	$sql = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "g_maps WHERE id=%s", $id );
	$map = $wpdb->get_results( $sql );
	foreach ( $map as $map ) {
		?>
		<script>
			var data, polygonedit, geocoder, newpolygon
			var polygone = [];
			var polygonmarker = [];
			var i = 0;
			var newpolygoncoords = [];
			var polygoneditmarker = [];
			var polygoneditcoords = [];

			jQuery(document).ready(function () {

				loadPolygonMap("<?php echo $map->id; ?>", "#<?php echo $map->styling_hue; ?>", "<?php echo $map->styling_saturation; ?>", "<?php echo $map->styling_lightness; ?>", "<?php echo $map->styling_gamma; ?>", "<?php echo $map->zoom; ?>", "<?php echo $map->type; ?>", "<?php echo $map->bike_layer; ?>", "<?php echo $map->traffic_layer; ?>", "<?php echo $map->transit_layer; ?>");


			})
			function loadPolygonMap(id, hue, saturation, lightness, gamma, zoom, type, bike, traffic, transit) {
				data = {
					action: 'g_map_options',
					map_id: id,
					task: "ajax",
				}
				jQuery.ajax({
					url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
					dataType: 'json',
					method: 'post',
					data: data,
					beforeSend: function () {
					}
				}).done(function (response) {
					HGinitializePolygonMap(response);
				}).fail(function () {
					console.log('Failed to load response from database');
				});
				function HGinitializePolygonMap(response) {
					if (response.success) {
						var mapInfo = response.success;
						var maps = mapInfo.maps;
						for (var i = 0; i < maps.length; i++) {
							var trafficLayer = new google.maps.TrafficLayer();
							var trafficLayer1 = new google.maps.TrafficLayer();
							var bikeLayer = new google.maps.BicyclingLayer();
							var bikeLayer1 = new google.maps.BicyclingLayer();
							var transitLayer = new google.maps.TransitLayer();
							var transitLayer1 = new google.maps.TransitLayer();
							var mapcenter = new google.maps.LatLng(
								parseFloat(maps[i].center_lat),
								parseFloat(maps[i].center_lng));
							var styles = [
								{
									stylers: [
										{hue: hue},
										{saturation: saturation},
										{lightness: lightness},
										{gamma: gamma},
									]
								}
							]

							var mapOptions = {
								zoom: parseInt(zoom),
								center: mapcenter,
								styles: styles,
							}
							mappolygone = new google.maps.Map(document.getElementById('g_map_polygon'), mapOptions);
							map_polygone_edit = new google.maps.Map(document.getElementById('g_map_polygone_edit'), mapOptions);

							jQuery("#polygon_add_button").on("click", function () {
								google.maps.event.trigger(mappolygone, 'resize');
								mappolygone.setCenter(mapcenter);
								if (newpolygon) {
									newpolygon.setMap(null);

									newpolygoncoords = [];
									for (var i = 0; i < polygonmarker.length; i++) {
										polygonmarker[i].setMap(null);
									}
									polygonmarker = [];
								}
							})

							if (type == "ROADMAP") {
								mappolygone.setOptions({mapTypeId: google.maps.MapTypeId.ROADMAP})
								map_polygone_edit.setOptions({mapTypeId: google.maps.MapTypeId.ROADMAP})
							}
							if (type == "SATELLITE") {
								mappolygone.setOptions({mapTypeId: google.maps.MapTypeId.SATELLITE});
								map_polygone_edit.setOptions({mapTypeId: google.maps.MapTypeId.SATELLITE});
							}
							if (type == "HYBRID") {
								mappolygone.setOptions({mapTypeId: google.maps.MapTypeId.HYBRID});
								map_polygone_edit.setOptions({mapTypeId: google.maps.MapTypeId.HYBRID});
							}
							if (type == "TERRAIN") {
								mappolygone.setOptions({mapTypeId: google.maps.MapTypeId.TERRAIN});
								map_polygone_edit.setOptions({mapTypeId: google.maps.MapTypeId.TERRAIN});
							}

							if (bike == "true") {
								bikeLayer.setMap(mappolygone);
								bikeLayer1.setMap(map_polygone_edit);
							}
							if (traffic == "true") {
								trafficLayer.setMap(mappolygone);
								trafficLayer1.setMap(map_polygone_edit);
							}
							if (transit == "true") {
								transitLayer.setMap(mappolygone);
								transitLayer1.setMap(map_polygone_edit);
							}

							google.maps.event.addListener(mappolygone, 'rightclick', function (event) {
								placePolygone(event.latLng);
								updatePolygoneInputs(event.latLng);
							});

							jQuery(".polygone_options_input").on("keyup change", function () {
								var polygone_line_color = "#" + jQuery('#polygone_line_color').val();
								var polygone_line_opacity = jQuery('#polygone_line_opacity').val();
								var polygone_fill_color = "#" + jQuery('#polygone_fill_color').val();
								var polygone_fill_opacity = jQuery('#polygone_fill_opacity').val();
								var polygone_line_width = jQuery('#polygone_line_width').val();
								if (newpolygon) {
									newpolygon.setOptions({
										strokeColor: polygone_line_color,
										strokeWeight: polygone_line_width,
										strokeOpacity: polygone_line_opacity,
										fillOpacity: polygone_fill_opacity,
										fillColor: polygone_fill_color,
									});
								}
							})


							jQuery(".edit_polygone_list_delete a").on("click", function () {
								if (polygonedit) {
									polygonedit.setMap(null);
									for (var i = 0; i < polygoneditmarker.length; i++) {
										polygoneditmarker[i].setMap(null);
									}
									polygoneditmarker = [];
									polygoneditcoords = [];
								}
								var parent = jQuery(this).parent();
								var idelement = parent.find(".polygone_edit_id");
								var polygoneid = idelement.val();
								jQuery("#g_maps > div").addClass("hide");
								jQuery("#g_map_polygone_edit").removeClass("hide");
								jQuery("#polygone_edit_exist_section").hide(200).addClass("tab_options_hidden_section");
								jQuery(this).parent().parent().parent().parent().parent().find(".update_list_item").show(200).addClass("tab_options_active_section");
								jQuery("#polygon_add_button").hide(200).addClass("tab_options_hidden_section");
								google.maps.event.trigger(map_polygone_edit, 'resize');

								jQuery("#polygone_get_id").val(polygoneid);
								var polygones = mapInfo.polygons;
								for (var e = 0; e < polygones.length; e++) {
									var id = polygones[e].id;
									if (polygoneid == id) {
										var name = polygones[e].name;
										var line_opacity = polygones[e].line_opacity;
										var line_color = polygones[e].line_color;
										var fill_opacity = polygones[e].fill_opacity;
										var fill_color = polygones[e].fill_color;
										var line_width = polygones[e].line_width;
										var hover_line_opacity = polygones[e].hover_line_opacity;
										var hover_line_color = polygones[e].hover_line_color;
										var hover_fill_opacity = polygones[e].hover_fill_opacity;
										var hover_fill_color = polygones[e].hover_fill_color;
										var url = polygones[e].url;

										var latlngs = polygones[e].latlng;

										jQuery("#polygone_edit_url").val(url);

										jQuery("#polygone_edit_name").val(name);

										jQuery("#polygone_edit_line_opacity").simpleSlider("setValue", line_opacity);

										jQuery("#polygone_edit_line_color").val(line_color);

										jQuery("#polygone_edit_line_width").simpleSlider("setValue", line_width);

										jQuery("#polygone_edit_fill_opacity").simpleSlider("setValue", fill_opacity);

										jQuery("#polygone_edit_fill_color").val(fill_color);

										jQuery("#hover_polygone_edit_line_opacity").simpleSlider("setValue", hover_line_opacity);

										jQuery("#hover_polygone_edit_line_color").val(hover_line_color);

										jQuery("#hover_polygone_edit_fill_opacity").simpleSlider("setValue", hover_fill_opacity);

										jQuery("#hover_polygone_edit_fill_color").val(hover_fill_color);
										for (var j = 0; j < latlngs.length; j++) {
											var lat = latlngs[j].lat;
											var lng = latlngs[j].lng;
											var polygoneditpoint = new google.maps.LatLng(parseFloat(latlngs[j].lat),
												parseFloat(latlngs[j].lng));
											if (j == 0) {
												map_polygone_edit.setCenter(polygoneditpoint);
											}
											polygoneditmarker[j] = new google.maps.Marker({
												position: polygoneditpoint,
												map: map_polygone_edit,
												title: "#" + j,
												draggable: true,
											})
											polygoneditcoords.push(polygoneditpoint);

											google.maps.event.addListener(polygoneditmarker[j], 'click', function (event) {
												var title = this.getTitle();
												var index = title.replace("#", "");


												polygoneditcoords.splice(index, 1);
												polygoneditmarker.splice(index, 1);
												polygonedit.setPaths(polygoneditcoords);
												this.setMap(null);
												updatePolygoneEditInputs();
												for (var z = 0; z < polygoneditcoords.length; z++) {
													polygoneditmarker[z].setTitle("#" + z);
												}
											});
											google.maps.event.addListener(polygoneditmarker[j], "drag", function (event) {
												var title = this.getTitle();
												var index = title.replace("#", "")
												var position = this.getPosition();
												polygoneditcoords[index] = position;
												polygonedit.setPaths(polygoneditcoords);
												updatePolygoneEditInputs();
											})

										}

										polygonedit = new google.maps.Polygon({
											paths: polygoneditcoords,
											map: map_polygone_edit,
											strokeOpacity: line_opacity,
											strokeColor: "#" + line_color,
											fillOpacity: fill_opacity,
											fillColor: "#" + fill_color,
											draggable: false,
										});
										jQuery(".polygone_edit_options_input").on("change keyup", function () {
											var line_opacity = jQuery("#polygone_edit_line_opacity").val();
											var line_color = jQuery("#polygone_edit_line_color").val();
											var line_width = jQuery("#polygone_edit_line_width").val();
											var fill_opacity = jQuery("#polygone_edit_fill_opacity").val();
											var fill_color = jQuery("#polygone_edit_fill_color").val();
											polygonedit.setOptions({
												strokeColor: "#" + line_color,
												strokeWeight: line_width,
												strokeOpacity: line_opacity,
												fillOpacity: fill_opacity,
												fillColor: "#" + fill_color,
											});
										})
										google.maps.event.addListener(polygonedit, 'mouseover', function (event) {
											var polygone_line_color = "#" + jQuery('#hover_polygone_edit_line_color').val();
											var polygone_line_opacity = jQuery('#hover_polygone_edit_line_opacity').val();
											var polygone_fill_color = "#" + jQuery('#hover_polygone_edit_fill_color').val();
											var polygone_fill_opacity = jQuery('#hover_polygone_edit_fill_opacity').val();
											if (polygonedit) {
												polygonedit.setOptions({
													strokeColor: polygone_line_color,
													strokeOpacity: polygone_line_opacity,
													fillOpacity: polygone_fill_opacity,
													fillColor: polygone_fill_color,
												});
											}
										});
										google.maps.event.addListener(polygonedit, 'mouseout', function (event) {
											var polygone_line_color = "#" + jQuery('#polygone_edit_line_color').val();
											var polygone_line_opacity = jQuery('#polygone_edit_line_opacity').val();
											var polygone_fill_color = "#" + jQuery('#polygone_edit_fill_color').val();
											var polygone_fill_opacity = jQuery('#polygone_edit_fill_opacity').val();
											var polygone_line_width = jQuery('#polygone_edit_line_width').val();
											if (polygonedit) {
												polygonedit.setOptions({
													strokeColor: polygone_line_color,
													strokeWeight: polygone_line_width,
													strokeOpacity: polygone_line_opacity,
													fillOpacity: polygone_fill_opacity,
													fillColor: polygone_fill_color,
												});
											}
										});
										google.maps.event.addListener(map_polygone_edit, "rightclick", function (event) {
											//alert(event.latLng);
											var edit_array_index = polygoneditmarker.length;
											polygoneditmarker[edit_array_index] = new google.maps.Marker({
												map: map_polygone_edit,
												position: event.latLng,
												title: "#" + edit_array_index,
												draggable: true,
											})
											polygoneditcoords.push(event.latLng);
											polygonedit.setPaths(polygoneditcoords);
											google.maps.event.addListener(polygoneditmarker[edit_array_index], 'click', function (event) {
												var title = this.getTitle();
												var index = title.replace("#", "");
												polygoneditcoords.splice(index, 1);
												polygoneditmarker.splice(index, 1);
												polygonedit.setPaths(polygoneditcoords);
												this.setMap(null);
												updatePolygoneEditInputs();
												for (var z = 0; z < polygoneditcoords.length; z++) {
													polygoneditmarker[z].setTitle("#" + z);
												}
											});
											google.maps.event.addListener(polygoneditmarker[edit_array_index], "drag", function (event) {
												var title = this.getTitle();
												var index = title.replace("#", "")
												var position = this.getPosition();
												polygoneditcoords[index] = position;
												polygonedit.setPaths(polygoneditcoords);
												updatePolygoneEditInputs();
											})
											updatePolygoneEditInputs();
										})

										updatePolygoneEditInputs();

									}
								}
								return false;
							})
						}
					}
				}
			}
			function updatePolygoneInputs(location) {
				var temp_array = "";
				newpolygoncoords.forEach(function (latLng, index) {
					//temp_array = temp_array + " ["+ index +"] => "+ latLng + ", ";
					temp_array = temp_array + latLng + ",";
				});
				jQuery("#polygone_coords").val(temp_array);
			}
			function updatePolygoneEditInputs() {
				var temp_array = "";
				polygoneditcoords.forEach(function (latLng, index) {
					//temp_array = temp_array + " ["+ index +"] => "+ latLng + ", ";
					temp_array = temp_array + latLng + ",";
				});
				jQuery("#polygone_edit_coords").val(temp_array);
			}
			function placePolygone(location) {
				array_index = polygonmarker.length;
				polygonmarker[array_index] = new google.maps.Marker({
					position: location,
					map: mappolygone,
					title: "#" + polygonmarker.length,
					draggable: true,
				});
				google.maps.event.addListener(polygonmarker[array_index], 'click', function (event) {
					var title = this.getTitle();
					var index = title.replace("#", "");
					newpolygoncoords.splice(index, 1);
					polygonmarker.splice(index, 1);
					newpolygon.setPaths(newpolygoncoords);
					this.setMap(null);
					updatePolygoneInputs();
					for (var z = 0; z < newpolygoncoords.length; z++) {
						polygonmarker[z].setTitle("#" + z);
					}
				});
				newpolygoncoords.push(polygonmarker[array_index].getPosition());
				google.maps.event.addListener(polygonmarker[array_index], "drag", function (e) {
					var title = this.getTitle();
					var index = title.replace("#", "")
					var position = this.getPosition();
					newpolygoncoords[index] = position;
					newpolygon.setPaths(newpolygoncoords);
					updatePolygoneInputs(position);
				})
				var polygone_line_color = "#" + jQuery('#polygone_line_color').val();
				var polygone_line_opacity = jQuery('#polygone_line_opacity').val();
				var polygone_fill_color = "#" + jQuery('#polygone_fill_color').val();
				var polygone_fill_opacity = jQuery('#polygone_fill_opacity').val();
				var polygone_line_width = jQuery('#polygone_line_width').val();
				if (newpolygon) {
					newpolygon.setMap(mappolygone);
					newpolygon.setPaths(newpolygoncoords);
				}
				else {
					newpolygon = new google.maps.Polygon({
						map: mappolygone,
						paths: newpolygoncoords,
						strokeColor: polygone_line_color,
						strokeWeight: polygone_line_width,
						strokeOpacity: polygone_line_opacity,
						fillOpacity: polygone_fill_opacity,
						fillColor: polygone_fill_color,
					})
				}
				google.maps.event.addListener(newpolygon, 'mouseover', function (event) {
					var polygone_line_color = "#" + jQuery('#hover_polygone_line_color').val();
					var polygone_line_opacity = jQuery('#hover_polygone_line_opacity').val();
					var polygone_fill_color = "#" + jQuery('#hover_polygone_fill_color').val();
					var polygone_fill_opacity = jQuery('#hover_polygone_fill_opacity').val();
					if (newpolygon) {
						newpolygon.setOptions({
							strokeColor: polygone_line_color,
							strokeOpacity: polygone_line_opacity,
							fillOpacity: polygone_fill_opacity,
							fillColor: polygone_fill_color,
						});
					}
				});
				google.maps.event.addListener(newpolygon, 'mouseout', function (event) {
					var polygone_line_color = "#" + jQuery('#polygone_line_color').val();
					var polygone_line_opacity = jQuery('#polygone_line_opacity').val();
					var polygone_fill_color = "#" + jQuery('#polygone_fill_color').val();
					var polygone_fill_opacity = jQuery('#polygone_fill_opacity').val();
					var polygone_line_width = jQuery('#polygone_line_width').val();
					if (newpolygon) {
						newpolygon.setOptions({
							strokeColor: polygone_line_color,
							strokeWeight: polygone_line_width,
							strokeOpacity: polygone_line_opacity,
							fillOpacity: polygone_fill_opacity,
							fillColor: polygone_fill_color,
						});
					}
				});

				i++
			}

		</script>
		<?php ;
	}
}

?>
