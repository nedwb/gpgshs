<?php
namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Auth;
use App\User;

class TeacherMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::getUser(Auth::id())->get();
 
        if ($user[0]->rolename !== "teacher" && $user[0]->rolename !== "admin") {
            abort(403, 'You are not allowed to access admin pages.');
        }

        return $next($request);
    }
}
