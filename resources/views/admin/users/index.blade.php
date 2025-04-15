@extends('layouts.dashboard');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>User List</h3>
                    <span>Total User:({{$total}})</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="bg-info">
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $key=>$all)
                        <tr>
                              <td> {{$users->firstitem()+$key}} </td>
                              <td> {{$all->name}} </td>
                              <td> {{$all->email}} </td>
                              <td>
                                @if ($all->profile == null)
                                <img width="30" src="{{ Avatar::create($all->name)->toBase64(); }}" alt="" >
                                  @else
                                  <img width="30" src="{{ asset('uploads/users/profile') }}/{{ $all->profile }}" alt="">
                                  @endif
                            </td>
                              <td> {{$all->created_at}} </td>
                              <td> 
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('delete.user',$all->id)}}">Delete</a>
                                    </div>
                                </div>
                                {{-- <a href="{{route('delete.user',$all->id)}}">
                                <button class="btn btn-danger">Delete</button>
                              </a>  --}}
                            </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection