@extends('layouts/default')

@section("title", "Arcadia - Infos")

@section("content")
    <main class="container mx-auto py-20 px-4">
        <h1 class="text-5xl font-bold text-center font-title text-asparagus-500">
            Horaires
        </h1>

        <table class="mx-auto mt-14 w-full max-w-2xl text-sm text-left rtl:text-right text-gray-700 shadow-md sm:rounded-lg">
            <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100">
                <tr>
                    <th scope="col" class="px-6 py-3 border ">
                        Jour
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Heure d'ouverture
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Heure de fermeture
                    </th>
                </tr>
            </thead>
            @foreach ($hours as $hour)
                <tbody>
                    <tr class="bg-armadillo-50 border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  ">
                            {{ $hour->day }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $hour->opening_time }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $hour->closing_time }}
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <h2 class="font-title text-3xl text-center font-semibold text-asparagus-500 my-14">Accès</h2>
        <div class="flex sm:flex-row flex-col-reverse justify-center gap-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1122.0771972379662!2d-2.1715071345697714!3d48.018261975467986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480fadaa44ee505d%3A0xb5f0a5bf632ee2f4!2s14%20Rue%20des%20Forges%2C%2035380%20Paimpont!5e0!3m2!1sen!2sfr!4v1714048238339!5m2!1sen!2sfr" class="w-full sm:w-[600px] h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="text-asparagus-500">
                Arcadia Zoo <br>
                14 Rue des Forges <br>
                35380 Paimpont <br><br>
                04 78 97 60 20
            </div>
        </div>
    </main>
@endsection
