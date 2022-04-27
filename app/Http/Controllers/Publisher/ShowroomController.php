<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\BindingFacility;
use App\Models\FinancialPosition;
use App\Models\GodownFacility;
use App\Models\PowerArrangement;
use App\Models\PrintingMachine;
use App\Models\PublishingExperience;
use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $show_room = Showroom::where('user_id', $user_id)->get();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->get();
        $power_arrangements = PowerArrangement::where('user_id', $user_id)->get();
        $binding = BindingFacility::where('user_id', $user_id)->get();
        $financial_position = FinancialPosition::where('user_id', $user_id)->get();
        $publishing = PublishingExperience::where('user_id', $user_id)->get();
        $godown = GodownFacility::where('user_id', $user_id)->get();

        if(count($show_room)>0){
            return view('showroom.edit')->with([
                'show_room' => $show_room,
                'printing_machine' => $printing_machine,
                'power_arrangements' => $power_arrangements,
                'binding' => $binding,
                'financial_position' => $financial_position,
                'publishing' => $publishing,
                'godown' => $godown,
                'user_id' => $user_id
            ]);
        }else{
            return view('showroom.index');
        }


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
        $user_id = Auth::user()->id;

        //all ids
        $show_room = Showroom::where('user_id', $user_id)->get();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->get();
        $power_arrangements = PowerArrangement::where('user_id', $user_id)->get();
        $binding = BindingFacility::where('user_id', $user_id)->get();
        $financial_position = FinancialPosition::where('user_id', $user_id)->get();
        $publishing = PublishingExperience::where('user_id', $user_id)->get();
        $godown = GodownFacility::where('user_id', $user_id)->get();

        //store showroom data
        $showroom = new Showroom();
        $showroom->user_id = $user_id;
        $showroom->dimensions = $request->dimensions;
        $showroom->location = $request->location;
        $showroom->property_number = $request->property_number;
        $showroom->showroom_owner = $request->showroom_owner;
        $showroom->save();

        //printing machine data
        $printing_machine = new PrintingMachine();
        $printing_machine->user_id = $user_id;
        $printing_machine->color = $request->color;
        $printing_machine->no_of_machines = $request->no_of_machines;
        $printing_machine->size = $request->size;
        $printing_machine->model = $request->model;
        $printing_machine->make = $request->make;
        $printing_machine->impressions = $request->impressions;
        $printing_machine->save();

        //power data
        $power_arrangement = new PowerArrangement();
        $power_arrangement->user_id = $user_id;
        $power_arrangement->alternative_arrangements = $request->alternative_arrangements;
        $power_arrangement->generator_capacity = $request->generator_capacity;
        $power_arrangement->save();

        //binding services
        $binding_services = new BindingFacility();
        $binding_services->user_id=$user_id;
        $binding_services->auto_machine=$request->auto_machine;
        $binding_services->stich_machine=$request->stich_machine;
        $binding_services->sewing_machine=$request->sewing_machine;
        $binding_services->single_clamp=$request->single_clamp;
        $binding_services->three_clamp=$request->three_clamp;
        $binding_services->five_clamp=$request->five_clamp;
        $binding_services->ten_clamps=$request->ten_clamps;
        $binding_services->single_knife=$request->single_knife;
        $binding_services->three_knives=$request->three_knives;
        $binding_services->save();

        //financial position
        $financial_position = new FinancialPosition();
        $financial_position->user_id = $user_id;
        $financial_position->financial_year = $request->financial_year;
        $financial_position->yearly_amount = $request->yearly_amount;
        $financial_position->assets_amount = $request->assets_amount;
        $financial_position->tax_year = $request->tax_year;
        $financial_position->yearly_tax_amount = $request->yearly_tax_amount;
        $financial_position->save();

        //publishing experience
        $publishing = new PublishingExperience();
        $publishing->user_id = $user_id;
        $publishing->years_in_publishing = $request->years_in_publishing;
        $publishing->no_of_books = $request->no_of_books;
        $publishing->no_of_qurans = $request->no_of_qurans;
        $publishing->save();

        //godown facility
        $godown_facility = new GodownFacility();
        $godown_facility->user_id = $user_id;
        $godown_facility->godown_owner = $request->godown_owner;
        $godown_facility->godown_area = $request->godown_area;
        $godown_facility->godown_address = $request->godown_address;
        $godown_facility->save();

        return redirect()->route('publisher_profile');
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
        $user_id = $id;
        $show_room = Showroom::where('user_id', $user_id)->get();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->get();
        $power_arrangements = PowerArrangement::where('user_id', $user_id)->get();
        $binding = BindingFacility::where('user_id', $user_id)->get();
        $financial_position = FinancialPosition::where('user_id', $user_id)->get();
        $publishing = PublishingExperience::where('user_id', $user_id)->get();
        $godown = GodownFacility::where('user_id', $user_id)->get();

        return view('showroom.edit')->with([
            'show_room' => $show_room,
            'printing_machine' => $printing_machine,
            'power_arrangements' => $power_arrangements,
            'binding' => $binding,
            'financial_position' => $financial_position,
            'publishing' => $publishing,
            'godown' => $godown,
        ]);
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
        $user_id = Auth::user()->id;

        //all ids
        $showroom = Showroom::where('user_id', $user_id)->first();
        $printing_machine = PrintingMachine::where('user_id', $user_id)->first();
        $power_arrangement = PowerArrangement::where('user_id', $user_id)->first();
        $binding_services = BindingFacility::where('user_id', $user_id)->first();
        $financial_position = FinancialPosition::where('user_id', $user_id)->first();
        $publishing = PublishingExperience::where('user_id', $user_id)->first();
        $godown_facility = GodownFacility::where('user_id', $user_id)->first();

        //store showroom data
        $showroom->user_id = $user_id;
        $showroom->dimensions = $request->dimensions;
        $showroom->location = $request->location;
        $showroom->property_number = $request->property_number;
        $showroom->showroom_owner = $request->showroom_owner;
        $showroom->update();

        //printing machine data
        $printing_machine->user_id = $user_id;
        $printing_machine->color = $request->color;
        $printing_machine->no_of_machines = $request->no_of_machines;
        $printing_machine->size = $request->size;
        $printing_machine->model = $request->model;
        $printing_machine->make = $request->make;
        $printing_machine->impressions = $request->impressions;
        $printing_machine->update();

        //power data
        $power_arrangement->user_id = $user_id;
        $power_arrangement->alternative_arrangements = $request->alternative_arrangements;
        $power_arrangement->generator_capacity = $request->generator_capacity;
        $power_arrangement->update();

        //binding services
        $binding_services->user_id=$user_id;
        $binding_services->auto_machine=$request->auto_machine;
        $binding_services->stich_machine=$request->stich_machine;
        $binding_services->sewing_machine=$request->sewing_machine;
        $binding_services->single_clamp=$request->single_clamp;
        $binding_services->three_clamp=$request->three_clamp;
        $binding_services->five_clamp=$request->five_clamp;
        $binding_services->ten_clamps=$request->ten_clamps;
        $binding_services->single_knife=$request->single_knife;
        $binding_services->three_knives=$request->three_knives;
        $binding_services->update();

        //financial position
        $financial_position->user_id = $user_id;
        $financial_position->financial_year = $request->financial_year;
        $financial_position->yearly_amount = $request->yearly_amount;
        $financial_position->assets_amount = $request->assets_amount;
        $financial_position->tax_year = $request->tax_year;
        $financial_position->yearly_tax_amount = $request->yearly_tax_amount;
        $financial_position->update();

        //publishing experience
        $publishing->user_id = $user_id;
        $publishing->years_in_publishing = $request->years_in_publishing;
        $publishing->no_of_books = $request->no_of_books;
        $publishing->no_of_qurans = $request->no_of_qurans;
        $publishing->update();

        //godown facility
        $godown_facility->user_id = $user_id;
        $godown_facility->godown_owner = $request->godown_owner;
        $godown_facility->godown_area = $request->godown_area;
        $godown_facility->godown_address = $request->godown_address;
        $godown_facility->update();


        return redirect()->route('publisher_profile');
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
