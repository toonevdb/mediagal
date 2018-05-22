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
                    @forelse($user->content as $content)
                        <div class="">
                            {{ $content->id }}
                        </div>
                    @empty
                        <em>__('user.no_uploads')</em>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
