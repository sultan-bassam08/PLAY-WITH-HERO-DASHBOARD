<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:newsletter_subscriptions,email'
            ]);
        
            NewsletterSubscription::create([
                'email' => $request->email
            ]);
        
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully subscribed to newsletter!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }
}