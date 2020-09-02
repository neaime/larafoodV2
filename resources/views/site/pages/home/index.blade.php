<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Planos</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ url('css/site.css') }}">
</head>
<body>

<div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Escolha o Plano</h1>
</div>

<section class="pricing py-5">
<div class="container">
  <div class="row">
    <!-- Free Tier -->
    @foreach($plans as $plan)
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title text-muted text-uppercase text-center">{{ $plan->name }}</h5>
          <h6 class="card-price text-center">{{ number_format($plan->price, 2, ',', '.') }}<span class="period">/mês</span></h6>
          <hr>
            <ul class="fa-ul">
                @foreach($plan->details as $detail)
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $detail->name }}</li>
                @endforeach
            </ul>
          <a href="#" class="btn btn-block btn-danger text-uppercase">Assinar</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

</body>
</html>
