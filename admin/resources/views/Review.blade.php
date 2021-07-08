@extends('Layout.app')
@section('content')


<div id="mainDivReview" class="container">
<div class="row">
<div class="col-md-12 p-5">

  <button id="ReviewAddNewBtnID" class="btn btn-sm btn-danger my-3">Add New</button>

<table id="ReviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr class='text-center'>
	    <th class="th-sm ">Image</th>
	    <th class="th-sm">Name</th>
	    <th class="th-sm">Description</th>
	    <th class="th-sm">Edit</th>
	    <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="review_table">


  </tbody>
</table>
</div>
</div>
</div>



<div id="loaderDivReview" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>


<div id="wrongDivReview" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Went Wrong !</h3>
</div>
</div>
</div>



<div class="modal fade" id="ReviewDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="ReviewDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="ReviewDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="reviewEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Review Update Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-5">
        <h5 id="reviewEditId" class="mt-3 mb-3 d-none"></h5>
        <div id="reviewEditForm" class="w-100 d-none">
        <input type="text" id="reviewNameId" class="form-control mb-4" placeholder="Review Name">
         <textarea id="reviewDesId" class="form-control editor mb-5" placeholder="Review Description"></textarea>
         <input type="text" id="reviewImageId" class="form-control mb-4" placeholder="Review Image">
        </div>

        <img id="reviewEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="reviewEditWrong" class="d-none">Something Went Wrong !</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="reviewEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="reviewAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog scroll-sidebar modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title w-100 mx-4" id="myModalLabel">Add New Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-5">
        <div id="reviewAddForm" class="w-100">
        <input type="text" id="reviewNameAddId" class="form-control mb-3" placeholder="Review Name">
        <textarea id="reviewDesAddId" class="form-control editor mb-5" placeholder="Review Description"></textarea>
        <input type="text" id="reviewLinkAddId" class="form-control mt-4 mb-4" placeholder="Review Image">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button id="reviewAddConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('script')

<script type="text/javascript">


getReviewData();





// For Review Table
function getReviewData() {
    axios.get('/getReviewData')
    .then(function(response){

        if(response.status==200){

           $('#mainDivReview').removeClass('d-none');
           $('#loaderDivReview').addClass('d-none');

            $('#ReviewDataTable').DataTable().destroy();
            $('#review_table').empty();

           var jsonData=response.data;
           $.each(jsonData, function(i, item){
            $('<tr>').html(
                 "<td><img class='table-img' src="+ jsonData[i].review_img +"></td>" +
                 "<td>"+ jsonData[i].review_name +"</td>" +
                 "<td>"+ jsonData[i].review_des +"</td>" +
                 "<td><a class='ReviewEditBtn' data-id="+ jsonData[i].id +"><i class='fas fa-edit editBtnColor'></i></a></td>" +
                 "<td><a class='ReviewDeleteBtn' data-id="+ jsonData[i].id +"><i class='fas fa-trash-alt deleteBtnColor'></i></a></td>"
            ).appendTo('#review_table');
        });


         //Review Delete Btn Icon Click
         $('.ReviewDeleteBtn').click(function(){
            var id=$(this).data('id');
            $('#ReviewDeleteId').html(id);
            $('#ReviewDeleteModal').modal('show');
         })

           // Review Edit Btn Incon Click
         $('.ReviewEditBtn').click(function(){
            var id=$(this).data('id');
            $('#reviewEditId').html(id);
            ReviewUpdateDetails(id);
            $('#reviewEditModal').modal('show');
         })

        // Review Page Table Pagination
            $('#ReviewDataTable').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');

    }
    else{
           $('#loaderDivReview').addClass('d-none');
           $('#wrongDivReview').removeClass('d-none');
    }

    })
    .catch(function(error){
        $('#loaderDivReview').addClass('d-none');
        $('#wrongDivReview').removeClass('d-none');
    })
}



//Review Delete Modal Yes Btn Click
$('#ReviewDeleteConfirmBtn').click(function(){
    var id= $('#ReviewDeleteId').html();
    ReviewDelete(id);
})


