@extends('layouts/master')

@section('content')

<div class="row">
	

	<h1 class="page-header"> Current Month Info</h1>
	<div>Possible Charge: {{$possibleCharge}}</div>
	<div>Actual Charge: {{$actualCharge}}</div>

	<div class="row">
         	<div class="col-md-12">
				      <!-- <div class="well">Inbox Messages <span class="badge pull-right">3</span></div> --> 
              
              <div class="panel panel-default">
                <div class="panel-body"> 
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
                          
                          <div class="control-group col-md-1">
                            	<label>&nbsp;</label>
                          	<div class="controls">
                            	<button type="submit" class="btn btn-primary">
                                Find
                              </button>
                          	</div>
                          </div>
                        </form>
          					</div>
                  </div>
              </div>

              <div class="panel panel-default">
                  <div class="panel-heading">Charges</div>
                  <table class="table table-striped">
                  <thead>
                    <tr>
                    	<th>Title</th>
                    	<th>Cost</th>
                    	<th>Family Member</th>
                    	<th>Category</th>
                    	<th>Priority</th>
                    	<th>Edit</th>
                    	<th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($charges as $charge)
						{{ Form::open(['route' => ['charges.delete', $charge->id], 'method' => 'DELETE']) }}
						<tr>
							<td>{{ $charge->title }}</td> 
							<td>{{ $charge->amount }}</td> 
							<td>{{ $charge->familyMember->name }}</td>  
							<td>{{ $charge->category->name_en }}</td>  
							<td>{{ $charge->priority->name_en }}</td> 
							<td>{{ link_to("/charges/$charge->id/edit", 'Edit') }}</td>
							<td>{{ Form::submit() }}</td>
						</tr>
						{{ Form::close() }}
					@endforeach
                  </tbody>
                  </table>
              </div>

              <hr>

              <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"> 
                      Add New
                    </div>
                </div>
                <div class="panel-body"> 
                    <div class="row">  
                      {{ Form::open([ 'url' => 'charges', 'method' => 'post' , 'class' => 'form form-vertical']) }} 

                          <div class="control-group col-md-2">
                            {{ Form::label('title', 'Title:') }}
                            <div class="controls">
                            	{{ Form::text('title', null, ['class' => 'form-control']) }}
                            </div>
                          </div>

                          <div class="control-group col-md-2">
                            {{ Form::label('amount', 'Amount:') }}
                            <div class="controls">
                               {{ Form::text('amount', null, ['class' => 'form-control']) }}
                            </div>
                          </div> 
                                       
                          <div class="control-group col-md-2">
                            {{ Form::label('member', 'Member:') }}
                            <div class="controls">
                               {{ Form::select('member', $members, null, ['class' => 'form-control']) }}
                            </div>
                          </div> 

                          <div class="control-group col-md-2">
                            {{ Form::label('category', 'Category:') }}
                            <div class="controls">
                               {{ Form::select('category', $categories, null, ['class' => 'form-control']) }}
                            </div>
                          </div> 

                          <div class="control-group col-md-2">
                            {{ Form::label('priority', 'Priority:') }}
                            <div class="controls">
                               {{ Form::select('priority', $priorities, null, ['class' => 'form-control']) }}
                            </div>
                          </div>    
                          
                          <div class="control-group col-md-1">
                              <label>&nbsp;</label>
                            <div class="controls">
                              <button type="submit" class="btn btn-primary">
                                Add
                              </button>
                            </div>
                          </div>
                        {{ Form::close() }}
                    </div>
                  </div>
              </div>

          	</div> 
     
      </div><!--/row--> 
</div>
@stop