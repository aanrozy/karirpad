@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    @foreach($barang as $p)
                    <form action="/edit/update" method="post">
                        {{ csrf_field() }}
                        foto <input type="hidden" name="id" value="{{ $p->barang_id }}"> <br/>
                        foto <input type="text" name="foto" value="{{ $p->foto_barang }}"> <br/>
                        nama <input type="text" name="nama" value="{{ $p->nama_barang }}"> <br/>
                        kategori <input type="text" name="kategori" value="{{ $p->kategori }}"> <br/>
                        harga <input type="number" name="harga" value="{{ $p->harga }}"> <br/>
                        <input type="submit" value="Simpan Data">
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
