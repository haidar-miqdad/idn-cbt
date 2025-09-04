<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
        protected $fillable = [
        'exam_id',
        'title',
        'start_time',
        'end_time',
    ];


        public function exam_groups()
    {
        return $this->hasMany(ExamGroup::class);
    }


        /**
     * exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
