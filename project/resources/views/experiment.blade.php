@extends('applayout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center">Eksperimento duomenys</h1>

                <div class="card-body">
                    <h2>Įveskite eksperimento duomenis</h2>

                    <form method="post" action="{{ route('cats.store') }}" id="exp_create_form">
                <div class="form-group">
                    @csrf
                    <label for="data"><h3>Data:</h3></label>
                    <input type="text" class="form-control exp_input" name="data" value="{{old('data')}}"/>
                </div>
                <div class="form-group">
                    <label for="partijoszy"><h3>Bandynių partijos žymuo:</h3></label>
                    <input type="text" class="form-control exp_input" name="partijoszy" value="{{old('partijoszy')}}"/>
                </div>
                <div class="form-group">
                    <label for="sudetis"><h3>Bandynių sudėtis:</h3></label>
                    <input type="text" class="form-control exp_input" name="sudetis" value="{{old('sudetis')}}"/>
                </div>
                <div class="form-group">
                    <label for="degimotemp"><h3>Bandynio degimo temperatūra</h3></label>
                    <input type="text" class="form-control exp_input" name="degimotemp" value="{{old('degimotemp')}}"/>
                </div>
                <div class="form-group">
                    <label for="islaikymot"><h3>Bandinių išlaikymo trukmė aukščiausioje degimo temperatūroje:</h3></label>
                    <input type="text" class="form-control exp_input" name="islaikymot" value="{{old('islaikymot')}}"/>
                </div>
                <button id="submit_cat_create" type="button" class="btn btn-primary"  style="margin-bottom: 20px">
                    Submit
                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
