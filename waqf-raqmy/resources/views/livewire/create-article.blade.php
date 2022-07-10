<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <x-slot name="header">

        <div class="rtl grid grid-cols-3">


            <div class="relative flex lg:inline-flex items-center rounded-xl">
                <a href="{{ route('articles.index') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                    عرض مقالاتي
                </a>
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                تحرير المقال
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mt-3 mb-6 ">
                    @if(!$isSaved)
                        <div class="ml-3">
                            <button wire:click="save" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">حفظ</button>
                        </div>
                    @elseif(!$isPublished)
                        <div class="ml-3">
                            <button wire:click="publish" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">نشر</button>
                        </div>

                    @else
                        <div class="ml-3">
                            <button wire:click="archive" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أرشفة</button>
                        </div>
                    @endif

                    <div class="flex justify-center">
                        <input wire:change="unSave" wire:model="title" class="text-center text-2xl" value="العنوان" />
                    </div>
                </div>

                <div clas="ml-3 ">

                    <livewire:trix :value="$body"/>

                </div>

                <div class="m-4">
                    <p class="text-2xl text-right"> أضف تصنيفات لمقالك</p>

                    <div class="flex justify-end">
                        <datalist id="tags">

                            @foreach($allTagsNames as $tag)
                                <option value="{{$tag}}">
                            @endforeach

                        </datalist>

                        <button wire:click="addTag()" class="mr-3 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">أضف</button>

                        <input wire:model="tagNameInput" class="border border-1 border-gray-400" id="tagInput" list="tags">

                        @if($errors->has('tagNameInput'))

                            <span class="text-red-500">{{ $errors->first('tagNameInput') }}</span>

                        @endif


                    </div>

                    <div class="flex space-x-2 justify-end m-3">
                        @foreach($tagsNames as $tag)

                            <button wire:click="deleteTag({{$loop->index}})" type="button" class="hover:border-red-500 hover:shadow-lg inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                {{$tag}}</button>

                        @endforeach

                    </div>
                </div>



            </div>

        </div>
    </div>



</div>
