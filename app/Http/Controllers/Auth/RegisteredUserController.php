<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::pluck('name', 'name');
        $branches = Branch::pluck('nama', 'id');
        return view('auth.register', compact('roles','branches'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jabatan' => ['required', Rule::in(['Owner', 'Manager', 'Supervisor', 'Kasir', 'Gudang'])],
            'branch_id' => ['required', 'exists:branches,id'], // Validasi cabang yang dipilih
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $employee = Employee::create([
            'user_id' => $user->id,
            'jabatan' => $request->jabatan,
        ]);

          // Associate selected branch
        $branch = Branch::find($request->branch_id);
        $employee->cabang()->associate($branch);
        $employee->save();

        // Set roles based on jabatan
        if ($request->jabatan == 'Owner') {
            $user->assignRole('Owner');
        } elseif ($request->jabatan == 'Manager') {
            $user->assignRole('Manager');
        } elseif ($request->jabatan == 'Supervisor') {
            $user->assignRole('Supervisor');
        } elseif ($request->jabatan == 'Kasir') {
            $user->assignRole('Kasir');
        } elseif ($request->jabatan == 'Gudang') {
            $user->assignRole('Gudang');
        } else {
            // Default role jika jabatan tidak sesuai dengan yang diharapkan
            $user->assignRole('default_role');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }



}
