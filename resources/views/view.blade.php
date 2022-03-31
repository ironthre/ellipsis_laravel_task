@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Page') }}</div>

                <div class="card-body">
                    Orginal Url <h5>{{ $links->url }}</h5>
                    Short Url <h5>{{ $links->short_url }}</h5>
                    <a href="{{ url($links->short_url) }}" target="_blank" class="my-4">Exit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