// Review Delete
function ReviewDelete(reviewDeleteID){

$('#ReviewDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/ReviewDelete',{
        id:reviewDeleteID
    })
    .then(function(response){
        $('#ReviewDeleteConfirmBtn').html('Yes');
        if(response.status==200){
           $('#ReviewDeleteModal').modal('hide');
           toastr.success('Delete Success');
           getReviewData();
        }
        else{
           $('#ReviewDeleteModal').modal('hide');
           toastr.success('Delete Fail');
            getReviewData();
        }
    })
    .catch(function(error){
        $('#ReviewDeleteModal').modal('hide');
        toastr.success('Something Went Wrong !');
    })
}


// Each Review Update Details
function ReviewUpdateDetails(reviewDetailsID){
    axios.post('/getReviewDetails',{
        id: reviewDetailsID
    })
    .then(function(response){
        if(response.status==200){

            $('#reviewEditForm').removeClass('d-none');
            $('#reviewEditLoader').addClass('d-none');

          
            $('#reviewDesId').summernote('destroy')

            var jsonData=response.data;
             $('#reviewNameId').val(jsonData[0].review_name);
             $('#reviewDesId').val(jsonData[0].review_des);
             $('#reviewImageId').val(jsonData[0].review_img);
        }
        else{
            $('#reviewEditLoader').addClass('d-none');
            $('#reviewEditWrong').removeClass('d-none');
        }
    })
    .catch(function(error){
           $('#reviewEditLoader').addClass('d-none');
           $('#reviewEditWrong').removeClass('d-none');
    })
}


//Review Update Confirm save Btn
$('#reviewEditConfirmBtn').click(function(){
    var id=$('#reviewEditId').html();
    var review_name=$('#reviewNameId').val();
    var review_des=$('#reviewDesId').val();
    var review_img=$('#reviewImageId').val();

    ReviewUpdate(id,review_name,review_des,review_img);

})


//Review Update Method
function ReviewUpdate(reviewID, reviewName,reviewDes, reviewImg){

     if(reviewName.length==0){
        toastr.error('Review Name is Empty !');
     }
     else if(reviewDes.length==0){
        toastr.error('Review Description is Empty !');
     }
     else if(reviewImg.length==0){
        toastr.error('Review Image is Empty !');
     }
     else{

       $('#reviewEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......


        axios.post('/ReviewUpdate',{
        id:reviewID,
        review_name:reviewName,
        review_des:reviewDes,
        review_img:reviewImg,
    })
    .then(function(response){

        $('#reviewEditConfirmBtn').html("Save");

        if(response.status==200 && response.data==1){
             $('#reviewEditModal').modal('hide');
             toastr.success('Update Success');
             getReviewData();
        }
        else{
             $('#reviewEditModal').modal('hide');
             toastr.error('Update Fail !');
        }

    })
    .catch(function(error){
           $('#reviewEditModal').modal('hide');
             toastr.error('Something Went Wrong !');
    })
}

}







//Add New Review Btn Click
$('#ReviewAddNewBtnID').click(function(){
    $('#reviewAddModal').modal('show');
});

// Add New Review Save Icon Click
$('#reviewAddConfirmBtn').click(function(){
    var review_name=$('#reviewNameAddId').val();
    var review_des=$('#reviewDesAddId').val();
    var review_img=$('#reviewLinkAddId').val();
    ReviewAdd(review_name,review_des,review_img);
});


//Review Add Method
function ReviewAdd(ReviewName,ReviewDes,ReviewImg){

   if(ReviewImg.lenght==0){
      toastr.error('Review Name is Empty !');
   }
   else if(ReviewDes.lenght==0){
      toastr.error('Review Description is Empty !');
   }
   else if(ReviewImg.lenght==0){
      toastr.error('Review Image is Empty !');
   }

   else{


    $('#reviewAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/ReviewAdd',{
        review_name:ReviewName,
        review_des:ReviewDes,
        review_img:ReviewImg,
    })
    .then(function(response){

        $('#reviewAddConfirmBtn').html("Save");

        if(response.status==200 && response.data==1){
            $('#reviewAddModal').modal('hide');
            toastr.success('Add Success');
            getReviewData();
        }
        else{
            $('#reviewAddModal').modal('hide');
            toastr.error('Add Fail !');
        }

    })
    .catch(function(error){
        $('#reviewAddModal').modal('hide');
        toastr.error('Something Went Wrong !');
    })

   }

}

</script>
@endsection
