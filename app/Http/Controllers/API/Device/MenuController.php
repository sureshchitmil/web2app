<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateMenuAPIRequest;
use App\Http\Requests\Device\BulkUpdateMenuAPIRequest;
use App\Http\Requests\Device\CreateMenuAPIRequest;
use App\Http\Requests\Device\UpdateMenuAPIRequest;
use App\Http\Resources\Device\MenuCollection;
use App\Http\Resources\Device\MenuResource;
use App\Repositories\MenuRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MenuController extends AppBaseController
{
    /**
     * @var MenuRepository
     */
    private MenuRepository $menuRepository;

    /**
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Menu's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MenuCollection
     */
    public function index(Request $request): MenuCollection
    {
        $menus = $this->menuRepository->fetch($request);

        return new MenuCollection($menus);
    }

    /**
     * Create Menu with given payload.
     *
     * @param CreateMenuAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MenuResource
     */
    public function store(CreateMenuAPIRequest $request): MenuResource
    {
        $input = $request->all();
        $menu = $this->menuRepository->create($input);

        return new MenuResource($menu);
    }

    /**
     * Get single Menu record.
     *
     * @param int $id
     *
     * @return MenuResource
     */
    public function show(int $id): MenuResource
    {
        $menu = $this->menuRepository->findOrFail($id);

        return new MenuResource($menu);
    }

    /**
     * Update Menu with given payload.
     *
     * @param UpdateMenuAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return MenuResource
     */
    public function update(UpdateMenuAPIRequest $request, int $id): MenuResource
    {
        $input = $request->all();
        $menu = $this->menuRepository->update($input, $id);

        return new MenuResource($menu);
    }

    /**
     * Delete given Menu.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->menuRepository->delete($id);

        return $this->successResponse('Menu deleted successfully.');
    }

    /**
     * Bulk create Menu's.
     *
     * @param BulkCreateMenuAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MenuCollection
     */
    public function bulkStore(BulkCreateMenuAPIRequest $request): MenuCollection
    {
        $menus = collect();

        $input = $request->get('data');
        foreach ($input as $key => $menuInput) {
            $menus[$key] = $this->menuRepository->create($menuInput);
        }

        return new MenuCollection($menus);
    }

    /**
     * Bulk update Menu's data.
     *
     * @param BulkUpdateMenuAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MenuCollection
     */
    public function bulkUpdate(BulkUpdateMenuAPIRequest $request): MenuCollection
    {
        $menus = collect();

        $input = $request->get('data');
        foreach ($input as $key => $menuInput) {
            $menus[$key] = $this->menuRepository->update($menuInput, $menuInput['id']);
        }

        return new MenuCollection($menus);
    }
}
