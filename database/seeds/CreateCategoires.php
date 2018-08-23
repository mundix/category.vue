<?php

use Illuminate\Database\Seeder;

use App\Category;

class CreateCategoires extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Foods"=>["Breakfast","Meals","Dinner"],
            "Sports"=>["Baseball","Basketball","Tennis",'Football Soccer'],
            "Hobbies" => ["Painting","Driving","Swimming","Running"],
            "Companies" => ["Apple","Microsoft","IMB","Intel"],
        ];
        foreach($categories as $parentName => $categoryChildren)
        {
            $cat = new Category();
            $cat->name = $parentName;
            $cat->slug = str_slug($parentName);
            $cat->save();
            foreach($categoryChildren as $childName)
            {
                $child = new Category();
                $child->slug = str_slug($childName);
                $child->name = $childName;
                $cat->children()->save($child);
            }
        }
    }
}
