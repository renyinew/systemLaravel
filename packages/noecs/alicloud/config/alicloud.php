<?php
return [
    /*
    |--------------------------------------------------------------------------
    | ali sms send config
    |--------------------------------------------------------------------------
    */
    'sms' => [
        // 单条发送配置
        'send_sms' =>[
            // 若是需要不同的账号发送，需要配置多个实例。
            'noecs' => [
                // 短信签名名称
                'sin_name' => '',
                // AccessKeyId
                'access_key_id' => '',
                'scenes' => [
                    // 使用场景（例如register注册场景）
                    'register' =>[
                        'template_code' => '',
                    ],
                    // 'login' => [
                    //     'template_code' => '',
                    // ]
                ]
            ]
        ],
        'send_batch_sms' => [
            // 若是不同账号，需要配置多个不同的单例
            'noecs' => [
                'access_key_id' => ''
            ]
        ]
    ]
];