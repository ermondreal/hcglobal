<?php
if(have_rows('testimonial_group')):
	while(have_rows('testimonial_group')) :
		the_row();
		$bg_image 		= get_sub_field('background_image');
		$bg_image_pos 	= get_sub_field('background_image_position');
		$add_gradient 	= get_sub_field('add_gradient');
		$grad_color_pos	= get_sub_field('grad_color_posotion');

?>

<section class="py-5 <?php if($add_gradient == true): echo 'grad-' . $grad_color_pos . ' '; endif; echo $bg_image_pos; ?> d-flex" style="background-image:url(<?php echo $bg_image; ?>);" type="section/module">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if(have_rows('testimonial_group_text')):
					while(have_rows('testimonial_group_text')) :
						the_row();
						$section_title = get_sub_field('section_title');
				?>
						<h2 class="_section-title mb-3"><?php echo $section_title; ?></h2>
						<div class="row">
							<div class="col-12">
								<div class="testimonial-carousel">
									<?php
									if(have_rows('testimonial_items')):
										while(have_rows('testimonial_items')) :
											the_row();
											$testimonial_content 	= get_sub_field('testimonial_content');
											$testimonial_name 		= get_sub_field('testimonial_name');
											$testimonial_position 	= get_sub_field('testimonial_position');
											$testimonial_company 	= get_sub_field('testimonial_company');
											$testimonial_photo 		= get_sub_field('testimonial_photo');
									?>
										<div class="testimonial-item d-flex">
											<div class="_image">
												<div class="_overlay"></div>
												<img src="<?php echo $testimonial_photo['url']; ?>" alt="<?php echo $testimonial_photo['alt']; ?>">
											</div>
											<div class="_text">
												<div class="mb-auto pb-3">
													<span class="_quote">“</span>
													<?php echo $testimonial_content; ?>
												</div>
												<h6 class="mb-1"><strong><?php echo $testimonial_name; ?></strong></h6>
												<p><?php echo $testimonial_position; ?> at <?php echo $testimonial_company; ?></p>
											</div>
										</div>
									<?php
										endwhile;
									endif;
									?>
								</div>
							</div>
						</div>
				<?php
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