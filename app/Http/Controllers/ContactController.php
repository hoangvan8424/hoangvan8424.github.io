<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestContact;
use Illuminate\Support\Facades\DB;

class ContactController extends FrontendController
{
    public function getContact()
    {
        return view('contact');
    }

    public function postContact(RequestContact $requestContact)
    {
        $name = $requestContact->name;
        $email = $requestContact->email;
        $title = $requestContact->subject ? $requestContact->subject:'';
        $content = $requestContact->message;
        $phone = $requestContact->phone ? $requestContact->phone : '';

        DB::table('contacts')->insert(
            [
                'contact_name' => $name,
                'contact_email' => $email,
                'contact_title' => $title,
                'contact_phone' => $phone,
                'contact_content'  => $content
            ]
        );

        return redirect()->back()->with('alert-success', 'Gửi tin nhắn thành công!');
    }
}
