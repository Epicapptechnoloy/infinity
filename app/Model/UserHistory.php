<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model

{
	protected $table = 'sb_user_history';
	protected $primaryKey = 'history_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'history_data', 'table_name', 'user_id', 'table_row_id', 'created_at'
    ];
    
	
	public function user(){
        return $this->belongsTo('App\Model\User', 'user_id');
    }
	
	public static function saveUserHistory($tableName, $conditions)
	{
		$lastRecords = DB::table($tableName)->where(function($query) use ($conditions){
                    foreach($conditions as $k => $c)
					{
						$query->where($k, $c);
					}
                })->get()->toArray();
				
		if(count($lastRecords) > 0)
		{
			foreach($lastRecords as $k => $r)
			{
				$r = (array) $r;
				$table_row_id = $r[key($r)];
				$row = array('history_data' => json_encode($r), 'table_name' => $tableName, 
							 'table_row_id' => $table_row_id, 'user_id' => \Auth::user()->id, 
							 'created_at' => date('Y-m-d H:i:s'));
				DB::table('sb_user_history')->insert($row);
			}	
		}
	}
	
}
