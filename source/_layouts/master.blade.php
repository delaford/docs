<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/human.png">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=UnifrakturCook:700" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">
    </head>

    <body class="font-sans font-normal text-black leading-normal">
        <header class="flex bg-grey-lightest border-b border-grey-lighter fixed pin-t pin-x z-50 h-16 items-center" role="banner">

            <div class="w-full max-w-screen-xl relative mx-auto px-6">
                <div class="-mx-6 flex items-center">
                    <div class="flex items-center justify-center lg:w-1/4 xl:w-1/5 lg:pr-8 px-3">
                        <img style="max-width:32px;max-height:32px;min-width:32px;min-height:32px;" class="lg:w-12 lg:h-12 block" src="/assets/img/human.png" alt="{{ $page->siteName }} logo" />
                    </div>

                    <div id="js-search-input" class="lg:w-1/2 sm:w-full">
                        <div class="relative sm:w-full">
                            <input
                                id="docsearch-input"
                                class="docsearch-input relative block h-10 transition-fast sm:w-1/2 md:w-full bg-white outline-none rounded text-grey-darker border border-grey focus:border-blue-light focus:bg-blue-lightest px-4 pb-0 sm:w-full"
                                name="docsearch"
                                type="text"
                                placeholder="Search the docs...">
                        </div>
                    </div>

                    @yield('nav-toggle')
                </div>
            </div>
        </header>

        @yield('body')

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <footer class="bg-grey-lightest border-t text-center text-sm mt-12 py-7" role="contentinfo">
            <div class="footer-wrapper flex justify-center items-center flex-col">
                <div class="mb-3">
                    &copy; <a href="https://tighten.co" title="Tighten website">Delaford</a> {{ date('Y') }}.
                </div>

                <a class="hover:text-grey-darker mr-6 text-grey" href="https://github.com/delaford/game">
                    <svg width="32" height="32" viewBox="0 0 1024 1024" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8C0 11.54 2.29 14.53 5.47 15.59C5.87 15.66 6.02 15.42 6.02 15.21C6.02 15.02 6.01 14.39 6.01 13.72C4 14.09 3.48 13.23 3.32 12.78C3.23 12.55 2.84 11.84 2.5 11.65C2.22 11.5 1.82 11.13 2.49 11.12C3.12 11.11 3.57 11.7 3.72 11.94C4.44 13.15 5.59 12.81 6.05 12.6C6.12 12.08 6.33 11.73 6.56 11.53C4.78 11.33 2.92 10.64 2.92 7.58C2.92 6.71 3.23 5.99 3.74 5.43C3.66 5.23 3.38 4.41 3.82 3.31C3.82 3.31 4.49 3.1 6.02 4.13C6.66 3.95 7.34 3.86 8.02 3.86C8.7 3.86 9.38 3.95 10.02 4.13C11.55 3.09 12.22 3.31 12.22 3.31C12.66 4.41 12.38 5.23 12.3 5.43C12.81 5.99 13.12 6.7 13.12 7.58C13.12 10.65 11.25 11.33 9.47 11.53C9.76 11.78 10.01 12.26 10.01 13.01C10.01 14.08 10 14.94 10 15.21C10 15.42 10.15 15.67 10.55 15.59C13.71 14.53 16 11.53 16 8C16 3.58 12.42 0 8 0Z" transform="scale(64)" >
                    </svg>
                </a>
            </div>
        </footer>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.js"></script>
        <script type="text/javascript">
            docsearch({
                apiKey: '{{ $page->docsearchApiKey }}',
                appId: '3KZ6FG1R3F',
                indexName: '{{ $page->docsearchIndexName }}',
                inputSelector: '#docsearch-input',
                debug: true // Set debug to true if you want to inspect the dropdown
            });

            const searchInput = {
                toggle() {
                    const menu = document.getElementById('js-search-input');
                    menu.classList.toggle('hidden');
                    menu.classList.toggle('md:block');
                    document.getElementById('docsearch-input').focus();
                },
            }
        </script>
    </body>
</html>
