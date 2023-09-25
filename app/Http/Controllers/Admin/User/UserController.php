<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $users=User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles=User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data= $request->validated();
        $password=Str::random(10);
        $data['password']=Hash::make($password);
        $user=User::firstOrCreate(['email'=>$data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        return redirect ()->route('admin.user.index');
    }

    public function show(User $user)
    {

        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles=User::getRoles();
        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data=$request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
