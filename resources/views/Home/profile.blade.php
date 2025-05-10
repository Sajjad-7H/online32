<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Fade-In Animation */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Profile Card Slide Animation */
        .slide-in {
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Hover animation for the profile picture */
        .profile-pic {
            transition: transform 0.3s ease, box-shadow 0.3s ease-in-out;
        }

        .profile-pic:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Smooth transition for input fields */
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="file"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        /* Submit button with animation on hover */
        .btn-animated {
            transition: transform 0.2s ease-in-out, background-color 0.3s ease;
        }

        .btn-animated:hover {
            transform: translateY(-4px);
            background-color: #0056b3;
        }

        /* Back button animation */
        .back-btn {
            transition: transform 0.2s ease;
        }

        .back-btn:hover {
            transform: scale(1.1);
            background-color: #6c757d;
        }

        /* For larger screens, delay the appearance of the form */
        @media (min-width: 768px) {
            .fade-in {
                animation: fadeIn 1.5s ease-in-out;
            }

            .slide-in {
                animation: slideIn 1.2s ease-out;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5 fade-in">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="shop" class="btn btn-secondary back-btn">← Back</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Success and Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Update Form Card -->
            <div class="card shadow-sm slide-in">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture Display -->
                        <div class="mb-3 text-center">
                            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/120' }}"
                                 alt="Profile" class="rounded-circle profile-pic" width="120" height="120">
                        </div>

                        <!-- Name Field -->
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                        </div>

                        <!-- New Password Field -->
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <!-- Profile Picture Upload Field -->
                        <div class="mb-3">
                            <label>Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn btn-primary btn-animated">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
