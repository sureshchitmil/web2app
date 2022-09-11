<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateLeftHeaderIconAPIRequest;
use App\Http\Requests\Device\BulkUpdateLeftHeaderIconAPIRequest;
use App\Http\Requests\Device\CreateLeftHeaderIconAPIRequest;
use App\Http\Requests\Device\UpdateLeftHeaderIconAPIRequest;
use App\Http\Resources\Device\LeftHeaderIconCollection;
use App\Http\Resources\Device\LeftHeaderIconResource;
use App\Repositories\LeftHeaderIconRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class LeftHeaderIconController extends AppBaseController
{
    /**
     * @var LeftHeaderIconRepository
     */
    private LeftHeaderIconRepository $leftHeaderIconRepository;

    /**
     * @param LeftHeaderIconRepository $leftHeaderIconRepository
     */
    public function __construct(LeftHeaderIconRepository $leftHeaderIconRepository)
    {
        $this->leftHeaderIconRepository = $leftHeaderIconRepository;
    }

    /**
     * LeftHeaderIcon's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return LeftHeaderIconCollection
     */
    public function index(Request $request): LeftHeaderIconCollection
    {
        $leftHeaderIcons = $this->leftHeaderIconRepository->fetch($request);

        return new LeftHeaderIconCollection($leftHeaderIcons);
    }

    /**
     * Create LeftHeaderIcon with given payload.
     *
     * @param CreateLeftHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LeftHeaderIconResource
     */
    public function store(CreateLeftHeaderIconAPIRequest $request): LeftHeaderIconResource
    {
        $input = $request->all();
        $leftHeaderIcon = $this->leftHeaderIconRepository->create($input);

        return new LeftHeaderIconResource($leftHeaderIcon);
    }

    /**
     * Get single LeftHeaderIcon record.
     *
     * @param int $id
     *
     * @return LeftHeaderIconResource
     */
    public function show(int $id): LeftHeaderIconResource
    {
        $leftHeaderIcon = $this->leftHeaderIconRepository->findOrFail($id);

        return new LeftHeaderIconResource($leftHeaderIcon);
    }

    /**
     * Update LeftHeaderIcon with given payload.
     *
     * @param UpdateLeftHeaderIconAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return LeftHeaderIconResource
     */
    public function update(UpdateLeftHeaderIconAPIRequest $request, int $id): LeftHeaderIconResource
    {
        $input = $request->all();
        $leftHeaderIcon = $this->leftHeaderIconRepository->update($input, $id);

        return new LeftHeaderIconResource($leftHeaderIcon);
    }

    /**
     * Delete given LeftHeaderIcon.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->leftHeaderIconRepository->delete($id);

        return $this->successResponse('LeftHeaderIcon deleted successfully.');
    }

    /**
     * Bulk create LeftHeaderIcon's.
     *
     * @param BulkCreateLeftHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LeftHeaderIconCollection
     */
    public function bulkStore(BulkCreateLeftHeaderIconAPIRequest $request): LeftHeaderIconCollection
    {
        $leftHeaderIcons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $leftHeaderIconInput) {
            $leftHeaderIcons[$key] = $this->leftHeaderIconRepository->create($leftHeaderIconInput);
        }

        return new LeftHeaderIconCollection($leftHeaderIcons);
    }

    /**
     * Bulk update LeftHeaderIcon's data.
     *
     * @param BulkUpdateLeftHeaderIconAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LeftHeaderIconCollection
     */
    public function bulkUpdate(BulkUpdateLeftHeaderIconAPIRequest $request): LeftHeaderIconCollection
    {
        $leftHeaderIcons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $leftHeaderIconInput) {
            $leftHeaderIcons[$key] = $this->leftHeaderIconRepository->update($leftHeaderIconInput, $leftHeaderIconInput['id']);
        }

        return new LeftHeaderIconCollection($leftHeaderIcons);
    }
}
