<?php

use App\Models\Business;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\OrderBookController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ManagerManagementController;
use App\Http\Controllers\CustomerManagementController;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\AuthorityController;

// 채연
Route::get('/Estimate', [EstimateController::class, 'Viewer']);

Route::get('/EstimateSearch1/{search1}', function ($search1) {
		$Estimates = DB::table("estimates")->where("department",$search1)->get();

		return view('Estimate.EstimateViewer',['Estimates' => $Estimates]);
});
Route::get('/EstimateSearch2/{start}', function ($start) {
	$Estimates = DB::select('select * from estimates where create_date > ?', [$start]);

	return view('Estimate.EstimateViewer',['Estimates' => $Estimates]);
});
Route::get('/EstimateSearch3/{search3}', function ($search3) {
	$Estimates = DB::table("estimates")->where("sales_person",$search3)->get();

	return view('Estimate.EstimateViewer',['Estimates' => $Estimates]);
});
Route::get('/EstimateSearch4/{search4}', function ($search4) {
	$Estimates = DB::table("estimates")->where("contact_id",$search4)->get();

	return view('Estimate.EstimateViewer',['Estimates' => $Estimates]);
});
Route::get('/EstimateDetail/{SecondRow}', function ($SecondRow) {
	$Estimates = DB::select('select users.email, users.contact, estimates.* from users,estimates where estimates.id = ? and users.manager_name = estimates.sales_person', [$SecondRow]);
	$items = DB::select('SELECT items.name, items.explanation, estimate_items.quantity,items.standard_unit_price, estimate_items.suggested_unit_price, estimate_items.total_offer_price FROM estimate_items, items where estimate_id = ? and estimate_items.item_id = items.id', [$SecondRow]);
	$total = DB::select('SELECT sum(estimate_items.total_offer_price) as total FROM estimate_items, items where estimate_id = ? and estimate_items.item_id = items.id', [$SecondRow]);
	$tax_total = DB::select('SELECT sum(estimate_items.price_include_tax) as tax_total FROM estimate_items, items where estimate_id = ? and estimate_items.item_id = items.id', [$SecondRow]);
	return view('Estimate.EstimateDetail',['Estimates' => $Estimates, 'items' => $items, 'total'=>$total, 'tax_total'=> $tax_total]);
});

// 수주품의서
Route::get('/OrderBook', [OrderBookController::class, 'index']);
Route::POST('/OrderBook', [OrderBookController::class, 'index']);
Route::get('/OrderBook/create', [OrderBookController::class, 'create']);
Route::POST('/OrderBook/create', [OrderBookController::class, 'store']);
Route::post('/OrderBook/{orderbook}', [OrderBookController::class, 'update']);
Route::delete('/OrderBook/{orderbook}', [OrderBookController::class, 'destroy']);
Route::get('/OrderBook/{orderbook}', [OrderBookController::class, 'show']);

// 기범
Route::get('/representative', [RepresentativeController::class, 'Viewer'])->name('representative');

Route::get('/RepresentativeSearch1/{search1}', function ($search1) {
    $Users = DB::table("users")->where("contact_id",$search1)->paginate(15);

    return view('admin.representative',['Users' => $Users]);
});
Route::get('/RepresentativeSearch2/{search2}', function ($search2) {
    $Users = DB::table("users")->where("manager_name",$search2)->paginate(15);

    return view('admin.representative',['Users' => $Users]);
});
Route::get('/RepresentativeSearch3/{search3}', function ($search3) {
    $Users = DB::table("users")->where("rank",$search3)->paginate(15);

    return view('admin.representative',['Users' => $Users]);
});
Route::get('/RepresentativeSearch4/{search4}', function ($search4) {
    $Users = DB::table("users")->where("division",$search4)->paginate(15);

    return view('admin.representative',['Users' => $Users]);
});

Route::POST('/representative/create', [RepresentativeController::class, 'store']);

Route::get('/item', [ItemController::class, 'Viewer'])->name('item');

Route::get('/ItemSearch1/{search1}', function ($search1) {
    $Items = DB::table("items")->where("id",$search1)->paginate(15);

    return view('admin.item',['Items' => $Items]);
});
Route::get('/ItemSearch2/{search2}', function ($search2) {
    $Items = DB::table("items")->where("name",$search2)->paginate(15);

    return view('admin.item',['Items' => $Items]);
});
Route::get('/ItemSearch3/{search3}', function ($search3) {
    $Items = DB::table("items")->where("note",$search3)->paginate(15);

    return view('admin.item',['Items' => $Items]);
});

Route::POST('/item/create', [ItemController::class, 'store']);

Route::get('/authority', [AuthorityController::class, 'Viewer'])->name('authority');

Route::get('/AuthoritySearch1/{search1}', function ($search1) {
    $Users = DB::table("users")->where("contact_id",$search1)->paginate(15);

    return view('admin.authority',['Users' => $Users]);
});
Route::get('/AuthoritySearch2/{search2}', function ($search2) {
    $Users = DB::table("users")->where("manager_name",$search2)->paginate(15);

    return view('admin.authority',['Users' => $Users]);
});
Route::get('/AuthoritySearch3/{search3}', function ($search3) {
    $Users = DB::table("users")->where("rank",$search3)->paginate(15);

    return view('admin.authority',['Users' => $Users]);
});
Route::get('/AuthoritySearch4/{search4}', function ($search4) {
    $Users = DB::table("users")->where("division",$search4)->paginate(15);

    return view('admin.authority',['Users' => $Users]);
});
Route::POST('/authority/checked', [AuthorityController::class, 'store']);

// 준재
Route::get('/pipeline', 'PipeController@index')->name('pipeline');
Route::post('/pipeline', 'PipeController@store')->name('pipeline');
Route::put('/pipeline', 'PipeController@update')->name('pipeline');
Route::delete('/pipeline', 'PipeController@destroy')->name('pipeline');

Route::get('/business', 'BusinessController@main')->name('business');
Route::get('/business/{id}', 'BusinessController@index')->name('business2');
Route::post('/business', 'BusinessController@store');
Route::put('/business', 'BusinessController@update');
Route::delete('/business/{business}', 'BusinessController@destroy');

Route::get('/', 'MainController@index')->name('main');

Route::post('/Estimate/{id}', function ($id){
    $Estimates = null;
    $business = Business::find($id);

    return view('Estimate.EstimatePost', ['Estimate' => $business, 'items' => [], 'total' => [], 'tax_total' => [], 'temp' => []]);
});

// 현준

// 고객관리
Route::get('/customer_management',[CustomerManagementController::class, 'index']);
Route::put('/customer_management', [CustomerManagementController::class, 'index']);
Route::POST('/customer_management', [CustomerManagementController::class, 'store']);
Route::get('/customer_management/{customer}', [CustomerManagementController::class, 'show']);
Route::post('/customer_management/{customer}', [CustomerManagementController::class, 'update']);
Route::delete('/customer_management/{customer}', [CustomerManagementController::class, 'destroy']);


//거래처 관리
Route::get('/manager_management', [ManagerManagementController::class, 'Viewer']);

