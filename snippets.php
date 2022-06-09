<?php 

/** 
 * 1. ACF PRO Repeater Fields 
 * 2. Add new admin user via Functions.php
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

// 2. add new admin user via Functions.php_check_syntax

<?php 

function new_admin_account(){
    $user = 'Username';
    $pass = 'Password';
    $email = 'email@domain.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
} }
add_action('init','new_admin_account');

?>