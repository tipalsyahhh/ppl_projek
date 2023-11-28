@extends('layout.master')

@section('content')
    <h1>Daftar Teman</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @if(isset($friends))
            @foreach($friends as $friend)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($friend->friend->profileImage && $friend->friend->profileImage->image_path)
                            <img src="{{ asset('storage/' . $friend->friend->profileImage->image_path) }}" class="card-img-top" alt="Foto Profil {{ $friend->friend->name }}">
                        @else
                            <img src="{{ asset('path-to-default-image.jpg') }}" class="card-img-top" alt="Foto Profil Default">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $friend->friend->namadepan }} {{ $friend->friend->namabelakang }}</h5>
                            <p class="card-text">{{ $friend->friend->email }}</p>
                            <a href="{{ route('friends.profile', ['userId' => $friend->friend->id]) }}" class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada teman yang ditemukan.</p>
        @endif
    </div>
</div>
@endsection
