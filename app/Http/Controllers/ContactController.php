<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function propertyInquiry(HttpFoundationRequest $request, $property_id){
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required |max:255',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message. '\n This message has been sent vaia '.route('single-property', $property_id). '   website';
        $contact->save();

        return redirect(route('single-property', $property_id));
   }
}
