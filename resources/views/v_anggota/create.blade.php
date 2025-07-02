<h3>{{$judul}}</h3>

<form action="{{ route('anggota.store') }}" method="post">
    @csrf
    <label>Nama</label><br>
    <input type="text" name="nama" value="{{old('nama')}}" placeholder="Masukkan Nama Lengkap">
    <p></p>
    <label>HP</label><br>
    <input type="text" name="hp" value="{{old('hp')}}" placeholder="Masukkan Nomor HP">
    <p></p>
    <button type="submit">Simpan</button>
    <a href="{{ route('anggota.index') }}">
        <button type="button">Batal</button>
    </a>
</form>
