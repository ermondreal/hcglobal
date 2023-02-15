<?php
if(have_rows('hero_banner_group')):
	while(have_rows('hero_banner_group')) :
		the_row();
		$banner_type 	= get_sub_field('banner_type');
		$bg_image 		= get_sub_field('background_image');
		$bg_image_pos 	= get_sub_field('background_image_position');
		$add_gradient 	= get_sub_field('add_gradient');
		$grad_color_pos	= get_sub_field('grad_color_posotion');

?>

<section class="hero-banner <?php echo 'grad-' . $grad_color_pos . ' '; echo $bg_image_pos; ?> d-flex _text-white" style="background-image:url(<?php echo $bg_image; ?>);" type="section/module">
	<div class="container <?php echo $banner_type . '-container'; ?>">
		<div class="row">
			<div class="col col-xl-8 col-lg-9">

			<?php if(have_rows('group_text')):
				while(have_rows('group_text')) :
					the_row(); ?>

					<?php if($banner_type == 'default') : 
						$title_default = get_sub_field('title_default');
						$content_default = get_sub_field('content_default');
					?>

						<h1><?php echo $title_default; ?></h1>
						<div class="_wysiwyg">
							<?php echo $content_default; ?>
						</div>

					<?php else : 
						if(have_rows('carousel')): ?>
						<div class="banner-carousel">
							<?php $carousel_count = 0;
							while(have_rows('carousel')) :
								the_row();
								$carousel_count++;
								$title_carousel = get_sub_field('title_carousel');
								$content_carousel = get_sub_field('content_carousel');
							?>
							<div class="carousel-<?php echo $carousel_count; ?>">
								<h1><?php echo $title_carousel; ?></h1>
								<div class="_wysiwyg">
									<?php echo $content_carousel; ?>
								</div>
							</div>

							<?php endwhile; ?>
						</div>
					<?php endif;
					endif;

				endwhile;
			endif;

			?>

			</div>
		</div>
	</div>
</section>

<?php
	endwhile;
endif;
?>