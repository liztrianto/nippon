<?php

namespace App\Exports;

use Illuminate\Contracts\View\View; 
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Writer;
// use Maatwebsite\Excel\Concerns\FromCollection;

use DB; use Auth;

class excelExport implements FromView
{
    use Exportable;

    public function __construct(string $startDate, string $endDate, string $filter_depo, string $filter_status){
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
        $this->filter_depo   = $filter_depo;
        $this->filter_status   = $filter_status;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('assets/images/Nippon-Paint-Favicon.png'));
                $drawing->setCoordinates('A1');

                $drawing->setWorksheet($event->sheet->getDelegate());
            },
        ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         BeforeExport::class  => function(BeforeExport $event) {
    //             $event->writer->setCreator('IT');
    //         },
    //         AfterSheet::class    => function(AfterSheet $event) {
    //             $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    //             $event->sheet->columnWidth('A',15);
    //             $event->sheet->columnWidth('B',18);
    //             $event->sheet->columnWidth('C',40);
    //             $event->sheet->columnWidth('D',20);
    //             $event->sheet->columnWidth('E',15);
    //             $event->sheet->columnWidth('F',40);
    //             $event->sheet->columnWidth('G',50);
    //             $event->sheet->columnWidth('H',40);
    //             $event->sheet->columnWidth('I',15);
    //             $event->sheet->columnWidth('J',40);
    //             $event->sheet->wrapText('A1:J1000');
    //             $event->sheet->setAutoFilter('A1:J1');
    //             $event->sheet->horizontalAlign('A1:J1', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    //             $event->sheet->verticalAlign('A2:J1000' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    //             $event->sheet->verticalAlign('A1:J1' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    //         },
    //     ];
    // }

    public function view(): View
    {   
        $auth = Auth::user();

        if($this->filter_depo == "111" && $this->filter_status == "111"){

            return view('signboard.exportsignboard.excel', [
                'signboards' => DB::table('signboards')
                        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
                        ->leftJoin('m_toko as toko','signboards.toko_id','=','toko.id')
                        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
                        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
                        ->select([
                            'signboards.*', 'depo.nama_depo',
                            'toko.kode_sap','toko.nama_toko','toko.alamat',
                            'toko.kota','toko.nama_pemilik','toko.no_telp'
                        ])
                        ->where('model.id','=',$auth->id)
                        // if($this->filter_status !=null){
    
                            // ->where('signboards.approve','=',$this->filter_status)
                        // }
                        // if($this->filter_depo !=null){
    
                            // ->where('signboards.depoid','=',$this->filter_depo)
                        // }
                        ->whereBetween('signboards.tanggal_pengajuan', [$this->startDate." 00:00:00", $this->endDate." 23:00:00"])
                        ->get()
                
            ]);
        }elseif($this->filter_depo == "111" && $this->filter_status != "111"){
            return view('signboard.exportsignboard.excel', [
                'signboards' => DB::table('signboards')
                        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
                        ->leftJoin('m_toko as toko','signboards.toko_id','=','toko.id')
                        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
                        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
                        ->select([
                            'signboards.*', 'depo.nama_depo',
                            'toko.kode_sap','toko.nama_toko','toko.alamat',
                            'toko.kota','toko.nama_pemilik','toko.no_telp'
                        ])
                        ->where([['model.id', '=',  $auth->id],['signboards.approve','=',$this->filter_status]])
                        // ->where('model.id','=',$auth->id)
                        // if($this->filter_status !=null){
    
                            // ->where('signboards.approve','=',$this->filter_status)
                        // }
                        // if($this->filter_depo !=null){
    
                            // ->where('depo.nama_depo','=',$this->filter_depo)
                        // }
                        ->whereBetween('signboards.tanggal_pengajuan', [$this->startDate." 00:00:00", $this->endDate." 23:00:00"])
                        ->get()
                
            ]);

        }elseif($this->filter_status == "111" && $this->filter_depo != "111"){
            return view('signboard.exportsignboard.excel', [
                'signboards' => DB::table('signboards')
                        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
                        ->leftJoin('m_toko as toko','signboards.toko_id','=','toko.id')
                        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
                        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
                        ->select([
                            'signboards.*', 'depo.nama_depo',
                            'toko.kode_sap','toko.nama_toko','toko.alamat',
                            'toko.kota','toko.nama_pemilik','toko.no_telp'
                        ])
                        ->where([['model.id', '=',  $auth->id],['depo.nama_depo','=',$this->filter_depo]])
                        // ->where('model.id','=',$auth->id)
                        // if($this->filter_status !=null){
    
                            // ->where('signboards.approve','=',$this->filter_status)
                        // }
                        // if($this->filter_depo !=null){
    
                        // ->where('depo.nama_depo','=',$this->filter_depo)
                        // }
                        ->whereBetween('signboards.tanggal_pengajuan', [$this->startDate." 00:00:00", $this->endDate." 23:00:00"])
                        ->get()
                
            ]);

        }else{
            return view('signboard.exportsignboard.excel', [
                'signboards' => DB::table('signboards')
                        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
                        ->leftJoin('m_toko as toko','signboards.toko_id','=','toko.id')
                        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
                        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
                        ->select([
                            'signboards.*', 'depo.nama_depo',
                            'toko.kode_sap','toko.nama_toko','toko.alamat',
                            'toko.kota','toko.nama_pemilik','toko.no_telp'
                        ])
                        ->where([['model.id', '=',  $auth->id],
                        ['depo.nama_depo','=',$this->filter_depo],['signboards.approve','=',$this->filter_status]])
                        // ->where('model.id','=',$auth->id)
                        // if($this->filter_status !=null){
    
                            // ->where('signboards.approve','=',$this->filter_status)
                        // }
                        // if($this->filter_depo !=null){
    
                        // ->where('depo.nama_depo','=',$this->filter_depo)
                        // }
                        ->whereBetween('signboards.tanggal_pengajuan', [$this->startDate." 00:00:00", $this->endDate." 23:00:00"])
                        ->get()
                
            ]);

        }
    }
}
