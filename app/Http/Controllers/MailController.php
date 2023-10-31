<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Jobs\SendMailJob;

class MailController extends Controller
{
    public function index()
    {
        return view('kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('send-email')->with('success', 'Email berhasil dikirim');
    }
}
