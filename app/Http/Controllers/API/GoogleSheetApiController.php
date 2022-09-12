<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            Sheets::spreadsheet(config('sheets.spreadsheet_id'));
            $sheets = Sheets::sheet('Detail Unit');
    
            $all = $sheets->get();
            $header = $all->pull(0);
            $rows = array_slice($all->toArray(), 0);
            $data = Sheets::collection($header, $rows);

            return response()->json(array(
                'OUT_STAT' => 'T',
                'OUT_MESS' => 'Success',
                'OUT_DATA' => $data
            ), 200);
        } catch (\Throwable $th) {
            return response()->json(array(
                'OUT_STAT' => 'F',
                'OUT_MESS' => 'Failed',
                'OUT_DATA' => []
            ), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
         try {
            Sheets::spreadsheet(config('sheets.spreadsheet_id'));
            $sheets = Sheets::sheet('Detail Unit');
       
            $all = $sheets->get();
            $nData = count($all);
            $header = $all->pull(0);

            // Append row data
            $data = [
                $header[0] => $nData,
                $header[1] => $req->brand,
                $header[2] => $req->type,
                $header[3] => $req->year,
                $header[4] => $req->price
            ];
            $sheets->append([$data]);

            return response()->json(array(
                'OUT_STAT' => 'T',
                'OUT_MESS' => 'Success'
            ), 200);

        } catch (\Throwable $th) {
            return response()->json(array(
                'OUT_STAT' => 'F',
                'OUT_MESS' => 'Failed'
            ), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try {
            Sheets::spreadsheet(config('sheets.spreadsheet_id'));
            $sheets = Sheets::sheet('Detail Unit');

            $header = $sheets->get()->pull(0);
            $rows = $sheets->get()->toArray();
            $rows = array_slice($rows, $req->id, 1);
            $data = Sheets::collection($header, $rows);
            
            return response()->json(array(
                'OUT_STAT' => 'T',
                'OUT_MESS' => 'Success',
                'OUT_DATA' => $data
            ), 200);
        } catch (\Throwable $th) {
            return response()->json(array(
                'OUT_STAT' => 'F',
                'OUT_MESS' => 'Failed'
            ), 500);
        }
        
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

    public function showfirst()
    {
        // Sheets::spreadsheet(config('sheets.spreadsheet_id'));
        // $sheets = Sheets::sheet('Detail Unit');
        // $header = $sheets->get()->pull(0);

        // $rows = $sheets->get()->toArray();
        // $rows = array_slice($rows, 1);
        // $data = Sheets::collection($header, $rows);
        
        // return response()->json(array(
        //     'OUT_STAT' => 'T',
        //     'OUT_MESS' => 'Success',
        //     'OUT_DATA' => $data
        // ), 200);
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
