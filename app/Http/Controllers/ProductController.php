<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function welcome(){
        return view('welcome');
    }
    public function index() {
        $products = Product::all();

        return view('index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'condition' => 'required|in:New,Second',
            'description' => 'nullable|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $description = $validatedData['description'] ?? '';
        $description = mb_substr($description, 0, 200);

        $imageName = $request->file('image')->getClientOriginalName();

        Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'weight' => $validatedData['weight'],
            'condition' => $validatedData['condition'],
            'description' => $description,
            'image' => $imageName,
        ]);

        return redirect()->route('products.admin')->with('success', 'Product created successfully.');
    }

    public function admin() {
        $products = Product::all();
        return view('product.admin', compact('products'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'condition' => 'required|in:New,Second',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName);
            $validatedData['image'] = $imageName;
        }

        $product->update($validatedData);

        return redirect()->route('products.admin')->with('success', 'Product updated successfully.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.admin')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    public function detail($id){
        $product = Product::findOrFail($id);
    
        return view('detail', compact('product'));
    }
}
