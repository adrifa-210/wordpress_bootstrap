<?php
/**
 * Encola estilos y scripts del tema.
 */
function mi_tema_bootstrap_scripts() {
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();

    // 1. Fuentes e iconos externos
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:wght@400;700&display=swap',
        array(),
        null
    );

    wp_enqueue_script(
        'font-awesome',
        'https://use.fontawesome.com/releases/v6.3.0/js/all.js',
        array(),
        '6.3.0',
        array( 'in_footer' => true, 'strategy' => 'defer' )
    );

    // 2. CSS principal del tema
    wp_enqueue_style(
        'freelancer-style',
        $theme_uri . '/assets/css/styles.css',
        array( 'google-fonts' ),
        filemtime( $theme_path . '/assets/css/styles.css' )
    );

    // 3. JS: Bootstrap (CDN) y script del tema (footer)
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.2.3',
        true
    );

    wp_enqueue_script(
        'freelancer-script',
        $theme_uri . '/assets/js/scripts.js',
        array( 'bootstrap-bundle' ),
        filemtime( $theme_path . '/assets/js/scripts.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mi_tema_bootstrap_scripts' );