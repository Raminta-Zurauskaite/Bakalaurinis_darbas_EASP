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
                

                
                    <?php
                        echo Form::button('Calculate',['onClick'=>'getMessage()', 'class' => 'btn btn-primary', 'style' => "margin-bottom: 20px"]);
                    ?>
                    <div>
                    <div id = 'msg'>
                        Atsakymas
                    </div>
                   <!-- <button onclick="export_pdf()" class="btn btn-primary"  style="margin-bottom: 20px">
                    Siųstis skaičiavimo ataskaitą
                </button> -->
                <div>
    <p><a href='/export_pdf' class="btn btn-danger">{{ __('Download pdf') }}</a></p>
    </div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
      

      <script>
        $(document).ready(function(){
            $("#taisyklinga").change(function(){
                if($(this).prop("checked")){
                    $('#net').val('');
                    $("#net").attr("disabled",true);
                    $("#tai1").attr("disabled",false);
                    $("#tai2").attr("disabled",false);
                    $("#tai3").attr("disabled",false);
                    $("#tai4").attr("disabled",false);
                }
                else{
                    $('#tai1').val('');
                    $('#tai2').val('');
                    $('#tai3').val('');
                    $('#tai4').val('');
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
        function export_pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('skaiciavimai.pdf');
    }
    </script>
      
      <script>
         function getMessage() {
                
                var r0 = $('input[name=taisyklinga]').val();
                var m0 = $('input[name=m0]').val();
                var m1 = $('input[name=m1]').val();
                var m2 = $('input[name=m2]').val();
                var m3 = $('input[name=m3]').val();
                var m4 = $('input[name=m4]').val();
                var m5 = $('input[name=m5]').val();
                var m6 = $('input[name=m6]').val();
                var hmin = $('input[name=hmin]').val();
                var hmax = $('input[name=hmax]').val();
                var aa = $('input[name=aa]').val();
                var av = $('input[name=av]').val();
                var ba = $('input[name=ba]').val();
                var bv = $('input[name=bv]').val();
                var h1 = $('input[name=h1]').val();
                var h2 = $('input[name=h2]').val();

                var S = aa * ba;
                if ($(taisyklinga).prop("checked") ){
                    var V = (((aa/1+av/1)/2)*((ba/1+bv/1)/2)*((h1/1+h2/1)/2));
                }
                else {
                    var vand_tankis = 1;
                    var V = (m4-m3)/vand_tankis;
                }

                var We = (m0/V) * ((m1-m0)/m0) * 100;

                var Wr = (m0/V) * ((m4-m0)/m0) * 100;

                var N = ((hmax-hmin)/hmin);

                var R = (1-(We/Wr))*100;

                var D = ((100-Wr)/Wr);

                var g1 = ((m2-m0)/S);

                var G1 = ((m5-m0)/S);

                var G2 = ((m6-m0)/S);

                if (We <= 26){
                    var Fre1 = (0.231*(((R**1.068)*(D**1.345)*(G1**0.275)*(G2**0.663))/((N**0.285)*(g1**0.830))));
                    var Fre2 = (0.231*(((R**1.465)*(D**0.759)*(G1**0.383)*(G2**0.852))/((N**0.168)*(g1**1.034))));
                    var Fre = Fre1;
                    var Free = Fre2;
                }
                else {
                    var Fre3 = (0.051*(((R**1.642)*(D**2.332)*(G1**0.383)*(g1**0.852))/((N**0.334)*(G2**1.145))));
                    var Fre4 = (0.063*(((R**1.813)*(D**2.135)*(G1**0.179)*(g1**1.134))/((N**0.395)*(G2**0.517))));
                    var Fre = Fre3;
                    var Free = Fre4;
                }

                var t = (Math.E**(3.31981+(0.00524*Fre)));

                var json_kodas = 'S: ' + S.toFixed(2) + ' V: ' + V.toFixed(2) + ' We: ' + We.toFixed(2) + ' Wr: ' + Wr.toFixed(2) + ' N: ' + N.toFixed(2) + ' R: ' + R.toFixed(2) + ' D: ' + D.toFixed(2) + ' g1: ' + g1.toFixed(2);
                json_kodas = json_kodas + ' G1: ' + G1.toFixed(2) + ' G2: ' + G2.toFixed(2) + ' Fre1 arba Fre3: ' + Fre.toFixed(0) + ' Fre2 arba Fre4: ' + Free.toFixed(0) + ' t: ' + t.toFixed(0);

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
