<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'reviews';

    protected $fillable = ['voting_user_id', 'voted_user_id', 'vote', 'comment'];

    public $timestamps = true;

    public function ratedUser() {
        return $this->belongToMany('App\Models\User', 'voted_user_id', 'id');
    }

    public function ratingUser() {
        return $this->belongToMany('App\Models\User', 'voting_user_id', 'id');
    }

    public function getReviewInfo($user_id) {
        return $this->where('voted_user_id', $user_id)->get();
    }

    public function getAverageVote($user_id){
        return $this->where('voted_user_id', $user_id)->avg('vote');
    }
}
