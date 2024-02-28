<?php

// app/Http/Controllers/StudentController.php



namespace App\Http\Controllers;



use Illuminate\Http\JsonResponse;



class StudentController extends Controller

{

    public function index(): JsonResponse

    {

        // Sample student data

        $students = [

            [

                'id' => 1,

                'name' => 'John Doe',

                'age' => 20,

                'grade' => 'A',

            ],

            [

                'id' => 2,

                'name' => 'Jane Smith',

                'age' => 22,

                'grade' => 'B',

            ],

            // Add more students as needed

        ];



        // Return JSON response with the sample data

        return response()->json(['students' => $students]);

    }

    // Example controller method in StudentController.php





}



