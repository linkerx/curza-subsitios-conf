<?php

/**
 * Plugin Name: LNK-CURZA Site Options
 * Plugin URI: https://github.com/linkerx
 * Description: Opciones para subsitios
 * Version: 0.1
 * Author: Diego Martinez Diaz
 * Author URI: https://github.com/linkerx
 * License: GPLv3
 */

function curza_site_options_page() {
    add_menu_page(
        'Opciones de Subsitio CURZA',
        'Subsitio',
        'manage_options',
        'curza_site_options',
        'curza_site_options_page_html',
        '',
        50
    );
}
add_action( 'admin_menu', 'curza_site_options_page' );

function curza_site_options_page_html(){
    echo '<h1>Opciones de Subsitio</h1>';
    echo "<form method='POST'>";

    ////////////////
    // Debug
    ////////////////    

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    ////////////////
    // Carga de Datos
    ////////////////

    if (isset($_POST['curza_tipo_pagina'])) {
        update_option('curza_tipo_pagina',$_POST['curza_tipo_pagina']);
    }

    $tipo_pagina = get_option('curza_tipo_pagina','otro');
    
    if($tipo_pagina == "departamento" && isset($_POST['curza_id_departamento'])) {
        update_option('curza_id_departamento', $_POST['curza_id_departamento']);
    }

    $id_departamento = get_option('curza_id_departamento',0);

    if(isset($_POST['curza_barra_menu_abierta'])) {
        if($_POST['curza_barra_menu_abierta'] == "on") {
            update_option('curza_barra_menu_abierta', 1);
        } else {
            update_option('curza_barra_menu_abierta', 0);
        }
    }

    $barra_menu_abierta = get_option('curza_barra_menu_abierta',0);

    ////////////////
    // Tipo Página
    ////////////////

    echo "<h2>Tipo de Página</h2>";
    echo "<p><label for='curza_tipo_pagina'>Tipo de Página: </label>";
    echo "<select name='curza_tipo_pagina' name='curza_tipo_pagina' >";
    echo "<option value='departamento' ";
    if($tipo_pagina == 'departamento') { echo "selected"; }
    echo ">Departamento</option>";
    echo "<option value='otro' ";
    if($tipo_pagina == 'otro') { echo "selected"; }
    echo ">Otro</option>";
    echo "</select></p>";
    
    echo "<p><label for='curza_id_departamento'>Identificador de Departamento (Sistema de programas)</label>";
    echo "<input id='curza_id_departamento' name='curza_id_departamento' type='number' value='".$id_departamento."' /></p>";

    ////////////////
    // Configuracion Barras
    ////////////////

    echo "<h2>Configuracion de Barras</h2>";
    echo "<p><label for='curza_barra_menu_abierta'>Iniciar con barra de menú abierta</label>";
    echo "<input id='curza_barra_menu_abierta' name='curza_barra_menu_abierta' type='checkbox' ";
        if($barra_menu_abierta == 1) {
            echo "checked";
        }
    echo " /></p>";
    
    ////////////////
    // Facebook
    ////////////////

    if(isset($_POST['curza_subsitio_conf_facebook_app_id'])) {
        update_option('curza_subsitio_conf_facebook_app_id',$_POST['curza_subsitio_conf_facebook_app_id']);
    }
    $facebook_app_id = get_option('curza_subsitio_conf_facebook_app_id','xxx');

    if(isset($_POST['curza_subsitio_conf_facebook_app_secret'])) {
        update_option('curza_subsitio_conf_facebook_app_secret',$_POST['curza_subsitio_conf_facebook_app_secret']);
    }
    $facebook_app_secret = get_option('curza_subsitio_conf_facebook_app_secret','xxx');

    if(isset($_POST['curza_subsitio_conf_facebook_token'])) {
        update_option('curza_subsitio_conf_facebook_token',$_POST['curza_subsitio_conf_facebook_token']);
    }
    $facebook_token = get_option('curza_subsitio_conf_facebook_token','xxx');

    if(isset($_POST['curza_subsitio_conf_facebook_page_id'])) {
        update_option('curza_subsitio_conf_facebook_page_id',$_POST['curza_subsitio_conf_facebook_page_id']);
    }
    $facebook_page_id = get_option('curza_subsitio_conf_facebook_page_id','xxx');

    echo "<h2>Facebook</h2>";
    echo "<p><label for='curza_subsitio_conf_facebook_app_id'>App ID:</label>";
    echo "<input type='text' name='curza_subsitio_conf_facebook_app_id' value='".$facebook_app_id."' /></p>";

    echo "<p><label for='curza_subsitio_conf_facebook_app_secret'>App Secret:</label>";
    echo "<input type='text' name='curza_subsitio_conf_facebook_app_secret' value='".$facebook_app_secret."' /></p>";
    
    echo "<p><label for='curza_subsitio_conf_facebook_token'>Token :</label>";
    echo "<input type='text' name='curza_subsitio_conf_facebook_token' value='".$facebook_token."' /></p>";

    echo "<p><label for='curza_subsitio_conf_facebook_page_id'>Page ID :</label>";
    echo "<input type='text' name='curza_subsitio_conf_facebook_page_id' value='".$facebook_page_id."' /></p>";

    ////////////////
    // Guardar
    ////////////////

    echo "<input type='submit' value='Guardar' class='button button-primary button-large'>";
    echo "</form>";

}