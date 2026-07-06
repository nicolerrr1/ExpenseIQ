<div class="space-y-6">

    <!-- Header -->
    <div>

        <h1 class="text-[48px] font-extrabold text-[#4D3900] leading-none">
            Expenses
        </h1>

        <p class="text-[#6C6C6C] text-lg mt-2">
            Track your daily expenses
        </p>

    </div>

    <!-- Add Expense -->
    <div class="bg-white border-2 border-yellow-400 rounded-[28px] p-8">

        <h2 class="text-2xl font-bold text-[#5D4300] mb-6">
            Add Expense
        </h2>

        <form action="{{ route('expenses.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <!-- Description -->
                <div>

                    <label class="block mb-2 font-medium">
                        Description
                    </label>

                    <input
                        type="text"
                        name="description"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required>

                </div>

                <!-- Category -->
                <div>

                    <label class="block mb-2 font-medium">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Amount -->
                <div>

                    <label class="block mb-2 font-medium">
                        Amount
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="amount"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required>

                </div>

                <!-- Date -->
                <div>

                    <label class="block mb-2 font-medium">
                        Date
                    </label>

                    <input
                        type="date"
                        name="expense_date"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required>

                </div>

            </div>

            <!-- Notes -->
            <div class="mt-6">

                <label class="block mb-2 font-medium">
                    Notes
                </label>

                <textarea
                    name="notes"
                    rows="4"
                    class="w-full rounded-xl border border-gray-300 p-3"></textarea>

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 mt-8">

                <button
                    type="reset"
                    class="px-8 py-3 rounded-xl border border-gray-300">

                    Cancel

                </button>

                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl bg-[#F5C000] font-semibold hover:bg-yellow-500">

                    Save Expense

                </button>

            </div>

        </form>

    </div>

    <!-- Expense Record -->
    <div class="bg-white border-2 border-yellow-400 rounded-[28px] p-8">

        <h2 class="text-2xl font-bold text-[#5D4300] mb-6">
            Expense Record
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-yellow-300">

                        <th class="text-left py-4">Date</th>

                        <th class="text-left">Category</th>

                        <th class="text-left">Description</th>

                        <th class="text-right">Amount</th>

                        <th class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($expenses as $expense)

                    <tr class="border-b border-gray-100 hover:bg-yellow-50">

                        <td class="py-4">
                            {{ $expense->expense_date->format('M d, Y') }}
                        </td>

                        <td>
                            {{ $expense->category->category_name }}
                        </td>

                        <td>
                            {{ $expense->description }}
                        </td>

                        <td class="text-right font-semibold">
                            ₱{{ number_format($expense->amount,2) }}
                        </td>

                        <td>

                            <div class="flex justify-center gap-4">

                             <button
                                type="button"
                                onclick="openEditModal(
                                    '{{ route('expenses.update',$expense) }}',
                                    '{{ $expense->description }}',
                                    '{{ $expense->amount }}',
                                    '{{ $expense->expense_date->format('Y-m-d') }}',
                                    '{{ $expense->category_id }}',
                                    '{{ $expense->note }}'
                                )"
                                class="w-10 h-10 rounded-full bg-[#FFEFC2] flex items-center justify-center hover:bg-yellow-300 transition">

                                <i class="fa-solid fa-pen-to-square text-[#6A4B00]"></i>

                            </button>

                                <button
                                    type="button"
                                    onclick="openDeleteModal('{{ route('expenses.destroy',$expense) }}')"
                                    class="w-10 h-10 rounded-full bg-[#FFD8D8] flex items-center justify-center hover:bg-red-300">

                                    <i class="fa-solid fa-trash text-red-600"></i>

                                </button>

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this expense?')"
                                        class="text-red-600 hover:text-red-800">

                                

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-10 text-gray-500">

                            No expenses recorded.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Edit Modal -->

    <div
    id="editModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-[28px] w-[720px] p-8">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-[#5D4300]">

                    Edit Expense

                </h2>

                <button
                    onclick="closeEditModal()"
                    class="text-3xl">

                    &times;

                </button>

            </div>

            <form
                id="editForm"
                method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">

                    <div>

                        <label>Description</label>

                        <input
                            id="edit_description"
                            name="description"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label>Amount</label>

                        <input
                            id="edit_amount"
                            type="number"
                            step="0.01"
                            name="amount"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label>Date</label>

                        <input
                            id="edit_date"
                            type="date"
                            name="expense_date"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label>Category</label>

                        <select
                            id="edit_category"
                            name="category_id"
                            class="w-full border rounded-xl p-3">

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->category_name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="mt-6">

                    <label>Notes</label>

                    <textarea
                        id="edit_note"
                        name="notes"
                        rows="4"
                        class="w-full border rounded-xl p-3"></textarea>

                </div>

                <div class="flex justify-end gap-4 mt-8">

                    <button
                        type="button"
                        onclick="closeEditModal()"
                        class="px-8 py-3 border rounded-xl">

                        Cancel

                    </button>

                    <button
                        class="px-8 py-3 bg-[#F5C000] rounded-xl font-semibold">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Delete Modal -->

    <div
        id="deleteModal"
        class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-[28px] w-[420px] p-8 text-center">

            <div class="w-20 h-20 mx-auto rounded-full bg-red-100 flex items-center justify-center mb-5">

                <i class="fa-solid fa-trash text-red-500 text-3xl"></i>

            </div>

            <h2 class="text-2xl font-bold text-[#4D3900]">

                Delete Expense?

            </h2>

            <p class="text-gray-500 mt-3 mb-8">

                This action cannot be undone.

            </p>

            <form
                id="deleteForm"
                method="POST">

                @csrf
                @method('DELETE')

                <div class="flex gap-4 justify-center">

                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="px-7 py-3 rounded-xl border">

                        Cancel

                    </button>

                    <button
                        class="px-7 py-3 rounded-xl bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Unsaved Changes Modal -->

    <div
        id="unsavedModal"
        class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-[28px] w-[430px] p-8 text-center">

            <div class="w-20 h-20 mx-auto rounded-full bg-yellow-100 flex items-center justify-center mb-5">

                <i class="fa-solid fa-triangle-exclamation text-yellow-500 text-4xl"></i>

            </div>

            <h2 class="text-2xl font-bold text-[#4D3900]">

                Unsaved Changes

            </h2>

            <p class="text-gray-500 mt-3 mb-8">

                You have unsaved changes.<br>
                Do you want to save before leaving?

            </p>

            <div class="flex justify-center gap-4">

                <button
                    id="saveBeforeClose"
                    class="px-7 py-3 rounded-xl bg-[#F5C000] font-semibold">

                    Save Changes

                </button>

                <button
                    onclick="discardChanges()"
                    class="px-7 py-3 rounded-xl border">

                    Discard

                </button>

            </div>

        </div>

    </div>

@push('scripts')

<script>

function openDeleteModal(action){

    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');

    document.getElementById('deleteForm').action = action;

}

function closeDeleteModal(){

    document.getElementById('deleteModal').classList.remove('flex');
    document.getElementById('deleteModal').classList.add('hidden');

}

function openEditModal(action, description, amount, date, category, note){

    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');

    document.getElementById('editForm').action = action;

    document.getElementById('edit_description').value = description;
    document.getElementById('edit_amount').value = amount;
    document.getElementById('edit_date').value = date;
    document.getElementById('edit_category').value = category;
    document.getElementById('edit_note').value = note;

}

function closeEditModal(){

    document.getElementById('editModal').classList.remove('flex');
    document.getElementById('editModal').classList.add('hidden');

}

let formChanged = false;

const editForm = document.getElementById('editForm');

if (editForm) {

    editForm.querySelectorAll('input, textarea, select').forEach(el => {

        el.addEventListener('input', () => {

            formChanged = true;

        });

    });

}

function closeEditModal() {

    if (formChanged) {

        document.getElementById('unsavedModal').classList.remove('hidden');
        document.getElementById('unsavedModal').classList.add('flex');

        return;

    }

    document.getElementById('editModal').classList.remove('flex');
    document.getElementById('editModal').classList.add('hidden');

}

function discardChanges() {

    formChanged = false;

    document.getElementById('unsavedModal').classList.remove('flex');
    document.getElementById('unsavedModal').classList.add('hidden');

    document.getElementById('editModal').classList.remove('flex');
    document.getElementById('editModal').classList.add('hidden');

}

document.getElementById('saveBeforeClose').addEventListener('click', function () {

    formChanged = false;

    editForm.submit();

});
</script>



@endpush