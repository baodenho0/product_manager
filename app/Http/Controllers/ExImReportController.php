<?php

namespace App\Http\Controllers;

use App\Exports\PostsViewExport;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExImReportController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermission('read-exlm')) abort(404);
        $time1 = $request->input('start_time');
        $time2 = $request->input('end_time');
        $product = $request->input('product');

        $excel = $request->get('excel', false);

        if ($time1 === NULL) {
            $time1 = date('Y-m-01');
            $time2 = date('Y-m-d');

            $oSelect = DB::table('products')
                ->leftJoin('product_bills', 'products.id', '=', 'product_bills.product_id')
                ->leftJoin('bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('bill_types', 'bills.bill_type_id', '=', 'bill_types.id')
                ->groupBy('products.id')
                ->selectRaw('products.name as product_name,
                        sum(( CASE WHEN bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) as import,
                        sum(( CASE WHEN  bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END )) as export,
                        sum(( CASE WHEN bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) -
                             sum(( CASE WHEN bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END ))  as inventories', [$time1 . " 00:00:00", $time2 . " 23:59:00", $time1 . " 00:00:00", $time2 . " 23:59:00"])
                ->get();
        }


        if (empty($product)) {
            $oSelect = DB::table('products')
                ->leftJoin('product_bills', 'products.id', '=', 'product_bills.product_id')
                ->leftJoin('bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('bill_types', 'bills.bill_type_id', '=', 'bill_types.id')
                ->groupBy('products.id')
                ->selectRaw('products.name as product_name,
                            sum(( CASE WHEN bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) as import,
                            sum(( CASE WHEN  bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END )) as export,
                             sum(( CASE WHEN bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) -
                             sum(( CASE WHEN bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END ))  as inventories', [$time1 . " 00:00:00", $time2 . " 23:59:00", $time1 . " 00:00:00", $time2 . " 23:59:00"])
                ->get();

        }

        if (!empty($product)) {

            $oSelect = DB::table('products')
                ->leftJoin('product_bills', 'products.id', '=', 'product_bills.product_id')
                ->leftJoin('bills', 'bills.id', '=', 'product_bills.bill_id')
                ->leftJoin('bill_types', 'bills.bill_type_id', '=', 'bill_types.id')
                ->groupBy('products.id')
                ->selectRaw('products.name as product_name,
                            sum(( CASE WHEN bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) as import,
                            sum(( CASE WHEN  bills.created_at BETWEEN ? AND ? AND bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END )) as export,
                            sum(( CASE WHEN bills.bill_type_id = 1 THEN product_bills.quantity ELSE 0 END )) -
                             sum(( CASE WHEN bills.bill_type_id = 2 THEN product_bills.quantity ELSE 0 END ))  as inventories', [$time1 . " 00:00:00", $time2 . " 23:59:00", $time1 . " 00:00:00", $time2 . " 23:59:00"])
                ->where('products.id', $product)
                ->get();
        }
        //Xuất file excel
        if ($excel) {
            return Excel::download(new PostsViewExport($oSelect), 'baocao.xls');
        }
        //Lay danh muc san pham
        $products = Product::all();
        return view('pages.eximreport.index', [
            'time1' => $time1,
            'time2' => $time2,
            'product' => $product,
            'oSelect' => $oSelect,
            'products' => $products,
        ]);

    }


}

