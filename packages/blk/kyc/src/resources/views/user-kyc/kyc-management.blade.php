@extends('user::layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>KYC Form</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>   
                        </ol>
                    </div>
                </div>
        </div>
    </div>

<div class="container">
<div class="col s12 m12 l12">
    <div id="Form-advance" class="card card card-default scrollspy">
      <div class="card-content">
        <h4 class="card-title">Fill The KYC Form</h4>
        <form action="{{route('kyc.user-kyc-list')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input id="invisible_id" name="user_id" type="hidden" value="{{$userId}}">
          <div class="row">
            <div class="input-field col m6 s12">
              <input id="first_name01" type="text" name="name" required>
              <label for="name">Name</label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate" name="phone_number" required>
              <label for="icon_telephone">phone</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input type="text" class="datepicker" id="dob" name="date_of_birth" required>
              <label for="dob" class="">DOB</label>
            </div>
            <div class="input-field col m6 s12">
              <input id="first_name01" type="text" name="country" required>
              <label for="country">country</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input id="first_name01" type="text" name="address_line_1" required>
              <label for="address1">Addresss Line1</label>
            </div>
            <div class="input-field col m6 s12">
              <input id="first_name01" type="text" name="address_line_2">
              <label for="address2">Addresss Line2(optional)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input id="first_name01" type="text" name="city" required>
              <label for="city">City </label>
            </div>
            <div class="input-field col s6">
              <input id="icon_telephone" type="tel" class="validate" name="zip_code" required>
              <label for="zipcode">Zipcode</label>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="first_name01" type="text" name="telegram_username">
                <label for="telegram">Telegram Username(optional) </label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <div id="view-file-input" class="active">
                  <p>Add a selfie with document</p>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload Selfie Document</span>
                        <input type="file" name="selfie_document" required>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="input-field col m12 s12">
                    <select class="form-select" aria-label="Default select example" name="verify_id" required>
                    <option selected disabled>Select Property Condition</option>
                    @foreach ($kycType as $type)
                    <option value="{{$type->id}}" required>{{$type->name}}</option>
                    @endforeach
                    </select>
                </div> 
            </div> 
            <div class="row">
              <div class="input-field col m6 s12">
                <div id="view-file-input" class="active">
                  <p>Add a front image with document</p>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload Front side image</span>
                        <input type="file" name="front_image" required>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                </div>
            </div>
            <div class="input-field col m6 s12">
              <div id="view-file-input" class="active">
                <p>Add a back image with document</p>
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Upload Back side image</span>
                      <input type="file" name="back_image" required>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>
          </div>
           <div class="input-field col s12">
              <button class="btn cyan waves-effect waves-light right" type="submit">Submit
              <i class="material-icons right">send</i>
            </button>
        </div>
      </div>
    </form>
    </div>
   </div>
</div> 
</div>
</div>
@endsection
    







    

   

