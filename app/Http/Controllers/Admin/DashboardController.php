<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $sales = DB::table('sales')->select(DB::raw('sum(money) as totalmoney, month,year'))
            ->groupByRaw('month,year')
            ->orderByRaw('year DESC, month DESC')->take(12)->get();

        $month = date('m');
        $year = date('Y');
        $current_month ="'".$month.'/'.$year."'";

        $select_months = $this->select_month();
        $select_years = $this->select_year();
        return view(
            'admin.dashboard',
            ['title' => 'Doanh thu 12 tháng qua'],
            compact('sales', 'select_years','select_months','current_month','year')
        );
    }

    public function chart_month(Request $request){
        if($request->get('month')){
            $val = $request->get('month');
            $val1 = explode("/",$val);
            $month = $val1[0];
            $year = $val1[1];
        } else {
            $month = date('m');
            $year = date('Y');
        };

        $products_m = DB::table('sales')->select(DB::raw('product_id,sold_quantity'))
        ->where([
            ['month', '=', $month],
            ['year', '=', $year]
        ])
        ->orderBy('sold_quantity', 'DESC')
        ->take(5)->get();
        $label_chart = [];
        $data_chart =[];
        foreach($products_m as $product){
            $a1 = $product->product_id;
            $a2 = $product->sold_quantity;
            array_push($label_chart,$a1);
            array_push($data_chart,$a2);
        }
        $label_chart = implode(",", $label_chart);
        $data_chart = implode(",", $data_chart);
        $bar_graph = '
            <canvas id="graph" data-settings=
            \'{
                "type": "bar",
                "data" :{
                    "labels" : ['.$label_chart.'],
                    "datasets" : [{
                        "label" : "da ban trong thang",
                        "backgroundColor" : "rgb(255, 128, 128)",
                        "data" : ['.$data_chart.']
                    }]
                },
                "options" : {
                    "scales" : {
                        "y" :{
                            "beginAtZero":true
                        }
                    }
                }
            }\'>
            </canvas>' ;
            echo $bar_graph;
    }

    public function chart_year(Request $request){
        if($request->get('year')){
            $year = $request->get('year');;
        } else {
            $year = date('Y');
        };
        $products_y = DB::table('sales')->select(DB::raw('product_id,sum(sold_quantity) as total_quantity'))
            ->where('year', '=', $year)
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'DESC')
            ->take(5)->get();
        $label_chart = [];
        $data_chart =[];
        foreach($products_y as $product){
            $a1 = $product->product_id;
            $a2 = $product->total_quantity;
            array_push($label_chart,$a1);
            array_push($data_chart,$a2);
        }
        $label_chart = implode(",", $label_chart);
        $data_chart = implode(",", $data_chart);
        $bar_graph = '
            <canvas id="graph2" data-settings=
            \'{
                "type": "bar",
                "data" :{
                    "labels" : ['.$label_chart.'],
                    "datasets" : [{
                        "label" : "da ban trong nam",
                        "backgroundColor" : "rgb(255, 128, 128)",
                        "data" : ['.$data_chart.']
                    }]
                },
                "options" : {
                    "scales" : {
                        "y" :{
                            "beginAtZero":true
                        }
                    }
                }
            }\'>
            </canvas>' ;
            echo $bar_graph;
    }
    public function select_month()
    {
        $select_months = DB::table('sales')->select(DB::raw('month,year'))
            ->groupByRaw('month,year')
            ->orderByRaw('year DESC, month DESC')
            ->get();
        $months = [];
        foreach($select_months as $month){
            $a = $month->month . '/' . $month->year;
            array_push($months,$a);
        }
        return $months;
    }

    public function select_year()
    {
        $select_years = DB::table('sales')->select('year')
            ->groupBy('year')
            ->orderBy('year','DESC')
            ->get();
        $years = [];
        foreach($select_years as $year){
            $a = $year->year;
            array_push($years,$a);
        }
        return $years;
    }

}
