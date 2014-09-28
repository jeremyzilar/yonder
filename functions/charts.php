<?php 
  // Benefits Docs
  register_post_type('benefits', array(
    'label' => 'Benefits Docs',
    'description' => 'Benefits Documentation',
    'public' => true,
    'show_ui' => current_user_can('level_10') || current_user_can('edit_custom_posts') || current_user_can('benefits'),
    'show_in_menu' => current_user_can('level_10') || current_user_can('edit_custom_posts') || current_user_can('benefits'),
    'capability_type' => 'page',
    'hierarchical' => true,
    'rewrite' => array('slug' => 'benefits'),
    'query_var' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'author', 'page-attributes',),
    'taxonomies' => array('post_tag', 'employee_types', 'employee_locations',),
    'labels' => array(
      'name' => 'Benefits Docs',
      'singular_name' => 'Benefits Doc',
      'menu_name' => 'Benefits Docs',
      'add_new' => 'Add Benefits Doc',
      'add_new_item' => 'Add New Doc',
      'edit' => 'Edit',
      'edit_item' => 'Edit Benefits Doc',
      'new_item' => 'New Benefits Doc',
      'view' => 'View Benefits Doc',
      'view_item' => 'View Benefits Doc',
      'search_items' => 'Search Benefits Docs',
      'not_found' => 'No Benefits Docs Found',
      'not_found_in_trash' => 'No Benefits Docs Found in Trash',
      'parent' => 'Parent Benefits Doc',
      ),
    )
  );

?>