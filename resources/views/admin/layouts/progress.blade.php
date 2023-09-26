
@php
    $userProducts = DB::table('products')
    ->where('user_id', '=', Auth::user()->id)
    ->count();
    $percentageStart = 0;
    $progressStart = 0;
    $percentage = 0;
    $progress = 14;
    $mission = "დაამატეთ კომპანიის ლოგო ";
    $mission = __('admin._progress_add_logo');
    $url = "";

    if(Auth::user()->image != "logo.png"){
        $percentageStart = 0;
        $progressStart = 14;
        $percentage = 14;
        $progress = 29;
        $mission = "დაამატეთ პროდუქტი ";
        $mission = __('admin._progress_add_product');
        $url = "";

        if($userProducts > 0){
            $percentageStart = 14;
            $progressStart = 29;
            $percentage = 29;
            $progress = 45;
            $mission = "დაამატეთ სოციალური ქსელი";
            $mission = __('admin._progress_add_social');
            $url = "";

            if(Auth::user()->facebook || Auth::user()->instagram){
                $percentageStart = 29;
                $progressStart = 45;
                $percentage = 45;
                $progress = 60;
                $mission = "დაამატეთ პრომო კოდი";
                $mission = __('admin._progress_add_promo');
                $url = "";

                if(Auth::user()->promo && Auth::user()->promo_code){
                    $percentageStart = 45;
                    $progressStart = 60;
                    $percentage = 60;
                    $progress = 80;
                    $mission = "დაამატეთ გუგლ ანალიტიქსი";
                    $mission = __('admin._progress_add_analitycs');
                    $url = "";

                    if(Auth::user()->analytics && Auth::user()->analytics_script){
                        $percentageStart = 60;
                        $progressStart = 80;
                        $percentage = 80;
                        $progress = 100;
                        $mission = "დამატეთ გადახდის მეთოდი";
                        $mission = __('admin._progress_add_payment');
                        $url = "";

                        if(Auth::user()->tbc || Auth::user()->payze || Auth::user()->payze_iban){
                            $percentageStart = 80;
                            $progressStart = 100;
                            $percentage = 100;
                            $progress = 100;
                            $mission = "მისია შესრულდა";
                            $mission = __('admin._progress_done');
                            $url = "";
                        }
  
                    }
                }
            }
        }
    }
    
@endphp


<div class="container-fluid">
    <div class="progress-div">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary mission">@lang('admin._progress') </h5>
                        <div class="progress-way">
                            
                            <div class="progress-line" style="width:<?= $percentage ?>%">
                                {{$percentage}}%
                            </div>
                            <div class="progress-line-way" style="width:<?= $progress ?>%">
                            </div>
                        </div>
                        <p class="mt-4">
                            {{$mission}}
                        </p>

                        <!-- <a href="" class="btn btn-sm btn-outline-primary video-instruction">@lang('admin._video_instruction')</a> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@if (\Session::has('success'))
<script>
  $(".progress-line").css('width','<?= $percentageStart ?>%')
  $(".progress-line-way").css('width','<?= $progressStart ?>%')
  $(".progress-line").empty()
  $(".progress-line").append('<?= $percentage ?> %')
  $(".progress-line").animate({
    width: "<?= $percentage ?>%"
  }, 2500 );

</script>
@endif

<script>
    if('<?= $percentage ?>' == 0){
    $(".progress-line").empty()
    $(".progress-line-way").append('<?= $percentage ?> %')

  }
</script>

