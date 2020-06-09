<?php

namespace App\Http\Controllers\api;

use App\api\ApiError;
use App\Actor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
    * @var Actor;
    */
    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function Index()
    {
        return response()->json($this->actor->paginate(10));
    }

    public function Store(Request $request)
    {
        try {
            $data = $request->all();
            $this->actor->create($data);

            return response()->json([
                'status'  => 'success',
                'message' => 'Actor successfully added.'
            ], 201);
        } catch (\Exception $e) {
               if (config('app.debug')) {
                   return response()->json(ApiError::errorMessage('error', $e->getMessage(), 1010));
               }

            return response()->json(ApiError::errorMessage('error', 'There was an error adding an actor.', 1010));
        }
    }
}
