<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// insert models
use App\Models\Dashboard;
use App\Models\Dashboard_users;

use Auth;

class DashboardController extends Controller
{
    public function index(Request $Request){
        $userid = 1;

        // tab nama dashboard
        $name_dashboard = DB::table('dashboards')
        ->select('dashboards.id','dashboards.name')
        ->leftJoin('dashboard_users','dashboard_users.dashboard','=','dashboards.id')
        ->where('dashboard_users.user',$userid)
        ->get();

        // list survey untuk dropdown pilih survey
        $list_survey = DB::table('surveys')
        ->select('id','name')
        ->get();

        // list chart type
        $list_chart_type = DB::table('chart_type')
        ->select('chart_type','name')
        ->get();

        $data['dashboards']    = $name_dashboard->toArray();
        $data['surveys']       = $list_survey->toArray();
        $data['chart_type']    = $list_chart_type->toArray();

        return view('dashboard/dashboard')->with($data);
    }

}
