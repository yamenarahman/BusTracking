@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<h2><i class="fa fa-map-o"></i> Lines</h2>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			@if(Entrust::hasRole('Admin'))	
				<a href="{{ url('/lines/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Create new line</a>
			@endif
		</div>
	</div>
	<div class="row">
		<table class="table table-striped table-hover" id="lines-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>From</th>
					<th>To</th>
					<th>Notes</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lines as $line)
				<tr>
					<td>{{ $line->name }}</td>
					<td>{{ $line->fromRoute }}</td>
					<td>{{ $line->toRoute }}</td>
					<td>{{ $line->notes }}</td>
					<td>
						<a class="btn btn-info" href="{{ url('/lines/'.$line->id) }}"><i class="fa fa-map"></i> view</a>
					
						<a class="btn btn-default" href="{{ url('/lines/'.$line->id.'/edit') }}"><i class="fa fa-edit"></i> edit</a>
						<form action="{{ url('/lines/'.$line->id) }}" method="POST" style="float: right;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this line ?')"><i class="fa fa-trash"></i> delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@push('js')
	<script>
		$(document).ready(function () {
			$('#lines-table').DataTable();
		});
	</script>
@endpush