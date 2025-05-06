<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(20);
        // dd($permissions);
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

    public function destroy() {}
}
