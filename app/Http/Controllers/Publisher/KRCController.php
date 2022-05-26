<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\EOI;
use App\Models\firstReview;
use App\Models\secondReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KRCController extends Controller
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
        $krc = secondReview::where('advertisment_id', $eoi->advertisment->id)->get();
        return view('krc.choose')->with([
            "krc" => $krc
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

        $krc = new secondReview();
        $krc->advertisment_id = $advertisment_id;
        $krc->user_id = $user->id;
        $challan1 = time().'.'.$request->challan->extension();
        $request->challan->move(public_path('secondReview'), $challan1);
        $krc->challan = $challan1;

        $krc->save();
        return redirect()->route('krc.index')->with([
            "success" => "Challan for second review added succesfully"
        ]);
    }



    //admin sees list of
    public function krcAdmin(){
        $advert = Advertisment::all();
        return view('krc.adminchoose')->with([
            'adverts' => $advert
        ]);
    }

    //publishers against the adv
    public function krcPublishers($id){
        $irc = secondReview::where('advertisment_id', $id)->get();
        $user_ids = array();
        foreach ($irc as $ef){
            $user_ids[]= $ef->user_id;
        }
        $publishers =  DB::table('users')
            ->selectRaw('second_reviews.challan as challan, second_reviews.id as review_id, second_reviews.status, users.name, users.id, users.firm_name ')
            ->join('second_reviews', 'users.id', '=', 'second_reviews.user_id')
            ->whereIn('users.id', $user_ids)->get();

        return view('krc.krc_publishers')->with([
            'publishers' => $publishers
        ]);
    }

    public function approveKrcPublishers($id){
        $krc = secondReview::find($id);
        $krc->status = 1;
        $krc->update();

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
