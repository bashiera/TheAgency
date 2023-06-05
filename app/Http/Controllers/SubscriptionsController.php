<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $Subscription = Subscription::create($request->all());
$role=Role::create(['name'=>'superAdmin']);
        return response()->json([
            "data" => $Subscription,
            'message' => 'successful.',
        ]);
    }


}
