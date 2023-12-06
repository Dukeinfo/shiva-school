<?php

namespace Database\Seeders;

use App\Models\Memberships;
use App\Traits\UploadTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use Illuminate\Http\UploadedFile;
class MembershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use UploadTrait;

    public function run()
    {
        Memberships::truncate();

        $imageDirectory = public_path('assets/images/clients');
        $imageFiles = File::allFiles($imageDirectory);
        $storageFolder = 'uploads/membership'; // Specify the storage folder

        $memberships = [];

        foreach ($imageFiles as $file) {
            $uploadedFile = new UploadedFile(
                $file->getPathname(),
                $file->getFilename(),
            );

            $uploadedData = $this->uploadOne($uploadedFile, $storageFolder);
            if ($uploadedData) {
                $memberships[] = [
                    'name' => Null,
                    'slug' => Null,
                    'logo' => $uploadedData['file_name'],
                    'thumbnail' => $uploadedData['thumbnail_name'], // Assuming you extract the filename from the uploaded data
                    'status' => 'Active',
                ];
            }
        }

        foreach ($memberships as $membershipsData) {
            Memberships::create($membershipsData);
        }
    }
}
