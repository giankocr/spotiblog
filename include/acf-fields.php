<?php

// Evitar la ejecución directa del archivo.
if (! defined('ABSPATH')) {
    exit; // Salir si se accede directamente.
}

/**
 * acf_spotiblog_fields.
 *
 * @return void
 */
function acf_spotiblog_fields()
{
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
    'key' => 'group_65ca66c00421c',
    'title' => 'podcast',
    'fields' => array(
        array(
            'key' => 'field_65ca66c06c05l',
            'label' => 'Spotify Type',
            'name' => 'spotify_type',
            'aria-label' => '',
            'type' => 'select',
            'instructions' => 'Selecciona el tipo de spotify.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'choices' => array(
                'episode' => 'Episode',
                'show' => 'Show',
                'playlist' => 'Playlist',
                'album' => 'Album',
                'artist' => 'Artist',
                'track' => 'Track',
                'user' => 'User',
                'radio' => 'Radio',
                'category' => 'Category',
                'genre' => 'Genre',
                'podcast' => 'Podcast',
                'episode' => 'Episode'
            ),
        ),
        array(
            'key' => 'field_65ca66c06c05b',
            'label' => 'Spotify URL',
            'name' => 'spotify_url',
            'aria-label' => '',
            'type' => 'url',
            'instructions' => 'Copia y pega la url de la canción de spotify, de la opcion compartir.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'podcast',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
    ));
}
