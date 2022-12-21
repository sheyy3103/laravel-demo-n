<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
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
        $products = Product::search()->paginate(4)->withQueryString();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $file = $request->file('image');
        $file_name = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $file_name);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Added Successfully');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $request->validated();
        $file_name = $product->image;
        if ($request->has('image')) {
            unlink('uploads/' . $file_name);
            $file = $request->file('image');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
    public function deleted()
    {
        $products = Product::onlyTrashed()->paginate(4);
        return view('admin.product.deleted_list', compact('products'));
    }
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('product.index')->with('success', 'Restore Successfully');
    }
    public function delete($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->forceDelete();
        unlink("uploads/" . $product->image);
        return redirect()->back()->with('notification', 'Permanently Deleted Successfully');
    }
    public function indexProduct()
    {
        $products = Product::search()->filter()->paginate(6)->withQueryString();
        $categories = Category::all();
        return view('client.indexProduct',compact('products','categories'));
    }
    public function indexProductWCate($id)
    {
        $category = Category::find($id);
        $products = $category->products()->search()->filter()->paginate(6)->withQueryString();
        $categories = Category::all();
        return view('client.indexProduct',compact('products','categories'));
    }
    public function details($name,$id){
        $product = Product::find($id);
        $discount = $product->sale_price == 0 ? 0 : (1 - ($product->sale_price / $product->price)) * 100;
        $discount = number_format($discount, 2, '.', ',');
        $category = $product->category;
        return view('client.detailsProduct',compact('product','category','discount'));
    }
}
