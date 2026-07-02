<!-- Clear Data Modal -->

<div
    id="clearDataModal"
    class="expenseiq-modal hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="w-[600px] bg-white rounded-[36px] border border-[#E6B400] overflow-hidden">

        <!-- Header -->

        <div class="px-10 py-7 border-b border-[#E6B400]">

            <h2 class="text-[34px] font-extrabold text-[#B3123A]">

                Clear All Data

            </h2>

        </div>

        <!-- Body -->

        <div class="px-10 py-8">

            <p class="text-lg text-[#5D4300] leading-relaxed">

                This will permanently delete all of your:

            </p>

            <ul class="list-disc ml-8 mt-4 text-[#5D4300] space-y-2">

                <li>Expenses</li>

                <li>Budgets</li>

                <li>Reports</li>

            </ul>

            <p class="mt-6 text-red-600 font-bold">

                This action cannot be undone.

            </p>

        </div>

        <!-- Footer -->

        <div class="px-10 pb-8 flex justify-end gap-4">

            <button
                type="button"
                onclick="closeModal('clearDataModal')"
                class="px-8 py-3 border rounded-xl hover:bg-gray-100">

                Cancel

            </button>

            <form
                action="{{ route('settings.clear') }}"
                method="POST">

                @csrf

                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-xl font-bold">

                    Delete Everything

                </button>

            </form>

        </div>

    </div>

</div>