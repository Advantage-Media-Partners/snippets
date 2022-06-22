<?php 

/** 
 * 1. ACF PRO Repeater Fields 
 * 2. Add new admin user via Functions.php
 * 3. CPT starter
 * 4. CPT custom taxonomy starter
 * 5. Kill Gutenberg - functions.php
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


// 4. CPT custom taxonomy starter

<?php 

function recent_projects_taxonomy() {
    $projects_labels = array(
        'name'               => _x( 'CPT Taxonomies', 'cpt-taxonomies' ),
        'singular_name'      => _x( 'CPT Taxonomy', 'cpt-taxonomy' ),
        'add_new'            => _x( 'Add New', 'CPT Taxonomy' ),
        'add_new_item'       => __( 'Add New CPT Taxonomy' ),
        'edit_item'          => __( 'Edit CPT Taxonomy' ),
        'new_item'           => __( 'New CPT Taxonomy' ),
        'all_items'          => __( 'All CPT Taxonomies' ),
        'view_item'          => __( 'View CPT Taxonomies' ),
        'search_items'       => __( 'Search CPT Taxonomies' ),
        'not_found'          => __( 'No CPT Taxonomies found' ),
        'not_found_in_trash' => __( 'No CPT Taxonomies found in the Trash' ),
        'menu_name'          => 'CPT Taxonomy',
      );
    register_taxonomy(
        'cpt-taxonomies',  // name of the taxonomy. 
        'CPT Taxonomy is for',             // post type name
        array(
            'hierarchical' => true,
            'labels' => $projects_labels, // custom labels
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'cpt-taxonomy',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
 }
 add_action( 'init', 'recent_projects_taxonomy');

 ?>

 // 5. Kill gutenberg - add to functions.php

 <?php 

add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('use_block_editor_for_post_type', '__return_false', 10);

?>