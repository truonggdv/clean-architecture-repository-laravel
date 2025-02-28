<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends BaseModel
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activity_log';

	/**
	 * The fillable fields for the model.
	 *
	 * @var    array
	 */
    protected $fillable = [
		'shop_id',
		'user_id',
		'prefix',
        'method',
        'response_code',
		'url',
		'input',
        'description',
		'ip',
		'user_agent',
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public static function add(Request $request,$description="")
    {
        $input=$request->except(['_token']);
        $encrypt_input=config('activity_log.encrypt_input')??[];
        foreach ($encrypt_input as $item) {
            if($request->filled($item)){
                $input[$item]=Helpers::Encrypt($input[$item],config('activity_log.site_secret'));
            }
        }
        $log = [
            'user_id' => auth()->user()->id??null,
            'prefix'    => $request->route()->getPrefix(),
            'url'    => $request->fullUrl(),
            'description'   => $description,
            'method'  => $request->method(),
            'ip'      => $request->getClientIp(),
            'user_agent'      => $request->userAgent(),
            'input'   => json_encode($input),
        ];
        ActivityLog::create($log);
    }
    public static function boot()
    {
        parent::boot();
    }
}
