<?php

//We create our new rest API  here
//anybody serach for this path wil get the result returned from here.

function universityRegisterSearch()
{
    
    register_rest_route('university/v1', 'search', [
        //safest way of setting method for 'GET', 'POST' etc.
        'methods'=> WP_REST_SERVER::READABLE,
        'callback'=> 'universitySerachResults'
    ]);
}

/**
 * @data - is WP data that contains all the information.
 */
function universitySerachResults($data)
{
    $mainQuery = new WP_Query([
        // 'post_type'=> 'professor',
        /**
         * @s = acronym for search
         * @data[''] = our custom name
         * @santize_text_field - WP sanitization
         */
        'post_type'=> ['post', 'page', 'professor','program', 'campus','event'],
        's' => sanitize_text_field($data['term'])
       
    ]);

    $results = [
        'generalInfo'=>[],
        'programs'=>[],
        'events'=>[],
        'campuses'=>[],
        'professors'=>[]
    ];

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        
        //only if blog/page
        if(get_post_type()== 'post' || get_post_type()== 'page') {
            array_push(
                $results['generalInfo'],
                [
                    'title'=> get_the_title(),
                    'permalink'=> get_the_permalink()
                ]
            );
        }
        //only if professor
        if(get_post_type()== 'professor') {
            array_push(
                $results['professors'],
                [
                    'title'=> get_the_title(),
                    'permalink'=> get_the_permalink()
                ]
            );
        }
        //only if programs
        if(get_post_type()== 'program') {
            array_push(
                $results['programs'],
                [
                    'title'=> get_the_title(),
                    'permalink'=> get_the_permalink()
                ]
            );
        }
        //only if events
        if(get_post_type()== 'events') {
            array_push(
                $results['events'],
                [
                    'title'=> get_the_title(),
                    'permalink'=> get_the_permalink()
                ]
            );
        }
        //only if events
        if(get_post_type()== 'campuses') {
            array_push(
                $results['campuses'],
                [
                    'title'=> get_the_title(),
                    'permalink'=> get_the_permalink()
                ]
            );
        }


    }

    return $results;
}

//Note that WP automatically converts the return result into JSON.
add_action('rest_api_init', 'universityRegisterSearch');
