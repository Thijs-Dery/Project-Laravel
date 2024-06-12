<?php

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqsTableSeeder extends Seeder
{
    public function run()
    {
        $category = FaqCategory::create(['name' => 'General']);

        Faq::create([
            'question' => 'What is the purpose of this site?',
            'answer' => 'This site is used to manage and display FAQs.',
            'category_id' => $category->id,
        ]);

        // Add more FAQs as needed
    }
}

