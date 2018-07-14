    <form action="{{route('admin.order-list')}}" method="get">
        <div class="box-body">
            <div class="row">
            <div class="col-md-12">
            <div class="col-md-3">
                  <div class="form-group">
                  <label>Keywords</label>
                  <input class="form-control" type="text" value="{{$params->keywords}}" name="keywords" placeholder="Search by name or email or orderId">
                </div>
            </div>
            <div class="col-md-5">
                  <div class="col-xs-4">
              <label for="ex1">From</label>
                <input class="form-control" value="{{$params->fromdate}}" type="text" id="fromdate" name="fromdate" placeholder="From date">
            </div>
              
              <div class="col-xs-4">
              <label for="ex1">To</label>
                <input class="form-control" value="{{$params->todate}}" type="text" id="todate" name="todate" placeholder="To date">
            </div>
              
              <div class="col-xs-4">
              <label for="ex1">&nbsp;</label>
                <button type="submit" class="btn btn-block btn-success">Search</button> 
            </div>
            </div>
            <div class="col-md-2"></div>            
            </div>
            <!-- /.col -->
           
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </form>