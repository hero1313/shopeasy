<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function merchants(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();   
        if ($request->call_filter) {
            $users = User::orderBy('id', 'DESC')->where('call_status', $request->call_filter)->get();
            // dd($users);
        }
        if ($request->activity_filter) {
            $users = User::orderBy('id', 'DESC')->where('activity_status', $request->activity_filter)->get();
        }   
        return view('admin.components.merchants', compact(['users']));
    }
    public function merchantsUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->activity_status = $request->activity_status;
        $user->call_status = $request->call_status;
        $user->update();
        return redirect()->back();
    }


    public function merchantsDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();

    }
}
