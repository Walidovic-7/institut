<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email|max:190',
            'subject' => 'nullable|string|max:190',
            'message' => 'required|string|min:5',
        ]);

        $data['user_id'] = auth()->id();

        ContactMessage::create($data);

        return back()->with('success', 'Message envoyé ✅ Nous vous répondrons bientôt.');
    }
}

