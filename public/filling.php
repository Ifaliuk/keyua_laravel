<?php

$data = [
    'permissions' => [
        [
            'name' => 'write_code',
            'description' => 'code writing'
        ],
        [
            'name' => 'test_code',
            'description' => 'code testing'
        ],
        [
            'name' => 'manager_communication',
            'description' => 'communication with manager'
        ],
        [
            'name' => 'draw',
            'description' => 'draw'
        ],
        [
            'name' => 'task_definition',
            'description' => 'task definition'
        ]
    ],
    'employees' => [
        [
            'name' => 'programmer',
            'permissions' => [
                'write_code',
                'test_code',
                'manager_communication'
            ]
        ],
        [
            'name' => 'designer',
            'permissions' => [
                'draw',
                'manager_communication'
            ]
        ],
        [
            'name' => 'tester',
            'permissions' => [
                'test_code',
                'manager_communication',
                'task_definition'
            ]
        ],
        [
            'name' => 'manager',
            'permissions' => [
                'task_definition'
            ]
        ],

    ]
];

echo json_encode($data, JSON_PRETTY_PRINT);
