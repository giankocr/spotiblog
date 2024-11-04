<?php

// Evitar la ejecución directa del archivo.
if (! defined('ABSPATH')) {
    exit;
    // Salir si se accede directamente.
}

/**
* spotify_posts_list_shortcode.
*
* @param  mixed $atts
* @return void
*/

function spotify_posts_list_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'posts_per_page' => 5, // Default number of posts to display.
        ),
        $atts,
        'spotify_posts_list'
    );

    $posts_per_page = intval($atts[ 'posts_per_page' ]);

    $args = array(
        'post_type'      => 'podcast',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $spotify_posts_query = new WP_Query($args);

    $output = '';
    $output .= '<div class="spotify_posts_list" style="">';
    if ($spotify_posts_query->have_posts()) {
        $output .= '<ul>';
        while ($spotify_posts_query->have_posts()) {
            $spotify_posts_query->the_post();
            $url = esc_url(get_field('spotify_url'));
            $type = esc_attr(get_field('spotify_type'));
            if (!empty($url)) {
                $parsed_url = parse_url($url);
                $path = $parsed_url['path'];
                $last_slash_position = strrpos($path, '/');
                $substring = substr($path, $last_slash_position + 1);
                $question_mark_position = strpos($substring, '?');
                if ($question_mark_position !== false) {
                    $track_id = substr($substring, 0, $question_mark_position);
                } else {
                    $track_id = $substring; // Tomamos toda la subcadena si no hay '?'.
                }
            } else {
                $track_id = 'Error con la url'; // Mensaje de error si la URL es nula o vacía.
            }

            $output .= '<li style="display:block;position: relative;">';
            $output .= '<h2 class="title_podcast" style="font-size:14px; font-weight:600;">' . esc_html(get_the_title()) . '</h2>';
            // Sanitización del track_id.
            $output .= '<iframe style="max-height: 90px;" src="https://open.spotify.com/embed/' . esc_html($type) . '/' . esc_html($track_id) . '?theme=0&utm_source=website"';
            $output .= 'width="100%" height="100%" frameBorder="0"';
            $output .= 'allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"';
            $output .= 'title="Reproductor de Spotify para ' . esc_html(get_the_title()) . '" aria-label="Reproductor de Spotify"';
            $output .= 'onclick="dataLayer.push({\'event\':\'spotify_play\', \'track_id\':\'' . esc_html($track_id) . '\', \'track_title\':\'' . esc_html(get_the_title()) . '\'})"></iframe>';
            // Evento de GTM.
            $output .= '</li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    } else {
        $output .= '<p>No posts found.</p>';
        // Mensaje si no hay publicaciones.
    }
    $output .= '</div>';
    return $output;
}
