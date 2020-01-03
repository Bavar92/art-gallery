<?php
add_action('init', 'add_post_type');
function add_post_type()
{
    register_post_type('news_and_events',
        array(
            'labels' => array(
                'name' => 'Новини та події',
                'singular_name' => 'Новина чи подія',
                'add_new' => 'Добавити Новину чи подію',
                'add_new_item' => 'Новину чи подію',
                'edit_item' => 'Edit',
                'new_item' => 'New',
                'all_items' => 'All',
                'view_item' => 'View',
                'search_items' => 'Search',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'No found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Новини та події'
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'supports' => array('title',     'thumbnail'),
            //'rewrite' => array('slug' => 'services'),
            'has_archive' => true,
            'hierarchical' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'page',
            'query_var' => true,
            'menu_icon' => 'dashicons-schedule',
        ));

}