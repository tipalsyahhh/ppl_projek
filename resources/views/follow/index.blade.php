@extends('layout.master')

@section('tabel')
    Pilih Destinasi Wisata anda
@endsection

<style>
    .profile-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    .profile-image {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        cursor: pointer;
        object-fit: cover;
        margin-right: 10px;
    }

    .profile-name {
        font-weight: bold;
    }

    .btn-see-profile {
        margin-top: 10px;
    }

    #profile-modal img {
        max-width: 100%;
        max-height: 100%;
    }
</style>

@section('content')
    <div class="row">
        @foreach ($allUsers as $userItem)
            <div class="col-md-4 mb-4">
                <div class="profile-card">
                    <img class="profile-image" src="{{ isset($userItem->profileImage) ? asset('storage/' . $userItem->profileImage->image_path) : asset('storage/default_profile.png') }}" alt="Profile Image" data-toggle="modal" data-target="#profile-modal">
                    <div class="profile-name">{{ $userItem->user }}</div>
                    <a href="{{ route('follow.profile', ['userId' => $userItem->id]) }}" class="btn btn-warning btn-see-profile">Lihat Profil</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="modal-image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    // Handle click event for profile images to open the modal
    const profileImages = document.querySelectorAll('.profile-image');
    const modalImage = document.getElementById('modal-image');
    profileImages.forEach(image => {
        image.addEventListener('click', function() {
            const imgSrc = image.getAttribute('src');
            modalImage.setAttribute('src', imgSrc);
        });
    });
</script>
@endsection
