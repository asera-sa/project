<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use App\Mail\ReplayMessageMail;
use Mail;

class messageController extends Controller
{
    public function index()
    {
        $id=auth()->user()->halls_id;

        $messages=messages::where('halls_id','=',$id)->get();
        return view('messages.index')->with([
            'messages' => $messages,
        ]);
    }

    public function show($id)
    {
        $messages = Messages::FindOrFail($id);
        return view('messages.show')->with([
            'messages' => $messages,
        ]);

    }

    public function replay($id)
    {
        $messages = Messages::FindOrFail($id);
        return view('messages.replay_message')->with([
            'messages' => $messages,
        ]);
    } // End of replay

    public function replayMessage($id)
    {

        request()->validate([
            'text_replay' => 'required'
        ]);

        $messages = Messages::FindOrFail($id);
          // dd($messages->email);
        Mail::to($messages->email)->send(new ReplayMessageMail($messages, request('text_replay')));

        $messages->isReplay = 1;
        $messages->text_replay = request('text_replay');
        $messages->save();

        return redirect()->back()->with('success','تم إرسـال الرد بنجاح');

    } // End of replayMessage

    public function delete($id)
    {
        $messages= messages::find($id);
        $messages->delete();
        return redirect()->back();
    }

}
