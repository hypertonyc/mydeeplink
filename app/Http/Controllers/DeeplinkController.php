<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Deeplink;

class DeeplinkController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  private function generateLinkHash()
  {
    return 'hash';
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $deeplinks = Deeplink->where('user_id', Auth::id())->orderBy('created_at','desc')->get();
    return response()->json(['deeplinks' => $deeplinks->toArray()]);
  }

  public function create(Request $request)
  {
    $this->validate($request, [
        'instagramProfile' => 'required|string',
    ]);

    $instagramProfile = $request->input('instagramProfile');
    $newDeeplink = null;

    while(is_null($newDeeplink))
    {
      try
      {
        $newDeeplink = new Deeplink();
        $newDeeplink->user_id = Auth::id();
        $newDeeplink->name = $newGroupName;
        $newDeeplink->profile = $instagramProfile;
        $newDeeplink->hash = generateLinkHash();

        $newDevgroup->save();
      }
      catch (\Exception $e)
      {
        $newDeeplink = null;
      }
    }

    return response()->json(['new_deeplink' => $newDeeplink]);
  }

  public function update(Request $request)
  {
    $this->validate($request, [
        'id' => 'required|integer',
        'name' => 'required|string',
    ]);

    $deeplinkId = $request->input('id');
    $deeplinkName = $request->input('name');

    $curDeeplink = Devgroup::find($deeplinkId);

    if($curDeeplink->user_id == Auth::id())
    {
      $curDeeplink->name = $groupName;
      $curDeeplink->save();
      return response()->json(['error'=>false,'deeplink' => $curDeeplink]);
    }
    else
    {
      return response()->json(['error'=>true,'deeplink' => null]);
    }
  }

  public function delete($deeplink_id)
  {
    $this->validate($request, [
        'id' => 'required|integer'
    ]);

    $deeplinkId = $request->input('id');
    $curDeeplink = Devgroup::find($deeplinkId);

    if($curDeeplink->user_id == Auth::id())
    {
      $curDeeplink->delete();
      return response()->json(['error'=>fasle]);
    }
    else
    {
      return response()->json(['error'=>true]);
    }
  }
}
