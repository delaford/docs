<div id="js-search-input" class="w-full lg:px-5 xl:px-10 lg:w-3/4">
    <div class="relative">
        <input
        id="docsearch-input"
        class="docsearch-input relative block h-10 transition-fast sm:w-1/2 md:w-full bg-grey-lightest outline-none rounded text-grey-darker border border-grey focus:border-blue-light px-4 pb-0"
        name="docsearch"
        type="text"
        placeholder="Search the docs...">
    </div>
</div>

@push('scripts')
    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <script type="text/javascript">
            docsearch({
                apiKey: '{{ $page->docsearchApiKey }}',
                indexName: '{{ $page->docsearchIndexName }}',
                inputSelector: '#docsearch-input',
                debug: false // Set debug to true if you want to inspect the dropdown
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
    @endif
@endpush
