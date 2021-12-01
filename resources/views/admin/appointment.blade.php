
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
    
        <div class="card-body" >
                <div class="table-responsive" style="width:1000px;overflow:auto;scrollbar-base-color:gold;padding:10px;">
                
                  <table id="datatable" class="table table-stripped" style="color:white;">
                    <thead class=" text-primary" >
                   
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Name
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Email
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Phone
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Doctor
                      </th >
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Date
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Message
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Status
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Approved
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Canceled
                      </th>
                      <th style="background-color:white; font-weight:bold; font-size:large;">
                      Send Email
                      </th>
                    </thead>
                    <tbody>
                      @foreach($data as $myappointment)
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
  
                          {{nl2br($myappointment->message)}}
                           
                          </td>
                          <td>
                          
                          {{$myappointment->status}}
                           
                          </td>
                          <td>
                        <a href="{{url('approved',$myappointment->id)}}" class="btn btn-success">Approved</a>
                        </td>
                        
                        <td>
                        
                        <a href="{{url('canceled',$myappointment->id)}}" class="btn btn-danger deletebtn">Cancel</a>
                                    
                        </td>
                        <td>
                        
                        <a href="{{url('emailview',$myappointment->id)}}" class="btn btn-primary deletebtn">Send Email</a>
                                    
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

  </body>
</html>
