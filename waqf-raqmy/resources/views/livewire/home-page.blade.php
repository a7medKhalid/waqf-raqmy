
    {{-- Because she competes with no one, no one can compete with her. --}}


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



            <header class="flex flex-col items-center justify-center max-w-xl mx-auto mt-20 text-center mb-11">
                <h1 class="text-4xl">
                    مقالات <span class="text-blue-500">الوقف الرقمي</span>
                </h1>

                <h2 class="inline-flex mt-2">يكتبها المجتمع للمجتمع</h2>

                <p class="text-sm m-14">
                    هنا يحيث نثري مفهوم الوقف الرقمي بتعريفات ومقترحات وأفكار لتطويره يمكن للجمبع أن يشارك ليكتب تصوره عن الوقف الرقمي ومايميزه
                </p>

                @guest

                    <div class="relative flex lg:inline-flex items-center rounded-xl">
                        <a href="{{ route('register') }}" class="text-black font-bold py-2 px-4 rounded-full">
                            أنشئ حساب
                        </a>

                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            دخول
                        </a>

                    </div>
                @endguest

                @auth
                    <div class="relative flex lg:inline-flex items-center rounded-xl">
                        <a href="{{ route('articles.index') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                            عرض مقالاتي
                        </a>
                    </div>

                @endauth






                <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">





                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                        <select wire:model="tag" class="border-gray-200 rounded-lg  flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                            <option value="category" disabled selected>التصنيفات
                            </option>
                            <option value="all">الكل</option>
                        @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>


                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Other Filters -->
                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                        <select wire:model="sortType" class="border-gray-200 rounded-lg flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                            <option value="category" disabled selected>الترتيب حسب
                            </option>
                            <option value="created_at">الأحدث
                            </option>
                            <option value="likes">الأكثر اعجابا
                            </option>
                            <option value="views">الأكثر مشاهدة
                            </option>

                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Search -->
                    <div class="relative flex lg:inline-flex items-center bg-gray-100 ">

                        <input wire:model="searchQuery" type="text" name="search" placeholder="ابحث عن ماتريد"
                               class="border-gray-200 rounded-lg text-right bg-transparent placeholder-black font-semibold text-sm">
                    </div>
                </div>
            </header>

            <div class="rtl container mx-auto pb-6 md:pb-12 text-right">
                <div class="w-auto mx-4 lg:w-4/5 lg:mx-auto">
                    @if($articles)
                        @foreach($articles as $article)
                            <section class="text-gray-700 body-font overflow-hidden">

                                <div class="w-full flex flex-col items-start">
                                    <div>
                                        @foreach($article->tags as $tag)
                                            <button wire:click="viewCategory({{$tag->id}})" class="hover:border-gray-300 inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-700 border border-gray-600 text-xs font-semibold tracking-widest tag-beginners">{{$tag->name}}</button>
                                        @endforeach
                                    </div>
                                    <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="/articles/{{$article->id}}" class="inline-block hover:underline">{{$article->title}}</a></h2>
                                    <p class="leading-relaxed mb-4 text-lg"> {!! Str::limit($article->body,450) !!}
                                    </p>
                                    <div class="flex flex-col flex-wrap pb-8 mb-8 border-b-2 border-gray-100 mt-auto w-full">
                                        <a href="/articles/{{$article->id}}" class="text-gray-900 inline-flex items-center hover:underline text-lg">اقرأ المزيد
                                            <svg class="rotate-180 w-4 h-4 ml-1" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>

                                        <div class="flex">
                                            <div class="mt-4 flex">
                                                <p class="ml-2">{{$article->likes}}</p>
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                                            </div>

                                            <div class="mt-4 mr-2 flex">
                                                <p class="ml-2">{{$article->views}}</p>
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>                                        </div>
                                            </div>
                                        </div>

                                    </div>

                            </section>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>


