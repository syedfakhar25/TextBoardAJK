<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\RegisterPublisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitialRegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initial_registration = RegisterPublisher::where('user_id', Auth::user()->id)->first();
        if($initial_registration !=NULL){
            return view('register_publisher.edit')->with([
                'initial_registration' => $initial_registration,
            ]);
        }
        else{
            return view('register_publisher.index');
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
       // dd($request->all());
        $register_publisher = new RegisterPublisher();
        $challan_image1 = time().'.'.$request->challan_image->extension();
        $request->challan_image->move(public_path('publisher_register'), $challan_image1);
        $register_publisher->challan_image = $challan_image1;
        $register_publisher->user_id = Auth::user()->id;
        $register_publisher->save();

        $register_publisher = RegisterPublisher::where('user_id', Auth::user()->id)->first();

        return redirect()->route('publisher_profile')->with([
            'success'=> 'Challan Updated Successfully!',
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
        $register_publisher = RegisterPublisher::find($id);
        if($request->challan_image !=NULL){
            $challan_image1 = time().'.'.$request->challan_image->extension();
            $request->challan_image->move(public_path('publisher_register'), $challan_image1);
            $register_publisher->challan_image = $challan_image1;
        }

        $register_publisher->user_id = Auth::user()->id;
        $register_publisher->save();

        return redirect()->route('publisher_profile')->with([
            'success'=> 'Challan Updated Successfully!',
        ]);
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

    public function register(){
        $register_publisher = RegisterPublisher::where('user_id', Auth::user()->id)->first();
        $register_publisher->submit = 1;
        $register_publisher->update();

        return redirect()->route('dashboard');
    }
}
