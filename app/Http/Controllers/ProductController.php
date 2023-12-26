<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
             //them trang thai thanh cong cac kieu
             $successMessage = '';
             if ($request->session()->has('successMessage')) {
                 $successMessage = $request->session()->get('successMessage');
             } elseif ($request->session()->has('successMessage1')) {
                 $successMessage = $request->session()->get('successMessage1');
             } elseif ($request->session()->has('successMessage2')) {
                 $successMessage = $request->session()->get('successMessage2');
             }
            
        $products = Product::with('category');
    
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $products->where('product_name', 'like', '%' . $keyword . '%')
             ->orWhere('status', 'like', '%' . $keyword . '%');
        }
    
        $products = $products->orderBy('id','desc')->paginate(16);
    
        return view('admin.products.index', compact('products','successMessage'));


            //api
        // $data = $products->map(function($product){
        //     return[
        //         'id' => $product->id,
        //         'product_name' => $product->product_name,
        //         'category_id' => $product->category_id,
        //         'quantity' => $product->quantity,
        //         'price' => $product->price,
        //         'status' => $product->status,
        //         'description' => $product->description,
        //         'image' => $product->image,

        //     ];
        // });
        // return response()->json($data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin/products/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
       
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->description = $request->description;


            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $filename = time() . '.' . $image->getClientOriginalExtension();
    
            //     // Lưu hình ảnh gốc vào thư mục "storage/images"
            //     $image->storeAs('public/images', $filename);
    
            //     // Đường dẫn đến hình ảnh lưu trong cơ sở dữ liệu
            //     $pro->image = 'images/' . $filename;
            // }


            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);
                $path = 'storage/product/';
                $new_name_img = $request->name.$image->getClientOriginalName();
                $image->move($path,$new_name_img);
                $product->image = $path.$new_name_img;
            }
            $product->save();
        $request->session()->flash('successMessage', 'Create success');

            return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pro= Product::find($id);
        return view('admin.products.show',compact('pro'));

    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.products.edit', compact('product', 'categories')) . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;

        $product->quantity = $request->quantity;
        $product->price = $request->price;


        // if ($request->hasFile('image')) {
        //     // Tải lên hình ảnh mới
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/images', $filename);

        //     // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
        //     $product->image = 'images/' . $filename;

        //     // Xóa hình ảnh cũ (nếu có)
        //     $oldImage = $product->getOriginal('image');
        //     if ($oldImage && $oldImage !== $product->image) {
        //         Storage::delete('public/' . $oldImage);
        //     }
        // }


        $fieldName='image';
        if ($request->hasFile($fieldName)) {
            $path = $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/product/';
            $image = $request->file($fieldName);
            $new_name_img = rand(1,100).$image->getClientOriginalName();
            $image->move($path,$new_name_img);
            $product->image = $path.$new_name_img;
        }


        $product->status = $request->status;
        $product->description = $request->description;

        $product->save();
        $request->session()->flash('successMessage1', 'Edit success');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request, $id)
    // {
    //     $pro = Product::destroy($id);
    //     $request->session()->flash('successMessage2', 'Delete success');
    //     return redirect()->route('products.index');

    // }

    public function destroy(Request $request,$id)
    {
        // $this->authorize('forceDelete', Product::class);
        $request->session()->flash('successMessage2', 'Delete success');

        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->back()->with('status', 'Xóa san pham thành công');
    }


    //thung rac
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Product::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        return redirect()->route('products.index');
    }
    public  function trash()
    {
        $products = Product::onlyTrashed()->get();
        $param = ['products'    => $products];
        return view('admin.products.trash', $param);
    }
    public function restoredelete($id)
    {
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('products.trash');
    }
}
