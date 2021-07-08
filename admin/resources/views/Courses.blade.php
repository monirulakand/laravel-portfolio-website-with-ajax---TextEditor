@extends('Layout.app')

@section('content')

<div id="mainDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="courseAddNewBtnID" class="btn btn-sm btn-danger mb-3">Add New</button>

<table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enroll</th>
	  <th class="th-sm">Details</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="course_table">

	
  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivCourse" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>


<div id="wrongDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Went Wrong !</h3>
</div>
</div>
</div>


<div class="modal fade" id="courseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="courseDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="courseDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="courseEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
     
     <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Course Update Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center p-4">
        <h5 id="courseEditId" class="mt-3 mb-3 d-none"></h5>
        <div id="courseEditForm" class="container d-none w-100">
        <div class="row">
          <div class="col-md-6">
              <input type="text" id="courseNameId" class="form-control mb-4" placeholder="Course Name">
              <input type="text" id="courseDesId" class="form-control mb-4" placeholder="Course Description">
              <input type="text" id="courseFeeId" class="form-control mb-4" placeholder="Course Fee">
              <input type="text" id="courseEnrollId" class="form-control mb-4" placeholder="Course Totall Enroll">
          </div>
          <div class="col-md-6">
              <input type="text" id="courseClassId" class="form-control mb-4" placeholder="Course Total Class">
              <input type="text" id="courseLinkId" class="form-control mb-4" placeholder="Course Link">
              <input type="text" id="courseImgId" class="form-control mb-4" placeholder="Course Image">
          </div>
        </div>
        </div>
   
        <img id="courseEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="courseEditWrong" class="d-none">Something Went Wrong !</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="courseEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="courseAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center p-4">
        <div id="courseAddForm" class="container w-100">

        <div class="row mt-2">
          <div class="col-md-6">
              <input type="text" id="courseNameAddId" class="form-control mb-4" placeholder="Course Name">
              <input type="text" id="courseDesAddId" class="form-control mb-4" placeholder="Course Description">
              <input type="text" id="courseFeeAddId" class="form-control mb-4" placeholder="Course Fee">
              <input type="text" id="courseEnrollAddId" class="form-control mb-4" placeholder="Course Totall Enroll">
          </div>
          <div class="col-md-6">
              <input type="text" id="courseClassAddId" class="form-control mb-4" placeholder="Course Total Class">
              <input type="text" id="courseLinkAddId" class="form-control mb-4" placeholder="Course Link">
              <input type="text" id="courseImgAddId" class="form-control mb-4" placeholder="Course Image">
          </div>
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="courseAddConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('script')
<script type="text/javascript">

  getCoursesData();

// For Courses Table
function getCoursesData() {
    axios.get('/getCoursesData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');

                $('#courseDataTable').DataTable().destroy();
                $('#course_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].course_name + "</td>" +
                        "<td>" + jsonData[i].course_fee + " </td>" +
                        "<td>" + jsonData[i].course_totalclass + " </td>" +
                        "<td>" + jsonData[i].course_totalenroll + " </td>" +
                        "<td><a  class='courseViewDetailsBtn' data-id=" + jsonData[i].id + "><i class='fas fa-eye'></i></a></td>" +
                        "<td><a class='courseEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit editBtnColor'></i></a></td>" +
                        "<td><a class='courseDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt deleteBtnColor'></i></a></td>"
                    ).appendTo('#course_table');
                });


                // Course Table Delete Icon Click
                $('.courseDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#courseDeleteId').html(id);
                    $('#courseDeleteModal').modal('show');
                })



                // Course Table Edit Icon Click
                $('.courseEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#courseEditId').html(id);
                    CourseUpdateDetails(id);
                    $('#courseEditModal').modal('show');
                })



           // Course Page Table Pagination
              $(document).ready(function() {
              $('#courseDataTable').DataTable({"order":false});
              $('.dataTables_length').addClass('bs-select');
            });



            } else {

                $('#loaderDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#loaderDivCourse').addClass('d-none');
            $('#wrongDivCourse').removeClass('d-none');
        });

}



// Course Delete Modal Yes Btn
$('#courseDeleteConfirmBtn').click(function() {
    var id = $('#courseDeleteId').html();
    CourseDelete(id);
})



