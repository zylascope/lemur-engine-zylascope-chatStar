@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turns
        </h1>
    </section>
    <div class="content">
        @include('layouts.feedback')
        <div class="box box-primary">
            <div class="box-body">
                <div class="callout callout-info col-md-12">You cannot create turns directly, they are automatically created when the bot talks to a user.</div>
            </div>
        </div>


    </div>
@endsection
