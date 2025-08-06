<?php
/**
 * Plugin Name:       Vi som jobbar här
 * Plugin URI:        https://example.com/
 * Description:       En enkel plugin som hanterar personalinformation.
 * Version:           1.0.0
 * Author:            Stefan
 * Author URI:        https://example.com/
 * Text Domain:       vi-som-jobbar-har
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Globalt variabel för tabellnamnet
global $visomjobbarhar_db_version;
$visomjobbarhar_db_version = '1.0';

/**
 * Funktion som skapar databastabellen vid aktivering.
 */
function visomjobbarhar_install() {
    global $wpdb;
    global $visomjobbarhar_db_version;
    
    $table_name = $wpdb->prefix . 'personal';
    $charset_collate = $wpdb->get_charset_collate();

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            namn tinytext NOT NULL,
            titel tinytext NOT NULL,
            epost varchar(100) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        add_option( 'visomjobbarhar_db_version', $visomjobbarhar_db_version );
    }
}

/**
 * Lägg till lite exempeldata vid aktivering
 */
function visomjobbarhar_install_data() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'personal';
    
    // Kontrollera om tabellen är tom innan vi lägger till data
    $count = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
    if ($count == 0) {
        $wpdb->insert(
            $table_name,
            array(
                'namn'  => 'Sara Johansson',
                'titel' => 'VD',
                'epost' => 'sara@exempel.se',
            )
        );
        $wpdb->insert(
            $table_name,
            array(
                'namn'  => 'Erik Svensson',
                'titel' => 'Utvecklare',
                'epost' => 'erik@exempel.se',
            )
        );
    }
}

/**
 * Funktion som tar bort databastabellen vid avaktivering
 */
function visomjobbarhar_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'personal';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
    delete_option('visomjobbarhar_db_version');
}

/**
 * Hookar för pluginets livscykel
 */
register_activation_hook( __FILE__, 'visomjobbarhar_install' );
register_activation_hook( __FILE__, 'visomjobbarhar_install_data' );
register_deactivation_hook( __FILE__, 'visomjobbarhar_uninstall' );


// --- Back-end (Adminpanel) ---
/**
 * Skapa en sida i WordPress adminpanel
 */
function visomjobbarhar_menu() {
    add_menu_page(
        'Vår Personal',
        'Vår Personal',
        'manage_options',
        'visomjobbarhar-personal',
        'visomjobbarhar_admin_page_content',
        'dashicons-businesswoman'
    );
}
add_action( 'admin_menu', 'visomjobbarhar_menu' );

/**
 * Funktion som renderar innehållet på adminsidan
 */
function visomjobbarhar_admin_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'personal';
    $results = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A );
    ?>
    <div class="wrap">
        <h1>Vår Personal</h1>
        <p>Här kan du se en lista över personalen.</p>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Namn</th>
                    <th>Titel</th>
                    <th>E-post</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td><?php echo esc_html($row['id']); ?></td>
                        <td><?php echo esc_html($row['namn']); ?></td>
                        <td><?php echo esc_html($row['titel']); ?></td>
                        <td><?php echo esc_html($row['epost']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}


// --- Front-end (Publik sida) ---
/**
 * Skapa en shortcode för att visa personalen på en publik sida.
 */
function visomjobbarhar_shortcode() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'personal';
    $results = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A );
    
    ob_start();
    ?>
    <style>
        .personal-lista {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .personal-kort {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .personal-kort h3 {
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 1.2em;
        }
        .personal-kort p {
            margin: 0;
            color: #555;
        }
    </style>
    <div class="personal-lista">
        <?php foreach ($results as $row) : ?>
            <div class="personal-kort">
                <h3><?php echo esc_html($row['namn']); ?></h3>
                <p><strong>Titel:</strong> <?php echo esc_html($row['titel']); ?></p>
                <p><strong>E-post:</strong> <a href="mailto:<?php echo esc_attr($row['epost']); ?>"><?php echo esc_html($row['epost']); ?></a></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'personal_lista', 'visomjobbarhar_shortcode' );