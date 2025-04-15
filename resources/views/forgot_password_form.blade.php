@extends('frontend.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Reset Your Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pass.reset.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="Password" class="form-control" placeholder="Enter Your Password">
                            </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mb-3">
                                <button type="submit" class="btn btn_primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection