<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HamzeController extends Controller{

    public function sayBye(){
        $message = "From DB";

        return response()->json([
            "status" => "Success",
            "message" => $message
        ], 200);
    }

    // Count palindrome
    public function countPalindromes(){
        $my_array = ["hello", "aba", "abaaba", "apple"];
        $count = 0;
        for ($i=0; $i<count($my_array); $i++){
            //echo $my_array[$i];
            if ($my_array[$i] == strrev($my_array[$i])){
                $count++;
            }
        }
        echo  $count ;

    }

    // Count seconds since 14 April 1732
    public function countSeconds(){
        $today  = date("Y-m-d h:i:sa");
        $d      = mktime(0, 0, 0, 4, 14, 1732);
        $since  = date("Y-m-d h:i:sa", $d);

        //$diff = $today - $since;
        //echo  $diff ;
        echo(strtotime($today)-strtotime($since));

    }

    // group students by two
    public function groudStudents(){
        $students = array("jad", "ahmad", "joe", "ali", "reem", "farah", "lara", "moe");
        $output = array();

        for ($i=0; $i<count($students); $i+=2){
            
            $res = array($students[$i], $students[$i+1]);
            array_push($output, $res);
        }
        print_r($output) ;
        print_r(count($output));
    }
}

