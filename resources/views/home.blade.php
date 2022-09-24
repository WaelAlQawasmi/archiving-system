@extends('layouts.app')

@section('content')















<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="{{url('uploded/'.$user_profile['image'])}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">

                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
									<h4> {{Auth::user()->name}}</h4>
									<!-- <p class="text-secondary mb-1">Full Stack Developer</p>
									<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
									<button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button> -->
								</div>
							</div>
							<hr class="my-4">
					
						</div>
					</div>
				</div>
				<div class="col-lg-8">
                    <form method="POST" action="{{route('home.editprofile')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">position</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text"  name="position"  value="{{$user_profile['position']}}" class="form-control" value="John Doe">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">berthday</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" name="berthday" value="{{$user_profile['berthday']}}" class="form-control" value="john@example.com">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">profile photo</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="file"   name="image" class="form-control" value="(239) 816-9029">
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-primary px-4" value="Save Changes"> Save Changes</button>
								</div>
							</div>
						</div>
					</div>
                  </form>
			

				</div>
			</div>
		</div>
	</div>

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<script type="text/javascript">

</script>








@endsection