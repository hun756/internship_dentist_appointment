<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dentists = User::get();
        return view('admin.dentist.index', compact('dentists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dentist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateStore($request);
        $data = $request->all();
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message', 'Dentist Added Successfully');
        // dd($request->all());
    }

    /**
     * Return Validate form.
     */
    public function validateStore(Request $request)
    {
        return $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:25',
            'gender'=>'required',
            'status'=>'required',
            'address'=>'required',
            'department'=>'required',
            'phone_number'=>'required|numeric',
            'image'=>'required|mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required'
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
        $users = User::find($id);
        return view('admin.dentist.edit', compact('users'));
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
