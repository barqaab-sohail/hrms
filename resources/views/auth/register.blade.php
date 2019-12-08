@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @if(Session::has('erro_login'))
                        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert"></a>
                        <strong></strong> {{Session::get('erro_login')}}
                        </div>
                    @endif


                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                          </ul>
                      </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="form-prevent-multiple-submits">
                        @csrf

                        <div class="form-group row">
                            <label for="cnic" class="col-md-4 col-form-label text-md-right">{{ __('CNIC') }}</label>

                            <div class="col-md-6">
                                <input id="cnic" type="text" class="form-control{{ $errors->has('cnic') ? ' is-invalid' : '' }}" pattern="[0-9.-]{15}" title= "13 digit Number without dash"  name="cnic"  placeholder="Enter CNIC without dash" value="{{ old('cnic') }}" required autofocus>

                                @if ($errors->has('cnic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cnic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-prevent-multiple-submits"><i class="fa fa-spinner fa-spin" style="font-size:18px"></i>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

