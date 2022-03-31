<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UrlModel;
use Illuminate\Support\Str;
use URL;

class UrlController extends Controller
{

    public function home(){
        return view('home');
    }
    public function index(Request $request){
        $request->validate([
            'url' => 'required|url'
         ]);

        $url = new UrlModel();

        $url->url = $request->input('url');
        $url->uid = Auth::id();
        $short = $this->shortenUrl();
        $temp = $this->signurl();
        $url->short_url = $short;
        $url->temp_url = $temp;
        $url->save();

        $shortUrl = UrlModel::where('url',$request->url)->first();

        return view('new_url', compact('shortUrl'));
    }

    public function shortenUrl(){
        $random_token = Str::random(4);
        $random_token1 = Str::random(4);
        $short_url = URL::to('/').'/'.$random_token.'/'.$random_token1;
        return $short_url;
    }

    public function signurl(){
        $short_url_expire = URL::temporarySignedRoute(
            'direct_to_org_link', now()->addSeconds(120), ['link' => 242]
        );
        return $short_url_expire;
    }

    public function direct_to_org_link(Request $request){
        if (! $request->hasValidSignature()) {
            abort(403, 'Link Expired');
        }
        else{
            $currentURL = url()->full();
            $fetch_url = UrlModel::where('temp_url', $currentURL)->first();

            if($fetch_url){
                $url = UrlModel::where('temp_url',$currentURL)->value('url');
                return redirect($url);
            }
        }
    }

    public function direct_to_temp(Request $request, $first,$last){
        $url = URL::to('/').'/'.$first.$last;
        $short_version = route('midroute', ['first'=>$first, 'last'=>$last]);
        $fetch_url = UrlModel::where('short_url', $short_version)->first();
        $disabled = UrlModel::where('short_url',$short_version)->value('disabled');


        if($disabled == 0 ){
            if($fetch_url){

                $url_temp = UrlModel::where('short_url',$short_version)->value('temp_url');
                return redirect($url_temp);
            }
        }else{

            abort(403, 'Link Disabled');
        }

    }

    public function admin(){
        return view('dashboard');
    }
}
