<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ExportCSVController extends Controller
{

    public function exportCSVAndStorage()
    {
        try {
            $folder = 'CVSProduct';
            $storage = Storage::disk('local');

            if (!$storage->exists($folder)) {
                $storage->makeDirectory($folder, 0777, true, true);
            }

            $fileName = 'AllProductToCSV-'.date('d-m-Y').'.csv';
            $file = fopen(storage_path('app/'.$folder.'/').$fileName, 'w');
            // set header
            $columns = [
                'Id',
                'Product Name',
                'Sale Price',
            ];
            fputcsv($file, $columns);

            $data = Product::select('id', 'prod_name', 'sale_price');
            $data = $data->cursor()->each(function($data) use($file){
                $data = $data->toArray();
                fputcsv($file, $data);
            });
            return true;
        } catch (\Exception $e) {
            \Log::error('Export Product to CSV and Storage:'.$e->getMessage());
            return false;
        }
    }
}
