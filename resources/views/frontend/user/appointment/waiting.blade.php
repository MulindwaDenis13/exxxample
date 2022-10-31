@extends('frontend.main_master')
@section('content')
    <style>
        .thumbnail {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            height: 500px;
            border-radius: 10px;
        }

        .thumbnail-description {
            min-height: 40px;
        }

        .thumbnail:hover {
            cursor: pointer;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div style="background-image: url('docc.jpg'); background-size: cover; height: 40vh;">
      <br/><br/>
      <center>
      <h1 class="text-primary"><b>Thanks for Requesting Consultation from</b></h1>
      <h1  class="text-primary"><b> Our best doctors</b></h1>
      </center>
    </div>
    <div class="container" style="margin-top: -100px; background-color: #ffffff;">
    <div class="row m-5">
     
        <div class="col-md-6 p-4 border-end">
          <div style="width: 350px; height: 400px;">
          
          </div>
        
          <h4 class="text-primary"><b>Dr. {{$waiting->doctor->name}}</b></h4>
          <p>Specification: {{$waiting->doctor->speciality}}</p>
          <p>Qualifications: {{$waiting->doctor->qualification}}</p>
          <p>Details: {{$waiting->doctor->details}}</p>
        </div>
       <div class="col-md-6 p-4">
         <br/><br/>
         <h2 class="mt-5 text-primary"><b>Thanks for Paying for consultation</b></h2>
         <br/>
         <h4 class="text-primary">Please Wait for the admin to connect you to Dr. {{$waiting->doctor->name}}</h4>
        </div>
    </div>
      <br/><br/>
    </div>

@endsection
