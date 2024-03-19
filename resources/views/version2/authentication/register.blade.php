@extends('version2.authentication.master')

@section('title', 'Register')


@section('content')

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('version2/Login_assets/images/img-01.png') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{ route('register') }}" method="post">
					@csrf
								
					<span class="login100-form-title">
						Register New Member
					</span>

					@if (session()->has('errorcredentials'))
						<div class="text-center has-error">
							<span class="help-block">
								<strong>{!! session()->get('errorcredentials') !!}</strong>
							</span>
						</div>
					@endif 		
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" placeholder="Full name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                        {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <em>{{ $errors->first('name') }}</em>
                        </span>
                        @endif
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						@if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
                    	@endif
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('login') }}">
						I already have a membership
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endpush