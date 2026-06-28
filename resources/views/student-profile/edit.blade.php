<form method="POST" action="{{ route('student-profile.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <x-input-label for="identity_number" value="Nomor Identitas Registrasi" />

        <x-text-input
            id="identity_number"
            class="block mt-1 w-full"
            :value="auth()->user()->identity_number"
            disabled />
    </div>

    <div class="mb-4">
        <x-input-label for="nis" value="NIS" />

        <x-text-input
            id="nis"
            class="block mt-1 w-full"
            type="text"
            name="nis"
            :value="old(
                'nis',
                $studentProfile->nis ?? auth()->user()->identity_number
            )"
            required />

        <x-input-error :messages="$errors->get('nis')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="name" value="Nama Lengkap" />

        <x-text-input
            id="name"
            class="block mt-1 w-full"
            :value="auth()->user()->name"
            disabled />
    </div>

    <div class="mb-4">
        <x-input-label for="major" value="Jurusan" />

        <x-text-input
            id="major"
            class="block mt-1 w-full"
            type="text"
            name="major"
            :value="old('major', $studentProfile->major ?? '')"
            required />

        <x-input-error :messages="$errors->get('major')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="class" value="Kelas" />

        <x-text-input
            id="class"
            class="block mt-1 w-full"
            type="text"
            name="class"
            :value="old('class', $studentProfile->class ?? '')"
            required />

        <x-input-error :messages="$errors->get('class')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="address" value="Alamat" />

        <x-text-input
            id="address"
            class="block mt-1 w-full"
            type="text"
            name="address"
            :value="old('address', $studentProfile->address ?? '')"
            required />

        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="phone" value="Nomor Telepon" />

        <x-text-input
            id="phone"
            class="block mt-1 w-full"
            type="text"
            name="phone"
            :value="old('phone', $studentProfile->phone ?? '')"
            required />

        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>
    
    <div class="mb-4">
        <x-input-label for="birth_date" value="Tanggal Lahir" />

        <x-text-input
            id="birth_date"
            class="block mt-1 w-full"
            type="date"
            name="birth_date"
            :value="old('birth_date', $studentProfile->birth_date ?? '')"
            required />

        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="photo" value="Foto Profil" />

        <x-text-input
            id="photo"
            class="block mt-1 w-full"
            type="file"
            name="photo"
            :value="old('photo', $studentProfile->photo ?? '')" />
    </div>

    <x-primary-button>
        Simpan Profil
    </x-primary-button>
</form>