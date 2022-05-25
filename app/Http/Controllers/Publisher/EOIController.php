<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Book;
use App\Models\EOI;
use App\Models\EoiBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EOIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = Advertisment::first();
        $user_id = Auth::user()->id;
        $eoiform = EOI::where('user_id', $user_id)->first();
        if($eoiform != NULL){
            return redirect()->route('eoiprofile');
        }
        else{
            return view('eoiform.choose', [
                "ad" => $advert
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        if(Auth::user()->user_type == 'publisher'){
            return view('eoiform.create');
        }
        else{
            return redirect()->route('dashboard');
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
        $eoiform = new EOI();
        $challan1 = time() . '.' . $request->challan->extension();
        $request->challan->move(public_path('eoiimages'), $challan1);
        $eoiform->challan = $challan1;
        $eoiform->user_id = Auth::user()->id;
        $eoiform->advertisment_id = $request->advert;
        $eoiform->save();

        if(!empty($request->books)){
            foreach ($request->books as $key=>$value){
                $eoi_books = new EoiBook();
                $eoi_books->book_id =  $value;
                $eoi_books->eoi_id = $eoiform->id;
                $eoi_books->save();
            }
        }
        return redirect()->route('eoiprofile')->with([
            'success' => 'Added Successfuly'
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
        $ad = Advertisment::find($id);
        $books = Book::where('advertisment_id', $id)->get();
        if(Auth::user()->user_type == 'publisher'){
            return view('eoiform.create', compact([
                'ad', $ad,
                'books', $books
            ]));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function eoiProfile(){
        if(Auth::user()->user_type = 'publisher'){
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $eoiform  = EOI::where('user_id', $user_id)->first();
            $eoi_books = EoiBook::where('eoi_id', $eoiform->id)->get();
            $book_ids = array();
            foreach ($eoi_books as $eb){
                $book_ids[] = $eb->book_id;
            }
            $books = Book::whereIn('id', $book_ids)->get();

            return view('eoiform.eoiprofile', [
                "eoiform" => $eoiform,
                "books" => $books,
                "user" => $user
            ]);
        }
        else{
          return redirect()->route('dashboard');
        }
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
