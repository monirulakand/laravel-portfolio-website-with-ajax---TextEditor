<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
   function ProjectsIndex(){
   	return view('Project');
   }


   function getProjectsData(){
   	$result=json_encode(ProjectModel::orderBy('id','desc')->get());
   	return $result;
   }


   function getProjectsDetails(Request $req){
   	$id=$req->input('id');
   	$result=json_encode(ProjectModel::where('id','=',$id)->get());
   	return $result;
   }


   function ProjectsDelete(Request $req){
   	$id=$req->input('id');
   	$result=ProjectModel::where('id','=',$id)->delete();
   	if($result==true){
       return 1;
   	}
   	else{
       return 0;
   	}
   }



   function ProjectsUpdate(Request $req){
   	$id=$req->input('id');
   	$project_name=$req->input('project_name');
   	$project_des=$req->input('project_des');
   	$project_link =$req->input('project_link');
   	$project_image=$req->input('project_image');


   	$result=ProjectModel::where('id','=',$id)->update([
   		'project_name'=>$project_name,
   		'project_des'=>$project_des,
   		'project_link'=>$project_link,
   		'project_image'=>$project_image
   	]);

   if($result==true){
        return 1;
      }
     else{
        return 0;
     }
   }



   function ProjectsAdd(Request $req){

   	$project_name=$req->input('project_name');
   	$project_des=$req->input('project_des');
   	$project_link=$req->input('project_link');
   	$project_image=$req->input('project_image');


   	$result=ProjectModel::insert([
        'project_name'=>$project_name,
        'project_des'=>$project_des,
        'project_link'=>$project_link,
        'project_image'=>$project_image
   	]);


   	if($result==true){
   		return 1;
   	}
   	else{
   		return 0;
   	}
   }


}
