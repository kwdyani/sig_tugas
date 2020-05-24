<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positif extends Model
{
    protected $table = "tb_covid";

    protected $primaryKey = "id";

    protected $fillable = ['id','id_kabupaten','positif','dirawat','sembuh','meninggal','tanggal'];
    public $timestamps = false;

   //  public function getCreatedAtAttribute() {
   //  return \Carbon\Carbon::parse($this->attributes['tgl'])
   //     ->format('d, M Y H:i');
   // }

   public function kabupaten()
{
    return $this->belongsTo('App\Kabupaten', 'id');
}
}
