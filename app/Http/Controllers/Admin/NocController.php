<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\firstReview;
use App\Models\NOC;
use App\Models\thirdReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = Advertisment::all();
        return view('noc.adminchoose')->with([
            'adverts' => $advert
        ]);
    }

    //publisher eligible for NOC
    public function nocPublishers($id){
        $irc = thirdReview::where('advertisment_id', $id)->get();
        $user_ids = array();
        foreach ($irc as $ef){
            $user_ids[]= $ef->user_id;
        }
        $publishers =  DB::table('users')
            ->selectRaw('third_reviews.id as review_id, third_reviews.status, third_reviews.advertisment_id, users.name, users.id, users.firm_name ')
            ->join('third_reviews', 'users.id', '=', 'third_reviews.user_id')
            ->where('third_reviews.status', 1)
            ->whereIn('users.id', $user_ids)->get();
        return view('noc.noc_publishers')->with([
            'publishers' => $publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noc_p = new NOC();
        $noc1 = time() . '.' . $request->noc->extension();
        $request->noc->move(public_path('noc_docs'), $noc1);
        $noc_p->noc = $noc1;

        $noc_p->user_id = $request->user_id;
        $noc_p->advertisment_id = $request->advertisment_id;
        $noc_p->save();

        return  redirect()->back()->with([
            "success" => 'NOC Uploaded Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
