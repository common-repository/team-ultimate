<?php
	if ( ! defined('ABSPATH')) exit;  // if direct access 	

	function pe_teamultimate_metaboxes_register(){
		add_meta_box(
			'pe_teamultimate_infos_message', 							# Metabox
			__( 'Team Member Information', 'team-ultimate' ),  			# Title
			'pe_teamultimate_infos_metaboxes', 							# $callback
			'teamultimate', 											# $page
			'normal',													# $context
			'high'
		);
		add_meta_box(
			'pe_allteam_scode_post_message', 							# Metabox
			__( 'Team Ultimate Settings', 'team-ultimate' ),  			# Title
			'pe_teamultimate_inner_custom_boxes', 						# $callback
			'teamshortcode', 											# $page
			'normal'
		);
		add_meta_box(
			'pe_ultimate_scode_display_message', 						# Metabox
			__( 'Team Shortcode', 'team-ultimate' ),  					# Title
			'pe_teamultimate_code_display_boxe', 						# $callback
			'teamshortcode', 											# $page
			'side'
		);

		add_meta_box(
			'pe_team_scode_display_support', 							# Metabox
			__( 'Need Support', 'team-ultimate' ),  					# Title
			'pe_teamultimate_code_display_rate', 						# $callback
			'teamshortcode', 											# $page
			'side'
		);
	}
	add_action('add_meta_boxes', 'pe_teamultimate_metaboxes_register');

	function pe_teamultimate_infos_metaboxes( $post, $args ) {
		$teamultimate_designation	= get_post_meta($post->ID, 'teamultimate_designation', true);
		$teamultimate_emailaddress	= get_post_meta($post->ID, 'teamultimate_emailaddress', true);
		$teamultimate_contactnumber	= get_post_meta($post->ID, 'teamultimate_contactnumber', true);
		$teamultimate_locations		= get_post_meta($post->ID, 'teamultimate_locations', true);
		$teamultimate_sdescription	= get_post_meta($post->ID, 'teamultimate_sdescription', true);
		?>
		<div class="wrap">
			<div class="pe-teamcustomize-area">
				<div class="column-customize-inner">
					<div class="column-heading-area">
						<span class="sub-heading"><?php _e('Designation', 'team-ultimate');?></span>
						<span class="sub-description"><?php _e('Enter Your Designation here.', 'team-ultimate');?> </span>
					</div>
					<div class="column-dropdown-items">
						<input type="text" name="teamultimate_designation" id="teamultimate_designation" class="timezone_string" value="<?php echo $teamultimate_designation; ?>" placeholder="Designation"/>
					</div>
				</div><!-- End Full Name -->

				<div class="column-customize-inner">
					<div class="column-heading-area">
						<span class="sub-heading"><?php _e('Email', 'team-ultimate');?></span>
						<span class="sub-description"><?php _e('Enter Your Email Address here.', 'team-ultimate');?> </span>
					</div>
					<div class="column-dropdown-items">
						<input type="text" name="teamultimate_emailaddress" id="teamultimate_emailaddress" class="timezone_string" value="<?php echo $teamultimate_emailaddress; ?>" placeholder="Email Address"/>
					</div>
				</div><!-- End Full Name -->

				<div class="column-customize-inner">
					<div class="column-heading-area">
						<span class="sub-heading"><?php _e('Contact', 'team-ultimate');?></span>
						<span class="sub-description"><?php _e('Enter Your Contact Number here.', 'team-ultimate');?> </span>
					</div>
					<div class="column-dropdown-items">
						<input type="text" name="teamultimate_contactnumber" id="teamultimate_contactnumber" class="timezone_string" value="<?php echo $teamultimate_contactnumber; ?>" placeholder="000 000 000 "/>
					</div>
				</div><!-- End Full Name -->

				<div class="column-customize-inner">
					<div class="column-heading-area">
						<span class="sub-heading"><?php _e('Address', 'team-ultimate');?></span>
						<span class="sub-description"><?php _e('Enter Your location here.', 'team-ultimate');?> </span>
					</div>
					<div class="column-dropdown-items">
						<input type="text" name="teamultimate_locations" id="teamultimate_locations" class="timezone_string" value="<?php echo $teamultimate_locations; ?>" placeholder="Dixon Avenue New York"/>
					</div>
				</div><!-- End Location -->

				<div class="column-customize-inner">
					<div class="column-heading-area">
						<span class="sub-heading"><?php _e('Short Description', 'team-ultimate');?></span>
						<span class="sub-description"><?php _e('Enter Your Short description here.', 'team-ultimate');?> </span>
					</div>
					<div class="column-dropdown-items">
						<textarea type="text" name="teamultimate_sdescription" id="teamultimate_sdescription" class="regular-text code" rows="5" cols="100" ><?php echo $teamultimate_sdescription; ?></textarea>
					</div>
				</div><!-- End Location -->
			</div>
		</div>
		<?php
	}

	function pe_teamultimate_post_meta_boxes_save($post_id){
		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

		#Checks for input and saves if needed
		if(isset($_POST['teamultimate_designation'])) {
			update_post_meta($post_id, 'teamultimate_designation', $_POST['teamultimate_designation']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['teamultimate_emailaddress'])) {
			update_post_meta($post_id, 'teamultimate_emailaddress', $_POST['teamultimate_emailaddress']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['teamultimate_contactnumber'])) {
			update_post_meta($post_id, 'teamultimate_contactnumber', $_POST['teamultimate_contactnumber']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['teamultimate_locations'])) {
			update_post_meta($post_id, 'teamultimate_locations', $_POST['teamultimate_locations']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['teamultimate_sdescription'])) {
			update_post_meta($post_id, 'teamultimate_sdescription', $_POST['teamultimate_sdescription']);
		}
	}
	add_action('save_post', 'pe_teamultimate_post_meta_boxes_save');

	# Testimonial Review Shortcode Page MetaBox Options
	function pe_teamultimate_inner_custom_boxes( $post, $args ) {

		$pe_team_catslist 		= get_post_meta($post->ID, 'pe_team_catslist', true);
		if(empty($pe_team_catslist)){
			$pe_team_catslist = array();
		}
		$pe_team_styles							= get_post_meta($post->ID, 'pe_team_styles', true);
		$pe_team_types							= get_post_meta($post->ID, 'pe_team_types', true);
		$pe_team_totall_pages					= get_post_meta($post->ID, 'pe_team_totall_pages', true);
		$pe_team_orderby						= get_post_meta($post->ID, 'pe_team_orderby', true);
		$pe_team_order							= get_post_meta($post->ID, 'pe_team_order', true);
		$pe_team_gridtypes						= get_post_meta($post->ID, 'pe_team_gridtypes', true);
		$pe_teamtotal_column					= get_post_meta($post->ID, 'pe_teamtotal_column', true);
		$pe_team_marginleftright_size			= get_post_meta($post->ID, 'pe_team_marginleftright_size', true);
		$pe_team_marginbottom_size				= get_post_meta($post->ID, 'pe_team_marginbottom_size', true);

		# Title 
		$pe_team_title_fontsize					= get_post_meta($post->ID, 'pe_team_title_fontsize', true);
		$pe_team_title_color					= get_post_meta($post->ID, 'pe_team_title_color', true);
		$pe_team_title_transform				= get_post_meta($post->ID, 'pe_team_title_transform', true);
		$pe_team_title_fontstyle				= get_post_meta($post->ID, 'pe_team_title_fontstyle', true);
		$pe_team_title_fontweight				= get_post_meta($post->ID, 'pe_team_title_fontweight', true);

		# Designation
		$pe_team_designation_fontsize			= get_post_meta($post->ID, 'pe_team_designation_fontsize', true);
		$pe_team_designation_hides				= get_post_meta($post->ID, 'pe_team_designation_hides', true);
		$pe_team_designation_color				= get_post_meta($post->ID, 'pe_team_designation_color', true);
		$pe_team_designation_transform			= get_post_meta($post->ID, 'pe_team_designation_transform', true);
		$pe_team_designation_fontstyle			= get_post_meta($post->ID, 'pe_team_designation_fontstyle', true);

		# Contact
		$pe_team_contact_hides					= get_post_meta($post->ID, 'pe_team_contact_hides', true);
		$pe_team_contact_fontsize				= get_post_meta($post->ID, 'pe_team_contact_fontsize', true);
		$pe_team_contact_color					= get_post_meta($post->ID, 'pe_team_contact_color', true);

		# Location
		$pe_team_locations_hides				= get_post_meta($post->ID, 'pe_team_locations_hides', true);
		$pe_team_location_fontsize				= get_post_meta($post->ID, 'pe_team_location_fontsize', true);
		$pe_team_location_color					= get_post_meta($post->ID, 'pe_team_location_color', true);

		# Social
		$pe_team_hide_social					= get_post_meta($post->ID, 'pe_team_hide_social', true);
		$pe_team_social_style					= get_post_meta($post->ID, 'pe_team_social_style', true);
		$pe_team_socialicon_color				= get_post_meta($post->ID, 'pe_team_socialicon_color', true);
		$pe_team_socialicon_colorbg				= get_post_meta($post->ID, 'pe_team_socialicon_colorbg', true);
		$pe_team_socialicon_size				= get_post_meta($post->ID, 'pe_team_socialicon_size', true);

		# Email
		$pe_team_email_hides					= get_post_meta($post->ID, 'pe_team_email_hides', true);
		$pe_team_emails_fontsize				= get_post_meta($post->ID, 'pe_team_emails_fontsize', true);
		$pe_team_email_color					= get_post_meta($post->ID, 'pe_team_email_color', true);
		$pe_team_email_hover_color				= get_post_meta($post->ID, 'pe_team_email_hover_color', true);
		$pe_team_email_transform				= get_post_meta($post->ID, 'pe_team_email_transform', true);
		$pe_team_email_fontstyle				= get_post_meta($post->ID, 'pe_team_email_fontstyle', true);
		$pe_team_hide_skills					= get_post_meta($post->ID, 'pe_team_hide_skills', true);
		$pe_team_skills_textcolors				= get_post_meta($post->ID, 'pe_team_skills_textcolors', true);
		$pe_team_skills_linecolors				= get_post_meta($post->ID, 'pe_team_skills_linecolors', true);
		$pe_team_skills_hvrcolors				= get_post_meta($post->ID, 'pe_team_skills_hvrcolors', true);

		# Pagination
		$pe_team_memberbg_color					= get_post_meta($post->ID, 'pe_team_memberbg_color', true);
		$pe_team_overlaybg_color				= get_post_meta($post->ID, 'pe_team_overlaybg_color', true);
		$pe_team_details_color					= get_post_meta($post->ID, 'pe_team_details_color', true);
		$pe_team_hide_content					= get_post_meta($post->ID, 'pe_team_hide_content', true);
		$pe_team_details_size					= get_post_meta($post->ID, 'pe_team_details_size', true);
		$pe_team_navtabs						= get_post_meta($post->ID, 'pe_team_navtabs', true);

		# Team Filter Option
		$pe_team_filter_menu_position 			= get_post_meta( $post->ID, 'pe_team_filter_menu_position', true );
		$pe_team_filter_menu_style 				= get_post_meta( $post->ID, 'pe_team_filter_menu_style', true );
		$pe_team_filter_menutext_color 			= get_post_meta( $post->ID, 'pe_team_filter_menutext_color', true );
		$pe_team_filter_menubg_color 			= get_post_meta( $post->ID, 'pe_team_filter_menubg_color', true );
		$pe_team_filter_menuhover_color 		= get_post_meta( $post->ID, 'pe_team_filter_menuhover_color', true );
		$pe_team_filter_menubghover_color 		= get_post_meta( $post->ID, 'pe_team_filter_menubghover_color', true );

		# Team Slider Option
		$pe_team_item_autoplay   				= get_post_meta($post->ID, 'pe_team_item_autoplay', true);
		$pe_team_item_autoplayspeed   			= get_post_meta($post->ID, 'pe_team_item_autoplayspeed', true);
		$pe_team_item_autohide   				= get_post_meta($post->ID, 'pe_team_item_autohide', true);
		$pe_team_item_centermode   				= get_post_meta($post->ID, 'pe_team_item_centermode', true);
		$pe_team_item_stophover   				= get_post_meta($post->ID, 'pe_team_item_stophover', true);
		$pe_team_item_autoplaytimeout    		= get_post_meta($post->ID, 'pe_team_item_autoplaytimeout', true);
		
		# Team Slider Responsive Option
		$pe_team_all_items 						= get_post_meta($post->ID, 'pe_team_all_items', true);
		$pe_team_all_itemsdesktop   			= get_post_meta($post->ID, 'pe_team_all_itemsdesktop', true);
		$pe_team_all_itemsdesktopsmall  		= get_post_meta($post->ID, 'pe_team_all_itemsdesktopsmall', true);
		$pe_team_all_itemsmobile   				= get_post_meta($post->ID, 'pe_team_all_itemsmobile', true);
		$pe_team_item_loop 						= get_post_meta($post->ID, 'pe_team_item_loop', true);
		$pe_team_item_margin 					= get_post_meta($post->ID, 'pe_team_item_margin', true);

		# Team Slider Navigation Option
		$pe_team_item_navigation 				= get_post_meta($post->ID, 'pe_team_item_navigation', true);
		$pe_team_item_navigation_position 		= get_post_meta($post->ID, 'pe_team_item_navigation_position', true);
		$pe_team_item_navtext_color     		= get_post_meta($post->ID, 'pe_team_item_navtext_color', true);	
		$pe_team_item_navtext_color_hover   	= get_post_meta($post->ID, 'pe_team_item_navtext_color_hover', true);	
		$pe_team_item_navbg_colors       		= get_post_meta($post->ID, 'pe_team_item_navbg_colors', true);
		$pe_team_item_navbghovers_colors     	= get_post_meta($post->ID, 'pe_team_item_navbghovers_colors', true);
		$pe_team_item_pagination 				= get_post_meta($post->ID, 'pe_team_item_pagination', true);
		$pe_team_item_paginationposition 		= get_post_meta($post->ID, 'pe_team_item_paginationposition', true);
		$pe_team_item_pagination_color   		= get_post_meta($post->ID, 'pe_team_item_pagination_color', true);
		$pe_team_item_pagination_bgcolor		= get_post_meta($post->ID, 'pe_team_item_pagination_bgcolor', true);
		$pe_team_item_pagination_style			= get_post_meta($post->ID, 'pe_team_item_pagination_style', true);
		$sort_array								= get_post_meta($post->ID, 'sort_array', true);

		?>

		<div class="peteam-review-settings post-grid-metabox">
			<!-- <div class="wrap"> -->
			<ul class="tab-nav">
				<li nav="1" class="nav1 <?php if($pe_team_navtabs == 1){echo "active";}?>"><?php _e('Team Query','team-ultimate'); ?></li>
				<li nav="2" class="nav2 <?php if($pe_team_navtabs == 2){echo "active";}?>"><?php _e('General Settings ','team-ultimate'); ?></li>
				<li nav="3" class="nav3 <?php if($pe_team_navtabs == 3){echo "active";}?>"><?php _e('Grid & Slider Settings ','team-ultimate'); ?></li>
			</ul> <!-- tab-nav end -->
			<?php
				$getNavValue = "";
				if(!empty($pe_team_navtabs)){ $getNavValue = $pe_team_navtabs; } else { $getNavValue = 1; }
			?>
			<input type="hidden" name="pe_team_navtabs" id="pe_team_navtabs" value="<?php echo $getNavValue; ?>">

			<ul class="box">
				<!-- Tab 2  -->
				<li style="<?php if($pe_team_navtabs == 1){echo "display: block;";} else{ echo "display: none;"; }?>" class="box1 tab-box <?php if($pe_team_navtabs == 1){echo "active";}?>">
					<div class="option-box">
						<p class="option-title"><?php _e('Team Settings','team-ultimate'); ?></p>
						<div class="wrap">
							<div class="pe-teamcustomize-area">
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Select Team Categories', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select your Categories to display team members, if you did not select any Categories it shows all the members.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<ul>
											<?php
												$args = array(
													'taxonomy'     => 'teamultimate-tax',
													'orderby'      => 'name',
													'show_count'   => 1,
													'pad_counts'   => 1,
													'hierarchical' => 1,
													'echo'         => 0
												);
												$acpluscats = get_categories( $args );
											?>
											<?php
												foreach( $acpluscats as $category ):
												    $cat_id = $category->cat_ID;
												    $checked = ( in_array($cat_id,(array)$pe_team_catslist)? ' checked="checked"': "" );
												    echo'<li id="cat-'.$cat_id.'"><input type="checkbox" name="pe_team_catslist[]" id="'.$cat_id.'" value="'.$cat_id.'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->cat_name, 'team-manager-free' ).'</label></li>';
												endforeach;
											?>
										</ul>
									</div>
								</div><!-- End -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Choose Team Style', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Showcase style.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_styles" id="pe_team_styles" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_styles ) ) selected( $pe_team_styles, '1' ); ?>><?php _e('Style 1', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_styles ) ) selected( $pe_team_styles, '2' ); ?>><?php _e('Style 2', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_styles ) ) selected( $pe_team_styles, '3' ); ?>><?php _e('Style 3', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_styles ) ) selected( $pe_team_styles, '4' ); ?>><?php _e('Style 4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_team_styles ) ) selected( $pe_team_styles, '5' ); ?>><?php _e('Style 5', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Team Type', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose team showcase type grid or slider. all options available on the grid & slider settings tab.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_types" id="pe_team_types" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_types ) ) selected( $pe_team_types, '1' ); ?>><?php _e('Grid', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_types ) ) selected( $pe_team_types, '2' ); ?>><?php _e('Slider (Pro Only)', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Display Total Item', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose how many team member you want to show. Only Available on the Pro Version.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="number" name="pe_team_totall_pages" id="pe_team_totall_pages" maxlength="4" class="timezone_string" value="<?php if($pe_team_totall_pages !=''){echo $pe_team_totall_pages; }else{ echo '12';} ?>">
									</div>
								</div><!-- End Items -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Order By', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose team member order By: Date, Menu Order or Random.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_orderby" id="pe_team_orderby" class="timezone_string">
											<option value="date" <?php if ( isset ( $pe_team_orderby ) ) selected( $pe_team_orderby, 'date' ); ?>><?php _e('Publish Date', 'team-ultimate');?></option>
											<option value="menu_order" <?php if ( isset ( $pe_team_orderby ) ) selected( $pe_team_orderby, 'menu_order' ); ?>><?php _e('Order', 'team-ultimate');?></option>
											<option value="rand" <?php if ( isset ( $pe_team_orderby ) ) selected( $pe_team_orderby, 'rand' ); ?>><?php _e('Random', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Order', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose team member order: Descending or Ascending', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_order" id="pe_team_order" class="timezone_string">
											<option value="DESC" <?php if ( isset ( $pe_team_order ) ) selected( $pe_team_order, 'DESC' ); ?>><?php _e('Descending', 'team-ultimate');?></option>
											<option value="ASC" <?php if ( isset ( $pe_team_order ) ) selected( $pe_team_order, 'ASC' ); ?>><?php _e('Ascending', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End -->
								
							</div>
						</div>
					</div>
				</li>
				<!-- Tab 2  -->
				<li style="<?php if($pe_team_navtabs == 2){echo "display: block;";} else{ echo "display: none;"; }?>" class="box2 tab-box <?php if($pe_team_navtabs == 2){echo "active";}?>">
					<div class="option-box">
						<p class="option-title"><?php _e('General Settings','team-ultimate'); ?></p>
						<p><span style="color:red">Note: Drag & Drop Member information sorting feature Available only Pro version.</span></p>
						<div class="wrap">
							<div class="pe-teamcustomize-area">
								<ul id="myaccordions" class="accordionjs tup_class2">
									<?php
									 if(!empty($sort_array)){
										foreach ($sort_array as $value) {
										if($value =="namesettings"){
										?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									       		<?php _e('Member Name Settings', 'team-ultimate');?></div>
									        <div>
									    	<input type="hidden" name="sort_array[]" value="namesettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Name Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member name font size. default font size:18px ', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_title_fontsize" id="pe_team_title_fontsize" maxlength="4" class="timezone_string" value="<?php  if($pe_team_title_fontsize !=''){echo $pe_team_title_fontsize; }else{ echo '18';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Name Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member name text color. default color: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_title_color" id="pe_team_title_color" class="timezone_string" value="<?php  if($pe_team_title_color !=''){echo $pe_team_title_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Name Text Transform', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member name text transform. default text transform: capitalize', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_title_transform" id="pe_team_title_transform" class="timezone_string">
															<option value="unset" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
															<option value="capitalize" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
															<option value="lowercase" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
															<option value="uppercase" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Name Font Style', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member name text Style. default: Normal', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_title_fontstyle" id="pe_team_title_fontstyle" class="timezone_string">
															<option value="normal" <?php if ( isset ( $pe_team_title_fontstyle ) ) selected( $pe_team_title_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
															<option disabled value="italic" <?php if ( isset ( $pe_team_title_fontstyle ) ) selected( $pe_team_title_fontstyle, 'italic' ); ?>><?php _e('Italic (Only Pro)', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Name Font Weight', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member name font weight. default: 500. Available on the premium version only.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_title_fontweight" id="pe_team_title_fontweight" class="timezone_string">
															<option value="500" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '500' ); ?>><?php _e('500', 'team-ultimate');?></option>
															<option value="600" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '600' ); ?>><?php _e('600', 'team-ultimate');?></option>
															<option value="700" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '700' ); ?>><?php _e('700', 'team-ultimate');?></option>
															<option value="400" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '400' ); ?>><?php _e('400', 'team-ultimate');?></option>
															<option value="300" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '300' ); ?>><?php _e('300', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

									        </div>
									    </li>
										<?php 
										}
										if($value =="designationsettings"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Designation Settings', 'team-ultimate');?></div>
										        <div>
									    	<input type="hidden" name="sort_array[]" value="designationsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Designation Fields', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Show or Hide Designation Fields. select Hide to disable team member Designation fields.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_designation_hides" id="pe_team_designation_hides" class="timezone_string">
															<option value="1" <?php if ( isset ( $pe_team_designation_hides ) ) selected( $pe_team_designation_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
															<option value="2" <?php if ( isset ( $pe_team_designation_hides ) ) selected( $pe_team_designation_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Designation Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Designation Font Size. default font size: 15px', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_designation_fontsize" id="pe_team_designation_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_designation_fontsize !=''){echo $pe_team_designation_fontsize; }else{ echo '15';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Designation Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Designation Font Color. default font color: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_designation_color" id="pe_team_designation_color" class="timezone_string" value="<?php  if($pe_team_designation_color !=''){echo $pe_team_designation_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Designation Text Transform', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Designation Text Transform. default text transform: capitalize', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_designation_transform" id="pe_team_designation_transform" class="timezone_string">
															<option value="unset" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
															<option value="capitalize" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
															<option value="lowercase" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
															<option value="uppercase" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Designation Text Style', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Designation Text Style. default text style: Normal', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_designation_fontstyle" id="pe_team_designation_fontstyle" class="timezone_string">
															<option value="normal" <?php if ( isset ( $pe_team_designation_fontstyle ) ) selected( $pe_team_designation_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
															<option disabled value="italic" <?php if ( isset ( $pe_team_designation_fontstyle ) ) selected( $pe_team_designation_fontstyle, 'italic' ); ?>><?php _e('Italic (Only Pro)', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->
									        </div>
									    </li>
										<?php
										}
										if($value =="emailsettings"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Email Settings', 'team-ultimate');?></div>
									        <div>
									    	<input type="hidden" name="sort_array[]" value="emailsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Email Fields', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Show or Hide Email Fields. select Hide to disable team member email fields.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_email_hides" id="pe_team_email_hides" class="timezone_string">
															<option value="2" <?php if ( isset ( $pe_team_email_hides ) ) selected( $pe_team_email_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
															<option value="1" <?php if ( isset ( $pe_team_email_hides ) ) selected( $pe_team_email_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Email Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Email Font Size. default font size: 15px', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_emails_fontsize" id="pe_team_emails_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_emails_fontsize !=''){echo $pe_team_emails_fontsize; }else{ echo '15';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Email Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Email Font Color. default font color: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_email_color" id="pe_team_email_color" class="timezone_string" value="<?php  if($pe_team_email_color !=''){echo $pe_team_email_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Email Hover Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Email Hover Font Color. default font color: #7d7777', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_email_hover_color" id="pe_team_email_hover_color" class="timezone_string" value="<?php  if($pe_team_email_hover_color !=''){echo $pe_team_email_hover_color; }else{ echo '#7d7777';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Email Text Transform', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Email Text Transform. default text transform: capitalize', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_email_transform" id="pe_team_email_transform" class="timezone_string">
															<option value="unset" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
															<option value="capitalize" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
															<option value="lowercase" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
															<option value="uppercase" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Email Text Style', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Email Text Style. default text style: Normal', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_email_fontstyle" id="pe_team_email_fontstyle" class="timezone_string">
															<option value="normal" <?php if ( isset ( $pe_team_email_fontstyle ) ) selected( $pe_team_email_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
															<option value="italic" <?php if ( isset ( $pe_team_email_fontstyle ) ) selected( $pe_team_email_fontstyle, 'italic' ); ?>><?php _e('Italic', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->
									        </div>
									    </li>
										<?php
										}
										if($value =="contactsettings"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Contact Number Settings (Pro Only)', 'team-ultimate');?></div>
									        <div>
									    		<input type="hidden" name="sort_array[]" value="contactsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Contact Fields', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Show or Hide Contact Fields. Select Hide to disable team member contact fields.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_contact_hides" id="pe_team_contact_hides" class="timezone_string">
															<option value="2" <?php if ( isset ( $pe_team_contact_hides ) ) selected( $pe_team_contact_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
															<option value="1" <?php if ( isset ( $pe_team_contact_hides ) ) selected( $pe_team_contact_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Contact Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Contact Font Size. default font size: 15px', 'team-ultimate');?> </span>
													</div>

													<div class="column-dropdown-items">
														<input type="number" name="pe_team_contact_fontsize" id="pe_team_contact_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_contact_fontsize !=''){echo $pe_team_contact_fontsize; }else{ echo '15';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Contact Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Contact Font Color. default font color: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_contact_color" id="pe_team_contact_color" class="timezone_string" value="<?php  if($pe_team_contact_color !=''){echo $pe_team_contact_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

									        </div>
									    </li>
										<?php 
										}
										if($value =="contactlocation"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Location Settings (Pro Only)', 'team-ultimate');?></div>
									        <div>
									    		<input type="hidden" name="sort_array[]" value="contactlocation">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Location Fields', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Show or Hide Location Fields. Select Hide to disable team member Location fields.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_locations_hides" id="pe_team_locations_hides" class="timezone_string">
															<option value="2" <?php if ( isset ( $pe_team_locations_hides ) ) selected( $pe_team_locations_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
															<option value="1" <?php if ( isset ( $pe_team_locations_hides ) ) selected( $pe_team_locations_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Location Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Location Font Size. default font size: 15px', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_location_fontsize" id="pe_team_location_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_location_fontsize !=''){echo $pe_team_location_fontsize; }else{ echo '15';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Location Font Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team Member Location Font Color. default font color: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_location_color" id="pe_team_location_color" class="timezone_string" value="<?php  if($pe_team_location_color !=''){echo $pe_team_location_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

									        </div>
									    </li>
										<?php 
										}
										if($value =="socialsettings"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Social icons Settings', 'team-ultimate');?></div>
									        <div>
									    	<input type="hidden" name="sort_array[]" value="socialsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Social Icons', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Show or Hide Team Social icons. select Hide to disable team member social icons.', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_hide_social" id="pe_team_hide_social" class="timezone_string">
															<option value="1" <?php if ( isset ( $pe_team_hide_social ) ) selected( $pe_team_hide_social, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
															<option disabled value="2" <?php if ( isset ( $pe_team_hide_social ) ) selected( $pe_team_hide_social, '2' ); ?>><?php _e('Hide (Only Pro)', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Social Icons Style', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose social icons style. default style: square', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_social_style" id="pe_team_social_style" class="timezone_string">
															<option value="1" <?php if ( isset ( $pe_team_social_style ) ) selected( $pe_team_social_style, '1' ); ?>><?php _e('Square', 'team-ultimate');?></option>
															<option disabled value="2" <?php if ( isset ( $pe_team_social_style ) ) selected( $pe_team_social_style, '2' ); ?>><?php _e('Round (Only Pro)', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Social Icon Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team social icons color. default: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_socialicon_color" id="pe_team_socialicon_color" class="timezone_string" value="<?php  if($pe_team_socialicon_color !=''){echo $pe_team_socialicon_color; }else{ echo '#333333';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Social Icon Bg Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team social icons Background color. default: #333333', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_socialicon_colorbg" id="pe_team_socialicon_colorbg" class="timezone_string" value="<?php  if($pe_team_socialicon_colorbg !=''){echo $pe_team_socialicon_colorbg; }else{ echo '#ffffff';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Social Icon Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team member social icon font size. default size: 13px', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_socialicon_size" id="pe_team_socialicon_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_socialicon_size !=''){echo $pe_team_socialicon_size; }else{ echo '13';} ?>">
													</div>
												</div><!-- End -->
									        </div>
									    </li>
										<?php
										}
										if($value =="contentsettings"){ ?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Short Description Settings', 'team-ultimate');?></div>
									        <div>
									    	<input type="hidden" name="sort_array[]" value="contentsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Team Content', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('show/hide team member content details. default: Show', 'team-ultimate');?> </span>
													</div>

													<div class="column-dropdown-items">
														<select name="pe_team_hide_content" id="pe_team_hide_content" class="timezone_string">
															<option value="2" <?php if ( isset ( $pe_team_hide_content ) ) selected( $pe_team_hide_content, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
															<option value="1" <?php if ( isset ( $pe_team_hide_content ) ) selected( $pe_team_hide_content, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Content Text Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member content text color. default color: #fdfdfd', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_details_color" id="pe_team_details_color" class="timezone_string" value="<?php  if($pe_team_details_color !=''){echo $pe_team_details_color; }else{ echo '#000';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Content Font Size', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member content text size. default text size: 14px', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="number" name="pe_team_details_size" id="pe_team_details_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_details_size !=''){echo $pe_team_details_size; }else{ echo '14';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Member Background Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team member Background color. default color:#fafafa', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_memberbg_color" id="pe_team_memberbg_color" class="timezone_string" value="<?php  if($pe_team_memberbg_color !=''){echo $pe_team_memberbg_color; }else{ echo '#fafafa';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Member Overlay Bg Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose Team member Overlay color. default color:#324957', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_overlaybg_color" id="pe_team_overlaybg_color" class="timezone_string" value="<?php  if($pe_team_overlaybg_color !=''){echo $pe_team_overlaybg_color; }else{ echo '#324957';} ?>">
													</div>
												</div><!-- End -->
									        </div>
									    </li>
										<?php
										}
										if($value =="skillsettings"){
										?>
									    <li class="ui-state-default tup-drag">
									        <div>
									        	<div class="acc_head_moveleft">
									        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
									        	</div>
												<div class="acc_head_icons">
													<span class="plusicons"><i class="fa fa-angle-down"></i></span>
													<span class="minusicons"><i class="fa fa-angle-up"></i></span>
												</div>
									        <?php _e('Member Skill Settings (Pro Only)', 'team-ultimate');?></div>
									        <div>
									    	<input type="hidden" name="sort_array[]" value="skillsettings">
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Show/Hide Team Skills', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('show/hide team member skills. default: hide', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<select name="pe_team_hide_skills" id="pe_team_hide_skills" class="timezone_string">
															<option value="1" <?php if ( isset ( $pe_team_hide_skills ) ) selected( $pe_team_hide_skills, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
															<option value="2" <?php if ( isset ( $pe_team_hide_skills ) ) selected( $pe_team_hide_skills, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														</select>
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Skills Text Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team social icons Background color. default: #000000', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_skills_textcolors" id="pe_team_skills_textcolors" class="timezone_string" value="<?php  if($pe_team_skills_textcolors !=''){echo $pe_team_skills_textcolors; }else{ echo '#000000';} ?>">
													</div>
												</div><!-- End -->

												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Skills line Bg Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member skills line Background color. default: #959595', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_skills_linecolors" id="pe_team_skills_linecolors" class="timezone_string" value="<?php  if($pe_team_skills_linecolors !=''){echo $pe_team_skills_linecolors; }else{ echo '#959595';} ?>">
													</div>
												</div><!-- End -->
												<div class="column-customize-inner">
													<div class="column-heading-area">
														<span class="sub-heading"><?php _e('Skills Animate Color', 'team-ultimate');?></span>
														<span class="sub-description"><?php _e('Choose team member skills line animation Background color. default: #f4392f', 'team-ultimate');?> </span>
													</div>
													<div class="column-dropdown-items">
														<input type="text" name="pe_team_skills_hvrcolors" id="pe_team_skills_hvrcolors" class="timezone_string" value="<?php  if($pe_team_skills_hvrcolors !=''){echo $pe_team_skills_hvrcolors; }else{ echo '#f4392f';} ?>">
													</div>
												</div><!-- End -->

									        </div>
									    </li>
										<?php
										}
									}
								}else{?>
								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Name Settings', 'team-ultimate');?></div>
								        <div>
								    	<input type="hidden" name="sort_array[]" value="namesettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Name Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member name font size. default font size:16px ', 'team-ultimate');?> </span>
												</div>

												<div class="column-dropdown-items">
													<input type="number" name="pe_team_title_fontsize" id="pe_team_title_fontsize" maxlength="4" class="timezone_string" value="<?php  if($pe_team_title_fontsize !=''){echo $pe_team_title_fontsize; }else{ echo '16';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Name Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member name text color. default color: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_title_color" id="pe_team_title_color" class="timezone_string" value="<?php  if($pe_team_title_color !=''){echo $pe_team_title_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Name Text Transform', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member name text transform. default text transform: capitalize', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_title_transform" id="pe_team_title_transform" class="timezone_string">
														<option value="unset" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
														<option value="capitalize" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
														<option value="lowercase" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
														<option value="uppercase" <?php if ( isset ( $pe_team_title_transform ) ) selected( $pe_team_title_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Name Font Style', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member name text Style. default: Normal', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_title_fontstyle" id="pe_team_title_fontstyle" class="timezone_string">
														<option value="normal" <?php if ( isset ( $pe_team_title_fontstyle ) ) selected( $pe_team_title_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
														<option disabled value="italic" <?php if ( isset ( $pe_team_title_fontstyle ) ) selected( $pe_team_title_fontstyle, 'italic' ); ?>><?php _e('Italic (Only Pro)', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Name Font Weight', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member name font weight. default: 500. Available on the premium version only.', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_title_fontweight" id="pe_team_title_fontweight" class="timezone_string">
														<option value="500" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '500' ); ?>><?php _e('500', 'team-ultimate');?></option>
														<option value="600" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '600' ); ?>><?php _e('600', 'team-ultimate');?></option>
														<option value="700" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '700' ); ?>><?php _e('700', 'team-ultimate');?></option>
														<option value="400" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '400' ); ?>><?php _e('400', 'team-ultimate');?></option>
														<option value="300" <?php if ( isset ( $pe_team_title_fontweight ) ) selected( $pe_team_title_fontweight, '300' ); ?>><?php _e('300', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								       		<?php _e('Member Designation Settings', 'team-ultimate');?></div>
									        <div>
								    	<input type="hidden" name="sort_array[]" value="designationsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Designation Fields', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Show or Hide Designation Fields. select Hide to disable team member Designation fields.', 'team-ultimate');?> </span>
												</div>

												<div class="column-dropdown-items">
													<select name="pe_team_designation_hides" id="pe_team_designation_hides" class="timezone_string">
														<option value="1" <?php if ( isset ( $pe_team_designation_hides ) ) selected( $pe_team_designation_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														<option value="2" <?php if ( isset ( $pe_team_designation_hides ) ) selected( $pe_team_designation_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Designation Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Designation Font Size. default font size: 15px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_designation_fontsize" id="pe_team_designation_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_designation_fontsize !=''){echo $pe_team_designation_fontsize; }else{ echo '15';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Designation Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Designation Font Color. default font color: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_designation_color" id="pe_team_designation_color" class="timezone_string" value="<?php  if($pe_team_designation_color !=''){echo $pe_team_designation_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Designation Text Transform', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Designation Text Transform. default text transform: capitalize', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_designation_transform" id="pe_team_designation_transform" class="timezone_string">
														<option value="unset" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
														<option value="capitalize" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
														<option value="lowercase" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
														<option value="uppercase" <?php if ( isset ( $pe_team_designation_transform ) ) selected( $pe_team_designation_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Designation Text Style', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Designation Text Style. default text style: Normal', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_designation_fontstyle" id="pe_team_designation_fontstyle" class="timezone_string">
														<option value="normal" <?php if ( isset ( $pe_team_designation_fontstyle ) ) selected( $pe_team_designation_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
														<option disabled value="italic" <?php if ( isset ( $pe_team_designation_fontstyle ) ) selected( $pe_team_designation_fontstyle, 'italic' ); ?>><?php _e('Italic (Only Pro)', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->
								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Email Settings', 'team-ultimate');?></div>
								        <div>
								    	<input type="hidden" name="sort_array[]" value="emailsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Email Fields', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Show or Hide Email Fields. select Hide to disable team member email fields.', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_email_hides" id="pe_team_email_hides" class="timezone_string">
														<option value="2" <?php if ( isset ( $pe_team_email_hides ) ) selected( $pe_team_email_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														<option value="1" <?php if ( isset ( $pe_team_email_hides ) ) selected( $pe_team_email_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Email Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Email Font Size. default font size: 15px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_emails_fontsize" id="pe_team_emails_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_emails_fontsize !=''){echo $pe_team_emails_fontsize; }else{ echo '15';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Email Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Email Font Color. default font color: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_email_color" id="pe_team_email_color" class="timezone_string" value="<?php  if($pe_team_email_color !=''){echo $pe_team_email_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Email Hover Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Email Hover Font Color. default font color: #7d7777', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_email_hover_color" id="pe_team_email_hover_color" class="timezone_string" value="<?php  if($pe_team_email_hover_color !=''){echo $pe_team_email_hover_color; }else{ echo '#7d7777';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Email Text Transform', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Email Text Transform. default text transform: capitalize', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_email_transform" id="pe_team_email_transform" class="timezone_string">
														<option value="unset" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'unset' ); ?>><?php _e('Default', 'team-ultimate');?></option>
														<option value="capitalize" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'team-ultimate');?></option>
														<option value="lowercase" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'team-ultimate');?></option>
														<option value="uppercase" <?php if ( isset ( $pe_team_email_transform ) ) selected( $pe_team_email_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Email Text Style', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Email Text Style. default text style: Normal', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_email_fontstyle" id="pe_team_email_fontstyle" class="timezone_string">
														<option value="normal" <?php if ( isset ( $pe_team_email_fontstyle ) ) selected( $pe_team_email_fontstyle, 'normal' ); ?>><?php _e('Normal', 'team-ultimate');?></option>
														<option value="italic" <?php if ( isset ( $pe_team_email_fontstyle ) ) selected( $pe_team_email_fontstyle, 'italic' ); ?>><?php _e('Italic', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->
								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Contact Number Settings (Pro Only)', 'team-ultimate');?></div>
								        <div>
								    		<input type="hidden" name="sort_array[]" value="contactsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Contact Fields', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Show or Hide Contact Fields. Select Hide to disable team member contact fields.', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_contact_hides" id="pe_team_contact_hides" class="timezone_string">
														<option value="2" <?php if ( isset ( $pe_team_contact_hides ) ) selected( $pe_team_contact_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														<option value="1" <?php if ( isset ( $pe_team_contact_hides ) ) selected( $pe_team_contact_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Contact Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Contact Font Size. default font size: 15px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_contact_fontsize" id="pe_team_contact_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_contact_fontsize !=''){echo $pe_team_contact_fontsize; }else{ echo '15';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Contact Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Contact Font Color. default font color: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_contact_color" id="pe_team_contact_color" class="timezone_string" value="<?php  if($pe_team_contact_color !=''){echo $pe_team_contact_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Location Settings (Pro Only)', 'team-ultimate');?></div>
								        <div>
								    		<input type="hidden" name="sort_array[]" value="contactlocation">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Location Fields', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Show or Hide Location Fields. Select Hide to disable team member Location fields.', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_locations_hides" id="pe_team_locations_hides" class="timezone_string">
														<option value="2" <?php if ( isset ( $pe_team_locations_hides ) ) selected( $pe_team_locations_hides, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														<option value="1" <?php if ( isset ( $pe_team_locations_hides ) ) selected( $pe_team_locations_hides, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Location Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Location Font Size. default font size: 15px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_location_fontsize" id="pe_team_location_fontsize" maxlength="4" class="timezone_string" value="<?php if($pe_team_location_fontsize !=''){echo $pe_team_location_fontsize; }else{ echo '15';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Location Font Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team Member Location Font Color. default font color: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_location_color" id="pe_team_location_color" class="timezone_string" value="<?php  if($pe_team_location_color !=''){echo $pe_team_location_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								       		<?php _e('Member Short Description Settings', 'team-ultimate');?></div>
								        <div>
								    	<input type="hidden" name="sort_array[]" value="contentsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Team Content', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('show/hide team member content details. default: Show', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_hide_content" id="pe_team_hide_content" class="timezone_string">
														<option value="2" <?php if ( isset ( $pe_team_hide_content ) ) selected( $pe_team_hide_content, '2' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
														<option value="1" <?php if ( isset ( $pe_team_hide_content ) ) selected( $pe_team_hide_content, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Content Text Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member content text color. default color: #fdfdfd', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_details_color" id="pe_team_details_color" class="timezone_string" value="<?php  if($pe_team_details_color !=''){echo $pe_team_details_color; }else{ echo '#000';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Content Font Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member content text size. default text size: 14px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_details_size" id="pe_team_details_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_details_size !=''){echo $pe_team_details_size; }else{ echo '14';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Member Background Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team member Background color. default color:#fafafa', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_memberbg_color" id="pe_team_memberbg_color" class="timezone_string" value="<?php  if($pe_team_memberbg_color !=''){echo $pe_team_memberbg_color; }else{ echo '#fafafa';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Member Overlay Bg Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team member Overlay color. default color:#f8f8f8', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_overlaybg_color" id="pe_team_overlaybg_color" class="timezone_string" value="<?php  if($pe_team_overlaybg_color !=''){echo $pe_team_overlaybg_color; }else{ echo '#324957';} ?>">
												</div>
											</div><!-- End -->
								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Social icons Settings', 'team-ultimate');?></div>
								        <div>
								    	<input type="hidden" name="sort_array[]" value="socialsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Social Icons', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Show or Hide Team Social icons. select Hide to disable team member social icons.', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_hide_social" id="pe_team_hide_social" class="timezone_string">
														<option value="1" <?php if ( isset ( $pe_team_hide_social ) ) selected( $pe_team_hide_social, '1' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														<option disabled value="2" <?php if ( isset ( $pe_team_hide_social ) ) selected( $pe_team_hide_social, '2' ); ?>><?php _e('Hide (Only Pro)', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Social Icons Style', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose social icons style. default style: square', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_social_style" id="pe_team_social_style" class="timezone_string">
														<option value="1" <?php if ( isset ( $pe_team_social_style ) ) selected( $pe_team_social_style, '1' ); ?>><?php _e('Square', 'team-ultimate');?></option>
														<option disabled value="2" <?php if ( isset ( $pe_team_social_style ) ) selected( $pe_team_social_style, '2' ); ?>><?php _e('Round (Only Pro)', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Social Icon Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team social icons color. default: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_socialicon_color" id="pe_team_socialicon_color" class="timezone_string" value="<?php  if($pe_team_socialicon_color !=''){echo $pe_team_socialicon_color; }else{ echo '#333333';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Social Icon Bg Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team social icons Background color. default: #333333', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_socialicon_colorbg" id="pe_team_socialicon_colorbg" class="timezone_string" value="<?php  if($pe_team_socialicon_colorbg !=''){echo $pe_team_socialicon_colorbg; }else{ echo '#ffffff';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Social Icon Size', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose Team member social icon font size. default size: 15px', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="number" name="pe_team_socialicon_size" id="pe_team_socialicon_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_socialicon_size !=''){echo $pe_team_socialicon_size; }else{ echo '15';} ?>">
												</div>
											</div><!-- End -->
								        </div>
								    </li>

								    <li class="ui-state-default tup-drag">
								        <div>
								        	<div class="acc_head_moveleft">
								        		<span class="moveicons"><i class="fa fa-arrows-v"></i></span>
								        	</div>
											<div class="acc_head_icons">
												<span class="plusicons"><i class="fa fa-angle-down"></i></span>
												<span class="minusicons"><i class="fa fa-angle-up"></i></span>
											</div>
								        <?php _e('Member Skill Settings (Pro Only)', 'team-ultimate');?></div>
								        <div>
								    	<input type="hidden" name="sort_array[]" value="skillsettings">
											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Show/Hide Team Skills', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('show/hide team member skills. default: hide', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<select name="pe_team_hide_skills" id="pe_team_hide_skills" class="timezone_string">
														<option value="2" <?php if ( isset ( $pe_team_hide_skills ) ) selected( $pe_team_hide_skills, '2' ); ?>><?php _e('Show', 'team-ultimate');?></option>
														<option value="1" <?php if ( isset ( $pe_team_hide_skills ) ) selected( $pe_team_hide_skills, '1' ); ?>><?php _e('Hide', 'team-ultimate');?></option>
													</select>
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Skills Text Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team social icons Background color. default: #000000', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_skills_textcolors" id="pe_team_skills_textcolors" class="timezone_string" value="<?php  if($pe_team_skills_textcolors !=''){echo $pe_team_skills_textcolors; }else{ echo '#000000';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Skills line Bg Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member skills line Background color. default: #959595', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_skills_linecolors" id="pe_team_skills_linecolors" class="timezone_string" value="<?php  if($pe_team_skills_linecolors !=''){echo $pe_team_skills_linecolors; }else{ echo '#959595';} ?>">
												</div>
											</div><!-- End -->

											<div class="column-customize-inner">
												<div class="column-heading-area">
													<span class="sub-heading"><?php _e('Skills Animate Color', 'team-ultimate');?></span>
													<span class="sub-description"><?php _e('Choose team member skills line animation Background color. default: #f4392f', 'team-ultimate');?> </span>
												</div>
												<div class="column-dropdown-items">
													<input type="text" name="pe_team_skills_hvrcolors" id="pe_team_skills_hvrcolors" class="timezone_string" value="<?php  if($pe_team_skills_hvrcolors !=''){echo $pe_team_skills_hvrcolors; }else{ echo '#f4392f';} ?>">
												</div>
											</div><!-- End -->

								        </div>
								    </li>
									<?php
								}
								?>
								</ul>
								<script>
									jQuery(document).ready(function($){
									    $("#myaccordions").accordionjs({
									        // Allow self close.<em>(data-close-able)</em>
									        closeAble   : false,

									        // Close other sections.<em>(data-close-other)</em>
									        closeOther  : true,

									        // Animation Speed.<em>(data-slide-speed)</em>
									        slideSpeed  : 200,

									        // The section open on first init. A number from 1 to X or false.<em>(data-active-index)</em>
									        activeIndex : false,

									        // Callback when a section is open
									        openSection: function( section ){},

									        // Callback before a section is open
									        beforeOpenSection: function( section ){},
									    });
									});
								</script>
							</div>
						</div>
					</div>
				</li>

				<!-- Tab 4  -->
				<li style="<?php if($pe_team_navtabs == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($pe_team_navtabs == 3){echo "active";}?>">

					<div class="option-box" id="test01">
						<p class="option-title">Grid Settings <span class="prohints"><a target="_blank" href="https://pickelements.com">(Upgrade Pro to unlock all features)</a></span></p>

						<div class="wrap">
							<div class="pe-teamcustomize-area">
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Grid Type', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select team grid type default or filterable. default: Default Grid', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_gridtypes" id="pe_team_gridtypes" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_gridtypes ) ) selected( $pe_team_gridtypes, '1' ); ?>><?php _e('Default Grid', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_gridtypes ) ) selected( $pe_team_gridtypes, '2' ); ?>><?php _e('Filterable Grid (Only Pro)', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Select Column -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Select Grid Column', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Showcase grid columns. default column: 3', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_teamtotal_column" id="pe_teamtotal_column" class="timezone_string">
											<option value="3" <?php if ( isset ( $pe_teamtotal_column ) ) selected( $pe_teamtotal_column, '3' ); ?>><?php _e('Column 3', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_teamtotal_column ) ) selected( $pe_teamtotal_column, '2' ); ?>><?php _e('Column 2', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_teamtotal_column ) ) selected( $pe_teamtotal_column, '4' ); ?>><?php _e('Column 4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_teamtotal_column ) ) selected( $pe_teamtotal_column, '5' ); ?>><?php _e('Column 5', 'team-ultimate');?></option>
											<option value="6" <?php if ( isset ( $pe_teamtotal_column ) ) selected( $pe_teamtotal_column, '6' ); ?>><?php _e('Column 6', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Select Column -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Column Margin Left/Right', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose team member column margin left or right.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="number" name="pe_team_marginleftright_size" id="pe_team_marginleftright_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_marginleftright_size !=''){echo $pe_team_marginleftright_size; }else{ echo '5';} ?>">
									</div>
								</div><!-- End Team Member Items Margin -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Column Margin Bottom', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose team member column margin Bottom.', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="number" name="pe_team_marginbottom_size" id="pe_team_marginbottom_size" maxlength="4" class="timezone_string" value="<?php if($pe_team_marginbottom_size !=''){echo $pe_team_marginbottom_size; }else{ echo '15';} ?>">
									</div>
								</div><!-- End Team Member Items Margin -->

								<div class="hide-filter-style" id="type1" style="<?php if($pe_team_gridtypes == 1){	echo "display:none;"; }?>">
									
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Filter Menu Position', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Filter Menu Position. default Position: Center', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_filter_menu_position" id="pe_team_filter_menu_position" class="timezone_string">
											<option value="center" <?php if ( isset ( $pe_team_filter_menu_position ) ) selected( $pe_team_filter_menu_position, 'center' ); ?>><?php _e('Center', 'team-ultimate');?></option>
											<option value="left" <?php if ( isset ( $pe_team_filter_menu_position ) ) selected( $pe_team_filter_menu_position, 'left' ); ?>><?php _e('Left', 'team-ultimate');?></option>
											<option value="right" <?php if ( isset ( $pe_team_filter_menu_position ) ) selected( $pe_team_filter_menu_position, 'right' ); ?>><?php _e('Right', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Filter Menu Position -->
									
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Filter Menu Style', 'testeam-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Filter Menu Style. default Style: Menu default', 'testeam-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_filter_menu_style" id="pe_team_filter_menu_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_filter_menu_style ) ) selected( $pe_team_filter_menu_style, '1' ); ?>><?php _e('Menu default', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_filter_menu_style ) ) selected( $pe_team_filter_menu_style, '2' ); ?>><?php _e('Menu Style 1', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_filter_menu_style ) ) selected( $pe_team_filter_menu_style, '3' ); ?>><?php _e('Menu Style 2', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Grid Filter Menu Style -->
									
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Menu Text Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Filter Menu Text Color. default Color: #000', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_filter_menutext_color" id="pe_team_filter_menutext_color" class="timezone_string" value="<?php  if($pe_team_filter_menutext_color !=''){echo $pe_team_filter_menutext_color; }else{ echo '#000';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Text Color -->
									
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Menu Background Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Filter Menu Background Color. default Color: #f8f8f8', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_filter_menubg_color" id="pe_team_filter_menubg_color" class="timezone_string" value="<?php  if($pe_team_filter_menubg_color !=''){echo $pe_team_filter_menubg_color; }else{ echo '#f8f8f8';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->
									
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Menu Hover Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Filter Menu Hover Color. default Color: #fff', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_filter_menuhover_color" id="pe_team_filter_menuhover_color" class="timezone_string" value="<?php  if($pe_team_filter_menuhover_color !=''){echo $pe_team_filter_menuhover_color; }else{ echo '#fff';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->
									
								<div class="column-customize-inner extra-border">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Menu Hover Bg Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team filter menu hover Background color. default Color: #11b8ea', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_filter_menubghover_color" id="pe_team_filter_menubghover_color" class="timezone_string" value="<?php  if($pe_team_filter_menubghover_color !=''){echo $pe_team_filter_menubghover_color; }else{ echo '#11b8ea';} ?>">
									</div>
								</div><!-- End Testimonial Grid Menu Hover Bg Color -->

								</div>
							</div>
						</div>
					</div>

					<!-- Start Tab Two -->
					<div class="option-box" id="test02">
						<p class="option-title">Slider Settings <span class="prohints"><a target="_blank" href="https://pickelements.com">(Available Only Pro Version)</a></span></p>
						<div class="wrap">
							<div class="pe-teamcustomize-area">
								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Autoplay', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Member Autoplay options. default Autoplay: Enable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_autoplay" id="pe_team_item_autoplay" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_autoplay ) ) selected( $pe_team_item_autoplay, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
											<option value="false" <?php if ( isset ( $pe_team_item_autoplay ) ) selected( $pe_team_item_autoplay, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Autoplay -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Auto Hide Mode', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Auto Hide Mode. default Mode: Enable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_autohide" id="pe_team_item_autohide" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_autohide ) ) selected( $pe_team_item_autohide, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
											<option value="false" <?php if ( isset ( $pe_team_item_autohide ) ) selected( $pe_team_item_autohide, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Auto Hide Mode -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Centered Mode', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Centered Mode. default Mode: Disable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_centermode" id="pe_team_item_centermode" class="timezone_string">
											<option value="false" <?php if ( isset ( $pe_team_item_centermode ) ) selected( $pe_team_item_centermode, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
											<option value="true" <?php if ( isset ( $pe_team_item_centermode ) ) selected( $pe_team_item_centermode, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Centered Mode -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Slide Delay', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team slide delay speed. input only number(700,800,1200 etc)', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_autoplayspeed" id="pe_team_item_autoplayspeed" maxlength="4" class="timezone_string" required value="<?php  if($pe_team_item_autoplayspeed !=''){echo $pe_team_item_autoplayspeed; }else{ echo '1500';} ?>">
									</div>
								</div><!-- End Testimonial Slider Slide Delay -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Stop Hover', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Stop Hover Mode. default Mode: Enable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_stophover" id="pe_team_item_stophover" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_stophover ) ) selected( $pe_team_item_stophover, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>	
											<option value="false" <?php if ( isset ( $pe_team_item_stophover ) ) selected( $pe_team_item_stophover, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Stop Hover -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Autoplay Time Out (Sec)', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Autoplay time out (Sec). default:(1000sec)', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_autoplaytimeout" id="pe_team_item_autoplaytimeout" class="timezone_string">
											<option value="1000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '1000' ); ?>><?php _e('1', 'team-ultimate');?></option>
											<option value="2000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '2000' ); ?>><?php _e('2 ', 'team-ultimate');?></option>
											<option value="3000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '3000' ); ?>><?php _e('3 ', 'team-ultimate');?></option>
											<option value="4000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '4000' ); ?>><?php _e('4 ', 'team-ultimate');?></option>
											<option value="5000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '5000' ); ?>><?php _e('5 ', 'team-ultimate');?></option>
											<option value="6000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '6000' ); ?>><?php _e('6 ', 'team-ultimate');?></option>
											<option value="7000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '7000' ); ?>><?php _e('7 ', 'team-ultimate');?></option>
											<option value="8000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '8000' ); ?>><?php _e('8 ', 'team-ultimate');?></option>
											<option value="9000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '9000' ); ?>><?php _e('9 ', 'team-ultimate');?></option>
											<option value="10000" <?php if ( isset ( $pe_team_item_autoplaytimeout ) ) selected( $pe_team_item_autoplaytimeout, '10000' ); ?>><?php _e('10', 'team-ultimate');?></option>
										</select>	
									</div>
								</div><!-- End Testimonial Slider Autoplay Time Out (Sec) -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Items No', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team total item display per slide. default: 3 items', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_all_items" id="pe_team_all_items" class="timezone_string">
											<option value="3" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '3' ); ?>><?php _e('3', 'team-ultimate');?></option>
											<option value="1" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '1' ); ?>><?php _e('1', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '2' ); ?>><?php _e('2', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '4' ); ?>><?php _e('4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '5' ); ?>><?php _e('5 ', 'team-ultimate');?></option>
											<option value="6" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '6' ); ?>><?php _e('6 ', 'team-ultimate');?></option>
											<option value="7" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '7' ); ?>><?php _e('7 ', 'team-ultimate');?></option>
											<option value="8" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '8' ); ?>><?php _e('8 ', 'team-ultimate');?></option>
											<option value="9" <?php if ( isset ( $pe_team_all_items ) )  selected( $pe_team_all_items, '9' ); ?>><?php _e('9 ', 'team-ultimate');?></option>
											<option value="10" <?php if ( isset ( $pe_team_all_items ) ) selected( $pe_team_all_items, '10' ); ?>><?php _e('10 ', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items No -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Items Desktop', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team total items display on desktop. default:3 ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_all_itemsdesktop" id="pe_team_all_itemsdesktop" class="timezone_string">
											<option value="3" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '3' ); ?>><?php _e('3', 'team-ultimate');?></option>
											<option value="1" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '1' ); ?>><?php _e('1', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '2' ); ?>><?php _e('2', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '4' ); ?>><?php _e('4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '5' ); ?>><?php _e('5', 'team-ultimate');?></option>
											<option value="6" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '6' ); ?>><?php _e('6', 'team-ultimate');?></option>
											<option value="7" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '7' ); ?>><?php _e('7', 'team-ultimate');?></option>
											<option value="8" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '8' ); ?>><?php _e('8', 'team-ultimate');?></option>
											<option value="9" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '9' ); ?>><?php _e('9', 'team-ultimate');?></option>
											<option value="10" <?php if ( isset ( $pe_team_all_itemsdesktop ) ) selected( $pe_team_all_itemsdesktop, '10' ); ?>><?php _e('10', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Desktop -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Items Desktop Small', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team total items display on desktop small. default:1', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_all_itemsdesktopsmall" id="pe_team_all_itemsdesktopsmall" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '1' ); ?>><?php _e('1', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '2' ); ?>><?php _e('2', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '3' ); ?>><?php _e('3', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '4' ); ?>><?php _e('4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '5' ); ?>><?php _e('5', 'team-ultimate');?></option>
											<option value="6" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '6' ); ?>><?php _e('6', 'team-ultimate');?></option>
											<option value="7" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '7' ); ?>><?php _e('7', 'team-ultimate');?></option>
											<option value="8" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '8' ); ?>><?php _e('8', 'team-ultimate');?></option>
											<option value="9" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '9' ); ?>><?php _e('9', 'team-ultimate');?></option>
											<option value="10" <?php if ( isset ( $pe_team_all_itemsdesktopsmall ) ) selected( $pe_team_all_itemsdesktopsmall, '10' ); ?>><?php _e('10', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Desktop Small -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Items Mobile', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team total items display on Mobile. default:1', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_all_itemsmobile" id="pe_team_all_itemsmobile" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '1' ); ?>><?php _e('1', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '2' ); ?>><?php _e('2', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '3' ); ?>><?php _e('3', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '4' ); ?>><?php _e('4', 'team-ultimate');?></option>
											<option value="5" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '5' ); ?>><?php _e('5', 'team-ultimate');?></option>
											<option value="6" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '6' ); ?>><?php _e('6', 'team-ultimate');?></option>
											<option value="7" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '7' ); ?>><?php _e('7', 'team-ultimate');?></option>
											<option value="8" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '8' ); ?>><?php _e('8', 'team-ultimate');?></option>
											<option value="9" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '9' ); ?>><?php _e('9', 'team-ultimate');?></option>
											<option value="10" <?php if ( isset ( $pe_team_all_itemsmobile ) ) selected( $pe_team_all_itemsmobile, '10' ); ?>><?php _e('10', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Items Mobile -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Loop', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team items loop. default Mode: Enable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_loop" id="pe_team_item_loop" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_loop ) ) selected( $pe_team_item_loop, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
											<option value="false" <?php if ( isset ( $pe_team_item_loop ) ) selected( $pe_team_item_loop, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Loop -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Margin', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team items margin size. default margin:10px ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="number" name="pe_team_item_margin" id="pe_team_item_margin" maxlength="3" class="timezone_string" value="<?php if($pe_team_item_margin !=''){echo $pe_team_item_margin;} else{ echo '10'; } ?>" value="0">
									</div>
								</div><!-- End Testimonial Slider Margin -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Navigation Mode. default Mode: Enable', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_navigation" id="pe_team_item_navigation" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_navigation ) ) selected( $pe_team_item_navigation, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
											<option value="false" <?php if ( isset ( $pe_team_item_navigation ) ) selected( $pe_team_item_navigation, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Navigation -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation Position', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Select Team Navigation Position. default Position: Top Right', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_navigation_position" id="pe_team_item_navigation_position" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_item_navigation_position ) ) selected( $pe_team_item_navigation_position, '1' ); ?>><?php _e('Top Right', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_item_navigation_position ) ) selected( $pe_team_item_navigation_position, '2' ); ?>><?php _e('Top Left', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_item_navigation_position ) ) selected( $pe_team_item_navigation_position, '3' ); ?>><?php _e('Bottom Center', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_item_navigation_position ) ) selected( $pe_team_item_navigation_position, '4' ); ?>><?php _e('Centred', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Navigation Position -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Navigation text color. default color:#ffffff ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_navtext_color" id="pe_team_item_navtext_color" class="timezone_string" value="<?php  if($pe_team_item_navtext_color !=''){echo $pe_team_item_navtext_color; }else{ echo '#ffffff';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation Hover Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Navigation Hover Color. default color:#dddddd ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_navtext_color_hover" id="pe_team_item_navtext_color_hover" class="timezone_string" value="<?php  if($pe_team_item_navtext_color_hover !=''){echo $pe_team_item_navtext_color_hover; }else{ echo '#dddddd';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Hover Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation Background Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Navigation Background Color. default color:#000 ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_navbg_colors" id="pe_team_item_navbg_colors" class="timezone_string" value="<?php  if($pe_team_item_navbg_colors !=''){echo $pe_team_item_navbg_colors; }else{ echo '#000';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Background Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Navigation Hover Background Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Navigation Hover Background Color. default color:#666', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_navbghovers_colors" id="pe_team_item_navbghovers_colors" class="timezone_string" value="<?php  if($pe_team_item_navbghovers_colors !=''){echo $pe_team_item_navbghovers_colors; }else{ echo '#666';} ?>">
									</div>
								</div><!-- End Testimonial Slider Navigation Hover Background Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Pagination', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Enable or Disable. default Mode: Enable ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_pagination" id="pe_team_item_pagination" class="timezone_string">
											<option value="true" <?php if ( isset ( $pe_team_item_pagination ) ) selected( $pe_team_item_pagination, 'true' ); ?>><?php _e('True', 'team-ultimate');?></option>
											<option value="false" <?php if ( isset ( $pe_team_item_pagination ) ) selected( $pe_team_item_pagination, 'false' ); ?>><?php _e('False', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Pagination Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Pagination Color. default color:#000000 ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_pagination_color" id="pe_team_item_pagination_color" class="timezone_string" value="<?php  if($pe_team_item_pagination_color !=''){echo $pe_team_item_pagination_color; }else{ echo '#000000';} ?>">
									</div>
								</div><!-- End Testimonial Slider Pagination Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Pagination Background Color', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Pagination Background Color. default color:#b1b1b1 ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<input type="text" name="pe_team_item_pagination_bgcolor" id="pe_team_item_pagination_bgcolor" class="timezone_string" value="<?php  if($pe_team_item_pagination_bgcolor !=''){echo $pe_team_item_pagination_bgcolor; }else{ echo '#b1b1b1';} ?>">
									</div>
								</div><!-- End Testimonial Slider Pagination Background Color -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Pagination Style', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team Pagination style. default style: Round ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_pagination_style" id="pe_team_item_pagination_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $pe_team_item_pagination_style ) ) selected( $pe_team_item_pagination_style, '1' ); ?>><?php _e('Round', 'team-ultimate');?></option>
											<option value="2" <?php if ( isset ( $pe_team_item_pagination_style ) ) selected( $pe_team_item_pagination_style, '2' ); ?>><?php _e('Square', 'team-ultimate');?></option>
											<option value="3" <?php if ( isset ( $pe_team_item_pagination_style ) ) selected( $pe_team_item_pagination_style, '3' ); ?>><?php _e('Star', 'team-ultimate');?></option>
											<option value="4" <?php if ( isset ( $pe_team_item_pagination_style ) ) selected( $pe_team_item_pagination_style, '4' ); ?>><?php _e('Line', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination Style -->

								<div class="column-customize-inner">
									<div class="column-heading-area">
										<span class="sub-heading"><?php _e('Pagination Position', 'team-ultimate');?></span>
										<span class="sub-description"><?php _e('Choose Team title font size. default font size:16px ', 'team-ultimate');?> </span>
									</div>
									<div class="column-dropdown-items">
										<select name="pe_team_item_paginationposition" id="pe_team_item_paginationposition" class="timezone_string">
											<option value="center" <?php if ( isset ( $pe_team_item_paginationposition ) ) selected( $pe_team_item_paginationposition, 'center' ); ?>><?php _e('Center', 'team-ultimate');?></option>
											<option value="left" <?php if ( isset ( $pe_team_item_paginationposition ) ) selected( $pe_team_item_paginationposition, 'left' ); ?>><?php _e('Left', 'team-ultimate');?></option>
											<option value="right" <?php if ( isset ( $pe_team_item_paginationposition ) ) selected( $pe_team_item_paginationposition, 'right' ); ?>><?php _e('Right', 'team-ultimate');?></option>
										</select>
									</div>
								</div><!-- End Testimonial Slider Pagination Position -->
							</div>
						</div>
					</div> <!-- end tab 2 -->

				</li>
			</ul>
		</div>
	<?php
	}

	# Accordion Plus Shortcode page MetaBox Options Save
	function pe_teamultimate_scode_meta_boxes_save($post_id){

		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_catslist'] ) ) {
			update_post_meta( $post_id, 'pe_team_catslist', $_POST[ 'pe_team_catslist' ] );
		} else {
            update_post_meta( $post_id, 'pe_team_catslist', 'unchecked' );
        }

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_styles'] ) ) {
			update_post_meta( $post_id, 'pe_team_styles', $_POST[ 'pe_team_styles' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_gridtypes'] ) ) {
			update_post_meta( $post_id, 'pe_team_gridtypes', $_POST[ 'pe_team_gridtypes' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_teamtotal_column'] ) ) {
			update_post_meta( $post_id, 'pe_teamtotal_column', $_POST[ 'pe_teamtotal_column' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_marginleftright_size'] ) ) {
			update_post_meta( $post_id, 'pe_team_marginleftright_size', $_POST[ 'pe_team_marginleftright_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_marginbottom_size'] ) ) {
			update_post_meta( $post_id, 'pe_team_marginbottom_size', $_POST[ 'pe_team_marginbottom_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_types'] ) ) {
			update_post_meta( $post_id, 'pe_team_types', $_POST[ 'pe_team_types' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_totall_pages'] ) ) {
			update_post_meta( $post_id, 'pe_team_totall_pages', $_POST[ 'pe_team_totall_pages' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_orderby'] ) ) {
			update_post_meta( $post_id, 'pe_team_orderby', $_POST[ 'pe_team_orderby' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_order'] ) ) {
			update_post_meta( $post_id, 'pe_team_order', $_POST[ 'pe_team_order' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_title_fontsize'] ) ) {
			update_post_meta( $post_id, 'pe_team_title_fontsize', $_POST[ 'pe_team_title_fontsize' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_title_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_title_color', $_POST[ 'pe_team_title_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['ppoint_title_alignment'] ) ) {
			update_post_meta( $post_id, 'ppoint_title_alignment', $_POST[ 'ppoint_title_alignment' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_title_transform'] ) ) {
			update_post_meta( $post_id, 'pe_team_title_transform', $_POST[ 'pe_team_title_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_title_fontstyle'] ) ) {
			update_post_meta( $post_id, 'pe_team_title_fontstyle', $_POST[ 'pe_team_title_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_title_fontweight'] ) ) {
			update_post_meta( $post_id, 'pe_team_title_fontweight', $_POST[ 'pe_team_title_fontweight' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_hide_skills'] ) ) {
			update_post_meta( $post_id, 'pe_team_hide_skills', $_POST[ 'pe_team_hide_skills' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_skills_textcolors'] ) ) {
			update_post_meta( $post_id, 'pe_team_skills_textcolors', $_POST[ 'pe_team_skills_textcolors' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_skills_linecolors'] ) ) {
			update_post_meta( $post_id, 'pe_team_skills_linecolors', $_POST[ 'pe_team_skills_linecolors' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_skills_hvrcolors'] ) ) {
			update_post_meta( $post_id, 'pe_team_skills_hvrcolors', $_POST[ 'pe_team_skills_hvrcolors' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_designation_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_designation_color', $_POST[ 'pe_team_designation_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_designation_hides'] ) ) {
			update_post_meta( $post_id, 'pe_team_designation_hides', $_POST[ 'pe_team_designation_hides' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_designation_fontsize'] ) ) {
			update_post_meta( $post_id, 'pe_team_designation_fontsize', $_POST[ 'pe_team_designation_fontsize' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_designation_transform'] ) ) {
			update_post_meta( $post_id, 'pe_team_designation_transform', $_POST[ 'pe_team_designation_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_designation_fontstyle'] ) ) {
			update_post_meta( $post_id, 'pe_team_designation_fontstyle', $_POST[ 'pe_team_designation_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_contact_hides'] ) ) {
			update_post_meta( $post_id, 'pe_team_contact_hides', $_POST[ 'pe_team_contact_hides' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_contact_fontsize'] ) ) {
			update_post_meta( $post_id, 'pe_team_contact_fontsize', $_POST[ 'pe_team_contact_fontsize' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_contact_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_contact_color', $_POST[ 'pe_team_contact_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_locations_hides'] ) ) {
			update_post_meta( $post_id, 'pe_team_locations_hides', $_POST[ 'pe_team_locations_hides' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_location_fontsize'] ) ) {
			update_post_meta( $post_id, 'pe_team_location_fontsize', $_POST[ 'pe_team_location_fontsize' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_location_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_location_color', $_POST[ 'pe_team_location_color' ]  );
		}

		#Value check and saves if needed
		if( isset( $_POST[ 'pe_team_navtabs' ] ) ) {
			update_post_meta( $post_id, 'pe_team_navtabs', $_POST['pe_team_navtabs'] );
		} else {
			update_post_meta( $post_id, 'pe_team_navtabs', 1 );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_email_hides'] ) ) {
			update_post_meta( $post_id, 'pe_team_email_hides', $_POST[ 'pe_team_email_hides' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_emails_fontsize'] ) ) {
			update_post_meta( $post_id, 'pe_team_emails_fontsize', $_POST[ 'pe_team_emails_fontsize' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_email_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_email_color', $_POST[ 'pe_team_email_color' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_email_hover_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_email_hover_color', $_POST[ 'pe_team_email_hover_color' ]  );
		}
		
		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_email_transform'] ) ) {
			update_post_meta( $post_id, 'pe_team_email_transform', $_POST[ 'pe_team_email_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_email_fontstyle'] ) ) {
			update_post_meta( $post_id, 'pe_team_email_fontstyle', $_POST[ 'pe_team_email_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_hide_social'] ) ) {
			update_post_meta( $post_id, 'pe_team_hide_social', $_POST[ 'pe_team_hide_social' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_social_style'] ) ) {
			update_post_meta( $post_id, 'pe_team_social_style', $_POST[ 'pe_team_social_style' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_socialicon_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_socialicon_color', $_POST[ 'pe_team_socialicon_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_socialicon_colorbg'] ) ) {
			update_post_meta( $post_id, 'pe_team_socialicon_colorbg', $_POST[ 'pe_team_socialicon_colorbg' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_socialicon_size'] ) ) {
			update_post_meta( $post_id, 'pe_team_socialicon_size', $_POST[ 'pe_team_socialicon_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_memberbg_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_memberbg_color', $_POST[ 'pe_team_memberbg_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_overlaybg_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_overlaybg_color', $_POST[ 'pe_team_overlaybg_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_hide_content'] ) ) {
			update_post_meta( $post_id, 'pe_team_hide_content', $_POST[ 'pe_team_hide_content' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_details_color'] ) ) {
			update_post_meta( $post_id, 'pe_team_details_color', $_POST[ 'pe_team_details_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pe_team_details_size'] ) ) {
			update_post_meta( $post_id, 'pe_team_details_size', $_POST[ 'pe_team_details_size' ]  );
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menu_position'])) {
			update_post_meta($post_id, 'pe_team_filter_menu_position', $_POST['pe_team_filter_menu_position']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menu_style'])) {
			update_post_meta($post_id, 'pe_team_filter_menu_style', $_POST['pe_team_filter_menu_style']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menutext_color'])) {
			update_post_meta($post_id, 'pe_team_filter_menutext_color', $_POST['pe_team_filter_menutext_color']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menubg_color'])) {
			update_post_meta($post_id, 'pe_team_filter_menubg_color', $_POST['pe_team_filter_menubg_color']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menuhover_color'])) {
			update_post_meta($post_id, 'pe_team_filter_menuhover_color', $_POST['pe_team_filter_menuhover_color']);
		}

		#Checks for input and saves if needed
		if(isset($_POST['pe_team_filter_menubghover_color'])) {
			update_post_meta($post_id, 'pe_team_filter_menubghover_color', $_POST['pe_team_filter_menubghover_color']);
		}

	    // Carousal Settings

		#Checks for input and sanitizes/saves if needed
	    if( isset($_POST['pe_team_all_items']) && ($_POST['pe_team_all_items'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_all_items', esc_html($_POST['pe_team_all_items']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_loop']) && ($_POST['pe_team_item_loop'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_loop', esc_html($_POST['pe_team_item_loop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['pe_team_item_margin'] ) ) {
	    	if(strlen($_POST['pe_team_item_margin']) > 2){     // input value length greate than 2 
	    	} else{
		    	if( $_POST['pe_team_item_margin'] == '' || $_POST['pe_team_item_margin'] == is_null($_POST['pe_team_item_margin']) ){
		    		update_post_meta( $post_id, 'pe_team_item_margin', 0 );
		    	}else{
		    		if (is_numeric($_POST['pe_team_item_margin'])) {
		    			update_post_meta( $post_id, 'pe_team_item_margin', esc_html($_POST['pe_team_item_margin']) );
		    		}
		    	}
	    	}
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navigation']) && ($_POST['pe_team_item_navigation'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navigation', esc_html($_POST['pe_team_item_navigation']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navigation_position']) && ($_POST['pe_team_item_navigation_position'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navigation_position', esc_html($_POST['pe_team_item_navigation_position']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_paginationposition']) && ($_POST['pe_team_item_paginationposition'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_paginationposition', esc_html($_POST['pe_team_item_paginationposition']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_pagination']) && ($_POST['pe_team_item_pagination'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_pagination', esc_html($_POST['pe_team_item_pagination']) );
	    }  

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_pagination_color']) && ($_POST['pe_team_item_pagination_color'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_pagination_color', esc_html($_POST['pe_team_item_pagination_color']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_pagination_bgcolor']) && ($_POST['pe_team_item_pagination_bgcolor'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_pagination_bgcolor', esc_html($_POST['pe_team_item_pagination_bgcolor']) );
	    } 

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_pagination_style']) && ($_POST['pe_team_item_pagination_style'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_pagination_style', esc_html($_POST['pe_team_item_pagination_style']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_autoplay']) && ($_POST['pe_team_item_autoplay'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_autoplay', esc_html($_POST['pe_team_item_autoplay']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['pe_team_item_autoplayspeed'] ) ) {
	    	if(strlen($_POST['pe_team_item_autoplayspeed']) > 4 ){
	    	} else{
	    		if($_POST['pe_team_item_autoplayspeed'] == '' || is_null($_POST['pe_team_item_autoplayspeed'])){
	    			update_post_meta( $post_id, 'pe_team_item_autoplayspeed', 1500 );
	    		}else{
		    		if (is_numeric($_POST['pe_team_item_margin']) && strlen($_POST['pe_team_item_autoplayspeed']) <= 4) {
		    			update_post_meta( $post_id, 'pe_team_item_autoplayspeed', esc_html($_POST['pe_team_item_autoplayspeed']) );
		    		}
	    		}
	    	}
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_autohide']) && ($_POST['pe_team_item_autohide'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_autohide', esc_html($_POST['pe_team_item_autohide']) );
	    } 
	    
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_centermode']) && ($_POST['pe_team_item_centermode'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_centermode', esc_html($_POST['pe_team_item_centermode']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_stophover']) && ($_POST['pe_team_item_stophover'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_stophover', esc_html($_POST['pe_team_item_stophover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_all_itemsdesktop']) && ($_POST['pe_team_all_itemsdesktop'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_all_itemsdesktop', esc_html($_POST['pe_team_all_itemsdesktop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_all_itemsdesktopsmall']) && ($_POST['pe_team_all_itemsdesktopsmall'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_all_itemsdesktopsmall', esc_html($_POST['pe_team_all_itemsdesktopsmall']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_all_itemsmobile']) && ($_POST['pe_team_all_itemsmobile'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_all_itemsmobile', esc_html($_POST['pe_team_all_itemsmobile']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_autoplaytimeout']) && ($_POST['pe_team_item_autoplaytimeout'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_autoplaytimeout', esc_html($_POST['pe_team_item_autoplaytimeout']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navtext_color']) && ($_POST['pe_team_item_navtext_color'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navtext_color', esc_html($_POST['pe_team_item_navtext_color']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navtext_color_hover']) && ($_POST['pe_team_item_navtext_color_hover'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navtext_color_hover', esc_html($_POST['pe_team_item_navtext_color_hover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navbg_colors']) && ($_POST['pe_team_item_navbg_colors'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navbg_colors', esc_html($_POST['pe_team_item_navbg_colors']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pe_team_item_navbghovers_colors']) && ($_POST['pe_team_item_navbghovers_colors'] != '') ) {
	        update_post_meta( $post_id, 'pe_team_item_navbghovers_colors', esc_html($_POST['pe_team_item_navbghovers_colors']) );
	    }

		if( isset( $_POST[ 'sort_array' ] ) ) {
		    update_post_meta( $post_id, 'sort_array', array_map( 'sanitize_text_field', $_POST[ 'sort_array' ] ) );
		}
	}
	add_action('save_post', 'pe_teamultimate_scode_meta_boxes_save');

	function pe_teamultimate_code_display_boxe( $post, $args ) {?>
		<p class="option-info"><?php _e('Copy this shortcode and paste it on the page or post where you want to display Team.','team-ultimate'); ?></p>
		<textarea cols="35" rows="1" onClick="this.select();" >[tmultmate <?php echo 'id="'.$post->ID.'"';?>]</textarea>
		<?php
	}	

	function pe_teamultimate_code_display_rate( $post, $args ) {?>
		<div class="support-area">
			<p><?php echo esc_html__( 'If you need any help or found any bugs in our plugin please do not hesitate to post it in the plugin support section. we are happy to solve our plugin issues.', 'team-ultimate' ); ?></p>
			<div class="pick-review">
				<a target="_blank" class="pickbtn" href="https://pickelements.com/contact"><?php echo esc_html__( 'Support', 'team-ultimate' ); ?></a>
			</div>
		</div>
		<?php
	}