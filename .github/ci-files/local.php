<?php
/**
 * Parameter overrides for GitHub Actions.
 */
$parameters = [
    'api_enabled'           => true,
    'api_enable_basic_auth' => true,
    'db_driver'             => 'pdo_mysql',
    'db_host'               => '127.0.0.1',
    'db_table_prefix'       => null,
    'db_port'               => getenv('DB_PORT'),
    'db_name'               => 'milextest',
    'db_user'               => 'root',
    'db_password'           => '',
    'admin_email'           => 'github-actions@milex.org',
    'admin_password'        => 'milex',
];
