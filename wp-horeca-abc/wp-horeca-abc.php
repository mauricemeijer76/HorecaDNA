<?php
/*
Plugin Name: Horeca ABC 
Plugin URI: http://jakobroelf.com
Description: This plugin is made for CPI and HorecaDNA in order to support the HorecaABC.
Version: 1.0
Author: Maurice Meijer
Author URI: http://jakobroelf.com
Requires: WordPress Version 2.6 or above
*/

//Create a custom posttype called notions, couldn't find a better word, which will store each element.
    //Acces only as Admin
    if (is_admin()){    
    function horeca_abc_post_notion() {
              $labels = array(
                'name'               => _x( 'HorecaABC', 'post type general name' ),
                'singular_name'      => _x( 'HorecaABC', 'post type singular name' ),
                'add_new'            => _x( 'Nieuw item ', 'item' ),
                'add_new_item'       => __( 'Nieuw HorecaABC item toevoegen' ),
                'edit_item'          => __( 'Wijzig item' ),
                'new_item'           => __( 'Nieuw item' ),
                'all_items'          => __( 'Alle items' ),
                'view_item'          => __( 'Bekijk items' ),
                'search_items'       => __( 'Doorzoek HorecaABC' ),
                'not_found'          => __( 'Geen HorecaABC items gevonden' ),
                'not_found_in_trash' => __( 'Geen HorecaABC items gevonden in de Prullebak' ), 
                'parent_item_colon'  => '',
                'menu_name'          => 'Horeca ABC'
              );
              $args = array(
                'labels'        => $labels,
                'description'   => 'Holds our HorecaABC Notions and specific data',
                'public'        => true,
                'menu_position' => 5,
                'supports'      => array( 'title', 'editor' ),
                'has_archive'   => true,
              );
              register_post_type( 'notions', $args ); 
            }
    
    add_action( 'init', 'horeca_abc_post_notion' );


            // Create a custom taxonomy, maybe not the best way, but it can order the notions by 26 letters (a..z)
            function horeca_abc_taxonomies_notions() {
              $labels = array(
                'name'              => _x( 'ABC Categorieën ', 'taxonomy general name' ),
                'singular_name'     => _x( 'ABC Categorie ', 'taxonomy singular name' ),
                'search_items'      => __( 'Zoek in het abc' ),
                'all_items'         => __( 'Het gehele abc' ),
                'parent_item'       => null,
                'parent_item_colon' => null,
                'edit_item'         => __( 'Wijzig het abc' ), 
                'update_item'       => __( 'Update het abc' ),
                'add_new_item'      => __( 'Add letter to the abc' ),
                'new_item_name'     => __( 'New letter' ),
                'menu_name'         => __( 'ABC Categorieën' ),
              );
              $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'slug' => 'abc', 
              );
              register_taxonomy( 'notion-abc', 'notions', $args );
            }
    add_action( 'init', 'horeca_abc_taxonomies_notions', 0 );
    }
?>