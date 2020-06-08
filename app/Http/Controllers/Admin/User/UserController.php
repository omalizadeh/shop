<?php

namespace App\Http\Controllers\Admin\User;

use App\Events\NewUserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(10);
        return view('admins.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('admins.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $request->merge(['password' => Hash::make($request->input('password'))]);
        try {
            DB::transaction(function () use ($request) {
                $user = $this->userRepository->create($request->only(['first_name', 'last_name', 'mobile', 'birth_date', 'national_id', 'password']));
                event(new NewUserRegistered($user, $request->input('role_id')));
            });
            return redirect()->route('admins.users.index')->with('success', 'کاربر ثبت نام شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = $this->roleRepository->all();
        return view('admins.users.edit', compact('roles', 'user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $updateData = $request->only(['first_name', 'last_name', 'mobile', 'birth_date', 'national_id', 'password']);
        if ($request->input('password') !== null) {
            $updateData += ['password' => Hash::make($request->input('password'))];
        }
        try {
            DB::transaction(function () use ($user, $updateData, $request) {
                $user = $this->userRepository->update($updateData, $user->id);
                event(new NewUserRegistered($user, $request->input('role_id')));
            });
            return redirect()->route('admins.users.index')->with('success', 'کاربر ثبت نام شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->userRepository->delete($user);
            return redirect()->back()->with('success', 'کاربر حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
