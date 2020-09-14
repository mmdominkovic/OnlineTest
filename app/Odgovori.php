<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Odgovori extends Model
{
    
    
    protected $fillable = ['option', 'correct', 'pitanje_id'];
    public static function boot()
    {
        parent::boot();

    }

    /**
     * Set to null if empty
     * @param $input
     */
  
    public function setQuestionIdAttribute($input)
    {
        $this->attributes['pitanje_id'] = $input ? $input : null;
    }
    public function pitanja()
    {
        return $this->belongsTo(Pitanja::class, 'pitanje_id');
    }
    
}
