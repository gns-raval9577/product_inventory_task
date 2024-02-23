<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    
    public function index(){
        
        $Product_Data = Product::with('category')->orderBy('id','asc')->get();
        return view('Product.List',compact('Product_Data'));
    }

    public function create(){

        $categorydata = Category::get()->where('status',1);
        return view('Product.Add',compact('categorydata'));
    }

    public function store(Request $request){
        try {
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:1,0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);
        $imagename = null;
        if ($request->hasFile('image')) {

            $image = $request->file('image'); //get the file
            $imagename = time() . '.' . $image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('assets/image/'); //public path folder dir
            $request->image->move($destinationPath, $imagename);  //mve to destination you mentioned 
        }
        // Create a new product instance
        $product = new Product([
            'name' => $validatedData['name'],
            'category_id' => 1,
            'image' => $imagename,
            'status' => $validatedData['status'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        // Save the product to the database
        $product->save();
        return redirect(route('product'))->with('success', 'Product added successfully!');
    } catch (\Exception $e) {
        // Handle the exception, for example, log it or return an error response
        return redirect()->back()->with('error', 'Error occurred while adding product: ' . $e->getMessage());
    }
    }

    public function edit($id){

        $Product_details = Product::findOrFail($id);
        $categorydata = Category::all();
        return view('Product.Edit',compact('Product_details','categorydata'));
    }
    public function update(Request $request,$id){
           try{ 
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'status' => 'required|string|in:1,0',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            // Find the product by ID
            $product = Product::findOrFail($id);
            
            // Update product data from the request
            $product->name = $validatedData['name'];
            $product->category_id = $validatedData['category_id'];
            $product->status = $validatedData['status'];
            $product->price = $validatedData['price'];
            $product->description = $validatedData['description'];
        
            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/image'), $imageName);
                $product->image = $imageName;
            }
        
            // Save the updated product
            $product->save();
        
            return redirect(route('product'))->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Handle the exception, for example, log it or return an error response
            return redirect()->back()->with('error', 'Error occurred while adding product: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, $id){
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);
            // Delete the product
            $product->delete();
            
            // Return a success response
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json(['error' => 'Failed to delete product'], 500);
        }
    }

    public function updateprice(Request $request, $id){
        $price = $request->input('price');

        Product::where('id', $id)->update([
            'price' => $price
        ]);
        return response()->json(['message' => 'Product price update successfully'], 200);

    }
}

