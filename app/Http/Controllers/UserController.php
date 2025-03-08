<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\RequiresMethod;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil input pencarian dari request
    $search = $request->input('search');

    // Ambil data User dengan filter pencarian
    $users = User::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%") // Filter berdasarkan nama
                     ->orWhere('username', 'like', "%{$search}%"); // Filter berdasarkan email
    })
    ->latest()
    ->paginate(10); // Batasi 10 data per halaman

    // Kirim data ke view
    return view('users.index', compact('users'));
}
    /**
     * Method untuk menangani DataTables.
     */
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'username', 'password', 'created_at');
            return DataTables::of($data)
                ->addIndexColumn() // Tambahkan index kolom otomatis
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action']) // Render kolom HTML
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data input
    $request->validate([
        'name' => 'required|string|max:255',
        'level' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6',

    ]);

    // Simpan data user baru
    User::create([
        'name' => $request->name,
        'level' => $request->level,
        'username' => $request->username,
        'password' => bcrypt($request->password), // Hash password untuk keamanan
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail user berdasarkan ID
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
    return view('users.edit', compact('user')); // Kirim data user ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
    ]);

    // Cari user dan update data
    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'username' => $request->username,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
    $user->delete(); // Hapus user dari database

    return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
