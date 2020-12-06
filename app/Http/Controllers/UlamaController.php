<?php

namespace App\Http\Controllers;

use App\Ulama;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UlamaController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Ulama  $model
     * @return \Illuminate\View\View
     */
    public function index(Ulama $model)
    {
        return view('datas.index', ['ulama' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('datas.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests  $request
     * @param  \App\Ulama  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Ulama $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password') ? 1 : 0;
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
