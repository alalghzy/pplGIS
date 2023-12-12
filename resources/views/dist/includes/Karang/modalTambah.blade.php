 <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
     aria-labelledby="modalCreateLabel" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="modalCreateLabel">Tambah Data</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('karang.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf

                     <div class="form-group" hidden>
                         <label class="font-weight-bold mb-1">user_id</label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control @error('user_id') is-invalid @enderror"
                                 name="user_id" value="{{ Auth::user()->id }}" placeholder="Masukkan data user_id">
                             <span class="input-group-text">%</span>
                         </div>
                         @error('user_id')
                             <div class="alert alert-danger mt-2">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                     <div class="form-group" hidden>
                        <label class="font-weight-bold mb-1">karang_hidup</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('karang_hidup') is-invalid @enderror"
                                name="karang_hidup" placeholder="Masukkan data karang_hidup">
                            <span class="input-group-text">%</span>
                        </div>
                        @error('karang_hidup')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group" hidden>
                        <label class="font-weight-bold mb-1">karang_mati</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('karang_mati') is-invalid @enderror"
                                name="karang_mati" placeholder="Masukkan data karang_mati">
                            <span class="input-group-text">%</span>
                        </div>
                        @error('karang_mati')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                     <div class="form-group">
                         <label class="font-weight-bold mb-1">Pilih Stasiun</label>
                         <select name="post_id" class="form-control @error('post_id') is-invalid @enderror">
                             <option value="">Pilih Stasiun</option>
                             @foreach ($posts as $item)
                                 <option value="{{ $item->id }}">
                                     {{ $item->nama }}
                                 </option>
                             @endforeach
                         </select>
                         @error('post_id')
                             <div class="alert alert-danger mt-2">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label class="font-weight-bold mb-1">Algae (dalam %)</label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control @error('algae') is-invalid @enderror"
                                 name="algae" value="{{ old('algae') }}" placeholder="Masukkan data algae"
                                 oninput="validateNumberInput(this)"
                                 onkeydown="return isNumberKey(event) && isMinusOrPlusKey(event)">
                             <span class="input-group-text">%</span>
                         </div>
                         @error('algae')
                             <div class="alert alert-danger mt-2">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label class="font-weight-bold mb-1">Abiotik (dalam %)</label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control @error('abiotik') is-invalid @enderror"
                                 name="abiotik" value="{{ old('abiotik') }}" placeholder="Masukkan data abiotik"
                                 oninput="validateNumberInput(this)" onkeydown="return isNumberKey(event)">
                             <span class="input-group-text">%</span>
                         </div>
                         @error('abiotik')
                             <div class="alert alert-danger mt-2">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label class="font-weight-bold mb-1">Biota Lain (dalam %)</label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control @error('biota_lain') is-invalid @enderror"
                                 name="biota_lain" value="{{ old('biota_lain') }}"
                                 placeholder="Masukkan data biota lain" oninput="validateNumberInput(this)"
                                 onkeydown="return isNumberKey(event)">
                             <span class="input-group-text">%</span>
                         </div>
                         @error('biota_lain')
                             <div class="alert alert-danger mt-2">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-success shadow-sm" data-bs-toggle="modal"
                             data-bs-target="#modalCreate2">
                             <i class="fa-regular fa-square-plus"></i> Lanjut ke Input data terumbu karang
                         </button>
                     </div>

             </div>
         </div>
     </div>
 </div>

 <!-- Modal Kedua (Input data terumbu karang) -->
 <div class="modal fade" id="modalCreate2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
     tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Input data terumbu karang</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <div class="row">
                     <div class="col-4">

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACB (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('acb') is-invalid @enderror"
                                     name="acb" id="acb" value="{{ old('acb') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('acb')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACD (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('acd') is-invalid @enderror"
                                     name="acd" id="acd" value="{{ old('acd') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('acd')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACE (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('ace') is-invalid @enderror"
                                     name="ace" id="ace" value="{{ old('ace') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('ace')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACS (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('acs') is-invalid @enderror"
                                     name="acs" id="acs" value="{{ old('acs') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('acs')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACT (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('act') is-invalid @enderror"
                                     name="act" id="act" value="{{ old('act') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('act')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                     </div>

                     <div class="col-4">

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CB (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cb') is-invalid @enderror"
                                     name="cb" id="cb" value="{{ old('cb') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cb')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CE (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('ce') is-invalid @enderror"
                                     name="ce" id="ce" value="{{ old('ce') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('ce')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CF (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cf') is-invalid @enderror"
                                     name="cf" id="cf" value="{{ old('cf') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cf')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CM (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cm') is-invalid @enderror"
                                     name="cm" id="cm" value="{{ old('cm') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cm')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CS (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cs') is-invalid @enderror"
                                     name="cs" id="cs" value="{{ old('cs') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cs')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                     </div>

                     <div class="col-4">

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CMR (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cmr') is-invalid @enderror"
                                     name="cmr" id="cmr" value="{{ old('cmr') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cmr')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CHL (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('chl') is-invalid @enderror"
                                     name="chl" id="chl" value="{{ old('chl') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('chl')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CME (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cme') is-invalid @enderror"
                                     name="cme" id="cme" value="{{ old('cme') }}"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangHidup()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                             @error('cme')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">DC (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control" name="dc" id="dc"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangMati()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">DCA (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control" name="dca" id="dca"
                                     placeholder="Masukkan data algae"
                                     oninput="validateNumberInput(this); hitungKarangMati()"
                                     onkeydown="return isNumberKey(event)">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                     </div>

                     <div class="btn-group">
                         <a href="#" class="btn btn-dark active" aria-current="page">Karang Hidup</a>
                         <a href="#" class="btn btn-light"><span id="KarangHidup"></span>%</a>
                         <a href="#" class="btn btn-dark active" aria-current="page">Karang Mati</a>
                         <a href="#" class="btn btn-light"><span id="KarangMati"></span>%</a>
                     </div>

                     {{-- <h4>Karang Hidup = <span id="KarangHidup"></span> | Karang Mati = <span id="KarangMati"></span></h4> --}}

                 </div>

                 <div class="modal-footer">
                     <a class="btn btn-danger shadow-sm" data-bs-target="#modalCreate" data-bs-toggle="modal">
                         <i class="fa-solid fa-angle-left"></i> Kembali
                     </a>
                     <button type="submit" class="btn btn-success shadow-sm">
                         <i class="fa-regular fa-square-plus"></i> Tambah Data
                     </button>
                     </form>

                 </div>
             </div>

         </div>
     </div>
 </div>
