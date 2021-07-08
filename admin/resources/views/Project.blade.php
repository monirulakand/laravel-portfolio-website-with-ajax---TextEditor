@extends('Layout.app')
@section('content')

<div id="mainDivProject" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

 <button id="projectAddNewBtnId" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr> 
	    <th class="th-sm">Name</th>
	    <th class="th-sm">Description</th>
	    <th class="th-sm">Link</th>
	    <th class="th-sm">Edit</th>
	    <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="project_table">
 
	
  </tbody>
</table>
</div>
</div>
</div>



<div id="loaderDivProject" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>


<div id="wrongDivProject" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Went Wrong !</h3>
</div>
</div>
</div>




<div class="modal fade" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="projectDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="projectDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="projectEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Project Update Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center p-5">
        <h5 id="projectEditId" class="mt-3 mb-3 d-none"></h5>
        <div id="projectEditForm" class="w-100 d-none">
        <input type="text" id="projectNameId" class="form-control mb-4" placeholder="Project Name">
        <input type="text" id="projectDesId" class="form-control mb-4" placeholder="Project Description">
        <input type="text" id="projectLinkId" class="form-control mb-4" placeholder="Project Link">
        <input type="text" id="projectImageId" class="form-control mb-4" placeholder="Project Image">
        </div>

        <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="projectEditWrong" class="d-none">Something Went Wrong !</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="projectEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="projectAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center p-5">
        <div id="projectAddForm" class="w-100">
        <input type="text" id="projectNameAddId" class="form-control mb-4" placeholder="Project Name">
        <input type="text" id="projectDesAddId" class="form-control mb-4" placeholder="Project Description">
        <input type="text" id="projectLinkAddId" class="form-control mb-4" placeholder="Project Link">
        <input type="text" id="projectImageAddId" class="form-control mb-4" placeholder="Project Image">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="projectAddConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection


@section('script')
<script type="text/javascript">
	
getProjectData();


//For Projects Table

function getProjectData(){
  
  axios.get('/getProjectsData')
  .then(function(response){
      
      if(response.status==200){

      	$('#mainDivProject').removeClass('d-none');
      	$('#loaderDivProject').addClass('d-none');

      	$('#projectDataTable').DataTable().destroy();
      	$('#project_table').empty();

        var jsonData=response.data;
        $.each(jsonData, function(i, item){
      	   $('<tr>').html(

      		"<td>"+ jsonData[i].project_name +"</td>" +
      		"<td>"+ jsonData[i].project_des +"</td>" +
      		"<td>"+ jsonData[i].project_link +"</td>" +
      		"<td><a class='projectEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit editBtnColor'></i></a></td>" +
            "<td><a class='projectDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt deleteBtnColor'></i></a></td>"

      		).appendTo('#project_table');
        });


        // Project Delete Btn Incon Click
         $('.projectDeleteBtn').click(function(){
         	var id=$(this).data('id');
            $('#projectDeleteId').html(id);
         	$('#projectDeleteModal').modal('show');
         })


         // Project Edit Btn Incon Click
         $('.projectEditBtn').click(function(){
         	var id=$(this).data('id');
            $('#projectEditId').html(id);
            ProjectUpdateDetails(id);
         	$('#projectEditModal').modal('show');
         })


         // Project Page Table Pagination
              $(document).ready(function() {
              $('#projectDataTable').DataTable({"order":false});
              $('.dataTables_length').addClass('bs-select');
            });

      }
      else{
           $('#loaderDivProject').addClass('d-none');
      	   $('#wrongDivProject').removeClass('d-none');
      } 

  })
  .catch(function(error){
        $('#loaderDivProject').addClass('d-none');
      	$('#wrongDivProject').removeClass('d-none');
  })
} 


// Project Delete Yes Btn

$('#projectDeleteConfirmBtn').click(function(){
	var id= $('#projectDeleteId').html();
	ProjectDelete(id);
})



//Project Delete
function ProjectDelete(projectDeleteId){

  $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

	axios.post('/ProjectsDelete',{
		id : projectDeleteId
	})
	.then(function(response){

		$('#projectDeleteConfirmBtn').html("Yes");

		if(response.status==200){
			$('#projectDeleteModal').modal('hide');
			toastr.success('Delete Success');
			getProjectData();

		}
		else{
			$('#projectDeleteModal').modal('hide');
			toastr.error('Delete Fail');
			getProjectData();
		}

	})
	.catch(function(error){
		$('#projectDeleteModal').modal('hide');
		toastr.error('Something Went Wrong !');
	})
}



