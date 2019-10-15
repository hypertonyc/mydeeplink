<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $user = Auth::user()->load(['deeplinks' => function ($query) {
        $query->orderBy('created_at', 'desc');
      }]);

      return response()->json(['user' => $user]);
  }
}
