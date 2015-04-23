<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function register() { echo 'Register'; }

    public function authorise() { echo 'Authorise'; }

    public function superSecret() { echo 'SUPER SECRET!!!'; }

}
