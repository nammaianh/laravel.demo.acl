<?php namespace App\Http\Middleware\Acl;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermittedMiddleware {

	/**
	 * @var User
	 */
	protected $user;

	public function __construct()
	{
		// Get the currently logged-in user
		$this->user = Auth::user();
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
		$user = $this->user;
		$isPermitted = false;
		$routeAlias = $request->route()->getName();

		$user->load('groups', 'groups.permissions');

		// Check if the user has the required permission
		foreach ($user->groups as $group) {
//			if ($group->permissions->has($routeAlias)) {
//				$isPermitted = true;
//				break;
//			}
			foreach ($group->permissions as $permission) {
				if ($permission->identity == $routeAlias) {
					$isPermitted = true;
					break;
				}
			}

			if ($isPermitted) break;
		}

		// If it does not, redirect to denial page
		if (!$isPermitted) {
			return redirect()->route('user.denied');
		}

		return $next($request);
	}

}
