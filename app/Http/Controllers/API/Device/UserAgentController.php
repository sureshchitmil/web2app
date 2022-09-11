<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateUserAgentAPIRequest;
use App\Http\Requests\Device\BulkUpdateUserAgentAPIRequest;
use App\Http\Requests\Device\CreateUserAgentAPIRequest;
use App\Http\Requests\Device\UpdateUserAgentAPIRequest;
use App\Http\Resources\Device\UserAgentCollection;
use App\Http\Resources\Device\UserAgentResource;
use App\Repositories\UserAgentRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class UserAgentController extends AppBaseController
{
    /**
     * @var UserAgentRepository
     */
    private UserAgentRepository $userAgentRepository;

    /**
     * @param UserAgentRepository $userAgentRepository
     */
    public function __construct(UserAgentRepository $userAgentRepository)
    {
        $this->userAgentRepository = $userAgentRepository;
    }

    /**
     * UserAgent's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return UserAgentCollection
     */
    public function index(Request $request): UserAgentCollection
    {
        $userAgents = $this->userAgentRepository->fetch($request);

        return new UserAgentCollection($userAgents);
    }

    /**
     * Create UserAgent with given payload.
     *
     * @param CreateUserAgentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UserAgentResource
     */
    public function store(CreateUserAgentAPIRequest $request): UserAgentResource
    {
        $input = $request->all();
        $userAgent = $this->userAgentRepository->create($input);

        return new UserAgentResource($userAgent);
    }

    /**
     * Get single UserAgent record.
     *
     * @param int $id
     *
     * @return UserAgentResource
     */
    public function show(int $id): UserAgentResource
    {
        $userAgent = $this->userAgentRepository->findOrFail($id);

        return new UserAgentResource($userAgent);
    }

    /**
     * Update UserAgent with given payload.
     *
     * @param UpdateUserAgentAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return UserAgentResource
     */
    public function update(UpdateUserAgentAPIRequest $request, int $id): UserAgentResource
    {
        $input = $request->all();
        $userAgent = $this->userAgentRepository->update($input, $id);

        return new UserAgentResource($userAgent);
    }

    /**
     * Delete given UserAgent.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->userAgentRepository->delete($id);

        return $this->successResponse('UserAgent deleted successfully.');
    }

    /**
     * Bulk create UserAgent's.
     *
     * @param BulkCreateUserAgentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UserAgentCollection
     */
    public function bulkStore(BulkCreateUserAgentAPIRequest $request): UserAgentCollection
    {
        $userAgents = collect();

        $input = $request->get('data');
        foreach ($input as $key => $userAgentInput) {
            $userAgents[$key] = $this->userAgentRepository->create($userAgentInput);
        }

        return new UserAgentCollection($userAgents);
    }

    /**
     * Bulk update UserAgent's data.
     *
     * @param BulkUpdateUserAgentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UserAgentCollection
     */
    public function bulkUpdate(BulkUpdateUserAgentAPIRequest $request): UserAgentCollection
    {
        $userAgents = collect();

        $input = $request->get('data');
        foreach ($input as $key => $userAgentInput) {
            $userAgents[$key] = $this->userAgentRepository->update($userAgentInput, $userAgentInput['id']);
        }

        return new UserAgentCollection($userAgents);
    }
}
