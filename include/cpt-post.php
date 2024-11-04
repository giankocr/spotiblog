<?php

/**
 * cpt_spotiblog.
 *
 * @return void
 */
function cpt_spotiblog()
{
        register_post_type('podcast', array(
        'labels' => array(
            'name' => 'Podcast',
            'singular_name' => 'Podcast',
            'menu_name' => 'Podcast',
            'all_items' => 'All Podcast',
            'edit_item' => 'Edit Podcast',
            'view_item' => 'View Podcast',
            'view_items' => 'View Podcast',
            'add_new_item' => 'Add New Podcast',
            'add_new' => 'Add New Podcast',
            'new_item' => 'New Podcast',
            'parent_item_colon' => 'Parent Podcast:',
            'search_items' => 'Search Podcast',
            'not_found' => 'No podcast found',
            'not_found_in_trash' => 'No podcast found in Trash',
            'archives' => 'Podcast Archives',
            'attributes' => 'Podcast Attributes',
            'insert_into_item' => 'Insert into podcast',
            'uploaded_to_this_item' => 'Uploaded to this podcast',
            'filter_items_list' => 'Filter podcast list',
            'filter_by_date' => 'Filter podcast by date',
            'items_list_navigation' => 'Podcast list navigation',
            'items_list' => 'Podcast list',
            'item_published' => 'Podcast published.',
            'item_published_privately' => 'Podcast published privately.',
            'item_reverted_to_draft' => 'Podcast reverted to draft.',
            'item_scheduled' => 'Podcast scheduled.',
            'item_updated' => 'Podcast updated.',
            'item_link' => 'Podcast Link',
            'item_link_description' => 'A link to a podcast.',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_position' => 2,
        'menu_icon' => 'dashicons-spotify',
        'supports' => array(
            0 => 'title',
            1 => 'editor',
        ),
        'delete_with_user' => false,
        ));
}
