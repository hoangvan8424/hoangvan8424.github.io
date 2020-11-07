<?php

namespace App\Http\Controllers;

use App\Helpers\AdminUser\AdminUserRoleHelper;
use App\Http\Requests\RequestInstall;
use App\Mail\HelloAdminMail;
use App\Model\Install;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InstallController extends Controller
{
    public function index() {
        if(env('APP_SETUP') == false) {
            print_r("Please change APP_SETUP of .env by value true to use this function");
            die;
        }
        return view('install.index');
    }

    public function save(RequestInstall $request) {
        if(env('APP_SETUP') == false) {
            print_r("Please change APP_SETUP of .env by value true to use this function");
            die;
        }

        try {
            $validator = $this->validateForm($request);
            $mail = Mail::to($request->get('email'));
            if($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Create table
             */
            \Artisan::call('migrate');

            Install::insert([
                [
                    'key' => 'site_name',
                    'value' => $request->get('site_name'),
                    'created_at' => date('Y-m-d H:i:s',time()),
                    'updated_at' => date('Y-m-d H:i:s',time())
                ],
                [
                    'key' => 'site_slogan',
                    'value' => $request->get('site_slogan'),
                    'created_at' => date('Y-m-d H:i:s',time()),
                    'updated_at' => date('Y-m-d H:i:s',time()),
                ],
                [
                    'key' => 'contact_mail',
                    'value' => $request->get('email'),
                    'created_at' => date('Y-m-d H:i:s',time()),
                    'updated_at' => date('Y-m-d H:i:s',time()),
                ],
            ]);
            /**
             * Create User
             */
            $roles = AdminUserRoleHelper::setupAccountAdmin();
            /**
             * Create
             */
            User::create([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => Hash::make($request->input('password')),
                'todo'      => $roles
            ]);
            /**
             * mail test
             */
            if(!$mail->send(new HelloAdminMail($request->get('name')))) {
                $validator->errors()->add('exception_errors', "Can not sent welcome mail.");
            }

            /**
             * If successfully
             */
            return redirect()->route('login');
        } catch(\Exception $e) {
            print_r('Error: ' . $e->getMessage());
        }
    }


    protected function validateForm($request){

        $rule = [
            'site_name' => 'required|min:3|max:160',
            'site_slogan' => 'required|min:3|max:160',
            'name' => 'required'|'string'|'max:160',
            'email' => 'required'|'string'|'email'|'max:160',
            'password' => 'required'|'string'|'min:8'|'confirmed'
        ];

        $message = [
            'name.required' => 'Trường này là bắt buộc',
            'email.required' => 'Trường này là bắt buộc',
            'password.required' => 'Trường này là bắt buộc',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'site_name.required' => 'Trường này là bắt buộc',
            'site_slogan.required' => 'Trường này là bắt buộc',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        return $validator;
    }

}
