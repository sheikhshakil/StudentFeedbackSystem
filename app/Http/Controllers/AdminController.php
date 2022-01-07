<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //get login page
    public function getLoginPage() {
        return view('adminLogin');
    }

    public function authenticate(Request $request) {
        $admin = DB::selectOne("SELECT * FROM admins WHERE username = ?", [
            "admin"
        ]);
        $username = $request->get("username");
        $password = $request->get("password");

        if($admin) {
            if($username === $admin->username && $password === $admin->password) {
                $request->session()->put('user', ["accType" => "admin"]);
                return redirect("/admin-dashboard");
            }
            else {
                return redirect('/admin')->with(["loginSuccess" => -1]);
            }
        }
        else {
            if($username === "admin" && $password === "admin") {
                $request->session()->put('user', ["accType" => "admin"]);
                return redirect("/admin-dashboard");
            }
            else {
                return redirect('/admin')->with(["loginSuccess" => -1]);
            }
        }
    }

    public function showDashboard(Request $request) {
        $user = $request->session()->get("user");
        $feedbacks = DB::select("SELECT * FROM feedbacks;");

        return view("adminDashboard", compact(["user", "feedbacks"]));
    }

    public function showUsersList(Request $request) {
        $user = $request->session()->get("user");
        if($user["accType"] === "admin") {
            $students = DB::select("SELECT * FROM students;");
            $teachers = DB::select("SELECT * FROM teachers;");

            return view("usersList", compact(["user", "students", "teachers"]));
        }
        else {
            return response("You're not permitted to access this route!");
        }
    }

    public function deleteUser(Request $request) {
        $user = $request->session()->get("user");
        if($user["accType"] === "admin") {
            $type = $request->type;
            $id = $request->id;

            try {
                if($type === "student") {
                    DB::delete("DELETE FROM students WHERE std_id = ?", [$id]);
                    return redirect("/usersList#sdata");
                }
                else if($type === "teacher") {
                    DB::delete("DELETE FROM teachers WHERE t_id = ?", [$id]);
                    return redirect("/usersList#tdata");
                }
            } catch (\Throwable $th) {
                return response("Delete operation failed!", 500);
            }
        }
        else {
            return response("You are not allowed to perform this task!", 400);
        }
    }

    public function deleteData(Request $request) {
        $user = $request->session()->get("user");

        if($user["accType"] === "admin") {
            $id = $request->id;

            try {
                DB::delete("DELETE FROM feedbacks WHERE f_id = ?", [$id]);
                return redirect("/admin-dashboard#fdata");
            } catch (\Throwable $th) {
                return response("Delete operation failed!", 500);
            }
        }
        else {
            return response("You are not allowed to perform this task!", 400);
        }
    }

    public function changeAdminPass(Request $request) {
        $user = $request->session()->get("user");

        if($user["accType"] == "admin") {
            $oldPass = $request->get("oldPass");
            $newPass = $request->get("newPass");

            $admin = DB::selectOne("SELECT * FROM admins WHERE username = ?", ["admin"]);
            if($admin) {
                //update
                if($oldPass === $admin->password) {
                    DB::update("UPDATE admins SET password = ? WHERE username = ?", [
                        $newPass,
                        "admin"
                    ]);
                    return redirect('/admin-dashboard')->with(['changeSuccess' => 1]);
                }
                else {
                    return redirect('/admin-dashboard')->with(['changeSuccess' => -1]);
                }
            }
            else {
                //insert
                if($oldPass === "admin") {
                    DB::insert("INSERT INTO admins VALUES(?, ?)", ["admin", $newPass]);
                    return redirect('/admin-dashboard')->with(['changeSuccess' => 1]);
                }
                else {
                    return redirect('/admin-dashboard')->with(['changeSuccess' => -1]);
                }
            }
        }
        else {
            return response("You are not allowed to perform this task!", 400);
        }
    }
}

