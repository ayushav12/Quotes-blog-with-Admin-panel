@extends('layouts.master1')

@section('content')
   <ul>
   	@foreach($authors as $author)
      <li>{{ $author->name }} ({{ $author->email }})</li>
   	@endforeach
   </ul>
@endsection