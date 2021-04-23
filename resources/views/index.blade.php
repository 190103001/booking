<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="inner-header">
            <div class="left-side">
                <div class="logo">
                    <a href="#">Booking</a>
                </div>
                <div class="current-lang">
                    <a href="{{ route('locale', __('lang.set_lang')) }}">{{ __('lang.set_lang') }}</a>
                </div>
            </div>
            <div class="right-side">
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}">{{ __('lang.dashboard') }}</a>
                    @else
                    <a href="{{ route('login') }}">{{ __('lang.log_in') }}</a>
                    /
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('lang.register') }}</a>
                    @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>
    <section>
        <div class="inner-section">
{{--            <div class="searchbar">--}}

{{--            </div>--}}
{{--            {{ dd($ads) }}--}}
            <div class="blocks">
                @foreach($ads as $ad)
                    <div class="block">
                        <div class="picture">
                            @foreach($ad_photo as $photo)
                                @if($photo->ad_id == $ad->id)
                                    <img src="{{ 'http://localhost:8888/Booking/storage/app/'.$photo->filename }}" alt="">
                                    @break;
                                @endif
                            @endforeach
                        </div>
                        <div class="info-side">
                            <div class="info-top">
                                <div class="title">
                                    <a href="ad/{{ $ad->id }}">{{ $ads[0]->number_of_rooms }}-{{ __('lang.room') }}
                                        @if($ads[0]->rent_out == 'apartment')
                                            {{ __('lang.flat') }}
                                        @elseif($ads[0]->rent_out == 'house')
                                            {{ __('lang.house') }}
                                        @elseif($ads[0]->rent_out == 'dacha')
                                            {{ __('lang.country_house') }}
                                        @endif
                                        , {{ $ads[0]->total_area }} м², {{ $ads[0]->floor }}/{{ $ads[0]->from }} {{ __('lang.floor2') }},
                                        @if($ads[0]->rental_period == 'hour')
                                            {{ __('lang.by_the_hour') }}
                                        @elseif($ads[0]->rental_period == 'daily_rent')
                                            {{ __('lang.by_the_day') }}
                                        @elseif($ads[0]->rental_period == 'monthly')
                                            {{ __('lang.per_month') }}
                                        @elseif($ads[0]->rental_period == 'quarterly')
                                            {{ __('lang.quarterly') }}
                                        @endif
                                    </a>
                                </div>
                                <div class="price">
                                    {{ $ad->price }}тг
                                </div>
                            </div>
                            <div class="info-mid">
                                {{ $ad->city }}, {{ $ad->address }}
                            </div>
                            <div class="info-bot">
                                {{ $ad->ad_text }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>
