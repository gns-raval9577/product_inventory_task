<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Exception;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $getcategory = Category::all();
        return view('Category.List', compact('getcategory'));
    }
    public function create()
    {
        $getcategory = Category::all();
        return view('Category.Add', compact('getcategory'));
    }
    public function store(Request $request)
    {

        try {
            $Categorydata = $request->all();
            $validator = Validator::make($Categorydata, [
                'category_name' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $NewAddCategory = new Category();
            $NewAddCategory->category_name = $Categorydata['category_name'];
            $NewAddCategory->save();

            return redirect(route('category'))->with('success', 'Category add successfully!!');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', 'Error occurred while adding category: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $CategoryEdit = Category::findOrFail($id);
        return view('Category.Edit', compact('CategoryEdit'));
    }

    public function update(Request $request, $id)
    {
        try {
            $CategoryData = $request->all();

            $validator = Validator::make($CategoryData, [
                'category_name' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Category::where('id', $id)->update([
                'category_name' => $request->get('category_name')
            ]);

            return redirect('category')->with('success', 'Category updated successfully!!');
        } catch (Exception $e) {
            // Display an error message to the user.
            return redirect()->back()->with('error', 'There was an error updating the Category data.');
        }

    }


    public function destroy(Request $request, $id)
    {
        Category::where('id', $id)->delete();
        return redirect('category')->with('success', 'Category Deleted successfully!!');
    }


    public function status($id)
    {
        $CategoryStatus = Category::find($id);
        $CategoryStatus->status = $CategoryStatus->status == 1 ? 0 : 1;
        $CategoryStatus->update();

        if ($CategoryStatus->status == 0) {
            return redirect()->back()->with('success', 'Category InActivat.');
        }
        return redirect()->back()->with('success', 'Category  Activat.');
    }
}
