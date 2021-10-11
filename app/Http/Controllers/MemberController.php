<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberCollection;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Services\RemoveMemberService;


class MemberController extends Controller
{
    //

    public function index()
    {
        $members = new Member;
        // $details = $members->orderBy('last_name', 'ASC')->get();
        // dd($det);
        $details = MemberCollection::collection(Member::get());

        // dd($details);
        return response()->json($details);
        return view('memberlist')->with('members', $details);
    }

    public function removeMember(Request $request)
    {
        (new RemoveMemberService)->removeMember($request->id);
        return redirect()->back();
    }
}
