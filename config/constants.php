<?php

return [

    'Common' => [
        'record_not_exist'          => 'Record does not exist.',
        'success'                   => 'Success',
        'failed'                    => 'Failed',
        'record_success_update'     => 'Record updated successfully.'
    ],

    'FileManager' => [
        'file_exists'               => 'File already exists.',
        'directory_exists'          => 'Directory already exists.',
        'directory_create_success'  => 'Directory successfully created'
    ],

    'Status' => [
        'active'                    => 1,
        'inactive'                  => 0,
        'deleted'                   => -1
    ],

    'AuditTrail' => [
        'actions' => [
            'add'                   => 'Add',
            'update'                => 'Update',
            'delete'                => 'Delete'
        ],

        'module_names' => [
            'agency'               => 'Agency',
            'audit_trail'          => 'Audit Trail',
            'calendar'             => 'Calendar',
            'frequencie'           => 'Frequency',
            'route'                => 'Route',
            'shape'                => 'Shape',
            'stop_time'            => 'Stop Time',
            'stop'                 => 'Stop',
            'trip'                 => 'Trips'
        ]
    ],
];
