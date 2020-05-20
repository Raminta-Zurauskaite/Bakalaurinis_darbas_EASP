@extends('applayout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center"> Eksploatacinio atsparumo šalčiui skaičiuoklė</h1>

                <div class="card-body">
                    <h4><div id = 'msg'>
                        Result that changes
                    </div>
                    <?php
                        echo Form::button('Calculate',['onClick'=>'getMessage()']);
                    ?>
                </div>
            </div>
        </div>
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
      </script></h4>
                </div>
            </div>
        </div>
    </div>
</div>            


                
                    
@endsection
