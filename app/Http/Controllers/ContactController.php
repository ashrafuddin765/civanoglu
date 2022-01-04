<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessContactMail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class ContactController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function propertyInquiry( HttpFoundationRequest $request, $property_id ) {
        $request->validate( [
            'name'    => 'required|max:255',
            'phone'   => 'required|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required |max:255',
        ] );

        $contact          = new Contact();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->message = $request->message . '\n This message has been sent vaia ' . route( 'single-property', $property_id ) . '   website';
        $contact->save();

        //send user and admin mails
        ProcessContactMail::dispatch($contact);
   


        return redirect( route( 'single-property', $property_id ) )->with( ['message' => 'Your message has been sent!'] );
    }

}
