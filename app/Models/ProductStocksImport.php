<?php

namespace App\Models;

use App\Models\ProductStock;
use App\Models\Product;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Auth;
use Storage;
use App\Models\ProductErrorsExport;
use Excel;

class ProductStocksImport implements ToCollection, WithHeadingRow, WithValidation, ToModel
{
    private $rows = 0, $communityAry = [];

    public function __construct($request)
    {
        $this->communityAry = $request->community;
    }

    public function collection(Collection $rows) {
        foreach ($this->communityAry AS $community) {
            foreach ($rows as $row) {
                if (is_numeric($row['startdate_mmddyyyy']) && is_numeric($row['enddate_mmddyyyy']) && is_numeric($row['price']) && is_numeric($row['minorderqty']) && is_numeric($row['shippingdays'])) {
                    $product = Product::findOrFail($row['uniqueid']);
                    if ($product) {
                        ProductStock::create([
                            'product_id' => $row['uniqueid'],
                            'seller_id' => $community,
                            'price' => $row['price'],
                            'qty' => $row['minorderqty'],
                            'est_shipping_days' => intval($row['shippingdays']),
                            'purchase_start_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['startdate_mmddyyyy']),
                            'purchase_end_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['enddate_mmddyyyy']),
                        ]);
                    }
                }
            }
        }

        flash(translate('Products imported successfully'))->success();
    }

    public function model(array $row)
    {
        ++$this->rows;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function rules(): array
    {
        return [
             // Can also use callback validation rules
             'price' => function($attribute, $value, $onFailure) {
                  if (!is_numeric($value)) {
                       $onFailure('Unit price is not numeric');
                  }
              }
        ];
    }

    public function downloadThumbnail($url){
        try {
            $upload = new Upload;
            $upload->external_link = $url;
            $upload->save();

            return $upload->id;
        } catch (\Exception $e) {

        }
        return null;
    }

    public function downloadGalleryImages($urls){
        $data = array();
        foreach(explode(',', str_replace(' ', '', $urls)) as $url){
            $data[] = $this->downloadThumbnail($url);
        }
        return implode(',', $data);
    }
}
