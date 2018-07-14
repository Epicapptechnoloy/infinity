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
<div class="box"  >
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
			  <div class="col-md-3">
                @if (count($clinic) > 0)
                  @if(count($clinic->ClinicImage) > 0)
                    @php $path = 'assets/doctor_'.$clinic->doctor_id.'/clinics/clinic_'.$clinic->id.'/'.$clinic->ClinicImage[0]->ImgName @endphp
                    
                    <img src="/timthumb.php?src={{ URL::asset($path) }}&h=90&w=70&q=140" class="img-circle" alt="Clinic image">
                    
                  @else
                  <img src="/timthumb.php?src={{ URL::asset('images/No-Image-Basic.png') }}&h=40&w=40&q=90" class="img-circle" alt="Clinic image">
                  @endif
				  </div>
				  <div class="col-md-9">
                  <h3>Address</h3>
				  <p>
				  @if ($clinic->street1)					
					{{ $clinic->street1 }} 
				  @endif
				  @if ($clinic->street2)
					, {{ $clinic->street2 }} 
				  @endif
				  @if ($clinic->countryId)
					, {{ $clinic->clinicCountryName->name }}
				  @endif
				</p>
				  
                @else
                 You dont hav any address mentioned yet !
                @endif
				</div>
				<div class="col-md-9">
                <h3>Availbility</h3>
                  @if (count($availabilities) > 0)
                  <table class="table table-striped table-bordered datatables">
                    <tr>
                      <th>Day</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Status</th>
                    </tr>
                    @foreach($availabilities as $availability )

                    <tr>
                      <td>{{ $availability->weekday->dayName}}</td>
                      <td>{{date('h:i A',strtotime($availability->startTime))}}</td>
                      <td>{{date('h:i A',strtotime($availability->EndTime))}}</td>
						  
                      <td>@if ( strtotime($current_time) >= strtotime($availability->startTime) && strtotime($current_time) <= strtotime($availability->EndTime))
                          <?php $availability_id = $availability->id; ?>
                            <i class="icon fa fa-check" data-toggle="tooltip" title="Available"></i>
                          @else
                            <i class="fa fa-times" aria-hidden="true" data-toggle="tooltip" title="Time slots not available!"></i>
                          @endif
                      </td>
                    </tr>  
                  @endforeach
                  </table>
                  @else
                    You don't have any availbilities !
                  @endif  
					</div>
                <?php 
                  if (isset($availability_id)){
                    $timeslots1 = \App\Model\DoctorTimeSlot::where('doctor_Id', Auth::user()->id)->where('clinic_Id',$clinic->id)->where('dayId',$day_id)->where('availability_id', $availability_id)->get();
                    $count_slots = count($timeslots1);
                  }
                  else{
                    $timeslots1 = null;
                    $count_slots = 0;
                  }
                ?>
				  <div class="col-md-12">
                   <h3>Time Slots </h3>

                    @if ( count($timeslots1) > 0)
                    <table class="table table-striped table-bordered datatables">
                    @php $i = 0 @endphp
                            <div class="row">   
                                @foreach($timeslots1 as $timeslot )
                            <div class="col-md-3">
                                <div class="box box-success box-solid">
                                  <div class="box-header with-border">
                                    <h3 class="box-title">{{ $timeslot->slot_name}}</h3>
                                  </div>
                                  <div class="box-body">
                                   Token No : {{ ++$i}}
                                  </div>
                                </div>
                            </div>
                                @endforeach
                          </div>                                      
                    </table>

                    @else
                    Time slots not available!
                    @endif
					</div>

              </div>

          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">Current Token Status</h4>
			  <span class="pull-right"><a href="#" class="refreshBtn">
                <i class="fa fa-repeat"></i> Refresh
              </a></span>
            </div>
                @if (count($appointment) > 0)
					<span class="pull-right">						
						<a href="#" class="btn btn-app startLiveTokenBtn"><i class="fa fa-play"></i> Start</a>
					</span>
				<div > 
                <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><h1 class="text-green">Current Token :</h1></td>
                        <td><h1 class="text-green">{{$token}}</h1></td>
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
                        <td>Patient Name :</td>
                        <td>{{$appointment->patient->name}}</td>
                      </tr>
                    </tbody>
                  </table>

                <div class="row"  >
                        <div class="col-md-9">
                          <form action="{{$url = route('previous.live.token',[$clinic->id])}}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('POST') }}
                              <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                <input type="hidden" name="token" value="{{ $token }}">

                              <button  class ='btn btn-primary' , type="submit" id="{{ $clinic->id }}"  name = 'previous'>
                                  <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous
                              </button>
                          </form>   
                        </div>
                      <div class="col-md-3">
                        <form action="{{$url = route('next.live.token',[$clinic->id])}}" method="POST"  onclick="disableNext()">
                              {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                              <input type="hidden" name="token" value="{{ $token}}">
                              <input type="hidden" name="appointment_count" value="{{ $appointment_count}}">

                              <input type="hidden" name="count_token" value="{{ $count_slots}}">

                            <button  class ='btn btn-primary' , type="submit" id="{{ $clinic->id }}"  name = 'next'>
                                <i class="fa fa-arrow-right" aria-hidden="true"></i> Next
                            </button>
                        </form>  
                      </div>
                </div>
				</div>	
                  @else
                <div class="col-md-12">
                      <div class="row">                        
                        <h1 class="text-red">Time slots are not available!</h1>
                            <div class="col-md-9" style="display:none;">
                                  <button  class ='btn btn-primary' , type="submit" disabled>
                                      <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous
                                  </button>                        
                            </div>
                            <div class="col-md-3" style="display:none;">
                                  <button  class ='btn btn-primary' , type="submit" disabled >
                                      <i class="fa fa-arrow-right" aria-hidden="true"></i> Next
                                  </button>                    
                          </div>
                    </div>
                </div>
                  @endif   
          </div>
        </div>
      </div>
    </div>
  </div> 


<script type="text/javascript">
	$('.refreshBtn').click(function() { location.reload(); });
  $(function(){

    var token =  <?php echo json_encode($token); ?>;
    var appointment_count = <?php echo json_encode($appointment_count); ?>;

    if(token == appointment_count ){
      $( "button[name='next']" ).prop( "disabled", true );
    }

    if(token == 1){
      $( "button[name='previous']" ).prop( "disabled", true );
    }

  });
	
</script>
@endsection