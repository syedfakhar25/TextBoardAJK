<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterPublisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DahboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        if(Auth::user()->user_type == 'admin'){
            $all_publishers = DB::table('users')
                    ->join('register_publishers', function ($join) {
                    $join->on('users.id', '=', 'register_publishers.user_id')
                        ->where('register_publishers.submit', 1);
                })
                ->get();
            $total_publishers = $all_publishers->count();

            $approved_publishers = User::where('user_type', 'publisher')->where('initial_approve', 1)->get();
            $total_approved  = $approved_publishers->count();


            return view('admin.dashboard')->with([
                'all_publishers' => $all_publishers,
                'total_publishers' => $total_publishers,
                'approved_publishers' => $approved_publishers,
                'total_approved' => $total_approved
            ]);
        }
        elseif(Auth::user()->user_type == 'publisher'){
            $user = User::find($user_id);
            $publihser_register = RegisterPublisher::where('user_id', $user_id)->first();

            return view('publishers.dashboard')->with([
                'publihser_register' => $publihser_register,
                'user' => $user
            ]);
        }
        else{
            return view('admin.dashboard');
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
        //
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
