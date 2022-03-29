<?php 

/** 
 * 1. ACF PRO Repeater Fields 
 * 
 * 
**/
?>

// 1. ACF PRO Repeater Fields 

<?php if(have_rows('parent_field_name')) { ?>
        <div class="repeater-container">
            <?php
                // counter varibale 
                // useful for applying classes to first occurence of an item
                $x = 0;
                while( have_rows('parent_field_name') ) : the_row();
                    $image = get_sub_field('child_sub_field_name'); 
                ?>
                // content here
            <?php 
                $x++;  
                endwhile; 
            ?>
        </div>
<?php } ?>