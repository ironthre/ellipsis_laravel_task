<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlModel;

class EmailController extends Controller
{
    //
    public function notify(){
        $data = [
            'subject' => 'Link Expire Notification',
            'name' => 'Url Shortener',
        ];
        $user = new UrlModel();
        $email = 'angelmbakile96@gmail.com';
        $admin = 'chumahamisi091@gmail.com';
        Mail::to($admin)->send(new MailContact($data));

    }
}
