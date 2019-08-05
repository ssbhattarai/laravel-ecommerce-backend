<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //original code start
        // $count = Products::get();
        // $count->count();
        return Products::all();
        //original code stop

    }

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
            'product_name' => "required|string|max:20",
            'type' => 'required',
            'weight' => 'required|integer',
            // 'image' => 'required|image',
        ]);


        // return Products::create([
        //     'id' => $request['id'],
        //     'product_name' => $request['product_name'],
        //     'type' => $request['type'],
        //     'weight' => $request['weight'],
        //     'description' => $request['description'],
        //     'image' => $request['image']
        // ]);
        $exploded = explode(',', $request->image);
        // $ff = explode('.', $request->imageName)[0];
        // return $ff;
        $decoded = base64_decode($exploded[1]);
        // $size = getimagesize($decoded);
        // if ($size > 0) {
        //     die($size);
        // }
        if (str_contains($exploded[0], 'jpeg'))
            $extension = 'jpg';
        else
            $extension = 'png';

        $fileName = str_random() . '.' . $extension;
        $path = public_path('/uploades/images') . '/' . $fileName;
        file_put_contents($path, $decoded);






        $p = Products::create(
            $request->except('image') + [
                'user_id' => \Auth::id(),
                'image' => $fileName
            ]
        );
        return $p;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Products::get($id);
        $count->count();
        return ["message" => "I am from show"];
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
        $p = Products::findOrfail($id);
        $this->validate($request, [
            'product_name' => "required|string|max:20",
            'type' => 'sometimes|string|max:10|min:5',
            'weight' => 'required|integer',
        ]);
        $currentPhoto = $p->image;
        if ($request->image != $currentPhoto) {
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);
            // $size = getimagesize($decoded);
            // if ($size > 0) {
            //     die($size);
            // }
            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';

            $fileName = str_random() . '.' . $extension;
            $path = public_path('/uploades/images') . '/' . $fileName;
            file_put_contents($path, $decoded);
        }
        $p->update($request->except('image') + [
            'image' => $fileName
        ]);
        return ["message" => "Updated sucessfully."];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        //delete the user
        $product->delete();
        return ["message" => "User deleted sucessfully"];
    }

    public function search()
    {
        if ($search = \Request::get('q')) {
            $products = Products::where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%$search%")
                    ->orWhere('type', 'LIKE', "%$search%")
                    ->orWhere('weight', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            })->paginate(20);
        }
        return $products;
    }

    public function category()
    {
        $pcount = DB::table('products')
            ->select(DB::raw("(CASE 
            WHEN (type = 1) THEN 'Fruits'
            When (type = 2)  THEN 'Vegetables'
            ELSE 'Animals' END) as type, count(type) as count"))
            ->groupBy('type')
            ->orderByRaw('type DESC')
            ->get();


        return $pcount;
    }
}
