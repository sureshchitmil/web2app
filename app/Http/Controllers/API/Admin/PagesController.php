<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreatePagesAPIRequest;
use App\Http\Requests\Admin\BulkUpdatePagesAPIRequest;
use App\Http\Requests\Admin\CreatePagesAPIRequest;
use App\Http\Requests\Admin\UpdatePagesAPIRequest;
use App\Http\Resources\Admin\PagesCollection;
use App\Http\Resources\Admin\PagesResource;
use App\Repositories\PagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PagesController extends AppBaseController
{
    /**
     * @var PagesRepository
     */
    private PagesRepository $pagesRepository;

    /**
     * @param PagesRepository $pagesRepository
     */
    public function __construct(PagesRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    /**
     * Pages's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PagesCollection
     */
    public function index(Request $request): PagesCollection
    {
        $pages = $this->pagesRepository->fetch($request);

        return new PagesCollection($pages);
    }

    /**
     * Create Pages with given payload.
     *
     * @param CreatePagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PagesResource
     */
    public function store(CreatePagesAPIRequest $request): PagesResource
    {
        $input = $request->all();
        $pages = $this->pagesRepository->create($input);

        return new PagesResource($pages);
    }

    /**
     * Get single Pages record.
     *
     * @param int $id
     *
     * @return PagesResource
     */
    public function show(int $id): PagesResource
    {
        $pages = $this->pagesRepository->findOrFail($id);

        return new PagesResource($pages);
    }

    /**
     * Update Pages with given payload.
     *
     * @param UpdatePagesAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return PagesResource
     */
    public function update(UpdatePagesAPIRequest $request, int $id): PagesResource
    {
        $input = $request->all();
        $pages = $this->pagesRepository->update($input, $id);

        return new PagesResource($pages);
    }

    /**
     * Delete given Pages.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->pagesRepository->delete($id);

        return $this->successResponse('Pages deleted successfully.');
    }

    /**
     * Bulk create Pages's.
     *
     * @param BulkCreatePagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PagesCollection
     */
    public function bulkStore(BulkCreatePagesAPIRequest $request): PagesCollection
    {
        $pages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $pagesInput) {
            $pages[$key] = $this->pagesRepository->create($pagesInput);
        }

        return new PagesCollection($pages);
    }

    /**
     * Bulk update Pages's data.
     *
     * @param BulkUpdatePagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PagesCollection
     */
    public function bulkUpdate(BulkUpdatePagesAPIRequest $request): PagesCollection
    {
        $pages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $pagesInput) {
            $pages[$key] = $this->pagesRepository->update($pagesInput, $pagesInput['id']);
        }

        return new PagesCollection($pages);
    }
}
