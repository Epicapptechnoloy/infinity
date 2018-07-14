@extends('layouts.master')

@section('content')

<!-- alok sir desinge here -->

<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clinic list</li>
      </ol>
</section>
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dr. {{Auth::guard('doctor')->user()->fname}}'s Clinic</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $clinic->clinicName}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                  @if (count($clinic) > 0)

                  <h3>Address</h3>
                  <p>{{ $clinic->street1 }} </p>
                  <p>{{ $clinic->street2 }} </p>
                  <p>{{ $clinic->clinicCountryName->name }} </p>
                @else
                  You dont hav any address mentioned yet !
                  @endif

                <h3>Availbility</h3>
                  @if (count($availabilities) > 0)
                  <table class="table table-striped table-bordered datatables">
                    <tr>
                      <th>Day</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                    </tr>
                    @foreach($availabilities as $availability )
                    <tr>
                      <td>{{ $availability->weekday->dayName}}</td>
                      <td>{{ $availability->startTime }}</td>
                      <td>{{ $availability->EndTime}}</td>
                    </tr>  
                  @endforeach
                  </table>
                  @else
                    You dont hav any availbilities !
                  @endif  
                <h3>Time Slots</h3>
                  @if (count($timeslots) > 0)
                  <table class="table table-striped table-bordered datatables">
                   
                  @foreach($timeslots as $timeslot ) 
                    <tr>
                      <td>{{ $timeslot->slot_name}}</td>                      
                    </tr>  
                  @endforeach
                  </table>

                  @else
                  You dont hav any time slots !
                  @endif

              </div>

          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h4 class="box-title">Appointments On {{$today}}</h4>
            </div>
                @if (count($appointment) > 0)
                <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Current Token :</td>
                        <td>{{$token}}</td>
                      </tr>                    
                      <tr>
                        <td>Token Status : </td>
                        <td>{{$token}}/{{$count_slots}}</td>
                      </tr>
                      <tr>
                        <td>Time Slot :</td>
                        <td>{{ $appointment->time_slot->slot_name }}</td>
                      </tr>
                      <tr>
                        <td>Patient Details :</td>
                        <td>{{$appointment->patient->name}}</td>
                      </tr>

                    </tbody>
                  </table>

                <div class="row">
                      <div class="col-md-9">
                        <form action="{{$url = route('previous.live.token',[$clinic->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                              <input type="hidden" name="token" value="{{ $token }}">

                            <button  class ='btn btn-primary' , type="submit" id="{{ $clinic->id }}" >
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous
                            </button>
                        </form>   
                      </div>
                  <div class="col-md-3">
                    <form action="{{$url = route('next.live.token',[$clinic->id])}}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                          <input type="hidden" name="token" value="{{ $token}}">
                          <input type="hidden" name="count_token" value="{{ $count_slots}}">

                        <button  class ='btn btn-primary' , type="submit" id="{{ $clinic->id }}" >
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> Next
                        </button>
                    </form>  
                  </div>
                </div>    
                  @else
                  You dont hav any appointment !
                  @endif   
          </div>
        </div>
      </div>
    </div>
  </div> 

<!-- end here-- >
<script type="text/javascript">
  var example1 = new Vue({
    el: '#example-1',
    data: {
      counter: 1
      }
  })
</script>
@endsection