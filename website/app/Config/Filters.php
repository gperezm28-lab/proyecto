<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Filters\Cors;

class Filters extends BaseFilters
{
    // 1) Alias de filtros (tu bloque corregido)
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'auth'          => \App\Filters\RequireLogin::class,
        'guest'         => \App\Filters\GuestOnly::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
    ];

    // 2) Filtros globales (opcional; deja como esté si no usas)
    public array $globals = [
        'before' => [
            // 'csrf',
            // 'honeypot',
        ],
        'after' => [
            'toolbar',
        ],
    ];

    // 3) SOLO UNA vez
    public array $methods = [];

    // 4) Reglas por rutas/patrones (opcional; puedes usar rutas.php también)
    public array $filters = [
        // ejemplo: proteger todo /tasks* con auth
        // 'auth' => ['before' => ['tasks']],
        // ejemplo: páginas de login/signup solo para invitados
        // 'guest' => ['before' => ['login', 'signup*']],
    ];
}