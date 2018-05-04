

@csrf



@if(!isset($user))
                         <!-- ADD NEW USER -->

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        {!! Form::text("name", null , ['class'=>'form-control']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('admin') }}</label>

    <div class="col-md-6">
        {!! Form::select("admin", ['0'=>'user', '1'=>'admin'] , ['class'=>'form-control']) !!}

        @if ($errors->has('admin'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('admin') }}</strong>
        </span>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    <div class="col-md-6">
        {!! Form::text("email", null , ['class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>

@else
    <!-- Update USER -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right" style="padding-left:10%">{{ __('Name') }}</label>

        <div class="col-md-6">
            {!! Form::text("name", $user->name , ['class'=>'form-control']) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>
    @if(!isset($showforuser))
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right" style="padding-left:10%">{{ __('admin') }}</label>

        <div class="col-md-6">
            {!! Form::select("admin", ['0'=>'user', '1'=>'admin'] , ['class'=>'form-control']) !!}

            @if ($errors->has('admin'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('admin') }}</strong>
            </span>
            @endif
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right" style="padding-left:10%">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            {!! Form::text("email", $user->email , ['class'=>'form-control']) !!}

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4" style="padding-left:10%">
        <button type="submit" class="btn btn-primary">
            {{ __('Update Information') }}
        </button>
        @if($user->id !=1)
        <a class="btn btn-danger" href="{{ url('users/'.$user->id.'/delete') }}">Delete Member</a>
        @endif
    </div>
    </div>





@endif

