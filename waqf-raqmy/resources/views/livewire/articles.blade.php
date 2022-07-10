<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <x-slot name="header">
        <div class="rtl">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                مقالاتي
            </h2>

        </div>


    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rtl bg-white shadow-xl sm:rounded-lg">
                <div class="grid gap-4 grid-cols-3 p-2">
                    @foreach($articles as $article)
                        <div class="p-4 h-56 border border-gray-100 flex flex-col justify-between overflow-hidden">
                            <div>
                                {{$article->title}}

                                <p class="mt-2">
                                    {!! $article->body !!}
                                </p>
                            </div>

                            <div class="grid grid-cols-3 gap-4 ">
                                <button wire:click="delete({{$article}}, '{{$loop->index}}')" type="button"
                                        class="border border-red-400 text-red-600 hover:bg-red-600 hover:text-white  px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-600 active:shadow-lg transition duration-150 ease-in-out">
                                    حذف
                                </button>
                                <button wire:click="edit({{$article}})" type="button"
                                        class="hover:text-white  px-6 py-2.5 border border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    تعديل
                                </button>

                                @if($article->isPublished)
                                    <button wire:click="archive({{$article}})" type="button"
                                            class="hover:text-white   px-6 py-2.5 border border-slate-400 text-slate-400 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-600 hover:shadow-lg focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                        أرشفة
                                    </button>
                                @else
                                    <button wire:click="publish({{$article}})" type="button"
                                            class="hover:text-white   px-6 py-2.5 border border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        نشر
                                    </button>
                                @endif

                            </div>
                        </div>
                    @endforeach

                    <div wire:click="create" class="h-56 flex flex-col justify-center items-center block rounded-lg border border-gray-100 bg-white hover:text-blue-500 cursor-pointer transition duration-300">
{{--                             <button wire:click="create" type="button" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أضف مقال جديد</button>--}}

                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        <p class="text-xs"> أضف مقال جديد</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="rtl bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}


{{--                <div class="grid md:grid-cols-3 p-2">--}}

{{--                    @foreach($articles as $article)--}}
{{--                        <div style="min-height: 200px;max-height: 200px" class="flex flex-col justify-between block p-6 rounded-lg border border-gray-100 bg-white max-w-sm overflow-hidden">--}}
{{--                            <div>--}}
{{--                                <h5 class="text-right text-gray-900 text-xl leading-tight font-medium mb-1">{{ $article->title }}</h5>--}}
{{--                                <p class="text-right text-gray-700 text-base">--}}
{{--                                    {!! Str::limit($article->body,50) !!}--}}
{{--                                </p>--}}
{{--                            </div>--}}

{{--                            <div class="grid grid-cols-3 gap-4 mt-2">--}}
{{--                                <button wire:click="delete({{$article}}, '{{$loop->index}}')" type="button" class="border border-red-400 text-red-600 hover:bg-red-600 hover:text-white  px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-600 active:shadow-lg transition duration-150 ease-in-out">حذف</button>--}}
{{--                                <button wire:click="edit({{$article}})" type="button" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">تعديل</button>--}}

{{--                            @if($article->isPublished)--}}
{{--                                <button wire:click="archive({{$article}})" type="button" class="  px-6 py-2.5 bg-slate-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-600 hover:shadow-lg focus:outline-none focus:ring-0 transition duration-150 ease-in-out">أرشفة</button>--}}
{{--                            @else--}}
{{--                                <button wire:click="publish({{$article}})" type="button" class="  px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">نشر</button>--}}
{{--                            @endif--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                    <div wire:click="create" style="min-height: 200px;max-height: 200px" class="mt-2 flex flex-col justify-center items-center block rounded-lg border border-gray-100 bg-white hover:text-blue-500 cursor-pointer transition duration-300">--}}
{{--                            <button wire:click="create" type="button" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أضف مقال جديد</button>--}}

{{--                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>--}}
{{--                        <p class="text-xs"> أضف مقال جديد</p>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



