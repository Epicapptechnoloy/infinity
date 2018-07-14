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
        <li class="active">Blog list</li>
      </ol>
    </section>
      <div class="box">
	  @include('layouts.message')
            <div id="msgContainer"></div>
            <div class="box-header with-border">
              <h3 class="box-title">Dr. {{Auth::guard('doctor')->user()->fname}}'s Blog list</h3>

              <!-- Asistant search and sroting form here -->
              @include('layouts.partials.BlogSearchForm')
              <!-- end here  -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			<input type="hidden" name="rec_id" id="rec_id" value="">
			<div></div>
              <table class="table table-hover" id="patientlisttable">
                <thead>
                <tr>
                  <th style="width: 10px">S.No</th>
                  @php
                    if( app('request')->input('order-by') == 'asc')
                      $orderBy = 'desc';
                    else
                      $orderBy = 'asc';  

                    if( app('request')->input('page'))
                      $page = app('request')->input('page');
                    else
                      $page = 1;  
                  @endphp
                  <th><a href="{{ route('doctor.showBlogList',array('publish' => $params->publish,'s' => $params->s) )}}&sort-by=title&order-by={{$orderBy}}&page={{$page}}">Title&nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></a></th>
                  <th><a href="{{ route('doctor.showBlogList',array('publish' => $params->publish,'s' => $params->s) )}}&sort-by=description&order-by={{$orderBy}}&page={{$page}}">Description&nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></a></th>
                  <th>Created</th> 
                  <th>Publish</th>                  
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody>
				@if(count($Blogs) > 0)
                @foreach($Blogs as $blog)
				
                <tr id="RecordNo_{{$blog->id}}">
                  <td>{{++$i}}</td>
                
                  <td>{{ucfirst($blog->blogName)}}</td>
                  <td>{{ htmlspecialchars($blog->blogDescription)}}</td>
                 <td>{{ $blog->created_at }}</td>
                  <td>
                  @if($blog->status == 0)
                    <span class="label label-danger">No</span>
                  @else
                    <span class="label label-success">Yes</span>
                  @endif  
                  </td>
                  <!-- <td>
                    <a href="/doctor/edit-blog?c={{$blog->id}}"> Edit </a> | <a class="confirmDialog" href="javascript:void(0);" recordId="{{$blog->id}}">Delete </a>
                  </td> -->
                  
                   <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#"> View </a></li>
                          <li><a href="/doctor/edit-blog?c={{$blog->id}}"> Edit </a></li>
                          <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$blog->id}}">Delete </a></li>
                        </ul>
                    </div>
                  </td>

                </tr>                
                @endforeach
				@else
                <tr ><td colspan="7">No record.</td></tr>
                @endif
                </tbody>
              </table>
            </div>
           <!-- /.box-body -->
            <div class="box-footer clearfix">             
            {{ $Blogs->appends(['s' => $params->s,'sort-by' => $sort_by, 'order-by' => $order_by])->render() }}

            </div>

          </div> 
<script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var rid = $(this).attr('recordId');
        $('#rec_id').val(rid);    
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){          
          $.ajax({
               type:'GET',
               url:'/doctor/delete-blog?c='+$('#rec_id').val(),
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  $('#popUpinfo').modal('hide');
                  
                  if(data.error == 0){
                    $('#msgContainer').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4><p>'+data.message+'</p>');
                  }else{
                        $('#msgContainer').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Alert!</h4><p>'+data.message+'</p>');
                  }
                  $('#RecordNo_'+$('#rec_id').val()).remove();
               }
            });
  });
    
});


</script>
@endsection
