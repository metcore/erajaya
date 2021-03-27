<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\Gate;
use Config;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        if (! Gate::allows('index', Auth::user())) {
            abort(403);
        }
        $users = User::query();

        if (!empty($request['UserSearch'])) {
            foreach ($request['UserSearch'] as $key => $value) {
                if ($value) {
                    $users = $users->where($key, 'like', '%'.$value.'%');
                }
            }  
        }

        if (!empty($request['sort'])) {
            $users = $users->orderBy($request['sort'], $request['sort-type']);
        }
        $users = $users->paginate(15);
        return view('users.index',[
            'users'=> $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        if (! Gate::allows('create', Auth::user())) {
            abort(403);
        }
        return view('users.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (! Gate::allows('create', Auth::user())) {
            abort(403);
        }
        $model = new User;
        $validated = $request->validated();
        foreach ($validated as $key => $value) {
            $model->$key = $value;
        }
          if (!empty($validated['roles'])) {
            $model->roles = serialize($validated['roles']);
        }
        $model->password = Hash::make($validated['password']);
        $model->save();
        return redirect()->route('showUser', ['id' => $model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (! Gate::allows('show', Auth::user())) {
            abort(403);
        }
        $model = User::findOrFail($id);
        return view('users.show', [
            'model'=>$model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        //
        if (! Gate::allows('edit', Auth::user())) {
            abort(403);
        }

        $model = User::findOrFail($id);
        return view('users.edit',[
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        if (! Gate::allows('edit', Auth::user())) {
            abort(403);
        }

        $model = User::findOrFail($id);
        $validated = $request->validated();
        foreach ($validated as $key => $value) {
            $model->$key = $value;
        }
        if (!empty($validated['roles'])) {
            $model->roles = serialize($validated['roles']);
        }
        if (!empty($validate['password'])) {
            
            $model->password = Hash::make($validate['password']);
        }
        $model->save();
        return redirect()->route('showUser', ['id' => 1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (! Gate::allows('delete', Auth::user())) {
            abort(403);
        }
        $model = User::findOrFail($id);
        $model->delete();

    }
}
