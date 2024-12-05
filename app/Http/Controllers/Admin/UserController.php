<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $mockDataPath = storage_path('mock_users.json');
        $this->users = collect(json_decode(File::get($mockDataPath), true));
    }

    public function index()
    {
        return view('admin.users', ['users' => $this->users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $newUser = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];
        $this->users->push($newUser);

        File::put(storage_path('mock_users.json'), json_encode($this->users->toArray(), JSON_PRETTY_PRINT));

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = $this->users->firstWhere('email', $id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $index = $this->users->search(fn($user) => $user['email'] == $id);
        if ($index !== false) {
            $this->users[$index]['name'] = $request->input('name');
            if ($request->filled('password')) {
                $this->users[$index]['password'] = Hash::make($request->input('password'));
            }
        }

        File::put(storage_path('mock_users.json'), json_encode($this->users->toArray(), JSON_PRETTY_PRINT));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->users = $this->users->filter(fn($user) => $user['email'] != $id);

        File::put(storage_path('mock_users.json'), json_encode($this->users->toArray(), JSON_PRETTY_PRINT));

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}