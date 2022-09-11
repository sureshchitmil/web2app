<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateAppSettingsAPIRequest;
use App\Http\Requests\Device\BulkUpdateAppSettingsAPIRequest;
use App\Http\Requests\Device\CreateAppSettingsAPIRequest;
use App\Http\Requests\Device\UpdateAppSettingsAPIRequest;
use App\Http\Resources\Device\AppSettingsCollection;
use App\Http\Resources\Device\AppSettingsResource;
use App\Repositories\AppSettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AppSettingsController extends AppBaseController
{
    /**
     * @var AppSettingsRepository
     */
    private AppSettingsRepository $appSettingsRepository;

    /**
     * @param AppSettingsRepository $appSettingsRepository
     */
    public function __construct(AppSettingsRepository $appSettingsRepository)
    {
        $this->appSettingsRepository = $appSettingsRepository;
    }

    /**
     * AppSettings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return AppSettingsCollection
     */
    public function index(Request $request): AppSettingsCollection
    {
        $appSettings = $this->appSettingsRepository->fetch($request);

        return new AppSettingsCollection($appSettings);
    }

    /**
     * Create AppSettings with given payload.
     *
     * @param CreateAppSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppSettingsResource
     */
    public function store(CreateAppSettingsAPIRequest $request): AppSettingsResource
    {
        $input = $request->all();
        $appSettings = $this->appSettingsRepository->create($input);

        return new AppSettingsResource($appSettings);
    }

    /**
     * Get single AppSettings record.
     *
     * @param int $id
     *
     * @return AppSettingsResource
     */
    public function show(int $id): AppSettingsResource
    {
        $appSettings = $this->appSettingsRepository->findOrFail($id);

        return new AppSettingsResource($appSettings);
    }

    /**
     * Update AppSettings with given payload.
     *
     * @param UpdateAppSettingsAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return AppSettingsResource
     */
    public function update(UpdateAppSettingsAPIRequest $request, int $id): AppSettingsResource
    {
        $input = $request->all();
        $appSettings = $this->appSettingsRepository->update($input, $id);

        return new AppSettingsResource($appSettings);
    }

    /**
     * Delete given AppSettings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->appSettingsRepository->delete($id);

        return $this->successResponse('AppSettings deleted successfully.');
    }

    /**
     * Bulk create AppSettings's.
     *
     * @param BulkCreateAppSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppSettingsCollection
     */
    public function bulkStore(BulkCreateAppSettingsAPIRequest $request): AppSettingsCollection
    {
        $appSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appSettingsInput) {
            $appSettings[$key] = $this->appSettingsRepository->create($appSettingsInput);
        }

        return new AppSettingsCollection($appSettings);
    }

    /**
     * Bulk update AppSettings's data.
     *
     * @param BulkUpdateAppSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppSettingsCollection
     */
    public function bulkUpdate(BulkUpdateAppSettingsAPIRequest $request): AppSettingsCollection
    {
        $appSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appSettingsInput) {
            $appSettings[$key] = $this->appSettingsRepository->update($appSettingsInput, $appSettingsInput['id']);
        }

        return new AppSettingsCollection($appSettings);
    }
}
