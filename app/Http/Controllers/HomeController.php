<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home(){
        return view('home');
    }

    public function admin(){
        $links = UrlModel::get();
        return view('dashboard', compact('links'));
    }
    public function view($id){
        $links = UrlModel::where('id', $id)->first();
        return view('view', compact('links'));
    }

    public function delete($id){
        $link = UrlModel::find($id);
        $link->delete();
        $links = UrlModel::get();
        return redirect()->route('dashboard')->with('status', 'Successfull Deleted');
    }

    public function edit($id){
        $link = UrlModel::find($id);
        return view('edit', compact('link'));
    }

    public function update(Request $request){

        $url = UrlModel::where('id', $request->input('id'))->first();
        $url->url = $request->input('url');
        $url->disabled = $request->input('disabled');
        $url->update();
        return redirect()->route('dashboard')->with('status', 'Successfull Updated');
    }
    public function profile()
    {
        $profile = User::where('id',Auth::id())->first();
        return view('edit-profile', compact('profile'));
    }

    public function profile_update(Request $request)
    {
        # code...
        $profile = User::where('id', Auth::id())->first();
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        //$profile->password = $request->input('password');
        $profile->update();
        return redirect()->route('home-index');
    }
}


