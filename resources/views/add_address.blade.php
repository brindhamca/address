<!DOCTYPE html>
<html>
<head>
  <title>Add Address Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>

    <script type="text/javascript" src="{{asset('js/addresses.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    .error {
      color: red;
    }
    .required {
      color: red;
    }
  </style>
</head>
<body>
   @if($perform =="add")
      <h3>Add Address Detail</h3>
  @elseif($perform =="update")
      <h3>Update Address Detail</h3>
    @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form id="address_form"  method="post">
    <input type="hidden" name="addressId" id="addressId" value="@if($addressData != null && $addressData->id != null)  {{$addressData->id}} @endif">
    @csrf
    <div>
      <label for="first_name">First Name:</label><span class="required">*</span>
      <input type="text" id="first_name" name="first_name" value="@if($addressData != null && $addressData->first_name != null)  {{$addressData->first_name}} @elseif(old('first_name')) {{ old('first_name') }} @endif">
    <div>
      <label for="last_name">Last Name:</label><span class="required">*</span>
      <input type="text" id="last_name" name="last_name" value="@if($addressData != null && $addressData->last_name != null)  {{$addressData->last_name}} @elseif(old('last_name')) {{ old('last_name') }} @endif">
    </div>
    <div>
      <label for="date_of_birth">Date Of Birth:</label><span class="required">*</span>
      <input type="text" id="date_of_birth" name="date_of_birth" value="@if($addressData != null && $addressData->date_of_birth != null)  {{$addressData->date_of_birth}} @elseif(old('date_of_birth')) {{ old('date_of_birth') }} @endif">
    </div>
    <div>
      <label for="gender">Gender:</label><span class="required">*</span>
      <input type="radio" id="male" name="gender" value="male" "@if($addressData != null && $addressData->gender != null && $addressData->gender == "male") checked @elseif(old('gender') == "male") checked : '' @endif">
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" "@if($addressData != null && $addressData->gender != null && $addressData->gender == "female") checked @elseif(old('gender') == "female") checked : '' @endif">
      <label for="female">Female</label>
    </div>
    <div>
      <label for="contact_mobile">Contact Mobile:</label><span class="required">*</span>
      <input type="text" id="contact_mobile" name="contact_mobile" value="@if($addressData != null && $addressData->first_name != null)  {{$addressData->contact_mobile}} @elseif(old('contact_mobile')) {{ old('contact_mobile') }} @endif">
    </div>
    <div>
      <label for="contact_phone">Contact Phone:</label>
      <input type="text" id="contact_phone" name="contact_phone" value="@if($addressData != null && $addressData->contact_phone != null)  {{$addressData->contact_phone}} @elseif(old('contact_phone')) {{ old('contact_phone') }} @endif">
    </div>
    <div>
      <label for="email_address">Email Address:</label><span class="required">*</span>
      <input type="email" id="email_address" name="email_address" value="@if($addressData != null && $addressData->email_address != null)  {{$addressData->email_address}} @elseif(old('email_address')) {{ old('email_address') }} @endif">
    </div>
    <div>
      <label for="street">Street:</label>
      <input type="text" id="street" name="street" value="@if($addressData != null && $addressData->street != null)  {{$addressData->street}} @elseif(old('street')) {{ old('first_name') }} @endif">
    </div>
    <div>
      <label for="city">City:</label>
      <input type="text" id="city" name="city" value="@if($addressData != null && $addressData->city != null)  {{$addressData->city}} @elseif(old('city')) {{ old('city') }} @endif">
    </div>
    <div>
      <label for="hobbies">Hobbies:</label>
        <input type="checkbox" id="reading" name="hobbies[]" value="reading" "@if($addressData != null && $addressData->hobbies != null && in_array("reading",$addressData->hobbies)) checked : ''@elseif(in_array('reading', old('hobbies', []))) checked : '' @endif">
        <label for="reading">Reading</label>
        <input type="checkbox" id="traveling" name="hobbies[]" value="traveling" "@if($addressData != null && $addressData->hobbies != null && in_array("traveling",$addressData->hobbies)) checked : '' @elseif(in_array('traveling', old('hobbies', []))) checked : '' @endif">
        <label for="traveling">Traveling</label>
        <input type="checkbox" id="cooking" name="hobbies[]" value="cooking" "@if($addressData != null && $addressData->hobbies != null && in_array("cooking",$addressData->hobbies)) checked : '' @elseif(in_array('cooking', old('hobbies', []))) checked : '' @endif">
        <label for="cooking">Cooking</label>
    </div>
    <div>
      <input type="hidden" name="perform" id="perform" value="@if($perform != null) {{$perform}} @endif">
      @if($perform =="add")
          <input type="button" id="saveAddress" value="ADD">
      @elseif($perform =="update")
          <input type="button" id="saveAddress" value="UPDATE">
      @endif
    </div>
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
