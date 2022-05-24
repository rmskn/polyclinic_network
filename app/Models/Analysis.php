<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $add_items_id;
 * @property string $options;
 * @property string $title;
 * @property string $description;
 */
class Analysis extends Model
{
    use HasFactory;

    public function appointmentItem()
    {
        return $this->belongsTo(AppointmentItem::class, 'app_item_id');
    }
}
