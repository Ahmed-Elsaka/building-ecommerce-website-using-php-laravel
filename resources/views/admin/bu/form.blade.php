@csrf
<style>
    .col-md-4 {
        margin-top: 20px;
        width: 33.33333333333333%;
    }

</style>

@if(!isset($bu))
    <!-- ADD NEW bu -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Name') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_name", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_name'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_name') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No of Rooms') }}</label>

        <div class="col-md-8">
            {!! Form::select("rooms",roomnumber(), null , ['class'=>'form-control']) !!}
            @if ($errors->has('rooms'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('rooms') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Price') }}</label>

        <div class="col-md-8">
            {!! Form::text("bu_price", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_price'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_price') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Operation Type') }}</label>

        <div class="col-md-8">
            {!! Form::select("bu_rent", bu_rent() ,null, ['class'=>'form-control']) !!}
            @if ($errors->has('bu_rent'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_rent') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Place ') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_place", bu_place() ,null, ['class'=>'form-control js-example-basic-single']) !!}
            @if ($errors->has('bu_place'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_place') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Main Image ') }}</label>
        <div class="col-md-8">
            <div class="clearfix"><br></div>
            {!! Form::file("image", null, ['class'=>'form-control']) !!}
            @if ($errors->has('image'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Building Images ') }}</label>
        <div class="col-md-8">
            <div class="clearfix"><br></div>
            <input type="file" class="form-control" name="photos[]" multiple />
            @if ($errors->has('image'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
            @endif
        </div>
    </div>




    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Area square') }}</label>

        <div class="col-md-8">
            {!! Form::text("bu_square", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_square'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_square') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Type') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_type", bu_type(),null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_type'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_type') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @if(!isset($user))
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_status", status(),null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_status'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_status') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('KeyWords') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_meta", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_meta'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_meta') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @if(!isset($user))
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-8">
            {!! Form::textarea("bu_small_dis", null , ['class'=>'form-control','rows'=>'4']) !!}
            @if ($errors->has('bu_small_dis'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_small_dis') }}</strong>
        </span>
            @endif

            <div class="alert alert-warning">Maximum no of letters is 160 letter according to google standard</div>
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_langtuite", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_langtuite'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_langtuite') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_latitude", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_latitude'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_latitude') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Large Description') }}</label>
        <div class="col-md-8">
            {!! Form::textarea("bu_larg_dis", null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_larg_dis'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_larg_dis') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Add') }}
        </button>
    </div>
@else
    <!-- Update/delete bu -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Name') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_name", $bu->bu_name , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_name'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_name') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No of Rooms') }}</label>

        <div class="col-md-8">
            {!! Form::text("rooms", $bu->rooms , ['class'=>'form-control']) !!}
            @if ($errors->has('rooms'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('rooms') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Price') }}</label>

        <div class="col-md-8">
            {!! Form::text("bu_price", $bu->bu_price , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_price'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_price') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Operation Type') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_rent", bu_rent() ,null, ['class'=>'form-control']) !!}
            @if ($errors->has('bu_rent'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_rent') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Place ') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_place", bu_place() ,null, ['class'=>'form-control ']) !!}
            @if ($errors->has('bu_place'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_place') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">

        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image ') }}</label>
        <div class="col-md-8">
            @if(isset($bu))
                @if($bu->image !='')
                    <img src="{{ Request::root().'/website/bu_images/'.$bu->image }}" width="100px" >
                    <div class="clearfix"><br></div>
                @endif
            @endif
            {!! Form::file("image", null, ['class'=>'form-control']) !!}
            @if ($errors->has('image'))
                <span class="invalid-feedback">
                 <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>





    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Area square') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_square", $bu->bu_square , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_square'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_square') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Property Type') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_type", bu_type(),$bu->type , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_type'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_type') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @if(!isset($user))
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
        <div class="col-md-8">
            {!! Form::select("bu_status", status(),null , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_status'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_status') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('KeyWords') }}</label>

        <div class="col-md-8">
            {!! Form::text("bu_meta", $bu->bu_meta , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_meta'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_meta') }}</strong>
        </span>
            @endif
        </div>
    </div>
    @if(!isset($user))
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        <div class="col-md-8">
            {!! Form::textarea("bu_small_dis", $bu->bu_small_dis , ['class'=>'form-control','rows'=>'4']) !!}
            @if ($errors->has('bu_small_dis'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_small_dis') }}</strong>
        </span>
            @endif

            <div class="alert alert-warning">Maximum no of letters is 160 letter according to google standard</div>
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_langtuite", $bu->bu_langtuite , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_langtuite'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_langtuite') }}</strong>
        </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>
        <div class="col-md-8">
            {!! Form::text("bu_latitude", $bu->bu_latitude , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_latitude'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_latitude') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Large Description') }}</label>
        <div class="col-md-8">
            {!! Form::textarea("bu_larg_dis", $bu->bu_larg_dis , ['class'=>'form-control']) !!}
            @if ($errors->has('bu_larg_dis'))
                <span class="invalid-feedback">
            <strong>{{ $errors->first('bu_larg_dis') }}</strong>
        </span>
            @endif
        </div>
    </div>
 <!-- Button [update -delete] -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update Property') }}
            </button>
                <a class="btn btn-danger" href="{{ url('/adminpanel/bu/'.$bu->id.'/delete') }}">Delete Property</a>
        </div>
    </div>

@endif


