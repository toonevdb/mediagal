@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">__('user.info')</div>

                <div class="card-body">
                    <img class="img-fluid" src="//placehold.it/600x600">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">__('user.recent')</div>
                <div class="card-body">
                    <content-list :items="{{ json_encode($user->content) }}" :selected="[]"></content-list>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
