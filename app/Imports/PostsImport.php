<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PostsImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if (isset($item[0])) {
                Post::firstOrCreate([
                    'title' => $item[0]
                ], [
                    'title' => $item[0],
                    'content' => $item[1],
                    'image' => $item[2],
                    'like' => $item[3],
                    'is_published' => $item[4],
                    'category_id' => $item[5]
                ]);
            };
        }
    }
}
