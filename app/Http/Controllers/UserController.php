<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        // Verifica si la solicitud es de tipo API
        if (request()->wantsJson()) {
            return response()->json($users);
        }

        return view('users.index', compact('users'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'cliente'; // Asigna el rol de 'cliente' por defecto
    
        $user = User::create($validated);
    
        return redirect()->route('users.index');
    }
    

    public function show($id) {
        $user = User::find($id);

        // Verifica si la solicitud es de tipo API
        if (request()->wantsJson()) {
            return response()->json($user);
        }

        return view('users.show', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        
        // Valida los datos
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
    
        // Encripta la contraseña solo si está presente y no vacía
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }
    
        // Actualiza el usuario
        $user->update($validated);
        
        // Redirige de vuelta a la vista de index después de la actualización
        return redirect()->route('users.index');
    }       

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        // Verifica si la solicitud es de tipo API
        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('users.index');
    }

    public function create() {
        return view('users.create');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function assignRole($id) {
        $user = User::findOrFail($id);
        return view('users.assign_role', compact('user'));
    }
    
    public function updateRole(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'role' => 'required|string|in:cliente,bibliotecario',
        ]);
    
        $user->update($validated);
    
        return redirect()->route('users.index');
    }
    
}
