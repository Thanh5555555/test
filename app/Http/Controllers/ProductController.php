<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $products = Product::with('category')->get();
        $data['products'] = $products;

        return  view('dashboard.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        // Get All User
        $categories = Category::all()->pluck('name', 'id');
        $data['categories'] = $categories;

        return view('dashboard.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        if($request->file('image')){
            $file= $request->file('image');
            $extention =  $file->getClientOriginalName();
            $filename= time().'.'.$extention;
            $file-> move('images/product', $filename);
            $products->image = $filename;
        }

        $products->save();
        return redirect()->route('products.index')
            ->with('success', 'thêm mới thành công.');
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
        $data = [];
        //Get all user
        $categroies = Category::all()->pluck('name', 'id');
        $data['categroies'] = $categroies;

        //Get Task Info
        $product = Product::findOrFail($id);
        $data['product'] = $product;

        return view('dashboard.products.edit', $data);
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
        $products = Product::findOrFail($id);


        $products->name = $request->name;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        $products->image = $request->image;

        $products->save();
        return redirect()->route('dashboard.products.index')
            ->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();

        return redirect()->route('dashboard.products.index');
    }
}
