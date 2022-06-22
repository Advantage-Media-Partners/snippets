<?php 

/** 
 * 1. ACF PRO Repeater Fields 
 * 2. Add new admin user via Functions.php
 * 3. CPT starter
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

// 3. CPT starter

<?php 

function cpt_starter_cpt() {
    $labels = array(
      'name'               => _x( 'CPT Starter', 'cpt-starter' ),
      'singular_name'      => _x( 'CPT Starter', 'cpt-starter' ),
      'add_new'            => _x( 'Add New', 'CPT Starter' ),
      'add_new_item'       => __( 'Add New CPT Starter' ),
      'edit_item'          => __( 'Edit CPT Starter' ),
      'new_item'           => __( 'New CPT Starter' ),
      'all_items'          => __( 'All CPT Starter' ),
      'view_item'          => __( 'View CPT Starter' ),
      'search_items'       => __( 'Search CPT Starter' ),
      'not_found'          => __( 'No CPT Starter found' ),
      'not_found_in_trash' => __( 'No CPT Starter found in the Trash' ),
      'menu_name'          => 'CPT Starter',
    );
    $args = array(
      'labels'              => $labels,
      'description'         => 'CPT Starter',
      'public'              => true,
      'publicly_queryable'  => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-businessman',
      'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'rewrite'             => array( 'slug' => 'cpt-starter' ),
      'has_archive'         => true,
      'show_in_rest' 		=> true,
      'taxonomies'  => array( 'types' )
    );
    register_post_type( 'cpt-starter', $args ); 
  }
  add_action( 'init', 'recent_projects_cpt' );

  ?> 