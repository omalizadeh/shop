 @forelse($addresses as $address)
    <li class="p-0">
        <div class="custom-radio p-0">
            <input required type="radio" id="{{ 'address-'.$address->id }}" value="{{ $address->id }}" class="" name="address_id">
            <label for="{{ 'address-'.$address->id }}">
                <span class="circle"></span>
                {{ $address->title }}
                ( <small>{{ \App\Address::City($address->city_id) . ' - ' .$address->address }} </small> )
            </label>
        </div>
    </li>
@empty
    <li class="alert alert-danger">
        هیچ مقصدی تاکنون ثبت نشده است
    </li>
@endforelse