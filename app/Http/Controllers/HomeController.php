<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Deadline;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $today = Carbon::today()->format('Y-m-d H:i:s');
        $tomorrow = new \DateTime('tomorrow');
        $final_tomorrow = $tomorrow->format('Y-m-d H:i:s');

        $the_next_day = $tomorrow->modify('+1 day');
        $the_next_day = $the_next_day->format('Y-m-d H:i:s');

        $work_today = Deadline::where([
            'status' => false,
        ])->whereDate('date', '=', $today)
            ->orderBy('branch_id', 'ASC')
            ->get();

        $work_tomorrow = Deadline::where([
            'status' => false,
        ])->whereDate('date', '=', $final_tomorrow)
            ->orderBy('branch_id', 'ASC')
            ->get();

        $work_next_tomorrow = Deadline::where([
            'status' => false,
        ])->whereDate('date', '=', $the_next_day)
            ->orderBy('branch_id', 'ASC')
            ->get();

        $data = [
            'today' => $work_today,
            'tomorrow' => $work_tomorrow,
            'next_tomorrow' => $work_next_tomorrow,
        ];


        return view('admin.dashboard.v1', $data);
    }
}
