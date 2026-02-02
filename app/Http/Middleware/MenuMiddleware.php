<?php

namespace App\Http\Middleware;

use App\Facades\MenuBuilderFacade;
use App\Utilities\ModuleUtility;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        MenuBuilderFacade::add('Home', route('home'))
            ->add('Dashboard', route('dashboard'))
            ->add('Hi', route('dashboard'), 'Home')
            ->add('Roles', route('roles.index'))
            ->add('Users', route('users.index'));

        $allModules = new ModuleUtility;
        $allModules->getModuleData('modify_menu');

        return $next($request);
    }
}
