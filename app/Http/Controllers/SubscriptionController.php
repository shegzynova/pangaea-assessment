<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $topic)
    {
        if($topic){
        if ($request->url) {
            $subscriber = Subscriber::create([
                'url' => $request->url,
                'topic' => $topic
            ]);

            return response()->json([
                'url' => $subscriber->url,
                'topic' => $subscriber->topic
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Please enter url'
        ]);
    }
}

}
