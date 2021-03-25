@extends('layout.header')
<div class="container">
  <h2>Add Card</h2>
  
  <form action="{{url('storeCard')}}" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="personName" placeholder="Enter personName" name="personName" >
       <span class="text-danger err-personName" id="personName_error_msg">

          @if($errors->has('personName'))

          {{ $errors->first('personName') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Designation:</label>
      <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation" >
      <span class="text-danger err-designation" id="designation_error_msg">

          @if($errors->has('designation'))

          {{ $errors->first('designation') }}

          @endif

       </span>
    </div> 
      <div class="form-group">
      <label for="uname">BusinessName:</label>
      <input type="text" class="form-control" id="businessName" placeholder="Enter businessName" name="businessName" >
      <span class="text-danger err-businessName" id="businessName_error_msg">

          @if($errors->has('businessName'))

          {{ $errors->first('businessName') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Short Description:</label>
      <input type="text" class="form-control" id="shortDescription" placeholder="Enter shortDescription" name="shortDescription" >
      <span class="text-danger err-shortDescription" id="shortDescription_error_msg">

          @if($errors->has('shortDescription'))

          {{ $errors->first('shortDescription') }}

          @endif

       </span>
    </div>  
    <div class="form-group">
      <label for="pwd">WhatsApp Number:</label>
      <input type="text" class="form-control" id="whatsAppNumber" placeholder="Enter whatsAppNumber" name="whatsAppNumber" >
      <span class="text-danger err-whatsAppNumber" id="whatsAppNumber_error_msg">

          @if($errors->has('whatsAppNumber'))

          {{ $errors->first('whatsAppNumber') }}

          @endif

       </span>
    </div>
     <div class="form-group">
      <label for="uname">Contacts:</label>
      <input type="text" class="form-control" id="contacts" placeholder="Enter contacts" name="contacts" >
      <span class="text-danger err-contacts" id="contacts_error_msg">

          @if($errors->has('contacts'))

          {{ $errors->first('contacts') }}

          @endif

       </span>
    </div>
    <div class="form-group">
      <label for="pwd">Single Address:</label>
      <input type="text" class="form-control" id="singleAddress" placeholder="Enter singleAddress" name="singleAddress" >
      <span class="text-danger err-singleAddress" id="singleAddress_error_msg">

          @if($errors->has('singleAddress'))

          {{ $errors->first('singleAddress') }}

          @endif

       </span>
    </div>
     <div class="form-group">
      <label for="">Display Photo:</label>
      <input type="file" class="form-control" id="displayPhoto" placeholder="Enter displayPhoto" name="displayPhoto" >
      <span class="text-danger err-displayPhoto" id="displayPhoto_error_msg">

          @if($errors->has('displayPhoto'))

          {{ $errors->first('displayPhoto') }}

          @endif

       </span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>