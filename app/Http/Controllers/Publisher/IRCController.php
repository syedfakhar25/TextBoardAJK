<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\EOI;
use App\Models\firstReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IRCController extends Controller
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
        $irc = firstReview::where('advertisment_id', $eoi->advertisment->id)->get();
        return view('irc.choose')->with([
            "irc" => $irc
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

        $irc = new firstReview();
        $irc->advertisment_id = $advertisment_id;
        $irc->user_id = $user->id;
        $challan1 = time().'.'.$request->challan->extension();
        $request->challan->move(public_path('firstReview'), $challan1);
        $irc->challan = $challan1;

        $irc->save();
        return redirect()->route('irc.index')->with([
            "success" => "Challan for first review added succesfully"
        ]);

    }

    //admin sees list of
    public function ircAdmin(){
        $advert = Advertisment::all();
        return view('irc.adminchoose')->with([
            'adverts' => $advert
        ]);
    }
    //publishers against the adv
    public function ircPublishers($id){
        $irc = firstReview::where('advertisment_id', $id)->get();
        $user_ids = array();
        foreach ($irc as $ef){
            $user_ids[]= $ef->user_id;
        }
        $publishers =  DB::table('users')
            ->selectRaw('first_reviews.challan as challan, first_reviews.id as review_id, first_reviews.status, users.name, users.id, users.firm_name ')
            ->join('first_reviews', 'users.id', '=', 'first_reviews.user_id')
            ->whereIn('users.id', $user_ids)->get();

        return view('irc.irc_publishers')->with([
            'publishers' => $publishers
        ]);
    }

    public function approveIrcPublishers($id){
        $irc = firstReview::find($id);
        $irc->status = 1;
        $irc->update();

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
