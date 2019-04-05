<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Client;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermission('read-revenue')) abort(404);

        $time1 = $request->input('start_time') . " 00:00:00";
        $time2 = $request->input('end_time') . " 23:59:00";
        $client = $request->input('client');
        $user = $request->input('user');
        $product = $request->input('product');

        if (empty($client) && empty($user) && empty($product)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'bills.casher_name as casher',
                    'users.name as uName',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->get();
        }
        if (!empty($product)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'products.id as prnumber',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('products.id', $product)
                ->get();

        }
        if (!empty($client)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('clients.id', $client)
                ->get();
        }
        if (!empty($user)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('users.id', $user)
                ->get();
        }
        if (!empty($product) && !empty($client)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('products.id', $product)
                ->where('clients.id', $client)
                ->get();
        }
        if (!empty($product) && !empty($user)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('products.id', $product)
                ->where('users.id', $user)
                ->get();
        }
        if (!empty($client) && !empty($user)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('clients.id', $client)
                ->where('users.id', $user)
                ->get();
        }
        if (!empty($product) && !empty($client) && !empty($user)) {
            $oSelect = DB::table('bills')
                ->leftJoin('product_bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('products', 'product_bills.product_id', '=', 'products.id')
                ->leftJoin('users', 'users.id', '=', 'bills.user_id')
                ->leftJoin('clients', 'clients.id', '=', 'bills.client_id')
                ->select('bills.id as bId',
                    'users.name as uName',
                    'bills.casher_name as casher',
                    'bills.created_at as bCreated_at',
                    'clients.name as cName',
                    'clients.phone as cPhone',
                    'bills.total as btotal',
                    'product_bills.quantity as pQuantity',
                    'product_bills.price as pbPrice',
                    'products.name as product_name',
                    'bills.discount as disc')
                ->where('bills.bill_type_id', 2)
                ->whereBetween('bills.created_at', [$time1, $time2])
                ->where('products.id', $product)
                ->where('clients.id', $client)
                ->where('users.id', $user)
                ->get();
        }
        $clients = Client::all();
        $users = User::all();
        $products = Product::all();
        return view('pages.report.index', [
            'time1' => $time1,
            'time2' => $time2,
            'client' => $client,
            'product' => $product,
            'user' => $user,
            'oSelect' => $oSelect,
            'products' => $products,
            'clients' => $clients,
            'users' => $users
        ]);

    }


    public function barChart()
    {

        $report = Bill::select(
            DB::raw('sum(total) as total'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year')
        )->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)', '=', date('m')))
            ->get();


        $day = 1;
        $timeNow = date('Y-m-d', strtotime(now() . ' + ' . $day . ' days'));

        $days = '8';
        $oldTime = date('Y-m-d', strtotime($timeNow . ' - ' . $days . ' days'));


        $report_date = Bill::select(
            DB::raw('sum(total) as total'),
            DB::raw('DATE_FORMAT(created_at,"%d/%m/%Y") as date'))
            ->whereBetween('created_at', [$oldTime, $timeNow])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        return view('pages.dashboard', ['report' => $report, 'report_date' => $report_date]);
    }
}
