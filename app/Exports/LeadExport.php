<?php
/**
 * Created by PhpStorm.
 * User: jigar
 * Date: 7/8/2018
 * Time: 10:27 PM
 */

namespace App\Exports;

use App\Lead;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection,WithHeadings
{
    public function collection()
    {

        return Lead::all();

    }

    public function headings(): array
    {
        return [
            'id',
            'Name1',
            'Name2',
            'Company Url',
            'Company Name',
            'Contact No1',
            'Contact No2',
            'Email 1',
            'Email 2',
            'Country',
            'Meeting Status',
            'Created At',
            'Updated At',
        ];
    }
}

