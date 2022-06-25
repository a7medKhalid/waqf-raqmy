<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            مقالاتي
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="sm:grid grid-cols-3">
                    <div class="flex justify-center m-4 block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                        <button wire:click="create" type="button" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أضف مقال جديد</button>

                    </div>
                    @foreach($articles as $article)
                        <div class="m-4 block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                            <h5 class="text-right text-gray-900 text-xl leading-tight font-medium mb-2">{{ $article->title }}</h5>
                            <p class="text-right text-gray-700 text-base mb-4">
                                {!! substr($article->body,0,255) !!}
                            </p>
                            <div class="grid grid-cols-3 gap-4">
                                <button wire:click="delete({{$article}}, '{{$loop->index}}')" type="button" class="bg-red-600  px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-600 active:shadow-lg transition duration-150 ease-in-out">حذف</button>
                                <button wire:click="edit({{$article}})" type="button" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">تعديل</button>

                            @if($article->isPublished)
                                <button wire:click="archive({{$article}})" type="button" class="  px-6 py-2.5 bg-slate-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-600 hover:shadow-lg focus:outline-none focus:ring-0 transition duration-150 ease-in-out">أرشفة</button>
                            @else
                                <button wire:click="publish({{$article}})" type="button" class="  px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">نشر</button>
                            @endif

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


</div>
