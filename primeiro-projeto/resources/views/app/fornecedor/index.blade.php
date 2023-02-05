{{-- Forma de criar um comentátio --}}

{{-- Forma de imprimir variáveis enviadas pela controller ou não --}}
P1 = {{ $p1 }}
<br>

{{-- Forma de imprimir qualquer coisa --}}
{{ 'Teste de teste' }}
<br>

{{-- Forma de escapar a tag de impressão --}} 
@{{ 'Teste de teste' }}
<br>

{{-- Forma de imprimir imprimir arrays enviadas pela controller ou não --}}
{{-- @dd($fornecedores) --}}
<br>

{{-- Inserir códigos de php puro --}}
@php
    /*
    if ($teste) {
        ..código
    } elseif ($teste1) {
        ..código
    } else {
        ..código
    }
    */
@endphp

{{-- Algumas funcionalidade do laravel --}}
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else 
    <h3>Ainda não existe fornecedores cadastrados</h3>
@endif



{{-- @unless funciona como um operador de negação, @unless vai ser true se a variável for falsa  --}}
@php  $fornecedores = [] @endphp
@unless(count($fornecedores) > 0)
    <h3>Não existe fornecedores cadastrado</h3>
@endunless



@php  
    $vendedores = [];
    $vendedores[1]['nome'] = 'Lucas';
    $vendedores[1]['idade'] = 23;
    $vendedores[1]['loja'] = 'SLDS';

    $vendedores[2]['nome'] = 'Vanessa';
    $vendedores[2]['idade'] = 24;
    $vendedores[2]['loja'] = 'VCS';
@endphp

{{-- Objeto $loop exibe informações do laço de repetição foreach e forelse --}}

@foreach($vendedores as $indice => $vendedor)
    {{-- @dd($loop) --}}

    Iteração atual: {{ $loop->iteration }}
    <br>
    Vendedor: {{ $vendedor['nome'] }}
    <br>
    Vendedor: {{ $vendedor['idade'] }}
    <br>
    Vendedor: {{ $vendedor['loja'] }}
    <br><br>
@endforeach

{{-- @forelse verifica se o array tem itens, se tiver é executado, se não exibe a msg default do bloco @empty --}}
@php  $vendedores = [] @endphp
@forelse($vendedores as $indice => $vendedor)
    Iteração atual: {{ $loop->iteration }}
    <br>
    Vendedor: {{ $vendedor['nome'] }}
    <br>
    Vendedor: {{ $vendedor['idade'] }}
    <br>
    Vendedor: {{ $vendedor['loja'] }}
    <br><br>
    @empty
        Não existe fornecedores cadastrados
@endforelse