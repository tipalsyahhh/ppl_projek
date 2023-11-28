@extends('layout.master')

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
            @endforeach
        </div>
    </div>
</div>
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