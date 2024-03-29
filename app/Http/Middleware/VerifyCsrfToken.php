<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'users/',
        'user/login',
        'users/admin',
        'users/update/*',
        '/business/',
        '/business/update/*',
        '/events/',
        '/events/update/*',
        '/events/reschedule/*',
        '/events/status/*',
        '/events/notifications',
        '/reservation/',
        '/reservation/update/*',
        '/follow/',
        '/follow/unfollow/*',
        '/follow/update/*',
        '/upload/images',
        '/review/',
        '/review/update/*',
        '/saveforlater/',
        '/saveforlater/*',
        '/saveforlater/remove/*',
        '/reset/request',
        '/reset/verify',
        '/reset/password/*',
    ];
}
