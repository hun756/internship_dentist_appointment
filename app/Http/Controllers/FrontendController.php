<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;
use App\User;
use App\Booking;
use App\Mail\AppointmentMail;

class FrontendController extends Controller
{
    public function index()
    {
        if (request('date')) {
            $dentists = $this->findDentistsBasedOnDate(request('date'));
            return view('welcome', compact('dentists'));
        }
        $dentists = Appointment::where('date', date('Y-m-d'))->get();
        return view('welcome', compact('dentists'));
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
        $dentists = Appointment::where('date', $date)->get();
        return $dentists;
    }


    public function store(Request $request)
    {
        $request->validate(['time' => 'required']);

        $check = $this->checkBookingTimeInterval();
        if ($check) {
            return redirect()
                ->back()
                ->with(
                    'errmessage',
                    'You have already bookedn an appointment.Please wait to make next appointment'
                );
        }


        Booking::create([
            'user_id' => auth()->user()->id,
            'dentist_id' => $request->dentistId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0
        ]);

        Time::where('appointment_id', $request->appointmentId)
            ->where('time', $request->time)
            ->update(['status' => 1]);

        // // E mail
        $dentistName = User::where('id', $request->dentistId)->first();
        $mailData = [
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'dentistName' => $dentistName->name

        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        } catch (\Exception $e) {
        }

        return redirect()->back()->with('message', 'Your appointment was booked');
    }

    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }

    public function myBookings()
    {
        $appointments = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('booking.index', compact('appointments'));
    }
}
