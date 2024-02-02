<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MainController extends Controller
{


  private Request $request;
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function index() : View
  {
    return view('home');
  }

  public function register(): View 
  {
    return \view('auth.register');
  }

  public function login(): View
  {
    return \view('auth.login');
  }

public function authorization():RedirectResponse
{
  $user = User::whereUsername($this->request->get('username'))->first();
  if(!$user || !\Hash::check($this->request->get('password'), $user->password)){
    // Session::flash('error','Incorrect login or password');
    return redirect()->back();
  }

  \Auth::login($user);
  return to_route('home');
}

public function registration(): RedirectResponse
{
  $user = User::create([
    'username'=> $this->request->get('username'),
    'password'=> Hash::make($this->request->get('password')),
  ]);

  \Auth::login($user);
  return to_route('home');
}

public function logout(): RedirectResponse
{
  \Auth::logout();
  return to_route('auth.login');
}
}


