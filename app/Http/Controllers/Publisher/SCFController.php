<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\EOI;
use App\Models\secondReview;
use App\Models\thirdReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SCFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $eoi = EOI::where('user_id', $user->id)->latest('created_at')->first();
        $scf = thirdReview::where('advertisment_id', $eoi->advertisment->id)->get();
        return view('scf.choose')->with([
            "scf" => $scf
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
        $user = Auth::user();
        $eoi = EOI::where('user_id', $user->id)->latest('created_at')->first();
        $advertisment_id = $eoi->advertisment_id;

        $scf = new thirdReview();
        $scf->advertisment_id = $advertisment_id;
        $scf->user_id = $user->id;
        $challan1 = time().'.'.$request->challan->extension();
        $request->challan->move(public_path('thirdReview'), $challan1);
        $scf->challan = $challan1;

        $scf->save();
        return redirect()->route('scf.index')->with([
            "success" => "Challan for third review added succesfully"
        ]);
    }

    //admin sees list of
    public function scfAdmin(){
        $advert = Advertisment::all();
        return view('scf.adminchoose')->with([
            'adverts' => $advert
        ]);
    }

    //publishers against the adv
    public function scfPublishers($id){
        $scf = thirdReview::where('advertisment_id', $id)->get();
        $user_ids = array();
        foreach ($scf as $ef){
            $user_ids[]= $ef->user_id;
        }
        $publishers =  DB::table('users')
            ->selectRaw('third_reviews.challan as challan, third_reviews.id as review_id, third_reviews.status, users.name, users.id, users.firm_name ')
            ->join('third_reviews', 'users.id', '=', 'third_reviews.user_id')
            ->whereIn('users.id', $user_ids)->get();

        return view('scf.scf_publishers')->with([
            'publishers' => $publishers
        ]);
    }

    public function approveScfPublishers($id){
        $scf = thirdReview::find($id);
        $scf->status = 1;
        $scf->update();

        return redirect()->back()->with([
            "success" => "Status Updated",
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
