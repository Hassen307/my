@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Items</h2>
	        </div>
	        <div class="pull-right">
                     <a class="btn btn-success" href="{{ route('pdfview') }}"> Print</a>
	        	@permission('item-create')
	            <a class="btn btn-success" href="{{ route('item.create') }}"> Create New Item</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th><b>No</b></th>
			<th><b>Title</b></th>
			<th><b>Description</b></th>
			<th width="280px"><b>Action</b></th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td><b>{{ ++$i }}</b></td>
		<td><b>{{ $item->title }}</b></td>
		<td><b>{{ $item->description }}</b></td>
		<td>
			<a class="btn btn-success" href="{{ route('item.show',$item->id) }}">Show</a>
			@permission('item-edit')
			<a class="btn btn-success" href="{{ route('item.edit',$item->id) }}">Edit</a>
			@endpermission
			@permission('item-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['item.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection