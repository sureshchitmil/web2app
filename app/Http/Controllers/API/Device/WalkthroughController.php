<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateWalkthroughAPIRequest;
use App\Http\Requests\Device\BulkUpdateWalkthroughAPIRequest;
use App\Http\Requests\Device\CreateWalkthroughAPIRequest;
use App\Http\Requests\Device\UpdateWalkthroughAPIRequest;
use App\Http\Resources\Device\WalkthroughCollection;
use App\Http\Resources\Device\WalkthroughResource;
use App\Repositories\WalkthroughRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class WalkthroughController extends AppBaseController
{
    /**
     * @var WalkthroughRepository
     */
    private WalkthroughRepository $walkthroughRepository;

    /**
     * @param WalkthroughRepository $walkthroughRepository
     */
    public function __construct(WalkthroughRepository $walkthroughRepository)
    {
        $this->walkthroughRepository = $walkthroughRepository;
    }

    /**
     * Walkthrough's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return WalkthroughCollection
     */
    public function index(Request $request): WalkthroughCollection
    {
        $walkthroughs = $this->walkthroughRepository->fetch($request);

        return new WalkthroughCollection($walkthroughs);
    }

    /**
     * Create Walkthrough with given payload.
     *
     * @param CreateWalkthroughAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WalkthroughResource
     */
    public function store(CreateWalkthroughAPIRequest $request): WalkthroughResource
    {
        $input = $request->all();
        $walkthrough = $this->walkthroughRepository->create($input);

        return new WalkthroughResource($walkthrough);
    }

    /**
     * Get single Walkthrough record.
     *
     * @param int $id
     *
     * @return WalkthroughResource
     */
    public function show(int $id): WalkthroughResource
    {
        $walkthrough = $this->walkthroughRepository->findOrFail($id);

        return new WalkthroughResource($walkthrough);
    }

    /**
     * Update Walkthrough with given payload.
     *
     * @param UpdateWalkthroughAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return WalkthroughResource
     */
    public function update(UpdateWalkthroughAPIRequest $request, int $id): WalkthroughResource
    {
        $input = $request->all();
        $walkthrough = $this->walkthroughRepository->update($input, $id);

        return new WalkthroughResource($walkthrough);
    }

    /**
     * Delete given Walkthrough.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->walkthroughRepository->delete($id);

        return $this->successResponse('Walkthrough deleted successfully.');
    }

    /**
     * Bulk create Walkthrough's.
     *
     * @param BulkCreateWalkthroughAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WalkthroughCollection
     */
    public function bulkStore(BulkCreateWalkthroughAPIRequest $request): WalkthroughCollection
    {
        $walkthroughs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $walkthroughInput) {
            $walkthroughs[$key] = $this->walkthroughRepository->create($walkthroughInput);
        }

        return new WalkthroughCollection($walkthroughs);
    }

    /**
     * Bulk update Walkthrough's data.
     *
     * @param BulkUpdateWalkthroughAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WalkthroughCollection
     */
    public function bulkUpdate(BulkUpdateWalkthroughAPIRequest $request): WalkthroughCollection
    {
        $walkthroughs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $walkthroughInput) {
            $walkthroughs[$key] = $this->walkthroughRepository->update($walkthroughInput, $walkthroughInput['id']);
        }

        return new WalkthroughCollection($walkthroughs);
    }
}
