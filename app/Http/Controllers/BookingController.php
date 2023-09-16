<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function book(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'animal_type' => 'in:cat,dog',
            'breed' => 'nullable|string|max:50',
            'is_mixed' => 'nullable|string|max:50',
            'animal_age' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'customer_surname' => 'nullable|string',
            'email' => 'nullable|string',
            'is_shared' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }

        $booking = new Booking;
        $booking->animal_type = $request->animalType;
        $booking->breed = $request->breed;
        $booking->is_mixed = $request->isMixed;
        $booking->animal_age = $request->animalAge;
        $booking->phone_number = $request->phoneNumber;
        $booking->customer_surname = $request->customerSurname;
        $booking->email = $request->email;
        $booking->is_shared = false;
        $booking->save();


        // $mailer = new OrderShipmentController;
        // $mailer->store($booking);


        return response()->noContent(Response::HTTP_CREATED);
    }

    public function share(Request $request)
    {
        /*  $validator = Validator::make($request->all(), [
            'key' => 'in:123456789',
        ]); */

        /*       if ($validator->fails()) {
            return response(null, 404);
        } */

        $bookings = Booking::where('is_shared', '=', 0)->get();
        foreach ($bookings as $booking) {
            $booking->animal_type = ($booking->animal_type == 'cat') ? 'Kass' : 'Koer';
            $booking->is_mixed = ($booking->is_mixed) ? true : false;
            $booking->breed = $booking->is_mixed ? false : $booking->breed;
        }
        return response()->json($bookings, 200);
    }


    public function sync(Request $request)
    {
        $bookingIds = $request->input('bookings');
        Booking::whereIn('id', $bookingIds)->update(['is_shared' => 1]);
        return response($bookingIds, 200);
    }
}
