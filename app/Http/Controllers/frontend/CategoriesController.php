<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('frontend.pages.category.show', compact('category'));
        } else {
            session()->flash('errors', 'Sorry !! There is no category by this ID');
            return redirect()->back();
        }
    }
}
