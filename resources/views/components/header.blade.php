<div class="header">
    <div class="header-inner">
        @if (isset($backButton))
            <div class="backButton" onclick="history.back()">
                <img src="{{ asset('assets/svg/header-back.svg') }}" alt="">
            </div>
        @endif
        <h1>{{ $title }} <span>{{ isset($subTitle) ? $subTitle : '' }}</span></h1>
        @if (isset($RowButton))
            <div class="row-button">
                <a class="button btn-transparent" type="button" data-dismiss="modal">
                    Cancel
                </a>
                <a class="button primary" type="submit">
                    Submit
                </a>
            </div>
        @endif
    </div>
</div>
