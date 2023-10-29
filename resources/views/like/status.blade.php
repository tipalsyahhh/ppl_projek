@extends('layout.master')

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
            @endforeach
        </div>
    </div>
</div>
<script>
    // Fungsi untuk memainkan suara saat tombol "Like" diklik
    document.getElementById('like-button').addEventListener('click', function() {
        var audio = document.getElementById('like-audio');
        audio.play();
    });
</script>
@endsection
