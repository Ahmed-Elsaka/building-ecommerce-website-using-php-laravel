


<div class="form-group row">
        <div class="col-lg-2">
            <label for="contact_name" class="text-md-right" style="padding-left: 25%" >Name : </label>

        </div>
        <div class="col-md-10">
                {!! Form::text("contact_name", null , ['class'=>'form-control']) !!}
            @if ($errors->has('contact_name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('contact_name') }}</strong>
                </span>
            @endif
        </div>

       <!-- </div> -->
</div>

<div class="clearfix"></div>

<div class="form-group row">
    <div class="col-lg-2">
        <label for="contact_name" class="text-md-right" style="padding-left: 25%" >Email : </label>
    </div>

    <div class="col-md-10">
        {!! Form::text("contact_email", null , ['class'=>'form-control']) !!}
        @if ($errors->has('contact_email'))
            <span class="invalid-feedback">
                    <strong>{{ $errors->first('contact_email') }}</strong>
                </span>
        @endif
    </div>
</div>





<div class="clearfix"></div>

<div class="form-group row">
    <div class="col-lg-2">
        <label for="contact_name" class="text-md-right" style="padding-left: 25%" >Message :</label>

    </div>
<div class="col-md-10">
    {!! Form::textarea("contact_message", null , ['class'=>'form-control']) !!}
    @if ($errors->has('contact_message'))
        <span class="invalid-feedback">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
    @endif
</div>
</div>


<div class="clearfix"></div>

<div class="form-group row">
    <div class="col-lg-2">
        <label for="contact_name" class="text-md-right" style="padding-left: 25%" >Message type:</label>

    </div>

    <div class="col-md-10">
        {!! Form::select("contact_type",contact(), $contact->type , ['class'=>'form-control']) !!}
        @if ($errors->has('contact_type'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
        @endif
    </div>
</div>





<div class="form-group row ">
    <div class="col-lg-6" >
        {!! Form::submit(" Edit ", ['class'=>'form-control btn btn-primary']) !!}
    </div>
    <div class="col-lg-6">
        <a class="btn btn-danger form-control " href="{{ url('/adminpanel/contact/'.$contact->id.'/delete') }}">Delete Message</a>
    </div>
</div>



<div class="clearfix"></div>