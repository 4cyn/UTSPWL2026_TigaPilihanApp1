<!-- @php
    $isEdit = isset($barang);
@endphp

<form action="{{ $isEdit ? route('barang.update', $barang->id) : route('barang.store') }}" method="POST">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control"
               value="{{ old('nama_barang', $barang->nama_barang ?? '') }}">
        @error('nama_barang')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control"
               value="{{ old('kategori', $barang->kategori ?? '') }}">
        @error('kategori')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control"
               value="{{ old('stok', $barang->stok ?? 0) }}" min="0">
        @error('stok')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control"
               value="{{ old('harga', $barang->harga ?? '') }}" min="0" step="0.01">
        @error('harga')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        {{ $isEdit ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form> -->