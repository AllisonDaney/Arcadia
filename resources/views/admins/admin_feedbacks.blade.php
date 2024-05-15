@extends('layouts/admin')

@section('title', 'Arcadia - Admin Avis')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Avis
        </h1>
        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contenu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Note
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Statut
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr class="bg-armadillo-50 border-b hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $feedback['pseudo'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $feedback['content'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $feedback['rating'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $feedback['status'] }}
                            </td>
                            <td id="csrf_row_{{ $feedback['id'] }}" class="px-6 py-4 w-1/5">
                                @if($feedback['status'] === 'pending')
                                    @csrf
                                    <button type="button"
                                        data-id="{{ $feedback['id'] }}"
                                        data-status="accepted"
                                        class="admin_feedback_status_button focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    >
                                        Valider
                                    </button>
                                    <button type="button" data-id="{{ $feedback['id'] }}"
                                        data-status="refused"
                                        class="admin_feedback_status_button focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                        Refuser
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        window.addEventListener('load', function() {
            const updateButtons = document.querySelectorAll('.admin_feedback_status_button')

            for (let button of updateButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const feedbackId = button.getAttribute('data-id')
                    const feedbackStatus = button.getAttribute('data-status')

                    await fetch(`/feedbacks/${feedbackId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": document.querySelector(`#csrf_row_${feedbackId} input[name="_token"]`)?.value
                        },
                        method: 'PUT',
                        body: JSON.stringify({
                            status: feedbackStatus
                        })
                    });

                    window.location.reload()
                })
            }
        })
    </script>
@endsection
