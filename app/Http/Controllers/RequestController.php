<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Request as req;

class RequestController extends Controller
{

    public function index()
    {
        $request = req::all();
        return [
            "status" => 1,
            "data" => $request
        ];
    }

    public function store(Request $request)
    {

        $request->validate([
            'fname'=>'required|string',
            'email'=>'required|email',
            'phoneNumer'=>'required|string',
            'company_name'=>'required|string',
            // 'pricing_id'=>'exist:pricings,id'


        ]);
        $req = req::create($request->all());
        return response()->json([
            'message' => 'successful',
            'request' => $req,
        ]);
    }


}
