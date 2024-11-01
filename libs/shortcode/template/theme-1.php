<?php
    if( !defined( 'ABSPATH' ) ){
        exit;
    }

	if($pe_team_types == 1){
		if($pe_team_gridtypes == 1){ ?>
		<style type="text/css">
			.teamultimate-<?php echo $postid;?> {
				display: flex;
				flex-wrap: wrap;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-items-<?php echo $postid;?> {
				display: block;
				overflow: hidden;
				margin-bottom: 0px;
				background: <?php echo $pe_team_memberbg_color;?>;
				width:100%;
				height:100%;
				position: relative;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-thumb {
			    position: relative;
			    overflow: hidden;
			    -webkit-transition: all 0.3s ease 0s;
			    transition: all 0.3s ease 0s;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-thumb::before {
			    background: <?php echo $pe_team_overlaybg_color;?> none repeat scroll 0 0;
			    content: "";
			    height: 100%;
			    left: 0;
			    opacity: 0;
			    position: absolute;
			    top: 0;
			    -webkit-transition: all 0.3s ease 0s;
			    transition: all 0.3s ease 0s;
			    width: 100%;
			    z-index: 1;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-items-<?php echo $postid;?>:hover .teamultimate-style01-thumb::before{
			    opacity: 0.8;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul {
			    position: absolute;
			    width: 100%;
			    left: auto;
			    right: auto;
			    top: 50%;
			    margin-top:25px !important;
			    opacity: 0;
			    text-align:center;
			    visibility: hidden;
			    -webkit-transition: all 0.3s ease 0s;
			    transition: all 0.3s ease 0s;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-items-<?php echo $postid;?>:hover .teamultimate-style01-socialprofiles ul{
			    margin-top:-25px !important;
			    opacity: 1;
			    z-index: 3;
			    visibility: visible;
			    -webkit-transition: all 0.3s ease 0s;
			    transition: all 0.3s ease 0s;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-thumb img {
			    box-shadow: none;
			    border-radius: 0;
			    vertical-align: middle;
			    margin: 0;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-info {
			    padding: 15px;
			    text-align: center;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-title h2 {
			    margin: 0;
			    padding: 0;
				font-size: <?php echo $pe_team_title_fontsize;?>px;
				color: <?php echo $pe_team_title_color;?>;
				text-transform:<?php echo $pe_team_title_transform;?> ;
				font-style: <?php echo $pe_team_title_fontstyle;?>;
			    margin: 0 0 10px;
			    font-weight: normal;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-designation h3 {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_designation_color;?>;
			    font-size: <?php echo $pe_team_designation_fontsize;?>px;
			    font-weight: normal;
			    font-style: <?php echo $pe_team_designation_fontstyle;?>;
				text-transform: <?php echo $pe_team_designation_transform;?>;
				margin-bottom:10px;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-email h4 {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_email_color;?>;
			    font-size: <?php echo $pe_team_emails_fontsize;?>px;
			    font-weight: normal;
			    font-style: <?php echo $pe_team_email_fontstyle;?>;
				text-transform: <?php echo $pe_team_email_transform;?>;
				margin-bottom:10px;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-numbers p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_contact_color;?>;
			    font-size: <?php echo $pe_team_contact_fontsize;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-location p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_location_color;?>;
			    font-size: <?php echo $pe_team_location_fontsize;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-description p {
			    margin: 0;
			    padding: 0;
			    color: <?php echo $pe_team_details_color;?>;
			    font-size: <?php echo $pe_team_details_size;?>px;
			    font-weight: normal;
				margin-bottom:10px;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles {
			    margin-top: 0px;
			    transition: 0.5s;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul {
			    padding: 0;
			    margin: 0;
			    list-style: none;
			}
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul li a {
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
			.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul li a:visited {
			    color: <?php echo $pe_team_socialicon_color;?>;
			    text-decoration: none;
			    box-shadow: none;
			    outline: none;
			    border: none;
			}
			
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-1,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-2,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-3,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-4,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-5,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-lg-6,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-1,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-2,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-3,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-4,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-5,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-md-6,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-1,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-2,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-3,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-4,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-5,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-sm-6,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-1,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-2,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-3,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-4,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-5,
			.teamultimate-<?php echo $postid;?> .teamcolumn-col-xs-6 {
				float: left;
				margin-bottom: <?php echo $pe_team_marginbottom_size;?>px !important;
				min-height: 1px;
				padding-left: <?php echo $pe_team_marginleftright_size;?>px !important;
				padding-right: <?php echo $pe_team_marginleftright_size;?>px !important;
				position: relative;
			}
			<?php if( $pe_team_social_style == 1 ){ ?>
				.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul li {
				    list-style: none;
				    display: inline-block;
				    text-align: center;
				    background: <?php echo $pe_team_socialicon_colorbg;?>;
				    text-align: center;
				    margin: 0 1px;
				    border-radius: 0px;
				}
			<?php }elseif( $pe_team_social_style == 2 ){ ?>
				.teamultimate-<?php echo $postid;?> .teamultimate-style01-socialprofiles ul li {
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

		<div class="teamultimate-<?php echo $postid;?>">
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
				<div class="teamultimate-style01-items-<?php echo $postid;?>">
					<div class="teamultimate-style01-thumb">
						<img src="<?php echo $teamultimate_thumb;?>" alt="<?php echo the_title();?>" />
						<div class="teamultimate-style01-socialprofiles">
							<ul>
								<?php if (is_array($wpsteam_social_iconbox_repeat) || is_object($wpsteam_social_iconbox_repeat)){ ?>
									<?php foreach($wpsteam_social_iconbox_repeat as $scsingleicons){?>
										<li><a target="_blank" href="<?php echo esc_url($scsingleicons['sciconsurl']);?>" class="fa <?php echo esc_attr($scsingleicons['select']);?>"></a></li>
									<?php } ?>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="teamultimate-style01-info">
						<div class="teamultimate-style01-title">
							<h2><?php echo the_title();?></h2>
						</div>
						<?php if(!empty( $teamultimate_designation )){ ?>
							<?php if($pe_team_designation_hides == 1){ ?>
								<div class="teamultimate-style01-designation">
									<h3><?php echo $teamultimate_designation;?></h3>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if(!empty( $teamultimate_emailaddress )){ ?>
							<?php if($pe_team_email_hides == 1){ ?>
								<div class="teamultimate-style01-email">
									<h4><?php echo esc_html__( $teamultimate_emailaddress );?></h4>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if(!empty( $teamultimate_sdescription )){ ?>
							<?php if($pe_team_hide_content == 1){ ?>
								<div class="teamultimate-style01-description">
									<p><?php echo esc_html__( $teamultimate_sdescription );?></p>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php endwhile;?>
            <?php  wp_reset_query(); ?>		
		</div>
		<?php
		}
		elseif( $pe_team_gridtypes == 2 ){ ?>
			<p>Upgrade Pro Version To Unlock All Features.</p>
		<?php
		}
	}elseif( $pe_team_types == 2 ){ ?>
		<p>Upgrade Pro Version To Unlock All Features.</p>
	<?php } ?>