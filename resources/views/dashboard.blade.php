<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('lang.user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="heading">{{ __('lang.your') }}</h3>
                    <hr>
                    <div class="items">
                        @foreach($my_ads as $ad)
                            <div class="item">
                                <div class="item__image">
                                    @foreach($ad_photo as $photo)
                                        @if($photo->ad_id == $ad->id)
                                            <img src="{{ 'http://lab13-lv.herokuapp.com/storage/app/'.$photo->filename }}" alt="">
                                            @break;
                                        @endif
                                    @endforeach
                                </div>
                                <div class="item__title">
                                    <a href="ad/{{ $ad->id }}">{{ $ad->number_of_rooms }}-{{ __('lang.room') }}
                                        @if($ad->rent_out == 'apartment')
                                            {{ __('lang.Flat') }}
                                        @elseif($ad->rent_out == 'house')
                                            {{ __('lang.house') }}
                                        @elseif($ad->rent_out == 'dacha')
                                            {{ __('lang.country_house') }}
                                        @endif
                                        , {{ $ad->total_area }} м², {{ $ad->floor }}/{{ $ad->from }} {{ __('lang.floor2') }},
                                        @if($ad->rental_period == 'hour')
                                            {{ __('lang.by_the_hour') }}
                                        @elseif($ad->rental_period == 'daily_rent')
                                            {{ __('lang.by_the_day') }}
                                        @elseif($ad->rental_period == 'monthly')
                                            {{ __('lang.per_month') }}
                                        @elseif($ad->rental_period == 'quarterly')
                                            {{ __('lang.quarterly') }}
                                        @endif
                                    </a>
                                </div>
                                <div class="item__update">
                                    <a href="update/{{ $ad->id }}" class="update">{{ __('lang.update') }}</a>
                                </div>
                                <div class="item__delete">
                                    <a href="delete/{{ $ad->id }}" class="delete">{{ __('lang.delete') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

        .heading {
            font-size: 24px;
        }

        .items {
            display: flex;
            flex-direction: column;
        }

        .item {
            width: 100%;
            height: 60px;
            line-height: 60px;
            margin: 7px 21px;
            display: flex;
        }

        img {
            width: 100%;
            height: 100%;
            border-radius: 3px;
        }

        .item__image {
            width: 60px;
            height: 60px;
            border-radius: 3px;
        }

        .item__title {
            margin: 0 10px 0 30px;
            color: #0075FF;
            font-size: 18px;
        }

        .link:hover {
            text-decoration: underline;
        }

        .update {
            margin: 0 10px;
            color: green;
        }

        .update:hover {
            text-decoration: underline;
        }

        .delete {
            margin: 0 10px;
            color: red;
        }

        .delete:hover {
            text-decoration: underline;
        }
    </style>
</x-app-layout>
