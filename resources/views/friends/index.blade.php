@extends('layout.master')

@section('content')
    <h1>Daftar Pengguna</h1>
    <div class="row">
        @foreach ($friendUsers as $friendUser)
            @if (!$friendUser->isFriendWith(auth()->user()))
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ isset($friendUser->profileImage) ? asset('storage/' . $friendUser->profileImage->image_path) : asset('path-to-default-image.jpg') }}" class="card-img-top" alt="Foto Profil {{ $friendUser->namadepan }} {{ $friendUser->namabelakang }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $friendUser->namadepan }} {{ $friendUser->namabelakang }}</h5>
                            <p class="card-text">{{ $friendUser->email }}</p>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('friendship.sendRequest') }}" method="POST">
                                @csrf
                                <input type="hidden" name="friend_id" value="{{ $friendUser->id }}">
                                <button type="submit" class="btn btn-primary btn-block">Kirim Permintaan Pertemanan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
