<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->id = $request->category;
        $category->name = $request->name;
        $category->description = $request->description;
        // $category->image = $request->file('image')->store('categoriesimages');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extensions = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extensions;
            $file->move('categoriesimage', $filename);
            $category->image = $filename;
        }
        $category->save();

        return redirect()->back()->with('message', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Category $category)
    {
        if ($category->status == 1) {

            $category->update(['status' => 0]);
        } else {
            $category->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Status updated successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('backend.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('categoriesimage', $imagename);
        $category->image = $imagename;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back();

        // return redirect('/categories')->with('message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $dalete = $category->delete();

        return redirect()->back()->with('message', 'Category Successfully Deleted!!');
    }
}
