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

                    <form action="/home/tambah" method="post">
                        {{ csrf_field() }}
                        <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="file" name="foto" required="required" placeholder="Foto"
                                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                                    </div>
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="text" name="nama" required="required" placeholder="Nama"
                                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="text" name="kategori" required="required" placeholder="Kategori"
                                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                                    </div>
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="number" name="harga" required="required" placeholder="Harga"
                                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                                        </div>
                                </div>
                            </div>
                            <div class="flex justify-center"><input type="submit" class="p-2 border w-1/4 rounded-md bg-gray-800 text-white" value="Simpan Data"></div>
                        </div>
                    </form>
                    <br><br>
                    <table class="min-w-full leading-normal">
                    <tr>
                        <th class="text-center">no</th>
                        <th class="text-center">foto barang</th>
                        <th class="text-center">nama barang</th>
                        <th class="text-center">kategori</th>
                        <th class="text-center">harga</th>
                        <th class="text-center">diskon</th>
                        <th class="text-center">setelah diskon</th>
                        <th class="text-center">aksi</th>
                    </tr>
                    <!-- {{ $i = 1 }} -->
                    <!-- $diskon -->
                    @foreach($barang as $p)
                    <tr>
                        <td class="text-center">
                            {{ $i++ }}
                        </td>
                        <td class="text-center">{{ $p->foto_barang }}</td>
                        <td class="text-center">{{ $p->nama_barang }}</td>
                        <td class="text-center">{{ $p->kategori }}</td>
                        <td class="text-center">{{ $p->harga }}</td>
                        @if($p->harga >= 20000 && $p->harga <= 40000)
                            <td class="text-center">{{ $diskon = ($p->harga * 5) / 100 }}</td>
                        @elseif($p->harga >= 40000)
                            <td class="text-center">{{ $diskon = ($p->harga * 10) / 100 }}</td>
                        @else
                            <td class="text-center">{{ $diskon = 0 }}</td>
                        @endif

                        @if($diskon != 0)
                            <td class="text-center">{{ $p->harga - $diskon }}</td>
                        @else
                            <td class="text-center">{{ $p->harga }}</td>
                        @endif
                        <td class="text-center"><a href="/edit/{{ $p->barang_id }}">Edit</a> | <a href="/hapus/{{ $p->barang_id }}">Hapus</a></td>
                    </tr>
                    @endforeach
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
