<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CourseModel;
use App\ProjectModel;
use App\ContactModel;
use App\ReviewModel;

class HomeController extends Controller
{
    function HomeIndex(){

        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);

        $ServicesData=json_decode(ServicesModel::orderBy('id','desc')->limit(4)->get());

        $CoursesData=json_decode(CourseModel::orderBy('id','desc')->limit(6)->get());

        $ProjectData=json_decode(ProjectModel::orderBy('id','desc')->limit(8)->get());

        $ReviewData=json_decode(ReviewModel::orderBy('id','desc')->limit(8)->get());

        return view('Home',[
            'ServicesData'=>$ServicesData,
            'CoursesData'=>$CoursesData,
            'ProjectData'=>$ProjectData,
            'ReviewData'=>$ReviewData,
        ]);
    }


    function ContactSend(Request $req){
        $contact_name=$req->input('contact_name');
        $contact_mobile=$req->input('contact_mobile');
        $contact_email=$req->input('contact_email');
        $contact_msg=$req->input('contact_msg');

        $result=ContactModel::insert([
             'contact_name'=>$contact_name,
             'contact_mobile'=>$contact_mobile,
             'contact_email'=>$contact_email,
             'contact_msg'=>$contact_msg
        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }



}
