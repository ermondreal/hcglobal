<?php

$banner_type = get_sub_field('banner_type');
$bg_iamge = get_sub_field('background_image');

?>

<div class="container <?php echo $banner_type; ?>">
	<div class="row">
		<div class="col">

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
					if(have_rows('carousel')):
						$carousel_count = 0;
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

				<?php
						endwhile;
					endif;
				endif;

			endwhile;
		endif;

		?>

		</div>
	</div>
</div>