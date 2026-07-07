<h2>Edit Tindakan</h2>

<form action="{{ route('tindakan.update', $tindakan->id) }}" method="POST">
@csrf
@method('PUT')

<select name="produksi_id">
@foreach($produksi as $p)
    <option value="{{ $p->id }}" {{ $p->id == $tindakan->produksi_id ? 'selected' : '' }}>
        {{ $p->masalah }}
    </option>
@endforeach
</select>

<input type="text" name="tindakan" value="{{ $tindakan->tindakan }}">
<input type="date" name="tanggal" value="{{ $tindakan->tanggal }}">
<input type="text" name="pic" value="{{ $tindakan->pic }}">

<button type="submit">Update</button>
</form>