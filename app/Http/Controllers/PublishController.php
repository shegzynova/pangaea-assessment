<?php

namespace App\Http\Controllers;

use App\Models\Publish;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class PublishController extends Controller
{


    public function publish(Request $request, $topic)
    {
        $subscribers = Subscriber::where('topic', $topic)->get();

        if(count($subscribers) == 0){
            return response()->json([
                'status' => 'error',
                'message' => 'No subscriber found'
            ]);
        }else{

            if ($request->message) {
                $publish = Publish::create([
                    'message' => $request->message,
                    'topic' => $topic
                ]);

                //Notify them here, loop through and message them

                return response()->json([
                    'topic' => $publish->topic,
                    'data' => [
                        'message' => $publish->message
                    ]
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Please enter message'
            ]);

        // return response()->json($subscribers->first()->url);
        }
    }


}
