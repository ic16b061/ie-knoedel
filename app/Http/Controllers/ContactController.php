<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




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
        //brauchma ned -> script im kontakt.blade.php

    }

}
