<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        $data = $request->except('password'); // Excluir la contraseña

        // Solo actualizar la contraseña si se proporciona una nueva
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data); // Usar $data en lugar de $request->all()
        return redirect()->route('dashboard')
            ->with('user_success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')
            ->with('user_success', 'Usuario eliminado exitosamente.');
    }
}
