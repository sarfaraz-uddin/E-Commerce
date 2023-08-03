<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeliveryTracking;
use App\Models\Sale;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\Todo;

class DashboardController extends Controller
{
    //
    public function adminUser(){
        $todo=Todo::all();
        $notification=Notification::count();
        $notifications=Notification::all();
        $days=array();
        $datas=array();
        $totalAmount = Sale::selectRaw('Month(created_at) as month,SUM(subtotal) as subtotal,SUM(total) as total')->whereYear('created_at','2023')->groupBy('month')->orderBy('month')->get();
        for($i=7;$i>=0;$i--){
            $days=Carbon::now()->subDays($i);
            $day[]=$days->format('Y-m-d');
            $data=Sale::whereDate('created_at',$days)->get();
            $datas[]=$data->sum('total');
        }
        $today=Carbon::now()->format('Y-m-d');
        $todayValues=Sale::whereDate('created_at',$today)->get();
        $todaySales=$todayValues->sum('subtotal');
        $todayRevenue=$todayValues->sum('total');
        $adminname=User::all();
        $sale=Sale::all();
        $deliverytracking = DeliveryTracking::where('paid/unpaid', '=', '1')->get();
        $totalsale=$sale->sum('subtotal');
        $totalRevenue=$sale->sum('total');
        return view('admin/dashboard',compact('adminname','totalsale','todaySales','today','datas','day','todayRevenue','totalRevenue','notification','notifications','todo','totalAmount','sale','deliverytracking'));
    }
}
