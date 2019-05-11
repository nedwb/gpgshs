<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\UserDetail;
use App\CareerTrack;
use App\CareerStrand;

class MiscellaneousController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // Function to verify email.
    public function verify(Request $request)
    {
        $user = User::getUserOnlyByQuery('email', $request->email)->get();
        $id = $user[0]->id;

        // Check if user has data from users details table.
        if (count($user) > 0)
        {
            if ($user[0]->active == '1') {
                $message = "Account has already been activated or the URL is invalid!";
                return view('verify', compact('message'));
            }
            else
            {
                if ($user[0]->token == $request->token) {
                    try
                    {
                        $users = User::find($id);
                        $users->active = '1';
                        $users->token = md5(rand(0,1000));
                        $users->save();

                        $message = "Your account has been successfully activated.";

                       return view('verify', compact('message'));

                    }
                    catch (\Illuminate\Database\QueryException $e) {
                        return view('reminder');
                    }
                }
                else
                    return view('reminder');
            }
            
        }
        else
        {
            return view('reminder');
        }
    }

    // Function to send the reset the password link.
    public function sendPasswordReset(Request $request)
    {
        $user = User::getUserOnlyByQuery('email', $request->email)->get();

        // Query token and send to email.
        if (count($user) > 0) {
            $message_body = '
            Please click this link to reset your password:
            http://127.0.0.1:8000/resetpasswd?email='.$user[0]->email.'&token='.$user[0]->token;

            Mail::raw($message_body, function($message) use ($request)
            {
                $message->subject('GPGSHS Password Reset');
                $message->from(config('mail.from.address'), config("app.name"));
                $message->to($request->email);
            });
            return view('reminder');
        }
        $message = "The entered email is invalid!";
        return view('resetlnk', compact('message'));
    }

    // Function to show reset password view.
    public function showPasswordReset(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        $user = User::getUserOnlyByQuery('email', $request->email)->get();

        // Check if user has data from users details table.
        if (count($user) > 0)
        {
            // Make sure the email and tokens passed are the same.
            if (($user[0]->email == $request->email) && ($user[0]->token == $request->token)) {
                return view('showreset', compact('email', 'token'));
            }
            else
                return view('reminder');
        }
    }

    // Function to reset password.
    public function passwordReset(Request $request)
    {
        $user = User::getUserOnlyByQuery('email', $request->email)->get();
        $id = $user[0]->id;

        // Check if user has data from users details table.
        if (count($user) > 0)
        {
            if (($user[0]->email == $request->email) && ($user[0]->token == $request->token)) {
                try
                {
                    $users = User::find($id);
                    $users->password = Hash::make($request->password);
                    $users->token = md5(rand(0,1000));
                    $users->save();

                    $message = "Your password has been successfully updated.";
                }
                catch (\Illuminate\Database\QueryException $e) {
                    $message = "Failed to update your password. Please contact system administrator.";
                } 
            }
            else
                $message = "Email/token does not match our records! Please follow link provided via your registered email.";

            return view('reset', compact('message'));
        }
    }
}
