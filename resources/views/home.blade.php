@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello  {{Auth::user()->name}} {{$user_profile['position']}}
                </div>
            </div>
        </div>
    </div>
</div>


<form method="POST" action="{{route('home.editprofile')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="user_id" id="formGroupExampleInput" value="{{Auth::user()->id}}" placeholder="Example input">

    <div class="form-group">
      <label for="formGroupExampleInput">position</label>
      <input type="text" class="form-control"  name="position" id="formGroupExampleInput" placeholder="Example input">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">berthday</label>
      <input type="date" class="form-control" name="berthday" id="formGroupExampleInput2" placeholder="Another input">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">image</label>
        <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
      </div>
      <button type="submit">save</button>
  </form>
@endsection