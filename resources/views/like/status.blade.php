@extends('layout.master')

<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('desain/css/status.css')}}">

@section('content')
<audio id="like-audio" src="{{ asset('like.mp3') }}" style="display: none" loop></audio>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center">
                <div class="user-postingan">
                    <img class="img-profile rounded-circle" style="width: 40px; height: 40px; margin-right: 5px"
                        src="{{ $user->profileImage ? asset('storage/' . $user->profileImage->image_path) : asset('storage/default_profile.png') }}">
                </div>
                <a href="{{ route('statuses.create') }}" class="form-control"
                    style="text-decoration: none; border-radius: 50px;">
                    create status
                </a>
            </div><br />
            @php
            $statuses = $statuses->reverse(); // Membalik urutan data
            @endphp

            @foreach ($statuses as $status)
            <div class="modal-content">
                <div class="modal-body">
                    <div class="info-posting">
                        <div class="user-postingan">
                            <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                                alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                            <h8 class="mb-0" style="margin-left: 10px; color: #080808">{{ $status->user->user }}
                            </h8>
                        </div>
                    </div>
                    <img src="{{ asset($status->image) }}" class="profile-image" data-toggle="modal" data-target="#profile-modal" alt="Profile Image">
                    <div class="button-user-like-comen">
                        <form action="{{ route('like.add', ['status_id' => $status->id]) }}" method="POST">
                            @csrf
                            <button type="submit" id="like-button"><i class="bi bi-heart"
                                    style="font-size: 1.5em;"></i></button>
                        </form>
                        <a href="{{ route('like.comments', ['status_id' => $status->id]) }}">
                            <i class="far fa-comment" style="font-size: 1.5em;"></i>
                        </a>
                    </div>
                    <h7 class="card-title" style="color: #080808">{{ $status->caption }}</h7>
                    <div style="color: #080808; font-size: 12px; margin-top: 2px">
                        {{ $status->created_at->diffForHumans() }}
                    </div>
                    <div class="mt-2">
                        <span class="mr-3" style="color: #080808">
                            <strong>{{ $status->likes_count }}</strong> Likes
                        </span>
                        <span style="color: #080808">
                            <strong>{{ $status->comments_count }}</strong> Comments
                        </span>
                    </div>
                </div>
            </div>
=======
<style>
    .button-container {
        display: flex; /* Mengatur kontainer tombol menjadi flex */
    }

    .button-container button,
    .button-container a {
        margin-right: 10px; /* Memberikan jarak antara tombol */
    }
</style>

@section('content')
<audio id="like-audio" src="{{ asset('like.mp3') }}" style="display: none"  loop></audio>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($statuses as $status)
                <div class="card my-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="profile-image">
                                <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                            </div>
                            <h8 class="mb-0">{{ $status->user->user }}</h8>
                        </div>
                        <div>
                            {{ $status->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <img src="{{ asset('' . $status->image) }}" class="card-img-top" alt="Status Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $status->caption }}</h5>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="button-container">
                                <form action="{{ route('like.add', ['status_id' => $status->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm" id="like-button"><i class="far fa-thumbs-up"></i> Like</button>
                                </form>
                                <a href="{{ route('like.comments', ['status_id' => $status->id]) }}" class="btn btn-light btn-sm">
                                    <i class="far fa-comment"></i> Comment
                                </a>
                            </div>
                            <div>
                                <span class="mr-3">
                                    <strong>{{ $status->likes_count }}</strong> Likes
                                </span>
                                <span>
                                    <strong>{{ $status->comments_count }}</strong> Comments
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
            @endforeach
        </div>
    </div>
</div>
<<<<<<< HEAD
<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="Profile Image">
            </div>
        </div>
    </div>
</div>
<script>
    // Fungsi untnkan suara saat tombol "Like" diklik
    document.getElementById('like-button').addEventListener('click', function () {
        var audio = document.getElementById('like-audio');
        audio.play();
    });

    // Handle click event for profile images to open the modal
    const profileImages = document.querySelectorAll('.profile-image');
    profileImages.forEach(image => {
        image.addEventListener('click', function () {
            const imgSrc = image.getAttribute('src');
            $('#profile-modal img').attr('src', imgSrc);
        });
    });
</script>
@endsection
=======
<script>
    // Fungsi untuk memainkan suara saat tombol "Like" diklik
    document.getElementById('like-button').addEventListener('click', function() {
        var audio = document.getElementById('like-audio');
        audio.play();
    });
</script>
@endsection
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
