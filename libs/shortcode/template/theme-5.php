<?php
    if( !defined( 'ABSPATH' ) ){
        exit;
    }

	if($pe_team_types == 1){
		if($pe_team_gridtypes == 1){ ?>
		<style type="text/css">
			.teamultimate-five-<?php echo $postid;?> {
				display: flex;
				flex-wrap: wrap;
				position: relative;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-items-<?php echo $postid;?> {
				display: block;
				overflow: hidden;
				margin-bottom: 0px;
				background: <?php echo $pe_team_memberbg_color;?>;
				width:100%;
				height:100%;
				text-align:center;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-thumb{
			    overflow: hidden;
			    width: 200px;
			    height: 200px;
			    border-radius: 100%;
			    text-align: center;
			    margin: 30px auto;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-info {
			    -webkit-transition: all 0.3s ease 0s;
			    transition: all 0.3s ease 0s;
			    display: block;
			    overflow: hidden;
			    padding-bottom: 15px;
			    border-bottom: 1px solid #ededed;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-title h2 {
			    margin: 0;
			    padding: 0;
				font-size: <?php echo $pe_team_title_fontsize;?>px;
				color: <?php echo $pe_team_title_color;?>;
				text-transform:<?php echo $pe_team_title_transform;?>;
				font-style: <?php echo $pe_team_title_fontstyle;?>;
			    margin: 0 0 10px;
			    font-weight: normal;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-designation h3 {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_designation_color;?>;
			    font-size: <?php echo $pe_team_designation_fontsize;?>px;
			    font-weight: normal;
			    font-style: <?php echo $pe_team_designation_fontstyle;?>;
				text-transform: <?php echo $pe_team_designation_transform;?>;
				margin-bottom:10px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-email h4 {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_email_color;?>;
			    font-size: <?php echo $pe_team_emails_fontsize;?>px;
			    font-weight: normal;
			    font-style: <?php echo $pe_team_email_fontstyle;?>;
				text-transform: <?php echo $pe_team_email_transform;?>;
				margin-bottom:10px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-numbers p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_contact_color;?>;
			    font-size: <?php echo $pe_team_contact_fontsize;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-description p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_details_color;?>;
			    font-size: <?php echo $pe_team_details_size;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-location p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_location_color;?>;
			    font-size: <?php echo $pe_team_location_fontsize;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles {
				padding:15px 0px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles ul {
			    margin: 0;
			    padding: 0;
			    list-style: none;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles ul li a {
			    text-decoration: none;
			    box-shadow: none;
			    outline: none;
			    border: none;
			    color: <?php echo $pe_team_socialicon_color;?>;
			    font-size: <?php echo $pe_team_socialicon_size?>px;
			    width: 30px;
			    height: 30px;
			    line-height: 30px;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles ul li a:visited {
			    color: <?php echo $pe_team_socialicon_color;?>;
			    text-decoration: none;
			    box-shadow: none;
			    outline: none;
			    border: none;
			}
			.teamultimate-five-<?php echo $postid;?> .single-teamultimate-thumb img {
			    box-shadow: none;
			    border-radius: 0;
			    vertical-align: middle;
			    margin: 0;
			}
			
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-1,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-2,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-3,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-4,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-5,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-lg-6,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-1,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-2,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-3,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-4,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-5,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-md-6,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-1,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-2,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-3,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-4,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-5,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-sm-6,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-1,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-2,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-3,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-4,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-5,
			.teamultimate-five-<?php echo $postid;?> .teamcolumn-col-xs-6 {
				float: left;
				margin-bottom: <?php echo $pe_team_marginbottom_size;?>px !important;
				min-height: 1px;
				padding-left: <?php echo $pe_team_marginleftright_size;?>px !important;
				padding-right: <?php echo $pe_team_marginleftright_size;?>px !important;
				position: relative;
			}

			<?php if( $pe_team_social_style == 1 ){ ?>
				.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles ul li {
				    list-style: none;
				    display: inline-block;
				    text-align: center;
				    background: <?php echo $pe_team_socialicon_colorbg;?>;
				    text-align: center;
				    margin: 0 1px;
				    border-radius: 0px;
				}
			<?php }elseif( $pe_team_social_style == 2 ){ ?>
				.teamultimate-five-<?php echo $postid;?> .single-teamultimate-socialprofiles ul li {
				    list-style: none;
				    display: inline-block;
				    text-align: center;
				    background: <?php echo $pe_team_socialicon_colorbg;?>;
				    text-align: center;
				    margin: 0 1px;
				    border-radius: 50px;
				}
			<?php } ?>
		</style>

		<div class="teamultimate-five-<?php echo $postid;?>">
			<?php
			while ( $teamquery->have_posts() ) : $teamquery->the_post();
			
			$teamultimate_designation 			= get_post_meta( $post->ID, 'teamultimate_designation', true );
			$teamultimate_emailaddress 			= get_post_meta( $post->ID, 'teamultimate_emailaddress', true );
			$teamultimate_contactnumber 		= get_post_meta( $post->ID, 'teamultimate_contactnumber', true );
			$teamultimate_locations 			= get_post_meta( $post->ID, 'teamultimate_locations', true );
			$teamultimate_sdescription 			= get_post_meta( $post->ID, 'teamultimate_sdescription', true );
			$wpteams_social_repetable_fields	= get_post_meta( get_the_ID(), 'wpteams_social_repetable_fields', true );
			$wpsteam_social_iconbox_repeat		= get_post_meta( get_the_ID(), 'wpsteam_social_iconbox_repeat', true );
			$teamultimate_thumb 				= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$content 							= apply_filters( 'the_content', get_the_content() );
			?>

			<div class="teamcolumn-col-lg-<?php echo $pe_teamtotal_column;?> teamcolumn-col-md-2 teamcolumn-col-sm-2 teamcolumn-col-xs-1">
				<div class="single-teamultimate-items-<?php echo $postid;?>">
					<div class="single-teamultimate-thumb">
						<img src="<?php echo $teamultimate_thumb;?>" alt="<?php echo the_title();?>" />
					</div>
					<div class="single-teamultimate-info">
						<div class="single-teamultimate-title">
							<h2><?php echo the_title();?></h2>
						</div>
						<?php if(!empty( $teamultimate_designation )){ ?>
							<?php if($pe_team_designation_hides == 1){ ?>
								<div class="single-teamultimate-designation">
									<h3><?php echo $teamultimate_designation;?></h3>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if(!empty( $teamultimate_emailaddress )){ ?>
							<?php if($pe_team_email_hides == 1){ ?>
								<div class="single-teamultimate-email">
									<h4><?php echo esc_html__( $teamultimate_emailaddress );?></h4>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if(!empty( $teamultimate_sdescription )){ ?>
							<?php if($pe_team_hide_content == 1){ ?>
								<div class="single-teamultimate-description">
									<p><?php echo esc_html__( $teamultimate_sdescription );?></p>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="single-teamultimate-socialprofiles">
						<ul>
							<?php if (is_array($wpsteam_social_iconbox_repeat) || is_object($wpsteam_social_iconbox_repeat)){ ?>
								<?php foreach($wpsteam_social_iconbox_repeat as $scsingleicons){?>
									<li><a target="_blank" href="<?php echo esc_url($scsingleicons['sciconsurl']);?>" class="fa <?php echo esc_attr($scsingleicons['select']);?>"></a></li>
								<?php } ?>
							<?php } ?>
						</ul>	
					</div>
				</div>
			</div>

			<?php endwhile;?>
            <?php  wp_reset_query(); ?>		
		</div>
		<?php
		} elseif( $pe_team_gridtypes == 2 ){ ?>
			<p>Upgrade Pro Version To Unlock All Features.</p>
		<?php
		}
	} elseif( $pe_team_types == 2 ){ ?>
		<p>Upgrade Pro Version To Unlock All Features.</p>
	<?php } ?>