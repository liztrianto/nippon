<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Rekapitulasi Signboard</title>

    
    
</head>
<body>
    <table>
        <thead class="bg-info">            
            <tr style="border:1px solid black" text-align="center">
                <th style="width:40px; border:1px solid black" valign="center">
                    <strong>NO.</strong>
                </th>
                <th style="width:150px; border:1px solid black" valign="center" align="center"><strong>Tgl Pengajuan</strong></th>                
                <th style="width:180px; border:1px solid black" valign="center" align="center"><strong>Depo</strong></th>
                <th style="width:100px; border:1px solid black" valign="center" align="center"><strong>Kode SAP</strong></th>
                <th style="width:100px; border:1px solid black" valign="center" align="center"><strong>Nama Toko</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>Alamat</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>Orderan</strong></th>
                <th style="width:50px; border:1px solid black" valign="center" align="center"><strong>T</strong></th>
                <th style="width:50px; border:1px solid black" valign="center" align="center"><strong>P</strong></th>
                <th style="width:50px; border:1px solid black" valign="center" align="center"><strong>S</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>Keterangan</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>Jenis Orderan</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>No. PO</strong></th>
                <th style="width:200px; border:1px solid black" valign="center" align="center"><strong>Proses</strong></th>
                <!-- <th rowspan="2" style="width:200px; border:1px solid black" valign="center" align="center"><strong>Proses</strong></th> -->
                <!-- <th colspan="2" style="border:100px solid black; border-right:1px solid black" align="center">
                <strong>Status</strong></th>   -->
                          
            </tr>
            <!-- <tr>
                <td style="width:70px; border:120px solid black">OK</td>
                <td style="width:70px; border:120px solid black">N/OK</td>
            </tr> -->
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($signboards as $data)                
                <tr>
                    <td style="border:1px solid black; width:40px" valign="top">{{$i}}</td>
                    <td style="border:1px solid black; width:150px" valign="top">{{ date('d-m-Y', strtotime($data->tanggal_pengajuan)) }}</td>
                    <td style="border:1px solid black; width:100px " valign="top">{{ $data->nama_depo }}</td>
                    <td style="border:1px solid black; width:100px" valign="top">{{ $data->kode_sap }}</td>
                    <td style="border:1px solid black; width:150px" valign="top">{{ $data->nama_toko }}</td>
                    <td style="border:1px solid black;"> {{ $data->alamat }} </td>                    
                    <td style="border:1px solid black; width:100px"></td>
                    <td style="border:1px solid black;"></td>                    
                    <td style="border:1px solid black;"></td>                    
                    <td style="border:1px solid black;"></td>                    
                    <td style="border:1px solid black; width:100px"> {{ $data->keterangan }} </td>                    
                    <td style="border:1px solid black; width:100px"></td>                    
                    <td style="border:1px solid black; width:100px"></td>                    
                    <td style="border:1px solid black; width:100px"></td>                    
                </tr>
                @php $i++ @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
