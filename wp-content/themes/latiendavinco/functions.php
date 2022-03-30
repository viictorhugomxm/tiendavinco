<?php

  function init_template() {

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus(
      array(
        'top-menu' => 'Menú Principal'
      )
    );
  }

  add_action('after_setup_theme','init_template');

  function assets() {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css', '', '4.6.1','all');

    wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800;900&family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', '','1.0','all');

    wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');

    wp_enqueue_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js',array('jquery'),'4.6.1', true);

    wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', '1.0',true);
  }

  add_action('wp_enqueue_scripts','assets');

  function sidebar() { 
    register_sidebar(  
        array (
            'name' => 'Pie de página',
            'id' => 'footer',
            'description' => '<Zona de widgets para pie de pagina',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
  }

  add_action('widgets_init', 'sidebar');



?>