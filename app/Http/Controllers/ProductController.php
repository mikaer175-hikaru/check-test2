<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
    
        // 検索条件
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
    
        // 並び替え条件
        $sort = $request->input('sort');
        if ($sort === 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'low') {
            $query->orderBy('price', 'asc');
        }
    
        $products = $query->paginate(6)->appends($request->query());
    
        return view('products.index', compact('products', 'sort'));
    }
    
    public function edit($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = Season::all();
        return view('products.edit', compact('product', 'seasons'));
    }

    public function show($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        return view('products.show', compact('product'));
    }
    
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
    
        // 画像処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/fruits-img', 'public');
            $product->image = $path;
        }
    
        $product->save();
    
        // 中間テーブルの同期
        $product->seasons()->sync($request->seasons);
    
        return redirect()->route('products.index')->with('message', '商品を更新しました');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('products.index')->with('message', '商品を削除しました');
    }

    public function create()
    {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }
    
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/fruits-img', 'public');
            $product->image = $path; // ← パスごと保存
        }
    
        $product->save();
        $product->seasons()->sync($request->seasons);
    
        return redirect()->route('products.index')->with('message', '商品を登録しました');
    }
}
