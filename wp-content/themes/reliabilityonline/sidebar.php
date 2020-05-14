<?php if(!is_404()) { ?>
<div class="col-12 col-lg-4 col-xl-3">
<div class="row">
<?php if(!get_field('hide_sidebar_form')){ ?>
<div class="col-12 mb-4">
	<div class="banner-form">
		<div class="banner-form-title">
		<?php if(get_field('side_form_title')){ ?>
		<?php the_field('side_form_title'); ?>
		<?php }else{
			?>Get a Free Quote<?php
		} ?>
		</div>
		<div class="form-col">
		<?php $form_shortcode = get_field('side_add_shorcode_for_form') ? get_field('side_add_shorcode_for_form') : '[gravityform id="2" title="false" description="false"]'; ?>
		<?php echo do_shortcode($form_shortcode); ?>
		</div>
	</div>
	</div>
<?php } ?>	
<div class="col-12 col-md-6 col-lg-12 mb-md-0 mb-lg-4">
	<div class="serivice-section">
	<div class="service-heading">Our Services</div>
	<?php $args =array('post_type'=>'service','posts_per_page'=>5,'order'=>'ASC');?>
			<?php $query =new WP_Query($args);?>
			<?php while ( $query->have_posts() ): $query->the_post();?>
			<div class="service-title">
            <a class="button-mob" href="<?php the_field('service_link'); ?>"><?php the_title();?></a>
	</div>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
			
	</div>
	</div>
	
	
	<div class="col-12 col-md-6 col-lg-12">
	<div class="main-section">
		<div class="event-title">Events</div>
	<?php $args =array('post_type'=>'events','posts_per_page'=>3,'order'=>'ASC');?>
			<?php $query =new WP_Query($args);?>
			<?php while ( $query->have_posts() ): $query->the_post();?>
			<div class="blog-section">
	<div class="date"><?php the_title();?> <?php the_field('events_date');?></div>
	<div class="content-section">
	<p><?php the_excerpt(); ?></p>
	</div>
	</div>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
			
	</div>
	</div>
</div>
</div>
<?php } ?>