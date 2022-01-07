<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard(Request $request) {
        //session theke  logged in user er info neya hocche
        $user = $request->session()->get("user");

        if($user) {
            if($user["accType"] === "student") {
                //student er dept er teacher der name and id gula db theke read kore view te pass hocche
                $teachers = DB::select("SELECT t_id, fullName FROM teachers WHERE dept = ?", [
                    $user["dept"]
                ]);
                
                return view('dashboard', compact(['user', 'teachers']));
            } 
            else if($user["accType"] === "teacher") {
                $feedbacks = DB::select("SELECT * FROM feedbacks WHERE t_id = ?", [
                    $user["t_id"]
                ]);

                return view('dashboard', compact(['user', 'feedbacks']));
            }
        }
        else {
            return response("Request invalid! Please re-login.");
        }
    }

    public function sendFeedbackHandler(Request $request) {
        $user = $request->session()->get('user');

        if($user["accType"] === "student") {
            $t_id = $request->get('t_id');

            $hasFeedback = DB::selectOne("SELECT f_id FROM feedbacks WHERE t_id = ? AND std_id = ?", [
                $t_id,
                $user["std_id"]
            ]);

            if($hasFeedback) {
                return redirect('/dashboard')->with(['feedbackSuccess' => 2]);
            }
            else {
                try {
                    $query = "INSERT INTO feedbacks (t_id, std_id, q1, q2, q3, q4, q5, q6) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

                    DB::insert($query, [
                        $t_id,
                        $user["std_id"],
                        $request->get('q1'),
                        $request->get('q2'),
                        $request->get('q3'),
                        $request->get('q4'),
                        $request->get('q5'),
                        $request->get('q6')
                    ]);

                    return redirect('/dashboard')->with(['feedbackSuccess' => 1]);
                } 
                catch (\Throwable $th) {
                    return redirect('/dashboard')->with(['feedbackSuccess' => -1]);
                }
            }
        }
        else {
            return response("Bad request error!", 400);
        }
    }

    public function updateProfile(Request $request) {
        $user = $request->session()->get("user");
        //detect where to update
        $colName = $request->get("colName");
        $value = $request->get("value");

        try {
            if($user["accType"] === "student") {
                DB::update("UPDATE students SET " . $colName . " = ? WHERE std_id = ?", [
                    $value,
                    $user["std_id"]
                ]);
            }
            else if($user["accType"] === "teacher") {
                DB::update("UPDATE teachers SET " . $colName . " = ? WHERE t_id = ?", [
                    $value,
                    $user["t_id"]
                ]);
            }
            
            if($colName != "password") {
                $user[$colName] = $value;
                $request->session()->forget('user');
                $request->session()->flush();
                $request->session()->put('user', $user);
            }
    
            return redirect('/dashboard')->with(['updateSuccess' => 1]);
        } 
        catch (\Throwable $th) {
            return redirect('/dashboard')->with(['updateSuccess' => -1]);
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/account?type=student');
    }
}
