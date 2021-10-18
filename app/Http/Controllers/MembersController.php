<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Resources\MemberCollection;
use App\Http\Services\RegistrationService;
use App\Http\Services\UpdateDetailService;
use App\Http\Services\RemoveMemberService;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = new Member;
        // $details = $members->orderBy('last_name', 'ASC')->get();
        // dd($det);
        $details = MemberCollection::collection(Member::get());
        return response()->json($details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = (new RegistrationService)->registerMember($request->all());
        return response()->json($response);
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
        $response = new MemberCollection(Member::findOrFail($id));
        return response()->json($response);
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
        // dd($request);
        $response = (new UpdateDetailService)->updateDetails($request->all(), $id);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new RemoveMemberService)->removeMember($id);
    }
}
