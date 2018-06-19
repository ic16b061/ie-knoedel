<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Http\Requests;


class ContactController extends Controller
{

    public function create(){
        return view('kontakt');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('kontakt');
    }




    /**
     * Send the form by mail.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */


    public function send(Request $request)
    {
        Mail:send('emails.contact-message', [
        'msg' => $request->message
    ], function($mail) use($request){
        $mail->from($request->email, $request->name);

        $mail->to('knoedel1@gmx.at')->subject('Kontakt von Website');
    });

        return redirect()->back()->with('flash_message', 'Danke für Ihre Nachricht');

    }

}
