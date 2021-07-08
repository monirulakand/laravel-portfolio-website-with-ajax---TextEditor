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

        $TotalVisitor=VisitorModel::count();
        $TotalService=ServicesModel::count();
        $TotalCourse=CourseModel::count();
        $TotalProject=ProjectModel::count();
        $TotalContact=ContactModel::count();
        $TotalReview=ReviewModel::count();

        return view('Home',[
              'TotalVisitor'=>$TotalVisitor,
              'TotalService'=>$TotalService,
              'TotalCourse'=>$TotalCourse,
              'TotalProject'=>$TotalProject,
              'TotalContact'=>$TotalContact,
              'TotalReview'=>$TotalReview
        ]);
    }
}
