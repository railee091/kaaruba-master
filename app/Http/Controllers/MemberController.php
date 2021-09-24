<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberDetails;


class MemberController extends Controller
{
    //

    public function index()
    {
        $members = new Member;
        $details = $members::with('details')->get();
        // dd($details);
        // dd($det);
        return view('memberlist')->with('members', $details);
    }
}
