<section class="mb-20">
    <div class=" sm:max-w-xl sm:mx-auto">
        <h2 class="text-3xl text-center font-semibold text-asparagus-500 font-title mb-10">Votre avis nous interesse</h2>
        <form action="{{ route('feedbacks_create') }}" method="post" class="bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg">
            @csrf
            @include('partials.form.star_review', [
                'name' => 'rating',
            ])
            @include('partials.form.input', [
                'class' => 'w-3/4',
                'label' => 'Pseudo',
                'name' => 'pseudo',
                'required' => true, 
                'hasError' => !!$errors->first('pseudo'),
            ])
            @include('partials.form.textarea', [
                'class' => 'w-3/4',
                'label' => 'Votre message',
                'name' => 'content',
                'required' => true,
                'hasError' => !!$errors->first('content'),
            ])
            <button class="w-3/4 py-3 my-8 text-lg bg-gradient-to-r from-asparagus-400 to-asparagus-600 rounded-xl text-asparagus-50">Envoyer</button>
        </form>
    </div>
</section>