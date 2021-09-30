<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberDetails;
use App\Http\Services\RemoveMemberService;


class MemberController extends Controller
{
    //

    public function index()
    {
        $members = new Member;
        $details = $members->orderBy('last_name', 'ASC')->get();
        // dd($det);
        return view('memberlist')->with('members', $details);
    }

    public function removeMember(Request $request)
    {
        (new RemoveMemberService)->removeMember($request->id);
        return redirect()->back();
    }
}
