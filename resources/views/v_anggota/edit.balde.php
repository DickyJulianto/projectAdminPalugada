<h3>{{$judul}}</h3>

<form action="{{ route('anggota.update', $edit->id) }}" method="post">
    @method('put')
    @csrf
    <label>Nama</label><br>
    <input type="text" name="nama" value="{{old('nama', $edit->nama)}}" placeholder="Masukkan Nama Lengkap">
    <p></p>
    <label>HP</label><br>
    <input type="text" name="hp" value="{{old('hp', $edit->hp)}}" placeholder="Masukkan Nomor HP">
    <p></p>
    <button type="submit">Perbaharui</button>
    <a href="{{ route('anggota.index') }}">
        <button type="button">Batal</button>
    </a>
</form>
