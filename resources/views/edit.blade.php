@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ url('/update') }}" method="post">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="id" value="{{ $link->id }}">
                        Original Url
                        <input type="url" name="url" value="{{ $link->url }}"  class="col-8 mb-2"><br>

                        <label for="">Current Status: {{ $link->disabled == '0'? 'Enabled':'Disabled'}}</label> <br>
                        Edit Status
                        <select class="form-select"  name="disabled">
                            <option value="{{0}}">Enable</option>
                            <option value="{{1}}">Disable</option>
                        </select> <br>
                        <button class="btnt btn-outline-primary mt-3 " type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
