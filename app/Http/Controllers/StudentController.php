<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Wonde\Http\Controllers\WondeBaseController;

class StudentController extends WondeBaseController
{
    /**
     * @param $classID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($classID)
    {
        $school = $this->client->school(env('WONDE_TEST_SCHOOL'));
        $class  = $school->classes->get($classID, ['students']);

        $students = StudentResource::collection(collect($class->students->data));

        return response()->json($students);
    }
}
