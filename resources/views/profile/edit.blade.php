@extends('layouts.main')

@section('container')
<div class="min-h-screen bg-gradient-to-br from-white via-teal-50 to-slate-100 flex flex-col justify-center py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        {{-- Update Profile Info --}}
        <div class="bg-white/90 shadow-2xl rounded-2xl p-8 border border-teal-100">
            <h2 class="text-2xl font-bold text-teal-600 mb-2 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                Edit Profile
            </h2>
            <p class="text-sm text-slate-500 mb-6">Update your account's profile information and email address.</p>
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Update Password --}}
        <div class="bg-white/90 shadow-2xl rounded-2xl p-8 border border-teal-100">
            <h2 class="text-2xl font-bold text-teal-600 mb-2 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3v2a3 3 0 01-3 3h-1a3 3 0 01-3-3v-2z" /><path stroke-linecap="round" stroke-linejoin="round" d="M5 13v-2a7 7 0 0114 0v2" /></svg>
                Update Password
            </h2>
            <p class="text-sm text-slate-500 mb-6">Ensure your account is using a long, random password to stay secure.</p>
            @include('profile.partials.update-password-form')
        </div>

        {{-- Delete Account --}}
        <div class="bg-white/90 shadow-2xl rounded-2xl p-8 border border-red-200">
            <h2 class="text-2xl font-bold text-red-600 mb-2 flex items-center gap-2">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                Delete Account
            </h2>
            <p class="text-sm text-slate-500 mb-6">Permanently delete your account and all associated data.</p>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
