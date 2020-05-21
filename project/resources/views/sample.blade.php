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
                    <span class="nowrap"><h3><label for="taisyklinga">Taisyklinga forma?:</label>
                    <input id="taisyklinga" type="checkbox" name="taisyklinga"/></h3></span>
                    <label for="m0"><h3>m0 g:</h3></label>
                    <input  type="text" name="m0"/>
                    <label for="m1"><h3>m1 g:</h3></label>
                    <input type="text" name="m1"/>
                    <label for="m2"><h3>m2 g:</h3></label>
                    <input type="text" name="m2"/>
                    <label for="m3"><h3>m3 g:</h3></label>
                    <input id="net" type="text" name="m3"/>
                    <label for="m4"><h3>m4 g:</h3></label>
                    <input type="text" name="m4"/>
                    <label for="m5"><h3>m5 g:</h3></label>
                    <input type="text" name="m5"/>
                    <label for="m6"><h3>m6 g:</h3></label>
                    <input type="text" name="m6"/>
                    <label for="hmin"><h3>hmin mm:</h3></label>
                    <input type="text" name="hmin"/>
                    <label for="hmax"><h3>hmax mm:</h3></label>
                    <input type="text" name="hmax"/>
                    <label for="aa"><h3>aa cm:</h3></label>
                    <input type="text" name="aa"/>
                    <label for="av"><h3>av cm:</h3></label>
                    <input id="tai1" type="text" name="av" disabled="disabled"/>
                    <label for="ba"><h3>ba cm:</h3></label>
                    <input type="text" name="ba"/>
                    <label for="bv"><h3>bv cm:</h3></label>
                    <input id="tai2" type="text" name="bv" disabled="disabled"/>
                    <label for="h1"><h3>h1 cm:</h3></label>
                    <input id="tai3" type="text" name="h1" disabled="disabled"/>
                    <label for="h2"><h3>h2 cm:</h3></label>
                    <input id="tai4" type="text" name="h2" disabled="disabled"/>
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
        $(document).ready(function(){
            $("#taisyklinga").change(function(){
                if($(this).prop("checked")){
                    $("#net").attr("disabled",true);
                    $("#tai1").attr("disabled",false);
                    $("#tai2").attr("disabled",false);
                    $("#tai3").attr("disabled",false);
                    $("#tai4").attr("disabled",false);
                }
                else{
                    $("#tai1").attr("disabled",true);
                    $("#tai2").attr("disabled",true);
                    $("#tai3").attr("disabled",true);
                    $("#tai4").attr("disabled",true);
                    $("#net").attr("disabled",false);
                }
            });
        });
    </script>
      
      <script>
         function getMessage() {
                
                var r1 = $('input[name=m0]').val();
                var r2 = $('input[name=m1]').val();
                var r3 = $('input[name=m2]').val();
                var r4 = $('input[name=m3]').val();
                var r5 = $('input[name=m4]').val();
                var r6 = $('input[name=m5]').val();
                var r7 = $('input[name=m6]').val();
                var json_kodas = (r1/1) + (r2/1) + (r3/1) + (r4/1);

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               
                
               type:'POST',
               url:'/getmsg',
               data:{_token: $('#signup-token').val(), result: json_kodas},
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
