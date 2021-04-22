<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ url('css/ad.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('splide/splide.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
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
<div class="content">
    <div class="inner-content">
        <div class="offer-title">
            <h2>
                {{ $ads[0]->number_of_rooms }}-{{ __('lang.room') }}
                @if($ads[0]->rent_out == 'apartment')
                    {{ __('lang.Flat') }}
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
                , {{ $ads[0]->address }}
            </h2>
        </div>
        <div class="slider">
            <div id="image-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($ad_photo as $photo)
                            <li class="splide__slide">
                                <img src="{{ 'http://localhost:8888/Booking/storage/app/'.$photo->filename }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="offer">
            <div class="offer__info">
                <table>
                    <tr>
                        <th>{{ __('lang.city') }}</th>
                        <th>{{ __('lang.address') }}</th>
                        <th>{{ __('lang.phone_number') }}</th>
                    </tr>
                    <tr>
                        <td>{{ $ads[0]->city }}</td>
                        <td>{{ $ads[0]->address }}</td>
                        <td><a href="tel:{{ $ads[0]->phone_number }}">{{ $ads[0]->phone_number }}</a></td>
                    </tr>
                    <tr>
                        <th>{{ __('lang.number_of_rooms') }}</th>
                        <th>{{ __('lang.total_area') }}</th>
                        <th>{{ __('lang.floor') }}</th>
                    </tr>
                    <tr>
                        <td>{{ $ads[0]->number_of_rooms }}</td>
                        <td>{{ $ads[0]->total_area }}</td>
                        <td>{{ $ads[0]->floor }} {{ __('lang.from') }} {{ $ads[0]->from }}</td>
                    </tr>
                </table>
            </div>
            <div class="offer__description">
                <span class="description">{{ __('lang.seller_description') }}</span>
                <p>
                    {{ $ads[0]->ad_text }}
                </p>
            </div>
        </div>
    </div>
</div>
<footer>

</footer>
<script>
    new Splide( '.splide' ).mount();
</script>
</body>
</html>


