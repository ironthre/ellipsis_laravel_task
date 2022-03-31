@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>

                            <th scope="col">Org Url</th>
                            <th scope="col">Short Url</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($links as $link)
                              <tr>
                                <td>{{ $link->url }}</td>
                                <td>{{ $link->short_url }}</td>
                                <td>{{ $link->disabled == '0'? 'Enabled':'Disabled'}}</td>
                                <td>
                                     <span><a href="{{ url('/view/'.$link->id) }}">View</a></span>
                                     <span><a href="{{ url('/edit/'.$link->id) }}">Edit</a></span>
                                     <span><a href="{{ url('/delete/'.$link->id) }}">Delete</a></span>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
