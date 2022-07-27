<div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  border border-gray-100">

                <section class="rtl m-5 text-gray-700 body-font overflow-hidden mt-4 lg:mt-16">
                    <a class="flex hover:text-blue-500 hover:underline transition duration-300 " wire:click="back" href="#" onClick="history.go(-1)">
                        <svg class="h-4 ml-1" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                        <p class="ml-2 mb-4 text-xs ttext-blue-500 " >عودة  </p>
                    </a>

                    @if($commentedType === 'article')
                        <h1 class="text-4xl text-gray-900 font-semibold relative">{{$article->title}}</h1>
                        <p class="mt-2 underline">{{$article->author->name}}</p>
                        <div class="pt-4 pb-8 w-full flex flex-col items-start">
                            <div class="mb-1 flex items-center">
                                <span class="inline-block ml-4 text-gray-900 font-semibold">تم نشره <time datetime="2022-05-21 00:00:00">{{$article->created_at->format('Y-m-d')}}</time></span>
                                @foreach($article->tags as $tag)
                                    <button class="hover:border-gray-300 inline-block py-0.5 px-2 ml-1 rounded bg-white text-gray-700 border border-gray-600 text-xs font-semibold tracking-widest tag-beginners">{{$tag->name}}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex">
                            <div class=" mr-2 flex">
                                <p class="ml-2">{{$article->comments->count()}}</p>
                                <a href="/comments/article/{{$article->id}}">
                                    <svg class="w-6 h-6 hover:text-blue-500 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                </a>
                            </div>
                        </div>
                    @else
                        @if($comment->name)
                            <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="" class="inline-block hover:underline">{{$comment->name}}</a></h2>
                        @else
                            <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="" class="inline-block hover:underline">{{$comment->author->name}}</a></h2>
                        @endif
                        <p class="leading-relaxed mb-4 text-lg">{{$comment->body}}</p>
                            <div class="flex">
                                <div class=" mr-2 flex">
                                    <p class="ml-2">{{$comment->comments->count()}}</p>
                                    <a href="/comments/comment/{{$comment->id}}">
                                        <svg class="w-6 h-6 hover:text-blue-500 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                    </a>
                                </div>
                            </div>
                    @endif



                </section>

            </div>
        </div>
    </div>



    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-100 rounded-lg rounded-t-none">
                <div class="pr-4 rtl border border-gray-100">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    @else
                        <p> أدخل إسمك </p>
                        <input wire:model="userName" class="border border-1 border-gray-400" id="tagInput" list="tags">


                    @endif

                    <p class="my-4"> إضافة تعليق </p>

                    <div class="mb-4">
                        <div >
                        <textarea wire:model="commentBody" class="border border-1 border-gray-400 block w-1/2 " rows="5"  id="tagInput" list="tags"></textarea>
{{--                        <input wire:model="commentBody" class="border border-1 border-gray-400" id="tagInput" list="tags">--}}
                        <button wire:click="comment()" class="mt-4 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أضف</button>

                        </div>
                    </div>
                </div>
                @foreach( $comments as $comment)
                    <div class="rtl w-full flex flex-col items-start">
                        <div class="p-4 border-b-2 border-gray-100 w-full">
                            @if($comment->name)
                                <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="" class="inline-block hover:underline">{{$comment->name}}</a></h2>
                            @else
                                <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="" class="inline-block hover:underline">{{$comment->author?->name}}</a></h2>
                            @endif
                            <p class="leading-relaxed mb-4 text-lg">{{$comment->body}}</p>


                            <div class="flex mb-4">
{{--                                @if($isLiked)--}}
{{--                                    <div class="mt-4 flex">--}}
{{--                                        <p class="ml-2">{{$comment->likes}}</p>--}}
{{--                                        <button wire:click="unLike({{$comment}})"><svg  class="hover:text-blue-500 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path></svg></button>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="mt-4 flex">--}}
{{--                                        <p class="ml-2">{{$comment->likes}}</p>--}}
{{--                                        <button wire:click="like{{$comment}}"><svg class="hover:text-blue-500 w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

                                <div class="mt-4 mr-2 flex">
                                    <p class="ml-2">{{$comment->comments->count()}}</p>
                                    <a wire:click="viewComments({{$comment->id}})">
                                        <svg class="w-6 h-6 hover:text-blue-500 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


</div>
