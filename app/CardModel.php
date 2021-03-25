<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class CardModel extends Model
{
    protected $table = 'card_management';

    protected $fillable = [
            'personName', 'designation', 'businessName','shortDescription','displayPhoto','whatsAppNumber','contacts','singleAddress','status','created_at',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

    public function deleteById($id){
    	 $deleted_at = array(
				'status' => '0',

                'deleted_at' => date('Y-m-d h:i:s'),

                'updated_at' => date('Y-m-d H:i:s'),
				 );
    	 $data=DB::table('card_management')->where('id',$id)->update($deleted_at);
    	 return true;
    }

}
