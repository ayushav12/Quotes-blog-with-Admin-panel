@extends('layouts.master1')

@section('content')
 <style type="text/css">
 	.input-group label{
 		text-align : left;
 	}
 </style>
  @if(count($errors)>0)
    <section class="info-box fail">
      <ul>
        @foreach($errors->all() as $error)
         {{ $error }}
        @endforeach 
      </ul>
    </section> 
  @endif  
  <!-- checking if the session has failed -->
   @if(Session::has('fail'))
    <section class="info-box fail">
      <ul>
       {{ Session::get('fail') }} 
      </ul>
    </section> 
  @endif  
 <form action="{{ route('admin.login') }}" method="post">
	<div class="input-group">
		<label for="name">Your Name</label>
		<input type="text" name="name" id="name" placeholder="Your name" />
	</div>
	<div class="input-group">
		<label for="password">Your Password</label>
		<input type="password" name="password" id="password" placeholder="Your Password" />
	</div>
	<button type="submit">Submit</button>
	<input type="hidden" name="_token" value="{{ Session::token() }}" />
 </form>
@endsection 