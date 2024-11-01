<?php
	if ( ! defined('ABSPATH')) exit;  // if direct access 	

	// Register Custom Post Type
	function pe_teamultimate_mainpost_register() {
		$labels = array(
			'name'                  => _x( 'Team Ultimate', 'Post Type General Name', 'team-ultimate' ),
			'singular_name'         => _x( 'Team Ultimate', 'Post Type Singular Name', 'team-ultimate' ),
			'menu_name'             => __( 'Team Ultimate', 'team-ultimate' ),
			'name_admin_bar'        => __( 'Team Ultimate', 'team-ultimate' ),
			'archives'              => __( 'Team Archives', 'team-ultimate' ),
			'attributes'            => __( 'Team Attributes', 'team-ultimate' ),
			'parent_item_colon'     => __( 'Parent Team Member:', 'team-ultimate' ),
			'all_items'             => __( 'All Team Member', 'team-ultimate' ),
			'add_new_item'          => __( 'Add New Member', 'team-ultimate' ),
			'add_new'               => __( 'Add New Member', 'team-ultimate' ),
			'new_item'              => __( 'New Team Member', 'team-ultimate' ),
			'edit_item'             => __( 'Edit Team Member', 'team-ultimate' ),
			'update_item'           => __( 'Update Team Member', 'team-ultimate' ),
			'view_item'             => __( 'View Team Member', 'team-ultimate' ),
			'view_items'            => __( 'View Team Member', 'team-ultimate' ),
			'search_items'          => __( 'Search Team Member', 'team-ultimate' ),
			'not_found'             => __( 'Team Member Not found', 'team-ultimate' ),
			'not_found_in_trash'    => __( 'Team Member Not found in Trash', 'team-ultimate' ),
			'featured_image'        => __( 'Member Featured Image', 'team-ultimate' ),
			'set_featured_image'    => __( 'Set Member featured image', 'team-ultimate' ),
			'remove_featured_image' => __( 'Remove Member featured image', 'team-ultimate' ),
			'use_featured_image'    => __( 'Use as Member featured image', 'team-ultimate' ),
			'insert_into_item'      => __( 'Insert into Team Member', 'team-ultimate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'team-ultimate' ),
			'items_list'            => __( 'Team Member list', 'team-ultimate' ),
			'items_list_navigation' => __( 'Team Member list navigation', 'team-ultimate' ),
			'filter_items_list'     => __( 'Filter Team Member list', 'team-ultimate' ),
		);
		$args = array(
			'label'                 => __( 'Team Ultimate', 'team-ultimate' ),
			'description'           => __( 'Team Ultimate Post Description.', 'team-ultimate' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'teamultimate', $args );
	}
	add_action('init', 'pe_teamultimate_mainpost_register');

	// Register Custom Taxonomy
	function pe_teamultimate_reg_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Team Categories', 'Taxonomy General Name', 'team-ultimate' ),
			'singular_name'              => _x( 'Team Categories', 'Taxonomy Singular Name', 'team-ultimate' ),
			'menu_name'                  => __( 'Team Categories', 'team-ultimate' ),
			'all_items'                  => __( 'All Categories', 'team-ultimate' ),
			'parent_item'                => __( 'Parent Categories', 'team-ultimate' ),
			'parent_item_colon'          => __( 'Parent Categories:', 'team-ultimate' ),
			'new_item_name'              => __( 'New Categories Name', 'team-ultimate' ),
			'add_new_item'               => __( 'Add New Category', 'team-ultimate' ),
			'edit_item'                  => __( 'Edit Category', 'team-ultimate' ),
			'update_item'                => __( 'Update Category', 'team-ultimate' ),
			'view_item'                  => __( 'View Category', 'team-ultimate' ),
			'separate_items_with_commas' => __( 'Separate groups with commas', 'team-ultimate' ),
			'add_or_remove_items'        => __( 'Add or remove Category', 'team-ultimate' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'team-ultimate' ),
			'popular_items'              => __( 'Popular Categories', 'team-ultimate' ),
			'search_items'               => __( 'Search Categories', 'team-ultimate' ),
			'not_found'                  => __( 'Not Category Found', 'team-ultimate' ),
			'no_terms'                   => __( 'No Categories', 'team-ultimate' ),
			'items_list'                 => __( 'Categories list', 'team-ultimate' ),
			'items_list_navigation'      => __( 'Items list navigation', 'team-ultimate' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'query_var' => true,
			'rewrite' => true
		);
		register_taxonomy( 'teamultimate-tax', array( 'teamultimate' ), $args );
	}
	add_action( 'init', 'pe_teamultimate_reg_taxonomy', 0);

	/*----------------------------------------------------------------------
		Columns Declaration Function
	----------------------------------------------------------------------*/
	function pe_teamultimate_infos_rows($pe_teamultimate_infos_rows){
		$order='asc';
		if($_GET['order']=='asc') {
			$order='desc';
		}
		$pe_teamultimate_infos_rows = array(
			"cb" 				=> 	"<input type=\"checkbox\" />",
			"title" 			=> __('Full Name', 'team-ultimate'),
			"thumbnail" 		=> __('Thumbnail', 'team-ultimate'),
			"fullname" 			=> __('Designation', 'team-ultimate'),
			"ktstcategories" 	=> __('Categories', 'team-ultimate'),
			"date" 				=> __('Date', 'team-ultimate'),
		);
		return $pe_teamultimate_infos_rows;
	}

	/*----------------------------------------------------------------------
		Team Ultimate Value Function
	----------------------------------------------------------------------*/
	function pe_teamultimate_infos_cols( $pe_teamultimate_infos_rows, $post_id ){
		global $post;
		$width = (int) 80;
		$height = (int) 80;
		if ( 'thumbnail' == $pe_teamultimate_infos_rows ) {
			if ( has_post_thumbnail($post_id)) {
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				echo $thumb;
			}
			else {
				echo __('None');
			}
		}
		if ( 'fullname' 	== $pe_teamultimate_infos_rows ) {
			echo get_post_meta($post_id, 'teamultimate_designation', true);
		}
		if ( 'ktstcategories' == $pe_teamultimate_infos_rows ) {
			$terms = get_the_terms( $post_id , 'teamultimate-tax');
			$count = count( array( $terms ) );
			if ( $terms ) {
				$i = 0;
				foreach ( $terms as $term ) {
					if ( $i+1 != $count ) {
						echo ", ";
					}
					echo '<a href="'.admin_url( 'edit.php?post_type=teamultimate&teamultimate-tax='.$term->slug ).'">'.$term->name.'</a>';
					$i++;
				}
			}
		}
	}
	add_filter( 'manage_teamultimate_posts_columns', 'pe_teamultimate_infos_rows' );
	add_action( 'manage_teamultimate_posts_custom_column', 'pe_teamultimate_infos_cols', 10, 2 );

	# Team Member register taxonomies
	function pe_teamultimate_pro_postfilter_taxonomies($classes, $class, $ID){
		$taxonomy = 'teamultimate-tax';
		$terms = get_the_terms((int) $ID, $taxonomy);
		if(!empty($terms)){
			foreach((array) $terms as $order => $term){
				if(!in_array($term->slug, $classes)){
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}
	add_filter( 'post_class', 'pe_teamultimate_pro_postfilter_taxonomies', 10, 3);

	function pe_teamultimate_reg_shortcode_submenus(){
		add_submenu_page('edit.php?post_type=teamultimate', __('Create Shortcode', 'team-ultimate'), __('Create Shortcode', 'team-ultimate'), 'manage_options', 'post-new.php?post_type=teamshortcode');
	}
	add_action('admin_menu', 'pe_teamultimate_reg_shortcode_submenus');

	// Register Team Ultimate Custom shortcode Post Type
	function pe_teamultimate_reg_shortcode_posttypes() {

		$labels = array(
			'name'                  => _x( 'Team Shortcode', 'Post Type General Name', 'team-ultimate' ),
			'singular_name'         => _x( 'Team Shortcode', 'Post Type Singular Name', 'team-ultimate' ),
			'menu_name'             => __( 'Team Shortcode', 'team-ultimate' ),
			'name_admin_bar'        => __( 'Team Shortcode', 'team-ultimate' ),
			'archives'              => __( 'Team Archives', 'team-ultimate' ),
			'attributes'            => __( 'Team Attributes', 'team-ultimate' ),
			'parent_item_colon'     => __( 'Parent Shortcode:', 'team-ultimate' ),
			'all_items'             => __( 'All Shortcode', 'team-ultimate' ),
			'add_new_item'          => __( 'Add New Shortcode', 'team-ultimate' ),
			'add_new'               => __( 'Add New Shortcode', 'team-ultimate' ),
			'new_item'              => __( 'New Shortcode', 'team-ultimate' ),
			'edit_item'             => __( 'Edit Shortcode', 'team-ultimate' ),
			'update_item'           => __( 'Update Shortcode', 'team-ultimate' ),
			'view_item'             => __( 'View Shortcode', 'team-ultimate' ),
			'view_items'            => __( 'View Shortcode', 'team-ultimate' ),
			'search_items'          => __( 'Search Shortcode', 'team-ultimate' ),
			'not_found'             => __( 'Shortcode Not found', 'team-ultimate' ),
			'not_found_in_trash'    => __( 'Shortcode Not found in Trash', 'team-ultimate' ),
			'featured_image'        => __( 'Shortcode Featured Image', 'team-ultimate' ),
			'set_featured_image'    => __( 'Set teamultimatem featured image', 'team-ultimate' ),
			'remove_featured_image' => __( 'Remove teamultimatem featured image', 'team-ultimate' ),
			'use_featured_image'    => __( 'Use as teamultimatem featured image', 'team-ultimate' ),
			'insert_into_item'      => __( 'Insert into Shortcode', 'team-ultimate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'team-ultimate' ),
			'items_list'            => __( 'Shortcode list', 'team-ultimate' ),
			'items_list_navigation' => __( 'Shortcode list navigation', 'team-ultimate' ),
			'filter_items_list'     => __( 'Filter Shortcode list', 'team-ultimate' ),
		);
		$args = array(
			'label'                 => __( 'Team Settings', 'team-ultimate' ),
			'description'           => __( 'Team Settings Post Description.', 'team-ultimate' ),
			'labels'                => $labels,
			'supports'              => array( 'title'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu' 		  => 'edit.php?post_type=teamultimate',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'teamshortcode', $args );

	}
	add_action('init', 'pe_teamultimate_reg_shortcode_posttypes');

	# Testimonial Register Column
	function pic_teamultimate_reg_add_shortcode_column( $columns ) {
		$order='asc';
		if($_GET['order']=='asc') {
			$order='desc';
		}
		$columns = array(
			"cb"        => "<input type=\"checkbox\" />",
			"title"     => __('Title', 'team-ultimate'),
			"shortcode" => __('Shortcode', 'team-ultimate'),
			"date"      => __('Date', 'team-ultimate'),
		);
		return $columns;
	}
	add_filter( 'manage_teamshortcode_posts_columns' , 'pic_teamultimate_reg_add_shortcode_column' );

	# Testimonial Display Shortcode or Do Shortcode
	function pic_teamultimate_reg_add_posts_shortcode_display( $column, $post_id ) {
		 if ( $column == 'shortcode' ){ ?>
			<input style="background:#ddd" type="text" onClick="this.select();" value="[tmultmate <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
			<?php 
		}
	}
	add_action( 'manage_teamshortcode_posts_custom_column' , 'pic_teamultimate_reg_add_posts_shortcode_display', 10, 2 );


	function pe_teamultimate_reg_socialskills_boxes() {
		$wpsvg = array( 'teamultimate' );
	    add_meta_box(
	        'wpteammeta_inner_register',                          	# Metabox
	        __( 'Member Social Profiles', 'team-ultimate' ),           # Title
	        'display_wpsteamcpm_metasbox',                       	# Call Back func
	       	$wpsvg,                                         		# post type
	        'normal'                                            	# Text Content
	    );
	    add_meta_box( 
	        'wpsvgallery_meta_box_id121',                          # Metabox
	        __( 'Add Member Skills', 'team-ultimate' ),           			# Title
	        'display_all_skills_inputs_fields',                       # Call Back func
	       	$wpsvg,                                         		# post type
	        'normal'                                            	# Text Content
	    );
	}
	add_action( 'add_meta_boxes', 'pe_teamultimate_reg_socialskills_boxes' );

	# Neta Box
	function display_all_skills_inputs_fields( $post, $args) {
		global $post;
		$wpteams_social_repetable_fields	= get_post_meta($post->ID, 'wpteams_social_repetable_fields', true);
		wp_nonce_field( 'wpteams_social_repetable_metanonce', 'wpteams_social_repetable_metanonce' );
		?>

		<div id="repeatable-fieldset-one">
			<div class="allskills">
				<?php
				if ( $wpteams_social_repetable_fields ) :

				foreach ( $wpteams_social_repetable_fields as $skillfields ) {
				?>
					<div class="removeskills">
						<div class="skillsbardrag"><a class="sortskillbars"><i class="fa fa-arrows"></i></a></div>
						<div class="skillsbarnamefield"><input type="text" class="widefat" name="name[]" value="<?php if($skillfields['name'] != '') echo esc_attr( $skillfields['name'] ); ?>" /></div>

						<div class="skillsbarnamefield"><input type="number" class="widefat" name="skillnumbers[]" value="<?php if($skillfields['skillnumbers'] != '') echo esc_attr( $skillfields['skillnumbers'] ); ?>" /></div>
						<div class="skillsbarremove"><a class="button remove-row" href="#">Remove Skill</a></div>
					</div>
				<?php
				}
				else :
				// show a blank one
				?>

				<?php endif; ?>
			
				<!-- empty hidden one for jQuery -->
				<div class="empty-row screen-reader-text removeskills">
					<div class="skillsbardrag"><a class="sortskillbars"><i class="fa fa-arrows"></i></a></div>
					<div class="skillsbarnamefield"><input type="text" class="widefat" placeholder="Skill Name" name="name[]" /></div>
					<div class="skillsbarnamefield"><input type="number" class="widefat" placeholder="95" name="skillnumbers[]" /></div>
					<div class="skillsbarremove"><a class="button remove-row" href="#">Remove Skill</a></div>
				</div>
			</div>
		</div>

		<div class="addskills"><a id="add-row" class="button" href="#">Add Skills</a></div>
		<span class="dragnote" style="padding: 10px 0px; display: block; overflow: hidden;">Note: Drag and Drop Order Features Available only Pro version.</span>

		<script>
			jQuery(document).ready(function($){
				$('#add-row').on('click', function() {
				var row = $('.empty-row.screen-reader-text').clone(true);
				row.removeClass('empty-row screen-reader-text');
				row.insertBefore('#repeatable-fieldset-one .allskills>.removeskills:last');
				return false;
			});
			$('.remove-row').on('click', function() {
				$(this).parents('.removeskills').remove();
				return false;
			});
		 // 	$('#repeatable-fieldset-one .allskills').sortable({
			// 	opacity: 0.6,
			// 	revert: true,
			// 	cursor: 'move',
			// 	handle: '.sortskillbars'
			// }); 
		});
		</script>

		<?php
	}

	function pe_teamultimate_reg_socialskillsaveboxes($post_id) {

		if ( ! isset( $_POST['wpteams_social_repetable_metanonce'] ) ||
		! wp_verify_nonce( $_POST['wpteams_social_repetable_metanonce'], 'wpteams_social_repetable_metanonce' ) )
			return;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if (!current_user_can('edit_post', $post_id))
			return;

		$old = get_post_meta($post_id, 'wpteams_social_repetable_fields', true);
		$new = array();
		
		$names = $_POST['name'];
		$skillnumberss = $_POST['skillnumbers'];
		
		$count = count( $names );
		
		for ( $i = 0; $i < $count; $i++ ) {
			if ( $names[$i] != '' ) :
				$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );


				if ( $skillnumberss[$i] == '' )
					$new[$i]['skillnumbers'] = '';
				else
					$new[$i]['skillnumbers'] = stripslashes( $skillnumberss[$i] ); // and however you want to sanitize

			endif;
		}
		if ( !empty( $new ) && $new != $old )
			update_post_meta( $post_id, 'wpteams_social_repetable_fields', $new );
		elseif ( empty($new) && $old )
			delete_post_meta( $post_id, 'wpteams_social_repetable_fields', $old );
	}
	add_action('save_post', 'pe_teamultimate_reg_socialskillsaveboxes');

	# Meta Box Dropdown Options
	function wpstesm_total_iocns_listers() {
		$totlacionsarray = array (
			'Facebook' 		=> 'fa-facebook',
			'Twitter' 		=> 'fa-twitter',
			'Google Plus' 	=> 'fa-google-plus',
			'Linkedin' 		=> 'fa-linkedin',
		);
		return $totlacionsarray;
	}
	
	# Neta Box
	function display_wpsteamcpm_metasbox( $post, $args) {
		global $post;

		$wpsteam_social_iconbox_repeat	= get_post_meta($post->ID, 'wpsteam_social_iconbox_repeat', true);
		$totlacionsarray 				= wpstesm_total_iocns_listers();
		wp_nonce_field( 'wpteam_socialmetabox_nonces', 'wpteam_socialmetabox_nonces' );
		
		?>

		<div id="repeatable_socialicons">
			<div class="allicolist">
				<?php

				if ( $wpsteam_social_iconbox_repeat ) :

				foreach ( $wpsteam_social_iconbox_repeat as $sciconsfield ) { ?>
					<div class="removescicons">
						<div class="sciconsdrag"><a class="sorticonlists"><i class="fa fa-arrows"></i></a></div>
						<div class="socialicons_field"><input type="text" class="widefat" name="sciconsurl[]" value="<?php if($sciconsfield['sciconsurl'] != '') echo esc_url( $sciconsfield['sciconsurl'] ); ?>" /></div>

						<div class="socialicons_select_field">
							<select name="select[]">
							<?php foreach ( $totlacionsarray as $label => $value ) : ?>
							<option value="<?php echo $value; ?>"<?php selected( $sciconsfield['select'], $value ); ?>><?php echo $label; ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="icondeletemove"><a class="button removeiconcolumns" href="#">Remove Social Profile</a></div>
					</div>
				<?php
				}
				else :
				// show a blank one
				?>

				<?php endif; ?>
			
				<!-- empty hidden one for jQuery -->
				<div class="emptyicons screen-reader-text removescicons">
					<div class="sciconsdrag"><a class="sorticonlists"><i class="fa fa-arrows"></i></a></div>
					<div class="socialicons_field"><input type="text" placeholder="https://example.com/username" class="widefat" name="sciconsurl[]" /></div>
					<div class="socialicons_select_field">
						<select name="select[]">
						<?php foreach ( $totlacionsarray as $label => $value ) : ?>
						<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="icondeletemove"><a class="button removeiconcolumns" href="#">Remove Social Profile</a></div>
				</div>
			</div>
		</div>

		<div class="addsocialbtn"><a id="addsocialicons" class="button" href="#">Add Social Profile</a></div>
		<span class="dragnote" style="padding: 10px 0px; display: block; overflow: hidden;">Note: Unlimited Icons & Drag/Drop Order Features Available only Pro version.</span>

		<script>
			jQuery(document).ready(function($){
				$('#addsocialicons').on('click', function() {
				var row = $('.emptyicons.screen-reader-text').clone(true);
				row.removeClass('emptyicons screen-reader-text');
				row.insertBefore('#repeatable_socialicons .allicolist>.removescicons:last');
				return false;
			});
			$('.removeiconcolumns').on('click', function() {
				$(this).parents('.removescicons').remove();
				return false;
			});
		 // 	$('#repeatable_socialicons .allicolist').sortable({
			// 	opacity: 0.6,
			// 	revert: true,
			// 	cursor: 'move',
			// 	handle: '.sorticonlists'
			// }); 
		});
		</script>
		<?php
	}

	function wpsteamsocial_icons_metasaves($post_id) {

		if ( ! isset( $_POST['wpteam_socialmetabox_nonces'] ) ||
		! wp_verify_nonce( $_POST['wpteam_socialmetabox_nonces'], 'wpteam_socialmetabox_nonces' ) )
			return;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if (!current_user_can('edit_post', $post_id))
			return;

		$sciconrepeat = get_post_meta($post_id, 'wpsteam_social_iconbox_repeat', true);
		$sciconsarray = array();
		
		$totlacionsarray = wpstesm_total_iocns_listers();
		
		$sciconsurls = $_POST['sciconsurl'];
		$selectsicon = $_POST['select'];
		
		$sccount = count( $sciconsurls );
		
		for ( $i = 0; $i < $sccount; $i++ ) {
			if ( $sciconsurls[$i] != '' ) :
				$sciconsarray[$i]['sciconsurl'] = stripslashes( $sciconsurls[$i] );

				if ( in_array( $selectsicon[$i], $totlacionsarray ) )
					$sciconsarray[$i]['select'] = $selectsicon[$i];
				else
					$sciconsarray[$i]['select'] = '';
			endif;
		}
		if ( !empty( $sciconsarray ) && $sciconsarray != $sciconrepeat )
			update_post_meta( $post_id, 'wpsteam_social_iconbox_repeat', $sciconsarray );
		elseif ( empty($sciconsarray) && $sciconrepeat )
			delete_post_meta( $post_id, 'wpsteam_social_iconbox_repeat', $sciconrepeat );
	}

	add_action('save_post', 'wpsteamsocial_icons_metasaves');