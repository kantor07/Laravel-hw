<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditeRequest;
use App\Http\Requests\Users\CreateRequest;
use App\Models\User;
use App\Queries\UserQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  UserQueryBuilder $builder
     * @return Response
     */
    public function index(UserQueryBuilder $builder)
    {
        return view('admin.users.index', [
            'users' => $builder->getUser()  
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  User $user
     * @param  CreateRequest $request
     * @param  UserQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request, 
        UserQueryBuilder $builder
        ): RedirectResponse
    {
        $user = $builder->create(
            $request->validated()
        );

        if($user) {
            return redirect()->route('admin.users.index')
            ->with('success', __('messages.admin.users.create.success'));
        }
        return back()->with('error', __('messages.admin.users.create.fail'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditeRequest $request
     * @param   User $user
     * @param UserQueryBuilder $builder
     * 
     * @return RedirectResponse
     */
    public function update(
        EditeRequest $request, 
        User $user, 
        UserQueryBuilder $builder
        ): RedirectResponse
    {        
        if ($builder->update($user, $request->validated())) {
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.users.update.success'));
        }
        return back()->with('error', __('messages.admin.users.update.fail'));
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * 
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            if (!$user->delete()) {
                return response()->json('error', 400);
            }

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
