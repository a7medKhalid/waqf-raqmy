
        {{-- Because she competes with no one, no one can compete with her. --}}
<x-guest-layout>

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

                    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                        <!--  Category -->
                        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                            <select class=" flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                                <option value="category" disabled selected>التصنيفات
                                </option>
                                <option value="personal">مفهوم الوقف</option>
                                <option value="business">أمثلة للأوقاف</option>
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
                            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                                <option value="category" disabled selected>الترتيب حسب
                                </option>
                                <option value="latest">الأحدث
                                </option>
                                <option value="mostLiked">الأكثر اعجابا
                                </option>
                                <option value="MostViwed">الأكثر مشاهدة
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
                        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                            <form method="GET" action="#">
                                <input type="text" name="search" placeholder="ابحث عن ماتريد"
                                       class="text-right bg-transparent placeholder-black font-semibold text-sm">
                            </form>
                        </div>
                    </div>
                </header>

                <div class="container mx-auto pb-6 md:pb-12 antialiased text-right">
                    <div class="w-auto mx-4 lg:w-4/5 lg:mx-auto">

                        @foreach($articles as $article)
                            <section class="text-gray-700 body-font overflow-hidden">
                                <div class="w-full flex flex-col items-start">
                                    <div>
                                        @foreach($article->tags as $tag)
                                            <span class="inline-block py-0.5 px-2 mr-1 rounded bg-white text-gray-700 border border-gray-600 text-xs font-semibold tracking-widest tag-beginners">{{$tag->name}}</span>
                                        @endforeach
                                    </div>
                                    <h2 class="text-2xl title-font font-semibold text-gray-900 my-2"><a href="/blog/5-practical-web-dev-projects-that-arent-todo-lists" class="inline-block hover:underline">{{$article->title}}</a></h2>
                                    <p class="leading-relaxed mb-4 text-lg">{!! $article->body !!}</p>
                                    <div class="flex items-center flex-wrap pb-8 mb-8 border-b-2 border-gray-100 mt-auto w-full">
                                        <a href="/articles/{{$article->id}}" class="text-gray-900 inline-flex items-center hover:underline text-lg">اقرأ المزيد
                                            <svg class="rotate-180 w-4 h-4 ml-1" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </section>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>



    </div>

</x-guest-layout>
