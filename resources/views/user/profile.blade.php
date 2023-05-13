@extends('layout')

@section('content')

<x-card class=" p-10 rounded max-w-lg mx-auto mt-24">
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Your Profile
    </h2>
    <p class="mb-4">View and update your profile here</p>
</header>

<form method="POST" action="/profile/{{auth()->user()->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6 ml-auto mr-auto">
        <img
            class=" w-24 md:block rounded-full"
            src="{{auth()->user()->profile_pic ? 
            asset('storage/'.auth()->user()->profile_pic) : 
            asset('images/no-image.png')}}"
            alt=""
        />
        <label for="name" class="inline-block text-lg mb-2">
            Change Picture
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="profile_pic"
        />

        @error('name')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
            value="{{auth()->user()->name}}"
        />

        @error('name')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Username</label
        >
        <input
            type="username"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
            value="{{auth()->user()->username}}"
            readonly
        />
        
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
            value="{{auth()->user()->email}}"
        />
        @error('email')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2"
        >
            Change Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
        />

        @error('password')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="password2"
            class="inline-block text-lg mb-2"
        >
            Confirm New Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password_confirmation"
        />

        @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            type="submit"
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Update
        </button>

        <form action="/profile/{{auth()->user()->id}}" method="post">
            @csrf
            @method('DELETE')
                <button class="textwhite bg-red-400 py-2 px-4 hover:bg-red-500 rounded">Delete</button>
        </form>
    </div>
</form>
</x-card>
@endsection