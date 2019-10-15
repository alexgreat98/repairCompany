@if (count($breadcrumbs))

    <ul class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a class="B_homeCrumb" itemprop="url" rel="{{ $breadcrumb->title }}"
                       href="{{ $breadcrumb->url }}"><span itemprop="title">{{ $breadcrumb->title }}</span></a>
                </li>
            @else
                <li>{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>

@endif
