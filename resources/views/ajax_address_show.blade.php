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