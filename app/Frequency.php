<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
  protected $table = "Frequencies";

  public static function getValue($user, $lesson)
  {
    $out = DB::select("select Frequencies.value "
      . "from Frequencies, Attends "
      . "where Frequencies.idLesson=? and Frequencies.idAttend=Attends.id and Attends.idUser=?",
      [$lesson, $user]);

    return count($out) ? $out[0]->value : "";
  }
}