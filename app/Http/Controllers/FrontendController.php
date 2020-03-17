<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $category = DB::table('categories')
                            ->where('c_active', 1)
                            ->get();
        View::share('category', $category);
    }
}
