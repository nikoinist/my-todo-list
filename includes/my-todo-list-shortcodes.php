<?php

//list todos
function mtl_list_todos($atts, $content = null){
    
    //post var
    global $post;
    
    // Create attributes and defaults
    $atts = shortcode_atts(array(
        'title' => 'My todos',
        'count' => 10,
        'category' => 'all'
    ), $atts);
    
    //Check cattegory attribute
    if($atts['category'] == 'all') {
        $terms = '';
    }else {
        $terms = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    //query arrgs
    $args = array(
        'post_type'         => 'todo',
        'post_status'       => 'publish',
        'order_by'          => 'due_date',
        'order'             => 'ASC',
        'posts_per_page'    => $atts['count'],
        'tax_query'         => $terms
    );
    
    //Fetch todos
    
    $todos = new WP_Query($args);
    
    //Check for todos
    if($todos->have_posts()){
        //Get Category slug
        $category = str_replace('-', ' ', $atts['category']);
        $category = strtolower($category);
        
        //Init output;
        $output = '';
        
        //Build output
        $output .= '<div class="todo-list">';
        
        while($todos->have_posts()){
            $todos->the_post();
            
            //Get field values
            $priority = get_post_meta($post->ID, 'priority', true);
            $details = get_post_meta($post->ID, 'details', true);
            $due_date = get_post_meta($post->ID, 'due_date', true);
            
            $output .='<div class=todo">';
            $output .= '<h4>'.get_the_title().'</h4>';
            $output .= '<div>'.$details.'</div>';
            $output .= '<div class="priority-'.strtolower($priority).'">Priority: '.$priority.'</div>';
            $output .= '<div class="due_date">Due Date: '.$due_date.'</div';
            $output .='</div>';
        }
        
        $output .= '</div>';
        
        //Reset Post data
        wp_reset_postdata();
        
        return $output;
    } else {
        return '<p>No Todos</p>';
    }
}

//Todo list shortcode

add_shortcode('todos', 'mtl_list_todos');