// Course Delete
function CourseDelete(courseDeleteID) {

    $('#courseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/CoursesDelete', {
            id: courseDeleteID
        })
        .then(function(response) {

            if (response.status == 200) {

                $('#courseDeleteConfirmBtn').html("Yes");

                if (response.data == 1) {
                    $('#courseDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    getCoursesData();
                } else {
                    $('#courseDeleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getCoursesData();
                }

            } else {
                $('#courseDeleteModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }

        })
        .catch(function(error) {
            $('#courseDeleteModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });
}



//Each Course Update Details
function CourseUpdateDetails(courseDetailsId) {
    axios.post('/CoursesDetails', {
            id: courseDetailsId
        })
        .then(function(response) {
        
           if(response.status==200){
            $('#courseEditLoader').addClass('d-none');
             $('#courseEditForm').removeClass('d-none');

             var jsonData = response.data;

             $('#courseNameId').val(jsonData[0].course_name);
             $('#courseDesId').val(jsonData[0].course_des);
             $('#courseFeeId').val(jsonData[0].course_fee);
             $('#courseEnrollId').val(jsonData[0].course_totalenroll);
             $('#courseClassId').val(jsonData[0].course_totalclass);
             $('#courseLinkId').val(jsonData[0].course_link);
             $('#courseImgId').val(jsonData[0].course_img);
           }
           else{
             $('#courseEditLoader').addClass('d-none');
             $('#courseEditWrong').removeClass('d-none');
           }

        })
        .catch(function(error) {
             $('#courseEditLoader').addClass('d-none');
             $('#courseEditWrong').removeClass('d-none');
      });
}



// Course Edit Modal Save Btn

$('#courseEditConfirmBtn').click(function(){
    var id = $('#courseEditId').html();
    var course_name = $('#courseNameId').val();
    var course_des = $('#courseDesId').val();
    var course_fee = $('#courseFeeId').val();
    var course_totalenroll = $('#courseEnrollId').val();
    var course_totalclass = $('#courseClassId').val();
    var course_link = $('#courseLinkId').val();
    var course_img = $('#courseImgId').val();

    CourseUpdate(id,course_name,course_des,course_fee,course_totalenroll,course_totalclass,course_link,course_img);
})




// Course Update
function CourseUpdate(courseID,courseName,courseDes,courseFee,courseEnroll,courseClass,courseLink,courseImg){

    if(courseName.length==0){
        toastr.error('Course Name is Empty !');
    }
    else if(courseDes.length==0){
        toastr.error('Course Description is Empty !');
    }
    else if(courseFee.length==0){
        toastr.error('Course Fee is Empty !');
    }
    else if(courseEnroll.length==0){
        toastr.error('Course Enroll is Empty !');
    }
    else if(courseClass.length==0){
        toastr.error('Course Class is Empty !');
    }
    else if(courseLink.length==0){
        toastr.error('Course Link is Empty !');
    }
    else if(courseImg.length==0){
        toastr.error('Course Image is Empty !');
    }

    else{

     $('#courseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/CoursesUpdate',{
        id: courseID,
        course_name: courseName,
        course_des: courseDes,
        course_fee: courseFee,
        course_totalenroll: courseEnroll,
        course_totalclass: courseClass,
        course_link: courseLink,
        course_img: courseImg,
    })
    .then(function(response){

         $('#courseEditConfirmBtn').html('save');

         if(response.status==200){
            if(response.data==1){
                $('#courseEditModal').modal('hide');
                 toastr.success('Update Success');
                 getCoursesData();
            }
            else{
                $('#courseEditModal').modal('hide');
                 toastr.error('Update Fail');
                 getCoursesData();
            }
         }
         else{
                $('#courseEditModal').modal('hide');
                 toastr.error('Something Went Wrong !');
         }

    })
    .catch(function(error){
                $('#courseEditModal').modal('hide');
                 toastr.error('Something Went Wrong !');
    })

    }
   
}



// Course Add New Btn Click
$('#courseAddNewBtnID').click(function(){

    $('#courseAddModal').modal('show');
})


// Course Add New Confirm Btn / save Btn

$('#courseAddConfirmBtn').click(function(){
    var course_name = $('#courseNameAddId').val();
    var course_des = $('#courseDesAddId').val();
    var course_fee = $('#courseFeeAddId').val();
    var course_totalenroll = $('#courseEnrollAddId').val();
    var course_totalclass = $('#courseClassAddId').val();
    var course_link = $('#courseLinkAddId').val();
    var course_img = $('#courseImgAddId').val();

    CourseAdd(course_name,course_des,course_fee,course_totalenroll,course_totalclass,course_link,course_img);
})


// Course Add Method
function CourseAdd(courseName,courseDes,courseFee,courseEnroll,courseClass,courseLink,courseImg){

     if(courseName.length==0){
        toastr.error('Course Name is Empty !');
    }
    else if(courseDes.length==0){
        toastr.error('Course Description is Empty !');
    }
    else if(courseFee.length==0){
        toastr.error('Course Fee is Empty !');
    }
    else if(courseEnroll.length==0){
        toastr.error('Course Enroll is Empty !');
    }
    else if(courseClass.length==0){
        toastr.error('Course Class is Empty !');
    }
    else if(courseLink.length==0){
        toastr.error('Course Link is Empty !');
    }
    else if(courseImg.length==0){
        toastr.error('Course Image is Empty !');
    }
     else{

    $('#courseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/CoursesAdd',{
        course_name: courseName,
        course_des: courseDes,
        course_fee: courseFee,
        course_totalenroll: courseEnroll,
        course_totalclass: courseClass,
        course_link: courseLink,
        course_img: courseImg,
    })
    .then(function(response){

        $('#courseAddConfirmBtn').html('Save');

        if(response.status==200){

            if(response.data==1){
                $('#courseAddModal').modal('hide');
                toastr.success('Add Success');
                getCoursesData();
            }
            else{
                $('#courseAddModal').modal('hide');
                toastr.error('Add Fail');
                getCoursesData();
            }
        }
        else{
                $('#courseAddModal').modal('hide');
                toastr.error('Something Went Wrong !');
        }  

    })
    .catch(function(error){
            $('#courseAddModal').modal('hide');
            toastr.error('Something Went Wrong !');
    })

   }
    
}

</script>
@endsection