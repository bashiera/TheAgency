<?php

namespace App\Http\Controllers;

use App\Mail\notificationMail;
use App\Models\Portfolio;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('is_admin', ['except' => ['index', 'show']]);
    // }

    public function index()
    {
        $portfolio = Portfolio::all();
        return [
            "status" => 1,
            "data" => $portfolio
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required| string',
            'description' => 'required |string',
            'link' => 'required |url',
            'image' => 'nullable|file',
            'user_id' => 'required| exists:users,id',
            'category_id' => 'required| exists:categories,id'


        ]);
        $request['image'] = $request->file('image')->store('public/portfolio_images');
        $portfolio = Portfolio::create($request->all());
        $emails=Subscription::all();
        Mail::to($emails)->send(new notificationMail());
        return response()->json([
            'message' => 'successful',
            'protfolio' => $portfolio,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return [
            "status" => 1,
            "data" => $portfolio
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'string',
            'description' => 'string',
            'link' => 'url',
            'category_id' => 'exists:categories,id'
        ]);

        $portfolio->update($request->all());
        return [
            "status" => 1,
            "data" => $portfolio,
            "msg" => "updated successfully"
        ];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return [
            "msg" => "deleted successfully"
        ];
    }
}
