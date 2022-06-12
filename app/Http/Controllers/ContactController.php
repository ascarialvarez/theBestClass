<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //de mostrar el formulario
    public function index(){
        return view('contact.index');
    }
    //procesa el formulario y envia el correo
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mensaje'=>'required'
        ]);

        $correo = new Contact($request->all());
        Mail::to('ascarialvarez1@gmail.com')->send($correo);

        return redirect()->route('contact.index')->with('info','Mensaje enviado');
    }
}
