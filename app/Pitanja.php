<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitanja extends Model
{
    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'predmet_id'];
    public function setTopicIdAttribute($input)
    {
        $this->attributes['predmet_id'] = $input ? $input : null;
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }

    public function odgovori()
    {
        return $this->hasMany(Odgovori::class, 'pitanje_id');
    }
}
