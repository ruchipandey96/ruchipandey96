<div class="" style=""> <a href="{{url('cardList')}}" style=""><div class="btn btn-primary pull-right">Back</div></a></div>
<div class="container">
  <h2>view Card </h2> 
  <div class="container mt-5 ">
      
          <div class="row wellbeing">
      <div class="col-md-12">
        </div>
               

        <center>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
         <img src="{{ asset('displayPhotos/'.$data->displayPhoto) }}" class="css-class"  height="191px" width="340px" style="border-radius: 50%;">
                
                <div class="card-body">
                 <p class="card-text"> Person Name: {{$data->personName}}</h2>
                 <p class="card-text"> Short Description: {{$data->shortDescription}} </p>
                  <p class="card-text">Business Name: {{$data->businessName}} </p>
                  <p class="card-text">Designation: {{$data->designation}} </p>
                  <p class="card-text">WhatsApp Number: {{$data->whatsAppNumber}} </p>
                  <p class="card-text">Contacts: {{$data->contacts}} </p>
                  <p class="card-text">Single Address: {{$data->singleAddress}} </p>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>
        </center>

     </div>
        </div>
    
</div>