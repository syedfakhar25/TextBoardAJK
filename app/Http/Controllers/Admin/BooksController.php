<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Book;
use App\Models\EOI;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = Advertisment::all();
        return view('books.index')->with([
            'adverts' => $advert
        ]);
    }

    //list of publishers against a particular advertisment
    public function eoiPublishers($id){
        $eoi_forms = EOI::where('advertisment_id', $id)->get();
        $user_ids = array();
        foreach ($eoi_forms as $ef){
            $user_ids[]= $ef->user_id;
        }

        $publishers = User::whereIn('id', $user_ids)->get();
        return view('books.eoi_publishers', [
            "publishers" => $publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->user_type == 'admin'){
            return view('books.create');
        }
        else{
            return route('dashboard');
        }

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
            'advert' => ['required','mimes:jpg,bmp,png'],
        ]);
        $advertisment = new Advertisment();
        $advert1 = time() . '.' . $request->advert->extension();
        $request->advert->move(public_path('advertisment'), $advert1);
        $advertisment->advert = $advert1;
        $advertisment->date = $request->date;
        $advertisment->price = $request->price;
        $advertisment->save();

        if(!empty($request->books)){
            foreach ($request->books as $key => $value){
                $book = new Book();
                $book->books = $value;
                $book->advertisment_id = $advertisment->id;
                $book->save();
            }
        }
       return redirect()->route('books.index')->with([
         'Success' => 'Advertisement Added Successfully!'
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
