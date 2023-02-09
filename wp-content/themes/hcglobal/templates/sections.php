<?php
    $section = $section ? $section : '';
    // check if the flexible content field has rows of data
    if( have_rows('flexible_modules', $section) ):

         // loop through the rows of data
        while ( have_rows('flexible_modules', $section) ) : the_row();
            
            $layout = get_row_layout();   
            if (locate_template("templates/sections/".$layout.".php") != '') {
                if(!get_sub_field('hide_section')) {
                    get_template_part( "templates/sections/$layout" );
                }     
            } else {
                if( current_user_can('administrator')) {
                    include( locate_template( "templates/sections/section-missing.php" ) );
                }                    
            }
        endwhile;
    endif;
?>