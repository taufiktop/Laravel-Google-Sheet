<?php

use Illuminate\Support\Facades\Route;

use Revolution\Google\Sheets\Facades\Sheets;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GoogleSheetController@index');

Route::get('/coba', function(){

    // Add new sheet to the configured google spreadsheet
    // dd(config('sheets.spreadsheet_id'));
    // dd(config('google.service.file'));
    // Sheets::spreadsheet(config('sheets.spreadsheet_id'))->addSheet('sheetTitle');
    Sheets::spreadsheet(config('sheets.spreadsheet_id'));
    $sheets = Sheets::sheet('sheetTitle');

    // $rows = [
    //     ['1', '2', '3'],
    //     ['4', '5', '6'],
    //     ['7', '8', '9'],
    // ];
    // Append multiple rows at once
    // Sheets::sheet('sheetTitle')->append($rows);
    // Sheets::sheet('sheetTitle')->append([['name' => 'name4', 'mail' => 'mail4', 'id' => 4]]);

    $rows = $sheets->get();
    $header = $rows->pull(0);
// dd($header);
    // Append row data
    $data = [
        $header[0] => 2,
        $header[1] => 'Toyota',
        $header[2] => 'Vios',
        $header[3] => 2022,
        $header[4] => 200000000
    ];
    // dd($data);
    $sheets->append([$data]);
    // dd($header[0]);

    $rows = $sheets->get();
    $values = Sheets::collection($header, $rows);
    $values->toArray();
    // dd($values->toArray());

    return "Succes";
});
