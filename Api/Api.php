<?php
    function custom_rest_endpoint() {
        register_rest_route( 'Api/v2', '/Wp-Custom-Api', array(
            'methods' => 'GET',
            'callback' => 'custom_api'
        ) );
    }
    add_action( 'rest_api_init', 'custom_rest_endpoint' );


    function custom_api() {
            $data = array();
            $query = new WP_Query( array( 'posts_per_page' => -1 ) );
            $i = 0;
            while ( $query -> have_posts() ) : $query -> the_post();
                $data[$i] = array(
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                );
                $i++;
            endwhile;

        return $data;
    }
