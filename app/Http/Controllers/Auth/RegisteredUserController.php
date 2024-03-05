<?php

namespace App\Http\Controllers\Auth;

use App\Models\Depo;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
            'nik' => ['required', 'string', 'unique:users'],
            'depo_id' => ['required'],            
            'dept_id' => ['required'],
            'no_telp' => ['required', 'string'],
            'jabatan_id' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,            
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'jabatan_id' => $request->jabatan_id,
            'depo_id' => $request->depo_id,
            'dept_id' => $request->dept_id,
            'active' => 0
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
