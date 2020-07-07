<?php

return [

/*
 * Modules .
 */
    'modules'  => ['wzdq'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'wzdq'     => [
        'model'        => 'App\Models\Wzdq',
        'table'        => 'wzdqs',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['id','wznc','wz'], //数据库字段
        'translate'    => ['content'],
        'upload_folder' => '/page/link',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        //搜索
        'search'        => [
            'game_user_id' => '=', //12，12
            'order_sn'  => 'like', //关键字  12， 1，2，
            'content' => 'like',
        ],
    ],

];
