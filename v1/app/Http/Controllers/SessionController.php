<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function storeSessionData (Request $request,$id) {
        $request->session()->put('event_id',$id);
        return redirect()->back();
    }
    public function deleteSessionData (Request $request) {
        $request->session()->forget('event_id');
        return redirect()->back();
    }
    public function getSessionData(Request $request) {
        if ($request->session()->has('event_id')) {
            return $request->session()->get('event_id');
        }
    }
}
