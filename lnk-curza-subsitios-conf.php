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

    if (isset($_POST['curza_tipo_pagina'])) {
        update_option('curza_tipo_pagina',$_POST['curza_tipo_pagina']);
    }
    $tipo_pagina = get_option('curza_tipo_pagina','otro');

    echo "<form method='POST'>";
    echo "<label for='curza_tipo_pagina'>Tipo de Página: </label>";
    echo "<select name='curza_tipo_pagina' name='curza_tipo_pagina' >";
    echo "<option value='departamento' ";
    if($tipo_pagina == 'departamento') { echo "selected"; }
    echo ">Departamento</option>";
    echo "<option value='otro' ";
    if($tipo_pagina == 'otro') { echo "selected"; }
    echo ">Otro</option>";
    echo "</select><br />";
    echo "<input type='submit' value='Guardar' class='button button-primary button-large'>";
    echo "</form>";

}