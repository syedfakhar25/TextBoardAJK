<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::where('user_id' ,Auth::user()->id)->first();
        if($document !=NULL){
            return view('documents.edit')->with([
                'document' =>$document
            ]);
        }
        else{
            return view('documents.index');
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
       //dd($request->all());
        $documents = new Document();
        /*$request->validate([
            'cnic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'father_cnic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'declaration' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'purchase_deed' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rent_deed' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'electricity_bill' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'equipment_voucher' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/

        /*if ($request->has('cnic1')) {
            $path = $request->file('cnic1')->store('', 'public');
            $request->merge(['cnic' => $path]);
        }*/
        //get extension
        //dd($request->purchase_deed);
        $cnic1 = time().'.'.$request->cnic->extension();
        $father_cnic1 = time().'.'.$request->father_cnic->extension();
        $declaration1 = time().'.'.$request->declaration->extension();
        $purchase_deed1 = time().'.'.$request->purchase_deed->extension();
        $rent_deed1 = time().'.'.$request->rent_deed->extension();
        $electricity_bill1 = time().'.'.$request->electricity_bill->extension();
        $equipment_voucher1 = time().'.'.$request->equipment_voucher->extension();

        //store in path
        $request->cnic->move(public_path('publisher_docs'), $cnic1);
        $request->father_cnic->move(public_path('publisher_docs'), $father_cnic1);
        $request->declaration->move(public_path('publisher_docs'), $declaration1);
        $request->purchase_deed->move(public_path('publisher_docs'), $purchase_deed1);
        $request->rent_deed->move(public_path('publisher_docs'), $rent_deed1);
        $request->electricity_bill->move(public_path('publisher_docs'), $electricity_bill1);
        $request->equipment_voucher->move(public_path('publisher_docs'), $equipment_voucher1);

        //store in database
        $documents->user_id = Auth::user()->id;
        $documents->cnic = $cnic1;
        $documents->father_cnic = $father_cnic1;
        $documents->declaration = $declaration1;
        $documents->purchase_deed = $purchase_deed1;
        $documents->rent_deed = $rent_deed1;
        $documents->electricity_bill = $electricity_bill1;
        $documents->equipment_voucher = $equipment_voucher1;
        $documents->save();

        $document = Document::where('user_id', Auth::user()->id)->get();
        return redirect()->route('initial_registration.index')->with([
            'success'=> 'Documents Added Successfully!',
            'documnet' => $document
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
        $documents = Document::find($id);
        /*$request->validate([
            'cnic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'father_cnic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'declaration' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'purchase_deed' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rent_deed' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'electricity_bill' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'equipment_voucher' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/

        /*if ($request->has('cnic1')) {
            $path = $request->file('cnic1')->store('', 'public');
            $request->merge(['cnic' => $path]);
        }*/
        //get extension

        if($request->cnic != null){
            $cnic1 = time().'.'.$request->cnic->extension();
            $request->cnic->move(public_path('publisher_docs'), $cnic1);
            $documents->cnic = $cnic1;
        }

        if($request->father_cnic != null){
            $father_cnic1 = time() . '.' . $request->father_cnic->extension();
            $request->father_cnic->move(public_path('publisher_docs'), $father_cnic1);
            $documents->father_cnic = $father_cnic1;
        }

        if($request->declaration != null) {
            $declaration1 = time() . '.' . $request->declaration->extension();
            $request->declaration->move(public_path('publisher_docs'), $declaration1);
            $documents->declaration = $declaration1;
        }

        if($request->purchase_deed != null) {
            $purchase_deed1 = time() . '.' . $request->purchase_deed->extension();
            $request->purchase_deed->move(public_path('publisher_docs'), $purchase_deed1);
            $documents->purchase_deed = $purchase_deed1;
        }

        if($request->rent_deed != null) {
            $rent_deed1 = time() . '.' . $request->rent_deed->extension();
            $request->rent_deed->move(public_path('publisher_docs'), $rent_deed1);
            $documents->rent_deed = $rent_deed1;
        }

        if($request->electricity_bill != null) {
            $electricity_bill1 = time() . '.' . $request->electricity_bill->extension();
            $request->electricity_bill->move(public_path('publisher_docs'), $electricity_bill1);
            $documents->electricity_bill = $electricity_bill1;
        }

        if($request->equipment_voucher != null) {
            $equipment_voucher1 = time() . '.' . $request->equipment_voucher->extension();
            $request->equipment_voucher->move(public_path('publisher_docs'), $equipment_voucher1);
            $documents->equipment_voucher = $equipment_voucher1;
        }

        $documents->user_id = Auth::user()->id;
        $documents->update();

        $document = Document::where('user_id', Auth::user()->id)->get();
        return redirect()->route('initial_registration.index')->with([
            'success'=> 'Documents Updated Successfully!',
            'documnet' => $document
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
}
