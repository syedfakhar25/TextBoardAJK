<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\NOC;
use App\Models\Royalty;
use App\Models\RoyaltyChallan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoyaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = Advertisment::all();
        return view('royalty.choose')->with([
            'adverts' => $advert
        ]);
    }

    public function royaltyAdd($id){
     $advert_id = $id;
     $user_id = Auth::user()->id;
     $royalty = Royalty::where('advertisment_id', $advert_id)
         ->where('user_id', $user_id)
         ->get();
     $noc = NOC::where('advertisment_id', $advert_id)
         ->where('user_id', $user_id)
         ->get();

     return view('royalty.create')->with([
        "advert_id" => $advert_id,
        "user_id" => $user_id,
        "royalty" =>  $royalty,
         "noc" => $noc
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
        $advert_id = $request->advert_id;
        $user_id = $request->user_id;
        $royal_updated = Royalty::where('advertisment_id', $advert_id)
            ->where('user_id', $user_id)
            ->first();
        if($royal_updated == null){
            $royalty = new Royalty();
            $royalty->user_id = $user_id;
            $royalty->advertisment_id = $advert_id;
            $royalty->total_price = $request->total_price;
            $royalty->current_price = $request->current_price;
            $royalty->save();

            $royal_challan = new RoyaltyChallan();
            $royal_challan->royalty_id = $royalty->id;
            $challan1 = time() . '.' . $request->challan->extension();
            $request->challan->move(public_path('royalty_docs'), $challan1);
            $royal_challan->challan = $challan1;
            $royal_challan->save();

            return redirect()->back()->with([
                "success" => "fee added successfully!"
            ]);
        }else{
            $new_price = $royal_updated->current_price + $request->current_price;
          // dd($new_price);
            $royal_updated->current_price = $new_price;
            $royal_updated->update();

            $royal_challan = new RoyaltyChallan();
            $royal_challan->royalty_id = $royal_updated->id;
            $challan1 = time() . '.' . $request->challan->extension();
            $request->challan->move(public_path('royalty_docs'), $challan1);
            $royal_challan->challan = $challan1;
            $royal_challan->save();

            return redirect()->back()->with([
                "success" => "new fee added successfully!"
            ]);
        }

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
