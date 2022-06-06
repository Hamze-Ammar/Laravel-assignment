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
        $students = array("jad", "ahmad", "joe", "ali", "reem", "farah", "lara", "moe", "Georges");
        $output = array();

        for ($i=0; $i<count($students); $i+=2){
            
            if ($i==count($students)-1 && ( count($students)%2==1) ){
                $res = array($students[$i] );
                array_push($output, $res);
                break;      
            }

            $res = array($students[$i], $students[$i+1]);
            array_push($output, $res);
        }
        print_r($output) ;
        print_r(count($output));
    }

    // API that takes an array of students and chooses one random nominee
    public function nominee(){
        $students = array("jad", "ahmad", "joe", "ali", "reem", "farah", "lara", "moe", "Georges");
        $num = rand(0, count($students)-1);
        echo "nominee is: ", $students[$num];
    }

    // API that calls this API and outputs only the "text" field from the response
    public function fetchTextApi(){
        $curl = curl_init();
        $url="https://icanhazdadjoke.com/slack";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
        $json = curl_exec($curl);
        if(!$json) {
            echo curl_error($curl);
        }
        curl_close($curl);
        $jsonArray = json_decode($json,true);
        $key = "attachments";
        $inner_arr = $jsonArray[$key];
        $first_element=reset($inner_arr);
        $string=json_encode($first_element,true);
        $array=json_decode($string,true);
        $key2 = "text";
        $result = $array[$key2];
        return $result;
    }

    // API that returns a random beer recipe from the returned list of this API
    public function getBeerRecipe(){
        //echo "getBeerRecipe";
        $curl = curl_init();
        $url="https://api.punkapi.com/v2/beers";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
        $json = curl_exec($curl);
        if(!$json) {
            echo curl_error($curl);
        }
        curl_close($curl);
        $jsonArray = json_decode($json,true);

        echo $jsonArray[0]["ingredients"];
    }

}

