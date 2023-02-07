<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity=
"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="{{asset('js/addresses.js') }}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
@if (session('success'))
    <div id="flash-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 1000);
    </script>
@endif

<div class="pull-right p-05 col-xl-2 col-xs-12 col-md-3">
  <div class="input-group p-0">
    <button class="btn btn-primary addAddressForm">ADD</button>
  </div>
</div>
<div class="container">
  <h2>Address Details</h2>       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Contact Mobile</th>
        <th>Contact Phone</th>
        <th>Email Address</th>
        <th>Street</th>
        <th>City</th>
        <th>Hobbies</th>
        <th>Acton</th>
      </tr>
    </thead>
    <tbody id="addressListId">
      @if($addressList!=null)
        @if(count($addressList) ==0)
          <tr>
            <td class="text-xs-center" colspan="9">
                NO Record Found
            </td>
          </tr>
        @else
          @foreach($addressList as $address)
            <tr>
              <input type="hidden" name="employeeCheckRows" id="employeeCheckRows" value="{{$address['id']}}">
              <td>{{$address['id']}}</td>
              <td>{{$address['first_name']}}</td>
              <td>{{$address['last_name']}}</td>
              <td>{{$address['date_of_birth']}}</td>
              <td>{{$address['gender']}}</td>
              <td>{{$address['contact_mobile']}}</td>
              <td>{{$address['contact_phone']}}</td>
              <td>{{$address['email_address']}}</td>
              <td>{{$address['street']}}</td>
              <td>{{$address['city']}}</td>
              <td>{{$address['hobbies']}}</td>
              <td><button class="btn btn-danger delete" addressId="{{$address['id']}}" first_name="{{$address['first_name']}}" last_name="{{$address['last_name']}}">Delete</button>
              <button class="btn btn-primary edit" addressId="{{$address['id']}}" first_name="{{$address['first_name']}}" last_name="{{$address['last_name']}}">EDIT</button></td>
            </tr>
          @endforeach
        @endif
      @endif
    </tbody>
  </table>
</div>
<form metod="post" action="" id="addressListForm">
  <input type="hidden" name="addressId" id="addressId" value="">
</form>
<!-- Confirm alert modal -->
      <div id="modalConfirmYesNoSearch" class="modal fade"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  id="closeButtonSearch" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 id="lblTitleConfirmYesNo" class="modal-title warning font-small-3 pl-0 alert_color">
                <i class="icon-warning" ></i>
                <span id="customConfirm_titleSearch" class="customalert_title"></span>
              </h4>
            </div>
            <div class="modal-body bg-grey bg-lighten-3">
              <div id="lblMsgConfirmYesNo">
                <span id="customConfirm_msgSearch"> </span>
              </div>
            </div>
            <div class="modal-footer btn-group">
              <button id="btnYesConfirmYesNoSearch" type="button" class="btn action_bg btn-md">
                <!-- <span id="customConfirm_msgSearch"> -->
                  <span id="customConfirm_yesSearch"></span>
                <!-- </span> -->
              </button>
              <button id="btnNoConfirmYesNoSearch" type="button" class="btn action_bg btn-md" data-dismiss="modal">
                <span id="customConfirm_noSearch"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
</div>
</body>
</html>
