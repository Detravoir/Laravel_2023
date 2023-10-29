@if(session()->has('messege'))
    <div style="background: #ff71ce;" class="fixed top-0 left-1/2 transform -translate-x-1/2 text-white px-48 py-3">
        <p>
            {{session('messege')}}
        </p>
    </div>
@endif