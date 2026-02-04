<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'title' => 'Products',
            'data' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'title' => 'Add Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'type' => 'required',
            'expiry_date' => 'nullable|date',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        // 2. Check if validation failed
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Send specific field errors (red text under inputs)
                ->withInput()            // Keep the form data filled
                ->with('error', 'Please fix the errors in the form.'); // Your custom SweetAlert message
        }

        // 3. If validation passes, retrieve the validated data
        $data = $validator->validated();

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = basename($imagePath);
            }

            Product::create($data);
            
            return redirect()->route('products.index')->with('success', 'Product created successfully.');

        } catch (Exception $e) {
            // This catches Database errors or other general errors
            return redirect()->back()->withInput()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
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
        return view('products.edit', [
            'title' => 'Edit Product',
            'data' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'code' => ['required', Rule::unique('products','code')->ignore($id)],
            'name' => 'required',
            'type' => 'required',
            'expiry_date' => 'nullable|date',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        // Prevent changing into an existing row (match on fields you consider identifying)
        $duplicate = Product::where('code', $data['code'])
            ->where('name', $data['name'])
            ->where('type', $data['type'])
            ->where('price', $data['price'])
            ->where('stock', $data['stock'])
            ->when(!empty($data['expiry_date']), fn($q) => $q->where('expiry_date', $data['expiry_date']))
            ->where('id', '!=', $id)
            ->exists();

        if ($duplicate) {
            return redirect()->back()->withInput()->with('error', 'Another product with the same data already exists.');
        }

        $product = Product::findOrFail($id);
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the OLD image from storage if it exists
            if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            // Store the NEW image
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        } 
        // Scenario B: User checked "Delete Image" (and didn't upload a new one)
        elseif ($request->input('delete_image') == '1') {
            // Delete the OLD image from storage
            if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
                Storage::disk('public')->delete('images/' . $product->image);
            }
            // Set database column to NULL
            $data['image'] = null;
        }
        // Scenario C: User did nothing
        else {
            // Remove 'image' from $data so we don't overwrite the existing filename with null/empty
            unset($data['image']);
        }

        $product->fill($data); 

        if ($product->isDirty()) { 
            $product->save(); 
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } else {
            return redirect()->route('products.index')->with('info', 'No changes were made to the product.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
            Storage::disk('public')->delete('images/' . $product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
