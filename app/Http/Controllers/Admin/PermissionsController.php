<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
       
        $permissions = Permission::all();

        return view('admin.webviews.permissions.index', compact('permissions'));
    }

    public function create()
    {
      
        return view('admin.webviews.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
         $permission = Permission::create($request->all());

        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        // abort_unless(\Gate::allows('permission_edit'), 403);

        return view('admin.webviews.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        // abort_unless(\Gate::allows('permission_edit'), 403);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function show(Permission $permission)
    {
        // abort_unless(\Gate::allows('permission_show'), 403);

        return view('admin.webviews.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        // abort_unless(\Gate::allows('permission_delete'), 403);

        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
