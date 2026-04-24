<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'List Users',
            'data' => User::latest()->get()
        ]);
    }
}