<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required'
        ]);
        User::where('id', auth()->user()->id)
            ->update($request->except('_token'));
        return redirect()->back()->with('message', 'profile updated');
    }
}
