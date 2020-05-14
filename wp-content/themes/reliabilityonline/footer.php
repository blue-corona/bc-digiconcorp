<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */

?>
<?php global $settings_id; ?>
<?php $contact_number = get_field('contact_number', $settings_id); ?>

<?php 

								$get_a_quote = get_field('get_a_quote', $settings_id);

								if( $get_a_quote ): 
									$link_url = $get_a_quote['url'];
									$link_title = $get_a_quote['title'];
									$link_target = $get_a_quote['target'] ? $get_a_quote['target'] : '_self';
									?>
									<a class="d-block d-md-none free-quote-mob footer-free-quote" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">Request a Free Quote</a>
								<?php endif; ?>

<footer class="site-footer">

<?php if(!get_field('hide_cta')){ ?>
		<?php if( have_rows('cta', $settings_id) ): 

			while( have_rows('cta', $settings_id) ): the_row(); 
				
				// vars
				$background_image = get_sub_field('background_image');
				$over_text = get_sub_field('over_text');
				$cta_button = get_sub_field('cta_button');
				
				?>
				<?php if($background_image){
					?><div class="footer-cta" style="background:url(<?php echo $background_image['url']; ?>) no-repeat 0 0/cover;"><?php
				}
				else{
					?><div class="footer-cta" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/images/Home_heroimg@2x.jpg) no-repeat 0 0/cover;"><?php
				} ?>
				
				<div class="container">
				
					<div class="row align-items-center">
					<div class="col-md-9">
						<div class="cta-content"><?php echo $over_text; ?></div>
					
					</div>
					<div class="col-md-3">
						<?php 
						if( $cta_button ): 
							$link_url = $cta_button['url'] ? $cta_button['url'] : '#';
							$link_title = $cta_button['title'] ? $cta_button['title'] : 'get started';
							$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
							?>
							<div class="cta-btn"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></div>
						<?php else: ?>
							<div class="cta-btn button-mob"><a href="#">get started</a></div>
						<?php endif; ?>
					</div>
					
					
					</div>
				</div>
			<?php endwhile; ?>
			
		<?php endif; ?>

		<?php } ?>
			
		
		
		</div>
	
		<div class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-about">
						<div class="footer-title"><?php the_field('left_block_title', $settings_id); ?></div>
						<?php the_field('left_block_content', $settings_id); ?>
						</div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="show-mob" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="Footer Logo" /></a>
					
					
					</div>
					<div class="col-md-3">
						<div class="footer-links">
						<div class="footer-title">Quick Links</div>
						<?php if ( has_nav_menu( 'site' ) ) : ?>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'site',
									'depth'          => 1,
								)
							);
							?>
						<?php endif; ?>
						
						</div>
						
						
					</div>
					<div class="col-md-3">
						<div class="footer-services">
						<div class="footer-title">Services</div>
							<?php if ( has_nav_menu( 'services' ) ) : ?>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'services',
										'depth'          => 1,
									)
								);
								?>
							<?php endif; ?>
						




						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-address">
						
							<div class="footer-number"> <i class="far fa-phone-volume"></i> <a href="tel:<?php echo $contact_number; ?>"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $contact_number); ?></a></div>
							<div class="parent-logo">
							<?php $parent_company_logo = get_field('parent_company_logo', $settings_id); ?>
							<a href="<?php the_field('link_to_parent_company', $settings_id); ?>" target="_blank"><img src="<?php echo $parent_company_logo['url']; ?>" alt="<?php echo $parent_company_logo['alt']; ?>" /></a><span>Parent Company</span></div>
							
							<div class="d-md-none"><?php the_field('left_block_content', $settings_id); ?></div>

						</div>
					
					
					</div>
				
				
		
				</div>
				
				
			</div>
		</div>	
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 ">
						<div class="copy-write">
							<span>© Copyright <?php echo date('Y'); ?> Semeq Inc </span>					<span class="site-links">
							<?php if( have_rows('important_links', $settings_id) ): 

	while( have_rows('important_links', $settings_id) ): the_row(); 
		
		// vars
		$sitemap = get_sub_field('sitemap');
		$privacy_policy = get_sub_field('privacy_policy');
		$terms = get_sub_field('terms');
		
		?>
		<?php 

		$link = get_sub_field('sitemap');

		if( $link ): 
			$link_url = $link['url'] ? $link['url'] : '#';
			$link_title = $link['title'] ? $link['title'] : 'Sitemap';
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
		<?php endif; ?>
		<?php 

		$link = get_sub_field('privacy_policy');

		if( $link ): 
			$link_url = $link['url'] ? $link['url'] : '#';
			$link_title = $link['title'] ? $link['title'] : 'Privacy Policy';
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
		<?php endif; ?>
		<?php 

		$link = get_sub_field('terms');

		if( $link ): 
			$link_url = $link['url'] ? $link['url'] : '#';
			$link_title = $link['title'] ? $link['title'] : 'Terms';
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
		<?php endif; ?>

	<?php endwhile; ?>
	
