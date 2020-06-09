<?php

namespace App\Http\Controllers\api;

use App\api\ApiError;
use App\Director;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
    * @var Director;
    */
    private $director;

    public function __construct(Director $director)
    {
        $this->director = $director;
    }

    public function Index()
    {
        return response()->json($this->director->paginate(10));
    }

    public function Store(Request $request)
    {
        try {
            $data = $request->all();
            $this->director->create($data);

            return response()->json([
                'status'  => 'success',
                'message' => 'Director successfully added.'
            ], 201);
        } catch (\Exception $e) {
               if (config('app.debug')) {
                   return response()->json(ApiError::errorMessage('error', $e->getMessage(), 1010));
               }

            return response()->json(ApiError::errorMessage('error', 'There was an error adding a director', 1010));
        }
    }
}
