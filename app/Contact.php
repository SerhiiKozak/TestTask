<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  public $contact = [
                'id'         => '',
                'first_name' => '',
                'last_name'  => '',
                'cell'       => '',
                'comment'    => '',
    ];

  protected $fillable = ['first_name', 'last_name', 'cell', 'comment'];

  public function set($id)
  {
    $cont = Contacts::find($id);
    $this->contact['id'] = $cont->id;
    $this->contact['first_name'] = $cont->first_name;
    $this->contact['last_name'] = $cont->last_name;
    $this->contact['cell'] = $cont->cell;
    $this->contact['comment'] = $cont->comment;

    return $this->contact;
  }

}