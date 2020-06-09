<?php

namespace App\Http\Controllers\api;

use App\api\ApiError;
use App\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
    * @var Rating;
    */
    private $rating;

    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    public function Index()
    {
        return response()->json($this->rating->paginate(10));
    }

    public function Store(Request $request)
    {
        try {
            $data = $request->all();
            $this->rating->create($data);

            return response()->json([
                'status'  => 'success',
                'message' => 'Rating successfully added.'
            ], 201);
        } catch (\Exception $e) {
               if (config('app.debug')) {
                   return response()->json(ApiError::errorMessage('error', $e->getMessage(), 1010));
               }

            return response()->json(ApiError::errorMessage('error', 'There was an error adding a rating', 1010));
        }
    }
}
