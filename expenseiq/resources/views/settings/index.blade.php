<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://kit.fontawesome.com/6b728d9c4e.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#FFFBEA]">

<div class="flex min-h-screen">

    {{-- LEFT SIDEBAR --}}
    @include('settings.sidebar')

    {{-- RIGHT CONTENT --}}
    @include('settings.personal')

</div>

{{-- ========================= --}}
{{-- MODALS --}}
{{-- ========================= --}}

@include('settings.modals.nickname')
@include('settings.modals.fullname')
@include('settings.modals.email')
@include('settings.modals.budget')
@include('settings.modals.password')
@include('settings.modals.clear-data')
@include('settings.modals.delete-account')

<script>

function openModal(id)
{
    document.getElementById(id).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeModal(id)
{
    document.getElementById(id).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

window.onclick = function(e)
{
    document.querySelectorAll('.expenseiq-modal').forEach(function(modal){

        if(e.target === modal)
        {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

    });
}

</script>

</body>

</html>