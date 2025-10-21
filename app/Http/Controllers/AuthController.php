<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

use App\Models\Resident;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 

class AuthController extends Controller
{
    public function customLogin(Request $request)
    {

        $request->validate([
            'user_name' => ['required', Rule::exists('users')],
            'password' => 'required',
        ]);


            $credentials = $request->only('user_name', 'password');

            if( Auth::guard('web')->attempt($credentials) ){
                $User = User::where('user_name', $request->user_name)->get('is_enable')->first();
                $checkUser = User::where('user_name', $request->user_name)->get()->first();

                if ($checkUser->is_enable == true)
                {
                    $urlIntended = session()->get('url.intended');
                    if($urlIntended != null) {
                        // Log::channel('users')->info('User {id} succesfully logged in. With Ip Address {ip} ', ['id' => $checkUser->user_name,'ip' => $request->getClientIp()]);
                        RateLimiter::clear($request->input('user_name').'_login');
                        return redirect()->to($urlIntended);
                    }
                    else {

                        // Log::channel('users')->info('User {id} succesfully logged in. With Ip Address {ip}', ['id' => $checkUser->user_name, 'ip' => $request->getClientIp()]);
                        RateLimiter::clear($request->input('user_name').'_login');
                        return redirect()->route('dashboard');
                    }


                }

                else
                {
                    Auth::guard('web')->logout();
                    // Log::channel('users')->alert('Banned User {id} is logging in. With Ip Address {ip}', ['id' => $User->user_name, 'ip' => $request->getClientIp()]);
                    return redirect()->route('login')->with('ban','This Account is disabled. Please contact System Administrator');
                }

            }
            else{

                $maxAttempts = 4;
                $lockoutTime = 120;

                if (RateLimiter::tooManyAttempts($request->input('user_name').'_login', $maxAttempts)) {
                    $User = User::where('user_name', $request->user_name)->get()->first();
                    $User['is_enable'] = false;
                    $Success = $User->update();
                    if($Success) {
                        // Log::channel('users')->alert('User {id} is banned from the system. Ip Address {ip}', ['id' => $User->user_name,'ip' => $request->getClientIp()]);
                        return redirect()->route('login')->with('ban','Too many log in attempts. Account disabled. Please contact System Administrator');
                    }
                    else {
                        // Log::channel('users')->critical('Failed to update User to Disable.', ['id' => $User->user_name]);
                        return redirect()->route('login')->with('fail','Please contact System Administrator');
                    }

                }

                $attempt = RateLimiter::hit($request->input('user_name').'_login', $lockoutTime);
                // Log::channel('users')->alert(' User {id} is trying to log in. But failed. with IP Address {ip}', ['id' => $request->user_name, 'ip' => $request->getClientIp()]);
                return redirect()->route('login')->with('fail',' User Name  or Password does not match. ' . $maxAttempts - $attempt + 1 . ' Attempt(s) remaining.');

            }
        }

        public function store(Request $request)
        {
            $request->validate([
                'user_name'     => 'required|string|max:255|unique:users,user_name',
                'password'      => 'required|string|min:6',
                'name'          => 'required|string|max:255',
                'barangay'      => 'required|string|max:255',
                'gender'        => 'nullable|string',
                'birthdate'     => 'nullable|date',
                'contact'       => 'nullable|string|max:20',
                'email'         => 'nullable|email|max:255',
                'house_no'      => 'nullable|string|max:255',
                'purok'         => 'nullable|string|max:255',
                'occupation'    => 'nullable|string|max:255',
                'civil_status'  => 'nullable|string|max:255',
            ]);
    
            DB::beginTransaction();
    
            try {
                // Save to users table
                $user = User::create([
                    'name'       => $request->name,
                    'user_name'  => $request->user_name,
                    'password'   => Hash::make($request->password),
                ]);
    
                // Save to residents table
                Resident::create([
                    'user_id'       => $user->id,
                    'name'          => $request->name,
                    'gender'        => $request->gender,
                    'birthdate'     => $request->birthdate,
                    'barangay'      => $request->barangay,
                    'contact'       => $request->contact,
                    'email'         => $request->email,
                    'house_no'      => $request->house_no,
                    'purok'         => $request->purok,
                    'occupation'    => $request->occupation,
                    'civil_status'  => $request->civil_status,
                ]);
    
                DB::commit();
    
                return redirect()->route('login')->with('success', 'Registration successful! You may now login.');
    
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withErrors(['error' => 'An error occurred while saving: ' . $e->getMessage()]);
            }
        }
}
