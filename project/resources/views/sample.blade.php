@extends('applayout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center">Bandinio duomenys</h1>

                <div class="card-body">
                    <h2>Įveskite bandinio duomenis</h2>

                    <form method="get" action="{{ route('sample') }}">
                <div class="form-group">
                    @csrf
                    <label for="m0"><h3>m0 g:</h3></label>
                    <input type="text" name="m0"/>
                </div>
                <div class="form-group">
                    <label for="m1"><h3>m1 g:</h3></label>
                    <input type="text" name="m1"/>
                </div>
                <div class="form-group">
                    <label for="m2"><h3>m2 g:</h3></label>
                    <input type="text" name="m2"/>
                </div>
                <div class="form-group">
                    <label for="m3"><h3>m3 g:</h3></label>
                    <input type="text" name="m3"/>
                </div>
                <div class="form-group">
                    <label for="m4"><h3>m4 g:</h3></label>
                    <input type="text" name="m4"/>
                </div>
                <div class="form-group">
                    <label for="m5"><h3>m5 g:</h3></label>
                    <input type="text" name="m5"/>
                </div>
                <div class="form-group">
                    <label for="m6"><h3>m6 g:</h3></label>
                    <input type="text" name="m6"/>
                </div>
                <div class="form-group">
                    <label for="hmax"><h3>hmax mm:</h3></label>
                    <input type="text" name="hmax"/>
                </div>
                <div class="form-group">
                    <label for="aa"><h3>aa cm:</h3></label>
                    <input type="text" name="aa"/>
                </div>
                <div class="form-group">
                    <label for="av"><h3>av cm:</h3></label>
                    <input type="text" name="av"/>
                </div>
                <div class="form-group">
                    <label for="ba"><h3>ba cm:</h3></label>
                    <input type="text" name="ba"/>
                </div>
                <div class="form-group">
                    <label for="bv"><h3>bv cm:</h3></label>
                    <input type="text" name="bv"/>
                </div>
                <div class="form-group">
                    <label for="h1"><h3>h1 cm:</h3></label>
                    <input type="text" name="h1"/>
                </div>
                <div class="form-group">
                    <label for="h2"><h3>h2 cm:</h3></label>
                    <input type="text" name="h2"/>
                </div>
                <button type="submit" class="btn btn-primary"  style="margin-bottom: 20px">
                    Skaičiuoti kitą bandinį
                </button>

                <div id = 'msg'>
                        Atsakymas
                    </div>
                    <?php
                        echo Form::button('Calculate',['onClick'=>'getMessage()']);
                    ?>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
      
      
      <script>
         function getMessage() {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
