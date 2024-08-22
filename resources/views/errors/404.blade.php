<!doctype html>
<html lang="fr" class="h-full">
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ env('VITE_APP_URL') }}/resources/css/app.css">
</head>
<body class="flex items-center justify-center h-full bg-armadillo-50">
  <main class="grid min-h-full place-items-center  px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
      <p class="text-xl font-semibold text-asparagus-600">404</p>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page non trouvée</h1>
      <p class="mt-6 text-base leading-7 text-gray-600">Nous sommes désolé mais la page que vous cherchez n'existe pas.</p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{ route('landing') }}" class="rounded-md bg-asparagus-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-asparagus-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-asparagus-600">Retour à la page d'accueil</a>
        <a href="{{ route('contacts') }}" class="text-sm font-semibold text-gray-900">Contacter le support <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
  </main>
</body>
</html>
