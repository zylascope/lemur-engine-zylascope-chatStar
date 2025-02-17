@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create New Category From A Copy
        </h1>
    </section>
    <div class="content">
        @include('layouts.feedback')
        <div class="box box-primary">
            <div class="box-body add-page">
                <div class="row">
                    <div class="col-md-12">
                    {!! Form::open(['route' => 'categories.store', 'data-test'=>$htmlTag.'-create-form', 'class'=>'validate', 'name'=>$htmlTag.'-create']) !!}

                        @include('categories.fields_from_copy')

                        <!-- Submit Field -->
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            {!! Form::submit('Save And Continue', ['name'=>'action_button','class' => 'btn btn-primary pull-right']) !!}
                            {!! Form::submit('Save', ['name'=>'action_button', 'class' => 'btn btn-primary']) !!}
                            <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
                        </div>


                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ Html::script('js/validation.js') }}
    {{ Html::script('js/clear.js') }}
    {{ Html::script('js/select2.js') }}
@endpush
