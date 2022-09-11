<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateFloatingButtonAPIRequest;
use App\Http\Requests\Admin\BulkUpdateFloatingButtonAPIRequest;
use App\Http\Requests\Admin\CreateFloatingButtonAPIRequest;
use App\Http\Requests\Admin\UpdateFloatingButtonAPIRequest;
use App\Http\Resources\Admin\FloatingButtonCollection;
use App\Http\Resources\Admin\FloatingButtonResource;
use App\Repositories\FloatingButtonRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class FloatingButtonController extends AppBaseController
{
    /**
     * @var FloatingButtonRepository
     */
    private FloatingButtonRepository $floatingButtonRepository;

    /**
     * @param FloatingButtonRepository $floatingButtonRepository
     */
    public function __construct(FloatingButtonRepository $floatingButtonRepository)
    {
        $this->floatingButtonRepository = $floatingButtonRepository;
    }

    /**
     * FloatingButton's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return FloatingButtonCollection
     */
    public function index(Request $request): FloatingButtonCollection
    {
        $floatingButtons = $this->floatingButtonRepository->fetch($request);

        return new FloatingButtonCollection($floatingButtons);
    }

    /**
     * Create FloatingButton with given payload.
     *
     * @param CreateFloatingButtonAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FloatingButtonResource
     */
    public function store(CreateFloatingButtonAPIRequest $request): FloatingButtonResource
    {
        $input = $request->all();
        $floatingButton = $this->floatingButtonRepository->create($input);

        return new FloatingButtonResource($floatingButton);
    }

    /**
     * Get single FloatingButton record.
     *
     * @param int $id
     *
     * @return FloatingButtonResource
     */
    public function show(int $id): FloatingButtonResource
    {
        $floatingButton = $this->floatingButtonRepository->findOrFail($id);

        return new FloatingButtonResource($floatingButton);
    }

    /**
     * Update FloatingButton with given payload.
     *
     * @param UpdateFloatingButtonAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return FloatingButtonResource
     */
    public function update(UpdateFloatingButtonAPIRequest $request, int $id): FloatingButtonResource
    {
        $input = $request->all();
        $floatingButton = $this->floatingButtonRepository->update($input, $id);

        return new FloatingButtonResource($floatingButton);
    }

    /**
     * Delete given FloatingButton.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->floatingButtonRepository->delete($id);

        return $this->successResponse('FloatingButton deleted successfully.');
    }

    /**
     * Bulk create FloatingButton's.
     *
     * @param BulkCreateFloatingButtonAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FloatingButtonCollection
     */
    public function bulkStore(BulkCreateFloatingButtonAPIRequest $request): FloatingButtonCollection
    {
        $floatingButtons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $floatingButtonInput) {
            $floatingButtons[$key] = $this->floatingButtonRepository->create($floatingButtonInput);
        }

        return new FloatingButtonCollection($floatingButtons);
    }

    /**
     * Bulk update FloatingButton's data.
     *
     * @param BulkUpdateFloatingButtonAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FloatingButtonCollection
     */
    public function bulkUpdate(BulkUpdateFloatingButtonAPIRequest $request): FloatingButtonCollection
    {
        $floatingButtons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $floatingButtonInput) {
            $floatingButtons[$key] = $this->floatingButtonRepository->update($floatingButtonInput, $floatingButtonInput['id']);
        }

        return new FloatingButtonCollection($floatingButtons);
    }
}
