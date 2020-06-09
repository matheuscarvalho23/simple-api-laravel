<?php

namespace App\Http\Controllers\api;

use App\api\ApiError;
use App\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
    * @var Movie;
    */
    private $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function Index()
    {
        return response()->json($this->movie->paginate(10));
    }

    public function Store(Request $request)
    {
        try {
            $data = $request->all();
            $this->movie->create($data);

            return response()->json([
                'status'  => 'success',
                'message' => 'Movie successfully added.'
            ], 201);
        } catch (\Exception $e) {
               if (config('app.debug')) {
                   return response()->json(ApiError::errorMessage('error', $e->getMessage(), 1010));
               }

            return response()->json(ApiError::errorMessage('error', 'There was an error adding a movie', 1010));
        }
    }
}
