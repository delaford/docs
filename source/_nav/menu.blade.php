    {{-- Side nav --}}
    <div id="sidebar" class="">
      <div class="lg:block lg:top-15">
        <nav id="nav" class="overflow-y-auto text-base lg:text-sm lg:pl-6 lg:pr-8 sticky?lg:h-(screen-10) lg:mt-10">
          @foreach ($page->navigation as $sectionName => $sectionItems)
          <div class="mb-6">
            <p class="mt-0 mb-0 text-grey uppercase tracking-wide font-bold text-sm lg:text-xs">{{ $sectionName }}</p>
            <ul class="list-reset mt-2">
              @foreach ($sectionItems as $name => $slugOrChildren)
                @if (is_string($slugOrChildren))
                  <li class="mb-3 lg:mb-2"><a class="hover:underline {{ $page->active('/docs/' . $slugOrChildren) ? 'text-teal-dark font-semibold' : 'text-grey-darkest' }}" href="{{ $page->baseUrl }}/docs/{{ $slugOrChildren }}">{{ $name }}</a></li>
                @else
                  <li class="mb-3 lg:mb-2">
                    <a href="{{ $page->baseUrl }}/docs/{{ $slugOrChildren->first() }}" class="hover:underline block mb-3 lg:mb-2 {{ $page->anyChildrenActive($slugOrChildren) ? 'text-teal-dark font-semibold' : 'text-grey-darkest' }}">{{ $name }}</a>
                    <ul class="pl-4 {{ $page->anyChildrenActive($slugOrChildren) ? 'block' : 'hidden' }}">
                    @foreach ($slugOrChildren as $title => $link)
                      <li class="mb-3 lg:mb-2">
                        <a class="hover:underline {{ $page->active('/docs/' . $link) ? 'text-teal-dark font-semibold' : 'text-grey-darkest' }}" href="{{ $page->baseUrl }}/docs/{{ $link }}">
                          {{ $title }}
                        </a>
                      </li>
                    @endforeach
                    </ul>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
          @endforeach
        </nav>
      </div>
    </div>
    {{-- /Side nav --}}