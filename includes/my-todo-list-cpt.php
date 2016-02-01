<?php
    //Create Custom Post type
    function mtl_register_todo(){
        $singular_nane = apply_filters('mtl_label_single', 'Todo');
        $plural_nane = apply_filters('mtl_label_plural', 'Todos');
        
        $lables = array(
                'name'                   => $plural_nane,
                'singular_name'          => $singular_nane,
                'add_new'                => 'Add New',
                'add_new_item'           => 'Add New '. $singular_nane,
                'edit'                   => 'Edit',
                'edit_item'              => 'Edit ', $singular_nane,
                'new_item'               => 'New '.$singular_nane,
                'view'                   => 'View',
                'view_item'              => 'View '. $singular_nane,
                'search_items'           => 'Search '.$plural_nane,
                'not_found'              => 'No '.$plural_nane.' Found',
                'not_found_in_trash_'    => 'No '.$plural_nane.' Found',
                'menu_name'              => $plural_nane
                
        );
        $args = apply_filters('mtl_todo_args', array(
                'labels'                => $lables,
                'description'           => 'Todos by category',
                'taxonomies'            => array('category'),
                'public'                => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-edit',
                'show_in_nav_menus'     => true,
                'query_var'             => true,
                'can_export'            => true,
                'rewrite'               => array('slug' => 'todo'),
                'capability_type'       => 'post',
                'supports'              => array('title')
                
        ));
        
        //Register post type
        register_post_type('todo', $args);
    }
    
    add_action('init', 'mtl_register_todo');