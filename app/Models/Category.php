<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected function RecursiveStepFind($categories, $step=1){
        $current = new Collection();
        foreach($categories as $category){
            if ($category->parent_id === 0){
                $category->step = $step;
                $current->add($category);
                if (count($category->children) ){
                    $child = $this->getCatsWithStep($categories, $step+1);
                    $current->add($child);
                }
            }
        }
        return $current;
    }

    public function getCatsWithStep($categories){
        $step = 1;
        $newCategories = new Collection();
        foreach($categories as $category){
            if ($category->parent_id === 0){
                $category->step = $step;
                $newCategories->add($category);
                $category->children;
//                if (count($category->children) ){
//                    //$child = $this->RecursiveStepFind($categories, $step+1);
//                    //$newCategories->add($child);
//                }
            }
        }

        return $newCategories;
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
