<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin/categories/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/categories/create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $cate = new Category();
        $cate->category_name = $request->category_name;
        $cate->description = $request->description;
        $cate->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cate= Category::find($id);
        return view('admin.categories.show',compact('cate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cate= Category::find($id);
        return view('admin/categories/edit',compact('cate')).$id;    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $cate = Category::find($id);
        $cate->category_name = $request->category_name;
        $cate->description = $request->description;
        $cate->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', Category::class);
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }


//thung rac
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s"); 
        $category->save();
        return redirect()->route('categories.index');
    }
    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id)
    {
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categories.trash');
    }
   
    
}
