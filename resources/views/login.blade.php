@extends('layouts.main_layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5">
                <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes Logo">
                </div>

                <!-- Form -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <form action="/loginSubmit" method="post">
                        @csrf  
                        <div class="mb-3">
                            <label for="text_username" class="form-label">Username</label>
                            <input class="form-control bg-dark text-info" type="text" name="text_username">
                        </div>
                        <div class="mb-3">
                            <label for="text_password" class="form-label">Password</label>
                            <input class="form-control bg-dark text-info" type="text" name="text_password">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-secondary w-100" type="submit">LOGIN</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="text-center text-secondary">
                    <small>&copy; <?= date('Y') ?> Notes</small>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

