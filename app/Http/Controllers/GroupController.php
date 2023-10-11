<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $groups = Group::with('user')->paginate(5);
        $users= User::get();
      
        return view('admin.groups.index',compact('groups','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view ('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
        $group= new Group();
        $group-> name=$request->name;
        $group-> save();
        return redirect()->route('group.index')->with($notification);

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
        $group = Group::find($id);
       return view ('admin.groups.edit',compact('group'));
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('groups.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
    }

    public function detail($id)
    {
        $group= Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->role->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.groups.detail',$params);
    }
    public function group_detail(Request $request,$id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->role()->detach();
        $group->role()->attach($request->roles);
        return redirect()->route('groups.index')->with($notification);;
    }
}
