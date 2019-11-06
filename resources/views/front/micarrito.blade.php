@extends('front.layouts.main')
@section('title')
<title>Mi carrito</title>
<meta name="token" id="token" value="{{ csrf_token() }}">
<meta name="route" id="route" value="{{url('/')}}">
@endsection
@section('Contenido')
<br>
<br>
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" >
		
		<div class="container" id="encargos">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Producto</th>
									<th class="column-3">Precio</th>
									<th class="column-3">Accion</th>
								</tr>

								@for ($i = 0; $i <sizeof($pedidos) ; $i++)
									<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="img/{{ $pedidos[$i]->photo }}" alt="IMG" style="width: 160px;height: 120px">
										</div>
									</td>
									
									<td class="column-3">$ {{ $pedidos[$i]->precio }}</td>
									<td class="column-3"><button class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" v-on:click="cancelarEncargo({{ $pedidos[$i]->codigo }})">Cancelar</button></td>
								</tr>
								@endfor

							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							TOTALES DEL CARRITO
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Envío:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Todos los envíos estan a cargo del admnistrador y puede aplicar costos sin previo aviso.
								</p>
								
								
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									
								</span>
							</div>

							<div class="size-208">
								<span class="stext-110 cl2">
									Costos
								</span>
							</div>

							@for ($i = 0; $i <sizeof($pedidos) ; $i++)
								<div class="size-209">
								<span class="mtext-110 cl2">
								{{ $i+1 }} - ${{ $pedidos[$i]->precio }}
								</span>
							</div>
							@endfor
						</div>

						

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									${{ $total[0]->total }}
								</span>
							</div>
						</div>

					
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{asset('js/Encargos/encargos.js')}}"></script>


@endsection