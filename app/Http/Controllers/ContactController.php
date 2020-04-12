<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestContact;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                'contact_content'  => $content,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        return redirect()->back()->with('alert-success', 'Gửi tin nhắn thành công!');
    }

    public function receiveInformation(Request $request)
    {
        if($request->ajax()) {
            $email = $request->email;
            $content = 'Nhận thông tin sản phẩm mới và chương trình giảm giá';
            $title = 'Nhận thông tin sản phẩm mới và chương trình giảm giá';

                DB::table('contacts')->insert([
                    'contact_email' => $email,
                    'contact_title' => $title,
                    'contact_content'  => $content,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            session()->flash('alert-success', 'Đăng ký nhận thông tin sản phẩm thành công!');
        }
    }
}
