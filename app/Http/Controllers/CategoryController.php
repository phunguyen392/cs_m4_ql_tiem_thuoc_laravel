<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', Category::class);
        $query = Category::select('*')->orderBy('id', 'DESC');
        $limit = $request->limit ? $request->limit : 5;
        $items = $query->paginate($limit);
        $params = [
            'items' => $items,
                 ];
        return view("admin.categories.index", $params);
    }

    public function create()
    {
        // $this->authorize('create', Category::class);

        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        // $this->authorize('restore', Category::class);
        try
            {
                $item = new Category();
                $item->category_name = $request->category_name;
                $item->description = $request->description;
                $item->save();
                return redirect()->route('categories.index')->with('success', __('Thêm thành công'));
            }
            catch(QueryException $e)
            {
                return redirect()->route('categories.index')->with('error', __('Thêm thất bại'));

            }
    }

    public function show(string $id)
    {
        // $this->authorize('view', Category::class);
        
        $cate = Category::find($id);
        return view('admin.categories.show', compact('cate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      try
        {
            $item = Category::findOrFail($id);
            $params = 
                [   
                    'item' => $item,
                ];
            return view ('admin.categories.edit', $params);
        }
        catch(ModelNotfoundException $e)
            {
                return redirect()->route()->with('error', __('khong tim thay kq'));
            }
    }


    public function update(CategoryRequest $request, string $id)
    {
        $item = Category::find($id);
        $item->category_name = $request->category_name;
        $item->description = $request->description;
        $item->save();
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
        $this->authorize('viewtrash',Category::class);  

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

    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }





}