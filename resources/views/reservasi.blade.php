@extends('layouts.sbadmin2')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Reservasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registrasipasien.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 form-group ">
                                    <label for="nama_pasien">Nama Pemilik Hewan</label>
                                    {{-- <input type="text" name="nama_pasien" class="form-control"
                                        value="{{ old('nama_pasien') }}" autofocus /> --}}
                                    <input type="text" class="form-control" readonly name="nama_pasien" value="{{ Auth::user()->name }}" autofocus>

                                    <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input id="nomor_hp" type="tel" class="form-control @error('nomor_hp') is-invalid @enderror" 
           name="nomor_hp" value="{{ old('nomor_hp') }}" required pattern="^\+?[0-9]{10,15}$">
                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label for="nomor_hp">Nama Hewan</label>
                                    <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}"
                                        autofocus />
                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label for="nomor_hp">Jenis Hewan</label>
                                    <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}"
                                        autofocus />
                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                </div>
                                
                                <div class="col-md-6 form-group ">
                                    <label for="nomor_hp">Umur Hewan</label>
                                    <input type="number" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}"
                                        autofocus />
                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                </div>

                                <div class="col-md-6">
                                    <label for="jj">Jenis Kelamin Hewan</label>
                                    <div class="form-check ml-3">
                                        <input type="radio" name="jenis_kelamin" value="Jantan"
                                            class="form-check-input" id="lk"
                                            {{ old('jenis_kelamin') == 'Jantan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="lk">
                                            Jantan
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input type="radio" name="jenis_kelamin" value="Betina"
                                            class="form-check-input" id="pr"
                                            {{ old('jenis_kelamin') == 'Betina' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pr">
                                            Betina
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>
                            

                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <label for="tanggal">Rencana Tanggal Berobat</label>
                                    <input id="tanggal" class="form-control" type="datetime-local" name="tanggal"
                                        value="{{ date('Y-m-d\TH:i') }}">
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="poli_id">Pilih Layanan Tujuan</label>
                                    <select name="poli_id" id="poli_id" class="form-control">
                                        @foreach ($poli as $item)
                                            <option value="{{ $item->id }}" @selected(old('poli_id') == $item->id)>
                                                {{ $item->nama }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('poli_id') }}</span>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="keluhan">Keluhan Pasien</label>
                                <textarea name="keluhan" class="form-control" rows="3">{{ old('keluhan') }}</textarea>
                                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                            </div>



                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">DAFTAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
