<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentsTableSeeder extends Seeder
{
    public function run()
    {
        Document::create([
            'case_id' => 1,
            'file_path' => '/path/to/document.pdf',
            'file_type' => 'pdf',
            'uploaded_by' => 1,
        ]);
    }
} 