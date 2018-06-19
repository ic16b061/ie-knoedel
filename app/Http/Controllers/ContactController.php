<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        //
    }
}