<?php endif; ?> 
						</span>
					
						</div>
					</div>
					<div class="col-lg-6 text-center text-lg-right ">
	 <div> Web Design by     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bluecorona-eye.png" alt=""><a target="_blank" href="https://www.bluecorona.com/"> Blue Corona</a> </div>
						
					</div>
				
				
				</div>
			</div>
		
		</div>
			
	    </footer>  <!---End of Banner--->
	  
	 
 <?php wp_footer(); ?>	
<?php if(!wp_is_mobile()){ ?>
<script>
jQuery(document).ready(function() {
jQuery(".dead-link > a"). removeAttr("href");
});
</script>
<?php }?>  
<style>
.gform_wrapper input[type="text"], .gform_wrapper input[type="email"], .gform_wrapper select, .gform_wrapper textarea {
    padding: 18px 25px;
	line-height:normal;
}
@media only screen and (min-width:768px){
.col-gfields_wrapper .gform_fields > li.contact-textarea {
    top: 65px;
}
.contact-us-form .gform_button.button {
    margin: 65px auto 0;
}
}
@media only screen and (min-width:1200px){
	.main-navigation ul.menu li:first-child {    margin-left: 0;}
	.main-navigation ul.menu li {    margin: 0 40px;}
	.main-navigation ul.menu ul li {    margin: 0;}
	.sticky-content, .toggle-icon, .main-navigation ul.sub-menu li.sub-menu-back, .main-navigation ul.sub-menu {    display: none;}
	.main-navigation ul.sub-menu {    position: absolute;    width: 250px;    display: none;        background: #000080;    padding: 25px 0;}
	.main-navigation ul li:hover ul {    display: block;}
	.main-navigation ul li:hover, .main-navigation ul li.current-menu-item {    background: #099CF4;}
	.main-navigation ul.sub-menu li {    display: block;}
	.submenu-expand {    display: none;}
 }

@media only screen and (max-width:1400px){
	.service-section .slick-prev:before, .service-section .slick-next:before{
		ont-size: 36px;
	}
	.service-section .slick-prev {
    left: -45px;
}
.service-section .slick-next {
    right: -45px;
}
	
}

@media only screen and (max-width:1199px){
	a{transition:none;-webkit-transition:none; -moz-transition:none; -ms-transition:none;}
.top-offset {    margin-top: 144px;}
.mobile-no {    background: #099CF4;  font-size: 18px;  color: #fff;     text-align: center;    line-height: 1.2em;    color: #fff;    font-size: 22px;    font-weight: bold;    padding: 10px 0px;	display:block;}
.mobile-no:focus, .mobile-no:hover {    color: #fff;}
.mobile-no span {   display: inline-block;}

.top-header .header-call, .search-less, a.get-quote {    display: none;}

svg.svg-icon{display:none;}
button, button:focus{border:none;outline:none;}
.main-navigation ul{padding:0;}
.main-navigation ul li a{padding:20px 0;font-size:18px;text-align:left;display:inline-block;color:#000080;    font-weight: 400;transition:none;-webkit-transition:none; -moz-transition:none; -ms-transition:none;}
.sub-banner-col{height:145px;}
.main-navigation ul li .sub-menu li.mobile-parent-nav-menu-item{display:block !important;}
.submenu-expand{display:inline-block !important;background:none;}
li.sub-menu-back{display:block !important;}
.toggle-icon span{left:0;position:absolute;font-weight:600;color:#45647f;opacity:0;}
.menu-visible .slide-menu{transform:translate3d(0,0,0);-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);}
.toggle-icon{display:block;}
.main-navigation ul li{display:block;}
.slide-menu{position:fixed;right:0;top:0;height:100%;z-index:9;width:43.333%;transition:transform 0.5s ease 0s;-webkit-transition:transform 0.5s ease 0s;-moz-transition:transform 0.5s ease 0s;transform:translate3d(100%,0,0);-webkit-transform:translate3d(100%,0,0);-moz-transform:translate3d(100%,0,0);background-color:#fff;overflow:auto;-webkit-overflow-scrolling:touch;}
.sticky-content{display:block;padding-top:0;}
.sticky-logo{display:inline-block;}
.sticky-content img{width:300px;}
.main-navigation ul li{position:static;border-bottom:1px solid #eeeaee;padding:0;}
.sticky-content{display:block;position:relative;}
.close-toggle{position:absolute;right:20px;top:50%;transform:translateY(-50%);-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);}
.hamburger-toggle.close-toggle .fa-bars:before, .hamburger-toggle.close-toggle .fa-bars:after{background:#000080;}
.main-navigation .menu > li > a{color:#000080;display:inline-block;padding:15px 10px 15px 0;font-size:18px;vertical-align:middle; font-weight:400; }
.main-navigation ul li a:not([href]):not([tabindex]){color:#000080;}
	.main-navigation ul li a:hover{color:#099CF4;}
.main-navigation ul{text-align:left}
.hamburger-toggle.close-toggle{top:-30px;right:0;}
.sticky-logo{float:left;width:250px;padding:15px 0 10px;}
.fixed-body:before{opacity:1;visibility:visible;}
.sticky-nav{height:100%;position:fixed;right:-100%;top:0;width:100%;z-index:11;overflow:auto;-webkit-overflow-scrolling:touch;transition:all 0.9s ease-in-out 0s;-webkit-transition:all 0.9s ease-in-out 0s;-moz-transition:all 0.9s ease-in-out 0s;-ms-transition:all 0.9s ease-in-out 0s;padding:0 30px;background:#fff;}
body{position:relative;left:0;transition:all 0.9s ease-in-out 0s;-webkit-transition:all 0.9s ease-in-out 0s;-moz-transition:all 0.9s ease-in-out 0s;-ms-transition:all 0.9s ease-in-out 0s;}
body:before{content:'';position:absolute;top:0;left:0;background-color:rgba(0, 0, 0, 0.549);height:100%;width:100%;opacity:0;transition:all 0.9s ease-in-out 0s;-webkit-transition:all 0.9s ease-in-out 0s;-moz-transition:all 0.9s ease-in-out 0s;-ms-transition:all 0.9s ease-in-out 0s;visibility:hidden;z-index:11;}
.close-toggle, .sticky-content{display:block;}
 li.sub-menu-back{color:#797079;display:block;vertical-align:middle;padding:0 0 0 15px !important;}
.nav-section{clear:both;}
.sticky-content{margin:85px 0 0;}
.sticky-in{right:0;width:50%;}
 .main-navigation ul.sub-menu{padding:10px 0;position:absolute;background:#fff;top:0px;bottom:auto;left:-150%;width:101%;z-index:11;transition:all .5s ease-out;-webkit-transition:all .5s ease-out;-ms-transition:all .5s ease-out;-o-transition:all .5s ease-out;height:100vh;}
 li.sub-menu-back::before{content:"\f104";font-family:"FontAwesome";font-size:27px;position:absolute;top:0;left:0;color:#797079;}
li.sub-menu-back .submenu-expand:after{content:none;}
.main-navigation{clear:both;position:relative;}
.submenu-expand:after{transform:none;-webkit-transform:none;-moz-transform:none;}
.main-navigation ul.sub-menu.toggled-on li{position:static;}
.main-navigation ul.sub-menu ul.toggled-on{top:0;margin:0;}
.submenu-expand:after{position:relative;content:"\f105";display:inline-block;font-family:"FontAwesome";font-size:26px;margin:0;vertical-align:middle;border:none;height:auto;width:auto;line-height:initial;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;transition:all .5s ease-in-out 0s;-webkit-transition:all .5s ease-in-out 0s;-moz-transition:all .5s ease-in-out 0s;border:none;top:0;font-weight:900;color:#000080;}
.main-navigation ul.sub-menu.expanded-true{left:-1%;}
.main-navigation ul li .menu-item-link-return::before{content:"\f104";font-family:"FontAwesome";font-size:27px;position:absolute;top:4px;left:0;color:#000080;display:inline-block;vertical-align:top;font-weight:900;}
.main-navigation ul li .menu-item-link-return{background:none;padding:5px 20px;display:block;position:relative;color:#000080;font-size:18px;}
.service-section{padding: 40px 0 80px  0;}
    .service-section h2 { color: #333333; font-size: 30px; font-weight: 300; line-height: 48px; text-align: center;}
    .service-section .slick-prev::before, .service-section .slick-next::before{font-size: 40px;}
    .service-section .slick-next, .service-section .slick-prev { top: 125%; -webkit-transform: translate(0,-125%); -ms-transform: translate(0,-125%); transform: translate(0,-125%); }
    .service-section .slick-next{right: 0;}
    .service-section .slick-prev{left: 0;}
	.home-text {    padding: 0 0 50px;}
	.home-about {    background: #F8F8F8;    padding: 50px 0 75px;}  
	.home-about .text-col {    padding: 0 0 0 20px;}
	.how-it-works{ padding:50px 0;    background-image: linear-gradient(#000080 55%, #F8F8F8 30%);}
	.how-it-works-bottom {    padding: 50px 0 20px;}
	.tab-content .tab-text {    padding-left: 15px;}
	.main-footer {    padding: 50px 0 30px;}
	.footer-bottom {    padding: 30px 0;    font-size: 15px;}
	.site-links a:after{ top:4px;}
	.cta-content{ padding:0;}
	.cta-btn{ max-width:100%;}
	.footer-links {    padding: 0 0 0 15px;}
	.footer-services {    padding: 0;}
	.main-footer p, .main-footer, .main-footer a, .address-line{ font-size:14px;}
	.double-img img{ max-width:50%;}
	.how-it-works { font-size: 16px; line-height: 32px;}
    .how-it-works-text { font-size: 30px; margin-top:18px; margin-bottom: 44px; line-height: 40px;}
    .how-it-works-top{padding: 0;}
    .how-it-works-bottom{  padding: 95px 0;}
    .how-it-works-slider .slide p{margin-bottom: 40px;}
    .how-it-works-slider .slick-dots{width: 100%; }
    .how-it-works-slider .slick-dots li{display:inline-block;transform: rotate(180deg);    padding: 20px 40px; }
    .how-it-works-slider .slick-dots {    top: auto;    margin-top: 103px;    bottom: -145px;}
    .how-it-works-bottom .slick-dotted.slick-slider{margin-bottom: 128px;}
    .how-it-works-slider .slick-dots li{width: 30px;}
    .how-it-works-slider .slick-dots li.slick-active a:not([href]):not([tabindex]),
    .how-it-works-slider .slick-dots li a:not([href]):not([tabindex]){font-size: 30px; font-weight: bold;}
    .how-it-works-slider .slick-dots li.slick-active a:before { position: absolute; left: -19px; top: -48px; transform: rotate(90deg);}
    .how-it-works-slider .slick-dots li.slick-active a:not([href]):not([tabindex]){font-size: 40px;     top: -5px;}
	.how-it-works-slider .slick-dots li a:after {    content: "0";    font-size: 30px;    position: absolute;    color: #999;    left: 18px;    top: 20px;}
	.how-it-works-slider .slick-dots li.slick-active a:after {    color: #333;    font-size: 40px;    left: -25px;    top: 10px;}
	.site-header a.mobile-no svg {    transform: rotate(-45deg); -webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg);   margin: 0 5px 0 0px;}
	.subpage-content .banner-form {    display: block;    width: 100%;    max-width: 100%; margin:20px 0 0;}
	
	.sticky-nav .search-form input[type="search"]{border-color:  #eeeaee;color: #000080;    padding-left: 0;}
	.search-form .search-submit {color: #000080;}
	.sticky-nav .search-field::placeholder{color:#000080;}
	.sticky-nav .search-field:-ms-input-placeholder{color:#000080;}
	.sticky-nav .search-field::-ms-input-placeholder{color:#000080;}
	.subpage-content {  padding: 50px 0;}
	.sub-banner {padding: 70px 0;}
	 .service-title a.button-active {background: #000081;color: #ffff;}
	.home-about .text-col a.button-active	{background:#000080}
	.banner-btn.button-active {    background: #fff; color: #099CF4;}
	
	
	
}

@media only screen and (max-width:1024px){
		.contact-text p span {
    display: none;
}
}

@media only screen and (max-width:1024px) and (min-width:992px){

.subpage-content-main {
    display: flex;
    flex-wrap: wrap;
	display: -webkit-flex;
	-webkit-flex-wrap: wrap;
}
.contact-text {

    order: 2;
    padding: 30px 0 0;

}

}


	


@media only screen and (max-width:992px){
.banner-form, .banner-btn{ display:none;}
.banner-title {    font-size: 29px;}	
.banner-sub-title { margin-bottom:0;}
	a.free-quote-mob {    font-size: 24px;    text-transform: uppercase;    background: #000080;    width: 100%;    color: #fff;    font-weight: 700;    display: block;    text-align: center;
    padding: 20px 0;    margin-top: 0;}
	
	.home-title {    font-size: 28px;    line-height: 35px;}
	.home-about .about-img-col, .home-about .text-col p { display:none;   }
	.home-about {    padding: 50px 0;    text-align: center;}
	.home-about .text-col,.home-text .text-col{ padding:0;} 
	
	.top-tab-list {    display: none;}
	.home-tabs-sections h2.resp-accordion {     border-bottom: 2px solid #fff !important; font-size: 20px;    border: none;    border-top: 0;    margin: 0px;    padding: 30px 15px;    background: #333333;    color: #fff;    text-align: center;
    font-weight: 900;}
	.home-tabs-sections h2.resp-tab-active {    border-bottom: 0px solid #c1c1c1 !important;    margin-bottom: 0px !important;    padding: 30px 15px !important;    background: #099CF4 !important;}
	.home-tabs-sections .resp-tab-content {    border: none;    padding: 50px 0;}
	.tab-img.col-lg-6 {    display: none;}
	.tab-content .tab-text {    padding: 0 40px;}
	.home-tabs-sections .resp-arrow{ display:none;}
	.home-tabs-sections {   padding: 70px 0;}
	.copy-write, .site-links {    text-align: center;}
	.tab-img-sec {
    display: block;
    width: 50%;
    margin: 0px auto 40px auto;
}

.tab-content .tab-text {
    width: 100%;
    display: block;
}
	.home-text .text-col a{text-align:center;}
}
/*navigation css start here*/


@media(max-width:767px){
	.top-offset {    margin-top: 128px;}
	.sticky-in {    right: 0;    width: 75%;}
	.sticky-logo {    width: 100%;}
	.sticky-content img { width: 100%;}
	.top-header {    padding: 25px 0;}
	.toggle-icon{top:74px;}
	a.free-quote-mob{font-size:18px;}
	.header-logo img {    max-width: 240px;}
    a.header-call{display: inline-block;}
    .header-call .number-sec b, .header-call svg{color: #fff;}
    .header-call svg{margin: 0 11px 0 0px; font-size: 20px;} 
    
    .home-content-section .banner{padding: 61px 0 70px 0;}
    .banner-title{font-size: 29px; line-height: 36px; }
    .header-call .number-sec b{font-size: 18px;}
    
    .banner-sub-title { font-size: 17px; line-height: 30px;}

   .rounded-content{ padding:20px;}
    .home-tabs-sections{padding-bottom: 65px; padding-top:0;}
    .home-tabs-sections .resp-tabs-list li{display: block; width: 100%; }
    .home-tabs-sections .resp-tab-item.resp-tab-active{background:#099CF4; color: #fff;}
    .home-tabs-sections .resp-tabs-list li, .home-tabs-sections .resp-tab-item.resp-tab-active{padding: 37px 0 !important; font-size: 20px; text-transform: none;}
    .home-tabs-sections .resp-tabs-list li + li{margin: 2px 0 0 0;}
    .home-tabs-sections .resp-tab-content{padding:0px; border: 1px solid #F1F3F4;}
	.tab-content .tab-text img {    max-width: 100%;    float: left;    margin: 0 0 30px;}
    .home-tabs-sections .tab-content .tab-text{padding: 0 15px;margin: 0 0 30px 0px;}
    .home-tabs-sections .tab-content .tab-title{margin-top: 20px ;}
    .home-tabs-sections h2.resp-accordion{border-top: 1px solid #F1F3F4 !important;}
    .home-tabs-sections h2.resp-accordion:first-child { border-top: 1px solid #F1F3F4 !important;}
    .home-tabs-sections .tab-content h2.resp-accordion{border-color:#F1F3F4; }
    .footer-links, .footer-services{padding: 0; text-align: center;}
	.show-mob {    display: block;    margin: 0 auto;    padding: 0 0 50px 0;}
    .footer-title, .main-footer p, .parent-logo{text-align: center;}
    .copy-write span, .site-links{width: 100%; float: left; text-align: center;}
	.main-footer, .main-footer a{    font-size: 24px;}
.footer-cta, .footer-about, .footer-links .footer-title, .address-line, .footer-number, .footer-services, .copy-write span:first-child:after,.site-links a:after{display:none;}
    /* .site-links["|"]{display: none;} */
.site-footer ul li:last-child {
    border-bottom: 2px solid rgba(255,255,255,.25);
}

.site-footer ul li {
    list-style: none;
    margin: 0 0 0;
    line-height: 40px;
    border-top: 2px solid rgba(255,255,255,.25);
    padding: 15px 0;
}
.parent-logo {    margin: 15px 0px 40px;}
.footer-bottom {
    padding: 0 0 30px;
    background: #000;
}
.site-links a {
        padding: 0 20px;
    position: relative;
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 10px;
    display: inline-block;
}
.how-it-works-slider .slick-dots li.slick-active a:after{top:13px;}
.how-it-works {    padding: 50px 0 0;}
.service-section .slick-next, .service-section .slick-prev{top:116%;}

.tab-img-sec{margin: 30px auto;}
.home-title {
    font-size: 22px;
    line-height: 30px;
}
.subpage-content-main {
    display: flex;
    flex-wrap: wrap;
	display: -webkit-flex;
	-webkit-flex-wrap: wrap;
}
.contact-text {

    order: 2;
    padding: 30px 0 0;

}
.contact-text p span {

    display: inline;

}
.page-id-279 .free-quote-mob {
    display: none !important;
}
.contact-us-form .gform_button.button {
    margin: 0 auto;
}
}

@media(max-width:1199px){
.subpage-content h3 {
    width: 100%;
}
}

@media(max-width:568px){
.subpage-content img {
    display: block;
    float: none;
}
}

</style> 
   </body>
   		
</html>