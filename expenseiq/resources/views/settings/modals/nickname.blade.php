<!-- Nickname Modal -->

<div
    id="nicknameModal"
    class="expenseiq-modal hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="w-[650px] bg-white rounded-[36px] border border-[#E6B400] overflow-hidden">

        <!-- Header -->

        <div class="px-10 py-7 border-b border-[#E6B400] flex items-center justify-between">

            <h2 class="text-[34px] font-extrabold text-[#5D4300]">

                Edit Nickname

            </h2>

            <button
                type="button"
                onclick="closeModal('nicknameModal')">

                <i class="fa-solid fa-xmark text-3xl text-[#5D4300]"></i>

            </button>

        </div>

        <form action="{{ route('settings.profile') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="type"
                value="nickname">


            <div class="flex justify-end gap-4 mt-8">

                <button
                    type="button"
                    onclick="closeModal('nicknameModal')">

                    Cancel

                </button>

                <button
                    type="submit">

                    Save Changes

                </button>

            </div>

        </form>

    </div>

</div>