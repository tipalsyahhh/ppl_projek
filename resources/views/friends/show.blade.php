@extends('layout.master')

@section('content')
    <h1>Permintaan Pertemanan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach($friendRequests as $request)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($request->user && $request->user->profileImage)
                        <img src="{{ asset('storage/' . $request->user->profileImage->image_path) }}" class="card-img-top" alt="Foto Profil {{ $request->user->name }}">
                    @else
                        <img src="{{ asset('path-to-default-image.jpg') }}" class="card-img-top" alt="Foto Profil Default">
                    @endif

                    <div class="card-body">
                        @if ($request->user)
                            <h5 class="card-title">{{ $request->user->namadepan }} {{ $request->user->namabelakang }}</h5>
                            <p class="card-text">{{ $request->user->email }}</p>
                        @endif

                        <form action="{{ route('friendship.acceptRequest', ['user_id' => $request->user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Terima Pertemanan</button>
                        </form></br>
                        <form action="{{ route('friendship.rejectRequest', ['user_id' => $request->user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak Pertemanan</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection