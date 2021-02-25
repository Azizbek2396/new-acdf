<section class="section page-title pb-5 light-primary height-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 text-uppercase text-center">
                <h1 class="h1 caption mt-5 mb-1">{{ $title }}</h1>
            </div>
        </div>
    </div>
    <article class="container">
        <div class="row">
            @foreach($model as $item)
                <div class="col-12 col-sm-6 col-lg-4 mt-4 mb-4">
                    <div class="post ml-2 mr-2">
                        <a class="post-img" href="{{ route($route, $item->id) }}">
                            <img src="{{ getMedium($item->image) }}" alt="{{ $item->title }}" class="img-fluid w-100">
                        </a>
                        <div class="post-body pt-3 pl-4 pr-4 pb-4">
                            <h3 class="post-title mt-2">
                                <a class="t-25s" href="{{ route($route, $item->id) }}">{{ $item->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{  $model->links($links, ['model' => $model]) }}
    </article>
</section>
