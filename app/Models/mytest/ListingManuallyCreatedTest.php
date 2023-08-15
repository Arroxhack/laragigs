<?php 

/* !!!!!!!!!!!!!!!!!!!!
We are not using this model, we are going to use eloquent for that 

*/

namespace App\Models; // !!!! importante es \ no /

class Listing {
   public static function all() {
    return [ // this would come from a database
        [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam rem eveniet reprehenderit provident reiciendis eaque. Voluptatum cumque dolore assumenda dolorum.'
        ],
        [
            'id' => 2,
            'title' => 'Listing Two',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam rem eveniet reprehenderit provident reiciendis eaque.'
        ]
        ];
   }
    public static function find($id){ //Function to fetch a single listing using an id
        $listings = self::all(); // when you have a class and you want to call a method or a property within the class you use self // this gets all listings.

        foreach ($listings as $listing) {
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}

