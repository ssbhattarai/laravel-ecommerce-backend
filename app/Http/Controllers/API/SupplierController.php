<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suppliers;

class SupplierController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }


    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Suppliers::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \Log::info($request->all());
        $this->validate($request, [
            'supplier_name' => "required|string|max:50",
            'supplier_address' => 'required',
            'main_product' => 'required'
        ]);

        $n = $request->input('main_product');
        $n = implode(',', $n); // arrrya to string conversion
        $i = $request->except('main_product');
        $i['main_product'] = $n;

        $sup = Suppliers::create($i);
        return $sup;
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
        $s = Suppliers::find($id);
        return response()->json($s);
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
        $supplier = Suppliers::findOrFail($id);
        $supplier->delete(); 
        // return $supplier;
        // return ['message' => 'Product Delected sucessfully!'];
    }
}
