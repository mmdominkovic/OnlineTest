<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestOdgovor
 *
 * @package App
 * @property string $question
 * @property string $option
 * @property tinyInteger $correct
*/
class TestOdgovor extends Model
{

    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];

   
    public function pitanje()
    {
        return $this->belongsTo(Pitanja::class, 'question_id');
    }
    public function odgovori()
    {
        return $this->belongsTo(Odgovori::class);
    }
}
