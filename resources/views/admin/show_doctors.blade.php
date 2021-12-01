
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.min.css')}}"/>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
 
        <!-- Modal Delete -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Comfirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="delete_modal_form" method="POST">     
      {{csrf_field()}}
      {{method_field('DELETE')}}         
      <div class="modal-body">
        <p class="text-center">
          Are you sure you want to cancel this?
        </p>
         <input type="hidden" id="delete_doctor_id"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-warning">Yes Delete it</button>
      </div>
      </form>
   
    </div>
  </div>
</div>
<!--End Modal Delete -->
 

            <div class="card-body">
            <div class="table-responsive">
            
              <table id="datatable" class="table table-stripped" style="color:white;">
                <thead class=" text-primary" >
               
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Name
                  </th>
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Phone
                  </th>
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Sepciality
                  </th>
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Room No
                  </th >
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Image
                  </th>
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Update
                  </th >
                  <th style="background-color:white; font-weight:bold; font-size:large;">
                  Delete
                  </th>
                 
                </thead>
                <tbody>
                  @foreach($data as $mydoctors)
                  <tr>
                  <td style="display:none;">
                      {{$mydoctors->id}}
                    </td>
                    <td>
                      {{$mydoctors->name}}
                    </td>
                    <td>
                    {{$mydoctors->phone}}
                    </td>
                    <td>
                    {{$mydoctors->sepciality}}
                    </td>
                    <td>
                      
                    {{$mydoctors->room}}
                     
                    </td>
                    <td><img src="doctorimage/{{$mydoctors->image}}"></td>
                   
                      <td>
                         <a href="{{url('doctorupdate',$mydoctors->id)}}" class="btn btn-success">Update</a>
                    </td>
                    
                    <td>
                    
                    <a href="javascript:void(0)" class="btn btn-danger deletebtn">Delete</a>
                                
                    </td>
                 </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
        </div>
</div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    
    <script src="{{asset('assets/js/sweetalert.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.min.js')}}"></script>


<script>
$(document).ready(function()
{
 // $('#datatable').DataTable();
  $('#datatable').on('click','.deletebtn',function()
  {
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function()
    {
      return $(this).text();
    }).get();
    $('#delete_doctor_id').val(data[0]);
    $('#delete_modal_form').attr('action','/delete_doctor/'+data[0]);

    $('#deletemodalpop').modal('show');
  });
});
</script>
<!-- <script>
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
  </script> -->
<script>
         @if(session('status'))
          
          swal({
  title: '{{session('status')}}',
  icon: '{{session('statuscode')}}',
  button: "OK",
});
         @endif
  </script>


  </body>
</html>
