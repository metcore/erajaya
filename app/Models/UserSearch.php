<?php
namespace App\Models;

/**
 * BankSearch represents the model behind the search form of `app\models\Bank`.
 */
class UserSearch extends User{

    public function rules()
    {
          return [
            'email' => 'required|email:rfc,dns|unique:users|max:255',
            'name' => 'required',
            'roles'=>''
        ];
    }

    public function search($params){
    	$query = User::find(1);


    }
}