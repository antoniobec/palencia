<?php namespace Palencia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Roles extends Model
{

    protected $tabla = "roles";
    protected $fillable = ['rol', 'peso']; //Campos a usar
    protected $guarded = ['id']; //Campos no se usan

    public static function getRoles(Request $request)
    {

        return Roles::rol($request->get('rol'))
            ->orderBy('rol', 'ASC')
            ->paginate(3)
            ->setPath('roles');
    }

    public static function getRolesList($placeholder = "Roles...")
    {
        return ['0' => $placeholder] + Roles::where('peso', '>', 0)
            ->orderBy('rol', 'ASC')
            ->lists('rol', 'id');
    }

    public function scopeRol($query, $rol)
    {
        if (trim($rol) != '')
            $query->where('rol', 'LIKE', "$rol" . '%');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany("Palencia\Entities\User");
    }
}
