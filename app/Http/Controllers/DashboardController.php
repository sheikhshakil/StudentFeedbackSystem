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
            $isReady = $this->setupFeedbackTable();

            if($isReady) {
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
                return response("Feedback table setup failed!", 500);
            }
        }
        else {
            return response("Bad request error!", 400);
        }
    }

    public function setupFeedbackTable() {
        $query = "CREATE TABLE IF NOT EXISTS feedbacks (f_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, t_id VARCHAR(10) NOT NULL, std_id VARCHAR(10) NOT NULL, q1 INT NOT NULL, q2 INT NOT NULL, q3 INT NOT NULL, q4 INT NOT NULL, q5 INT NOT NULL, q6 INT NOT NULL, submissionDate DATETIME DEFAULT CURRENT_TIMESTAMP);";

        try {
            DB::statement($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/account?type=student');
    }
}
