<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function startAuthProcess(Request $request){
        $type = $request->type;

        //type onujayi age table ta create kore then page render hobe
        if($type == "student") {
            return view('account', ["type" => "student"]);
        }
        else if($type == "teacher") {
            return view('account', ["type" => "teacher"]);
        } 
        else {
            return "Bad request";
        }
    }

    //user register
    public function createUser(Request $request) {
        $accType = $request->get('accType');

        if($accType === "student") {
            $std_id = $request->get('std_id');

            try {
                $user = DB::table('students')->where('std_id', $std_id)->first();

                if($user) {
                    return redirect('/account?type=student')->with(['regSuccess' => 2]);
                }
                else {
                    DB::insert("INSERT INTO students VALUES(?, ?, ?, ?, ?, ?, ?, ?)", [
                        $accType,
                        $std_id,
                        $request->get('fullName'),
                        $request->get('dept'),
                        $request->get('semester'),
                        $request->get('email'),
                        $request->get('password'),
                        date('Y-m-d H:i:s')
                    ]);

                    return redirect('/account?type=student')->with(['regSuccess' => 1]);
                }
            }
            catch (\Throwable $th) {
                return redirect('/account?type=student')->with(['regSuccess' => -1]);
            }

            //regSuccess namer variable er value onujayi register success hoise naki failed ota show korbe
        } 
        else if ($accType === "teacher") {
            $t_id = $request->get('t_id');

            try {
                $user = DB::table('teachers')->where('t_id', $t_id)->first();

                if($user) {
                    return redirect('/account?type=teacher')->with(['regSuccess' => 2]);
                }
                else {
                    DB::insert("INSERT INTO teachers VALUES(?, ?, ?, ?, ?, ?, ?)", [
                        $accType,
                        $t_id,
                        $request->get('fullName'),
                        $request->get('dept'),
                        $request->get('email'),
                        $request->get('password'),
                        date('Y-m-d H:i:s')
                    ]);

                    return redirect('/account?type=teacher')->with(['regSuccess' => 1]);
                }
            } catch (\Throwable $th) {
                return redirect('/account?type=teacher')->with(['regSuccess' => -1]);
            }
        }
        else {
            return response("Bad request", 400);
        }
    }

    public function authenticateUser(Request $request) {
        $accType = $request->get('accType');
        $id = $request->get('id');
        $password = $request->get('password');

        if($accType === "student") {
            try {
                $user = DB::table('students')->where('std_id', $id)->first();

                if($user) {
                    if($user->password === $password) {
                        //login
                        $userData = [
                            "accType" => $user->accType,
                            "std_id" => $user->std_id,
                            "fullName" => $user->fullName,
                            "dept" => $user->dept,
                            "semester" => $user->semester,
                            "email" => $user->email,
                            "regDate" => $user->regDate
                        ];

                        $request->session()->put("user", $userData);
                        return redirect('/dashboard');
                    }
                    else {
                        return redirect('/account?type=student')->with(["loginSuccess" => -1]);
                    }
                }
                else {
                    return redirect('/account?type=student')->with(["loginSuccess" => -1]);
                }
            } 
            catch (\Throwable $th) {
                return redirect('/account?type=student')->with(["loginSuccess" => -2]);
            }
        }
        else if($accType === "teacher") {
            try {
                $user = DB::table('teachers')->where('t_id', $id)->first();

                if($user) {
                    if($user->password === $password) {
                        //login
                        $userData = [
                            "accType" => $user->accType,
                            "t_id" => $user->t_id,
                            "fullName" => $user->fullName,
                            "dept" => $user->dept,
                            "email" => $user->email,
                            "regDate" => $user->regDate
                        ];

                        $request->session()->put("user", $userData);
                        return redirect('/dashboard');
                    }
                    else {
                        return redirect('/account?type=teacher')->with(["loginSuccess" => -1]);
                    }
                }
                else {
                    return redirect('/account?type=teacher')->with(["loginSuccess" => -1]);
                }
            } 
            catch (\Throwable $th) {
                return redirect('/account?type=teacher')->with(["loginSuccess" => -2]);
            }
        }
    }

}