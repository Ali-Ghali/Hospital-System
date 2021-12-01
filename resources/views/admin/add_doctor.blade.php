
<!DOCTYPE html>
<html lang="en">
  <head>
      <style type="text/css">
      label
      {
          display:inline-block;
          width: 200px;
      }

      </style>
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

     
            <div class="container" align="center" style="padding-top:100px;">

            @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
            {{session()->get('message')}}

        </div>
        @endif
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div style="padding:15px;">
                    <label for="">Doctor Name</label>
                    <input type="text" name="name" style="color:black" placeholder="Write The Name" required="">
                    </div>

                    <div style="padding:15px;">
                    <label for="">Phone</label>
                    <input type="number" name="number" style="color:black" placeholder="Write The Number" required="">
                    </div>

                    <div style="padding:15px;">
                    <label for="">Sepciality</label>
                    <select name="sepciality" id="" style="color:black; width:200px;">
                        <option >--Select--</option>
                        <option value="skin">skin</option>
                        <option value="heart">heart</option>
                        <option value="eyes">eyes</option>
                        <option value="nose">nose</option>
                    </select>
                    </div>

                    <div style="padding:15px;">
                    <label for="">Room Number</label>
                    <input type="text" name="room" style="color:black" placeholder="Write The Room Number" required="">
                    </div>

                    <div style="padding:15px;">
                    <label for="">Doctor Image</label>
                    <input type="file" name="file" required="">
                    </div>

                    <div style="padding:15px;">
                    
                    <input type="submit" class="btn btn-success">
                    </div>





                </form>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script src="{{asset('assets/js/sweetalert.js')}}"></script>
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
 h