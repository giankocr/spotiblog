<?php
/*
Plugin Name: spotiblog
Plugin URI: https://gianko.com
Description: Permite a los usuarios crear y gestionar publicaciones de manera sencilla.
Version: 1.0.0
Author: Giancarlos Villalobos
Author URI: https://gianko.com
*/

// Evitar la ejecución directa del archivo.
if (! defined('ABSPATH')) {
    exit; // Salir si se accede directamente.
}

require_once 'include/init.php';

// Verificar si ACF está activo
if (! function_exists('acf_add_local_field_group')) {
    add_action('admin_notices', 'spotiblog_acf_missing_notice');
    return; // Detener la ejecución del plugin si ACF no está activo.
}

// Función para mostrar un aviso en el panel de administración.
function spotiblog_acf_missing_notice()
{
    ?>
    <div class="notice notice-error">
        <p><?php _e('El plugin spotiblog requiere el plugin Advanced Custom Fields (ACF) o Secure Custom Fields (SCF) para funcionar. Por favor, instálalo y actívalo.', 'spotiblog'); ?></p>
    </div>
    <?php
    // Desactiva el plugin.
    deactivate_plugins(plugin_basename(__FILE__));
}
