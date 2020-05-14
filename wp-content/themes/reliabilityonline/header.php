<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */
?>
<?php global $settings_id; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="https://gmpg.org/xfn/11" />
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
	  <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header class="site-header"> 
			<?php $contact_number = get_field('contact_number', $settings_id); ?>
			<a href="tel:<?php echo $contact_number; ?>" class="mobile-no">
				<i class="far fa-phone-volume"></i> 
				<span><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $contact_number); ?></span>
			</a>
			<div class="top-header">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-7">
							<div class="header-logo">
								<?php $header_logo = get_field('header_logo', $settings_id); ?>
								<?php if($header_logo){ 
								?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>" /></a><?php }
								else{ 
								?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Main Logo" /></a><?php } ?>
							</div>
						</div>
						<div class="col-md-5">
							<a href="javascript:void(0)" class="header-call">
								<i class="fas fa-phone-alt"></i>
								<div class="number-sec">
									<span>Call Us</span>
									<?php $contact_number = get_field('contact_number', $settings_id); ?>
									<b><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $contact_number); ?></b>
								
								</div>
								</a>
								<?php 

								$get_a_quote = get_field('get_a_quote', $settings_id);

								if( $get_a_quote ): 
									$link_url = $get_a_quote['url'];
									$link_title = $get_a_quote['title'];
									$link_target = $get_a_quote['target'] ? $get_a_quote['target'] : '_self';
									?>
									<a class="get-quote" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>
							
						
							</div>
						
						
						</div>
					
					
					</div>
				
				
				</div>	
			
			<div class="navigation">
				<div class="container">
                     <div class="toggle-icon"> <a class="responsive-toggle hamburger-toggle"><i class="fa-bars"></i></a> </div>
                     <div class="row align-items-center justify-content-center">
                        <div class="nav-less  ">
                           <div class="sticky-nav">
                              <div class="sticky-content">
								<div class="sticky-logo">
								<?php if($header_logo){ 
								?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>"  /></a><?php }
								else{ 
								?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Main Logo" /></a><?php } ?>
                                 </div>
                                 <div class="hamburger-toggle close-toggle"><i class="fa-bars"></i></div>
                              </div>
							  
							  <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'reliabilityonline' ); ?>">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
											)
										);
										?>
								</nav>
								<?php endif; ?>
								 <div class="d-xl-none mobile-search"><?php get_search_form();?> </div>
                           </div>
                        </div>
                        <div class="search-less">
                           <div class="search-bar text-center ">
							<i class="fas fa-search"></i>
                           </div>
                        </div>
                 </div>
                     </div>
             </div>
			
			</div>
		<div class="search-sec text-center">
            <div class="container-fluid ">
               <div class="row justify-content-center align-items-center">
                  <div class="col-xl-5 ">
				<?php get_search_form();?>
					</div>
					<div class="close-form">
							<i class="fas fa-times"></i>
					</div>
               </div>
            </div>
         </div>
		
		</header> <!---End of Header--->
		<div class="top-offset"></div>