<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\Models\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all()->sortBy('first_name');
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::lists('name','id');
        return view('admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        $permissionList = $request->input('permission_list',[]);
        $user->permissions()->sync($permissionList);


        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::lists('name','id');
        return view('admin.users.edit', compact('user','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return Response
     */
    public function update(User $user, UserRequest $request)
    {
        $request['updated_by'] = Auth::id();
        $user->update($request->all());

        $permissionList = $request->input('permission_list',[]);
        $user->permissions()->sync($permissionList);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('admin/users');
    }}
