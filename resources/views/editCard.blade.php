 @extends('layout.header')
 <div class="" style=""> <a href="{{url('cardList')}}" style=""><div class="btn btn-primary pull-right">Back</div></a></div>
<div class="container">
  <h2>Edit Card</h2>
  
  <form action="{{url('updateCard')}}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input type="hidden" class="form-control" id="id" placeholder="Enter personName" name="id" value="{{$data->id}}">
    <div class="form-group">
      <label for="uname">Username:</label>
       <input type="text" class="form-control" id="personName" placeholder="Enter personName" name="personName" value="{{$data->personName}}">
       <span class="text-danger err-personName" id="personName_error_msg">

          @if($errors->has('personName'))

          {{ $errors->first('personName') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Designation:</label>
      <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation" value="{{$data->designation}}" >
      <span class="text-danger err-designation" id="designation_error_msg">

          @if($errors->has('designation'))

          {{ $errors->first('designation') }}

          @endif

       </span>
    </div> 
      <div class="form-group">
      <label for="uname">BusinessName:</label>
      <input type="text" class="form-control" id="businessName" placeholder="Enter businessName" name="businessName" value="{{$data->businessName}}" >
      <span class="text-danger err-businessName" id="businessName_error_msg">

          @if($errors->has('businessName'))

          {{ $errors->first('businessName') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Short Description:</label>
      <input type="text" class="form-control" id="shortDescription" placeholder="Enter shortDescription" name="shortDescription" value="{{$data->shortDescription}}" >
      <span class="text-danger err-shortDescription" id="shortDescription_error_msg">

          @if($errors->has('shortDescription'))

          {{ $errors->first('shortDescription') }}

          @endif

       </span>
    </div>  
    <div class="form-group">
      <label for="pwd">WhatsApp Number:</label>
      <input type="text" class="form-control" id="whatsAppNumber" placeholder="Enter whatsAppNumber" name="whatsAppNumber" value="{{$data->whatsAppNumber}}" >
      <span class="text-danger err-whatsAppNumber" id="whatsAppNumber_error_msg">

          @if($errors->has('whatsAppNumber'))

          {{ $errors->first('whatsAppNumber') }}

          @endif

       </span>
    </div>
     <div class="form-group">
      <label for="uname">Contacts:</label>
      <input type="text" class="form-control" id="contacts" placeholder="Enter contacts" name="contacts" value="{{$data->contacts}}" >
      <span class="text-danger err-contacts" id="contacts_error_msg">

          @if($errors->has('contacts'))

          {{ $errors->first('contacts') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Single Address:</label>
      <input type="text" class="form-control" id="singleAddress" placeholder="Enter singleAddress" name="singleAddress" value="{{$data->singleAddress}}" >
      <span class="text-danger err-singleAddress" id="singleAddress_error_msg">

          @if($errors->has('singleAddress'))

          {{ $errors->first('singleAddress') }}

          @endif

       </span>
    </div>

    <div class="form-group row">

      <label for="displayPhoto" class="col-md-2 col-form-label text-md-right">Display Photo</label>
        <div class="col-sm-8">
          @if(!empty($data->displayPhoto))
              <span class="pip">  
                <span class="remove" >
                  <i class='fa fa-times'></i>
                </span> 
                <img src="{{ URL('displayPhotos/'.$data->displayPhoto) }}" style="height:150px; width:150px;" id="OpenImgUpload"> 
              </span>
              <input type="hidden" name="displayPhoto" value="{{$data->displayPhoto}}" id="uploadPic">
          @else
              <img  style="display:none;height:150px; width:150px;"id="OpenImgUpload">
                <input type="file" name="displayPhoto" id="displayPhoto" > 
          @endif
        </div> 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
    $('#OpenImgUpload').click(function () {
      $('#displayPhoto').trigger('click');
    });
  // code for preview displayPhoto
      function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
          var ext = $('#uploadPic').val().split('.').pop().toLowerCase();
          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'jfif']) == -1) {
          alert('invalid extension!');
           $('#OpenImgUpload').hide();
      } else {
           $('#OpenImgUpload').show();
           $('.pip').show();
           $('#OpenImgUpload').attr('src', e.target.result);
           $(".remove").click(function () {
           $('.pip').hide();
           $('#OpenImgUpload').hide();
           $('#displayPhoto').val("");
        });
    }
  }
  reader.readAsDataURL(input.files[0]); // convert to base64 string
   }
  }
  $("#displayPhoto").change(function () {
   readURL(this);
  });
  $("#uploadPic").change(function () {
  readURL(this);
  });
  $(".remove").click(function () {
  $('.pip').hide();
  $('#OpenImgUpload').hide();
  $('#displayPhoto').val("");
  $('#uploadPic').attr('type', 'file');
  $('#uploadPic').val("");
  });

</script>