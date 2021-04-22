<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('lang.submit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ action('UserController@store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="owner_id" value="{{ Auth::User()->id }}">

                        <span>{{ __('lang.to_rent') }}</span><br>

                        <input type="radio" id="apartment" name="rent_out" value="apartment">
                        <label for="apartment">{{ __('lang.flat') }}</label><br>

                        <input type="radio" id="house" name="rent_out" value="house">
                        <label for="house">{{ __('lang.house') }}</label><br>

                        <input type="radio" id="dacha" name="rent_out" value="dacha">
                        <label for="dacha">{{ __('lang.dacha') }}</label><br><br>

                        <span>{{ __('lang.number_of_rooms') }}</span><br>
                        <input type="text" name="number_of_rooms"><br><br>


                        <span>{{ __('lang.number_of_rooms') }}</span><br>
                        <input type="text" name="price"><br><br>


                        <span>{{ __('lang.rental_period') }}</span><br>
                        <input type="radio" id="hour" name="rental_period" value="hour">
                        <label for="hour">{{ __('lang.by_the_hour') }}</label><br>

                        <input type="radio" id="daily_rent" name="rental_period" value="daily_rent">
                        <label for="daily_rent">{{ __('lang.by_the_day') }}</label><br>

                        <input type="radio" id="monthly" name="rental_period" value="monthly">
                        <label for="monthly">{{ __('lang.per_month') }}</label><br>

                        <input type="radio" id="quarterly" name="rental_period" value="quarterly">
                        <label for="quarterly">{{ __('lang.quarterly') }}</label><br><br>


                        <span>{{ __('lang.floor') }}</span><br>
                        <input type="text" name="floor">

                        <span>{{ __('lang.from') }}</span>
                        <input type="text" name="from"><br><br>


                        <span>{{ __('lang.area') }}, м²</span><br>
                        <span>{{ __('lang.general') }}</span><br>
                        <input type="text" name="total_area"><br>

                        <span>{{ __('lang.residential') }}</span><br>
                        <input type="text" name="residential_area"><br>

                        <span>{{ __('lang.kitchen') }}</span><br>
                        <input type="text" name="kitchen_area"><br><br>

                        <span>{{ __('lang.city') }}</span><br>
                        <input type="text" name="city"><br><br>

                        <span>{{ __('lang.address') }}</span><br>
                        <input type="text" name="address"><br><br>

                        <span>{{ __('lang.photos') }}</span><br>
                        <input type="file" name="photos[]" multiple><br><br>

                        <span>{{ __('lang.phone') }}</span><br>
                        <input type="text" name="phone_number"><br><br>

                        <span>{{ __('lang.announcement_text') }}</span><br>
                        <textarea name="ad_text" id="" cols="40" rows="5"></textarea><br>

                        <input type="submit" value="  {{ __('lang.submit') }}  ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
