protected $routeMiddleware = [
    // Other middleware
    'jwt.auth' => \App\Http\Middleware\JwtMiddleware::class,
];
