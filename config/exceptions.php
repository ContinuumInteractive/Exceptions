<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | App Type
    |--------------------------------------------------------------------------
    */

    'app_type' => 'Laravel',

    /*
    |--------------------------------------------------------------------------
    | App Version
    |--------------------------------------------------------------------------
    */

    'app_version' => 'N/A',

    /*
    |--------------------------------------------------------------------------
    | Redirect token errors
    |--------------------------------------------------------------------------
    |
    | If enabled, any TokenMismatchExceptions will be redirected and an error
    | will be flashed to the session
    |
    | This can be useful for production environments where the session length
    | has to be quite short. The user experience is bettered through
    | redirection and error messages.
    |
    */

    'token_redirect' => false,

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | You can find your API key on your Bugsnag dashboard.
    |
    | This api key points the Bugsnag notifier to the project in your account
    | which should receive your application's uncaught exceptions.
    |
    */
    'api_key' => env('EXCEPTION_BUGSNAG_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Notify Release Stages
    |--------------------------------------------------------------------------
    |
    | Set which release stages should send notifications to Bugsnag.
    |
    | Example: array('development', 'production')
    |
    */
    'notify_release_stages' => ['production', 'staging'],

    /*
    |--------------------------------------------------------------------------
    | Endpoint
    |--------------------------------------------------------------------------
    |
    | Set what server the Bugsnag notifier should send errors to. By default
    | this is set to 'https://notify.bugsnag.com', but for Bugsnag Enterprise
    | this should be the URL to your Bugsnag instance.
    |
    */
    'endpoint' => env('EXCEPTION_BUGSNAG_ENDPOINT', null),

    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | Use this if you want to ensure you don't send sensitive data such as
    | passwords, and credit card numbers to our servers. Any keys which
    | contain these strings will be filtered.
    |
    */
    'filters' => env('EXCEPTION_BUGSNAG_FILTERS', array('password')),

    /*
    |--------------------------------------------------------------------------
    | Proxy
    |--------------------------------------------------------------------------
    |
    | If your server is behind a proxy server, you can configure this as well.
    | Other than the host, none of these settings are mandatory.
    |
    | Note: Proxy configuration is only possible if the PHP cURL extension
    | is installed.
    |
    | Example:
    |
    |     'proxy' => array(
    |         'host'     => 'bugsnag.com',
    |         'port'     => 42,
    |         'user'     => 'username',
    |         'password' => 'password123'
    |     )
    |
    */
    'proxy' => env('EXCEPTION_BUGSNAG_PROXY', null)

);
