@extends('Layout.app')
@section('content')

<div id="mainDivContact" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<table id="ContactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Mobile</th>
	  <th class="th-sm">Email</th>
	  <th class="th-sm">Massage</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="contact_table">

  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivContact" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>


<div id="wrongDivContact" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Went Wrong !</h3>
</div>
</div>
</div>



<div class="modal fade" id="contactDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-3">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="contactDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="contactDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>



@endsection


@section('script')
<script type="text/javascript">
	
getContactData();


// For Contact Table
function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivContact').removeClass('d-none');
                $('#loaderDivContact').addClass('d-none');

                $('#ContactDataTable').DataTable().destroy();
                $('#contact_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].contact_name + "</td>" +
                        "<td>" + jsonData[i].contact_mobile + " </td>" +
                        "<td>" + jsonData[i].contact_email + " </td>" +
                        "<td>" + jsonData[i].contact_msg + " </td>" +
                        "<td><a class='contactDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt deleteBtnColor'></i></a></td>"
                    ).appendTo('#contact_table');
                });


                // Contact Table Delete Icon Click
                $('.contactDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#contactDeleteId').html(id);
                    $('#contactDeleteModal').modal('show');
                })


           // Contact Page Table Pagination
              $(document).ready(function() {
              $('#ContactDataTable').DataTable({"order":false});
              $('.dataTables_length').addClass('bs-select');
            });


            } else {

                $('#loaderDivContact').addClass('d-none');
                $('#wrongDivContact').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#loaderDivContact').addClass('d-none');
            $('#wrongDivContact').removeClass('d-none');
        });

}



// Contact Delete Modal Yes Btn
$('#contactDeleteConfirmBtn').click(function() {
    var id = $('#contactDeleteId').html();
    ContactDelete(id);
})



// Contact Delete
function ContactDelete(contactDeleteID) {

    $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation.......

    axios.post('/ContactDelete', {
            id: contactDeleteID
        })
        .then(function(response) {

            if (response.status == 200) {

                $('#contactDeleteConfirmBtn').html("Yes");

                if (response.data == 1) {
                    $('#contactDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    getContactData();
                } else {
                    $('#contactDeleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getContactData();
                }

            } else {
                $('#contactDeleteModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }

        })
        .catch(function(error) {
            $('#contactDeleteModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });
}


</script>
@endsection