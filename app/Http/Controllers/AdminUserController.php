<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $user = User::where('active', '=', 1)->paginate(10);
        return view('admin.user.index', compact('user'));
    }

}
