<?php
	if ( ! defined('ABSPATH')) exit;  // if direct access 	

	function pe_teamultimate_shortcode_attr( $atts, $content = null ) {
		global $post, $paged, $query;
		$atts = shortcode_atts(
			array(
				'id' => '',
		), $atts);
		$postid = $atts['id'];

		$pe_team_catslist   					= get_post_meta($postid, 'pe_team_catslist', true);
		$pe_team_styles   						= get_post_meta($postid, 'pe_team_styles', true);
		$pe_team_orderby   						= get_post_meta($postid, 'pe_team_orderby', true);
		$pe_team_order   						= get_post_meta($postid, 'pe_team_order', true);
		$pe_team_types   						= get_post_meta($postid, 'pe_team_types', true);
		$pe_team_totall_pages   				= get_post_meta($postid, 'pe_team_totall_pages', true);
		$pe_team_gridtypes  			 		= get_post_meta($postid, 'pe_team_gridtypes', true);
		$pe_teamtotal_column   					= get_post_meta($postid, 'pe_teamtotal_column', true);
		$pe_team_marginleftright_size   		= get_post_meta($postid, 'pe_team_marginleftright_size', true);
		$pe_team_marginbottom_size   			= get_post_meta($postid, 'pe_team_marginbottom_size', true);
		$pe_team_gridtypes   					= get_post_meta($postid, 'pe_team_gridtypes', true);

		// title options settings
		$pe_team_title_fontsize   				= get_post_meta($postid, 'pe_team_title_fontsize', true);
		$pe_team_title_color   					= get_post_meta($postid, 'pe_team_title_color', true);
		$pe_team_title_transform   				= get_post_meta($postid, 'pe_team_title_transform', true);
		$pe_team_title_fontstyle   				= get_post_meta($postid, 'pe_team_title_fontstyle', true);
		$pe_team_title_fontweight   			= get_post_meta($postid, 'pe_team_title_fontweight', true);

		// designation options settings
		$pe_team_designation_hides   			= get_post_meta($postid, 'pe_team_designation_hides', true);
		$pe_team_designation_fontsize   		= get_post_meta($postid, 'pe_team_designation_fontsize', true);
		$pe_team_designation_color   			= get_post_meta($postid, 'pe_team_designation_color', true);
		$pe_team_designation_transform   		= get_post_meta($postid, 'pe_team_designation_transform', true);
		$pe_team_designation_fontstyle   		= get_post_meta($postid, 'pe_team_designation_fontstyle', true);

		// Filter menu options
		$pe_team_filter_menu_position       	= get_post_meta($postid, 'pe_team_filter_menu_position', true);
		$pe_team_filter_menu_style           	= get_post_meta($postid, 'pe_team_filter_menu_style', true);
		$pe_team_filter_menutext_color          = get_post_meta($postid, 'pe_team_filter_menutext_color', true);
		$pe_team_filter_menubg_color         	= get_post_meta($postid, 'pe_team_filter_menubg_color', true);
		$pe_team_filter_menuhover_color      	= get_post_meta($postid, 'pe_team_filter_menuhover_color', true);
		$pe_team_filter_menubghover_color   	= get_post_meta($postid, 'pe_team_filter_menubghover_color', true);

		// Social Icon options
		$pe_team_hide_social   					= get_post_meta($postid, 'pe_team_hide_social', true);
		$pe_team_social_style   				= get_post_meta($postid, 'pe_team_social_style', true);
		$pe_team_socialicon_color   			= get_post_meta($postid, 'pe_team_socialicon_color', true);
		$pe_team_socialicon_colorbg   			= get_post_meta($postid, 'pe_team_socialicon_colorbg', true);
		$pe_team_socialicon_size   				= get_post_meta($postid, 'pe_team_socialicon_size', true);

		// Team content options
		$pe_team_memberbg_color   				= get_post_meta($postid, 'pe_team_memberbg_color', true);
		$pe_team_overlaybg_color   				= get_post_meta($postid, 'pe_team_overlaybg_color', true);
		$pe_team_details_color   				= get_post_meta($postid, 'pe_team_details_color', true);
		$pe_team_hide_content   				= get_post_meta($postid, 'pe_team_hide_content', true);
		$pe_team_details_size   				= get_post_meta($postid, 'pe_team_details_size', true);

		// Team content options
		$pe_team_hide_skills   					= get_post_meta($postid, 'pe_team_hide_skills', true);
		$pe_team_skills_textcolors   			= get_post_meta($postid, 'pe_team_skills_textcolors', true);
		$pe_team_skills_linecolors   			= get_post_meta($postid, 'pe_team_skills_linecolors', true);
		$pe_team_skills_hvrcolors   			= get_post_meta($postid, 'pe_team_skills_hvrcolors', true);

		$pe_team_contact_hides   				= get_post_meta($postid, 'pe_team_contact_hides', true);
		$pe_team_contact_fontsize   			= get_post_meta($postid, 'pe_team_contact_fontsize', true);
		$pe_team_contact_color   				= get_post_meta($postid, 'pe_team_contact_color', true);

		$pe_team_locations_hides   				= get_post_meta($postid, 'pe_team_locations_hides', true);
		$pe_team_location_fontsize   			= get_post_meta($postid, 'pe_team_location_fontsize', true);
		$pe_team_location_color   				= get_post_meta($postid, 'pe_team_location_color', true);

		$pe_team_email_hides   					= get_post_meta($postid, 'pe_team_email_hides', true);
		$pe_team_emails_fontsize   				= get_post_meta($postid, 'pe_team_emails_fontsize', true);
		$pe_team_email_color   					= get_post_meta($postid, 'pe_team_email_color', true);
		$pe_team_email_hover_color   			= get_post_meta($postid, 'pe_team_email_hover_color', true);
		$pe_team_email_transform   				= get_post_meta($postid, 'pe_team_email_transform', true);
		$pe_team_email_fontstyle   				= get_post_meta($postid, 'pe_team_email_fontstyle', true);

		 // slider options
	    $pe_team_all_items   					= get_post_meta($postid, 'pe_team_all_items', true);
	    $pe_team_item_autohide           		= get_post_meta($postid, 'pe_team_item_autohide', true);
	    $pe_team_item_centermode           		= get_post_meta($postid, 'pe_team_item_centermode', true);
	    $pe_team_all_itemsdesktop     			= get_post_meta($postid, 'pe_team_all_itemsdesktop', true);
	    $pe_team_all_itemsdesktopsmall			= get_post_meta($postid, 'pe_team_all_itemsdesktopsmall', true);
	    $pe_team_all_itemsmobile      			= get_post_meta($postid, 'pe_team_all_itemsmobile', true); 
	    $pe_team_item_loop    					= get_post_meta($postid, 'pe_team_item_loop', true);
	    $pe_team_item_margin   					= get_post_meta($postid, 'pe_team_item_margin', true);
	    $pe_team_item_autoplay         			= get_post_meta($postid, 'pe_team_item_autoplay', true);
	    $pe_team_item_autoplayspeed  	 		= get_post_meta($postid, 'pe_team_item_autoplayspeed', true);
	    $pe_team_item_autoplaytimeout  			= get_post_meta($postid, 'pe_team_item_autoplaytimeout', true);
	    $pe_team_item_navigation         		= get_post_meta($postid, 'pe_team_item_navigation', true);
	    $pe_team_item_navigation_position  		= get_post_meta($postid, 'pe_team_item_navigation_position', true);
	    $pe_team_item_pagination          		= get_post_meta($postid, 'pe_team_item_pagination', true);
	    $pe_team_item_paginationposition   		= get_post_meta($postid, 'pe_team_item_paginationposition', true);
	    $pe_team_item_stophover            		= get_post_meta($postid, 'pe_team_item_stophover', true);
	    $pe_team_item_navtext_color        		= get_post_meta($postid, 'pe_team_item_navtext_color', true);
	    $pe_team_item_navtext_color_hover   	= get_post_meta($postid, 'pe_team_item_navtext_color_hover', true);
	    $pe_team_item_navbg_colors        		= get_post_meta($postid, 'pe_team_item_navbg_colors', true);
	    $pe_team_item_navbghovers_colors     	= get_post_meta($postid, 'pe_team_item_navbghovers_colors', true);
	    $pe_team_item_pagination_color     		= get_post_meta($postid, 'pe_team_item_pagination_color', true);
	    $pe_team_item_pagination_bgcolor   		= get_post_meta($postid, 'pe_team_item_pagination_bgcolor', true);
	    $pe_team_item_pagination_style    		= get_post_meta($postid, 'pe_team_item_pagination_style', true);
		$sort_array                     		= get_post_meta($postid, 'sort_array', true);

		if( is_array( $pe_team_catslist ) ){
			$tmult_query_cats =  array();
			$num = count($pe_team_catslist);
			for($j=0; $j<$num; $j++){
				array_push($tmult_query_cats, $pe_team_catslist[$j]);
			}
			$args = array(
				'post_type' 	 	=> 'teamultimate',
				'post_status'	 	=> 'publish',
				'posts_per_page'	=> 8,
				'orderby'	   	   	=> $pe_team_orderby,
				'order'			 	=> $pe_team_order,
			    'tax_query' => [
			        'relation' => 'OR',
			        [
			            'taxonomy' => 'teamultimate-tax',
			            'field' => 'id',
			            'terms' => $tmult_query_cats,
			        ],
			        // [
			        //     'taxonomy' => 'teamultimate-tax',
			        //     'field' => 'id',
			        //     'operator' => 'NOT EXISTS',
			        // ],
			    ],
			);
        }else{
			$args = array(
				'post_type' => 'teamultimate',
				'post_status' => 'publish',
				'posts_per_page' => 8,
				'orderby'	   	   	=> $pe_team_orderby,
				'order'			 	=> $pe_team_order,
			);
        }

		$teamquery = new WP_Query( $args );

		ob_start();

		switch ($pe_team_styles) {
		    case '1':

		    	include __DIR__ . '/template/theme-1.php';

		    break;
		    case '2':

		    	include __DIR__ . '/template/theme-2.php';

		    break;
		    case '3':

		    	include __DIR__ . '/template/theme-3.php';

		    break;
		    case '4':

		    	include __DIR__ . '/template/theme-4.php';

		    break;
		    case '5':

		    	include __DIR__ . '/template/theme-5.php';

		    break;
		}
		return ob_get_clean();
    }
	add_shortcode( 'tmultmate', 'pe_teamultimate_shortcode_attr' );