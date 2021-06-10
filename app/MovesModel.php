<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovesModel extends Model
{
	protected $table = "moves_extra";

	protected $fillable = [
		'order_id','house_type_id','rooms_count','type_of_rooms','pcp','other_services'
	];
}

// ALTER TABLE `moves_extra` CHANGE `type_of_rooms` `type_of_rooms` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
// ALTER TABLE `moves_extra` CHANGE `pcp` `pcp` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL, CHANGE `other_services` `other_services` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
 