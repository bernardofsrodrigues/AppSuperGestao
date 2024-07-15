<h3>Fornecedor</h3>

@php
@endphp


@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Vaariavel não definida'}}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? 'Vaariavel não definida'}} {{ $fornecedor['telefone'] ?? 'Vaariavel não definida'}}
        <hr>
    @empty
        Não existem valores cadastrados
    @endforelse
@endisset
<br><br>