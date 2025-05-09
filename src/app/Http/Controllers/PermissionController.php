<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view permissions', only:['index']),
            new Middleware('permission:edit permissions', only:['edit']),
            new Middleware('permission:create permissions', only:['create']),
            new Middleware('permission:delete permissions', only:['destroy']),
        ];
    }

    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(20);

        return view('permissions.list', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.list')->with('success', 'success!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update($id, PermissionRequest $request)
    {
        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.list')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        if ($permission == null) {
            session()->flash('error', 'Data not found.');
            return response()->json(['status' => false]);
        }

        $permission->delete();

        session()->flash('success', 'Deleted successfully!');
        return response()->json(['status' => true]);
    }
}
