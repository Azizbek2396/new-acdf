<?php echo Form::open([
    'url'    => route('site.contact.submit'),
    'method' => 'post',
    'id'     => 'contact-form',
]) ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mt-2">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <?= Form::text('name', '', [
                    'class'         => 'form-control',
                    'placeholder'   => __('main.name').'*',
                ]) ?>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <small>{{ $errors->first('name') }}</small>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-2">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <?= Form::text('email', '', [
                    'class'       => 'form-control',
                    'placeholder' => 'Email*',
                ]) ?>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <small>{{ $errors->first('email') }}</small>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-12 mt-2">
            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <?= Form::text('subject', '', [
                    'class'         => 'form-control',
                    'placeholder'   => __('main.subject').'*',
                ]) ?>
                @if ($errors->has('subject'))
                    <span class="help-block">
                        <small>{{ $errors->first('subject') }}</small>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-12 mt-2">
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <?= Form::textarea('message', '', [
                    'class'         => 'form-control',
                    'rows'          => 3,
                    'placeholder'   => __('main.message').'*'
                ]) ?>
                @if ($errors->has('message'))
                    <span class="help-block">
                        <small>{{ $errors->first('message') }}</small>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                {!! Form::captcha([]) !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <small>{{ $errors->first('g-recaptcha-response') }}</small>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-6 text-right mt-3">
            {{ Form::submit(__('main.submit'), ['class' => 'btn btn-default ui t-25s']) }}
        </div>
    </div>
</div>

<?php echo Form::close(); ?>
