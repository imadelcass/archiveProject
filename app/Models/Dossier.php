<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    public function beneficiaire()
    {
        return $this->hasOne(Beneficiaire::class, 'id', 'IDBENEFICIAIRE');
    }
    
    public function pieces()
    {
        return $this->hasMany(Piece::class, 'idDossier', 'id');
    }
    
    public function type()
    {
        return $this->hasOne(TypeDossier::class, 'id', 'IDTYPEDOSSIER');
    }
    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'IDSERVICE');
    }
}
