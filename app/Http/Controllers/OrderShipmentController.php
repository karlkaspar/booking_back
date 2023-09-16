<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;

class OrderShipmentController extends Controller
{
  /**
   * Ship the given order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Booking $booking)
  {
    $order = Booking::findOrFail($booking->id);

    // Ship the order...

    // Mail::to('karlkasparkulesha@gmail.com')->send(new OrderShipped($order));

    //  Mail::raw('karlkasparkulesha@gmail.com')->send(new OrderShipped($order));
    Mail::send([], [], function ($message) {
      $message->to('karlkasparkulesha@gmail.com')->subject('pooping')->setBody('Hi, welcome user!'); // assuming text/plain
      // or:
      //->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
    });
  }
}
