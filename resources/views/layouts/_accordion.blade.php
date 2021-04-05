<?php
$label = "accordion";
$accordion_id = $label . "-" . time();
$collapse = "collapse";
$i = 0;
?>

<div class="accordion" id="{{ $accordion_id }}">
    @foreach($model as $item)
        @if(!empty($item->title) && !empty($item->content))
            <div class="accordion-item">
                <div class="accordion-header" id="{{ $label."-".++$i }}">
                    <h2 class="h4">
                        <a
                            class="d-block w-100 border-top py-3 accordion-link"
                            href="#{{ $collapse."-".$i }}"
                            data-toggle="collapse"
                            data-target="#{{ $collapse."-".$i }}"
                            aria-expanded="true"
                            aria-controls="{{ $collapse."-".$i }}">
                            {{ $item->title }}
                            <span class="toggle-btn text-center pull-right t-40s">
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                    </h2>
                </div>

                <div id="{{ $collapse."-".$i }}" class="collapse" aria-labelledby="{{ $label."-".$i }}" data-parent="#{{ $accordion_id }}">
                    <div class="accordion-body mb-4">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
