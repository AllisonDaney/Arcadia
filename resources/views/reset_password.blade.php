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
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center h-full bg-armadillo-50">
  <main class="grid min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8">
    <form action="{{ route('reset_password_post') }}" method="post" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8 w-96 bg-white rounded-xl">
        @csrf
        <h3 class="text-xl font-medium text-asparagus-500">Oubli de mot de passe</h3>
        @include('partials.form.input', [
            'class' => 'w-full',
            'label' => "Nom d'utilisateur",
            'name' => 'username',
            'required' => true,
            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
            'hasError' => !!$errors->first('username'),
        ])
        <button type="submit"
            class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Envoyer</button> 
        <a href="{{ route('landing') }}" class="inline-block text-center rounded-md !w-full bg-asparagus-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-asparagus-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-asparagus-600">Retour à la page d'accueil</a>
    </form>
  </main>
</body>
</html>
