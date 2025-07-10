protected $routeMiddleware = [
    // ... existing middleware
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'teacher' => \App\Http\Middleware\TeacherMiddleware::class,
    'student' => \App\Http\Middleware\StudentMiddleware::class,
    'parent' => \App\Http\Middleware\ParentMiddleware::class,
];