@extends('layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Schedule list</li>
      </ol>
    </section>

      <div class="box">
          <input type="hidden" name="rec_id" id="rec_id" value="">  
            <section class="content"> 
            
            <!-- /.box-header -->
             @include('layouts.message')
            <div id="msgContainer"></div>
      @if(count($schedules) > 0)
        @foreach($schedules as $k=>$schedule) 
       <div class="box-header with-border">
              <h3 class="box-title">Dr. {{Auth::guard('doctor')->user()->fname}}'s schedule on {{$schedule->clinicName}}</h3>
            </div>
            
         <div class="callout callout-info">
          <h4>{{$schedule->clinicName}}</h4>

          <p>{{$schedule->street1}} {{$schedule->street2}} {{$schedule->CityName}} , {{$schedule->StateName}} , {{$schedule->countryName}}</p>
        </div>
        <?php 
        $result = array();
        $datas = $schedule->data;
       
          foreach($datas as $k=>$data){ 
          $id = $data->dayName;
          if (isset($result[$id])) {
             $result[$id][] = $data;
          } else {
             $result[$id] = array($data);
          }
        } 
       //echo '<pre>';print_r($result);echo '</pre>';die;
        ?>
        <div class="row">    

          <!-- /.col -->
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <?php 
                $i =1;
                foreach($result as $keys=>$line) {?>
                
                <li class="<?php if($i == 1) echo 'active';?>"><a href="#activity_{{$schedule->ClinicId}}_{{$keys}}" data-toggle="tab">                
                <h5>{{$keys}}</h5></a></li>
              <?php $i++; } ?>
                
              </ul>
              <div class="tab-content">
              <?php 
                $i =1;
              foreach($result as $keys=>$lines){ ?>
              <div class="<?php if($i == 1) echo 'active';?> tab-pane" id="activity_{{$schedule->ClinicId}}_{{$keys}}"><div class="row">
              <?php 
              if(count($lines) > 0){
              foreach($lines as $kys=>$line) { ?>
                <div class="col-md-3" id="SlotNo_{{$line->TokenId}}">
                    <div class="box box-success box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title">{{$line->slot_name}}</h3>
                        <button type="button" recordId="{{$line->TokenId}}" data-toggle="tooltip" title="Delete" class="close DeleteSlot" data-dismiss="alert" aria-hidden="true">×</button>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                       Token No : {{$line->TokenId}}
                      </div>
                      <!-- /.box-body -->
                    </div>             
          <!-- /.box -->
                </div>
                  <?php } 
                  }?>
                </div></div>  
                 <?php $i++; }
                 ?>
                
                
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        
        @endforeach
      <!-- /.row -->
      @else
        No clinic found.
      @endif
    </section>
</div>
<script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.DeleteSlot').click(function(){
        var rid = $(this).attr('recordId');
        $('#rec_id').val(rid);    
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){
          
          $.ajax({
               type:'GET',
               url:'/doctor/delete-slot/'+$('#rec_id').val(),
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  $('#popUpinfo').modal('hide');
                  
                  if(data.error == 0){
                    $('#msgContainer').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4><p>'+data.message+'</p>');
                  }else{
                        $('#msgContainer').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Alert!</h4><p>'+data.message+'</p>');
                  }
                  $('#SlotNo_'+$('#rec_id').val()).remove();
               }
            });
  });
    
});
</script>     
@endsection
