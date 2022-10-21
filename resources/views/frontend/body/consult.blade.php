<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctors</title>
    <style>
        .thumbnail {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
            transition: 0.3s;
            min-width: 40%;
            border-radius: 5px;
        }

        .thumbnail-description {
            min-height: 40px;
        }

        .thumbnail:hover {
            cursor: pointer;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 1);
        }
    </style>
</head>

@php
    $doctors = App\Models\Doctor::all();
@endphp

<body>
    <div class="row m-2">
        @foreach ($doctors as $item)
        <div class="col-md-8">
            <div class="row space-16">&nbsp;</div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center"
                            onclick="location.href='https://flow.microsoft.com/en-us/connectors/shared_slack/slack/'">
                            <div class="position-relative">
                                <img src="{{asset($item->image)}}"
                                    style="width:72px;height:72px;" />
                            </div>
                            <h4 id="thumbnail-label">Dr. {{$item->name}}</h4>
                            <p>&nbsp;{{$item->qualification}}</p>
                            <div class="thumbnail-description smaller">Fill Free to make an Appointment at low costs. By Clicking below</div>
                        </div>
                        <div class="caption card-footer text-center">
                            <ul class="list-inline">
                                <li><i class="people lighter"></i>&nbsp;{{$item->speciality}}</li>
                                <li></li>
                                <li><i class="glyphicon glyphicon-envelope lighter"></i><a href="{{url('appointment').'/'.$item->id}}">&nbsp;Make Appointment</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-2">&nbsp;</div> --}}
        </div>
        @endforeach
        {{-- <div class="m-2">&nbsp;</div> --}}

    </div>

</body>

</html>
