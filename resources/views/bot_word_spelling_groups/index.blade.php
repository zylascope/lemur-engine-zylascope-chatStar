@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Bot Word Spelling Groups</h1>
        <h1 class="pull-right">
           <a class="btn btn-sm btn-primary pull-right" style="margin-top: -5px;margin-bottom: 0px" href="{{ route('botWordSpellingGroups.create') }}">Add New</a>
        </h1>
        <div class="clearfix"></div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('layouts.feedback')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive">
                    @include('bot_word_spelling_groups.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
