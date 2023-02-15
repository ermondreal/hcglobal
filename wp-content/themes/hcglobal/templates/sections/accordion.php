<?php
if(have_rows('accordion_group')):
	while(have_rows('accordion_group')) :
		the_row();
		$bg_image 		= get_sub_field('background_image');
		$bg_image_pos 	= get_sub_field('background_image_position');
		$add_gradient 	= get_sub_field('add_gradient');
		$grad_color_pos	= get_sub_field('grad_color_posotion');

?>

<section class="accordion-section py-5 <?php echo 'grad-' . $grad_color_pos . ' '; echo $bg_image_pos; ?> d-flex _text-white" style="background-image:url(<?php echo $bg_image; ?>);" type="section/module">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="accordion animated page-center" id="accordion-container" data-animation="fadeInRight" id="">
					<?php
					if(have_rows('acc_group_text')):
						while(have_rows('acc_group_text')) :
							the_row();
							$section_title = get_sub_field('section_title');
					?>
							<h2 class="_section-title"><?php echo $section_title; ?></h2>
							<?php
							if(have_rows('accordion_items')):
								$acc_count = 0;
								while(have_rows('accordion_items')) :
									the_row();
									$acc_count++;
									$acc_title = get_sub_field('acc_title');
									$acc_content = get_sub_field('acc_content');
							?>
								<div class="accordion-item-container">
									<div class="accordion-item">
										<h2 class="accordion-header" id="<?php echo 'accordion'.$acc_count; ?>">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'collapse'.$acc_count; ?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$acc_count; ?>">
											<?php echo $acc_title; ?>
											</button>
											<div class="_line"></div>
										</h2>
										<div id="<?php echo 'collapse'.$acc_count; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'accordion'.$acc_count; ?>" data-bs-parent="#accordion-container">
											<div class="accordion-body">
												<div class="_content">
													<?php echo $acc_content; ?>
												</div>
												<div class="_button">
													<a href="" class="for-desktop animated fadeInLeft">
														<svg xmlns="http://www.w3.org/2000/svg"width="60"height="60"viewBox="0 0 101.19 101.19"> <g id="Group_421"data-name="Group 421"transform="translate(-1694.905 -1700.313)"> <rect id="Rectangle_250"data-name="Rectangle 250"width="71.552"height="71.552"transform="translate(1694.905 1750.908) rotate(-45)"fill="#fff"/> <g id="Group_257"data-name="Group 257"transform="translate(803 1948) rotate(-90)"> <g id="Group_1"data-name="Group 1"transform="translate(2242.883 -193.558) rotate(90)"> <g id="Group_10"data-name="Group 10"transform="translate(1131.558 2032.699)"> <line id="Line_2"data-name="Line 2"x2="14.34"y2="14.592"transform="translate(0 0)"fill="none"stroke="#424242"stroke-width="5"/> <line id="Line_3"data-name="Line 3"y1="14.592"x2="14.592"transform="translate(0 11.592)"fill="none"stroke="#424242"stroke-width="5"/> </g> </g> </g> </g></svg>
														Know More
													</a>
													<a href="" class="btn btn-white for-mobile">Know More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
								endwhile;
							endif;
						endwhile;
					endif;
					?>
				</div>
			</div>	
		</div>
	</div>
</section>

<?php
	endwhile;
endif;
?>
