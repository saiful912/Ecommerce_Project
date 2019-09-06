<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class AdminCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function category_create()
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        return view('backend.pages.category.create', compact('main_categories'));
    }

    public function manage_categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        // Category Image Insert
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        session()->flash('success', 'A new category added Successfully');
        return redirect()->route('admin.categories.create');
    }

    public function categories_edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('backend.pages.category.edit', compact('main_categories', 'category'));
        } else {
            return redirect()->route('admin.categories');
        }
    }

    public function category_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
            [
                'name.required' => 'Please provide a Category name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //Insert image
        if ($request->hasFile('image')) {
            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            // Now insert image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        session()->flash('success', 'Category has Updated successfully!');
        return redirect()->route('admin.categories');
    }

    public function category_delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            //if it is primary category, then all its sub category
            if ($category->parent_id == null) {
                //delete sub Categories
                $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub) {
                    //delete Category Image
                    if (File::exists('images/categories/' . $sub->image)) {
                        File::delete('images/categories/' . $sub->image);
                    }
                    $sub->delete();
                }
            }
            //delete Category Image
            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            $category->delete();
        }
        session()->flash('success', 'Category has Deleted Successfully');
        return back();
    }


}
