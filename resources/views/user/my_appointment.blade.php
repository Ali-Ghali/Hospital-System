
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">


</head>
<body>

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
         <input type="hidden" id="delete_appointment_id"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-warning">Yes Cancel it</button>
      </div>
      </form>
   
    </div>
  </div>
</div>
<!--End Modal Delete -->

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
           
            @if(Route::has('login'))

            @auth
            <li class="nav-item">
              <a class="nav-link" style="background-color:greenyellow; color: white;" href="{{url('myappointment')}}">My Appointment</a>
            </li>

            <x-app-layout>

            </x-app-layout>

            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  <!-- @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
        <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table table-stripped">
                    <thead class=" text-primary">
                   
                      <th>
                      Name
                      </th>
                      <th>
                      Email
                      </th>
                      <th>
                      Phone
                      </th>
                      <th>
                      Doctor
                      </th>
                      <th>
                      Date
                      </th>
                      <th>
                      Message
                      </th>
                      <th>
                      Status
                      </th>
                      <th>
                      Cancel Appointment
                      </th>
                    </thead>
                    <tbody>
                      @foreach($appoint as $myappointment)
                      <tr>
                      <td style="display:none;">
                          {{$myappointment->id}}
                        </td>
                        <td>
                          {{$myappointment->name}}
                        </td>
                        <td>
                        {{$myappointment->email}}
                        </td>
                        <td>
                        {{$myappointment->phone}}
                        </td>
                        <td>
                          
                        {{$myappointment->doctor}}
                         
                        </td>
                        <td>
                          
                          {{$myappointment->date}}
                           
                          </td>
                        <td>
                          
                          {{$myappointment->message}}
                           
                          </td>
                          <td>
                          
                          {{$myappointment->status}}
                           
                          </td>
                        
                        <td>
                        
                        <a href="javascript:void(0)" class="btn btn-danger deletebtn">Cancel</a>
                                    
                        </td>
                     </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
            </div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>


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
    $('#delete_appointment_id').val(data[0]);
    $('#delete_modal_form').attr('action','/cancel_apoint/'+data[0]);

    $('#deletemodalpop').modal('show');
  });
});
</script>

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



