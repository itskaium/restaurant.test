<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('manager.category.index', compact('category'));
    }
    public function store(Request $request) {
        $category = new Category();
        $category->name = $request->category;
        $category->save();
        return redirect()->back();
    }


    public function delete_category(Request $request, $id){

        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category(Request $request, $id){

        $data = Category::find($id);

        return view('manager.category.edit', compact('data'));

    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->name = $request->category;
        $data->save();

        return redirect('/category');
    }


}
