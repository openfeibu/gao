<?php

return [

/*
 * Modules .
 */
    'modules'  => ['order'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'order'     => [
        'model'        => 'App\Models\Order',
        'table'        => 'orders',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['content'],
        'translate'    => ['content'],
        'upload_folder' => '/page/link',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'content'  => 'like',
        ],
    ],

];
