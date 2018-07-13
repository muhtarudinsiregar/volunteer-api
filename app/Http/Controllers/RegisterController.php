<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreUser;

class RegisterController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        //https://stackoverflow.com/questions/3825990/http-response-code-for-post-when-resource-already-exists
        $statusConflict = 409;

        try {
            $createUser = $this->userRepo->store($request->all());
            return response()->json(['success' => (boolean)$createUser]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ],
                $statusConflict
            );
        }
    }
}
