<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TecBlog - O seu Blog de tecnologia</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-yellow-500">
        <div class="container py-5">
            <h1 class="text-center"><a href={{route('home')}}> Tec <span class="text-white ">Blog</span></a></h1>
            <nav>
                <ul class="flex justify-center">
                    <li><a href="{{route('home')}}" class="mx-5">Home</a></li>
                    @foreach ($categories as $category)
                        <li><a href="{{route('category',$category->id)}}" class="mx-5">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </header>
    <main class="bg-gray-200 py-5">
        <section>
            <div class="container flex">
                <div class="w-8/12">
                    <div class="pr-5 ">

                        <div class="bg-white p-5 mt-5">
                            <div class="flex justify-between items-baseline">
                                <div>
                                    <h2>{{ $post->title }}</h2>
                                    <p>Postado {{ $post->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="flex">
                                    @foreach ($post->category as $category)
                                        <p class="mx-2 bg-yellow-400 rounded-full px-3 text-white">
                                            {{ $category['title'] }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            {{-- <img src="" alt=""> --}}
                                <img class="w-full" src="{{ $post->getFirstMediaUrl() }}" alt="">
                            <p>{!! $post->text !!}</p>
                        </div>

                    </div>
                </div>
                <div class="w-4/12">
                    <div class="pl-5 ">
                        <div class="bg-white mt-5 p-5">
                            <h3 class="bg-gray-200 text-gray-400">Postagens recentes</h3>
                            @foreach ($posts as $post)
                                <div class="py-2">
                                    <h4>{{ $post->title }}</h4>
                                    <a href="{{route('post',$post->slug)}}">Leia mais</a>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="bg-white mt-5 p-5">
                            <h3 class="bg-gray-200 text-gray-400">Categorias</h3>
                            <ul class="">
                                @foreach ($categories as $category)
                                    <li><a href="{{route('category',$category->id)}}" class="text-yellow-500">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <header class="bg-gray-200 py-5 border-t-4 border-gray-300 ">
        <p class="text-center text-gray-800">Todos os direitos reservados a TecBlog &copy;</p>
    </header>
</body>

</html>
