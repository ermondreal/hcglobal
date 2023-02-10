<header>
	<div class="container">
		<div class="row">
			<div class="col d-flex align-items-center justify-content-between">
				<div>
					<img class="header-logo" src="<?php echo get_field('header_logo', 'option')['url']; ?>" alt="<?php echo get_field('header_logo', 'option')['alt']; ?>">
				</div>
				<div class="d-flex align-items-center ">
					<div>
						<?php
							wp_nav_menu(
								array( 
									'theme_location' => 'main-menu'
								)
							); 
						?>
					</div>
					<div>
						<a class="_hyperlink _text-white" href="#">login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

