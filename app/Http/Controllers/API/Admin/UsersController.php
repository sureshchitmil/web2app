<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateUsersAPIRequest;
use App\Http\Requests\Admin\BulkUpdateUsersAPIRequest;
use App\Http\Requests\Admin\CreateUsersAPIRequest;
use App\Http\Requests\Admin\UpdateUsersAPIRequest;
use App\Http\Resources\Admin\UsersCollection;
use App\Http\Resources\Admin\UsersResource;
use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends AppBaseController
{
    /**
     * @var UsersRepository
     */
    private UsersRepository $usersRepository;

    /**
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Users's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return UsersCollection
     */
    public function index(Request $request): UsersCollection
    {
        $users = $this->usersRepository->fetch($request);

        return new UsersCollection($users);
    }

    /**
     * Create Users with given payload.
     *
     * @param CreateUsersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersResource
     */
    public function store(CreateUsersAPIRequest $request): UsersResource
    {
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }
        $users = $this->usersRepository->create($input);

        return new UsersResource($users);
    }

    /**
     * Get single Users record.
     *
     * @param int $id
     *
     * @return UsersResource
     */
    public function show(int $id): UsersResource
    {
        $users = $this->usersRepository->findOrFail($id);

        return new UsersResource($users);
    }

    /**
     * Update Users with given payload.
     *
     * @param UpdateUsersAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return UsersResource
     */
    public function update(UpdateUsersAPIRequest $request, int $id): UsersResource
    {
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }
        $users = $this->usersRepository->update($input, $id);

        return new UsersResource($users);
    }

    /**
     * Delete given Users.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->usersRepository->delete($id);

        return $this->successResponse('Users deleted successfully.');
    }

    /**
     * Bulk create Users's.
     *
     * @param BulkCreateUsersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersCollection
     */
    public function bulkStore(BulkCreateUsersAPIRequest $request): UsersCollection
    {
        $users = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersInput) {
            $users[$key] = $this->usersRepository->create($usersInput);
        }

        return new UsersCollection($users);
    }

    /**
     * Bulk update Users's data.
     *
     * @param BulkUpdateUsersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersCollection
     */
    public function bulkUpdate(BulkUpdateUsersAPIRequest $request): UsersCollection
    {
        $users = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersInput) {
            $users[$key] = $this->usersRepository->update($usersInput, $usersInput['id']);
        }

        return new UsersCollection($users);
    }
}
