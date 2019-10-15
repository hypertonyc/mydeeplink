<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Deeplink;
use App\Webuser;
use App\Click;

class DeeplinkController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  private function getClickInfo($request)
  {
    $platform = 0;
    $country = $request->server('GEOIP_COUNTRY_NAME','Неизвестно');
    $city = $request->server('GEOIP_CITY','Неизвестно');
    $ipaddress = $request->server('GEOIP_ADDR','Неизвестно');
    $user_agent = $request->server('HTTP_USER_AGENT','Неизвестно');

    if(stripos($user_agent,'iPhone') || stripos($user_agent,'iPod'))
    {
      $platform = 1;
    }
    else if(stripos($user_agent,'Android'))
    {
      $platform = 2;
    }

    return array(
      'platform' => $platform,
      'country' => $country,
      'city' => $city,
      'ipaddress' => $ipaddress,
    );
  }

  private function generateLinkHash($cnt)
  {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $hash = '';

    for ($i = 0; $i < $cnt; $i++)
    {
      $hash = $hash . substr($alphabet,rand(0,strlen($alphabet)),1);
    }

    return $hash;
  }

  public function click(Request $request,$hash)
  {
    // TODO: Use cache
    $deeplink = Deeplink::where('hash', $hash)->first();

    if($deeplink)
    {
      $info = $this->getClickInfo($request);

      // Webuser
      $webuser = null;
      $user_hash = $request->cookie('tourismm');

      if($user_hash)
      {
        $webuser = Webuser::where('hash',$user_hash)->first();
      }

      while(is_null($webuser))
      {
        try
        {
          $webuser = new Webuser();
          $webuser->name = '';
          $webuser->hash = $this->generateLinkHash(10);
          $webuser->save();
        }
        catch(\Exception $e)
        {
          $webuser = null;
        }
      }

      $click = new Click();
      $click->deeplink_id = $deeplink->id;
      $click->webuser_id = $webuser->id;
      $click->platform = $info['platform'];
      $click->country = $info['country'];
      $click->city = $info['city'];
      $click->ipaddress = $info['ipaddress'];
      $click->save();

      $link_url = '';

      if($info['platform'] == 1)
      {
          $link_url = 'instagram://user?username='.$deeplink->instagram;
      }
      else if ($info['platform'] == 2)
      {
          $link_url = 'intent://instagram.com/_u/'.$deeplink->instagram.'/#Intent;package=com.instagram.android;scheme=https;end';
      }
      else
      {
          $link_url = 'https://instagram.com/'.$deeplink->instagram;
      }

      return response()
              ->view('deeplink',['link_url' => $link_url])
              ->cookie('tourismm', $webuser->hash, 43200);
    }

    return response('', 404);
  }

  public function index()
  {
    $deeplinks = Deeplink::where('user_id', Auth::id())->orderBy('created_at','desc')->get();

    return response()->json(['deeplinks' => $deeplinks]);
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
        $newDeeplink->name = 'Без названия';
        $newDeeplink->instagram = $instagramProfile;
        $newDeeplink->hash = $this->generateLinkHash(8);

        $newDeeplink->save();
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

    $curDeeplink = Deeplink::find($deeplinkId);

    if($curDeeplink->user_id == Auth::id())
    {
      $curDeeplink->name = $deeplinkName;
      $curDeeplink->save();

      return response()->json(['error'=>false,'deeplink' => $curDeeplink]);
    }

    return response('', 404);
  }

  public function delete($deeplink_id)
  {
    if(intval($deeplink_id) < 1)
    {
        return response('', 404);
    }

    $curDeeplink = Deeplink::find($deeplink_id);
    if($curDeeplink->user_id == Auth::id())
    {
      $curDeeplink->delete();
      return response('',200);
    }

    return response('', 404);
  }
}
