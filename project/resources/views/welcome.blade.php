@extends('applayout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center"> Eksploatacinio atsparumo šalčiui skaičiuoklė</h1>

                <div class="card-body">
                    <h4><a href="{{ route('experiment') }}" class="btn btn-primary"  style="margin-bottom: 20px">
                    Pradėti eksperimento skaičiavimus
                </a></h4>
                </div>
            </div>
        </div>
    </div>
</div>            


                
                    
@endsection
