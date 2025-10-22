<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $user = User::all();
        return view('dashboard.users.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20', 'min:10'],
            'national'  => 'nullable|string|size:14|unique:users,national',
            'address'   => 'nullable|string|max:255',
            'role'      => 'required|in:admin,staff,user',
            'password'  => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'national' => $request->national,
            'address'  => $request->address,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('dashboard.users.index')
            ->with('success', 'تم اضافة الموظف بنجاح');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.show', ['item' => $user]);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone'     => ['nullable', 'string', 'max:20', 'min:10'],
            'national'  => [
                'nullable',
                'string',
                'size:14',
                Rule::unique('users', 'national')->ignore($user->id),
            ],
            'address'   => ['nullable', 'string', 'max:255'],
            'role'      => ['required', 'in:admin,staff,user'],
            'password'  => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->only(['name', 'email', 'phone', 'national', 'address', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('dashboard.users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dashboard.users.index')
        ->with('success','تم حدذ المستخدم بنجاح');
    }

}
