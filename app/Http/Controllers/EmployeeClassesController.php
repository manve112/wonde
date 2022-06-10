<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassResource;
use App\Wonde\Http\Controllers\WondeBaseController;

class EmployeeClassesController extends WondeBaseController
{
    /**
     * @param $employeeID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($employeeID)
    {
        $school   = $this->client->school(env('WONDE_TEST_SCHOOL'));
        $employee = $school->employees->get($employeeID, ['classes']);

        $classes = ClassResource::collection(collect($employee->classes->data));

        return response()->json($classes);
    }
}
