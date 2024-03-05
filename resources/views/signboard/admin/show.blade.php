<style>

    .tabbed-text {
    display: inline-block;
    width: 210px; /* Sesuaikan lebar sesuai kebutuhan Anda */
    margin-left: 5px; /* Atur jarak tab di sini */
}

.tabbed {
    display: inline-block;
    width: 240px; /* Sesuaikan lebar sesuai kebutuhan Anda */
    margin-left: 5px; /* Atur jarak tab di sini */
}

</style>

                <table class="table table-hover table-striped table-bordered col-mc-6">
                        <thead class="bg-secondary">
                            <tr>
                                <th width="40%">Uraian</th>
                                <th   width="60%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            <tr>
                                <th width="45%">Tanggal Pengajuan</th>
                                <td   width="60%" class="">{{ date('d-M-Y', strtotime($model->tanggal_pengajuan)) }}</td>
                            </tr>
                            <tr>
                                <th>Pengajuan</th>
                                <td  >
                                    @if($model->jenis_pengajuan == 1 )
                                            Pemasangan Baru
                                    @elseif($model->jenis_pengajuan == 2 )
                                        Perbaikan
                                    @else
                                        Penurunan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Depo</th>
                                <td >{{ $model->toko->depo->nama_depo }}</td>
                            </tr>
                            <tr>
                                <th>SAP kode cust</th>
                                <td  >{{ $model->toko->kode_sap }}</td>
                            </tr>
                            <tr>
                                <th>Nama Toko</th>
                                <td  >{{ $model->toko->nama_toko }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td  >{{ $model->toko->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Telp. Toko</th>
                                <td  >{{ $model->toko->no_telp }}</td>
                            </tr>
                            <tr>
                                <th>Ukuran & design Reklame</th>
                                <td ></td>
                            </tr>
                            <tr >
                                <th>Design ini digunakan untuk signboard yang terpasang menempel (diseuaikan dengan lokasi)</th>
                                <td >
                                        @php 
                                            $i = 1;
                                        @endphp
                                        @foreach($detail as $row)
                                            @if($row->type == 1)
                                            <span class="tabbed" >
                                                {{ $i }}. {{ $row->design }}         
                                            </span>
                                            T : {{ $row->panjang }}M  X {{ $row->lebar }}M 
                                            <img class="" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                            <br>
                                            @php 
                                                $i++;
                                            @endphp
                                            @endif
                                    
                                    
                                            
                                        @endforeach

                                </td>
                            </tr>
                            
                            <tr>
                                <th>Design ini digunakan untuk signboard yang terpasang menggunakan tiang</th>
                                <td>
                                        @foreach($detail as $row)
                                            @if($row->type == 2)
                                            <span class="tabbed" >
                                                {{ $i }}. {{ $row->design }}         
                                            </span>
                                            T : {{ $row->panjang }}M  X {{ $row->lebar }}M 
                                            <img class="" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                            <br>
                                            @php 
                                                $i++;
                                            @endphp
                                            @endif
                                    
                                    
                                           
                                        @endforeach
                                 </td>
                               
                            </tr>
                            <tr>
                                <th></th>
                                <td </td>
                            </tr>
                            <tr>
                                <th>Ukuran Pintu Harmonika</th>
                                <td >
                                       
                                        @foreach($detail as $row)
                                            @if($row->type == 3)
                                            <span class="tabbed" >
                                                {{ $i }}. {{ $row->design }}         
                                            </span>
                                            T : {{ $row->panjang }}M  X {{ $row->lebar }}M 
                                            <img class="" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                            <br>
                                            @php 
                                                $i++;
                                            @endphp
                                            @endif
                                    
                                    
                                            
                                        @endforeach

                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td ></td>
                            </tr>
                            <tr>
                                <th>Omset Toko</th>
                                <td > Rp. {{ $model->omset }} </td>
                            </tr>
                            <tr>
                                <th>Shop Size</th>
                                <td > Rp. {{ $model->shop_size }} </td>
                            </tr>
                            <tr>
                                <th>Pajak Reklame</th>
                                <td >Rp.  {{ $model->pajak_reklame }} </td>
                            </tr>
                            <tr>
                                <th>Pengiriman</th>
                                <td >
                                    @if($model->pengiriman == 1)
                                        Depo
                                    @elseif($model->pengiriman == 2)
                                        Toko
                                    @elseif($model->pengiriman == 3)
                                        Expedisi
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <th>Detail Pengiriman</th>
                                <td >
                                    @if($model->pengiriman == 3)
                                    <span class="tabbed-text" >Nama Expedisi</span>: {{ $model->expedisi->name }} <br>
                                    <span class="tabbed-text" >Alamat </span>: {{ $model->expedisi->alamat }} <br>
                                    <span class="tabbed-text" >No Telepon / Kontak Person </span>: {{ $model->expedisi->no_telp }} <br>
                                    <span class="tabbed-text" >Merk </span>: {{ $model->merk }}
                                    @else
                                        -
                                    @endif 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                     <br><br>
                    <img src="{{ route('approval.showphoto', $model->id) }}"  width="100%">  
                    <img src="{{ route('approval.showfile', $model->id) }}"  width="100%">  