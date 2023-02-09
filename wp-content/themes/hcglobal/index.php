<?php get_header(); ?>

<?php

    if(have_rows('flexible_modules')):
        while(have_rows('flexible_modules')) :
        	the_row();
            
            $layout = get_row_layout();

            if(locate_template("templates/sections/".$layout.".php") != '') {
                get_template_part( "templates/sections/$layout" );
            }
        endwhile;
    endif;

?>

<?php get_footer(); ?>