@extends('adminlayouts.master')
@section('breadcrumb')
      <section class="content-header">
      <h1>
        {{Config::get('settings.cms')}} Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
            <li class="active">{{Config::get('settings.cms')}} management</li>
      </ol>
    </section>
@endsection      
@section('content')

<!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Page{{Config::get('settings.cms')}}</h3>
            </div>
            <!-- /.box-header -->
             @include('adminlayouts.message')
            
		<div class="box-body">{{csrf_field()}}
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>                   
                  <th>Title</th>
									<th>Description</th>	
                  <th>Last updated</th>                  
                  <th><a href="{{ Request::fullUrlWithQuery(['sort_by' => 'status','order_by' => ($params->get('order_by') == 'asc')?"desc":"asc"]) }}">Status</a> <i class="fa fa-fw {{($params->get('order_by') != '' && $params->get('sort_by') == 'status')?"fa-sort-".$params->get('order_by'):"fa-sort"}}"></i></th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @if(count($records) > 0)                      
                  @foreach($records as $key=>$line)
                       
                  <tr>
                    <td>{{ ($records->currentpage()-1) * $records->perpage() + $key + 1 }}</td>                       
                    <td>{{$line->title}}</td>
										<td>{!! substr($line->description,0,100) !!}</td>	
                    <td>{{date('d-M-Y',strtotime($line->updated_at))}}</td>
                    <td>
                       @if($line->status)
                             <a class="cmsStatus" status="{{$line->status}}" href="javascript:void(0);" id="status_{{$line->id}}" cms-id="{{$line->id}}"><span class="label label-success">Active</span></a>
                        @else
                              <a class="cmsStatus" status="{{$line->status}}" href="javascript:void(0);" id="status_{{$line->id}}" cms-id="{{$line->id}}"><span class="label label-danger">Inactive</span></a>
                        @endif      
                    </td> 
                   
                   <td>
						<div class="btn-group">
							<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
							<ul class ="dropdown-menu" role="menu">
							
							  <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$line->id}}">Delete</a></li>
							  <li><a href="{!! route('edit-cms-page',[base64_encode($line->id)]) !!}">Edit</a></li>
							  
							</ul>
						</div>
					</td>
				  
                  
                  </tr>
                  @endforeach
                  @else
                   <tr><td colspan="7">No records</td></tr>
                  @endif 
                </tfoot>
                  
              </table>
                <div class="pull-right">
                {{
                  $records->appends(
                    [
                      'keywords'    => $params->keywords,
                      'fromdate'    => $params->fromdate,
                      'todate'      => $params->todate,
                      'sort_by'    =>  $params->sort_by,
                      'order_by'    =>  $params->order_by,
                      
                    ]
                  )->render()
                }}</div>  
            </div>
                  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
	<input type="hidden" id="c_id" />
	 <script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var cid = $(this).attr('recordId');       
        $('#c_id').val(cid);
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/deletecmspage/"+$('#c_id').val());      
  });    
});

</script> 
@endsection
