<?php
if(have_rows('multiple_section_group')):
	while(have_rows('multiple_section_group')) :
		the_row();
		$bg_image 		= get_sub_field('background_image');
		$bg_image_pos 	= get_sub_field('background_image_position');
		$add_gradient 	= get_sub_field('add_gradient');
		$grad_color_pos	= get_sub_field('grad_color_posotion');
?>
		<section class="<?php if($add_gradient == true): echo 'grad-' . $grad_color_pos . ' '; endif; echo $bg_image_pos; ?> d-flex flex-column" style="background-image:url(<?php echo $bg_image; ?>);" type="section/module">

		<?php if(have_rows('multiple_section_group_text')):
			while(have_rows('multiple_section_group_text')) :
				the_row();
				$select_section	= get_sub_field('select_section');

				foreach( $select_section as $section ):
				if($section == 'ms_piechart'):
		?>

				<section class="multiple-section py-5">
					<div class="container">
						<div class="row">
							<div class="col">
								<?php
								if(have_rows('ms_piechart_group_text')):
									while(have_rows('ms_piechart_group_text')) :
										the_row();
										$ms_section_title = get_sub_field('ms_section_title');
									?>
										<h2 class="_section-title text-center mb-5"><?php echo $ms_section_title; ?></h2>
										<div class="row">
											<div class="col-lg-8 order-2">
												<?php
												if(have_rows('ms_piechart_count')):
													$pie_chart = 0;
													while(have_rows('ms_piechart_count')) :
														the_row();
														$ms_piechart_text = get_sub_field('ms_piechart_text');
												?>
														<div class="pie-chart-section d-flex align-items-center justify-content-evenly justify-content-lg-start">
															<div class="pie-chart-container d-flex col-6 col-lg-7 justify-content-center">
																<form class="pie-chart pie-chart<?php echo $pie_chart; ?>">
																	<div class="pie-chart-text">
																		<div class="_content">
																			<?php echo $ms_piechart_text; ?>
																		</div>
																	</div>
																	<?php
																	if(have_rows('ms_piechart_items')):
																		$pie_item = 0;
																		while(have_rows('ms_piechart_items')) :
																			the_row();
																			$pie_item++;
																			$ms_piechart_percentage = get_sub_field('ms_piechart_percentage');
																	?>
																			<input class="pie-chart-percentage" type="number" value="<?php echo $ms_piechart_percentage; ?>" item-count="<?php echo $pie_item; ?>">
																	<?php
																		endwhile;
																	endif;
																	?>
												 					<svg class="pie-chart-view pie-chart-view<?php echo $pie_chart; ?>" viewBox="0 0 32 32"></svg>
																	<output id="pie_result"></output>
																</form>
															</div>
															<ul class="pie-chart-list list-reset col-5 col-lg-5">
															<?php
															if(have_rows('ms_piechart_items')):
																while(have_rows('ms_piechart_items')) :
																	the_row();
																	$ms_piechart_title = get_sub_field('ms_piechart_title');
															?>
																	<li><?php echo $ms_piechart_title; ?></li>
															<?php
																endwhile;
															endif;
															?>
															</ul>
														</div>
												<?php
														$pie_chart++;
													endwhile;
												endif;
												?>
											</div>
											<div class="col-lg-4 col-lg-4 order-1 order-lg-2">
												<div class="d-flex d-lg-block flex-wrap">
													<?php
													if(have_rows('ms_piechart_numbers')):
														while(have_rows('ms_piechart_numbers')) :
															the_row();
															$ms_piechart_breakdown_title = get_sub_field('ms_piechart_breakdown_title');
															$ms_piechart_breakdown_num = get_sub_field('ms_piechart_breakdown_num');
															$ms_piechart_breakdown_plus = get_sub_field('ms_piechart_breakdown_plus');
													?>
														<div class="pie-chart-breakdown-container text-center mx-auto">
															<div class="pie-chart-breakdown d-inline-block">
																<div class="_number">
																	<?php echo $ms_piechart_breakdown_num; ?><sup class="_plus"><?php if($ms_piechart_breakdown_plus == 1): echo '+'; endif; ?></sup>
																</div>
																<div class="_title">
																	<?php echo $ms_piechart_breakdown_title; ?>
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
								<?php	
									endwhile;
								endif;
								?>
							</div>		
						</div>
					</div>
				</section>

				<?php elseif($section == 'ms_testimonial'): ?>
					<section class="multiple-section py-5">
						ms_testimonial
					</section>
				<?php elseif($section == 'ms_team'): ?>
					<section class="multiple-section py-5">
						ms_team
					</section>
				<?php elseif($section == 'ms_technology'): ?>
					<section class="multiple-section py-5">
						ms_technology
					</section>
				<?php endif; ?>

		<?php
				endforeach;
			endwhile;
		endif;
		?>
		</section>
<?php	
	endwhile;
endif;
?>