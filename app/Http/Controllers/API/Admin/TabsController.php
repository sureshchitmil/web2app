<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateTabsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateTabsAPIRequest;
use App\Http\Requests\Admin\CreateTabsAPIRequest;
use App\Http\Requests\Admin\UpdateTabsAPIRequest;
use App\Http\Resources\Admin\TabsCollection;
use App\Http\Resources\Admin\TabsResource;
use App\Repositories\TabsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class TabsController extends AppBaseController
{
    /**
     * @var TabsRepository
     */
    private TabsRepository $tabsRepository;

    /**
     * @param TabsRepository $tabsRepository
     */
    public function __construct(TabsRepository $tabsRepository)
    {
        $this->tabsRepository = $tabsRepository;
    }

    /**
     * Tabs's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return TabsCollection
     */
    public function index(Request $request): TabsCollection
    {
        $tabs = $this->tabsRepository->fetch($request);

        return new TabsCollection($tabs);
    }

    /**
     * Create Tabs with given payload.
     *
     * @param CreateTabsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TabsResource
     */
    public function store(CreateTabsAPIRequest $request): TabsResource
    {
        $input = $request->all();
        $tabs = $this->tabsRepository->create($input);

        return new TabsResource($tabs);
    }

    /**
     * Get single Tabs record.
     *
     * @param int $id
     *
     * @return TabsResource
     */
    public function show(int $id): TabsResource
    {
        $tabs = $this->tabsRepository->findOrFail($id);

        return new TabsResource($tabs);
    }

    /**
     * Update Tabs with given payload.
     *
     * @param UpdateTabsAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return TabsResource
     */
    public function update(UpdateTabsAPIRequest $request, int $id): TabsResource
    {
        $input = $request->all();
        $tabs = $this->tabsRepository->update($input, $id);

        return new TabsResource($tabs);
    }

    /**
     * Delete given Tabs.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->tabsRepository->delete($id);

        return $this->successResponse('Tabs deleted successfully.');
    }

    /**
     * Bulk create Tabs's.
     *
     * @param BulkCreateTabsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TabsCollection
     */
    public function bulkStore(BulkCreateTabsAPIRequest $request): TabsCollection
    {
        $tabs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $tabsInput) {
            $tabs[$key] = $this->tabsRepository->create($tabsInput);
        }

        return new TabsCollection($tabs);
    }

    /**
     * Bulk update Tabs's data.
     *
     * @param BulkUpdateTabsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TabsCollection
     */
    public function bulkUpdate(BulkUpdateTabsAPIRequest $request): TabsCollection
    {
        $tabs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $tabsInput) {
            $tabs[$key] = $this->tabsRepository->update($tabsInput, $tabsInput['id']);
        }

        return new TabsCollection($tabs);
    }
}
