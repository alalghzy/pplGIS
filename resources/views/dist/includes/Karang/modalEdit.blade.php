<div class="modal fade" id="modalEdit-{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('karang.update',  $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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

                    <div class="form-group">
                       <label class="font-weight-bold mb-1">Pilih Stasiun</label>
                       <select name="post_id" class="form-control form-select @error('post_id') is-invalid @enderror">
                           <option style="background-color: blue; color:white" value="{{ $post->post->id }}">{{ $post->post->nama }}</option>
                           @foreach ($posts as $item)
                               <option value="{{ $item->id }}" >
                                   {{ $item->nama }}
                               </option>
                           @endforeach
                       </select>
                       @error('post_id')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Algae (dalam %)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('algae') is-invalid @enderror"
                                name="algae" value="{{ $post->algae }}" placeholder="Masukkan data algae"
                                oninput=""
                                onkeydown=" && isMinusOrPlusKey(event)">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Abiotik (dalam %)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('abiotik') is-invalid @enderror"
                                name="abiotik" value="{{ $post->abiotik }}" placeholder="Masukkan data abiotik"
                                oninput="" onkeydown="">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Biota Lain (dalam %)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('biota_lain') is-invalid @enderror"
                                name="biota_lain" value="{{ $post->biota_lain }}"
                                placeholder="Masukkan data biota lain" oninput=""
                                onkeydown="">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success shadow-sm" data-bs-toggle="modal"
                            data-bs-target="#modalEdit2-{{ $post->id }}">
                            <i class="fa-regular fa-square-plus"></i> Lanjut ke Input data terumbu karang
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>

 <!-- Modal Kedua (Input data terumbu karang) -->
 <div class="modal fade" id="modalEdit2-{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
     aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
                                     name="acb" id="edit_acb_{{ $post->id }}" value="{{ $post->acb }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACD (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('acd') is-invalid @enderror"
                                     name="acd" id="edit_acd_{{ $post->id }}" value="{{ $post->acd }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACE (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('ace') is-invalid @enderror"
                                     name="ace" id="edit_ace_{{ $post->id }}" value="{{ $post->ace }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACS (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('acs') is-invalid @enderror"
                                     name="acs" id="edit_acs_{{ $post->id }}" value="{{ $post->acs }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">ACT (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('act') is-invalid @enderror"
                                     name="act" id="edit_act_{{ $post->id }}" value="{{ $post->act }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                     </div>

                     <div class="col-4">

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CB (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cb') is-invalid @enderror"
                                     name="cb" id="edit_cb_{{ $post->id }}" value="{{ $post->cb }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CE (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('ce') is-invalid @enderror"
                                     name="ce" id="edit_ce_{{ $post->id }}" value="{{ $post->ce }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CF (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cf') is-invalid @enderror"
                                     name="cf" id="edit_cf_{{ $post->id }}" value="{{ $post->cf }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CM (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cm') is-invalid @enderror"
                                     name="cm" id="edit_cm_{{ $post->id }}" value="{{ $post->cm }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CS (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cs') is-invalid @enderror"
                                     name="cs" id="edit_cs_{{ $post->id }}" value="{{ $post->cs }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                     </div>

                     <div class="col-4">

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CMR (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cmr') is-invalid @enderror"
                                     name="cmr" id="edit_cmr_{{ $post->id }}" value="{{ $post->cmr }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CHL (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('chl') is-invalid @enderror"
                                     name="chl" id="edit_chl_{{ $post->id }}" value="{{ $post->chl }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">CME (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('cme') is-invalid @enderror"
                                     name="cme" id="edit_cme_{{ $post->id }}" value="{{ $post->cme }}"
                                     placeholder="Masukkan data"
                                     oninput="hitungKarangHidups('{{ $post->id }}')"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">DC (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('dc') is-invalid @enderror"
                                     name="dc" id="edit_dc_{{ $post->id }}"  value="{{ $post->dc }}" placeholder="Masukkan data"
                                     oninput="hitungKarangMatis({{ $post->id }})"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="font-weight-bold mb-1">DCA (dalam %)</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control @error('dca') is-invalid @enderror"
                                     name="dca" id="edit_dca_{{ $post->id }}" value="{{ $post->dca }}" placeholder="Masukkan data"
                                     oninput="hitungKarangMatis({{ $post->id }})"
                                     onkeydown="">
                                 <span class="input-group-text">%</span>
                             </div>
                         </div>

                         <div class="form-group" hidden>
                            <label class="font-weight-bold mb-1">karang_hidup</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('karang_hidup') is-invalid @enderror"
                                       value="{{$post->karang_hidup}}" name="karang_hidup" id="edit_karang_hidup_{{ $post->id }}" placeholder="Masukkan data karang_hidup">
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
                                   value="{{ $post->karang_mati }}" name="karang_mati" id="edit_karang_mati_{{ $post->id }}" placeholder="Masukkan data karang_mati">
                                <span class="input-group-text">%</span>
                            </div>
                            @error('karang_mati')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                     </div>

                     <div class="btn-group">
                         <a href="#" class="btn btn-dark active" aria-current="page">Karang Hidup</a>
                         <a href="#" class="btn btn-light"><span id="edit_KarangHidup_{{ $post->id }}"></span>%</a>
                         <a href="#" class="btn btn-dark active" aria-current="page">Karang Mati</a>
                         <a href="#" class="btn btn-light"><span id="edit_KarangMati_{{ $post->id }}"></span>%</a>
                     </div>

                 </div>

                 <div class="modal-footer">
                     <a class="btn btn-danger shadow-sm" data-bs-target="#modalEdit-{{ $post->id }}" data-bs-toggle="modal">
                         <i class="fa-solid fa-angle-left"></i> Kembali
                     </a>
                     <button type="submit" class="btn btn-success shadow-sm" id="tambahDataBtn">
                        <i class="fa-regular fa-square-plus"></i> Tambah Data
                    </button>
                     </form>

                 </div>
             </div>

         </div>
     </div>
 </div>
