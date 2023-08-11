<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model // It extends from Eloquent Model so i can use lots of methods
{
    use HasFactory;

    public function scopeFilter($query, array $filters){ // creating a method called scopeFilter in our Model, it will have a $query and and array of filters. // !!!! with this we can now filter in our Listing Model
        //dd($filters['tag']); // esto nos da el tag que seleccionemos
        if($filters['tag'] ?? false){ // if $filters['tag'] is not false...
            $query->where('tags', 'like', '%' . request('tag') . '%'); // sql like query // request('tag') was the method to get the ?tag value // Basically we are getting the registries that had a tag that matches in the tags collumn 
        }
        if($filters['search'] ?? false){ 
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%') // adding more collumns to look for 
            ->orWhere('tags', 'like', '%' . request('search') . '%'); // adding more collumns to look for 
        }
    } 
}


// We just have to add minimal relationships and thats all
