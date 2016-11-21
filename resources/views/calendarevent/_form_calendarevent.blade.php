<div class="form-group">
  {!! Form::label('title','Naam:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('email','Email:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('phone','Telefoon:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('period','Periode:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::text('period', null, ['class' => 'form-control daterange']) !!}
</div>

 @if (isset($calendarevent))
<div class="form-group">
  {!! Form::label('color','Kleur:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::select('color', ['red'    => 'Rood', 
                             'blue'   => 'Blauw', 
                             'green'  => 'Groen'], $calendarevent->background_color ) !!}
</div>
@endif

<div class="form-group">
  {!! Form::label('description','Opmerkingen:', ['class' => 'col-lg-2 control-label'] ) !!}
  {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40]) !!}
</div>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        <p> {{ $error }} </p>
    @endforeach
   </div>
@endif

<div>
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary'] ) !!}
</div>
