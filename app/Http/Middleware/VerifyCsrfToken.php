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
        '*/create/*',
        '*indeks*',
        '*/indeks/*',
        '*/create/*',
        '*/pengetahuan/*',
        '*pengetahuan*',
        'banner',
        '*/banner/*',
        'project',
        '*/project/*',
        'daerah',
        '*/daerah/*',
        'hitung',
        '*/hitung/*',
        'projects_new_page',
        '*/projects_new_page/*',
        'ourPro',
        '*/ourPro/*',
        'dae',
        '*/dae/*',
        'tes',
        '*/tes/*',
        '*',
        '*/*/*'
    ];
}
