<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateRightHeaderIconAPIRequest;
use App\Http\Requests\Admin\BulkUpdateRightHeaderIconAPIRequest;
use App\Http\Requests\Admin\CreateRightHeaderIconAPIRequest;
use App\Http\Requests\Admin\UpdateRightHeaderIconAPIRequest;
use App\Http\Resources\Admin\RightHeaderIconCollection;
use App\Http\Resources\Admin\RightHeaderIconResource;
use App\Repositories\RightHeaderIconRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RightHeaderIconController extends AppBaseController
{
    /**
     * @var RightHeaderIconRepository
     */
    private RightHeaderIconRepository $rightHeaderIconRepository;

    /**
     * @param RightHeaderIconRepository $rightHeaderIconRepository
     */
    public function __construct(RightHeaderIconRepository $rightHeaderIconRepository)
    {
        $this->rightHeaderIconRepository = $rightHeaderIconRepository;
    }

    /**
     * RightHeaderIcon's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return RightHeaderIconCollection
     */
    public function index(Request $request): RightHeaderIconCollection
    {
        $rightHeaderIcons = $this->rightHeaderIconRepository->fetch($request);

        return new RightHeaderIconCollection($rightHeaderIcons);
    }

    /**
     * Create RightHeaderIcon with given payload.
     *
     * @param CreateRightHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RightHeaderIconResource
     */
    public function store(CreateRightHeaderIconAPIRequest $request): RightHeaderIconResource
    {
        $input = $request->all();
        $rightHeaderIcon = $this->rightHeaderIconRepository->create($input);

        return new RightHeaderIconResource($rightHeaderIcon);
    }

    /**
     * Get single RightHeaderIcon record.
     *
     * @param int $id
     *
     * @return RightHeaderIconResource
     */
    public function show(int $id): RightHeaderIconResource
    {
        $rightHeaderIcon = $this->rightHeaderIconRepository->findOrFail($id);

        return new RightHeaderIconResource($rightHeaderIcon);
    }

    /**
     * Update RightHeaderIcon with given payload.
     *
     * @param UpdateRightHeaderIconAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return RightHeaderIconResource
     */
    public function update(UpdateRightHeaderIconAPIRequest $request, int $id): RightHeaderIconResource
    {
        $input = $request->all();
        $rightHeaderIcon = $this->rightHeaderIconRepository->update($input, $id);

        return new RightHeaderIconResource($rightHeaderIcon);
    }

    /**
     * Delete given RightHeaderIcon.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->rightHeaderIconRepository->delete($id);

        return $this->successResponse('RightHeaderIcon deleted successfully.');
    }

    /**
     * Bulk create RightHeaderIcon's.
     *
     * @param BulkCreateRightHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RightHeaderIconCollection
     */
    public function bulkStore(BulkCreateRightHeaderIconAPIRequest $request): RightHeaderIconCollection
    {
        $rightHeaderIcons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $rightHeaderIconInput) {
            $rightHeaderIcons[$key] = $this->rightHeaderIconRepository->create($rightHeaderIconInput);
        }

        return new RightHeaderIconCollection($rightHeaderIcons);
    }

    /**
     * Bulk update RightHeaderIcon's data.
     *
     * @param BulkUpdateRightHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RightHeaderIconCollection
     */
    public function bulkUpdate(BulkUpdateRightHeaderIconAPIRequest $request): RightHeaderIconCollection
    {
        $rightHeaderIcons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $rightHeaderIconInput) {
            $rightHeaderIcons[$key] = $this->rightHeaderIconRepository->update($rightHeaderIconInput, $rightHeaderIconInput['id']);
        }

        return new RightHeaderIconCollection($rightHeaderIcons);
    }
}
