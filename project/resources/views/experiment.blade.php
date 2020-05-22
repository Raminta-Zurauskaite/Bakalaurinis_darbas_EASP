@extends('applayout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center">Eksperimento duomenys</h1>

                <div class="card-body">
                    <h2>Įveskite eksperimento duomenis</h2>

                    <form method="get" action="{{ route('sample') }}">
                <div class="form-group">
                    @csrf
                    <label for="datalt"><h3>Data:</h3></label>
                    <input type="text" name="datalt" required/>
                </div>
                <div class="form-group">
                    <label for="partijoszy"><h3>Bandynių partijos žymuo:</h3></label>
                    <input type="text" name="partijoszy" required/>
                </div>
                <div class="form-group">
                    <label for="sudetis"><h3>Bandynių sudėtis:</h3></label>
                    <input type="text" name="sudetis" required/>
                </div>
                <div class="form-group">
                    <label for="degimotemp"><h3>Bandynio degimo temperatūra</h3></label>
                    <input type="text" name="degimotemp" required/>
                </div>
                <div class="form-group">
                    <label for="islaikymot"><h3>Bandinių išlaikymo trukmė aukščiausioje degimo temperatūroje:</h3></label>
                    <input type="text" name="islaikymot"  required/>
                </div>
                <button type="submit" class="btn btn-primary"  style="margin-bottom: 20px">
                    Pradėti bandinių apskaičiavimus
                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
