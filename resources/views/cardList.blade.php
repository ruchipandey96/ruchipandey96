@extends('layout.header')

 
<div class="container">
  <h2>Card Management </h2> <div class="col-md-5 create">

            <a href="{{url('createCard')}}"><div class="btn btn-primary pull-right">Create Event</div></a>

        </div>
  

  <div class="container mt-5 ">
      
          <div class="row wellbeing">
      <div class="col-md-12">
      <h3 class="suggested pt-2">Cards</h3>
        </div>
         @if(session()->has('errors'))

        <div class="col-md-12 alert_notice">

            <div class="alert alert-info">

                {{ session()->get('errors') }}

                <button class="close float-right" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

        </div>

        @endif
                @foreach($getCards as $key => $value)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
         <img src="{{ asset('displayPhotos/'.$value->displayPhoto) }}" class="img-circle"  height="191px" width="340px" style="border-radius: 50%;">
                
                <div class="card-body">
        <h2 class="happyness">&nbsp;&nbsp;{{$value->personName}}</h2>
                  <p class="card-text">{{$value->shortDescription}} </p>
                   <td><a href="{{url('viewCard?id='.$value->id)}}"><i class="fa fa-eye" aria-hidden="true" style="color: blue"></i></a> 

                        <a href="{{url('editCard?id='.$value->id)}}"><i class="fa fa-edit" aria-hidden="true" style="color: green"></i></a>

                        <a href="{{url('deleteCard?id='.$value->id)}}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a></td>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            

           
            
           
          </div>
        </div>
    
</div>
<script>

setTimeout(function () {

        $('.alert_notice').hide('slow');
}, 3000);

</script>

