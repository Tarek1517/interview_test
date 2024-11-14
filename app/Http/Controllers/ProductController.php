<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->orderBy('created_at', 'DESC');

        $search = $request->input('name');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
        }

        $data['all_product'] = $query->paginate(10);
        $data['search'] = $search;

        return view('pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['all_categories'] = Category::get();
        return view('pages.products.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|array',
            'image' => 'required|image',
            'description' => 'required|array',
            'description.*' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = mt_rand(1000000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/products', $image_name, 'public');
            $validatedData['image'] = $image_name;
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
        ]);

        $product->category()->attach($validatedData['category_id']);

        foreach ($validatedData['description'] as $description) {
            $product->feature()->create([
                'description' => $description,
            ]);
        }

        return redirect()->route('add.product')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [];
        $data['product'] = Product::with('category', 'feature')->findOrFail($id);
        return view('pages.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];

        $data['editProduct'] = Product::with(['category', 'feature'])->findOrFail($id);
        $data['all_categories'] = Category::all();

        return view('pages.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|array',
            'image' => 'nullable|image',
            'description' => 'required|array',
            'description.*' => 'required|string|max:1000',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = mt_rand(1000000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/products', $image_name, 'public');

            $validatedData['image'] = $image_name;

            Storage::disk('public')->delete('images/products/' . $product->image);

        } else {

            $validatedData['image'] = $product->image;
        }

        $product->update([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
        ]);

        $product->category()->sync($validatedData['category_id']);

        $product->feature()->delete();
        foreach ($validatedData['description'] as $description) {
            $product->feature()->create([
                'description' => $description,
            ]);
        }

        return redirect()->route('edit.product', $product->id)->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::findOrFail($id);

        Feature::where('product_id', $Product->id)->delete();

        $Product->delete();

        return redirect()->route('product.list')->with('success', 'product deleted successfully.');
    }
}
