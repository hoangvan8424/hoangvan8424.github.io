<?php

namespace App\Http\Controllers;

use App\Helpers\AdminUser\AdminUserRoleHelper;
use App\Model\Exception;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveException($message) {
        if(env('APP_DEBUG') == true) {
            print_r($message);
        } else {
            Exception::create([
                'connection'    => '',
                'queue'         => '',
                'payload'       => '',
                'exception'     => $message,
                'failed_at'     => date('Y-m-d', time())
            ]);

            return redirect()->route('home');
        }
    }

    /**
     * Check role
     * @param $roleCheck
     * @return bool
     * @throws \Exception
     */

    public function checkRoles($roleCheck) {
        $user = User::where([
            'id' => Auth::user()->id
        ]);
        $role = AdminUserRoleHelper::rolesArray($user->first()->todo, true);
        if(isset($role['role_' . $roleCheck])) {
            return intval($role['role_' . $roleCheck]) === 1 ? true : false;
        }

        throw new \Exception("Check roles: role invalid ".$roleCheck);

    }
}
