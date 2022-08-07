<?php

/**
 * Used to store website configuration information.
 *
 * @var string
 */
function config($key = '')
{
    $config = [
        'name' => 'ERCC',
        'nav_menu' => [
            '' => 'Microsoft',
            /*'about-us' => 'About Us',
            'products' => 'Products',
            'contact' => 'Contact',*/
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'pretty_uri' => true,
        'version' => 'v2.0',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
