@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container max-w-4xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block mt-7">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div id="app" v-cloak class="pt-8 pb-0 w-full mt-7">
            <div class="markdown mb-1 px-6 max-w-lg mx-auto pl-0 ml-0 lg:mr-auto xl:mx-0 xl:px-12 xl:w-3/4">
                <h1 class="page-title sm:text-lg md:text-5xl mb-0">{{ $page->title }}</h1> @if ($page->description)
                <div class="text-xl text-grey-dark mb-4 font-serif">
                    {{ $page->description }}
                </div>
                @endif
            </div>

            {{-- Main Container --}}
            <div class="w-full max-w-screen-xl mx-auto px-6">
              <div class="lg:flex -mx-6">
                <div class="flex">
                    <div class="markdown xl:px-12 w-full max-w-lg mx-auto lg:ml-0 lg:mr-auto xl:mx-0 documentation-page">
                        @yield('content')
                    </div>
                </div>

                <div class="hidden xl:text-sm xl:block xl:w-1/4 xl:px-6 z-0">
                    <div class="flex flex-col justify-between overflow-y-auto sticky top-16 max-h-(screen-16) pt-12 pb-4 -mt-12">
                        <table-of-contents class="mb-8"></table-of-contents>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</section>
@endsection
