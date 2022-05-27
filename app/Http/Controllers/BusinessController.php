<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Pipeline;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Builder;

class BusinessController extends Controller
{
    public function main(Request $request) {
        $td = Pipeline::all();
        return view('businessMain', ['td' => $td]);
    }

    public function index(Request $request, $id) {
        $start = $request->input('start');
        $end = $request->input('end');
        $sales_person = $request->input('name');
        $contact = $request->input('contact');

        if ($start != null && $end != null) {
            $data = Business::where('pipeline_id','=', $id)->where('created_at', '>=', $start)->where('created_at', '<=', $end)->orderBy('id','desc')->simplePaginate(10);
        } else if ($sales_person != null) {
            $data = Business::where('pipeline_id','=', $id)->where('sales_person', 'like', '%'.$sales_person.'%')->orderBy('id','desc')->simplePaginate(10);
        } else if ($contact != null) {
            $data = Business::where('pipeline_id','=', $id)->where('contact_id', '=', $contact)->orderBy('id','desc')->simplePaginate(10);
        } else {
            $data = Business::where('pipeline_id','=', $id)->orderBy('id','desc')->simplePaginate(10);
        }

        $title = pipeline::where('id', '=', $id)->get();
        return view('business', ['datas' => $data, 'pipe' => $title]);
    }

    public function store(Request $request)
    {
        $business = new Business;
        $business->contact_id = $request->contact_id;
        $business->pipeline_id = $request->pipeline_id;
        $business->client = $request->client;
        $business->name = $request->name;
        $business->expected_sales = $request->expected_sales;
        $business->expected_purchase = $request->expected_purchase;
        $business->expected_sales_profit = $request->expected_sales_profit;
        $business->expected_issue_month = $request->expected_issue_month;
        $business->progress_rate = $request->progress_rate;
        $business->progress = $request->progress;
        $business->sales_person = $request->sales_person;
        $business->save();

        return redirect()->route('business2', ['id' => 2]);
    }

    public function update(Request $request) {
        $id = $request->input('id');

        $business = Business::find($id);
        $business->client = $request->client;
        $business->name = $request->name;
        $business->expected_sales = $request->expected_sales;
        $business->expected_purchase = $request->expected_purchase;
        $business->expected_sales_profit = $request->expected_sales_profit;
        $business->expected_issue_month = $request->expected_issue_month;
        $business->progress_rate = $request->progress_rate;
        $business->progress = $request->progress;
        $business->sales_person = $request->sales_person;
        $business->save();

        return redirect()->route('business2', ['id' => 2]);
    }

    public function destroy(Business $business) {
        $business->delete();

        return redirect()->route('business2', ['id' => 2]);
    }
}
