<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
 
	{{ HTML::style('css/bootstrap.css') }} 

<body>

<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="navbar-header">
  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    	<span class="icon-toggle"></span>
  	</button>
  	<a class="navbar-brand" href="#">Personal Accounting</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav pull-right">
      
      <li><a href="#">Month Infos</a></li>

      <li><a href="#">Charges</a></li>

      <li><a href="#">Family Members</a></li>

      <li class="dropdown">
        <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
          <strong>Admin</strong> 
          <span class="caret"></span>
        </a>
        <ul id="g-account-menu" class="dropdown-menu" role="menu">
          <li><a href="#">My Profile</a></li>
        </ul>
      </li>
      
      <li><a href="#">Log out</a></li>
    </ul>
  </div>
</div>

<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    	@yield('content')
  	</div><!--/col-span-9-->
</div>
</div> 

<div class="modal" id="addChargeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Charge</h4>
      </div>
      <div class="modal-body">
        <div class="row">
					  	
			<form class="form form-vertical">
                 
            <div class="control-group col-md-3 col-md-offset-1">
              <label>Year</label>
              <div class="controls">
                 <select class="form-control">
                 	<option>options</option>
                 </select>
              </div>
            </div> 

            <div class="control-group col-md-3">
              <label>Month</label>
              <div class="controls">
                 <select class="form-control">
                 	<option>options</option>
                 </select>
              </div>
            </div> 

            <div class="control-group col-md-3">
              <label>Day</label>
              <div class="controls">
                 <select class="form-control">
                 	<option>options</option>
                 </select>
              </div>
            </div>  
            
          </form>
		</div> 
      </div>
      <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}