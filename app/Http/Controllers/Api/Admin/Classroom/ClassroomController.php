<?php

namespace App\Http\Controllers\Api\Admin\Classroom;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\School\Classroom\ClassroomRequest;
use App\Services\Admin\Classroom\ClassroomService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ClassroomController extends ApiController
{
    private $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    /**
     * Get Classrooms Data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $classrooms = $this->classroomService->getClassrooms($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data kelas')
                ->setData([
                    'classrooms' => $classrooms
                ])
        );
    }

    /**
     * Show Classroom By Param
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param)
    {
        try {
            $classroom = $this->classroomService->findClassroom($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kelas berhasil didapatkan')
                ->setData([
                    'classroom' => $classroom
                ])
        );
    }

    /**
     * Create Classrooms
     *
     * @param ClassroomRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(ClassroomRequest $request)
    {
        try {
            $this->classroomService->createClassrooms($request);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil memasukan data Kelas')
        );
    }

    /**
     * Classroom Update
     *
     * @param ClassroomRequest $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(ClassroomRequest $request, string|int $param)
    {
        try {
            $classroom = $this->classroomService->findClassroom($param);
            $this->classroomService->updateClassroom($request, $classroom);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kelas berhasil diperbaharui')
        );
    }

    /**
     * Delete Classrooms
     *
     * @param ClassroomRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(ClassroomRequest $request)
    {
        try {
            $this->classroomService->deleteClassrooms($request, $request->input('ids'));
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil menghapus data Kelas')
        );
    }
}
