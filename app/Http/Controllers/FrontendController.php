<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;
use App\User;

class FrontendController extends Controller
{
    public function index()
    {
        if(request('date')){
            $dentists = $this->findDentistsBasedOnDate(request('date'));
            return view('welcome',compact('dentists'));
        }
        $dentists = Appointment::where('date',date('Y-m-d'))->get();
    	return view('welcome',compact('dentists'));
    }

    public function show($dentistId, $date)
    {
        $appointment = Appointment::where('user_id', $dentistId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $dentistId)->first();
        $dentist_id = $dentistId;

        return view('appointment', compact('times', 'date', 'user', 'dentist_id'));
    }

    public function findDentistsBasedOnDate($date)
    {
        $dentists = Appointment::where('date',$date)->get();
        return $dentists;
    }
}
