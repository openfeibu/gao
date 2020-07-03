<?php

return [

/*
 * Modules .
 */
    'modules'  => ['question'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'question'     => [
        'model'        => 'App\Models\Question',
        'table'        => 'questions',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['game_user_id','order_sn','content'], //数据库字段
        'translate'    => ['content'],
        'upload_folder' => '/page/link',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'game_user_id' => '=', //12，12
            'order_sn'  => 'like', //关键字  12， 1，2，
            'content' => 'like',
        ],
    ],

];
