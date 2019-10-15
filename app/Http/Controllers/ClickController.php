<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Click;

use Carbon\Carbon;

class ClickController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $this->validate($request, [
        'from' => 'required|date',
        'to' => 'required|date'
    ]);

    $user = Auth::user()->load('deeplinks');
    $deeplink_ids = $user->deeplinks->modelKeys();

    $from = Carbon::parse($request->input('from'))->startOfDay();
    $to = Carbon::parse($request->input('to'))->endOfDay();

    $clicks = Click::whereIn('deeplink_id',$deeplink_ids)->whereBetween('created_at',[$from,$to])->orderBy('created_at','asc')->get();

    return response()->json(['clicks' => $clicks]);
  }
}
