<div class="flex-1">

    <div class="mx-auto w-full max-w-[700px] py-8">

        <h1 class="text-[44px] font-extrabold text-[#5D4300]">
            Password & Security
        </h1>

        <p class="text-[24px] text-[#5D4300] mb-10">
            Update your account password.
        </p>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-100 border border-green-300 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4 text-red-700">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('settings.password.update') }}"
            method="POST"
            class="bg-white border border-[#E6B400] rounded-[36px] p-10 space-y-8">

            @csrf
            @method('PUT')

            <div>

                <label class="block font-bold text-[#5D4300] mb-2">
                    Current Password
                </label>

                <input
                    type="password"
                    name="current_password"
                    class="w-full rounded-xl border border-gray-300 px-5 py-4">

            </div>

            <div>

                <label class="block font-bold text-[#5D4300] mb-2">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-gray-300 px-5 py-4">

            </div>

            <div>

                <label class="block font-bold text-[#5D4300] mb-2">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-xl border border-gray-300 px-5 py-4">

            </div>

            <div class="flex justify-end">

                <button
                    class="bg-[#F3C400] hover:bg-yellow-500 px-8 py-4 rounded-xl font-bold text-[#5D4300]">

                    Save Changes

                </button>

            </div>

        </form>

    </div>

</div>