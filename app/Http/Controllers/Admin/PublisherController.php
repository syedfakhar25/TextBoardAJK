<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BindingFacility;
use App\Models\FinancialPosition;
use App\Models\GodownFacility;
use App\Models\PowerArrangement;
use App\Models\PrintingMachine;
use App\Models\PublishingExperience;
use App\Models\Showroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        if(Auth::user()->user_type == 'admin'){
            return view('publishers.index')->with([
                'publishers' => $users
            ]);
        }

    }

    public function applicationForm(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('publishers.application_form')->with([
            'publisher' => $user,
        ]);
    }

    public function publisherShowroom(){
        return view('publishers.showroom');
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
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name   = $request->name;
        $user->father_name  = $request->father_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;
        $user->husband_name = $request->husband_name;
        $user->cnic = $request->cnic;
        $user->father_cnic = $request->father_cnic;
        $user->husband_cnic = $request->husband_cnic;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;

        //firm
        $user->firm_name = $request->firm_name;
        $user->firm_phone = $request->firm_phone;
        $user->firm_cell = $request->firm_cell;
        $user->firm_address = $request->firm_address;
        $user->firm_status = $request->firm_status;
        $user->firm_tax_no = $request->firm_tax_no;
        $user->firm_gst_no = $request->firm_gst_no;


        $user->update();

        return redirect()->route('showroom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function publisherProfile(){
        $user_id = Auth::user()->id;
        $show_room = Showroom::where('user_id', $user_id)->first();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->first();
        $power_arrangements = PowerArrangement::where('user_id', $user_id)->first();
        $binding = BindingFacility::where('user_id', $user_id)->first();
        $financial_position = FinancialPosition::where('user_id', $user_id)->get();
        $publishing = PublishingExperience::where('user_id', $user_id)->first();
        $godown = GodownFacility::where('user_id', $user_id)->first();

        return view('publishers.profile')->with([
            'user' => Auth::user(),
            'show_room' => $show_room,
            'printing_machine' => $printing_machine,
            'power_arrangements' => $power_arrangements,
            'binding' => $binding,
            'financial_position' =>$financial_position,
            'publishing' => $publishing,
            'godown'=>$godown
        ]);
    }
    //for showing to admin
    public function publisherProfileAdmin($id){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $show_room = Showroom::where('user_id', $user_id)->first();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->first();
        $power_arrangements = PowerArrangement::where('user_id', $user_id)->first();
        $binding = BindingFacility::where('user_id', $user_id)->first();
        $financial_position = FinancialPosition::where('user_id', $user_id)->get();
        $publishing = PublishingExperience::where('user_id', $user_id)->first();
        $godown = GodownFacility::where('user_id', $user_id)->first();

        return view('publishers.profile')->with([
            'user' => $user,
            'show_room' => $show_room,
            'printing_machine' => $printing_machine,
            'power_arrangements' => $power_arrangements,
            'binding' => $binding,
            'financial_position' =>$financial_position,
            'publishing' => $publishing,
            'godown'=>$godown
        ]);
    }
}
