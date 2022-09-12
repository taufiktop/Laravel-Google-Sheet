<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Sheets::spreadsheet(config('sheets.spreadsheet_id'));
        $sheets = Sheets::sheet('Detail Unit');
        $header = $sheets->get()->pull(0);

        // Append row data
        // $data = [
        //     $header[0] => 2,
        //     $header[1] => 'Toyota',
        //     $header[2] => 'Vios',
        //     $header[3] => 2022,
        //     $header[4] => 200000000
        // ];
        // $sheets->append([$data]);
        // dd($sheets->append([$data]));

        $rows = $sheets->get()->toArray();
        $rows = array_slice($rows, 1);
        $data = Sheets::collection($header, $rows);
        // return response()->json(array(
        //     'OUT_STAT' => 'T',
        //     'OUT_MESS' => 'Success',
        //     'OUT_DATA' => $data
        // ), 200);

        return view('detail',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
