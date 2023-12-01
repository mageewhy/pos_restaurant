<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-start">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap  mb-3 mb-sm-0">
                                <h4 class="me-2 h4">Point Shops</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">Member Number</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row  row-cols-1 g-4">
                        <div class="col">
                            <form action="{{route('point-shops.index')}}" method="GET">
                                @csrf
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" id="type" name="phone_number">
                                <button type="submit" class="btn btn-primary mt-3">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($member_number))
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col" data-memberid="{{$member_number->id}}">
                            <h1>{{$member_number->phone_number}}</h1>
                            <h3>Point Available: {{$member_number->point}} points</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">Redeem Product Lists</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row  row-cols-1 row-cols-md-3 g-4">
                        @foreach($pointProduct as $item)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <img src="/storage/{{$item->image}}" width="100%">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <p>Need {{$item->point}} points</p>
                                    <form action="{{route('memberRedeem', $item->id)}}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="member" class="d-none" value="{{$member_number ? $member_number->id : 0}}">
                                        <div class="d-flex justify-content-between">
                                            <button type="submit"
                                            @if(isset($member_number))
                                                    @if ($member_number->point < $item->point)
                                                    class="btn btn-primary disabled"
                                                    @endif
                                                @endif class="btn btn-primary"
                                            >Redeem</button>
                                            <a href="{{route('point-shops.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
