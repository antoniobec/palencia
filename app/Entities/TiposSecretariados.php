<?php namespace Palencia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TiposSecretariados extends Model
{
    protected $tabla = "tipos_secretariados";
    protected $fillable = []; //Campos a usar
    protected $guarded = ['id']; //Campos no se usan

    static public function getTipoSecretariados(Request $request, $paginateNumber = 25)
    {
        return TiposSecretariados::Select('id', 'tipo_secretariado', 'activo')
            ->tipoSecretariado($request->get('tipo_secretariado'))
            ->TipoSecretariadoEsActivo($request->get('esActivo'))
            ->orderBy('tipo_secretariado', 'ASC')
            ->paginate($paginateNumber)
            ->setPath('tiposSecretariados');
    }

    public static function getTiposSecretariadosList()
    {
        return ['0' => 'Secretariado...'] + TiposSecretariados::Select('id', 'tipo_secretariado')
            ->where('activo', true)
            ->orderBy('tipo_secretariado', 'ASC')
            ->Lists('tipo_secretariado', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursillosTipoSecretariado()
    {
        return $this->hasMany("Palencia\Entities\Cursillos");
    }

    /**
     * @param $query
     * @param $pais
     */
    public function scopeTipoSecretariado($query, $tipoSecretariado = "")
    {
        if ($tipoSecretariado != null && trim($tipoSecretariado) != '')
            $query->where('tipo_secretariado', 'LIKE', "$tipoSecretariado" . '%');
        return $query;
    }

    public function scopeTipoSecretariadoEsActivo($query, $esActivo)
    {
        if (is_numeric($esActivo)) {
            $query->where('activo', filter_var($esActivo, FILTER_VALIDATE_BOOLEAN));
        }
    }

}
