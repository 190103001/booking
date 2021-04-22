<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update an ad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ action('AdminController@update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $ad[0]->id }}">

                        <span>{{ __('lang.to_rent') }}</span><br>

                        @if($ad[0]->rent_out == 'apartment')
                            <input type="radio" id="apartment" name="rent_out" value="apartment" checked>
                        @else
                            <input type="radio" id="apartment" name="rent_out" value="apartment">
                        @endif
                        <label for="apartment">Квартиру</label><br>

                        @if($ad[0]->rent_out == 'house')
                            <input type="radio" id="house" name="rent_out" value="house" checked>
                        @else
                            <input type="radio" id="house" name="rent_out" value="house">
                        @endif
                        <label for="house">Дом</label><br>

                        @if($ad[0]->rent_out == 'dacha')
                            <input type="radio" id="dacha" name="rent_out" value="dacha" checked>
                        @else
                            <input type="radio" id="dacha" name="rent_out" value="dacha">
                        @endif
                        <label for="dacha">Дачу</label><br><br>

                        <span>Количество комнат</span><br>
                        <input type="text" name="number_of_rooms" value="{{ $ad[0]->number_of_rooms }}"><br><br>


                        <span>Цена:</span><br>
                        <input type="text" name="price" value="{{ $ad[0]->price }}"><br><br>


                        <span>Период аренды:</span><br>
                        @if($ad[0]->rental_period == 'hour')
                            <input type="radio" id="hour" name="rental_period" value="hour" checked>
                        @else
                            <input type="radio" id="hour" name="rental_period" value="hour">
                        @endif
                        <label for="hour">по часам</label><br>

                        @if($ad[0]->rental_period == 'daily_rent')
                            <input type="radio" id="daily_rent" name="rental_period" value="daily_rent" checked>
                        @else
                            <input type="radio" id="daily_rent" name="rental_period" value="daily_rent">
                        @endif
                        <label for="daily_rent">посуточно</label><br>

                        @if($ad[0]->rental_period == 'monthly')
                            <input type="radio" id="monthly" name="rental_period" value="monthly" checked>
                        @else
                            <input type="radio" id="monthly" name="rental_period" value="monthly">
                        @endif
                        <label for="monthly">помесячно</label><br>

                        @if($ad[0]->rental_period == 'quarterly')
                            <input type="radio" id="quarterly" name="rental_period" value="quarterly" checked>
                        @else
                            <input type="radio" id="quarterly" name="rental_period" value="quarterly">
                        @endif
                        <label for="quarterly">поквартально</label><br><br>


                        <span>Этаж</span><br>
                        <input type="text" name="floor" value="{{ $ad[0]->floor }}">

                        <span>из</span>
                        <input type="text" name="from" value="{{ $ad[0]->from }}"><br><br>


                        <span>Площадь, м²</span><br>
                        <span>Общая</span><br>
                        <input type="text" name="total_area" value="{{ $ad[0]->total_area }}"><br>

                        <span>Жилая</span><br>
                        <input type="text" name="residential_area" value="{{ $ad[0]->residential_area }}"><br>

                        <span>Кухня</span><br>
                        <input type="text" name="kitchen_area" value="{{ $ad[0]->kitchen_area }}"><br><br>

                        <span>Город</span><br>
                        <input type="text" name="city" value="{{ $ad[0]->city }}"><br><br>

                        <span>Адрес</span><br>
                        <input type="text" name="address" value="{{ $ad[0]->address }}"><br><br>

                        <span>Телефон</span><br>
                        <input type="text" name="phone_number" value="{{ $ad[0]->phone_number }}"><br><br>

                        <span>Текст обьявление</span><br>
                        <textarea name="ad_text" id="" cols="40" rows="5">{{ $ad[0]->ad_text }}</textarea><br>

                        <input type="submit" value="Обновить объявление">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
