<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ExcelController extends Controller
{
    /**
     * Export Demo/Trial data in excel form
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $table = $request->input('menu');

        $query = $table == 'requests' ?  ModelsRequest::query() : Candidate::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay(),
            ]);
        }

        $data = $query->get(Schema::getColumnListing($table));

        $export = new class($data, $table) implements FromCollection, WithHeadings {
            protected $data;
            protected $table;

            public function __construct($data, $table)
            {
                $this->data = $data;
                $this->table = $table;
            }

            public function collection()
            {
                return $this->data;
            }

            public function headings(): array
            {
                $output = array_map(function ($item) {
                    return Str::title(str_replace('_', ' ', $item));
                }, Schema::getColumnListing($this->table));
                return $output;
            }
        };

        $date = Carbon::now()->format('d-m-Y');
        $fileName = "{$date}_{$table}_report.xlsx";

        return Excel::download($export, $fileName);
    }
}
