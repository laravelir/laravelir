<?php

namespace App\Http\Controllers\Webmaster\Acl\Permission;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Webmaster\Permission\PermissionRequest;
use App\Models\Role;
use Illuminate\Http\Response;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::latest()->paginate(10);

        return view('webmaster.acl.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('webmaster.acl.permissions.create');
    }

    public function store(Request $request)
    {

        // if ($request->has('crud')) {
        //     // $crudEnItems = ['index', 'create', 'show', 'update', 'delete'];
        //     // $crudFaItems = ['همه', 'ایجاد', 'نمایش', 'ویرایش', 'حذف'];
        //     // $enName = 'article';
        //     // $faName = 'مقاله';
        //     // foreach ($crudEnItems as $item) {
        //     //     echo($item . '-' .$enName) . '<br />';
        //     // }
        //     // foreach ($crudFaItems as $item) {
        //     //     echo($item . ' ' .$faName) . '<br />';
        //     // }
        //     // // Permission::create($date);
        //     // die;

        //     $cruds = explode(',', $request->selected_crud);
        //     if(count($cruds) > 0){
        //         foreach($cruds as $c){
        //             $enName = strtolower($c) . '-' . $request->resource;
        //             $label = ucwords($c) . '-' . $request->resource;
        //             $description =  "Allows a user to ". strtoupper($c). ' a ' . ucwords($request->resource);
        //             $permission = Permission::create([

        //             ]);
        //         }
        //     }
        // }

        $permission = Permission::create($request->all());

        // $permission->syncRoles($request->roles);
        return redirect()->route('webmaster.permissions.index')->with('toast_success', 'سطح دسترسی مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(Permission $permission)
    {
        return view('webmaster.acl.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        $roles = Role::latest()->get();

        return view('webmaster.acl.permissions.edit', compact('roles', 'permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        $permission->syncRoles($request->roles);
        return redirect()->route('webmaster.permissions.index')->with('toast_success', 'سطح دسترسی مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
