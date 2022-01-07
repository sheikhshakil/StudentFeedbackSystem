<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupDatabase extends Controller
{
    //page load howar time ei student r teacher table gula create hobe jodi exist na kore
    public static function setupStudentTable() {
        $query = "CREATE TABLE IF NOT EXISTS students (accType VARCHAR(10) NOT NULL, std_id VARCHAR(10) PRIMARY KEY NOT NULL, fullName VARCHAR(255) NOT NULL, dept VARCHAR(10) NOT NULL, semester INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(30) NOT NULL, regDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP);";

        try {
            DB::statement($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    
    public static function setupTeacherTable() {
        $query = "CREATE TABLE IF NOT EXISTS teachers (accType VARCHAR(10) NOT NULL, t_id VARCHAR(10) PRIMARY KEY NOT NULL, fullName VARCHAR(255) NOT NULL, dept VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(30) NOT NULL, regDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP);";

        try {
            DB::statement($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function setupFeedbackTable() {
        $query = "CREATE TABLE IF NOT EXISTS feedbacks (f_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, t_id VARCHAR(10) NOT NULL, std_id VARCHAR(10) NOT NULL, q1 INT NOT NULL, q2 INT NOT NULL, q3 INT NOT NULL, q4 INT NOT NULL, q5 INT NOT NULL, q6 INT NOT NULL, submissionDate DATETIME DEFAULT CURRENT_TIMESTAMP);";

        try {
            DB::statement($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function setupAdminTable() {
        $query = "CREATE TABLE IF NOT EXISTS admins (username VARCHAR(10) PRIMARY KEY NOT NULL, password VARCHAR(15) NOT NULL);";

        try {
            DB::statement($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
