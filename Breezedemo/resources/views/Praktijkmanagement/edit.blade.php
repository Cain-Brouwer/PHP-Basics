<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-dark">

    <div class="container d-flex justify-content-center">
        <div class="col-md-6">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
            @endif

            <form action="{{ route('praktijkmanagement.update', $user->Id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="rolename" class="form-label">Gebruikersrol</label>
                    <select class="form-select" id="rolename" name="rolename" required>
                        <option value="">Selecteer een rol</option>
                        @foreach ($userroles as $role)
                            <option value="{{ $role->rolename }}" {{ $user->rolename === $role->rolename ? 'selected' : '' }}>
                                {{ $role->rolename }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('rolename')" class="mt-2" />
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                    <a href="{{ route('praktijkmanagement.userroles') }}" class="btn btn-secondary">Annuleren</a>
                </div>
            </form>

        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
