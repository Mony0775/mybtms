<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('admin.supplier.product', compact('suppliers', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $products_img = $request->image;
        // $img_name = $products_img->getClientOriginalName();

        // $products->storeAs('public/images',$img_name);
        
        // Product::create($request->all());
        $products = new Product;
        $products->product_name = $request->input('product_name');
        $products->product_description = $request->input('product_description');
        $products->supplier_id = $request->input('supplier_id');
        $products->standard_price = $request->input('standard_price');
        $products->sale_price = $request->input('sale_price');
        $products->alert_stock = $request->input('alert_stock');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/product/',$filename);
            $products->image = $filename;
        }
        $products->save();
        return redirect()->back()->with('success','Products created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        // $products->update($request->all());
        // $products = new Product;
        $products->product_name = $request->input('product_name');
        $products->product_description = $request->input('product_description');
        $products->supplier_id = $request->input('supplier_id');
        $products->standard_price = $request->input('standard_price');
        $products->sale_price = $request->input('sale_price');
        $products->decrement('alert_stock',1);
        if($request->hasFile('image')){
            $destination = 'images/product/' . $products->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/product/',$filename);
            $products->image = $filename;
        }
        $products->save();
        return redirect()->back()->with('success','Products updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        $destination = 'images/product/' . $products->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $products->delete();
        return redirect()->back()->with('success','Products updated successfully');
    }
}