// Each Project Update Details 
function ProjectUpdateDetails(projectDetailsID){
	axios.post('/ProjectsDetails',{
		id: projectDetailsID
	})
	.then(function(response){
		if(response.status==200){

			$('#projectEditForm').removeClass('d-none');
			$('#projectEditLoader').addClass('d-none');


			    var jsonData=response.data;
             $('#projectNameId').val(jsonData[0].project_name);
             $('#projectDesId').val(jsonData[0].project_des);
             $('#projectLinkId').val(jsonData[0].project_link);
             $('#projectImageId').val(jsonData[0].project_image);
		}
		else{
			$('#projectEditLoader').addClass('d-none');
			$('#projectEditWrong').removeClass('d-none');
		}
	})
	.catch(function(error){
		   $('#projectEditLoader').addClass('d-none');
		   $('#projectEditWrong').removeClass('d-none');
	})
} 


// Project Update Confirm Save Btn Click

$('#projectEditConfirmBtn').click(function(){
	var id=$('#projectEditId').html();
	var project_name=$('#projectNameId').val();
	var project_des=$('#projectDesId').val();
	var project_link=$('#projectLinkId').val();
	var project_image=$('#projectImageId').val();

    ProjectUpdate(id,project_name,project_des,project_link,project_image);
});



// Project Update
function ProjectUpdate(projectID,projectName,projectDes,projectLink,projectImage){

    if(projectName.length==0){
    	toastr.error('Project Name is Empty !');
    }
    else if(projectDes.length==0){
    	toastr.error('Project Description is Empty !');
    }
    else if(projectLink.length==0){
    	toastr.error('Project Link is Empty !');
    }
    else if(projectImage.length==0){
    	toastr.error('Project Image is Empty !');
    }
    else{

    $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/ProjectsUpdate',{
        id: projectID,
        project_name: projectName,
        project_des: projectDes,
        project_link: projectLink,
        project_image: projectImage,
    })
    .then(function(response){

    	$('#projectEditConfirmBtn').html('Save');

         if(response.status==200){
            if(response.data==1){
                $('#projectEditModal').modal('hide');
                 toastr.success('Update Success');
                 getProjectData();
            }
            else{
                $('#projectEditModal').modal('hide');
                 toastr.error('Update Fail');
                 getProjectData();
            }
         }
         else{
                $('#projectEditModal').modal('hide');
                 toastr.error('Something Went Wrong !');
         }

    })
    .catch(function(error){
                $('#projectEditModal').modal('hide');
                 toastr.error('Something Went Wrong !');
    })
  }  
   
}



// Project Add New Btn Click

$('#projectAddNewBtnId').click(function(){
	$('#projectAddModal').modal('show');
});
	
// Add New Project Save Confirmation Btn
$('#projectAddConfirmBtn').click(function(){
      var project_name=$('#projectNameAddId').val();
      var project_des=$('#projectDesAddId').val();
      var project_link=$('#projectLinkAddId').val();
      var project_image=$('#projectImageAddId').val();

 ProjectAdd(project_name,project_des,project_link,project_image);

})



// Project Add Method

function ProjectAdd(projectName,projectDes,projectLink,projectImage){

    if(projectName.length==0){
    	toastr.error('Project Name is Empty !');
    }
    else if(projectDes.length==0){
    	toastr.error('Project Description is Empty !');
    }
    else if(projectLink.length==0){
    	toastr.error('Project Link is Empty !');
    }
    else if(projectImage.length==0){
    	toastr.error('Project Image is Empty !');
    }
    else{

        $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

        axios.post('/ProjectsAdd',{
        project_name:projectName,
        project_des:projectDes,
        project_link:projectLink,
        project_image:projectImage
	})
	.then(function(response){

		$('#projectAddConfirmBtn').html('Save')

		if(response.status==200){
            if(response.data==1){
               $('#projectAddModal').modal('hide');
               toastr.success('Add Success');
               getProjectData();
            }
            else{
               $('#projectAddModal').modal('hide');
               toastr.error('Add Fail');
               getProjectData();
            }
		}
		else{
              $('#projectAddModal').modal('hide');
              toastr.error('Something Went Wrong !');
		}

	})
	.catch(function(error){
           $('#projectAddModal').modal('hide');
           toastr.error('Something Went Wrong !');
	})
    }
	
}







</script>
@endsection