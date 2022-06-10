<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Wonde\Http\Controllers\WondeBaseController;

class EmployeeController extends WondeBaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $school = $this->client->school(env('WONDE_TEST_SCHOOL'));

        $employees = EmployeeResource::collection(collect($school->employees->all()));

        return response()->json($employees);
    }
}
